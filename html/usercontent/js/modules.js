/* SUPPLEMENTAL */

(function() {
	// requestAnimationFrame crossbrowser support
	var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
	window.requestAnimationFrame = requestAnimationFrame;
	
	// replaces every instance of sub-string in another string
	String.prototype.replaceAll = function(search, replacement) {
		var target = this;
		return target.split(search).join(replacement);
	};
	
})();

// return selected option html
function get_select_option_name($select){
	var val = $select.val(),
		html = '';
	if(val){
		if(typeof val === 'string'){
			html = $select.find('option[value="' + val + '"]').html();
		}
		else{
			for(var i = 0, iL = val.length; i < iL; i++){
				if(html.length > 0 ){
					html += ', ';
				}
				html += $select.find('option[value="' + val[i] + '"]').html();
			}
		}
	}
	return html;
}



/* POPUPS */

// - wp fade
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

// - sliding modal
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

// - popup modal
function show_popup_modal(action, $target, $fade, $body){
	if(!$fade){ $fade = $('#popup_fade'); }
	if(!$body){ $body = $(document.body); }
	
	if($fade.data('init') != true){
		$fade
			.data('init', true)
			.on('click', function(){
				show_popup_modal('hide', undefined, $fade, $body);
				return false;
			});
	}
	
	if(action == 'show'){
		$target.css('display', 'block');
		$fade.css('display', 'block');
		$body.addClass('showing_modal');
		
		requestAnimationFrame(function(){
			$target.addClass('active');
			$fade.addClass('active');
		});
	}
	else{
		if(!$target){
			$target = $('.popup_modal.active');
		}
		$target.removeClass('active');
		$fade.removeClass('active');
		
		setTimeout(function(){
			$target.css('display', 'none');
			$fade.css('display', 'none');
			$body.removeClass('showing_modal');
		}, 250);
	}
}


