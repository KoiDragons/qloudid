jQuery(document).ready(function() {
	$("li.click_slect_list").click(function() {
	$("li.click_slect_list").removeClass("selected");
		$(this).addClass("selected");
	});
	
	if($.fn.superfish){
		$('ul.sf-menu ').superfish();
	}
	

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
	}
	
	// Selectric
	if($.fn.selectric){
		$('select.selectric').selectric();
	}
	
	// Select
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
	
	// Slider range
	if($.fn.slider){
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
	
		$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
	}
	
	// Datepicker
	if($.fn.datepicker){
		$('#datepicker').datepicker({
			showOn: 'button',
			buttonImage: 'images/calendar.png',
			buttonImageOnly: true
		});
		$('.datepicker').datepicker({
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
	
	// Tabs
	if($.fn.tabs){
		$('.prdt_tabs').tabs();
	}
	
	// Accordion
	if($.fn.accordion){
		$('#accordion').accordion({
			heightStyle: 'content'
		});
	}
});



$('.collapsible').hide();
$('.collapsible:first').show();
$('.collapsible_menu h3:first').addClass("active");
$(".collapsible_menu > h3").click(function() {
	$(this).toggleClass("active");
	$(this).next(".collapsible").slideToggle(500);
	//$(this).siblings("li").removeClass("active");
});


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

/* WPdev functionality */
$(document).ready(function(){
	var $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body),
		isVex = false;
	
	try{
		isVex = true;
		vex.defaultOptions.className = 'vex-theme-default';
	}
	catch(e){}
	
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
	
	// Tooltip
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
		
		$(document.body).on('click', '.tooltip_btn a', function(e){
			$tooltip_custom.tooltip('close');
			return false;
		});
	}
	
	/* Remote trigger */
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
	
	/* Sliding modal tabs */
	$body.on('click', '.sliding-modal-header a, .sliding-modal-content a.close-sliding-modal', function(){
		var $this = $(this),
			$base = $this.closest('.sliding-modal-tabs');
			
		if($this.hasClass('sliding-modal-tabs-close')){
			$base.removeClass('active');
			$this.closest('.sliding-modal-header').find('a.active').removeClass('active');
		}
		else if($this.hasClass('close-sliding-modal')){
			$base
				.removeClass('active')
				.find('.sliding-modal-header a.active')
					.removeClass('active')
				.end()
				.find('.sliding-modal-tab.active')
					.removeClass('active')
		}
		else{
			if(!$base.hasClass('active')){
				$base.addClass('active');
			}
			
			if(!$this.hasClass('active')){
				$this.closest('.sliding-modal-header').find('a.active').removeClass('active');
				$this.addClass('active');
				
				var $tabs = $base.find('.sliding-modal-tab');
				$tabs
					.filter('.active').removeClass('active')
					.end()
					.filter($this.data('target')).addClass('active');
			}
		}
		
		return false;
	});
	
	/* Class toggler */
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
	
	
	/* Class setter */
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
	
	/* Popup modal */
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
	
	/* Toggle content */
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
			
			if(isVex){
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
			}
		},
	}
	wd_upload_methods.init();
	
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
	
	
	/* Date counter */
	var $date_counter = $('.date-counter');
	if($date_counter[0]){
		var counter_tick_interval;
		var counter_tick = function(){
			var tick_status = true;
			
			for(var i = 0, iL = $date_counter.length; i < iL; i++){
				var $cconter = $date_counter.eq(i);
				
				if(!$cconter.hasClass('finished')){
					var period = $cconter.data('period');
					
					if(period === undefined){
						period = (new Date($cconter.data('end'))) - (new Date($cconter.data('now')));
					}
					
					if(period > 999){
						var time_text = $cconter.data('text'),
							inter_period = period,
							inter = 0,
							html = '';
							
						time_text = time_text ? time_text.split(',') : ['y','m','d','tim','min','s'];
						
						if(inter_period >= 2592000000){ // 30 * 24 * 60 * 60 * 1000 = months
							inter = parseInt(inter_period / 2592000000);
							html += ' ' + inter + time_text[1];
							inter_period -= inter * 2592000000;
						}
						if(inter_period >= 86400000){ // 24 * 60 * 60 * 1000 = days
							inter = parseInt(inter_period / 86400000);
							html += ' ' + inter + time_text[2];
							inter_period -= inter * 86400000;
						}
						if(inter_period >= 3600000){ // 60 * 60 * 1000 = hours
							inter = parseInt(inter_period / 3600000);
							html += ' ' + inter + time_text[3];
							inter_period -= inter * 3600000;
						}
						if(inter_period >= 60000){ // 60 * 1000 = minutes
							inter = parseInt(inter_period / 60000);
							html += ' ' + inter + time_text[4];
							inter_period -= inter * 60000;
						}
						if(inter_period >= 1000){ // 1000 = seconds
							inter = parseInt(inter_period / 1000);
							html += ' ' + inter + time_text[5];
							inter_period
						}
						$cconter.html(html);
						
						period -= 1000;
						$cconter.data('period', period);
						
						tick_status = false;
					}
					else{
						$cconter
							.addClass('finished')
							.html($cconter.data('closed'));
						
						$cconter.closest('.active-base').addClass('active');
					}
				}
			}
			
			if(tick_status){
				clearInterval(counter_tick_interval);
			}
		}
		counter_tick_interval = setInterval(counter_tick, 1000);
		counter_tick();
	}
	
	/* Menu selector */
	/* - selectors builder */
	var $menu_builders = $('#menu_builders');
	if($menu_builders[0]){
		// change location on selects change
		var $selects = $menu_builders.find('select');
		$selects.on('change', function(){
			var $this = $(this);
			if($this.data('stay') != true && $this.val() && $this.val() != '0'){
				window.location = $this.val();
			}
			return false;
		});
		
		
		// set the default value
		$selects.selectric({
			openOnHover : true
		});
		$selects.each(function(){
			var $this = $(this),
				$selected = $this.find('option[checked]');
			if($selected[0]){
				$this.val($selected.val()).selectric('refresh');
			}
		});
		
		
		// Button selectric
		var $button_selectric = $menu_builders.find('.button_selectric');
		if($button_selectric[0]){
			$button_selectric.find('.selectric p.label').on('click', function(){
				var $this = $(this),
					$select = $this.closest('.selectricWrapper').find('select');
				if($select.val() && $select.val() != '0'){
					window.location = $select.val();
				}
				return false;
			});
		}
	}
	
	
	/* Language selector */
	var $lang_selector = $('#language_selector');
	if($lang_selector[0]){
		var $lang_list = $lang_selector.siblings('ul'),
			$translate = $('.translate');
		$lang_selector
			.on({
				'click': function(){
					if($lang_list.hasClass('opened')){
						$lang_list
							.removeClass('opened')
							.stop()
							.slideUp();
					}
					else{
						$lang_list
							.addClass('opened')
							.stop()
							.slideDown();
					}
					return false;
				},
				'blur' : function(){
					$lang_list
						.removeClass('opened')
						.stop()
						.slideUp();
				},
			});
		
		$lang_list.find('a')
			.on('click', function(){
				var $this = $(this),
					$current = [];
				$lang_selector.html($this.html());
				
				for(var i = 0, iL = $translate.length; i < iL; i++){
					$current = $translate.eq(i);
					if($this.attr('data-lang') === 'eng'){
						if($current.attr('data-en')){
							$current.html($current.attr('data-en'));
						}
					}
					else if($this.attr('data-lang') === 'swd'){
						if($current.attr('data-en')){
							$current.html($current.attr('data-sw'));
						}
					}
					
					if($current.closest('select').hasClass('selectric-custom')){
						$current.closest('select').selectric('refresh');
					}
				}
				
				return false;
			})
			.first().trigger('click');
		
	}
	
	
	
	/* Toggle button */
	$('.toggle-btn').on('click', function(){
		var $this = $(this),
			$target = $this.data('$target');
		
		if(!$target){
			$target = $('#' + $this.attr('data-toggle-id'));
			$this.data('$target', $target);
		}
		
		if($target[0]){
			if($target.is(':visible')){
				$target
					.stop()
					.slideUp();
			}
			else{
				$target
					.stop()
					.slideDown();
			}
		}
		return false;
	});
	
	/* Text slider */
	var $textfade_slider = $('.textfade_slider');
	if($textfade_slider[0]){
		var $current_slider = [];
		for(var i = 0, iL = $textfade_slider.length; i < iL; i++){
			$current_slider = $textfade_slider.eq(i);
			
			$current_slider.find('.textfade_link')
				.on('click', function(){
					var $this = $(this);
					if(!$this.hasClass('active')){
						var $parent = $this.closest('.textfade_slider');
						
						$this
							.addClass('active')
							.siblings('.active')
								.removeClass('active');
						
						$parent.find('.textfade_slide.active')
							.hide()
							.removeClass('active');
						
						var $current_slide = $parent.find('#' + $this.attr('data-id'));
						$current_slide.show();
						
						setTimeout(function(){
							$current_slide.addClass('active');
						}, 100);
					}
					return false;
				})
				.first().trigger('click');
			
			$current_slider.find('.textfade_prev').on('click', function(){
				var $siblings = $(this).siblings('.textfade_link');
				if($siblings.filter('.active').index() <= 1){
					$siblings.last().trigger('click');
				}
				else{
					$siblings.filter('.active').prev().trigger('click');
				}
				return false;
			});
			$current_slider.find('.textfade_next').on('click', function(){
				var $siblings = $(this).siblings('.textfade_link');
				if($siblings.filter('.active').index() >= $siblings.length){
					$siblings.eq(0).trigger('click');
				}
				else{
					$siblings.filter('.active').next().trigger('click');
				}
				return false;
			});
			
		}
	}
	
	/* Scroll links */
	var $scroll_links = $('a[href*="#"]');
	$scroll_links.each(function(){
		var $this = $(this);
		if($this.attr('href').length > 1){
			$this.on('click', function(){
				var $this = $(this);
				if($this.parent().get(0).tagName == 'LI'){
					$this
						.parent()
							.addClass('active')
							.siblings('.active')
								.removeClass('active');
				}
				 $('html, body').animate({
					scrollTop: $($this.attr('href')).offset().top
				}, 1000);
				return false;
			});
		}
	});
	
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
	
	
	// Perform action based on search params
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
	

	// Tabs
	var $tabs_links = $('.tab-header a');
	$tabs_links.on('click', function() {
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

			$this.closest('.tab-header').find('a.active').removeClass('active');
			$this.addClass('active');

			var $tab = $('#' + target_id);
			$tab.siblings('.active')
				.removeClass('active')
				.hide();

			$tab
				.addClass('active')
				.show();
			
			if($this.hasClass('scroll_to_tab')){
				if($body.data('init_tab') == true){
					setTimeout(function(){
						$body
							.stop()
							.animate({
								scrollTop: $tab.offset().top - 69
							}, 1000);
					}, 100);
				}
				$body.data('init_tab', true);
			}
			
			var refresh = $this.data('refresh');
			if(refresh){
				if(refresh === 'scroll'){
					$window.trigger('scroll');
				}
				else if(refresh === 'resize'){
					$window.trigger('resize');
				}
			}
			
			return false;
		}
	});
	$tabs_links.filter('.active').trigger('click');
	
});




