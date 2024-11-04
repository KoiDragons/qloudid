/* - wp fade plugin */
function wp_fade($link, $target){
	var $fade = $('#wp_fade'),
		$window = $(window),
		window_width = $window.width(),
		window_height = $window.height(),
		current_window_width = 0,
		wp_fade_current = $fade.data('current'),
		wp_fade_timeout = $fade.data('timeout');
	
	if($fade.data('init') != true){
		$fade
			.on('click', function(){
				wp_fade('hide', undefined);
				return false;
			})
			.data('init', true);
		
		$(document.body).on('click', '.popup .popup_close', function(){
			wp_fade('hide', $(this).closest('.popup'));
			return false;
		});
	}
	
	if($target && typeof $target == 'string'){
		$target = $($target);
	}
	
	var methods = {
		init : function(){
			if(typeof $link == 'string'){
				$link = $($link);
			}
			if($link[0]){
				$link.on('click', function(){
					methods.show();
					return false;
				});
			}
		},
		
		show : function(){
			$fade.data('current', $target);
			if(!$target.hasClass('show')){
				methods.update();
				methods.toggle();
				requestAnimationFrame(function(){
					$target.addClass('show');
					$fade.addClass('show');	
				});
			}
		},
		
		
		hide : function(global){
			clearTimeout(wp_fade_timeout);
			if(global){
				$target = $('.popup.show');
			}
			$target.removeClass('show');
			$fade.removeClass('show');
			$fade.data('timeout', setTimeout(function(){ methods.toggle('hide'); }, 300));
		},
		
		toggle : function(state){
			if(state == 'hide'){
				$target.css('display', 'none');
				$fade.css('display', 'none');
			}
			else{
				$target.css('display', 'block');
				$fade.css('display', 'block');
			}
		},
		
		/* update on screen resize */
		update : function(){
			var target_height = $target.height();
			if(target_height > window_height){
				$target.css({
					'top' : $window.scrollTop() + 20
				});
			}
			else{
				$target.css({
					'top' : $window.scrollTop() + Math.round((window_height - target_height) / 2)
				});
			}
		},
		
	};
	
	if($link){
		if($link == 'show'){
			if($target){
				methods.show();
			}
		}
		else if($link == 'hide'){
			if($target){
				methods.hide();
			}
			else{
				methods.hide(true);
			}
		}
		else{
			if($target){
				methods.init();
			}
		}
	}
}

/* Activity data */
var activity_data = [{
	type		: 'payment',
	title		: 'India - Big Saver',
	date		: 'Sep 18, 2016 9:53 PM',
	amount		: '$0.01',
	sub_info	: '$1.98',
},{
	type		: 'call',
	title		: '+917404666539',
	date		: 'Sep 21, 2016 8:00 am',
	amount		: '$0.01',
	sub_info	: 'Duration 00:11:06 $0',
},{
	type		: 'call',
	title		: '+222222222222',
	date		: 'Aug 6, 2016 12:46 pm',
	amount		: '$0.01',
	sub_info	: 'Duration 00:11:06 $0',
},{
	type		: 'payment',
	title		: 'India - Big Saver',
	date		: 'Jul 18, 2016 9:53 PM',
	amount		: '$0.01',
	sub_info	: '$1.98',
},{
	type		: 'payment',
	title		: 'India - Big Saver 2',
	date		: 'Jul 13, 2016 8:53 PM',
	amount		: '$2.01',
	sub_info	: '$10.98',	
},{
	type		: 'call',
	title		: '+217404666539',
	date		: 'Sep 14, 2016 8:00 am',
	amount		: '$0.01',
	sub_info	: 'Duration 00:11:06 $0',
},{
	type		: 'call',
	title		: '+123131231231',
	date		: 'Aug 9, 2016 12:46 pm',
	amount		: '$0.01',
	sub_info	: 'Duration 00:11:06 $0',
},{
	type		: 'payment',
	title		: 'India - Big Saver 4',
	date		: 'Jul 16, 2016 9:53 PM',
	amount		: '$1.01',
	sub_info	: '$2.98',
},{
	type		: 'payment',
	title		: 'India - Big Saver 3',
	date		: 'Jul 14, 2016 8:53 PM',
	amount		: '$2.01',
	sub_info	: '$10.98',	
},{
	type		: 'call',
	title		: '+217404666539',
	date		: 'Sep 15, 2016 8:00 am',
	amount		: '$0.01',
	sub_info	: 'Duration 00:11:06 $0',
},{
	type		: 'call',
	title		: '+123131231231',
	date		: 'Aug 10, 2016 12:46 pm',
	amount		: '$0.01',
	sub_info	: 'Duration 00:11:06 $0',
},{
	type		: 'payment',
	title		: 'India - Big Saver 7',
	date		: 'Jul 7, 2016 9:53 PM',
	amount		: '$1.01',
	sub_info	: '$2.98',
}];


function show_sliding_modal(action, $target, $modals, $fade, $body){
	if(!$fade){ $fade = $('#slide_fade'); }
	if(!$body){ $body = $(document.body); }
	
	if($fade.data('init') != true){
		$fade
			.data('init', true)
			.on('click', function(){
				show_sliding_modal('hide', undefined, $modals, $fade, $body);
				return false;
			});
	}
	
	if(action == 'show'){
		$target.css('display', 'block');
		$fade.css('display', 'block');
		$body.addClass('showing_modal');
		requestAnimationFrame(function(){
			$target.addClass('show');
			$fade.addClass('show');
		});
	}
	else{
		if(!$target){
			$target = $modals.filter('.show');
		}
		$target
			.addClass('wp_animating')
			.removeClass('show');
		$fade
			.addClass('wp_animating')
			.removeClass('show');
		$body.removeClass('showing_modal');
		setTimeout(function(){
			$target
				.removeClass('wp_animating')
				.css('display', 'none');
			$fade
				.removeClass('wp_animating')
				.css('display', 'none');
		}, 250);
	}

}

