(function($) {
    var uniqueCntr = 0;
    $.fn.scrolled = function (waitTime, fn) {
        if (typeof waitTime === "function") {
            fn = waitTime;
            waitTime = 100;
        }
        var tag = "scrollTimer" + uniqueCntr++;
        this.scroll(function () {
            var self = $(this);
            var timer = self.data(tag);
            if (timer) {
                clearTimeout(timer);
            }
            timer = setTimeout(function () {
                self.removeData(tag);
                fn.call(self[0]);
            }, waitTime);
            self.data(tag, timer);
        });
    }
})(jQuery);

/* Form functionality */
$(document).ready(function(){
	var $html_body = $('html, body'),
		$window = $(window),
		window_width = window.innerWidth,
		window_height = $window.height(),
		update_functions = [],
		resize_timeout = '',
		current_window_width = 0,
		hei_offset = window_height * 0.45,
		$document = $(document),
		$body = $(document.body),
		form_tm = null;
	
	
	var methods = {

        // INIT
		init: function() {
			
			// form init 
			methods.form_init();
			
			// on window resize event
			$window.on('resize', function(){
				methods.screen_resize();
				return false;
			});
        },
		
		
		
		// FORM
		
		// - field types where FOR can be used
		label_for : ['text', 'number', 'email', 'tel', 'url', 'textarea', 'select', 'dropdown', 'slider'],
		
		// - sync animation and scroll
		$groups: [],
		dependencies: [],
		do_not_animate : false,
		do_not_scroll: false,
		
		// - form init
		form_init : function(){
			var $outer_form = $('.typeform-outer'),
				$form = $('.typeform form'),
				$end_screen = $('.typeform-end');
			
			
			// Start screen
			$outer_form.on('click', '.button-area button', function(){
				$outer_form.removeClass('active');
				setTimeout(function(){
					$outer_form.css('display', 'none');
					$body.removeClass('ovfl_hid');
				}, 200);
			});
			
			// Form
			$document.on('keydown', function(e){
				if(e.keyCode === 13){
					if($outer_form.is(':visible')){
						$outer_form.find('.button-area button').trigger('click');
						return false;
					}
					else if($form.hasClass('inview') && e.shiftKey != true){
						if(methods.validate_field($form)){
							methods.question_next($form);
						}
						return false;
					}
				}
			})
			
			$form
				.on('submit', function(){
					var $this = $(this);
					if(methods.form_check($form, true)){
						$end_screen
							.removeClass('dnone')
							.addClass('dflex');
						$body.addClass('ovfl_hid');
						requestAnimationFrame(function(){
							$end_screen.addClass('active');
						});
					}
					return false;
				})
				.on('focus', '.focusable', function(){
					var $this = $(this),
						$group = $this.closest('.form-group');
					
					if(!$group.hasClass('active')){
						methods.question_focus($this.closest('form'), undefined, $group);
					}
				})
				.on('click', '.form-group > label:not([for])', function(){
					var $this = $(this),
						$group = $this.closest('.form-group');
					$this.trigger('focus');
					methods.question_focus($this.closest('form'), undefined, $group);
					return false;
				})
				.on('click', '.form-group-cover', function(){
					var $this = $(this),
						$group = $this.closest('.form-group'),
						$focusable = $group.find('.focusable');
					
					if($focusable[0]){
						$focusable.trigger('focus');
					}
					else{
						$this.trigger('focus');
						methods.question_focus($this.closest('form'), undefined, $group);
					}
					return false;
				})
				.on('click', '.next, .prev', function(){
					var $this = $(this);
					
					if(methods.validate_field($form)){
						if($this.hasClass('next')){
							methods.question_next($form, undefined, undefined, true);
						}
						else{
							methods.question_prev($form, undefined, undefined);
						}
					}
					return false;
				})
				.on('click', 'button[type=submit]', function(){
					if(!methods.form_check($form, true)){
						
						return false;
					}
				})
				.on('keyup change', 'input, select, textarea', function(e){
					var $this = $(this),
						$group = $this.closest('.form-group'),
						$choice = $group.find('.form-choices:first, .form-rating:first');
					
					if($choice[0]){
						if($this.attr('type') === 'radio'){
							if(this.checked){
								methods.question_next($this.closest('form'), $group);
							}
						}
						else{
							var $inputs = $group.find('input[type=checkbox]'),
								is_checked = false;
							for(var p = 0, pL = $inputs.length; p < pL; p++){
								if($inputs.get(p).checked){
									is_checked = true;
									break;
								}
							}
							if(is_checked){
								$group.addClass('checked');
							}
							else{
								$group.removeClass('checked');
							}
						}
					}
					else{
						if(this.tagName == 'SELECT'){
							if(e.type === 'change'){
								methods.question_next($this.closest('form'), $group);	
							}
						}
						else{
							if($this.val().length > 0){
								$group.addClass('checked');
							}
							else{
								$group.removeClass('checked');
							}
						}
					}
				});
			methods.data_query($form);
				
			// add tracking functionality
			inView('.typeform form, .trackable')
				.on('enter', function(el){
					$(el).addClass('inview');
				})
				.on('exit', function(el){
					$(el).removeClass('inview');
				});
			
			if(form_settings.group.class.indexOf('trackable') > -1){
				var timer;
				window.onscroll = function(){
					if(timer) {
						window.clearTimeout(timer);
					}
					timer = window.setTimeout(methods.track_current_field, 100);
				};
			}
		},
		
		// - form check
		form_check: function($form, show_group){
			var $notification = $form.find('.form-notification'),
				$progress = $form.find('.form-footer .progress .progress-bar'),
				$groups = $form.find('.form-group'),
				$first_group = [],
				complete_count = 0,
				incomplete_count = 0;
				
			
			for(var g = 0, gL = $groups.length; g < gL; g++){
				var $group = $groups.eq(g);
				if($group.hasClass('form-group-required') && $group.data('complete') !== true){
					if(!$first_group[0]){
						$first_group = $group;
					}
					incomplete_count++;
				}
				if($group.data('complete') === true){
					complete_count++;
				}
			}
			$progress.width(parseInt(100 / $groups.length * complete_count) + '%');
			
			if($first_group[0]){
				$notification.html('<div class="' + form_settings.form_notifications.class + '">' + incomplete_count + form_settings.form_notifications.html + '</div>');
				if(show_group){
					$first_group.find('.form-group-cover').trigger('click');
				}
				return false;
			}
			else{
				$notification.empty();
			}
			
			return true;
		},
		
		// - make a query to retrieve data
		// TODO: may be separate DATA QUERY and PARSING logic
		data_query: function($form){
			var data = form_data
				index = 0;
			for(var i = 0, iL = form_data.length; i < iL; i++){
				if(form_data[i].indexed !== false){
					index++;
				}
				methods.build_field($form.find('.form-groups'), form_data[i], index);
			}
			methods.$groups = $form.find('.form-group');
			methods.question_next($form);
			requestAnimationFrame(function(){
				inView('.typeform form, .trackable').check();
				methods.track_current_field();
			});
		},
		
		// - build form field
		build_field : function($form_groups, data, index){
			var $form_content = methods.$form_content,
				is_dependent = methods.getDisplayDependency(data.dependency, 'form-group-' + data.id),
				html = '<div class="form-group ' + ((data.attributes && data.attributes.required && data.attributes.required === 'required') ? 'form-group-required ' : '') + form_settings.group.class + (is_dependent ? ' hidden' : '') + '" id="form-group-' + data.id + '"><a href="#" class="form-group-cover wi_100 hei_100 dblock dnone_pa pos_abs zi2 top0 left0 curd"></a>',
				additional_classes = '',
				label_for = '',
				add_button = false, button_html = '', post_text_html = '';
			
			// Label
			if(data.question || data.description){
				if(methods.label_for.indexOf(data.type) > -1){
					if(data.attributes && data.attributes.id){
						label_for = data.attributes.id;
					}
					else{
						label_for = 'form-field-' + data.id;
					}
				}
				
				html += '<label class="' + form_settings.group_label.class + '"' + (label_for ? ' for="' + label_for + '"' : '') + '>';
				
			
				// question
				if(data.question){
					html += '<h3 class="form-question ' + form_settings.question.class + '">';
					html += '<div class="form-question-icon ' + form_settings.question.icon.class + '">' + (data.displayed_index ? data.displayed_index : index + '<span class="fa fa-arrow-right marl5 fsz10"></span>') + '</div>';
					html += data.question;
					if(data.attributes && data.attributes.required && data.attributes.required === 'required'){
						html += '<span class="form-question-req-icon ' + form_settings.question.required.class + '">' + form_settings.question.required.html + '</span>';
					}
					html += '</h3>';
				}
				
				// description
				if(data.description){
					html += '<div class="form-description ' + form_settings.description.class + '">' + data.description + '</div>';
				}
				
				html += '</label>';
			}
			
			
			// Attributes
			var attributes = '';
			if(data.attributes){
				for(var attr in data.attributes){
					if(data.attributes.hasOwnProperty(attr)){
						attributes += ' ' + attr + '="' + data.attributes[attr] + '"';
					}
				}
			}
			
			
			// Form fields by type
			
			// - statement
			if(data.type === 'statement'){
				// it looks like there is nothing else to add for a statement
				additional_classes = ' checked';
				add_button = true;
				button_html = 'Continue';
			}
			else{
				html += '<div class="form-control ' + form_settings.control.class + '">';
				
				// - text/number/email/tel/url
				if(data.type === 'text' || data.type === 'number' || data.type === 'email' || data.type === 'tel' || data.type === 'url'){
					html += '<div class="form-' + data.type + '"><input type="' + data.type + '" class="prime-field ' + form_settings.control.fields.text.field.class + '"' + (data.attributes && data.attributes.id ? '' : ' id="' + label_for + '"') + (data.value ? ' value="' + data.value + '"' : '') + attributes + '/></div>';
					add_button = true;
				}
				
				// - textarea
				else if(data.type === 'textarea'){
					html += '<div class="form-' + data.type + '"><textarea class="prime-field ' + form_settings.control.fields.textfield.field.class + '"' + (data.attributes && data.attributes.id ? '' : ' id="' + label_for + '"') + attributes + '>' + (data.value ? ' value="' + data.value + '"' : '') + '</textarea></div>';
					add_button = true;
				}
				
				// - select
				else if(data.type === 'select'){
					html += '<div class="form-' + data.type + ' ' + form_settings.control.fields.select.class + '"><select type="' + data.type + '" class="prime-field ' + form_settings.control.fields.select.field.class + '"' + (data.attributes && data.attributes.id ? '' : ' id="' + label_for + '"') + attributes + '>';
					if(data.choices){
						for(var c = 0, cL = data.choices.length; c < cL; c++){
							var choice = data.choices[c];
							html += '<option value="' + (choice.value ? choice.value : choice.label) + '"' + (choice.selected ? ' selected="selected"' : '') + '>' + choice.label + '</option>';
						}
					}
					
					html += '</select></div>';
				}
				
				// - choices
				else if(data.type === 'choices'){
					var type_settings = form_settings.control.fields.choices,
						alignment_classes = '';
					switch(data.alignment){
						case 'row': 
							alignment_classes = ' fxdir_row';
							break;
						case 'rows': 
							alignment_classes = ' fxwrap_w fxdir_row';
							break;
						case 'column': 
							alignment_classes = ' fxdir_col';
							break;
						case 'column-full': 
							alignment_classes = ' wi_100 fxdir_col';
							break;
						default: alignment_classes = ' fxwrap_w fxdir_row';
					}
					
					html += '<div class="form-' + data.type + ' ' + type_settings.class + alignment_classes + '">';
					
					if(data.choices){
						var choice_type = '',
							custom_required = '';
						if(data.multiple && data.multiple == true){
							add_button = true;
							choice_type = 'checkbox';
							if(attributes.indexOf('required') > -1){
								attributes = attributes.replace('required=', 'data-required=');
							}
						}
						else{
							choice_type = 'radio';
						}
						
						for(var c = 0, cL = data.choices.length; c < cL; c++){
							var choice = data.choices[c];
							html += '<div class="form-choice ' + type_settings.choice.class + (data.classes ? ' ' + data.classes : '') + '">';
							html += '<label class="' + type_settings.label.class + '">';
							html += '<input type="' + choice_type + '" data-label="' + choice.label + '" value="' + (choice.value ? choice.value : choice.label) + '" class="prime-field ' + type_settings.field.class + '"' + attributes + (choice.selected ? ' checked="checked"' : '') + '/>';
							if(choice.image_url){
								html += '<div class="form-choice-label ' + type_settings.text_has_image.class + '">'
								html += '<img src="' + choice.image_url + '" class="' + type_settings.text_has_image.image.class + '" title="' + choice.label + '" alt="' + choice.label + '" />';
								html += choice.label + '</div>';
								html += '<span class="' + type_settings.text_has_image.icon_after.class + '">' + (type_settings.text_has_image.icon_after.html ? type_settings.text_has_image.icon_after.html : '') + '</span>';
								html += '<div class="' + type_settings.text_has_image.icon_after_bg.class + '"></div>';
							}
							else{
								html += '<div class="form-choice-label ' + type_settings.text.class + '">' + choice.label + '</div>';
								html += '<span class="' + type_settings.text.icon_after.class + '">' + (type_settings.text.icon_after.html ? type_settings.text.icon_after.html : '') + '</span>';
							}
							html += '</label></div>';
						}
					}
					
					html += '</div>';
				}
				
				// - scale
				else if(data.type === 'scale'){
					var type_settings = form_settings.control.fields.scale;
					
					html += '<div class="form-' + data.type + ' ' + type_settings.class + '">';
					
					if(data.choices){
						var name = (data.attributes && data.attributes.name) ? data.attributes.name : 'custom-scale-' + data.id,
							start = data.choices.start ? parseInt(data.choices.start) : 0,
							count = data.choices.count ? start + parseInt(data.choices.count) : start + 10,
							selected = data.choices.selected ? parseInt(data.choices.selected) : undefined;
						
						html += '<div class="form-choices ' + type_settings.choices.class + '">';
						for(var c = start; c < count; c++){
							html += '<label class="' + type_settings.choices.label.class + '" title="' + c + '">';
							html += '<input type="radio" value="' + c + '" class="prime-field ' + type_settings.choices.field.class + '"' + attributes + (selected === c ? ' checked="checked"' : '') + '/>';
							html += '<div class="form-choice-label ' + type_settings.choices.text.class + '">' + c + '</div>';
							html += '</label>';
						}
						html += '</div>';
						
						if(data.choices.labels){
							html += '<div class="form-labels ' + type_settings.labels.class + '">';
							for(var l = 0, lL = data.choices.labels.length; l < lL; l++){
								html += '<div class="form-labels ' + type_settings.labels.label.class + '">' + data.choices.labels[l] + '</div>';
							}
						}
					}
					
					html += '</div>';
				}
				
				// - dropdown
				else if(data.type === 'dropdown'){
					if(data.tags && data.tags == true){
						var type_settings = form_settings.control.fields.tags;
						html += '<div class="form-tags ' + type_settings.class + '"><select type="' + data.type + '" class="prime-field"' + (data.attributes && data.attributes.id ? '' : ' id="' + label_for + '"') + attributes + ' multiple>';
					
						if(data.choices){
							for(var c = 0, cL = data.choices.length; c < cL; c++){
								var choice = data.choices[c];
								html += '<option value="' + (choice.value ? choice.value : choice.label) + '"' + (choice.selected ? ' selected="selected"' : '') + '>' + choice.label + '</option>';
							}
						}
						
						html += '</select></div>';
					}
					else{
						var type_settings = form_settings.control.fields.dropdown;
						html += '<div class="form-' + data.type + ' ' + type_settings.class + '"><input type="text"' + (data.value ? ' value="' + data.value + '"' : '') + (data.attributes && data.attributes.id ? '' : ' id="' + label_for + '"') + ' class="prime-field ' + form_settings.control.fields.dropdown.field.class + '"' + attributes + '/></div>';
					}
					add_button = true;
				}
				
				// - rating
				else if(data.type === 'rating'){
					var type_settings = form_settings.control.fields.rating;
					html += '<div class="form-' + data.type + ' ' +  type_settings.class + '">';
					var icon = data.icon ? data.icon : false;
					
					if(data.choices){
						var icon_width = 100 / data.choices.length;
						for(var c = data.choices.length - 1; c > -1; c--){
							var choice = data.choices[c],
								c_icon = choice.icon ? choice.icon : icon;
							html += '<input type="radio" id="' + data.attributes.name + '-' + c + '" value="' + (choice.value ? choice.value : choice.label) + '" class="prime-field ' + type_settings.field.class + '"' + attributes + (choice.selected ? ' checked="checked"' : '') + '/>';
							html += '<label for="' + data.attributes.name + '-' + c + '" title="' + choice.label + '" class="' + type_settings.label.class + '" style="width: ' + icon_width + '%;">' + (c_icon ? '<span class="' + (c_icon.class ? c_icon.class : '') + '">' + (c_icon.html ? c_icon.html : '') + '</span>' : choice.label) + '</label>';
						}
					}
					
					html += '</div>';
				}
				
				// - slider
				else if(data.type === 'slider'){
					var type_settings = form_settings.control.fields.slider,
						options = {};
					html += '<div class="form-' + data.type + ' ' +  type_settings.class + '">';
					
					if(data.choices){
						var is_range = data.choices.range === true ? true : false,
							show_field = data.choices.field === true ? true : false,
							min = data.choices.min ? data.choices.min : 0,
							max = data.choices.max ? data.choices.max : 1000,
							step = data.choices.step ? data.choices.step : 1,
							values = data.choices.values,
							val1 = (values && values[0]) ? values[0] : min,
							val2 = (values && values[1]) ? values[1] : max,
							name = (data.attributes && data.attributes.name) ? data.attributes.name : label_for;
						
						options = {
							min: min,
							max: max,
							step: step,
							range: is_range,
							create: function(event, ui){
								var $this_control = $(this);
								if(type_settings.slide.range.class){
									$this_control.find('.ui-slider-range').addClass(type_settings.slide.range.class);
								}
								if(type_settings.slide.handle.class){
									$this_control.find('.ui-slider-handle').addClass(type_settings.slide.handle.class);
								}
							},
							slide: function(event, ui){
								var $this_control = $(this),
									$min = $this_control.data('$min'),
									this_val = ui.values ? ui.values : [ui.value];
								
								if(!$min){
									$min = $this_control.closest('.form-slider').find('.field-slider-min');
									$this_control.data('$min', $min);
								}
								$min.val(this_val[0]);
								
								if(this_val[1]){
									var $max = $this_control.data('$max');
									if(!$max){
										$max = $this_control.closest('.form-slider').find('.field-slider-max');
										$this_control.data('$max', $max);
									}
									$max.val(this_val[1]);
								}
							}
						}
						if(is_range){
							options.values = [val1, val2];
						}
						else{
							options.value = val1;
						}
						
						if(data.attributes){
							for(var attr in data.attributes){
								if(data.attributes.hasOwnProperty(attr)){
									if(attr !== 'name'){
										attributes += ' ' + attr + '="' + data.attributes[attr] + '"';
									}
								}
							}
						}
						
						
						html += '<div class="form-slider-slide ' + type_settings.slide.class + '" data-slider-min="' + min + '" data-slider-max="' + max + '" data-is-range="' + is_range + '"></div>';
						html += '<div class="form-slider-fields ' + type_settings.fields.class + '">';
						html += '<input type="number" class="prime-field field-slider-min ' + type_settings.fields.field_1.class + '"' + (data.attributes && data.attributes.id ? '' : ' id="' + label_for + '"') + ' value="' + val1 + '" name="' + name + '-min' + '"' + attributes + '/>';
						if(is_range){
							html += '<span class="' + type_settings.fields.separator.class + '">-</span><input type="number" class="field-slider-max ' + type_settings.fields.field_2.class + '" value="' + val2 + '" name="' + name + '-max' + '"' + attributes + '/>';
						}
						html += '</div>';
					}
					
					html += '</div>';
					add_button = true;
				}
				
				html += '</div>';
			}
			
			// notifications
			html += '<div class="notifications ' + form_settings.notifications.class + '"></div>';
			
			// button area
			if(add_button){
				html += '<div class="button-area ' + form_settings.button_area.class + '">';
				html += '<button type="button" class="' + form_settings.button_area.button.class + '">' + (button_html ? button_html : form_settings.button_area.button.html) + '</button>';
				html += '<span class="' + form_settings.button_area.post_text.class + '">' + (post_text_html ? post_text_html : form_settings.button_area.post_text.html) + '</span>';
				html += '</div>';
			}
			html += '</div>';
			
			
			// insert new data
			var $html = $(html);
			$form_groups.append($html);
			
			if(additional_classes !== ''){
				$html.addClass(additional_classes);
			}
			
			// Additional plugins init
			
			// - text mask
			
			if(data.mask && data.mask.pattern){
				$html.find('input').mask(data.mask.pattern);
			}
			else{
				$html.find('input').unmask();
			}
			
			// - select
			if(data.type === 'select'){
				var type_settings = form_settings.control.fields.dropdown,
					$select = $html.find('select');
				$select
					.selectmenu({
						select: function(event, ui){
							$(event.target).trigger('change');
						},
					})
					.data('ui-selectmenu')._renderItem = function (ul, item) {
						ul.addClass(type_settings.dropdown.menu.class);
						var li_html = '<li class="' + type_settings.dropdown.item.class + '"><div class="' + type_settings.dropdown.wrap.class + '"><span class="' + type_settings.dropdown.link.class + '">' + item.label + '</span></div></li>';
						return $(li_html).appendTo(ul);
					}
				$select.closest('.form-group').children('label').removeAttr('for');
			}
			
			// - textarea
			else if(data.type === 'textarea'){
				autosize($html.find('textarea'));
			}
			
			// - tags/dropdown autocomplete
			else if(data.type === 'dropdown'){
				if(data.tags && data.tags == true){
					var type_settings = form_settings.control.fields.tags,
						args = {
						tokensAllowCustom : (data.allowCustom ? data.allowCustom : false),
						displayNoResultsMessage: true,
						
						container_class: type_settings.container.class,
						token_class: type_settings.container.token.class,
						token_text_class: type_settings.container.token.text.class,
						token_dismiss_class: type_settings.container.token.dismiss.class,
						token_dismiss_html: type_settings.container.token.dismiss.html,
						token_search_class: type_settings.container.token_search.class,
						token_field_class: type_settings.container.token_search.field.class,
						
						dropdown_class: type_settings.dropdown.class,
						menu_class: type_settings.dropdown.menu.class,
						item_class: type_settings.dropdown.item.class,
						link_class: type_settings.dropdown.link.class,
						hightlight_class: type_settings.dropdown.hightlight.class,
						empty_class: type_settings.dropdown.empty.class,
					};
					$html.find('select')
						.attr('tabindex', 0)
						.tokenize2(args);
				}
				else{
					var type_settings = form_settings.control.fields.dropdown;
					$html.find('input[type=text]').autocomplete({
						source: data.choices,
					})
					.data('uiAutocomplete')._renderItem = function (ul, item) {
						ul.addClass(type_settings.dropdown.menu.class);
						var li_html = '<li class="' + type_settings.dropdown.item.class + '"><div class="' + type_settings.dropdown.wrap.class + '"><span class="' + type_settings.dropdown.link.class + '">' + item.label + '</span></div></li>';
						return $(li_html).appendTo(ul);
					}
				}
			}
			
			// - slider
			else if(data.type === 'slider'){
				$html
					.data({
						'$slide': $html.find('.form-slider-slide'),
						'$min': $html.find('.field-slider-min'),
						'$max': $html.find('.field-slider-max')
					})
					.find('.form-slider-slide').slider(options)
					.end()
					.find('input[type=number]').on('keyup change', function(){
						var $this = $(this),
							val = parseInt($this.val()),
							$slide = $html.data('$slide'),
							slider_min = $slide.data('slider-min'),
							slider_max = $slide.data('slider-max'),
							is_range = $slide.data('is-range');
						
						val = isNaN(val) ? slider_min : val;
						val = val < slider_min ? slider_min : (val > slider_max ? slider_max : val);
						
						if(is_range){
							var slide_index = $this.hasClass('field-slider-min') ? 0 : 1;
							$slide.slider('values', slide_index, val);
						}
						else{
							$slide.slider('value', val);
						}
						$this.val(val);
					});
			}
		},
		
		// - check if there is any dependency and it has a Display condition
		getDisplayDependency: function(dependencies, id){
			if(dependencies && dependencies.length > 0){
				methods.dependencies[methods.dependencies.length] = {
					id: id,
					dependency: dependencies
				};
				for(var i = 0, iL = dependencies.length; i < iL; i++){
					if(dependencies[i].display) { return true; }
				}
			}
			return false;
		},
		
		// - check next question
		question_next: function($form, $active, $next, force_submit){
			$active = $active ? $active : $form.find('.form-group.active');
			methods.checkDependencies($active);
			
			if(!$next){
				$next = $active[0] ? $active.nextAll('.form-group:not(.hidden)').first() : $form.find('.form-group:first');
			}
			
			if($next[0]){
				$next.find('.form-group-cover').trigger('click');
			}
			else{
				if(force_submit){
					$form.find('[type=submit]:first').trigger('click');
				}
				return false;
			}
			return true;
		},
		
		// - check prev question
		question_prev: function($form, $active, $prev){
			$active = $active ? $active : $form.find('.form-group.active');
			methods.checkDependencies($active);
			
			if(!$prev){
				$prev = $active[0] ? $active.prevAll('.form-group:not(.hidden)').first() : [];
			}
			
			if($prev[0]){
				$prev.find('.form-group-cover').trigger('click');
			}
		},
		
		// - focus next question
		question_focus: function($form, $active, $next){
			$active = $active ? $active : $form.find('.form-group.active');
			
			if(!$next){
				$next = $active[0] ? $active.next('.form-group') : $form.find('.form-group:first');
			}
			if($next[0] && !$next.is($active)){
				methods.validate_field($form, $active);
				$active.removeClass('active');
				
				if(methods.do_not_animate !== true){
					if(form_tm){
						clearTimeout(form_tm);
					}
					methods.do_not_scroll = true;
					$html_body.stop().animate({
						scrollTop: $next.offset().top - ($window.height() * 0.4)
					}, 500, function(){
						form_tm = setTimeout(function(){
							methods.do_not_scroll = false;
						}, 150);
					});
				}
				else{
					methods.do_not_animate = false;
				}
				$next.addClass('active');
			}
		},
		
		// validation groups
		validation_group_1: ['text', 'number', 'email', 'tel', 'url', 'textarea', 'select', 'dropdown'],
		
		// - validate form
		validate_field: function($form, $group){
			var result = true;
			$group = $group ? $group : $form.find('.form-group.active');
			if($group[0]){
				var $fields = $group.find('.prime-field'),
					$field = $fields.first();
				
				if($field[0]){
					var type = $field.attr('type'),
						required = $field.attr('required'),
						value = $field.val(),
						pattern = $field.attr('pattern'),
						req_type = $field.data('required-type');
					
					value = value ? value.toString().trim() : '';
					
					if(methods.validation_group_1.indexOf(type) > -1){
						
						// - required
						if(required && value.length === 0){
							methods.build_notification($group, 'error', 'required');
							result = false;
						}
						
						if(value.length > 0){
						
							// - pattern
							if(result && pattern){
								try{
									pattern = pattern.replace(/\(/g, '\\(').replace(/\)/g, '\\)');
									var regex = new RegExp('^' + pattern + '$').test(value);
									if(!regex){
										methods.build_notification($group, 'error', 'pattern');
										result = false;
									}
								}
								catch(e){
									
								}
							}
							
							// - email
							if(result && type === 'email' && (value.indexOf('@') < 0 || value.indexOf('.') < 0)){
								methods.build_notification($group, 'error', 'email');
								result = false;
							}
							
							// - url
							if(result && type === 'url' && ((value.indexOf('http://') < 0 && value.indexOf('https://') < 0) || value.indexOf('.') < 0)){
								methods.build_notification($group, 'error', 'url');
								result = false;
							}
							
							// - input check
							if(result && req_type){
								if(req_type === 'alpha'){
									if(!/^[a-zA-Z]+$/.test(value)){
										methods.build_notification($group, 'error', 'alpha');
										result = false;
									}
								}
								else if(req_type === 'numeric'){
									if(!/^[0-9]+$/.test(value)){
										methods.build_notification($group, 'error', 'numeric');
										result = false;
									}
								}
								else if(req_type === 'alphanumeric'){
									if(!/^[a-zA-Z0-9]+$/.test(value)){
										methods.build_notification($group, 'error', 'alphanumeric');
										result = false;
									}
								}
							}
						}
					}
					
					// - radio and checkbox
					if(result && (type === 'radio' || type === 'checkbox')){
						var custom_required = $field.data('required');
						
						// - required
						if(required || custom_required){
							var checked = false;
							
							for(var i = 0, iL = $fields.length; i < iL; i++){
								if($fields.get(i).checked){
									checked = true;
									break;
								}
							}
							
							if(!checked){
								methods.build_notification($group, 'error', 'required');
								result = false;	
							}
						}
					}
				}
			}
			
			if(result){
				$group
					.data('complete', true)
					.find('.notifications').empty();
			}
			else{
				$group.data('complete', false);
			}
			
			methods.form_check($form);
			return result;
		},
		
		// - build notification
		build_notification: function($group, type, message){
			var $notification = $group.find('.notifications');
			if($notification[0]){
				type = type ? type : 'error';
				message = message ? message : 'default';
				$notification.html('<div class="arrow ' + form_settings.notifications.arrow.class + ' ' + form_settings.notifications[type].arrow.class + '"></div><div class="' + form_settings.notifications[type].class + '">' + form_settings.notifications.messages[message] + '</div>');
			}
		},
		
		// - form fields tracking
		track_current_field: function(){
			requestAnimationFrame(function(){
				if(methods.do_not_scroll !== true){
					var win_cent = $window.scrollTop() + hei_offset,
						$inview = methods.$groups.filter('.inview'),
						$closest = [],
						min = 9999;
					
					for(var i = 0, iL = $inview.length; i < iL; i++){
						var $el = $inview.eq(i),
							in_cent = $el.offset().top + ($el.height() / 2),
							lmin =  Math.abs(win_cent - in_cent);
						if(min > lmin){
							min = lmin;
							$closest = $el;
						}
					}
					if($closest[0]){
						methods.do_not_animate = true;
						$closest.find('.form-group-cover').trigger('click');
					}
				}
			})
		},
		
		// - check dependencies
		checkDependencies: function($active){
			var dependencies = methods.dependencies,
				active_id = $active.attr('id')
			if(dependencies[0]){
				for(var i = 0, iL = dependencies.length; i < iL; i++){
					var id = dependencies[i].id,
						$dependent = methods.$groups.filter('#' + id),
						dependency = dependencies[i].dependency;
					
					if($dependent[0]){
						for(var d = 0, dL = dependency.length; d < dL; d++){
							var dep = dependency[d],
								dep_id = 'form-group-' + dep.id;
								
							if(dep_id === active_id){
								
								// check display 
								if(dep.display){
									methods.checkDisplayDepenedency($active, $dependent, dep.display);
								}
								
								// check html dependency values
								if(dep.html){
									var $html_deps = $dependent.find('.dependent');
									for(var dep_val in dep.html){
										if(dep.html.hasOwnProperty(dep_val)){
											$html_deps.filter('[data-value="' + dep_val + '"]').html(methods.getActiveValue($active, dep.html[dep_val]));
										}
									}
								}
							}
						}
					}
				}
			}
		},
		
		// - retrieves dependency html values from active group
		getActiveValue: function($active, dep_val){
			if($active && $active[0] && dep_val){
				var $prime = $active.data('$prime');
				if(!$prime){
					$prime = $active.find('.prime-field');
					$active.data('$prime', $prime);
				}
				
				var prime = $prime.get(0),
					prime_tag = prime.tagName,
					$selected = [],
					val = [];
				
				if($prime.length > 1){
					$selected = $prime.filter(':checked');
				}
				else{
					$selected = $prime;
				}
				
				
				// value
				if(dep_val === 'value'){
					for(var p = 0, pL = $selected.length; p < pL; p++){
						val[val.length] = $selected.eq(p).val().toString();
					}
				}
				
				// label
				else if(dep_val === 'label'){
					for(var p = 0, pL = $selected.length; p < pL; p++){
						val[val.length] = $selected.eq(p).data('label').toString();
					}
				}
				
				return val.toString();
			}
			return '';
		},
		
		// - check Display dependency
		checkDisplayDepenedency: function($active, $dependent, display){
			if($active[0] && $dependent[0]){
				var $prime = $active.data('$prime');
				if(!$prime){
					$prime = $active.find('.prime-field');
					$active.data('$prime', $prime);
				}
				
				var prime = $prime.get(0),
					prime_tag = prime.tagName,
					$selected = [],
					val = [];
				
				if($prime.length > 1){
					$selected = $prime.filter(':checked');
				}
				else{
					$selected = $prime;
				}
				
				
				// value
				if(display.value){
					for(var p = 0, pL = $selected.length; p < pL; p++){
						val[val.length] = $selected.eq(p).val().toString();
					}
					
					// - any value
					if(display.value === '*'){
						if(val){
							$dependent.removeClass('hidden');
						}
						else{
							$dependent.addClass('hidden');
						}
					}
					
				}
			}
		},
		
		
		/* SUPPLEMENTALS */
		
		// screen resize check
		screen_resize : function(){
			clearTimeout(resize_timeout);
			resize_timeout = setTimeout(function(){
				current_window_width = window.innerWidth;
				if(current_window_width != window_width){
					window_width = current_window_width;
					window_height = $window.height();
					hei_offset = window_height * 0.45;
					methods.update();
				}
			}, 300);
		},
		// update on screen resize
		update : function(){
			for(var i = 0, iL = update_functions.length; i < iL; i++){
				update_functions[i][0](update_functions[i][1]);
			}
		},
		
    }

    methods.init();
	window.test = methods;
	
});