$(document).ready(function() {
	var $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body);
	
	
	// TOOLTIP
	if($.fn.tooltip){
	
		// general
		$('.tooltip').tooltip({
			track: true
		});
		
		// custom
		var $tooltip_custom = $('.tooltip_custom'),
			$tooltip_cont = $('#tooltip_cont');
		
		$tooltip_custom.tooltip({
			tooltipClass: 'custom_tootip_class',
			position: { my: 'left top' , at: 'left-310 top-5' },
			content: function() {
				var text = $($(this).data('tooltip')).html();
				console.log(text);
				return text;
			},
			disabled: true,
			close: function( event, ui ) { 
				$(this)
					.removeClass('opened')
					.tooltip('disable');
			}
		});
		$tooltip_custom
			.on({
				'click': function(){
					var $this = $(this);
					if($this.hasClass('opened')){
						$this
							.tooltip('close');
					}
					else{
						$this
							.addClass('opened')
							.tooltip('enable')
							.tooltip('open');
					}
					return false;
				},
				'mouseleave' : function(e){
					e.stopImmediatePropagation();
					return false;
				},
			});
		
		$body.on('click', '.tooltip_btn a', function(e){
			$tooltip_custom.tooltip('close');
			return false;
		});
	}
	
	
	
	/* FORM CONTROLS */
	
	// iCheck
	if($.fn.iCheck){
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
		
		
		// - toggle active
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
		
		// toggle visited
		$body.on('ifChecked', 'input[type=checkbox].toggle-visited', function(event){
			var $target = $($(this).data('target'));
			if($target[0]){
				$target.addClass('visited');
			}
		});
		$body.on('ifUnchecked', 'input[type=checkbox].toggle-visited', function(event){
			var $this = $(this),
				$target = $($this.data('target'));
			
			if($target[0]){
				if($this.data('check-all') == true){
					var $base = $this.data('closest') ? $this.closest($this.data('closest')) : $body,
						$inputs = $base.find('input[type=checkbox].toggle-visited[data-target="' + $this.data('target') + '"]'),
						status = true;
						
					for(var i = 0, iL = $inputs.length; i < iL; i++){
						if($inputs.eq(i).get(0).checked){
							status = false;
							break;
						}
					}
					
					if(status){
						$target.removeClass('visited');
					}	
				}
				else{
					$target.removeClass('visited');
				}
				
			}
		});
	}
	
	// Slider range
	if($.fn.slider){
		
		// - custom
		$('.slider-range').each(function(){
			var $this = $(this),
				slide_options = {};
			
			// range
			if($this.data('range')){
				slide_options['range'] = $this.data('range');
			}
			
			// additional display control
			if($this.data('capture')){
				var $this_capture = $($this.data('capture'));
				$this_capture.data('$range', $this);
				
				if($this.data('sync') == true){
					$this_capture.on('keyup change', function(){
						var val = parseInt(this.value);
						val = isNaN(val) ? 0 : val;
						$(this).data('$range').slider('value', val);
					});
				}
				
				$this.data('$capture', $this_capture);
				slide_options['slide'] = function(event, ui){
					var $capture = $(this).data('$capture');
					$capture.val(ui.value);
				};
				slide_options['change'] = function(event, ui){
					var $capture = $(this).data('$capture');
					$capture.val(ui.value);
				};
			}
			
			slide_options['min'] = $this.data('min') ? $this.data('min') : 0;
			slide_options['max'] = $this.data('max') ? $this.data('max') : 100;
			
			if($this.data('range-classes') || $this.data('handle-classes')){
				
				slide_options['create'] = function(event, ui){
					var $this_control = $(this);
					
					if($this.data('range-classes')){
						$this_control.find('.ui-slider-range').addClass($this.data('range-classes'));
					}
					if($this.data('handle-classes')){
						$this_control.find('.ui-slider-handle').addClass($this.data('handle-classes'));
					}
				};
				
				
			}
			
			
			$this.slider(slide_options);
		});
		
		// - general
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: 500,
			values: [75, 300],
			slide: function(event, ui) {
				$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
			}
		});
		$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
	}
	
	// Select menu plugin
	if($.fn.selectmenu){
		$('select.jui-select').each(function(){
			var $this = $(this),
				options = {};
			
			if($this.data('button-classes') || $this.data('icon-classes') || $this.data('menu-classes')){
				
				options['create'] = function(event, ui){
					var $button = $(event.target).siblings('.ui-selectmenu-button');
					
					// Button
					if($this.data('button-classes')){
						$button.addClass($this.data('button-classes'));
					}
					
					// Icon
					if($this.data('icon-classes')){
						$button.find('.ui-selectmenu-icon').addClass($this.data('icon-classes'));
					}
					
					// Menu
					if($this.data('menu-classes')){
						$this.selectmenu('menuWidget').addClass($this.data('menu-classes'));
					}
				};
			}
			
			
			$this.selectmenu(options);
		});
	}
	
	// Selectric
	if($.fn.selectric){
		
		// - general
		$('select.selectric').selectric();
	}
	
	// Autopopulate select
	$body.on('focus', 'select.autopopulate', function(){
		var $this = $(this),
			parent_name = $this.data('parent-name'),
			$base = $body,
			html = '';
		
		if(parent_name){
			var $parent_name = $(parent_name);
			$base = $($parent_name.data('source')).filter('[data-name="' + $parent_name.val() + '"]');
		}
		
		var $targets = $base.find($this.data('source'));
		
		if($targets[0]){
			for(var i = 0, iL = $targets.length; i < iL; i++){
				var $tg = $targets.eq(i),
					name = $tg.data('name'),
					id = $tg.data('id') ? $tg.data('id') : name;
				if(name){
					html += '<option value="' + id + '">' + name + '</option>';
				}
			}
		}
		$this.html(html);
	});
	
	// Custom select-like control
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
	
	// Datepicker
	if($.fn.datepicker){
		
		// - default
		$('.datepicker2').datepicker();
		
		// - general
		$('#datepicker, .datepicker').datepicker({
			showOn: 'button',
			buttonImage: 'images/calendar.png',
			buttonImageOnly: true
		});
		$('.date_picker_bx').datepicker({
			showOn: 'button',
			buttonImage: 'images/yellow_date_ico.png',
			buttonImageOnly: true
		});
	}
	
	// File selector
	/*
		data-preview [css selector] = preview target
		data-type [img] = preview type
		data-img-class [string] = a list of classes to be applied to img data-type
	*/
	$body.on('change', 'input[type=file]', function(){
		var $this = $(this),
			preview = $this.data('preview');
			
		if(preview){
			var $preview = $(preview);
			if($preview[0]){
				if (this.files && this.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e){
						if($preview.data('type') === 'img'){
							$preview
								.html('<img src="' + e.target.result + '" class="' + $preview.data('img-class') + '" />')
								.show();
						}
						
					}
					reader.readAsDataURL(this.files[0]);
				}
			}
		}
	});
	
	// Boolean control
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
	
	// TinyMCE
	if (typeof(tinyMCE) != 'undefined'){
		var tinyMCE_options = {
			selector: 'textarea.mce-editor',
			setup: function (editor) {
	            editor.on('change', function () {
	            	this.save();
	        	});
	       	},
			plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
			toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
			menubar: false,
			toolbar_items_size: 'small',
			style_formats: [{title:"Bold text",inline:"b"},{title:"Red text",inline:"span",styles:{color:"#ff0000"}},{title:"Red header",block:"h1",styles:{color:"#ff0000"}},{title:"Example 1",inline:"span",classes:"example1"},{title:"Example 2",inline:"span",classes:"example2"},{title:"Table styles"},{title:"Table row 1",selector:"tr",classes:"tablerow1"}],
			templates: [{title: 'Test template 1',content: 'Test 1'},{title: 'Test template 2',content: 'Test 2'}]
		}
		tinyMCE.init(tinyMCE_options);
	}
	
	// TABS
	
	// jQuery ui tabs
	if($.fn.tabs){
		
		// - default
		$('.prdt_tabs').tabs();
	}
	
	// tab header with links
	$body.on('click', '.tab-header a', function(){
		var $this = $(this),
			target_id = $this.data('id');
		if(target_id){
			if ($this.parent().get(0).tagName == 'LI') {
				$this
					.parent()
					.addClass('active')
					.siblings('.active')
						.removeClass('active');
			}
			
			var actions = $this.data('action');
			if(actions){
				actions = actions.split(',');
				
				for(var i = 0, iL = actions.length; i < iL; i++){
					var action = actions[i].split('|');
					
					if(action[0] === 'fade'){
						var $act_fade = $(action[1]),
							act = action[2];
						
						if($act_fade[0] && act === 'show'){
							$body.addClass('showing_modal');
							$act_fade.css('display', 'block');
							requestAnimationFrame(function(){
								$act_fade.addClass('active');
							});
						}
						else{
							$act_fade.removeClass('active');
							$body.removeClass('showing_modal');
							$(".popup_false").removeClass("active");
							setTimeout(function(){
								$act_fade.css('display', 'none');
							}, 250);
						}
					}
				}
			}
			
			// remove active from siblings tab header links
			$this.closest('.tab-header').find('a.active')
				.each(function(){
					var $tb = $(this);
					$('#' + $tb.data('id'))
						.removeClass('active')
						.hide();
					$tb.removeClass('active');
				});
			$this.addClass('active');

			var $tab = $('#' + target_id),
				$tab_siblings = $tab.siblings('.active');
			
			// find a tab header with this data-id and remove active from it
			$tab_siblings
				.each(function(){
					$('.tab-header a[data-id="' + this.getAttribute('id') + '"]').removeClass('active');
				})
				.removeClass('active')
				.hide();
			
			$tab
				.addClass('active')
				.show();
			
			if($this.data('extra')){
				var $extra = $($this.data('extra')),
					$extra_sibl = $extra.siblings('.active');
				
				$extra_sibl.removeClass('active');
				$extra.addClass('active');
			}
			
			return false;
		}
	});
	$('.tab-header a.active').trigger('click');
	
	// tabs header with select
	$body.on('change', 'select.tab-header', function(){
		var $tab = $('#' + $(this).val());
		$tab.siblings('.active')
			.removeClass('active')
			.hide();
		$tab
			.addClass('active')
			.show();
		return false;
	});
	$('select.tab-header').trigger('change');
	
	// tabs header with detached select
	$body.on('change', 'select.tab-detached-header', function(){
		var $this = $(this),
			$container = $this.data('$container'),
			$tabs = $this.data('$tabs');
			
		if(!$container){
			$container = $($this.data('container'));
			$tabs = $container.children('.tab-content');
			$tabs.detach();
			$this.data({
				'$container' : $container,
				'$tabs' : $tabs
			});
		}
				
		if($container[0] && $tabs[0]){
			$tabs
				.removeClass('active')
				.detach();
				
			var $tab = $tabs.filter('#' + $this.val());
			if($tab[0]){
				$tab
					.addClass('active')
					.appendTo($container);
			}
		}
		
		return false;
	});
	$('select.tab-detached-header').trigger('change');
	
	// tabs header with radio
	$body.on('change', '.tab-header input[type="radio"]', function(){
		if(this.checked){
			var $tab = $('#' + this.value);
			$tab.siblings('.active')
				.removeClass('active')
				.hide();
			$tab
				.addClass('active')
				.show();
		}
	});
	$('.tab-header input[type="radio"]').trigger('change');
	
	
	
	// POPUPS
	
	// Show wpdev modal
	$body.on('click', '.show_wpmod', function(){
		var $this = $(this),
			$target = $($this.data('modal'));
		
		if($target[0]){
			$target.data('caller', $this);
			wp_fade('show', $target);
		}
		
		return false;
	});
	
	// Popup modal
	var $popup_fade = $('#popup_fade');
	$body.on('click', '.show_popup_modal', function(){
		var $this = $(this),
			$target = $this.data('$target');
		
		if(!$target || !$target[0]){
			$target = $($this.data('target'));
		}
		if($target[0]){
			show_popup_modal('show', $target, $popup_fade, $body);
		}
		return false;
	});
	
	// Sliding modal
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
	
	
	
	
	// APPLY ANIMATION
	var $applY_animation = $('.apply-animation');
	if($applY_animation[0]){
		
		// slide In Down
		var $slideInDown = $applY_animation.filter('.animation-slideInDown');
		if($slideInDown[0]){
			$slideInDown.each(function(){
				(function($elm){
					var slideDownAnimation = function(){
						var $current = $elm.find('.animate');
						if($current[0]){
							var $next = $current.next();
							if(!$next[0]){
								$next = $elm.children().first();
							}
							$current
								.removeClass('animate')
								.addClass('hidden');
								
							$next
								.removeClass('hidden')
								.addClass('animate');
								
							setTimeout(slideDownAnimation, 2000);
						}
					}
					setTimeout(slideDownAnimation, 2000);
				})($(this));
			});
		}
	}
	
	
	
	// SLICK SLIDER
	/*
		data-slick-settings [prop:val,] = a list of default Object-like pair of settings
		data-slick-md-settings [prop:val,] = settings for medium screen resultion
		data-slick-sm-settings [prop:val,] = settings for small screen resultion
		data-slick-xs-settings [prop:val,] = settings for extra small screen resultion
		data-slick-xxs-settings [prop:val,] = settings for extra-extra small screen resultion
	*/
	if($.fn.slick){
		$('.slick-slider').each(function(){
			var $this = $(this),
				settings = {};
			
			var def_settings = $this.data('slick-settings') ? $this.data('slick-settings').split(',') : false;
			if(def_settings){
				for(var i = 0, iL = def_settings.length; i < iL; i++){
					var split = def_settings[i].split(':');
					if(split.length > 1){
						var opt = split[1].trim();
						if(opt === 'true'){ opt = true; }
						else if(opt === 'false'){ opt = false; }
						else{
							var opt2 = parseInt(opt);
							if(!isNaN(opt2)){
								opt = opt2;
							}
						}
						settings[split[0].trim()] = opt;
					}
				}
			}
			
			if($this.data('slick-md-settings')){
				var md_settings = $this.data('slick-md-settings') ? $this.data('slick-md-settings').split(',') : false;
				if(md_settings){
					if(!settings['responsive']){ settings['responsive'] = []; }
					var resp = settings['responsive'],
						md_set = {'breakpoint' : 1200, 'settings' : {}};
					for(var i = 0, iL = md_settings.length; i < iL; i++){
						var split = md_settings[i].split(':');
						if(split.length > 1){
							var opt = split[1].trim();
							if(opt === 'true'){ opt = true; }
							else if(opt === 'false'){ opt = false; }
							else{
								var opt2 = parseInt(opt);
								if(!isNaN(opt2)){
									opt = opt2;
								}
							}
							md_set['settings'][split[0].trim()] = opt;
						}
					}
					resp[resp.length] = md_set;
				}
			}
			if($this.data('slick-sm-settings')){
				var sm_settings = $this.data('slick-sm-settings') ? $this.data('slick-sm-settings').split(',') : false;
				if(sm_settings){
					if(!settings['responsive']){ settings['responsive'] = []; }
					var resp = settings['responsive'],
						sm_set = {'breakpoint' : 992, 'settings' : {}};
					for(var i = 0, iL = sm_settings.length; i < iL; i++){
						var split = sm_settings[i].split(':');
						if(split.length > 1){
							var opt = split[1].trim();
							if(opt === 'true'){ opt = true; }
							else if(opt === 'false'){ opt = false; }
							else{
								var opt2 = parseInt(opt);
								if(!isNaN(opt2)){
									opt = opt2;
								}
							}
							sm_set['settings'][split[0].trim()] = opt;
						}
					}
					resp[resp.length] = sm_set;
				}
			}
			if($this.data('slick-xs-settings')){
				var xs_settings = $this.data('slick-xs-settings') ? $this.data('slick-xs-settings').split(',') : false;
				if(xs_settings){
					if(!settings['responsive']){ settings['responsive'] = []; }
					var resp = settings['responsive'],
						xs_set = {'breakpoint' : 768, 'settings' : {}};
					for(var i = 0, iL = xs_settings.length; i < iL; i++){
						var split = xs_settings[i].split(':');
						if(split.length > 1){
							var opt = split[1].trim();
							if(opt === 'true'){ opt = true; }
							else if(opt === 'false'){ opt = false; }
							else{
								var opt2 = parseInt(opt);
								if(!isNaN(opt2)){
									opt = opt2;
								}
							}
							xs_set['settings'][split[0].trim()] = opt;
						}
					}
					resp[resp.length] = xs_set;
				}
			}
			if($this.data('slick-xxs-settings')){
				var xxs_settings = $this.data('slick-xxs-settings') ? $this.data('slick-xxs-settings').split(',') : false;
				if(xxs_settings){
					if(!settings['responsive']){ settings['responsive'] = []; }
					var resp = settings['responsive'],
						xxs_set = {'breakpoint' : 540, 'settings' : {}};
					for(var i = 0, iL = xxs_settings.length; i < iL; i++){
						var split = xxs_settings[i].split(':');
						if(split.length > 1){
							var opt = split[1].trim();
							if(opt === 'true'){ opt = true; }
							else if(opt === 'false'){ opt = false; }
							else{
								var opt2 = parseInt(opt);
								if(!isNaN(opt2)){
									opt = opt2;
								}
							}
							xxs_set['settings'][split[0].trim()] = opt;
						}
					}
					resp[resp.length] = xxs_set;
				}
			}
			
			$this.slick(settings);
		});
	}
	
	
	
	// CONTENT TOGGLER
	/*
		data-parent [css selector] = parent selector for all blocks
		data-current [css selector] = current shown content
		data-target [css selector] = target selector
	*/
	$body.on('click', '.toggle-content', function(){
		var $this = $(this),
			$current = $this.closest($this.data('current')),
			base = $this.data('parent'),
			$target = [];
		
		if(base){
			$target = $this.closest(base).find($this.data('target'));
		}
		else{
			$target = $($this.data('target'));
		}
		
		
		if($target[0]){
			$target.show();
			$current.hide();
		}
		
		return false;
	});
	
	
	
	// CLASS TOGGLER
	/*
		data-closest [css selector] = closest target to start search from
		data-target [css selector] = target selector (becomes data-closest is not present)
		data-classes [string] = space separated list of classes to toggle
		data-type [string] = classes toggle type
			- separate = each class is toggled separately (default)
	*/
	$body.on('click', '.class-toggler', function(){
		var $this = $(this),
			classes = $this.data('classes'),
			type = $this.data('toggle-type'),
			$target = $this.data('$target');
		
		if(!$target){
			var closest = $this.data('closest'),
				target = $this.data('target');
				
			if(closest){
				var $closest = $this.closest(closest);
				$target = target ? $closest.find(target) : $closest;
			}
			else{
				$target = target ? $(target) : $this;
			}
			$this.data('$target', $target);
		}
		
		if($target[0]){
			if(classes){
				classes = classes.split(' ');
				for(var t = 0, tL = $target.length; t < tL; t++){
					var $t = $target.eq(t);
					for(var i = 0, iL = classes.length; i < iL; i++){
						if($t.hasClass(classes[i])){
							$t.removeClass(classes[i]);
						}
						else{
							$t.addClass(classes[i]);
						}
					}
				}
			}
		}
		
		return false;
	});
	
	
	
	// CLASS SETTER
	/*
		set class on target, removes class on others
		data-closest [css selector] = closest target to start search from
		data-target [css selector] = target selector
		data-classes [string] = space separated list of classes to add/remove
	*/
	$body.on('click', '.class-setter', function(){
		var $this = $(this),
			$target = $this.data('$target');
		
		if(!$target){
			var target = $this.data('target'); 
			$target = target ? $(target) : $this;
			$this.data('$target', $target);
		}
		
		if($target[0]){
			var closest = $this.data('closest'),
				classes = $this.data('classes');
				
			if(classes){
				var $base = [];
				
				if(closest){
					$base = $target.closest(closest);
				}
				
				if($base[0]){
					var split = classes.split(' ');
					for(var i = 0, iL = split.length; i < iL; i++){
						$base.find('.' + split[i]).removeClass(split[i]);
					}
				}
				
				$target.addClass(classes);
			}
		}
		
		return false;
	});
	
	
	
	// REMOTE TRIGGER
	/*
		data-base [css selector] = base selector to start search from
		data-target [css selector] = target selector
		data-action [string(click)] = required action (click is default)
	*/
	$body.on('click', '.remote-trigger', function(){
		var $this = $(this),
			$target = $this.data('$target');
		
		if(!$target){
			var base = $this.data('base');
			if(base){
				var $base = $this.closest(base);
				if($base[0]){
					$target = $base.find($this.data('target'));
				}
			}
			else{
				$target = $($this.data('target'));
			}
			$this.data('$target', $target);
		}
		
		if($target[0]){
			$target.trigger($this.data('action') ? $this.data('action') : 'click');
		}
		return false;
	});
	
	
	
	// REMOVE CLOSEST
	/*
		data-target [css selector] = target selector
	*/
	$body.on('click', '.remove_closest', function(){
		var $this = $(this);
		$this.closest($this.data('target')).remove();
		return false;
	});
	
	
	
	// REPLACE CONTENT
	/*
		data-base [css selector] = base selector to start search from
		data-target [css selector] = target selector
		data-source [string] = javascript object source, this value will be the key
	*/
	$body.on('change', '.content-replace', function(){
		var $this = $(this),
			base = $this.data('base'),
			$target = base ? $this.closest(base).find($this.data('target')) : $($this.data('target'));
		
		if($target[0]){
			var this_dt = {};
			try{
				this_dt = eval($this.data('source'));
			}
			catch(e){};
			$target.html(this_dt[$this.val()]);
		}
	});
	
	
	
	// INSERT CONTENT
	/*
		data-base [css selector] = base selector to start search from
		data-target [css selector] = target selector
		data-source [string] = javascript object source, this value will be the key
		data-level [int] = insertion level
		data-increment [int] = increment variable
	*/
	$body.on('click', '.insert-content', function(){
		var $this = $(this),
			base = $this.data('base'),
			$target = base ? $this.closest(base).find($this.data('target')) : $($this.data('target'));
		
		if($target[0]){
			var this_dt = '';
			try{
				this_dt = eval($this.data('source'));
			}
			catch(e){};
			var $html = $(this_dt);
			
			if($this.data('increment')){
				var level = $this.data('level'),
					index = parseInt($this.data('increment') + 1),
					$increments = $html.find('.increment');
				for(var i = 0, iL = $increments.length; i < iL; i++){
					var $inc = $increments.eq(i),
						ilevel = $inc.data('level'),
						inc_base = $inc.data('base'),
						inc_target = $inc.data('target');
					
					if(level === ilevel){
						if(inc_target === 'html'){
							$inc.html(inc_base + index);
						}
					}
				}
				$this.data('increment', index);
			}
			
			
			$target.append($html);
		}
		return false;
	});
	
	
	
	// SUPERFISH
	if($.fn.superfish){
		$('ul.sf-menu ').superfish();
	}
	
	
	// Accordion
	if($.fn.accordion){
		$('#accordion').accordion({
			heightStyle: 'content'
		});
	}
	
	
});

