/* requestAnimationFrame crossbrowser support */
(function() {
  var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                              window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
  window.requestAnimationFrame = requestAnimationFrame;
})();
var quill_status = false;
try{
	var editor = new Quill('#editor', {
		modules: {
			toolbar: [
				[{
					'header': [1, 2, false]
				}],
				['bold', 'italic', 'underline'],
				[{
					'list': 'ordered'
				}, {
					'list': 'bullet'
				}],
				['blockquote', 'link', 'image', 'video'],
				['code', 'clean']
			],
		},
		placeholder: "Write here. Add images or a video for visual impact.",
		theme: 'snow'
	});
	quill_status = true;
}
catch(e){}


$(document).ready(function() {
	var $body = $(document.body),
		qeditor = '',
		$toolbar = $('.editor .ql-toolbar.ql-snow'),
		$extra = $('#editor-extra'),
		$editor = $('#editor'),
		$embed_toolbar = $('#embed-toolbar'),
		$modal_image_control = $('#modal-embeded-image-control');
	
	var methods = {
		
		// INIT
		init : function(){
			
			// get a quill editor link
			if(quill_status){
				qeditor = editor;
			
				// editor
				methods.editor_init();
				
				// extra
				methods.extra_init();
				
				// embeded toolbar
				methods.embtoolbar_init();
			}
			
			// article
			methods.article_init();
			
			// article comment
			methods.comment_init();
		},
		
		
		
		/* EDITOR */
		editor_init : function(){
			
			// wrap
			$editor.wrap('<div class="editor-wrap"></div>');
			
			// show/hide embeded image controls
			$editor
				.on('mouseenter', 'img', function(){
					methods.editor_control_show($(this));
					return false;
				})
				.on('mouseleave', 'img', function(){
					methods.editor_control_hide($(this));
					return false;
				});
			
			$modal_image_control
				.data('index', 0)
				.on({
					'mouseenter': function(){
						methods.editor_control_show();
						return false;
					},
					'mouseleave': function(){
						methods.editor_control_hide();
						return false;
					}
				})
				.on('click', 'button', function(){
					methods.editor_control_actions($(this));
					return false;
				});
		},
		
		// - show image controls
		editor_control_show : function($img){
			clearTimeout($modal_image_control.data('tm'));
			
			// if we have image
			if($img){
				var img_indx = $img.data('index'),
					c_indx = $modal_image_control.data('cindex');
				
				// if image does not have index - create one
				if(!img_indx){
					img_indx = $modal_image_control.data('index') + 1;
					$img.data('index', img_indx);
					$modal_image_control.data('index', img_indx);
				}
				
				//compare image and current indexes
				if(img_indx != c_indx){
					
					// store values
					$modal_image_control
						.data({
							'cindex': img_indx,
							'$img': $img
						});
						
					// modal is already visible somewhere
					if($modal_image_control.is(':visible')){
						$modal_image_control
							.css('display', 'none')
							.removeClass('show-control');
					}
					
					// set controls
					var $button = [];
					if($img.hasClass('align-left')){
						$button = $modal_image_control.find('button.align-left');
					}
					else if($img.hasClass('fit-center')){
						$button = $modal_image_control.find('button.fit-center');
					}
					else if($img.hasClass('fit-window')){
						$button = $modal_image_control.find('button.fit-window');
					}
					else if($img.hasClass('align-right')){
						$button = $modal_image_control.find('button.align-right');
					}
					else{
						$button = $modal_image_control.find('button.fit-container');
					}
					
					if($img.hasClass('align-right')){
						$modal_image_control.addClass('align-right');
					}
					else if($img.hasClass('align-left')){
						$modal_image_control.addClass('align-left');
					}
					else{
						$modal_image_control.removeClass('align-right align-left');
					}
					
					$button
						.addClass('active')
						.siblings('.active')
							.removeClass('active');
				}
			}
			
			// calculate values
			methods.editor_control_calculate();
			
			// show it
			requestAnimationFrame(function(){
				$modal_image_control.css('display', 'block');
				requestAnimationFrame(function(){
					$modal_image_control.addClass('show-control');
				});
			});
		},
		
		// - hide image controls
		editor_control_hide : function(){
			$modal_image_control.data('tm', setTimeout(function(){
				$modal_image_control
					.removeClass('show-control')
					.data('tm', setTimeout(function(){
						$modal_image_control.css('display', 'none');
					}, 250));
			}, 200));
		},
		
		// - calculate modal values
		editor_control_calculate : function($img){
			if(!$img){
				$img = $modal_image_control.data('$img');
			}
			if($img && $img[0]){
				var $parent = $img.parent(),
					offset = $parent.offset(),
					img_width = ($img.hasClass('align-right') || $img.hasClass('align-left')) ? $parent.width() / 2 : $parent.width(),
					left = $img.hasClass('align-right') ? offset.left + img_width : offset.left;
				
				$modal_image_control
					.data('$img', $img)
					.css({
						width	: img_width,
						top		: offset.top,
						left	: left
					});
			}
		},
		
		// - controls actions
		editor_control_actions : function($button){
			if(!$button.hasClass('active')){
				var $img = $modal_image_control.data('$img');
				
				// align left
				if($button.hasClass('align-left')){
					$img
						.removeClass('align-right fit-center fit-window')
						.addClass('align-left');
					
					$modal_image_control
						.removeClass('align-right')
						.addClass('align-left');
				}
				
				// align right
				else if($button.hasClass('align-right')){
					$img
						.removeClass('align-left fit-center fit-window')
						.addClass('align-right');
					
					$modal_image_control
						.removeClass('align-left')
						.addClass('align-right');
				}
				
				// fit center
				else if($button.hasClass('fit-center')){
					$img
						.removeClass('align-left align-right fit-window')
						.addClass('fit-center');
						
					$modal_image_control.removeClass('align-right align-left');
				}
				
				// fit window
				else if($button.hasClass('fit-window')){
					$img
						.removeClass('align-left align-right fit-center')
						.addClass('fit-window');
					
					$modal_image_control.removeClass('align-right align-left');
				}
				
				// fit container
				else{
					$img.removeClass('align-left align-right fit-center fit-window');
					
					$modal_image_control.removeClass('align-right align-left');
				}
				
				// set active button
				$button
					.addClass('active')
					.siblings('.active')
						.removeClass('active');
					
				// calculate values
				methods.editor_control_calculate($img);
			}
		},
		
		
		
		/* EXTRA */
		extra_init : function(){
			$extra.insertAfter($toolbar);
			
			// Cover Image
			var $cover_image = $extra.find('.editor-cover-image'),
				$uploaded_image = $cover_image.find('.uploaded-image');
			
			// - show cover image
			$toolbar
				.append('<a href="#" class="show-cover-img">Add cover image</a>')
				.on('click', '.show-cover-img', function(){
					$toolbar.removeClass('show-cover-button');
					$cover_image
						.stop()
						.slideDown();
					return false;
				});
			
			// - hide cover image
			$cover_image.on('click', '.close_button', function(){
				$toolbar.addClass('show-cover-button');
				$cover_image
					.stop()
					.slideUp();
				return false;
			});
			
			// - upload image
			$cover_image.on('change', '.cover-image-upload', function(){
				var files = this.files;
				if (FileReader && files && files.length) {
					$cover_image.addClass('show-uploaded');
					$uploaded_image.removeClass('uploaded');
					
					var fr = new FileReader();
					fr.onload = function(){
						$uploaded_image
							.addClass('uploaded')
							.css('background-image', 'url(' + fr.result + ')');
					}
					fr.readAsDataURL(files[0]);
				}
				return false;
			});
			
			// - fit-container / fit-window / remove
			$cover_image.on('click', '.uploaded-image-controls button', function(){
				var $this = $(this);
				
				// fit-container
				if($this.hasClass('fit-container')){
					$this
						.addClass('active')
						.siblings('.active')
							.removeClass('active');
							
					$uploaded_image.removeClass('stretch-to-window');
				}
				
				// fit-window
				else if($this.hasClass('fit-window')){
					$this
						.addClass('active')
						.siblings('.active')
							.removeClass('active');
							
					$uploaded_image.addClass('stretch-to-window');
				}
				
				// remove
				else if($this.hasClass('remove')){
					$cover_image
						.removeClass('show-uploaded')
						.find('.cover-image-upload')
							.val('');
					
					$uploaded_image
						.removeClass('uploaded')
						.removeAttr('style');
				}
				return false;
			});
			
			
			
			
		},
		
		
		
		// EMBEDED TOOLBAR
		embtoolbar_init : function(){
			
			// append to the same parent as Editor
			$editor.parent().append($embed_toolbar);
			
			// Open/Close toolbar
			$embed_toolbar.on('click', '.toolbar-outer button', function(){
				var $this = $(this);
				
				// - open
				if($this.hasClass('ql-open')){
					methods.embtoolbar_show();
				}
				
				// - close
				else{
					methods.embtoolbar_hide();
				}
				return false;
			});
			
			// Actions
			$embed_toolbar.on('click', '.toolbar-inner button', function(){
				var $this = $(this);
				
				// - image
				if($this.hasClass('ql-image')){
					var range = editor.getSelection(true),
						line = editor.getLine(range.index),
						lnbrs = '',
						add_index = 0;
					
					// there is content on the left
					if(line[1] > 0){
						editor.insertText(range.index, '\n', Quill.sources.USER);
						add_index += 1;
						
						var line2 = editor.getLine(range.index + 1);
						if(line2[0].cache.length > 2){
							editor.insertText(range.index, '\n', Quill.sources.USER);
						}
					}
					// add new line to the bottom
					else{
						editor.insertText(range.index, '\n', Quill.sources.USER);
					}
					
					editor.setSelection(range.index + add_index, Quill.sources.SILENT);
					$toolbar.find('button.ql-image').trigger('click');
					requestAnimationFrame(function(){
						
						//editor.insertText(range.index + add_index + 1, lnbrs, Quill.sources.USER);
						//editor.setSelection(range.index + add_index + 1, Quill.sources.SILENT);
					});
				}
				
				// - video
				else if($this.hasClass('ql-video')){
					$toolbar.find('button.ql-video').trigger('click');
				}
				
				// - slides
				else if($this.hasClass('ql-slides')){
				}
				
				// - link
				else if($this.hasClass('ql-link')){
				}
				
				// - code
				else if($this.hasClass('ql-code')){
				}
				
				methods.embtoolbar_hide();
				
				return false;
			});
			
			// move toolbar
			qeditor.on('editor-change', function(){
				methods.embtoolbar_move();
			});
		},
		
		// show toolbar
		embtoolbar_show : function(){
			$embed_toolbar.addClass('opened')
		},
		
		// hide toolbar
		embtoolbar_hide : function(){
			$embed_toolbar.removeClass('opened')
		},
		
		// move toolbar
		embtoolbar_move : function(){
			var sel = qeditor.root.ownerDocument.getSelection(),
				current_top = $embed_toolbar.data('top');
			
			if(sel && qeditor.hasFocus()){
				var top = (sel.anchorNode.tagName ? $(sel.anchorNode).position().top : $(sel.anchorNode.parentNode).position().top) - 3;
				
				if(current_top != top){
					$embed_toolbar
						.data('top', top)
						.css('top', top);
				}
			}
		},
		
		
		
		/* ARTICLE */
		article_init : function(){
			var $post_comment = $('#post_comment');
			if($post_comment[0]){
				var $comments_img = $post_comment.find('#comments_img'),
					$discussions = $('#discussions');
				
				$post_comment
					// show other parts on title focus
					.on('focus', 'input[name=post_title]', function(){
						if($post_comment.data('title-init') != true){
							$post_comment
								.data('title-init', true)
								.find('#post_comment_top, #post_comment_mid, #post_comment_bot')
									.slideDown();
						}
					})
					
					// - upload image
					.on('change', '.upload-image', function(){
						var files = this.files;
						if (FileReader && files && files.length) {
							$comments_img
								.addClass('show-uploaded')
								.removeClass('uploaded hide');
							
							var $img = $comments_img.find('img');
							if(!$img[0]){
								$img = $('<img class="maxwi_100 hei_auto marb20 valb" />');
								$comments_img.children('div').append($img);
							}
							$img.removeAttr('src');
							
							var fr = new FileReader();
							fr.onload = function(){
								$comments_img.addClass('uploaded');
								$img.attr('src', fr.result);
							}
							fr.readAsDataURL(files[0]);
						}
						return false;
					})
					
					// - remove image
					.on('click', '.remove_image', function(){
						$post_comment.find('.upload-image').val('');
						$comments_img.addClass('hide');
						return false;
					})
					
					// - submit
					.on('submit', function(){
						methods.article_submit($(this), $discussions);
						return false;
					});
			}
		},
		
		// submit article
		article_submit : function($form, $discussions){
			// this part should just send form data to the server and insert returned result
			// but...just for the test we will improvise
			
			var $fields = $form.find('input, textarea'),
				name = $fields.filter('input[name=poster_name]').val(),
				position = $fields.filter('input[name=poster_position]').val(),
				avatar = $fields.filter('input[name=poster_avatar]').val(),
				$post_title = $fields.filter('input[name=post_title]'),
				post_title = $post_title.val(),
				$post_content = $fields.filter('textarea[name=post_content]'),
				post_content = $post_content.val();
				
			$discussions.prepend('<div class="discussion mart25 brd brdrad_2 white_bg fsz14 dark_grey_txt">\
									<div class="padt15">\
										<div class="padrl25 xs-padrl15">\
											<div class="fleft">\
												<a href="#" class="dark_grey_txt">\
													<div class="fleft"><img src="' + avatar + '" width="48" class="marr10 brdrad40" title="' + name + '" alt="' + name + '" />\
													</div>\
													<div class="fleft padt5">\
														<h2 class="poster_name padb5 bold fsz14">' + name + '</h2>\
														<h3 class="poster_position opc_055 pad0 fsz14">' + position + '</h3>\
													</div>\
												</a>\
											</div>\
											<div class="fright padt5">\
												<button type="button" class="wi_32p hei_32p dinlblck marr10 pad0 nobrd brdrad40 white_bg bg_000_01_h valm talc curp">\
													<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="large-icon" style="fill: currentColor"><g><path d="M6,10v4H2v-4H6zM10,10v4h4v-4H10zM18,10v4h4v-4H18z"></path></g></g></svg>\
												</button>\
												<span>2h</span>\
											</div>\
											<div class="clear"></div>\
										</div>\
									</div>\
									<div class="padt15">\
										<div class="padrl25 xs-padrl15">\
											<h4 class="fsz26"><a href="#" class="post_title dark_grey_txt lnkdblue_txt_h">' + post_title + '</a></h4>\
											<p class="post_content pad0">' + post_content + '</p>\
										</div>\
									</div>\
									<div class="padtb15">\
										<div class="padrl25 xs-padrl15">\
											<a href="#" class="action-like marr10 bold lnkdblue_txt">Like</a>\
											<a href="#" class="action-comment marr10 bold lnkdblue_txt">Comment</a>\
										</div>\
									</div>\
									<div class="padb15 grey_bg">\
										<div class="padrl25 xs-padrl15">\
											<form class="post_comment">\
												<div class="comments_list"></div>\
												<div class="padt15">\
													<table class="wi_100" cellpadding="0" cellspacing="0">\
														<tr>\
															<td>\
																<div class="reply_img opc_055 opc_1_a fleft"><img src="' + avatar + '" width="44" class="marr10 brdrad40" title="' + name + '" alt="' + name + '">\
																</div>\
															</td>\
															<td class="wi_100 valm">\
																<textarea name="comment" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_14 fsz14" placeholder="Reply to this conversation" required="required"></textarea>\
															</td>\
															<td class="reply_btn padl15 valm">\
																<input type="hidden" name="reply_name" value="' + name + '" />\
																<input type="hidden" name="reply_avatar" value="' + avatar + '" />\
																<button type="submit" class="hei_34p padrl15 nobrd brdrad2 blue_bg white_txt curp">Post</button>\
															</td>\
														</tr>\
													</table>\
												</div>\
											</form>\
											<div class="clear"></div>\
										</div>\
									</div>\
								</div>');
			$post_title.val('');
			$post_content.val('');
		},
		
		
		
		/* ARTICLE COMMENT */
		comment_init : function(){
			var $discussions = $('#discussions');
			if($discussions[0]){
				
				$discussions
					// reply
					.on('submit', '.post_comment', function(){
						methods.comment_reply($(this));
						return false;
					})
				
					// comment textarea focus
					.on('focus', 'form.post_comment textarea', function(){
						var $this = $(this);
						
						if($this.data('init') != true){
							$this.data('init', true);
							autosize($this);
						}
						
						$this.closest('form').addClass('focused');
					})
					
					// comment textarea blur
					.on('blur', 'form.post_comment textarea', function(){
						//$(this).closest('form').removeClass('focused');
					})
					
					// action like
					.on('click', '.action-like', function(){
						methods.comment_action_like($(this));
						return false;
					})
					
					// action comment 
					.on('click', '.action-comment', function(){
						methods.comment_action_comment($(this));
						return false;
					})
					
					// post comment action like
					.on('click', '.cp-action-like', function(){
						methods.comment_post_action_like($(this));
						return false;
					});
			}
		},
		
		// - action like
		comment_action_like : function($link){
			var $divider = $link.siblings('span'),
				$like_counter = $link.siblings('.likes_counter');
			
			if(!$link.hasClass('liked')){
				$link
					.addClass('liked')
					.html('Unlike');
				
				if($like_counter[0]){
					var $amount = $like_counter.find('.amount'),
						amount = $amount.html();
					amount = amount ? parseInt(amount) : 0;
					$amount.html(amount + 1);
				}
				else{
					
					if(!$divider[0]){
						$divider = $('<span class="marl5 padr10 brdl">&nbsp;</span>');
						$link.parent().append($divider);
					}
					
					$('<a href="#" class="likes_counter opc_055 opc_1_h marr10 bold black_txt lnkdblue_txt_h"><span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet"><g class="small-icon" style="fill-opacity: 1"><g><path d="M11.6,7L9.7,3.8C9.4,3.2,9.2,2.7,9,2.1L8.8,1C8.8,1,8.7,1,8.7,1H7C5.9,1,5,1.9,5,3v0.4c0,0.6,0.1,1.3,0.3,1.9l0.2,0.7C5.5,6,5.5,6,5.5,6L2.5,6c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.1,0.7,0.4,1c0,0,0,0,0,0C1.1,8.8,1,9.1,1,9.5c0,0.5,0.3,1,0.7,1.3c0,0,0,0,0,0c-0.1,0.2-0.2,0.5-0.2,0.7c0,0.8,0.6,1.4,1.3,1.5c0,0,0,0,0,0c-0.1,0.3-0.1,0.6,0,1c0.2,0.6,0.9,1,1.5,1h2.2c0.9,0,1.5-0.1,2.1-0.3l2.1-0.7c0,0,0-0,0-0h3.2c0,0,0-0,0-0V7c0-0-0-0-0-0h-2.3C11.6,7,11.6,7,11.6,7zM12,12h-0.7c-0,0-0,0-0,0l-2.5,0.8c-0.4,0.1-0.8,0.2-1.2,0.2H4.4c-0,0-0-0-0-0c0-0.4-0.1-0.7-0.3-1.1c-0.2-0.3-0.5-0.6-0.9-0.8c-0-0-0-0-0-0c0.1-0.6-0.1-1.3-0.5-1.7c-0-0-0-0-0-0C2.9,9,2.9,8.5,2.8,8C2.8,8,2.8,8,2.8,8H8c0,0,0-0,0-0L6.9,4.7C6.8,4.2,6.8,3.8,6.8,3.4v-0.3c0-0.2,0.2-0.4,0.4-0.4h0.4c0,0,0,0,0,0c0.1,0.7,0.4,1.5,0.7,2l2.6,4.2c0,0,0,0,0,0h1.1C12,9,12,9,12,9v3C12,12,12,12,12,12z"></path></g></g></svg></span> <span class="amount valm">1</span></a>').insertAfter($divider);
				}
			}
			else{
				$link
					.removeClass('liked')
					.html('Like');
				
				if($like_counter[0]){
					var $amount = $like_counter.find('.amount'),
						amount = $amount.html();
					amount = amount ? parseInt(amount) : 0;
					
					if(amount > 1){
						$amount.html(amount - 1);
					}
					else{
						$amount.parent().remove();
						if(!$link.siblings('.comments_counter')[0]){
							$divider.remove();
						}
					}
				}
			}
			
		},
		
		// - action comment
		comment_action_comment : function($link){
			$link.closest('.discussion').find('.post_comment textarea').trigger('focus');
		},
		
		// - action change comment amount
		comment_action_comment_change : function($discussion, new_amount){
			var $action_comment = $discussion.find('.action-comment'),
				$divider = $action_comment.siblings('span'),
				$comment_counter = $action_comment.siblings('.comments_counter');
			
			if(!$divider[0]){
				$action_comment.parent().append('<span class="marl5 padr10 brdl">&nbsp;</span>');
			}
			
			if($comment_counter[0]){
				var $amount = $comment_counter.find('.amount'),
					amount = $amount.html();
				amount = amount ? parseInt(amount) : 0;
				$amount.html(amount + new_amount);
			}
			else{
				$action_comment.parent().append('<a href="#" class="comments_counter opc_055 opc_1_h marr10 bold black_txt lnkdblue_txt_h"><span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="small-icon" style="fill-opacity: 1"><g><path d="M13,5v5.4l-2,1.3V10H3V5H13M14,3H2C1.4,3,1,3.4,1,4v7c0,0.6,0.4,1,1,1h7v3l5.3-3.3C14.7,11.4,15,10.9,15,10.4V4C15,3.4,14.6,3,14,3L14,3z"></path></g></g></svg></span> <span class="amount valm">' + new_amount + '</span></a>');
			}
		},
		
		// - post comment action like
		comment_post_action_like : function($link){
			var $divider = $link.siblings('span');
			if(!$link.hasClass('liked')){
				$link
					.addClass('liked')
					.html('Unlike');
				
				if(!$divider[0]){
					$link.parent().append('<span class="marl5 padr10 brdl">&nbsp;</span>');
				}
				
				var $like_counter = $link.siblings('.cp-likes_counter');
				if($like_counter[0]){
					var $amount = $like_counter.find('.amount'),
						amount = $amount.html();
					amount = amount ? parseInt(amount) : 0;
					$amount.html(amount + 1);
				}
				else{
					$link.parent().append('<a href="#" class="cp-likes_counter opc_055 opc_1_h marr10 bold black_txt lnkdblue_txt_h"><span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet"><g class="small-icon" style="fill-opacity: 1"><g><path d="M11.6,7L9.7,3.8C9.4,3.2,9.2,2.7,9,2.1L8.8,1C8.8,1,8.7,1,8.7,1H7C5.9,1,5,1.9,5,3v0.4c0,0.6,0.1,1.3,0.3,1.9l0.2,0.7C5.5,6,5.5,6,5.5,6L2.5,6c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.1,0.7,0.4,1c0,0,0,0,0,0C1.1,8.8,1,9.1,1,9.5c0,0.5,0.3,1,0.7,1.3c0,0,0,0,0,0c-0.1,0.2-0.2,0.5-0.2,0.7c0,0.8,0.6,1.4,1.3,1.5c0,0,0,0,0,0c-0.1,0.3-0.1,0.6,0,1c0.2,0.6,0.9,1,1.5,1h2.2c0.9,0,1.5-0.1,2.1-0.3l2.1-0.7c0,0,0-0,0-0h3.2c0,0,0-0,0-0V7c0-0-0-0-0-0h-2.3C11.6,7,11.6,7,11.6,7zM12,12h-0.7c-0,0-0,0-0,0l-2.5,0.8c-0.4,0.1-0.8,0.2-1.2,0.2H4.4c-0,0-0-0-0-0c0-0.4-0.1-0.7-0.3-1.1c-0.2-0.3-0.5-0.6-0.9-0.8c-0-0-0-0-0-0c0.1-0.6-0.1-1.3-0.5-1.7c-0-0-0-0-0-0C2.9,9,2.9,8.5,2.8,8C2.8,8,2.8,8,2.8,8H8c0,0,0-0,0-0L6.9,4.7C6.8,4.2,6.8,3.8,6.8,3.4v-0.3c0-0.2,0.2-0.4,0.4-0.4h0.4c0,0,0,0,0,0c0.1,0.7,0.4,1.5,0.7,2l2.6,4.2c0,0,0,0,0,0h1.1C12,9,12,9,12,9v3C12,12,12,12,12,12z"></path></g></g></svg></span><span class="amount valm">1</span></a>');
				}
			}
			else{
				$link
					.removeClass('liked')
					.html('Like');
				
				var $like_counter = $link.siblings('.cp-likes_counter');
				if($like_counter[0]){
					var $amount = $like_counter.find('.amount'),
						amount = $amount.html();
					amount = amount ? parseInt(amount) : 0;
					
					if(amount > 1){
						$amount.html(amount - 1);
					}
					else{
						$amount.parent().remove();
						$divider.remove();
					}
				}
			}
		},
		
		// - reply
		comment_reply : function($form){
			var $fields = $form.find('input, textarea'),
				name = $fields.filter('input[name=reply_name]').val(),
				avatar = $fields.filter('input[name=reply_avatar]').val(),
				$comment = $fields.filter('textarea[name=comment]'),
				comment = $comment.val();
			
			console.log(123123);
			
			$form.find('.comments_list').append('<div class="comment_row wi_100 dflex alit_fs bs_bb padt15">\
							<a href="#" class="flex_0">\
								<img src="' + avatar + '" width="44" class="marr10 brdrad40" title="' + name + '" alt="' + name + '">\
							</a>\
							<div class="flex_1">\
								<p class="padb5">\
									<a href="#" class="bold fsz14 dark_grey_txt">' + name + '</a>\
									<span>' + comment + '</span>\
								</p>\
								<div>\
									<div class="fleft lgn_hight_32">\
										<a href="#" class="cp-action-like marr10 bold lnkdblue_txt">Like</a>\
									</div>\
									<div class="fright">\
										<button type="button" class="wi_32p hei_32p dinlblck marr10 pad0 nobrd brdrad40 grey_bg bg_000_01_h valm talc curp">\
											<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="large-icon" style="fill: currentColor"><g><path d="M6,10v4H2v-4H6zM10,10v4h4v-4H10zM18,10v4h4v-4H18z"></path></g></g></svg>\
										</button>\
										<span>2h</span>\
									</div>\
									<div class="clear"></div>\
								</div>\
							</div>\
						</div>');
						
			$comment.val('');
			
			methods.comment_action_comment_change($form.closest('.discussion'), 1);
		},
	}
	methods.init();
	
	
});