$(document).ready(function() {
	var $window = $(window),
		$body = $(document.body);
	vex.defaultOptions.className = 'vex-theme-default';
	
	// Custom select
	$body.on('click', '.custom-html-select a', function(){
		var $this = $(this),
			$base = $this.closest('.custom-html-select'),
			$options = $base.find('.options');
			
		if($this.hasClass('select-trigger')){
			if($base.hasClass('opened')){
				$base.removeClass('opened');
			}
			else{
				$base.addClass('opened');
			}
		}
		else{
			var $trigger = $base.find('.select-trigger .current'),
				$input = $base.find('input');
			
			$trigger.html($this.html());
			$input.val($this.data('value'));
			$base.removeClass('opened');
		}
		
		return false;
	});
	
	$('.remove_closest').on('click', function(){
		var $this = $(this);
		$this.closest($this.data('target')).remove();
		return false;
	});
	
	/* Editable */
	/* Editable */
	$body.on('click', '.editable', function(){
		var $this = $(this);
		
		if($this.hasClass('edit-text')){
			var $edit_input = $('<input type="text" />');
			$edit_input
				.attr('class', $this.attr('class'))
				.addClass('post-edit-text wi_100 pad0 ff_inh nobrdt nobrdr nobrdl pink_bg')
				.removeClass('editable')
				.val($this.text().trim())
				.data('$el', $this);
			
			$this.replaceWith($edit_input);
			$edit_input.trigger('focus');
		}
		if($this.hasClass('edit-address')){
			clearTimeout($this.data('tm'));
			var $edit_input = $('<input type="text" />'),
				edit_input = $edit_input.get(0);
			$edit_input
				.attr('class', $this.attr('class'))
				.addClass('post-edit-address wi_100 pad0 ff_inh nobrdt nobrdr nobrdl pink_bg')
				.removeClass('editable')
				.val($this.text().trim())
				.data('$el', $this)
				.on('keypress', function(e){
					if(e.which == 13) {
						$(this).trigger('blur');
						return false;
					}
				})
			
			$this.replaceWith($edit_input);
			$edit_input.trigger('focus');
			
			//var searchBox = new google.maps.places.SearchBox(edit_input);
			//var searchBox = new google.maps.places.Autocomplete(edit_input);
		}
		else if($this.hasClass('edit-phone')){
			var $edit_input = $('<input type="text" />');
			$edit_input
				.attr('class', $this.attr('class'))
				.addClass('post-edit-text post-edit-phone wi_100 pad0 ff_inh nobrdt nobrdr nobrdl pink_bg')
				.removeClass('editable')
				.val($this.text().trim())
				.data('$el', $this);
			
			$this.replaceWith($edit_input);
			$edit_input.trigger('focus');
		}
		else if($this.hasClass('edit-select')){
			var $select_input = $('<select>'),
				options  = $this.data('options');
				
			if(options){
				options = options.split(',');
				var html = '';
				
				for(var i = 0, iL = options.length; i < iL; i++){
					html += '<option value="' + options[i] + '">' + options[i] + '</option>';
				}
				
				$select_input
					.append(html)
					.attr({
						'class': $this.attr('class'),
						'size' : options.length
					})
					.addClass('post-edit-select default wi_auto minwi_100 pos_abs zind5 top0 left0 pad0 ff_inh nobrdt nobrdr nobrdl pink_bg curp')
					.removeClass('editable curt')
					.data('$el', $this)
					.val($this.text())
					.on('click', function(){
						var $select = $(this),
							$editable = $select.data('$el'),
							val = $select.val();
						var send_data = {};
		
				send_data.user_id=document.getElementById('user_id').value;
				send_data.cid=$select.val();
			
		
				$.ajax({
			url: '../User/updateSex',
		type: 'POST',
		dataType: 'json',
		data: send_data
		})
		.done(function(data){
		})
		.fail(function(){})
		.always(function(){});
						if(val.length <= 0){
							val = '&nbsp;&nbsp;&nbsp;';
						}
						$editable
							.html(val)
							.css('visibility', 'visible')
						$select.remove();
						return false;
					});
					
				$this
					.css('visibility', 'hidden')
					.parent()
						.css('position', 'relative')
						.append($select_input);
			}
			
		}
		else if($this.hasClass('edit-datepicker')){
			var $edit_input = $('<input type="text" />');
			$edit_input
				.attr('class', $this.attr('class'))
				.addClass('post-edit-datepicker wi_100 pad0 ff_inh nobrdt nobrdr nobrdl pink_bg')
				.removeClass('editable')
				.val($this.text().trim())
				.data('$el', $this);
			
			$this.replaceWith($edit_input);
			$edit_input.datepicker({
				onClose : function(){
					var $dt = $(this),
						$editable = $dt.data('$el'),
						val = $dt.val();
					var send_data = {};
		
				send_data.user_id=document.getElementById('user_id').value;
				send_data.cid=$dt.val();
			
		
				$.ajax({
			url: '../User/updateDate',
		type: 'POST',
		dataType: 'json',
		data: send_data
		})
		.done(function(data){
		})
		.fail(function(){})
		.always(function(){});
		
					if(val.length <= 0){
						val = '&nbsp;&nbsp;&nbsp;';
					}
					$dt.datepicker('destroy');
					$editable.html(val);
					$dt.replaceWith($editable);
				},
			});
			
			$edit_input.trigger('focus');
		}
		
		return false;
	});
	$body.on('blur', '.post-edit-text', function(){
		var $this = $(this),
			$editable = $this.data('$el'),
			val = $this.val();
		var send_data = {};
		
				send_data.user_id=document.getElementById('user_id').value;
				send_data.cid=$this.val();
			if($this.hasClass('jain'))
			{
			send_data.uid=1;	
			}
			else if($this.hasClass('jain1'))
			{
			send_data.uid=2;	
			}
			else if($this.hasClass('jain2'))
			{
			send_data.uid=2;	
			}
		
				$.ajax({
			url: '../User/updateUser',
		type: 'POST',
		dataType: 'json',
		data: send_data
		})
		.done(function(data){
		})
		.fail(function(){})
		.always(function(){});
		if(val.length <= 0){
			val = '&nbsp;&nbsp;&nbsp;';
		}
		$editable.html(val);
		$this.replaceWith($editable);
		
		return false;
	});
	$body.on('blur', '.post-edit-address', function(){
		var $this = $(this),
			$editable = $this.data('$el');
			
		
		$editable.data('tm', setTimeout(function(){
			var val = $this.val();
			
			var send_data = {};
		
				send_data.user_id=document.getElementById('user_id').value;
				send_data.cid=$this.val();
			
		
				$.ajax({
			url: '../User/updateAddress',
		type: 'POST',
		dataType: 'json',
		data: send_data
		})
		.done(function(data){
		})
		.fail(function(){})
		.always(function(){});
			
			if(val.length <= 0){
				val = '&nbsp;&nbsp;&nbsp;';
			}
			$editable.html(val);
			$this.replaceWith($editable);
		}, 100));
		return false;
	});
	$body.on('keydown', '.post-edit-phone', function(event){
		var allowed = ['0','1','2','3','4','5','6','7','8','9','+','=','(',')','Backspace','ArrowRight','ArrowLeft','Shift','Delete','End','Home'];
		console.log(event.key);
		if(allowed.indexOf(event.key) < 0){
			return false;
		}
	});
	$body.on('change', '.post-edit-phone', function(){
		var val = this.value.toString(),
			allowed = ['0','1','2','3','4','5','6','7','8','9','+','(',')'],
			mval = '';
		for(var i = 0, iL = val.length; i < iL; i++){
			if(allowed.indexOf(val.charAt(i)) > -1){
				mval += val.charAt(i);
			}
		}
		this.value = mval;
	});
	
	
	
	/* Toggle active */
	$body.on('ifChecked', 'input[type=checkbox].toggle-active', function(event){
		$(this).closest('.toggle-base').addClass('active');
	});
	$body.on('ifUnchecked', 'input[type=checkbox].toggle-active', function(event){
		var $base = $(this).closest('.toggle-base'),
			$inputs = $base.find('input[type=checkbox].toggle-active'),
			status = true;
			
		for(var i = 0, iL = $inputs.length; i < iL; i++){
			if($inputs.eq(i).get(0).checked){
				status = false;
				break;
			}
		}
		
		if(status){
			$base.removeClass('active');
		}
	});
	$body.on('click', 'a.toggle-active', function(event){
		$(this).toggleClass('active');
		return false;
	});
	
	
	/* Show wpdev modal */
	$body.on('click', '.show_wpmod', function(){
		var $this = $(this),
			$target = $($this.data('modal'));
		
		if($target[0]){
			$target.data('caller', $this);
			wp_fade('show', $target);
		}
		
		return false;
	});
	
	// Binded selects
	var $binded_selects = $('.binded-select');
	if($binded_selects[0]){
		var binded_source = [];
		
		var bd_methods = {
			
			init : function(){
				$binded_selects.on('change', function(){
					bd_methods.select_change($(this));
					return false;
				});
				
				// init root elements
				$('.binding-base').each(function(){
					bd_methods.refresh_data_source($(this).find('.binded_select1'));
				});
			},
			
			// on select change event
			select_change : function($select){
				var $base = $select.closest('.binding-base'),
					select_val = $select.val(),
					select_src = $select.data('src'),
					$target = [];
					
				if($select.hasClass('binded_select1')){
					$target = $base.find('.binded_select2');
					$base.find('.binded_select3').closest('.select-base').hide();
				}
				else if($select.hasClass('binded_select2')){
					$target = $base.find('.binded_select3');
				}
				
				if($target[0]){
					target_source = [];
					
					for(var i = 0, iL = select_src.length; i < iL; i++){
						if(select_val === select_src[i].value){
							target_source = select_src[i].items;
							break;
						}
					}
					$target.data('src', target_source);
					
					bd_methods.populate_select($target, select_val);
				}
				
			},
			
			// refresh main data source
			refresh_data_source : function($roots){
				try{ binded_source = eval($roots.data('source')); }
				catch(e){ binded_source = []; }
				
				$roots.data('src', binded_source);
				
				bd_methods.populate_select($roots);
			},
			
			// populate select with options
			populate_select : function($select, val){
				if(val !== '0'){
					var html = '<option value="0">-- Select --</option>',
						data = $select.data('src');
					
					for(var i = 0, iL = data.length; i < iL; i++){
						html += '<option value="' + data[i].value + '">' + data[i].title + '</option>';
					}
					
					$select
						.empty()
						.append(html)
						.closest('.select-base')
							.show();
				}
				else{
					$select
						.closest('.select-base')
							.hide();
				}
			},
			
		}
		bd_methods.init();
	}
	
	
	// Clone 
	var $clone_base = $('.clone-base, .clone-outer-base');
	if($clone_base[0]){
		var clone_methods = {
			
			add_inner : function($this){
				var $row = $this.closest('.clone-me');
				if(!$row.next()[0]){				
					var $clone = $row.clone(true),
						indx = parseInt($row.index()) + 1;
					
					// increment name attributes and restore to default values
					var $name_check = $clone.find('.name-check');
					if($name_check[0]){
						for(var i = 0, iL = $name_check.length; i < iL; i++){
							var $check = $name_check.eq(i),
								def_val = $check.data('default') ? $check.data('default') : '',
								def_name = $check.data('name');
							$check
								.val(def_val)
								.attr('name', def_name + indx)
						}
					}
					
					$clone.insertAfter($row);
				}
			},
			
			add_outer : function($btn){
				var $base = $btn.closest('.clone-base'),
					$rows = $base.find('.clone-me-outer'),
					$row = $rows.last(),
					$clone = $row.clone(true),
					indx = 'group_' + (parseInt($row.index()) + 1) + '_';
				
				// increment name attributes and restore to default values
				var $name_check = $clone.find('.name-check');
				if($name_check[0]){
					for(var i = 0, iL = $name_check.length; i < iL; i++){
						var $check = $name_check.eq(i),
							def_val = $check.data('default') ? $check.data('default') : '';
							def_name = $check.data('def-name');
							
						if(!def_name){
							def_name = $check.data('name');
							$check.data('def-name', def_name);
						}
						
						def_name = indx + def_name;
						
						$check
							.val(def_val)
							.attr({
								'name': def_name,
								'data-name' : def_name
							})
							.data('name', def_name);
					}
				}
				
				$clone.find('.clone-index').html((parseInt($row.index()) + 1));
				$clone.find('.binded-select.binded_select2, .binded-select.binded_select3').closest('.select-base').hide();
				$clone.find('.clone-base').each(function(){
					$(this).find('.clone-me:gt(0)').remove();
				});
				
				$rows.find('.expander-toggler.target_shown').trigger('click');
				
				$clone.insertAfter($row);
			},
		}
		
		$body.on('change', '.clone-check', function(){
			clone_methods.add_inner($(this));
			return false;
		});
		$body.on('click', '.clone-add', function(){
			clone_methods.add_outer($(this));
			return false;
		});
	}
	
	/* Populate me */
	var populate_me_init = function($populate_me){
		for(var i = 0, iL = $populate_me.length; i < iL; i++){
			var $populate = $populate_me.eq(i),
				source = $populate.data('source'),
				tag_name = $populate.data('tag');
			
			if(source){
				$populate
					.hide()
					.empty();
				
				try{ source = eval(source); }
				catch(e){ source = {items : []}; }
				
				var html = '';
				
				for(var s = 0, sL = source.items.length; s < sL; s++){
					var current_source = source.items[s];
					if(current_source.title){
						if(tag_name){
							html += '<' + tag_name + '>';
						}
						
						html += source.title_html.replace('value_here', current_source.title);
						
						if(tag_name){
							html += '</' + tag_name + '>';
						}
					}
					if(current_source.items){
						
						for(var t = 0, tL = current_source.items.length; t < tL; t++){
							var current_row = current_source.items[t];
							if(tag_name){
								html += '<' + tag_name + '>';
							}
							
							for(var val in current_row){
								if(current_row.hasOwnProperty(val)){
									html += source[val + '_html'].replace('value_here', current_row[val]);
								}
							}
							
							if(tag_name){
								html += '</' + tag_name + '>';
							}
						}
					}
				}
				
				$populate
					.append(html)
					.show();
			}
		}
	}
	var $populate_initial = $('.populate_me');
	if($populate_initial[0]){
		populate_me_init($populate_initial);
	}
	
	// Invokation
	var $invoke_add = $('.invoke_add');
	if($invoke_add[0]){
		var invoke_methods = {
			
			init : function(){
				$invoke_add.on('click', function(){
					var $this = $(this),
						$base = $this.closest('.invoke_base');
					
					if($base[0]){
						var $populate_me = $base.find('.populate_me'),
							$template = $base.find('.template'),
							source = $template.data('source');
						
						try{ source = eval(source); }
						catch(e){ source = {items : []}; }
						
						vex.open({
							unsafeContent: $template.html(),
							className: 'vex-theme-default invoke_add_modal',
							afterOpen: function(){
								var $vexContent = $(this.rootEl),
									$dynamics = $vexContent.find('.dynamic_select_population'),
									$form = $vexContent.find('form');
									
								if($dynamics[0]){
									for(var d = 0, dL = $dynamics.length; d < dL; d++){
										var $dynamic = $dynamics.eq(d),
											field = $dynamic.data('field'),
											html = [];
											
										
										for(var i = 0, iL = source.items.length; i < iL; i++){
											html += '<option value="' + source.items[i][field] + '">' + source.items[i][field] + '</option>';
										}
										$dynamic
											.empty()
											.append(html);
									}
								}
								
								if($form[0]){
									$form.data({
										'populate_me' 	: $populate_me,
										'source'		: source
									});
								}
								
							},
						});
						
					}
					
					
					return false;
				});
				
				$body.on('submit', '.invoke_add_modal form', function(){
					var $form = $(this),
						source = $form.data('source'),
						item = {},
						new_item = {};
					
					var title = $form.find('[name="title"]');
					for(var i = 0, iL = source.items.length; i < iL; i++){
						if(source.items[i].title == title.val()){
							item = source.items[i].items;
						}
					}
					
					var fields = $form.data('fields').split(','),
						$val = [], val = '';
					
					for(var i = 0, iL = fields.length; i < iL; i++){
						fields[i] = fields[i].trim();
						$val = $form.find('[name="' + fields[i] + '"]');
						
						if($val[0]){
							val = $val.val();
						}
						else{
							val = '';
						}
						
						new_item[fields[i]] = val;
					}
					
					
					
					item[item.length] = new_item;
					
					populate_me_init($form.data('populate_me'));
					
					vex.closeAll()
					return false;
				})
			},
			
		};
		invoke_methods.init();
		
		
	}
	
	/* Expander */
	$body.on('click', '.expander-toggler', function(){
		var $this = $(this),
			$parent = $($this.closest($this.data('parent')));
		
		console.log($parent);
		if($parent[0]){
			$target = $parent.find($this.attr('href'));
		}
		else{
			$target = $($this.attr('href'));
		}
			
		if($target[0]){
			if($target.is(":visible")){
				$this
					.removeClass('target_shown');
					
				$target
					.stop()
					.slideUp();
			}
			else{
				$this
					.addClass('target_shown');
					
				$target
					.stop()
					.slideDown();
			}
		}
		return false;
	});
	
	/* Sliding modal */
	var $slide_modal = $('.slide_modal'),
		$slide_fade = $('#slide_fade');
	$body.on('click', '.show_slide_modal', function(){
		var $this = $(this),
			target = $this.data('target'),
			$target = [];
		
		if(target){
			$target = $slide_modal.filter(target);
		}
		else{
			$target = $slide_modal.filter('#slide_modal');
		}
		
		var $content = $(this).closest('.base').find('.content_for_modal');
		if($content[0]){
			$target.find('.modal_content')
				.empty()
				.append($content.html())
				.append('<div class="clearfix"></div>');
			
			if($content.hasClass('apply_tinymsi')){
				tinyMCE.init({
					selector: '#slide_modal textarea',
					plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
					toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
					menubar: false,
					toolbar_items_size: 'small',
					style_formats: [
					{
						title: 'Bold text',
						inline: 'b'
					},
					{
						title: 'Red text',
						inline: 'span',
						styles:
						{
							color: '#ff0000'
						}
					},
					{
						title: 'Red header',
						block: 'h1',
						styles:
						{
							color: '#ff0000'
						}
					},
					{
						title: 'Example 1',
						inline: 'span',
						classes: 'example1'
					},
					{
						title: 'Example 2',
						inline: 'span',
						classes: 'example2'
					},
					{
						title: 'Table styles'
					},
					{
						title: 'Table row 1',
						selector: 'tr',
						classes: 'tablerow1'
					}],
					templates: [
					{
						title: 'Test template 1',
						content: 'Test 1'
					},
					{
						title: 'Test template 2',
						content: 'Test 2'
					}]
				});
			}
		}
		
		show_sliding_modal('show', $target, $slide_modal, $slide_fade, $body);
		return false;
	});
	$body.on('click', '.slide_modal .close', function(){
		show_sliding_modal('hide', $(this).closest('.slide_modal'), $slide_modal, $slide_fade);
		return false;
	});
	$body.on('click', '.active-base', function(){
		var $this = $(this);
		$this.toggleClass('active');
		
		if($this.hasClass('toggle-active-base')){
			var $base = $this.closest('.toggle-base');
			
			if($this.hasClass('activated')){
				$this.removeClass('activated');
				var $links = $base.find('.toggle-active-base.activated');
				
				if(!$links[0]){
					$base.removeClass('active');
				}
			}
			else{
				$this.addClass('activated');
				$base.addClass('active');
			}
		}
		return false;
		
	});
	
	
	
	/* - wpdev columns start */
	var wd_upload_methods = {
		/* INIT */
		init : function(){
			// wpdev columns images
			var $wp_columns = $('.wp_columns_upload');
			if($wp_columns[0]){
				
				// show/hide Upload buttons on imgwrap
				$wp_columns.find('.imgwrap').on({
					'mouseenter' : function(){
						$(this).find('.load_button').show();
						return false;
					},
					'mouseleave' : function(){
						$(this).find('.load_button').hide();
						return false;
					}
				});
				
				$wp_columns.find('.load_button').on('click', function(){
					wd_upload_methods.show_cropit_upload($(this));
					$(this).closest('.subimage').find('.cropit-image-input').trigger('click');
					return false;
				});
				
				
			}
		},
		
		// - show Upload dialog window
		show_cropit_upload : function($link){
			var $wc_upload = $link.closest('.wp_columns_upload'),
				cropper_width = $wc_upload.attr('data-width'),
				cropper_height = $wc_upload.attr('data-height'),
				cropper_ratio = $wc_upload.attr('data-ratio');
			
			if(!cropper_width){ cropper_width = 150; }
			if(!cropper_height){ cropper_height = 150; }
			if(!cropper_ratio){ cropper_ratio = 2; }
			
			
			vex.open({
				unsafeContent: '<div><h3>Upload image</h3><div id="image-cropper" class="image-editor"><div class="cropit-image-preview" style="width: 120px; height: 120px;"></div><input class="cropit-image-zoom-input" type="range" min="0" max="1" step="0.01"><input class="cropit-image-input" type="file" accept="image/*"><button type="button" class="select-image-btn">Select new image</button><div class="button-area"><input id="vex-close-n-crop" type="button" class="btn-apply" style="width:100px;" value="OK" /></div></div></div>',
				contentCSS: {height:"350px"},
				afterOpen: function() {
					var $vexContent = $(this.rootEl);
					var $cropper = $vexContent.find('#image-cropper');
					$cropper.cropit({
						width: cropper_width,
						height: cropper_height,
						exportZoom : cropper_ratio,
						smallImage: 'stretch',
						maxZoom: 3,
						$zoomSlider: $vexContent.find('.cropit-image-zoom-input'),
						initialZoom: 'image'
					});
					$vexContent.find('.select-image-btn').on('click', function(){
						$vexContent.find('.cropit-image-input').trigger('click');
						return false;
					});
					$vexContent.find('.cropit-image-input').trigger('click');
					$vexContent.find('#vex-close-n-crop').on('click', function(){
						$link.closest('.imgwrap').find('.cropped_image')
							.addClass('cropped_image_added')
							.css('background-image', 'url(' + $cropper.cropit('export') + ')');
						$vexContent.find('.vex-close').trigger('click');
						//vex.close();
						return false;
					});
				},
				afterClose: function() {}
			});
		},
	}
	wd_upload_methods.init();
	
	/* - wpdev columns end */
	
	// boolean control
	var $boolean_controls = $('.boolean-control');
	if($boolean_controls[0]){
		var boolean_controls_select = function($option){
			var $boolean_control = $option.closest('.boolean-control'),
				$boolean = $boolean_control.find('input[type="checkbox"]'),
				$target = $($boolean.data('target'))
			
			if($option.attr('data-value') === 'true'){
				$boolean.get(0).checked = true;
				$boolean_control.addClass('checked');
				if($target[0]){
					$target
						.stop()
						.slideDown();
				}
			}
			else{
				$boolean.get(0).checked = false;
				$boolean_control.removeClass('checked');
				if($target[0]){
					$target
						.stop()
						.slideUp();
				}
			}
		}
		
		var $current = $form_control = $boolean = [],
			o = oL = 0,
			checked = false;
			
		for(var i = 0, iL = $boolean_controls.length; i < iL; i++){
			$current = $boolean_controls.eq(i);
			if($current.data('init') != true){
				$boolean = $current.find('input[type="checkbox"]');
				checked = $boolean.get(0).checked;
					
				if(checked){
					$current.addClass('checked');
				}
					
				var html = '<div class="boolean-control-wrap"><div class="boolean-control-options">';
				html += '<a href="#" data-value="true" class="boolean-control-option true">' + $boolean.attr('data-true') + '</a>';
				html += '<a href="#" data-value="false" class="boolean-control-option false">' + $boolean.attr('data-false') + '</a>';
				html += '<div class="clear"></div></div></div>';
				$current
					.data('init', true)
					.append(html);
			}
		}
			
		
		$body.on('click', '.boolean-control-option', function(){
			boolean_controls_select($(this));
			return false;
		});
		
	}
	
		
	// Activity
	var months = {'Jan' : 0,'Feb' : 1,'Mar' : 2,'Apr' : 3, 'May' : 4,'Jun' : 5,'Jul' : 6,'Aug' : 7,'Sep' : 8,'Oct' : 9, 'Nov' : 10,'Dec' : 11},
		months_names = ['January','February','March','April','May','June','July','August','September','October','November','December'];
	var methods = {
		
		// Init
		init : function(){
			var $tab_activity = $('#tab_activity'),
				$tab_calls = $('#tab_calls'),
				$tab_payments = $('#tab_payments'),
				data = [];
			
			// in case somebody forgets to include activity data
			try{
				data = activity_data;
			}
			catch(e){
				data = [];
			}
			
			if(($tab_activity[0] || $tab_calls[0] || $tab_payments[0]) && data.length > 0){
				data = methods.prepare_info(data);
				
				if($tab_activity[0]){
					methods.populate_tab(data, $tab_activity);
				}
				if($tab_calls[0]){
					var calls_data = [];
					for(var i = 0, iL = data.length; i < iL; i++){
						if(data[i].type == 'call'){
							calls_data[calls_data.length] = data[i];
						}
					}
					methods.populate_tab(calls_data, $tab_calls);
				}
				if($tab_payments[0]){
					var payment_data = [];
					for(var i = 0, iL = data.length; i < iL; i++){
						if(data[i].type == 'payment'){
							payment_data[payment_data.length] = data[i];
						}
					}
					methods.populate_tab(payment_data, $tab_payments);
				}
			}
		},
		
		//Prepare info
		prepare_info : function(data){
			var parsed_data = [],
				current_data = {},
				ds_1 = ds_2 = ds_3 = ds_4 = [],
				date_obj;
			
			for(var i = 0, iL = data.length; i < iL; i++){
				current_data = data[i];
				ds_1 = current_data.date.trim().split(','),
				ds_2 = ds_1[0].trim().split(' '),
				ds_3 = ds_1[1].trim().split(' ');
				ds_4 = ds_3[1].trim().split(':');
				ds_3[2] = ds_3[2].trim().toLowerCase();
				ds_4[0] = parseInt(ds_4[0]);
				
				
				date_obj = new Date();
				date_obj.setYear(ds_3[0]);
				date_obj.setMonth(months[ds_2[0]]);
				date_obj.setDate(ds_2[1]);
				if(ds_3[2] == 'pm' && ds_4[0] < 12){
					ds_4[0] = ds_4[0] + 12;
				}
				date_obj.setHours(ds_4[0]);
				date_obj.setMinutes(ds_4[1]);
				
				current_data.parsed_date = {
					date	: date_obj,
					month	: months[ds_2[0]],
					day		: ds_2[1],
					year	: ds_3[0],
					time	: ds_3[1] + ' ' + ds_3[2]
				}
				current_data.date_ms = date_obj.getTime();
				parsed_data[i] = current_data;
			}
			
			calendar_data = methods.sortBy(parsed_data, { prop: "date_ms" });
			return parsed_data;
		},
		
		// Populate tab
		populate_tab : function(data, $cont){
			var $table = $cont.find('table'),
				current_month = data_month = '',
				cd = {}, icon,
				limit = $cont.attr('data-limit'),
				count = 0;
				
			// limit a number of displayed items
			if(limit){ limit = parseInt(limit); }
			
			// create and append table is it is not present in the container
			if(!$table[0]){
				$table = $('<table class="wi_100" cellpadding="0" cellspacing="0"></table>')
				$cont.append($table);
			}
			
			// hide table before appending all those rows
			$table
				.hide()
				.empty();
			
			// loop
			for(var i = data.length - 1; i >= 0; i--){
				count++;
				if(limit && count >= limit){
					break;
				}
				cd = data[i];
				icon = '';
				if(cd.type == 'call'){ icon = 'bwi_icon bwi_icon13'; }
				else if(cd.type == 'payment'){ icon = 'bwi_icon bwi_icon16'; }
				
				data_month = months_names[cd.parsed_date.month];
				
				if(current_month != data_month){
					current_month = data_month;
					$table.append('	<tr>\
										<td colspan="3" class="padtb20 brdb">\
											<h3 class="padt10 fsz22 dark_grey_txt">' + current_month + ', ' + cd.parsed_date.year + '</h3>\
										</td>\
									</tr>');
				}
				
				$table.append('	<tr>\
									<td class="wi_36p padr15 brdb valm talr">\
										<div class="' + icon + ' brd"></div>\
									</td>\
									<td class="content-cell padtb30 valm brdb">\
										<h3 class="padb5 fsz22 dark_grey_txt">' + cd.title + '</h3>\
										<div class="date fsz12">' + cd.date + '</div>\
									</td>\
									<td class="secondary-cell brdb wi_25 valm talr">\
										<span class="top_info dblock fsz20">' + cd.amount + '</span>\
										<span class="bot_info fsz12">' + cd.sub_info + '</span>\
									</td>\
								</tr>');
			}
			
			// show table
			$table.show();
		},
		
		/* sort object by property */
		sortBy : (function () {
			var _toString = Object.prototype.toString,
				_parser = function (x) { return x; },
				_getItem = function (x) {
					return this.parser((x !== null && typeof x === "object" && x[this.prop]) || x);
				};

			// Creates a method for sorting the Array
			// @array: the Array of elements
			// @o.prop: property name (if it is an Array of objects)
			// @o.desc: determines whether the sort is descending
			// @o.parser: function to parse the items to expected type
			return function (array, o) {
				if (!(array instanceof Array) || !array.length)
					return [];
				if (_toString.call(o) !== "[object Object]")
					o = {};
				if (typeof o.parser !== "function")
					o.parser = _parser;
				o.desc = !!o.desc ? -1 : 1;
				return array.sort(function (a, b) {
					a = _getItem.call(o, a);
					b = _getItem.call(o, b);
					return o.desc * (a < b ? -1 : +(a > b));
				});
			};

		}()),
	}
	methods.init();
	
	// Filter list input
	$('.filter_list_input').on('keyup', function(){
		var $this = $(this),
			$rows = $this.data('rows'),
			title = $this.attr('data-filter-tag'),
			val = $this.val().toLowerCase();
		
		if(!$rows){
			$rows = $('#' + $this.attr('data-id')).find($this.attr('data-row-tag'));
			$this.data('rows', $rows);
		}
		
		if($rows[0]){
			var $crow = [];
			for(var i = 0, iL = $rows.length; i < iL; i++){
				$crow = $rows.eq(i);
				if($crow.find(title).html().toLowerCase().indexOf(val) >= 0){
					$crow.removeClass('hide');
				}
				else{
					$crow.addClass('hide');
				}
			}
		}
		return false;
	});
	
	// Lists and Cell 
	$("tr:odd").addClass("odd");
	$("li:first-child").addClass("first");
	$("li:last-child").addClass("last");
	$("li.click_slect_list").click(function() {
		$("li.click_slect_list").removeClass("selected");
		$(this).addClass("selected");
	});
	
	// Tooltip
	$(".tooltip").tooltip({
		track: true
	});
	
	// Superfish
	$('ul.sf-menu ').superfish();
	
	// Slider range
	$("#slider-range").slider({
		range: true,
		min: 0,
		max: 500,
		values: [75, 300],
		slide: function(event, ui) {
			$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
		}
	});
	$("#amount").val("$" + $("#slider-range").slider("values", 0) +	" - $" + $("#slider-range").slider("values", 1));
	
	// Selectric
	$('select.selectric').selectric();
	
	// Datepicker
	$(".datepicker2").datepicker();
	$(".datepicker").datepicker({
		showOn: "button",
		buttonImage: "images/calendar.png",
		buttonImageOnly: true
	});
	$(".date_picker_bx").datepicker({
		showOn: "button",
		buttonImage: "images/yellow_date_ico.png",
		buttonImageOnly: true
	});
	$("#datepicker").datepicker({
		showOn: "button",
		buttonImage: "images/calendar.png",
		buttonImageOnly: true
	});
	
	// Accordion
	$("#accordion").accordion({
		heightStyle: "content"
	});
	
	// Prdt tabs
	$(".prdt_tabs").tabs();
	
	// iCheck
	$('input:not(.default)').iCheck({
		checkboxClass: 'icheckbox_minimal-aero',
		radioClass: 'iradio_minimal-aero',
		increaseArea: '20%' // optional
	});
	$('input.minicheck').iCheck({
		checkboxClass: 'icheckbox_futurico',
		radioClass: 'iradio_futurico',
		increaseArea: '20%' // optional
	});
	$('input.check_all').on('ifChecked', function(event){
		$(this).closest('form').find('input.check').iCheck('check');
	});
	$('input.check_all').on('ifUnchecked', function(event){
		$(this).closest('form').find('input.check').iCheck('uncheck');
	});
	
	
	// Collapsible 
	$('.collapsible').hide();
	$('.collapsible:first').show();
	$('.collapsible_menu h3:first').addClass("active");
	$(".collapsible_menu > h3").click(function() {
		$(this).toggleClass("active");
		$(this).next(".collapsible").slideToggle(500);
		//$(this).siblings("li").removeClass("active");
	});
	
	
	// Scroll menu
	var $scroll_menu = $('#scroll_menu');
	if ($scroll_menu[0]) {
		var $menu_header = $('.scroll_menu_header');
		if ($menu_header[0]) {
			var $html_body = $('html, body');

			var $menu = $(document.createElement('UL')),
				$current = [],
				$li, $link;

			$menu.addClass('mar0');

			for (var i = 0, iL = $menu_header.length; i < iL; i++) {
				
				if(i<=3)
						{
							var a= "#";
							var b= "dark_grey_txt";
							var c= 'color: #4a4a4a';
						}
						else if(i==4)
						{
							var a = "http://www.qmatchup.com/beta/edit_user_social.php?id="+c_id+"&description=1";
							var b= "dark_red_txt";
							var c= 'color: #e82323';
						}
						else if(i==5)
						{
							var a = "http://www.qmatchup.com/beta/profile-private-company-employee.php?id="+c_id;
							var b= "dark_red_txt";
							var c= 'color: #e82323';
						}
						else if(i==6)
						{
							var a = "http://qmatchup.com/beta/company/index.php/ManageCompany";
							var b= "dark_red_txt";
							var c= 'color: #e82323';
						}
						else if(i==7)
						{
							var a = "http://www.qmatchup.com/beta/public_user_company_detail.php?id="+c_id+"&uid="+empid;
							var b= "dark_red_txt";
							var c= 'color: #e82323';
						}
				$current = $menu_header.eq(i);
				$current.attr('id', 'scroll_menu_header' + i);

				$li = $(document.createElement('LI'));
				$li.addClass('dblock padtb5');

				$link = $(document.createElement('A'));
				if ($current.attr('data-text')) {
					$link.html($current.attr('data-text'));
				} else {
					$link.html($current.text());
				}
				$link
					.attr({
						'style': ''+c,
						'href': '' + a,
						'data-id': 'scroll_menu_header' + i
					})
					.addClass(b)
					
					.on('click', function() {
						var $this = $(this),
							$element = $('#' + $this.attr('data-id'));

						/*
						$this
							.addClass('active')
							.parent().siblings()
								.find('.active').removeClass('active');
						*/
					if($this.hasClass("dark_red_txt"))
					{
						window.location.href = ''+ a;
					}
					else
					{
						$html_body.animate({
							scrollTop: $element.offset().top - 75
						}, 500);
						return false;
					}
						
					})
						
					.appendTo($li);

				$menu.append($li);
			}
			$scroll_menu.append($menu);

			var window_half_height = $window.height() / 2;
			$window.on('scroll.scroll_menu', function() {
				var scroll_top = $window.scrollTop();

				for (var i = 0, iL = $menu_header.length; i < iL; i++) {
					var $current = $menu_header.eq(i),
						current_top = $current.offset().top;

					if (current_top - 80 < scroll_top) {

						var $link = $scroll_menu.find('a[data-id="' + $current.attr('id') + '"]');
						$link
							.addClass('active')
							.parent().siblings()
							.find('.active').removeClass('active');
					}
				}

				return false;
			});

		} else {
			$menu_header.hide();
		}
	}

	
	// Scroll fix
	var $scroll_fix = $('.scroll-fix');
	if ($scroll_fix[0]) {
		$scroll_fix.each(function() {
			var $this = $(this);
			$this
				.css('height', $this.find('.scroll-fix-wrap').height())
				.find('.scroll-fix-wrap')
				.css('width', $this.width());
		});

		var $current_scroll = [];
		$window.on('scroll.scroll_fix', function() {
			var scroll_top = $window.scrollTop();

			for (var i = 0, iL = $scroll_fix.length; i < iL; i++) {
				$current_scroll = $scroll_fix.eq(i);

				if ($current_scroll.offset().top < scroll_top + 75) {
					$current_scroll.addClass('affix');
				} else {
					$current_scroll.removeClass('affix');
				}
			}
			return false;
		});
	}


	// Tabs
	var $tabs_links = $('.tab-header a');
	$tabs_links.on('click', function() {
		var $this = $(this);
		if ($this.parent().get(0).tagName == 'LI') {
			$this
				.parent()
				.addClass('active')
				.siblings('.active')
				.removeClass('active');
		}

		$this.closest('.tab-header').find('a.active').removeClass('active');
		$this.addClass('active');

		var $tab = $('#' + $this.attr('data-id'));
		$tab.siblings('.active')
			.removeClass('active')
			.hide();

		$tab
			.addClass('active')
			.show();

		return false;
	})
	$tabs_links.filter('.active').trigger('click');
	
	// Tabs select
	$('select.tab-header')
		.on('change', function(){
			var $tab = $('#' + $(this).val());
			$tab.siblings('.active')
				.removeClass('active')
				.hide();

			$tab
				.addClass('active')
				.show();
				
			return false;
		})
		.trigger('change');
	
	
	


	/* VEX */

	var $doc_body = $(document.body);
	
	// Deals : show
	$doc_body.on('click', '.vex_manage_deal_caller', function(e) {
		var $cell = $(this).closest('tr').find('.content-cell'),
			$vex_content = $('	<div class="card_modal">\
									<h3 class="padb5 bold talc fsz18">' + $cell.find('h3').html() + '</h3>\
									<div class="padb5 brdb talc fsz12">' + $cell.find('.date').html() + '</div>\
									<div class="pad20 brdb"><a href="#" class="renew_deal_button fsz16 dark_grey_txt">Renew</a></div>\
								</div>');
		vex.defaultOptions.className = 'vex-theme-os vex-phone-modal'					
		vex.open({
			unsafeContent: $vex_content.html(),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	
	
	// Employee: show
	$doc_body.on('click', '.vex_employee_caller', function(e) {
		var $row = $(this).closest('tr').clone(true),
			$html = $('	<div class="card_modal">\
							<h3 class="padb5 bold talc fsz18">' + $row.find('h3').html() + '</h3>\
							<div class="padb5 brdb talc fsz12">' + $row.find('.sub').html() + '</div>\
							<div class="pad20 brdb">\
								<a href="#" class="delete_button fsz16 dark_grey_txt" data-id="' + $row.attr('id') + '">Delete</a>\
							</div>\
							<div class="pad20">\
								<a href="#" class="cancel_button fsz16 midgrey_txt">Cancel</a>\
							</div>\
						</div>');

		vex.defaultOptions.className = 'vex-theme-os vex-phone-modal';

		vex.open({
			unsafeContent: $html.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	// Employee: add
	$('.vex_addemployee_caller').on('click', function() {
		var $link = $(this),
			$template = $('#vex_modal_employee_content .vex_inner').clone(true);
		vex.defaultOptions.className = 'vex-theme-os vex-payment-modal';

		$template.find('form')
			.on('submit', function() {
				var $form = $(this),
					$table = $link.closest('.column_m').find('table tbody'),
					new_id = $table.children().length + 1,
					name = $form.find('#inputEmpName').val(),
					lname = $form.find('#inputEmpLname').val(),
					email = $form.find('#inputEmpEmail').val(),
					phone = $form.find('#inputEmpPhone').val(),
					title = $form.find('#inputEmpTitle').val();

				$table.append('	<tr id="employee_row' + new_id + '">\
									<td class="wi_36p padr15 brdb valm">\
										<div class="bwi_icon bwi_icon17 brd"></div>\
									</td>\
									<td class="content-cell padtb30 valm brdb">\
										<h3 class="padb5 fsz22">' + name + ' ' + lname + '</h3>\
										<div class="sub fsz12">' + title + '</div>\
									</td>\
									<td class="brdb wi_36p padl15 valm">\
										<a href="#" class="vex_employee_caller dotted_btn brd bold dark_grey_txt" data-id="employee_row' + new_id + '">\
											...\
										</a>\
									</td>\
								</tr>');

				$form.closest('.vex').find('.vex-close').trigger('click');
				return false;
			});

		vex.open({
			unsafeContent: $template.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});

	
	// Phone: show
	$doc_body.on('click', '.vex_phone_caller', function(e) {
		var $row = $(this).closest('tr').clone(true),
			$html = $('	<div class="card_modal">\
							<h3 class="padb5 bold talc fsz18">' + $row.find('h3').html() + '</h3>\
							<div class="padb5 brdb talc fsz12">' + $row.find('.location').html() + '</div>\
							<div class="pad20 brdb">\
								<a href="#" class="set_button fsz16 dark_grey_txt" data-id="' + $row.attr('id') + '">Set as primary</a>\
							</div>\
							<div class="pad20 brdb">\
								<a href="#" class="delete_button fsz16 dark_grey_txt" data-id="' + $row.attr('id') + '">Delete</a>\
							</div>\
							<div class="pad20">\
								<a href="#" class="cancel_button fsz16 midgrey_txt">Cancel</a>\
							</div>\
						</div>');

		vex.defaultOptions.className = 'vex-theme-os vex-phone-modal';

		vex.open({
			unsafeContent: $html.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	// Phone: add
	$('.vex_addphone_caller').on('click', function() {
		var $link = $(this),
			$template = $('#vex_modal_addphone_content .vex_inner').clone(true);
		vex.defaultOptions.className = 'vex-theme-os vex-addphone-modal';

		$template.find('form')
			.on('submit', function() {
				var $form = $(this),
					cl = $form.find('#inputPhoneType').val(),
					$table = $link.closest('.column_m').find('table').filter('.' + cl).find('tbody'),
					new_id = $table.children().length + 1,
					phone_number = $form.find('#inputPhoneNumber').val();

				$table.append('	<tr id="' + cl + '_row' + new_id + '">\
									<td class="wi_36p padr15 brdb valm">\
										<div class="bwi_icon bwi_icon13 brd"></div>\
									</td>\
									<td class="content-cell padtb30 valm brdb">\
										<h3 class="padb5 fsz22">' + phone_number + '</h3>\
										<div class="sub fsz12">Mobile, Kazakhstan</div>\
									</td>\
									<td class="brdb wi_36p padl15 valm">\
										<a href="#" class="vex_phone_caller dotted_btn brd bold dark_grey_txt" data-id="' + cl + '_row' + new_id + '">\
											...\
										</a>\
									</td>\
								</tr>');

				$form.closest('.vex').find('.vex-close').trigger('click');
				return false;
			});

		vex.open({
			unsafeContent: $template.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	
	
	// Email: show
	$doc_body.on('click', '.vex_email_caller', function(e) {
		var item_html = $(this).closest('tr').find('.content-cell').html(),
			$vex_content = $('#vex_modal_content');

		item_html = '<div class="pad30 talc">' + item_html + '</div>';

		$vex_content
			.empty()
			.append(item_html);

		vex.defaultOptions.className = 'vex-theme-os vex-phone-modal'

		vex.open({
			unsafeContent: $vex_content.html(),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	// Email : add
	$('.vex_addemail_caller').on('click', function() {
		var $table = $(this).closest('.column_m').find('table tbody');
		var $template = $('#vex_modal_addemail_content .vex_inner').clone(true);
		vex.defaultOptions.className = 'vex-theme-os vex-addphone-modal';

		$template.find('form')
			.on('submit', function() {
				var $form = $(this),
					new_id = $table.children().length + 1,
					email = $form.find('#inputEmailNumber').val();

				$table.append('	<tr id="email_row' + new_id + '">\
									<td class="wi_36p padr15 brdb valm">\
										<div class="bwi_icon bwi_icon13 brd"></div>\
									</td>\
									<td class="content-cell padtb30 valm brdb">\
										<h3 class="padb5 fsz22">' + email + '</h3>\
										<div class="fsz12">Mobile, Kazakhstan</div>\
									</td>\
									<td class="brdb wi_36p padl15 valm">\
										<a href="#" class="vex_email_caller dotted_btn brd bold dark_grey_txt" data-id="email_row' + new_id + '">\
											...\
										</a>\
									</td>\
								</tr>');

				$form.closest('.vex').find('.vex-close').trigger('click');
				return false;
			});

		vex.open({
			unsafeContent: $template.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	
	
	// Address: show
	$doc_body.on('click', '.vex_address_caller', function(e) {
		var $row = $(this).closest('tr').clone(true),
			$html = $('	<div class="card_modal">\
							<h3 class="padb5 bold talc fsz18">' + $row.find('h3').html() + '</h3>\
							<div class="padb5 brdb talc fsz12">' + $row.find('.sub').html() + '</div>\
							<div class="pad20 brdb">\
								<a href="#" class="set_button fsz16 dark_grey_txt" data-id="' + $row.attr('id') + '">Set as primary</a>\
							</div>\
							<div class="pad20 brdb">\
								<a href="#" class="delete_button fsz16 dark_grey_txt" data-id="' + $row.attr('id') + '">Delete</a>\
							</div>\
							<div class="pad20">\
								<a href="#" class="cancel_button fsz16 midgrey_txt">Cancel</a>\
							</div>\
						</div>');

		vex.defaultOptions.className = 'vex-theme-os vex-phone-modal';

		vex.open({
			unsafeContent: $html.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	// Address: add
	$('.vex_addaddress_caller').on('click', function() {
		var $link = $(this),
			$template = $('#vex_modal_address_content .vex_inner').clone(true);
		vex.defaultOptions.className = 'vex-theme-os vex-address-modal';

		$template.find('form')
			.on('submit', function() {
				var $form = $(this),
					cl = $form.find('#inputAddressType').val(),
					$table = $link.closest('.column_m').find('table').filter('.' + cl).find('tbody'),
					new_id = $table.children().length + 1,
					street = $form.find('#inputAddressName').val(),
					city = $form.find('#inputAddressCity').val(),
					zip = $form.find('#inputAddressZip').val(),
					country = $form.find('#inputAddressCountry').val(),
					bot_address = '';

				if (city) {
					if (bot_address.length > 0) {
						bot_address += ', ';
					}
					bot_address += city;
				}
				if (zip) {
					if (bot_address.length > 0) {
						bot_address += ', ';
					}
					bot_address += zip;
				}
				if (country) {
					if (bot_address.length > 0) {
						bot_address += ', ';
					}
					bot_address += country;
				}

				$table.append('	<tr id="' + cl + '_row' + new_id + '">\
									<td class="wi_36p padr15 brdb valm tal">\
										<div class="bwi_icon bwi_icon15 brd"></div>\
									</td>\
									<td class="dtablecell content-cell padtb30 valm brdb">\
										<h3 class="padb5 fsz22">' + street + '</h3>\
										<div class="sub fsz12">' + bot_address + '</div>\
									</td>\
									<td class="brdb wi_36p padl15 valm">\
										<a href="#" class="vex_address_caller dotted_btn brd bold dark_grey_txt" data-id="' + cl + '_row' + new_id + '">\
											...\
										</a>\
									</td>\
								</tr>');

				if ($table.children().length > 1) {
					$table.find('#addresses_row0').addClass('hide');
				}

				$(this).closest('.vex').find('.vex-close').trigger('click');
				return false;
			})
			.find('.back_btn')
			.on('click', function() {
				var $form_2 = $(this).closest('form');
				$form_2
					.addClass('hide')
					.siblings('.form_1')
					.removeClass('hide');
				return false;
			});

		vex.open({
			unsafeContent: $template.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	
	
	// Card : show
	$doc_body.on('click', '.vex_payment_card_caller', function(e) {
		var $row = $(this).closest('tr').clone(true);

		var $html = $('	<div class="card_modal">\
							<h3 class="padb5 bold talc fsz18">' + $row.find('h3').html() + '</h3>\
							<div class="padb5 brdb talc fsz12">' + $row.find('.expire').html() + '</div>\
							<div class="pad20 brdb">\
								<a href="#" class="set_button fsz16 dark_grey_txt" data-id="' + $row.attr('id') + '">Set as primary<br/><span class="fsz10">This payment method will be charged</span></a>\
							</div>\
							<div class="pad20 brdb">\
								<a href="#" class="delete_button fsz16 dark_grey_txt" data-id="' + $row.attr('id') + '">Delete</a>\
							</div>\
							<div class="pad20">\
								<a href="#" class="cancel_button fsz16 midgrey_txt">Cancel</a>\
							</div>\
						</div>');

		vex.defaultOptions.className = 'vex-theme-os vex-phone-modal'

		vex.open({
			unsafeContent: $html.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	// Card : set primary card
	$doc_body.on('click', '.card_modal .set_button', function(e) {
		var $this = $(this),
			$row = $('#' + $this.attr('data-id'));

		if (!$row.hasClass('prime_wrap')) {
			$row
				.addClass('prime_wrap')
				.find('.sub')
				.addClass('hide')
				.end()
				.find('.content-cell')
				.append('<div class="prime fsz12"><span class="aio_icon aio_icon--check valm"></span><span class="valm green_txt">Primary Payment</span></div>');

			$row.siblings('.prime_wrap')
				.removeClass('prime_wrap')
				.find('.sub')
				.removeClass('hide')
				.end()
				.find('.prime')
				.remove();
		}

		$this.closest('.vex').find('.vex-close').trigger('click');
		return false;
	});
	// Card : delete card
	$doc_body.on('click', '.card_modal .delete_button', function(e) {
		var $this = $(this),
			$row = $('#' + $this.attr('data-id')),
			$table = $row.parent();

		if ($table.children().length <= 2) {
			$table.find('#payment_row0').removeClass('hide');
		}
		$row.remove();
		$this.closest('.vex').find('.vex-close').trigger('click');
		return false;
	});
	// Card : cancel
	$doc_body.on('click', '.card_modal .cancel_button', function(e) {
		var $this = $(this);
		$this.closest('.vex').find('.vex-close').trigger('click');
		return false;
	});
	// Card : add
	$('.vex_addcard_caller').on('click', function() {
		var $table = $(this).closest('.column_m').find('table tbody');
		var $template = $('#vex_modal_payment_content .vex_inner').clone(true);
		vex.defaultOptions.className = 'vex-theme-os vex-payment-modal';

		$template.find('.form_1')
			.on('submit', function() {
				$(this)
					.addClass('hide')
					.siblings('.form_2')
					.removeClass('hide');
				return false;
			});

		$template.find('.form_2')
			.on('submit', function() {
				var $form_1 = $(this).siblings('.form_1'),
					new_id = $table.children().length + 1,
					card_number = $form_1.find('#inputCardNumber').val();

				$table.append('	<tr id="payment_row' + new_id + '">\
									<td class="wi_36p padr15 brdb valm talr">\
										<img src="images/visa.png" />\
									</td>\
									<td class="content-cell padtb30 valm brdb">\
										<h3 class="padb5 fsz22">Visa *' + card_number.substring(card_number.length - 4, card_number.length) + '</h3>\
										<div class="sub fsz12">Expires ' + $form_1.find('#inputMonth').val() + '/' + $form_1.find('#inputYear').val() + '</div>\
									</td>\
									<td class="brdb wi_36p padl15 valm">\
										<a href="#" class="vex_payment_card_caller dotted_btn brd bold dark_grey_txt" data-id="payment_row' + new_id + '">\
											...\
										</a>\
									</td>\
								</tr>');

				if ($table.children().length > 1) {
					$table.find('#payment_row0').addClass('hide');
				}

				$(this).closest('.vex').find('.vex-close').trigger('click');
				return false;
			})
			.find('.back_btn')
			.on('click', function() {
				var $form_2 = $(this).closest('form');
				$form_2
					.addClass('hide')
					.siblings('.form_1')
					.removeClass('hide');
				return false;
			});

		vex.open({
			unsafeContent: $template.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	
	
	// Bank : show
	$doc_body.on('click', '.vex_bank_caller', function(e) {
		var $row = $(this).closest('tr').clone(true);

		var $html = $('	<div class="card_modal">\
							<h3 class="padb5 bold talc fsz18">' + $row.find('h3').html() + '</h3>\
							<div class="talc fsz12">' + $row.find('.clearing').html() + '</div>\
							<div class="padb5 brdb talc fsz12">' + $row.find('.account').html() + '</div>\
							<div class="pad20 brdb">\
								<a href="#" class="delete_button fsz16 dark_grey_txt" data-id="' + $row.attr('id') + '">Delete</a>\
							</div>\
							<div class="pad20">\
								<a href="#" class="cancel_button fsz16 midgrey_txt">Cancel</a>\
							</div>\
						</div>');

		vex.defaultOptions.className = 'vex-theme-os vex-phone-modal'

		vex.open({
			unsafeContent: $html.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	// Bank : add
	$('.vex_add_bank_caller').on('click', function() {
		var $table = $(this).closest('.column_m').find('table tbody');
		var $template = $('#vex_modal_bank_content .vex_inner').clone(true);
		vex.defaultOptions.className = 'vex-theme-os vex-payment-modal';

		$template.find('form')
			.on('submit', function() {
				var $this = $(this),
					new_id = $table.children().length + 1,
					name = $this.find('#inputBankName').val(),
					clearing = $this.find('#inputClearing').val(),
					account = $this.find('#inputAccount').val();
					
				$table.append('	<tr class="prime_payment" id="bank_row' + new_id + '">\
									<td class="wi_36p padr15 brdb valm talr">\
										<img src="images/banks/handelsbanken.png" width="72" />\
									</td>\
									<td class="content-cell padtb30 valm brdb">\
										<h3 class="padb5 fsz22">' + name + '</h3>\
										<div class="clearing fsz12">Clearing number: ' + clearing + '</div>\
										<div class="account fsz12">Account number: ' + account + '</div>\
									</td>\
									<td class="brdb wi_36p padl15 valm">\
										<a href="#" class="vex_bank_caller dotted_btn brd bold dark_grey_txt" data-id="bank_row1">...</a>\
									</td>\
								</tr>');

				if ($table.children().length > 1) {
					$table.find('#payment_row0').addClass('hide');
				}

				$(this).closest('.vex').find('.vex-close').trigger('click');
				return false;
			})
			.find('.back_btn')
			.on('click', function() {
				var $form_2 = $(this).closest('form');
				$form_2
					.addClass('hide')
					.siblings('.form_1')
					.removeClass('hide');
				return false;
			});

		vex.open({
			unsafeContent: $template.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	
	
	// Credits : show
	$doc_body.on('click', '.vex_credits_caller', function(e) {
		var $html = $('<div class="pad30 white_txt">\
							<h2 class="marb30 padtb30 talc lgn_hight_n bold fsz60 white_txt">Add Credits</h2>\
							<div class="credit_links talc">\
								<a href="#" class="dinlblck mar20 brdrad100 white_bg fsz60 red_text">$5</a>\
								<a href="#" class="dinlblck mar20 brdrad100 white_bg fsz60 red_text">$10</a>\
								<a href="#" class="dinlblck mar20 brdrad100 white_bg fsz60 red_text">$25</a>\
							</div>\
						</div>');

		vex.defaultOptions.className = 'vex-theme-os vex-credits-modal wi_100 pad0 red_bg';

		vex.open({
			unsafeContent: $html.get(0),
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,

		});
		return false;
	});
	
	
});