$(document).ready(function() {
	var $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body)
	
	
	// is VEX present
	try{
		var isVex = true;
		vex.defaultOptions.className = 'vex-theme-default';
	}
	catch(e){ var isVex = false; }
	
	
	
	// Add to list
	$body.on('click', '.add_to_list', function(){
		var $this = $(this),
			$source = $this.data('$source'),
			$target = $this.data('$target');
		
		if(!$source){
			$source = $($this.data('source'));
			$this.data('$source', $source);
		}
		if(!$target){
			$target = $($this.data('target'));
			$this.data('$target', $target);
		}
		
		if($source[0] && $source.val().length > 0 && $target[0]){
			var $rows = $target.find('.atl_row'),
				val = $source.val(),
				is_new = true;
				
			if($rows[0]){
				for(var i = 0, iL = $rows.length; i < iL; i++){
					if($rows.eq(i).data('value') === val){
						is_new = false;
						break;
					}
				}
			}
			
			if(is_new){
				$target.append('<div class="atl_row padtb5 brdb" data-value="' + val + '"><a href="#" class="remove_from_list dblock fright pad5">X</a><div class="bs_bb marr30 padtb5">' + val + '</div><div class="clear"></div></div>');
			}
			$source.val('');
		}
		
		return false;
	});
	$body.on('click', '.remove_from_list', function(){
		$(this).closest('.atl_row').remove();
		return false;
	});
	
	
	
	// Google map Autocomplete
	var $places_autocomplete = $('.places-autocomplete');
	if ($places_autocomplete[0] && typeof google === 'object' && typeof google.maps === 'object') {
		$places_autocomplete
			.on('keypress', function(e){
				if(e.which == 13) {
					$(this).trigger('blur');
					return false;
				}
			})
			.each(function(){
				var searchBox = new google.maps.places.Autocomplete(this);
			});
	}
	
	
	
	// Editable
	$body.on('click', '.editable', function(){
		var $this = $(this);
		
		if($this.hasClass('edit-text')){
			var $edit_input = $('<input type="text" />'),
				dtlist = $this.data('list');
				
			$edit_input
				.attr('class', $this.attr('class'))
				.addClass('post-edit-text wi_100 pad0 ff_inh nobrdt nobrdr nobrdl pink_bg')
				.removeClass('editable')
				.val($this.text().trim())
				.data('$el', $this);
			
			if(dtlist){
				$edit_input.attr('list', dtlist);
			}
			
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
			var searchBox = new google.maps.places.Autocomplete(edit_input);
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
						
						if(val.length <= 0){
							val = '&nbsp;&nbsp;&nbsp;';
						}
						$editable
							.html(val)
							.css('visibility', 'visible')
						$select.remove();
						
						var post_action = $this.data('post-action');
						if(post_action){
							var action_func = eval(post_action);
							action_func();
						}
						
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
		
		if(val.length <= 0){
			val = '&nbsp;&nbsp;&nbsp;';
		}
		$editable.html(val);
		$this.replaceWith($editable);
		
		var post_action = $editable.data('post-action');
		if(post_action){
			var action_func = eval(post_action);
			action_func();
		}
		
		return false;
	});
	$body.on('blur', '.post-edit-address', function(){
		var $this = $(this),
			$editable = $this.data('$el');
			
		
		$editable.data('tm', setTimeout(function(){
			var val = $this.val();
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
	
	
	
	// Expanding input
	$('.expanding-input')
		.on('focus', 'input', function(){
			$(this).closest('.expanding-input-wrap').addClass('active');
			return false;
		})
		.on('click', 'a.deactivate', function(){
			$(this).closest('.expanding-input-wrap').removeClass('active');
			return false;
		});
		
		
	
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
	
	

	// Populate me
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
	
	
	
	// Toggle button
	$body.on('click', '.toggle-btn', function(){
		var $this = $(this),
			id = $this.data('toggle-id'),
			$target = [];
		
		if(id == 'base'){
			$target = $this.closest('.base').find('.toggle_content');
			$target = $this.closest('.base').find('.toggle_content');
		}
		else{
			$target = $this.data('toggle-ids') ? $($this.data('toggle-ids')) : $('#' + $this.data('toggle-id'));
		}
		
		if($target[0]){
			$target.each(function(){
				var $ctar = $(this);
				if($ctar.is(":visible")){
					$this
						.removeClass('target_shown')
						.addClass('target_hidden');
						
					$ctar
						.stop()
						.slideUp();
				}
				else{
					$ctar
						.removeClass('target_hidden')
						.addClass('target_shown');
						
					$ctar
						.stop()
						.slideDown();
				}
			});
		}
		return false;
	});
	
	
	
	// Expander
	$body.on('click', '.expander-toggler', function(){
		var $this = $(this),
			$target = $this.data('$target');
		
		if(!$target){
			var target = $this.data('target');
			if(!target){
				target = $this.attr('href');
			}
			
			var base = $this.data('base');
			if(base){
				$target = $this.closest(base).find(target);
			}
			else{
				$target = $(target);
			}
		}
		
		if($target[0]){
			$this.data('$target', $target);
			if($target.is(":visible")){
				$this
					.removeClass('target_shown');
				
				clearTimeout($target.data('tm'));
					
				$target
					.stop()
					.slideUp(300);
			}
			else{
				$this
					.addClass('target_shown');
					
				$target
					.stop()
					.slideDown(300);
					
				$target.data('tm', setTimeout(function(){
					$target.attr('style', 'display:block;');
				}, 300));
			}
		}
		return false;
	});
	
	
	
	// Wpdev columns
	if(isVex){
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
	}
	
	
	
	// Limit chars
	var $limit_chars = $('.limit-chars');
	if($limit_chars[0]){
		for(var i = 0, iL = $limit_chars.length; i < iL; i++){
			var $current = $limit_chars.eq(i),
				limit = $current.data('limit');
			
			if(limit){
				var txt = $current.text().trim(),
					limit = parseInt(limit);
				if(txt.length > limit){
					$current.html(txt.substring(0, limit - 4) + '...');
				}
			}
		}
	}
	
	
	
	// Scroll menu
	var $scroll_menu = $('#scroll_menu');
	if ($scroll_menu[0]) {
		var $menu_header = $('.scroll_menu_header:not(.initial)'),
			$header = $('div.header .fixed_header');
		if ($menu_header[0]) {
			var $menu = $scroll_menu.find('ul'),
				$current = [],
				$li, $link, header_id;
			
			$menu = $(document.createElement('UL'));
			var menu_params = $scroll_menu.data('ul-params'),
				menu_attrs = {};
			if(menu_params){
				menu_params = menu_params.split(',');
				for(var p = 0, pL = menu_params.length; p < pL; p++){
					var cp = menu_params[p].split('|');
					if(cp && cp.length > 1){
						menu_attrs[cp[0]] = cp[1];
					}
				}
			}
			$menu.attr(menu_attrs);

			for (var i = 0, iL = $menu_header.length; i < iL; i++) {
				$current = $menu_header.eq(i);
				$current.attr('id', 'scroll_menu_header' + i);
				header_id = $current.data('header');
				
				$li = $(document.createElement('LI'));
				$li.addClass('dblock pos_rel padb10');
				
				var li_params = $current.data('li-params'),
					li_attrs = {};
				if(li_params){
					li_params = li_params.split(',');
					for(var p = 0, pL = li_params.length; p < pL; p++){
						var cp = li_params[p].split('|');
						if(cp && cp.length > 1){
							li_attrs[cp[0]] = cp[1];
						}
					}
				}
				$li.attr(li_attrs);
				
				if($current.data('add-content-top')){
					$li.append($current.data('add-content-top'));
				}
				if($current.data('name')){
					$li.attr('data-name', $current.data('name'));
				}

				$link = $(document.createElement('A'));
				var link_text = $current.data('text') ? $current.data('text') : $current.text();
				
				if($current.data('icon')){
					$link.html('<span class="' + $current.data('icon') + '"></span><span class="valm">' + link_text + '</span>');
				}
				else{
					$link.html('<span class="valm">' + link_text + '</span>');
				}
				
				var current_params = $current.data('params'),
					link_params = {};
				if(current_params){
					current_params = current_params.split(',');
					for(var p = 0, pL = current_params.length; p < pL; p++){
						var cp = current_params[p].split('|');
						if(cp && cp.length > 1){
							link_params[cp[0]] = cp[1];
						}
					}
				}
				
				// regular scroll menu link
				if(!$current.hasClass('menu_header_custom')){
					$link
						.attr(link_params)
						.attr({
							'href': '#',
							'data-id': 'scroll_menu_header' + i
						})
						.appendTo($li);
				}
				else{
					// some action - for now let's rely on a class - we can add any action based on a class it has
					if($current.hasClass('menu_header_action')){
						$link
							.attr({
								'href': '#'
							})
							.attr(link_params)
							.addClass($current.data('class'))
							.appendTo($li);
					}
					else{
						$link
							.attr(link_params)
							.appendTo($li);
					}
				}
				
				if(header_id){
					var $curh = $scroll_menu.find(header_id);
					if($curh[0]){
						$curh.append($li);
					}
					else{
						$menu.append($li);
					}
				}
				else{
					$menu.append($li);
				}
			}
			
			if($menu.has('li')[0]){
				$scroll_menu.append($menu);
			}
		}
			
			
		$scroll_menu.on('click', 'a', function(){
			var $this = $(this),
				did = $this.attr('data-id');
				
			if($window.width() <= 991 && $this.closest('.mobile-menu')[0]){
				$this.closest('.scroll-fix-wrap').addClass('hidden-xs hidden-sm');
			}
				
			if(did){
				var $element = $('#' + did),
					element_custom = $element.data('offset') ? parseInt($element.data('offset')) : 0,
					additional_top = $('.fixed_notification')[0] ? 48 : 0,
					header_height = $header[0] ? $header.height() + 10 : 0;
							
				$html_body.animate({
					scrollTop: $element.offset().top - header_height - additional_top - element_custom
				}, 500, function(){
					requestAnimationFrame(function(){
						$this.closest('.scroll-fix').find('a.active').removeClass('active');
						$this.addClass('active');
					});
				});
				return false;
			}
		});
			
		$scroll_menu.data('$menu_header_current', $menu_header);
			
		var window_half_height = $window.height() / 2;
		$window.on('scroll.scroll_menu', function() {
			var scroll_top = $window.scrollTop(),
				$menu_header_current = $scroll_menu.data('$menu_header_current');
				for (var i = 0, iL = $menu_header_current.length; i < iL; i++) {
				var $current = $menu_header_current.eq(i),
					current_top = $current.offset().top;
					if (current_top - 80 < scroll_top) {
					$scroll_menu.find('ul.active').removeClass('active');
					
					var $link = $scroll_menu.find('a[data-id="' + $current.attr('id') + '"]');
					$scroll_menu.find('.active').removeClass('active');
					$link
						.addClass('active')
						.closest('ul').addClass('active');
				}
			}
				return false;
		});
	}
	
	
	
	// Scroll fix
	var $scroll_fix = $('.scroll-fix');
	if ($scroll_fix[0]) {
		var scroll_fix_init = function($fix){
			$fix
				.css('height', $fix.find('.scroll-fix-wrap').height())
				.find('.scroll-fix-wrap')
				.css('width', $fix.width());
		}
		
		$scroll_fix.each(function() {
			var $this = $(this);
			if($this.is(':visible')){
				scroll_fix_init($this);
			}
			else{
				$this.data('init', false);
			}
		});

		var $current_scroll = [],
			off_top = 0;
		$window.on('scroll.scroll_fix', function() {
			var scroll_top = $window.scrollTop(),
				win_hei = $window.height();

			for (var i = 0, iL = $scroll_fix.length; i < iL; i++) {
				$current_scroll = $scroll_fix.eq(i);
				
				if($current_scroll.is(':visible')){
					if($current_scroll.data('init') === false){
						scroll_fix_init($current_scroll);
						$current_scroll.data('init', true);
					}
					
					var sk_height = $current_scroll.height(),
						sk_offset = $current_scroll.offset();
					
					off_top = $current_scroll.data('offset-top') ? $current_scroll.data('offset-top') : 0;
					
					if(sk_height + off_top < win_hei){
						if (sk_offset.top < scroll_top + off_top){
							if(!$current_scroll.hasClass('affix')){
								$current_scroll
									.addClass('affix')
									.find('.scroll-fix-wrap')
										.css('top', off_top);
							}
						} 
						else {
							if($current_scroll.hasClass('affix')){
								$current_scroll
									.removeClass('affix')
									.find('.scroll-fix-wrap')
										.css('top', 0);
							}
						}
					}
					else{
						if($current_scroll.hasClass('affix')){
							$current_scroll
								.removeClass('affix')
								.find('.scroll-fix-wrap')
									.css('top', 0);
						}
					}
				}
			}
			return false;
		});
	}
	
	
	// SCROLL TO ELEMENT
	$body.on('click', '.scroll-to', function(){
		var $this = $(this),
			$target = $this.data('$target'),
			offset = $this.data('offset') ? parseInt($this.data('offset')) : 0;
		
		if(!$target){
			$target = $($this.data('target')).first();
			$this.data('$target', $target);
		}
		
		if($target[0]){
			$html_body.animate({
				scrollTop: $target.offset().top - offset
			}, 1000);
		}
		return false;
	});


	
	// PERFORM ACTIONS BASED ON SEARCH PARAMS
	var window_search_params = (function(){
		var str = decodeURIComponent(window.location.search),
			objURL = {};
		str.replace(
			new RegExp( "([^?=&]+)(=([^&]*))?", "g" ),
			function( $0, $1, $2, $3 ){
				objURL[ $1 ] = $3;
			}
		);
		return objURL;
	})();
	if(window_search_params){
		
		// scroll to element
		if(window_search_params.scrollTo){
			var $element = $('#' + window_search_params.scrollTo),
				additional_top = $('.fixed_notification')[0] ? 48 : 0,
				header_height = $('div.header').height() + 10;
			
			if($element[0]){
				setTimeout(function(){
					$html_body.animate({
						scrollTop: $element.offset().top - header_height - additional_top
					}, 1000);
				}, 200);
			}
		}
		
		// open tab
		if(window_search_params.showTab){
			var $tab_link = $('.tab-header a[data-id="' + window_search_params.showTab + '"]');
			if($tab_link[0]){
				$tab_link.trigger('click');
			}
		}
	}
	
	
	
	
});


