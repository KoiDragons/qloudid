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
	
	// TEST
	var $console = $('#console');
	var report = function(msg){
		var cdate = new Date();
		$console.val(cdate.getMinutes() + ':' + cdate.getSeconds() + ' ' +  msg + '\n' + $console.val());
	}
	// - TEST end
	
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
		sub_selects: {},
		do_not_animate : false,
		do_not_scroll: false,
		
		// - form init
		form_init : function(){
			var $outer_form = $('.typeform-outer'),
				$form = $('.typeform form'),
				$end_screen = $('.typeform-end');
				
			methods.$form_header = $form.find('.form-header-content');
				
			
			// Start screen
			if($outer_form[0]){
				$body.addClass('ovfl_hid');
			
				$outer_form.on('click', '.button-area button', function(){
					$outer_form.removeClass('active');
					setTimeout(function(){
						$outer_form.css('display', 'none');
						$body.removeClass('ovfl_hid');
					}, 200);
				});
			}
			
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
			});
			
			$form
				.on('submit', function(){
					var $this = $(this);
					report('submit');
					if(methods.form_check($form, true, true)){
						if($end_screen[0]){
							$end_screen
								.removeClass('dnone')
								.addClass('dflex');
							$body.addClass('ovfl_hid');
							requestAnimationFrame(function(){
								$end_screen.addClass('active');
							});
							return false;
						}
						
						// final form submission
						return form_submission($this);
					}
					else{
						return false;
					}
					// final form submission
					return form_submission($this);
				})
				.on('focus', '.focusable', function(){
					var $this = $(this),
						$group = $this.closest('.form-group');
					
					report('focus -> .focusable');
					if(!$group.hasClass('active')){
						report(' - del -> manageHeader() question_focus()');
						methods.manageHeader($group);
						methods.question_focus($this.closest('form'), undefined, $group);
					}
				})
				.on('click', '.form-group > label:not([for])', function(){
					var $this = $(this),
						$group = $this.closest('.form-group');
					report('click -> .form-group > label:not([for])');
					$this.trigger('focus');
					methods.question_focus($this.closest('form'), undefined, $group);
					methods.manageHeader($group);
					return false;
				})
				.on('click', '.form-group-cover', function(){
					var $this = $(this),
						$group = $this.closest('.form-group'),
						$focusable = $group.find('.focusable');
					report('click -> .form-group-cover');
					
					if($group.hasClass('active')){
						report('- delegate -> validate_field()');
						methods.validate_field($form, $group);
					}
					
					else{
						if($focusable[0]){
							report('- delegate -> $focusable.trigger(focus)');
							$focusable.trigger('focus');
						}
						else{
							report('- delegate -> manageHeader() question_focus()');
							$this.trigger('focus');
							methods.manageHeader($group);
							methods.question_focus($this.closest('form'), undefined, $group);
						}
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
					if(!methods.form_check($form, true, true)){
						return false;
					}
					return true;
				})
				.on('keyup change', 'input, select, textarea', function(e){
					var $this = $(this),
						$group = $this.closest('.form-group'),
						$choice = $group.find('.form-choices:first, .form-rating:first');
					report('keyup change');
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
							if(e.type === 'change' && $this.data('trackable') !== false){
								if($this.hasClass('has-choices')){
									methods.show_sub_select($this, $group);
								}
								else{
									$this
										.data('skip', true)
										.selectmenu('refresh');
									console.log(2);
									methods.question_next($this.closest('form'), $group);
								}
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
		form_check: function($form, show_group, validate_all_form){
			var $notification = $form.find('.form-notification'),
				$progress = $form.find('.form-footer .progress .progress-bar'),
				$groups = $form.find('.form-group'),
				$first_group = [],
				complete_count = 0,
				incomplete_count = 0;
			
			// whole form validation
			if(validate_all_form){
				for(var g = 0, gL = $groups.length; g < gL; g++){
					methods.validate_field($form, $groups.eq(g), true);
				}
			}
			
			// post validation 
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
			
			if($notification.hasClass('active') || validate_all_form){
				if($first_group[0]){
					$notification
						.addClass('active')
						.html('<div class="' + form_settings.form_notifications.class + '">' + incomplete_count + form_settings.form_notifications.html + '</div>');
					if(show_group){
						$first_group.find('.form-group-cover').trigger('click');
					}
					return false;
				}
				else{
					$notification.empty();
				}
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
				html = '<div class="form-group ' + ((data.attributes && data.attributes.required && data.attributes.required === 'required') ? 'form-group-required ' : '') + form_settings.group.class + (data.extends ? ' extends' : '') + (is_dependent ? ' hidden' : '') + '" id="form-group-' + data.id + '"' + (data.extends ? ' data-extends="#form-group-' + data.extends + '"' : '') + '><a href="#" class="form-group-cover wi_100 hei_100 dblock dnone_pa pos_abs zi2 top0 left0 curd"></a>',
				additional_classes = '',
				label_for = '',
				custom_content = data.customContent,
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
					var type_settings = data.formatting === true ? form_settings.control.fields.textfield.formatted : form_settings.control.fields.textfield.nonformatted;
					html += '<div class="form-' + data.type + ' ' + type_settings.class + '"><textarea class="prime-field ' + type_settings.field.class + '"' + (data.attributes && data.attributes.id ? '' : ' id="' + label_for + '"') + attributes + '>' + (data.value ? ' value="' + data.value + '"' : '') + '</textarea></div>';
					add_button = true;
				}
				
				// - select
				else if(data.type === 'select'){
					var type_settings = form_settings.control.fields.select,
						sub_html = '',
						build_select_choices = function(loc_data, c_id, p_id, p_val, is_prime){
							var loc_body = '',
								loc_choices = loc_data.choices,
								has_choices = false;
								
							if(loc_choices){
								for(var c = 0, cL = loc_choices.length; c < cL; c++){
									var choice = loc_choices[c],
										choice_val = choice.value ? choice.value : choice.label;
									loc_body += '<option value="' + choice_val + '"' + (choice.selected ? ' selected="selected"' : '') + '>' + choice.label + '</option>';
									
									if(choice.choices){
										has_choices = true;
										var loc_sub_html = build_select_choices(choice, '', c_id, choice_val);
										sub_html += loc_sub_html;
									}
								}
							}
							loc_body += '</select></div></div>';
							
							var sub_label = loc_data['choices-sublabel'] ? '<label class="' +  form_settings.sublabel.class + '">' + loc_data['choices-sublabel'] + '</label>' : '',
								loc_header = '<div class="form-' + data.type + ' ' + (is_prime ? '' : 'form-sub-' + data.type + ' dnone ') + type_settings.class + '"' + (p_val ? ' data-parent-value="' + p_val + '"' : '') + '>' + sub_label + '<div class="pos_rel"><select type="' + data.type + '" class="' + (is_prime ? 'prime-field focusable ' : '') + (has_choices ? 'has-choices ' : '') + type_settings.field.class + '"' + (c_id ? ' id="' + label_for + '"' : '') + ' data-access-id="' + (c_id ? c_id : p_id) + '"' + attributes + '>';
							return loc_header + loc_body;
						}
					html += build_select_choices(data, (data.attributes && data.attributes.id ? '' : label_for), undefined, undefined, true);
					
					if(sub_html){
						html += sub_html;
					}
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
						html += '<div class="form-' + data.type + ' ' + type_settings.class + '"><input type="text"' + (data.value ? ' value="' + data.value + '"' : '') + (data.attributes && data.attributes.id ? '' : ' id="' + label_for + '"') + ' class="prime-field ' + form_settings.control.fields.dropdown.field.class + (custom_content ? ' has-custom-content' : '') + '"' + attributes + '/></div>';
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
				
				// - multiple
				else if(Array.isArray(data.type)){
					var has_prime = false;
					html += '<div class="' + form_settings.control.fields.multiple.class + '">';
					
					for(var d = 0, dL = data.type.length; d < dL; d++){
						var current_type = data.type[d],
							current_attr = data.attributes[d],
							current_attributes = '';
						
						if(current_attr){
							for(var attr in current_attr){
								if(current_attr.hasOwnProperty(attr)){
									current_attributes += ' ' + attr + '="' + current_attr[attr] + '"';
								}
							}
						}
						
						// -- select
						if(current_type === 'select'){
							var sub_html = '',
								current_choices = data.choices[d],
								build_select_choices = function(loc_choices, c_id, p_id, p_val, is_prime){
									var loc_body = '',
										has_choices = false;
										
									if(loc_choices){
										for(var c = 0, cL = loc_choices.length; c < cL; c++){
											var choice = loc_choices[c],
												choice_val = choice.value ? choice.value : choice.label;
											loc_body += '<option value="' + choice_val + '"' + (choice.selected ? ' selected="selected"' : '') + '>' + choice.label + '</option>';
											
											if(choice.choices){
												has_choices = true;
												var loc_sub_html = build_select_choices(choice.choices, '', c_id, choice_val);
												sub_html += loc_sub_html;
											}
										}
									}
									loc_body += '</select></div>';
									
									var loc_header = '<div class="form-' + current_type + ' ' + (is_prime ? '' : 'form-sub-' + current_type + ' dnone ') + form_settings.control.fields.multiple.select.class + '"' + (p_val ? ' data-parent-value="' + p_val + '"' : '') + '><select type="' + current_type + '" class="' + (!has_prime ? 'prime-field focusable ' : '') + (has_choices ? 'has-choices ' : '') + form_settings.control.fields.multiple.select.field.class + '"' + (c_id ? ' id="' + label_for + '"' : '') + ' data-access-id="' + (c_id ? c_id : p_id) + '"' + current_attributes + '>';
									has_prime = true;
									return loc_header + loc_body;
							}
							html += build_select_choices(current_choices.choices, (current_attr && current_attr.id ? '' : (label_for + '-' + d)), undefined, undefined, true);
							
							if(sub_html){
								html += sub_html;
							}
						}
						
						// -- html
						else if(current_type === 'html'){
							html += '<div class="' + form_settings.control.fields.multiple.html.class + '">' + data.choices[d].html + '</div>';
						}
					}
					html += '</div>';
					
					
					// -- secondary
					var secondaries = data.secondary;
					if(secondaries){
						var sec_html = '<div class="form-secondary ' + form_settings.control.fields.secondary.class + '">';
						for(var s = 0, sL = secondaries.length; s < sL; s++){
							var secondary = secondaries[s],
								sec_type = secondary.type,
								sec_attr = '';
							
							if(secondary.attributes){
								for(var attr in secondary.attributes){
									if(secondary.attributes.hasOwnProperty(attr)){
										sec_attr += ' ' + attr + '="' + secondary.attributes[attr] + '"';
									}
								}
							}
							
							// --- checkbox
							if(sec_type === 'checkbox'){
								sec_html += '<label class="form-secondary-' + sec_type + ' ' + form_settings.control.fields.secondary.checkbox.class + '"><input type="' + sec_type + '" class="' + form_settings.control.fields.secondary.checkbox.field.class + '"' + (secondary.value ? ' value="' + secondary.value + '"' : '') + sec_attr + '/><span class="' + form_settings.control.fields.secondary.checkbox.label.class + '">' + secondary.label + '</span></label>';
							}
						}
						sec_html += '</div>';
						html += sec_html;
					}
				}
				
				html += '</div>';
			}
			
			// notifications
			html += '<div class="notifications ' + form_settings.notifications.class + '"></div>';
			
			// button area
			if(add_button){
				html += '<div class="button-area ' + form_settings.button_area.class + '">';
				if(custom_content && custom_content.type){
					if(custom_content.type === 'button'){
						html += '<button type="button" class="' + form_settings.button_area.custom.button.class + '">' + (custom_content.html ? custom_content.html : form_settings.button_area.custom.button.html) + '</button>';
					}
				}
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
							var $event_target = $(event.target);
							if($event_target.data('skip') !== true){
								$event_target.trigger('change');
							}
							else{
								$event_target.data('skip', false);
							}
						},
					})
					.each(function(){
						$(this).data('ui-selectmenu')._renderItem = function (ul, item) {
							ul.addClass(type_settings.dropdown.menu.class);
							var li_html = '<li class="' + (!item.value ? 'dnonei ' : '') + type_settings.dropdown.item.class + '"><div class="' + type_settings.dropdown.wrap.class + '"><span class="' + type_settings.dropdown.link.class + '">' + item.label + '</span></div></li>';
							return $(li_html).appendTo(ul);
						}
					});
				var $sub_selects = $html.find('.form-sub-select');
				if($sub_selects[0]){
					var sub_selects = {};
					$sub_selects.each(function(){
						var $this_sub_select = $(this);
						sub_selects[$this_sub_select.data('parent-value')] = $this_sub_select;
					});
					methods.sub_selects[$select.attr('id')] = sub_selects;
					$sub_selects
						.detach()
						.removeClass('dnone');
				}
				$select.closest('.form-group').children('label').removeAttr('for');
			}
			
			// - multiple
			else if(Array.isArray(data.type)){
				var is_select_done = false;
				
				for(var d = 0, dL = data.type.length; d < dL; d++){
					var current_dt = data.type[d];
					
					// -- select
					if(current_dt === 'select' && is_select_done === false){
						var type_settings = form_settings.control.fields.dropdown,
							$select = $html.find('select');
						$select
							.selectmenu({
								select: function(event, ui){
									var $event_target = $(event.target);
									if($event_target.data('skip') !== true){
										$event_target.trigger('change');
									}
									else{
										$event_target.data('skip', false);
									}
								},
							})
							.each(function(){
								$(this).data('ui-selectmenu')._renderItem = function (ul, item) {
									ul.addClass(type_settings.dropdown.menu.class);
									var li_html = '<li class="' + (!item.value ? 'dnonei ' : '') + type_settings.dropdown.item.class + '"><div class="' + type_settings.dropdown.wrap.class + '"><span class="' + type_settings.dropdown.link.class + '">' + item.label + '</span></div></li>';
									return $(li_html).appendTo(ul);
								}
							});
						var $sub_selects = $html.find('.form-sub-select');
						if($sub_selects[0]){
							var sub_selects = {};
							$sub_selects.each(function(){
								var $this_sub_select = $(this);
								sub_selects[$this_sub_select.data('parent-value')] = $this_sub_select;
							});
							methods.sub_selects[$select.attr('id')] = sub_selects;
							$sub_selects
								.detach()
								.removeClass('dnone');
						}
						$select.closest('.form-group').children('label').removeAttr('for');
						is_select_done = true;
					}
				}
			}
			
			// - textarea
			else if(data.type === 'textarea'){
				if(data.formatting === true){
					tinyMCE.init({
						selector: '#' + $html.find('textarea').attr('id'),
						setup: function (editor) {
							editor.on('change', function (){
								this.save();
							});
						},
						plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
						toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
						menubar: false,
						toolbar_items_size: 'small',
						style_formats: [{title:"Bold text",inline:"b"},{title:"Red text",inline:"span",styles:{color:"#ff0000"}},{title:"Red header",block:"h1",styles:{color:"#ff0000"}},{title:"Example 1",inline:"span",classes:"example1"},{title:"Example 2",inline:"span",classes:"example2"},{title:"Table styles"},{title:"Table row 1",selector:"tr",classes:"tablerow1"}],
						templates: [{title: 'Test template 1',content: 'Test 1'},{title: 'Test template 2',content: 'Test 2'}]
					});
				}
				else{
					autosize($html.find('textarea'));
				}
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
					var type_settings = form_settings.control.fields.dropdown,
						custom_content = data.customContent;
					$html.find('input[type=text]').autocomplete({
						source: data.choices,
						response: function(e, ui){
							var $input_control = $(e.target);
							if($input_control.hasClass('has-custom-content')){
								var $custom_content = $input_control.data('$custom_content');
								if(!$custom_content){
									$custom_content = $input_control.closest('.form-group').find('.button-area .custom-content');
									$input_control.data('$custom_content', $custom_content);
								}
								if($custom_content[0]){
									if(ui.content.length === 0){
										$custom_content.addClass('active');
									} else{
										$custom_content.removeClass('active');
									}
								}
							}
						},
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
		
		// - hadble sub-selects
		show_sub_select: function($select, $group){
			var access_id = $select.data('access-id'),
				$form_select = $select.closest('.form-select'),
				val = $select.val();
			
			// detach all following sub-selects
			$form_select.nextAll('.form-sub-select')
				.each(function(){
					var $ns = $(this).find('select');
					$ns[0].selectedIndex = 0;
					$ns
						.data('skip', true)
						.selectmenu('refresh');
				})
				.detach();
			
			// find the right sub-select and attach it
			var $sub_select = methods.sub_selects[access_id][val];
			if($sub_select){
				$group.find('.prime-field').removeClass('prime-field focusable');
					
				$sub_select
					.insertAfter($form_select)
					.find('select')
						.val('')
						.addClass('prime-field focusable')
			}
			else{
				methods.question_next($group.closest('form'), $group);
			}
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
				/*if(force_submit){
					$form.find('[type=submit]:first').trigger('click');
				}
				*/
				$form.find('[type=submit]:first').trigger('click');
			}
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
		validation_group_1: ['text', 'number', 'email', 'tel', 'url', 'textarea', 'dropdown'],
		
		// - validate form field
		validate_field: function($form, $group, skip_form_check){
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
						if(required && (value.trim().length === 0)){
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
					
					// - select
					else if(type === 'select'){
						
						// - required
						if(required && (value.trim().length === 0 || value == 0)){
							methods.build_notification($group, 'error', 'required');
							result = false;
						}
					}
					
					// - radio and checkbox
					else if(result && (type === 'radio' || type === 'checkbox')){
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
					.removeClass('has_errors')
					.data('complete', true)
					.find('.notifications').empty();
			}
			else{
				$group
					.addClass('has_errors')
					.data('complete', false);
			}
			
			if(!skip_form_check){
				methods.form_check($form);
			}
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
				methods.displayHeader();
			});
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
					else{
						if(val == display.value){
							$dependent.removeClass('hidden');
						}
						else{
							$dependent.addClass('hidden');
						}
					}
					
				}
			}
		},
		
		// - manage header
		manageHeader: function($group){
			var $managed_group = [],
				$form_header = methods.$form_header;
			if($group.hasClass('extends')){
				$managed_group = $group.data('$managed_group');
				if(!$managed_group){
					$managed_group = methods.$groups.filter($group.data('extends'));
					$group.data('$managed_group', $managed_group);
				}
			}
			else{
				$managed_group = $group;
			}
			
			var id = $managed_group.attr('id');
			if($form_header.data('current-header') !== id){
				$form_header
					.data({
						'$current_group': $managed_group,
						'current-header': id
					})
					.empty()
					.append($managed_group.children('label').clone());
			}
		},
		
		// - show/hide Header
		displayHeader: function(){
			var $form_header = methods.$form_header,
				$form_pheader = $form_header.parent(),
				$current_group = $form_header.data('$current_group');
			
			if($current_group.prev()[0] && !$current_group.prev('.inview')[0]){
				if(!$form_pheader.hasClass('active')){
					$form_pheader.addClass('active');
				}
			}
			else{
				if($form_pheader.hasClass('active')){
					$form_pheader.removeClass('active');
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




