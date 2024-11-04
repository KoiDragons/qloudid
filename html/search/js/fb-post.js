$(document).ready(function() {
	var $body = $(document.body),
		$fb_posts = $('.fb-posts'),
		$prime_comment_template = $('#fb-prime-comment-template'),
		$sub_comment_template = $('#fb-sub-comment-template');
	
	var methods = {
		
		// INIT
		init : function(){
			
			if($fb_posts[0] && $prime_comment_template[0] && $sub_comment_template[0]){
				
				// show comment section and focus on message
				$fb_posts.on('click', '.fb-show-comments', function(){
					$(this).closest('.fb-post').find('.fb-comments-holder')
						.removeClass('hidden')
						.find('.fb-comment-form textarea')
							.trigger('focus');
					return false;
				});
				
				// prime comment submit
				$fb_posts.on('submit', '.fb-comment-form', function(){
					methods.prime_comment_submit($(this));
					return false;
				});
				
				
				// show sub comment section and focus on message
				$fb_posts.on('click', '.fb-comment-action-reply', function(){
					var $this = $(this),
						$comment = $this.closest('.fb-comment');
					
					$comment
						.find('.fb-comment-action-show-replies')
							.remove()
						.end()
						.find('.fb-subcomments-holder')
						.removeClass('hidden')
						.find('.fb-subcomment-form textarea')
							.data('reply-source', $this)
							.trigger('focus');
					return false;
				});
				
				// show sub comment section
				$fb_posts.on('click', '.fb-comment-action-show-replies', function(){
					var $this = $(this);
					
					$this.closest('.fb-comment')
						.find('.fb-subcomments-holder')
						.removeClass('hidden');
					
					$this.remove();
						
					return false;
				});
				
				// sub comment reply
				$fb_posts.on('click', '.fb-subcomment-action-reply', function(){
					var $this = $(this);
					$this.closest('.fb-subcomments-holder').find('.fb-subcomment-form textarea')
						.data('reply-source', $this)
						.trigger('focus');
					return false;
				});
				
				// sub comment submit
				$fb_posts.on('submit', '.fb-subcomment-form', function(){
					methods.sub_comment_submit($(this));
					return false;
				});
				
				
				// textfield Enter button click
				$fb_posts.on('keypress', '.fb-comment-form textarea, .fb-subcomment-form textarea', function(e){
					if(e.keyCode === 13){
						$(this).closest('form').trigger('submit');
						return false;
					}
				});
								
				// view more comments
				$fb_posts.on('click', '.fb-comment-view-more a', function(){
					var $this = $(this),
						$view_more = $this.closest('.fb-comment-view-more'),
						$counter = $view_more.find('.fb-comment-view-more-count'),
						current_count = parseInt($counter.attr('data-count')),
						$extra_comments = $('#fb-more-comments'),
						limit = $this.data('limit') ? parseInt($this.data('limit')) : 0;
					
					$view_more.before($extra_comments.html());
					$counter.attr('data-count', current_count + $extra_comments.find('.fb-comment').length);
					limit++;
					
					if(limit > 1){
						$this.remove();
					}
					
					$this.data('limit',limit );
					return false;
				});
				
			}
			
		},
		
		
		
		/* PRIME COMMENT */
		prime_comment_submit : function($form){
			var $avatar = $form.data('avatar'),
				$name = $form.data('name'),
				$message = $form.find('textarea[name=comment]'),
				message = $message.val().trim(),
				posted_date = 'just now';
				
			if(message.length > 0){
				var html = $prime_comment_template.html();
				html = html.split('{avatar}').join('src="' + $avatar + '"');
				html = html.split('{avatar_src}').join($avatar);
				html = html.split('{name}').join($name);
				html = html.split('{message}').join(message),
				html = html.split('{posted-date}').join(posted_date);
				
				$(html).insertAfter($form);
				$message.val('');
				
				var $comments_count = $form.closest('.fb-post').find('.fb-comments-count'),
					count = $comments_count.attr('data-count') ? parseInt($comments_count.attr('data-count')) : 0;
				
				$comments_count.attr('data-count', count + 1);
			}
		},
		
		/* SUB COMMENT */
		sub_comment_submit : function($form){
			var $main_form = $form.closest('.fb-comments-holder').find('.fb-comment-form'),
				avatar = $main_form.data('avatar'),
				name = $main_form.data('name'),
				$message = $form.find('textarea[name=comment]'),
				message = $message.val().trim(),
				posted_date = 'just now',
				$reply_source = $message.data('reply-source');
			
			if(message.length > 0){
				var html = $sub_comment_template.html();
				html = html.split('{avatar}').join('src="' + avatar + '"');
				html = html.split('{name}').join(name);
				if($reply_source && $reply_source[0] && $reply_source.closest('.fb-comment').parent().hasClass('fb-subcomments-holder')){
					html = html.split('{replied-to}').join($reply_source.closest('.fb-comment').data('name'));
				}
				else{
					html = html.split('{replied-to}').join('');
				}
				html = html.split('{message}').join(message),
				html = html.split('{posted-date}').join(posted_date);
				
				$(html).insertBefore($form);
				
				$message
					.val('')
					.data('reply-source', '');
				
				/*
				var $comments_count = $main_form.closest('.fb-post').find('.fb-comments-count'),
					count = $comments_count.attr('data-count') ? parseInt($comments_count.attr('data-count')) : 0;
				
				$comments_count.attr('data-count', count + 1);
				*/
			}
		},
		
		
	}
	methods.init();
	
	
});