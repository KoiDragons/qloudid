/* WPdev functionality */
$(document).ready(function(){
	var $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body);
		
	
	// is VEX present
	try{
		var isVex = true;
		vex.defaultOptions.className = 'vex-theme-default';
	}
	catch(e){ var isVex = false; }
	
	
	
	// Menu selector
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
	
	
	
	// Language selector
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
	//editable
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
		
				//alert(val); return false;
				send_data.cid=$this.val();
				send_data.id=$(".jain").attr('id');
		
				$.ajax({
			url: '../updateFolder',
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
	
	
	// Sliding modal tabs
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
	
	
	
	// Date counter
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
	
	
	
	// Text slider
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

	
	/* FILTER */
	var filter_methods = {
		
		/* init */
		init : function(){
			var $wd_search_all = $('.wd_search');
				
			if($wd_search_all[0]){
				for(var i = 0, iL = $wd_search_all.length; i < iL; i++){
					var $search =  $wd_search_all.eq(i),
						$filters = $search.find('.wd_filters'),
						$filter_crumbs = $search.find('.filter_crumbs');
					
					// radio init
					filter_methods.radio_init($filters.find('.filter-radio input'), $filter_crumbs);
					
					// checkbox init
					filter_methods.checkbox_init($filters.find('.filter-checkbox input'), $filter_crumbs);
					
					// text field init
					filter_methods.textfield_init($filters.find('.filter-text input'));
					
					// range field init
					filter_methods.rangefield_init($filters.find('.filter-range input'));
					
					// slide checkbox init
					filter_methods.slide_checkbox_init($filters.find('.filter-slide-checkbox input'), $filter_crumbs);
					
				}
				
				// breadcrumbs delete events
				$body.on('click', '.filter_crumbs div a', function(){
					var $parent = $(this).parent(),
						$input = $parent.data('input'),
						$fcrumbs = $(this).closest('.filter_crumbs');
						
							
					if($input[0]){
						
						// radio clear
						if($input.attr('type') === 'radio'){
							var $zero_input = $input.closest('.filter-base').find('input[value="0"]');
							if($zero_input[0]){
								$input.closest('.filter-base').find('input[value="0"]').iCheck('check');
							}
							else{
								$input.closest('.filter-base').find('.filter-radio').remove();
								$parent.remove();
							}
						}
							
						// checkbox clear
						else if($input.attr('type') === 'checkbox'){
							var $this_filter = $input.closest('.filter');
							
							
							// sliding checkbox
							if($this_filter.hasClass('filter-slide-checkbox')){
								filter_methods.slide_checkbox_uncheck($input, $this_filter, $fcrumbs);
							}
							
							// regular checkbox
							else{
								$input.iCheck('uncheck');
							}
						}
						
						// text
						else if($input.attr('type') === 'text'){
							
							// range
							if($input.closest('.filter').hasClass('filter-range')){
								$input
									.data({
										'min-val' : undefined,
										'max-val' : undefined
									})
									.val('');
								
								var $dtlist = $input.data('target');
								if($dtlist[0]){
									$dtlist.find('li a')
										.removeAttr('disabled')
										.removeClass('selected');
								}
								var $fcrumbs = $parent.closest('.filter_crumbs');
								$parent.remove();
								filter_methods.breadcrumbs_check($fcrumbs, $input);
							}
						}
						
						
					}
					else{
						$parent.remove();
					}
						
					return false;
				});
				
				// breadcrumbs clear event
				$wd_search_all.find('.filter_crumbs .clear_filters').on('click', function(){
					$(this).closest('.filter_crumbs').find('.filter_crumb a').trigger('click');
					return false;
				});
				
				// regular datalist
				filter_methods.text_datalist_init();
				
				// range datalist
				filter_methods.range_datalist_init();
				
				// close datalists
				$body.on('click', '.filter-datalist-menu .datalist-menu-close', function(){
					var $dtlist_menu = $(this).closest('.filter-datalist-menu');
					if($dtlist_menu.hasClass('filter-text-datalist-menu')){
						filter_methods.textfield_close(undefined, $dtlist_menu);
					}
					else if($dtlist_menu.hasClass('filter-range-datalist-menu')){
						filter_methods.rangefield_close(undefined, $dtlist_menu);
					}
					
					return false;
				});
				
				// dynamic filters
				filter_methods.dynamic_filters_init($wd_search_all);
			}
			
		},
		
		
		
		/* radio init */
		radio_init : function($input, $filter_crumbs){
			
			$input.each(function(){
				var $current = $(this);
				if(!$current.siblings('.iCheck-helper')[0]){
					$current.iCheck({
						checkboxClass: 'icheckbox_minimal-aero',
						radioClass: 'iradio_minimal-aero',
						increaseArea: '20%',
					});
				}
			});
			
			$input.on({
				'ifChecked': function(){
					var $this = $(this);
					if($this.val() != '0'){
						filter_methods.breadcrumbs_add($filter_crumbs, $this);
					}
					filter_methods.breadcrumbs_check($filter_crumbs, $this);
				},
				'ifUnchecked': function(){
					var $this = $(this),
						$crumb = $this.data('crumb');
						
					if($crumb && $crumb[0]){
						$crumb.remove();
					}
				},
			});
		},
		
		
		
		/* checkbox init */
		checkbox_init : function($input, $filter_crumbs){
			
			$input.each(function(){
				var $current = $(this);
				if(!$current.siblings('.iCheck-helper')[0]){
					$current.iCheck({
						checkboxClass: 'icheckbox_minimal-aero',
						radioClass: 'iradio_minimal-aero',
						increaseArea: '20%',
					});
				}
			});
			
			$input.on({
				'ifChecked': function(){
					var $this = $(this),
						$siblings = $this.closest('.filter-checkbox').siblings('.filter-checkbox');
					if($this.val() != '0'){
						filter_methods.breadcrumbs_add($filter_crumbs, $this);
						$siblings.find('input[value="0"]').iCheck('uncheck');
						filter_methods.breadcrumbs_check($filter_crumbs, $this);
					}
					else{
						$siblings.find('input').iCheck('uncheck');
					}
				},
				'ifUnchecked': function(){
					var $this = $(this),
						$crumb = $this.data('crumb');
					
					if($crumb && $crumb[0]){
						$crumb.remove();
					}
					filter_methods.checkbox_check($this);
					filter_methods.breadcrumbs_check($filter_crumbs, $this);
				},
			});
			
		},
		
		/* - check checkboxes */
		checkbox_check : function($input){
			var $inputs = $input.closest('.filter-base').find('.filter-checkbox input');
			if($inputs[0]){
				var $current = [],
					hasChecked = false;
					
				for(var i = 0, iL = $inputs.length; i < iL; i++){
					$current = $inputs.eq(i);
					if($current.val() != 0 && $current.get(0).checked){
						hasChecked = true;
						break;
					}
				}
				
				if(!hasChecked){
					$inputs.filter('[value="0"]').iCheck('check');
				}
			}
		},
		
		
		
		/* slide checkbox init */
		slide_checkbox_init : function($input, $filter_crumbs){
			var $current = $form_control = $boolean = [],
				o = oL = 0,
				checked = false;
				
			for(var i = 0, iL = $input.length; i < iL; i++){
				$cinput = $input.eq(i);
				$filter = $cinput.closest('.filter-slide-checkbox');
				checked = $cinput.get(0).checked;
					
				var html = '<div class="filter-slide-checkbox-wrap">';
				html += '<div class="checkbox-background"></div>';
				html += '<a href="#" data-value="true" class="filter-slide-checkbox-option true">' + $cinput.attr('data-true') + '</a>';
				html += '<a href="#" data-value="false" class="filter-slide-checkbox-option false">' + $cinput.attr('data-false') + '</a>';
				html += '<div class="clear"></div></div>';
				$filter.append(html);
				
				if(checked){
					$filter
						.addClass('checked')
						.find('.filter-slide-checkbox-option.true')
							.addClass('active');
				}
				else{
					$filter
						.find('.filter-slide-checkbox-option.false')
							.addClass('active');
				}
			}
			
			$body.on('click', '.filter-slide-checkbox-option', function(){
				var $this = $(this),
					$boolean_control = $this.closest('.filter-slide-checkbox'),
					$input = $boolean_control.find('input[type="checkbox"]');
				
				$this
					.addClass('active')
					.siblings('.active')
						.removeClass('active');
					
				if($this.attr('data-value') === 'true'){
					if(!$boolean_control.hasClass('checked')){
						filter_methods.slide_checkbox_check($input, $boolean_control, $filter_crumbs);
					}
				}
				else{
					if($boolean_control.hasClass('checked')){
						filter_methods.slide_checkbox_uncheck($input, $boolean_control, $filter_crumbs);
					}
				}
				return false;
			});
		},
		
		/* - check */
		slide_checkbox_check : function($input, $boolean_control, $filter_crumbs){
			$input.get(0).checked = true;
			$boolean_control.addClass('checked');
			filter_methods.breadcrumbs_add($filter_crumbs, $input, undefined, undefined, $input.attr('name') + '_filter_crumb');
			filter_methods.breadcrumbs_check($filter_crumbs, $input);
		},
		
		/* - uncheck */
		slide_checkbox_uncheck : function($input, $boolean_control, $filter_crumbs){
			$input.get(0).checked = false;
			$boolean_control.removeClass('checked');
			$filter_crumbs.find('.' + $input.attr('name') + '_filter_crumb').remove();
			filter_methods.breadcrumbs_check($filter_crumbs, $input);
		},
		
		
		
		/* text field init */
		textfield_init : function($input){
			
			// text fields events
			$input.on({
				'focus' : function(){
					var $this = $(this),
						list_id = $this.data('list');
						
					if(list_id){
						var $target = $this.data('target');
						if(!$target){
							$target = $(list_id);
							$target.data({
								'base': $this.closest('.filter-base'),
								'input': $this
							});
							$this.data('target', $target);
						}
						
						if($target[0]){
							if(!$target.hasClass('show-menu')){
								filter_methods.textfield_open($this, $target);
							}
						}
					}
					
					return false;
				},
				'keyup' : function(){
					var $this = $(this),
						val = $this.val().toLowerCase(),
						list_id = $this.data('list');
					
					if(list_id){
						var $target = $this.data('target');
						if(!$target){
							$target = $(list_id);
							$target.data({
								'input': $this
							});
							$this.data('target', $target);
						}
						
						if($target[0]){
							if(!$target.hasClass('show-menu')){
								filter_methods.textfield_open($this, $target);
							}
							
							var list = $target.data('list'),
								$elements = $target.data('elements');
							if(!list){
								list = [];
								$elements = $target.find('li a').parent();
								
								$target
									.find('a').each(function(){
										list[list.length] = $(this).data('text').toLowerCase();
									})
									.data({
										'elements' : $elements,
										'list': list
									});
							}
							
							if(val.length > 0){
								for(var i = 0, iL = list.length; i < iL; i++){
									if(list[i].indexOf(val) >= 0){
										$elements.eq(i).show();
									}
									else{
										$elements.eq(i).hide();
									}
								}
							}
							else{
								$elements.show();
							}
						}
					}
				},
			});
		},
		
		/* - open textfield datalist */
		textfield_open : function($link, $target){
			var offset = $link.offset();
			$target
				.addClass('show-menu')
				.css({
					'width' : $link.outerWidth(),
					'display' : 'block',
					'top' : offset.top + $link.height() + 13,
					'left' : offset.left,
				})
				.data({
					'$input' : $link,
					'$base': $link.closest('.filter-base'),
				})
				.find('li a').parent().show();
		},
		
		/* - close textfield datalist */
		textfield_close : function($link, $target){
			$target
				.removeClass('show-menu')
				.css({
					'display' : 'none'
				});
		},
		
		/* text datalists */
		text_datalist_init : function(){
			// datalist menu events
			var $filters_dl_menu = $('.filter-text-datalist-menu');
			
			// - link events (add filter, add crumbs)
			$filters_dl_menu.find('a').on({
				'mouseenter' : function(){
					var $this = $(this),
						$parent = $this.closest('li');
						
					$this.addClass('hovered');
					$parent.siblings('li').find('a.hovered').removeClass('hovered');
				},
				'mouseleave' : function(){
					var $this = $(this);
					$this.removeClass('hovered');
				},
				'click' : function(){
					var $this = $(this),
						$menu = $this.closest('.filter-datalist-menu'),
						$input = $menu.data('$input'),
						$base = $menu.data('$base'),
						data_name = $this.data('name'),
						data_value = $this.data('value'),
						data_additional = $this.data('additional'),
						data_category = $this.data('category'),
						data_text = $this.data('text');
					
					data_additional = data_additional ? ' data-additional="' + data_additional + '"' : '';
					data_category = data_category ? ' data-category="' + data_category + '"' : '';
					
					// add Checkbox filter
					if($menu.hasClass('filter-add-checkbox')){
						var $checkboxes = $base.find('.filter-checkbox'),
							$checkbox_inputs = $checkboxes.find('input'),
							checkbox_exists = false;
						
						// - check if that option already exists
						for(var i = 0, iL = $checkbox_inputs.length; i < iL; i++){
							var $current = $checkbox_inputs.eq(i);
							if($current.val() === data_value){
								// - if it exists, select it and do not add new one
								$current.iCheck('check'); 
								checkbox_exists = true;
								break;
							}
						}
						
						// - if it is not in the list, create and add it
						if(!checkbox_exists){
							var $filter = $('<div class="filter filter-checkbox marb5 fsz13_333">\
												<label>\
													<input type="checkbox" name="' + data_name + '" value="' + data_value + '" data-text="' + data_text + '"' + data_additional + data_category + ' />\
													<span class="marl5 valm">' + data_text + '</span>\
												</label>\
											</div>');
							
							// - if there are other radio opions, insert it at the end
							if($checkboxes[0]){
								$filter.insertAfter($checkboxes.last());
							}
							// - else insert at the bottom of the base
							else{
								$base.append($filter);
							}
							
							// - fix new radio button with iCheck plugin and select it
							var $filter_input = $filter.find('input');
							filter_methods.checkbox_init($filter_input, $filter_input.closest('.wd_search').find('.filter_crumbs'));
							$filter_input.iCheck('check'); 
						}
					}
					
					// close menu at the end of operation
					$input.val('');
					filter_methods.dynamic_filters_close($menu);
					return false;
				},
			});
			
			
			// dynamic filters: close menu on other page clicks
			$body.on('click', function(event){
				var $active = $filters_dl_menu.filter('.show-menu');
				if($active[0]){
					var $current_active = $closest_dl = [],
						data_list = '';
					for(var i = 0, iL = $active.length; i < iL; i++){
						$current_active = $active.eq(i);
						$closest_dl = $(event.target).closest('.filter-datalist-menu');
						data_list = event.target.getAttribute('data-list');
						if(data_list){
							data_list = data_list.substring(1, data_list.length);
						}
						
						if(!$closest_dl[0] && event.target.tagName != 'input' && data_list != $current_active.attr('id')){
							filter_methods.dynamic_filters_close($current_active);
						}
					}
					
				}
			});
		},
		
		
		
		/* range field init */
		rangefield_init : function($input){
			
			// text fields events
			$input.siblings('.range-trigger').on({
				'click' : function(){
					var $this = $(this).siblings('input'),
						list_id = $this.data('list');
						
					if(list_id){
						var $target = $this.data('target');
						if(!$target){
							$target = $(list_id);
							$target.data({
								'base': $this.closest('.filter-base'),
								'input': $this
							});
							$this.data('target', $target);
						}
						
						if($target[0]){
							if(!$target.hasClass('show-menu')){
								filter_methods.textfield_open($this, $target);
							}
						}
					}
					
					return false;
				},
			});
		},
		
		/* - open textfield datalist */
		rangefield_open : function($link, $target){
			var offset = $link.offset();
			$target
				.addClass('show-menu')
				.css({
					'width' : $link.outerWidth(),
					'display' : 'block',
					'top' : offset.top + $link.height() + 13,
					'left' : offset.left,
				})
				.data({
					'$input' : $link,
					'$base': $link.closest('.filter-base'),
				})
				.find('li a').parent().show();
		},
		
		/* - close textfield datalist */
		rangefield_close : function($link, $target){
			$target
				.removeClass('show-menu')
				.css({
					'display' : 'none'
				});
		},
		
		/* range datalists */
		range_datalist_init : function(){
			// datalist menu events
			var $filters_dl_menu = $('.filter-range-datalist-menu');
			
			// - link events (add filter, add crumbs)
			$filters_dl_menu.find('a').on({
				'blur' : function(event){
					var $this = $(this),
						$next = $(event.relatedTarget),
						$this_filter = $this.closest('.filter-datalist-menu');
					if(!$this_filter.is($next.closest('.filter-datalist-menu'))){
						filter_methods.rangefield_close(undefined, $this_filter);
					}
				},
				'mouseenter' : function(){
					var $this = $(this),
						$parent = $this.closest('li');
						
					$this.addClass('hovered');
					$parent.siblings('li').find('a.hovered').removeClass('hovered');
				},
				'mouseleave' : function(){
					var $this = $(this);
					$this.removeClass('hovered');
				},
				'click' : function(){
					var $this = $(this);
					
					if($this.attr('disabled') !== 'disabled'){
						var	$ul = $this.closest('ul'),
							$menu = $this.closest('.filter-datalist-menu'),
							$input = $menu.data('$input'),
							$filter_crumbs = $menu.data('$base').closest('.wd_search').find('.filter_crumbs'),
							data_weight = parseInt($this.data('weight')),
							data_text = $this.data('text'),
							fin_value = '';
						
						$this
							.addClass('selected')
							.closest('li').siblings('li').find('a.selected')
								.removeClass('selected');
						
						// MIN values select
						if($ul.hasClass('filter-range-menu-min')){
							var max_val = $input.data('max-val');
							fin_value = max_val ? data_text + ' - ' + max_val : 'Min ' + data_text;
							
							// show/hide 
							if(!isNaN(data_weight)){
								var $max_li = $menu.find('.filter-range-menu-max li');
								for(var i = 0, iL = $max_li.length; i < iL; i++){
									var $cli = $max_li.eq(i),
										$clink = $cli.find('a'),
										cweight = parseInt($clink.data('weight'));
										
									if(!isNaN(cweight)){
										if(data_weight > cweight){
											$clink.attr('disabled','disabled');
										}
										else{
											$clink.removeAttr('disabled');
										}
									}
									else{
										$clink.removeAttr('disabled');
									}
								}
							}
							
							$input.data('min-val', data_text);
						}
						
						// MAX values select
						else{
							var min_val = $input.data('min-val');
							fin_value = min_val ? min_val + ' - ' + data_text : 'Max ' + data_text;
							
							// show/hide 
							if(!isNaN(data_weight)){
								var $min_li = $menu.find('.filter-range-menu-min li');
								for(var i = 0, iL = $min_li.length; i < iL; i++){
									var $cli = $min_li.eq(i),
										$clink = $cli.find('a'),
										cweight = parseInt($clink.data('weight'));
										
									if(!isNaN(cweight)){
										if(data_weight < cweight){
											$clink.attr('disabled','disabled');
										}
										else{
											$clink.removeAttr('disabled');
										}
									}
									else{
										$clink.removeAttr('disabled');
									}
								}
							}
							
							$input.data('max-val', data_text);
						}
						
						$input.val(fin_value);
						
						var $filter_crumb = $filter_crumbs.find('.' + $input.attr('name') + '_filter_crumb');
						if($filter_crumb[0]){
							$filter_crumb.remove();
						}
						filter_methods.breadcrumbs_add($filter_crumbs, $input, fin_value, $this.data('category'), $input.attr('name') + '_filter_crumb');
						filter_methods.breadcrumbs_check($filter_crumbs, $input);
					}
					
					return false;
				},
			});
			
			
			// dynamic filters: close menu on other page clicks
			$body.on('click', function(event){
				var $active = $filters_dl_menu.filter('.show-menu');
				if($active[0]){
					var $current_active = $closest_dl = [],
						data_list = '';
					for(var i = 0, iL = $active.length; i < iL; i++){
						$current_active = $active.eq(i);
						$closest_dl = $(event.target).closest('.filter-datalist-menu');
						data_list = event.target.getAttribute('data-list');
						if(data_list){
							data_list = data_list.substring(1, data_list.length);
						}
						
						if(!$closest_dl[0] && event.target.tagName != 'input' && data_list != $current_active.attr('id')){
							filter_methods.dynamic_filters_close($current_active);
						}
					}
					
				}
			});
		},
		
		
		
		/* breadcrumbs add */
		breadcrumbs_add : function($filter_crumbs, $input, dtext, dcat, dclass){
			var crumb_text = '<span class="text">' + (dtext ? dtext : $input.data('text')) + '</span>',
				category_text = dcat ? dcat : $input.data('category');
			if(category_text){
				crumb_text = '<span class="category">' + category_text + ':</span> ' + crumb_text;
			}
			
			var $crumb = $('<div class="filter_crumb' + (dclass ? ' ' + dclass : '') + ' dinlblck pos_rel marrb5 pad5 brd brdrad2 white_bg"><a href="#" href="#" class="padrl5 dark_grey_txt">' + crumb_text + '<span class="x_btn marl10">x</span></a></div>');
				$crumb
					.data('input', $input)
					.prependTo($filter_crumbs);
				$input.data('crumb', $crumb);
		},
		
		/* breadcrumbs check */
		breadcrumbs_check : function($filter_crumbs, $input){
			
			// show/hide "Clear all filters" button
			var $filters = $filter_crumbs.find('.filter_crumb');
			if($filters[0]){
				$filter_crumbs.addClass('show_clear');
			}
			else{
				$filter_crumbs.removeClass('show_clear');
			}
			
			// show/hide additional filters
			var $base = $input.closest('.filter-base'),
				$all_inputs = $base.find('input[type="radio"], input[type="checkbox"], select'),
				$additionals = $base.find('.filter-additional');
				
			for(var i = 0, iL = $all_inputs.length; i < iL; i++){
				var $current_input = $all_inputs.eq(i),
					additional_list =  $current_input.data('additional');
				
				// - check every input if it is check and has list of additional filters names
				if($current_input.get(0).checked && additional_list){
					additional_list = additional_list.split(',');
					
					for(var a = 0, aL = $additionals.length; a < aL; a++){
						var $current_additional = $additionals.eq(a),
							$current_additional_input = $current_additional.find('input, select');
							
						for(var n = 0, nL = additional_list.length; n < nL; n++){
							if($current_additional_input.attr('name') === additional_list[n].trim()){
								$current_additional.addClass('valid');
							}
						}
					}
					
				}
			}
			$additionals.filter(':not(.valid)')
				.removeClass('show_filter')
				.find('input')
					.iCheck('uncheck');
			
			$additionals.filter('.valid')
				.removeClass('valid')
				.addClass('show_filter');
			
			
			// show hide permanent additional filter
			var $permanent = $base.find('.filter-additional-permanent');
			if($permanent[0]){
				var $filters = $base.find('.filter:not(.filter-additional-permanent)');
				if($filters[0]){
					$permanent.addClass('show_filter');
				}
				else{
					$permanent.removeClass('show_filter');
				}
			}
			
			
		},
		
		
		
		/* dynamic filters */
		dynamic_filters_init : function($wd_search_all){
			
			// dynamic filters: show menu
			$wd_search_all.find('.filter-add a').on({
				'click' : function(){
					var $this = $(this),
						$target = $this.data('target');
					
					if(!$target){
						$target = $($this.data('id'));
						$target.data('base', $this.closest('.filter-base'));
						$this.data('target', $target);
					}
						
					if($target[0]){
						if($target.hasClass('show-menu')){
							filter_methods.dynamic_filters_close($target);
						}
						else{
							filter_methods.dynamic_filters_open($target, $this);
						}
					}
					
					return false;
				},
			});
			
			// dynamic filters: menu events
			var $filters_add_menu = $('.filter-add-menu');
			
			// - link events (add filter, add crumbs)
			$filters_add_menu.find('a').on({
				'mouseenter' : function(){
					var $this = $(this),
						$parent = $this.closest('li');
						
					$this.addClass('hovered');
					$parent.siblings('li').find('a.hovered').removeClass('hovered');
				},
				'mouseleave' : function(){
					var $this = $(this);
					$this.removeClass('hovered');
				},
				'click' : function(){
					var $this = $(this),
						$menu = $this.closest('.filter-add-menu'),
						$base = $menu.data('base'),
						data_name = $this.data('name'),
						data_value = $this.data('value'),
						data_additional = $this.data('additional'),
						data_category = $this.data('category'),
						data_text = $this.data('text');
					
					data_additional = ' ' + data_additional ? 'data-additional="' + data_additional + '"' : '';
					data_category = ' ' + data_category ? 'data-category="' + data_category + '"' : '';
					
					// add Radio filter
					if($menu.hasClass('filter-add-radio')){
						var $radios = $base.find('.filter-radio'),
							$radio_inputs = $radios.find('input'),
							radio_exists = false;
						
						// - check if that option already exists
						for(var i = 0, iL = $radio_inputs.length; i < iL; i++){
							var $current = $radio_inputs.eq(i);
							if($current.val() === data_value){
								// - if it exists, select it and do not add new one
								$current.iCheck('check'); 
								radio_exists = true;
								break;
							}
						}
						
						// - if it is not in the list, create and add it
						if(!radio_exists){
							var $filter = $('<div class="filter filter-radio marb5 fsz13_333">\
														<label>\
															<input type="radio" name="' + data_name + '" value="' + data_value + '" data-text="' + data_text + '"' + data_additional + data_category + ' />\
															<span class="marl5 valm">\
																' + data_text + '\
																<span class="count">(0)</span>\
															</span>\
														</label>\
													</div>');
							
							// - if there are other radio opions, insert it at the end
							if($radios[0]){
								$filter.insertAfter($radios.last());
							}
							// - else insert before add filter button
							else{
								$filter.insertBefore($base.find('.filter-add').first());
								//$base.prepend($filter);
							}
							
							// - fix new radio button with iCheck plugin and select it
							var $filter_input = $filter.find('input');
							
							filter_methods.radio_init($filter_input, $filter_input.closest('.wd_search').find('.filter_crumbs'));
							$filter_input.iCheck('check'); 
						}
					}
					
					// close menu at the end of operation
					filter_methods.dynamic_filters_close($menu);
					return false;
				},
			});
			
			// - li events (show/hide submenu)
			$filters_add_menu.find('li.has-submenu').on({
				'mouseenter' : function(){
					$(this).addClass('show-submenu');
				},
				'mouseleave' : function(){
					$(this).removeClass('show-submenu');
				},
			});
				
			// dynamic filters: close menu on other page clicks
			$body.on('click', function(event){
				var $active = $filters_add_menu.filter('.show-menu');
				if($active[0]){
					if(!$(event.target).closest('.filter-add-menu')[0]){
						filter_methods.dynamic_filters_close($active);
					}
				}
			});
		},
		
		/* - open dynamic menu */
		dynamic_filters_open : function($menu, $link){
			var offset = $link.offset();
			$menu
				.addClass('show-menu')
				.css({
					'display' : 'block',
					'top' : offset.top + $link.height() + 5,
					'left' : offset.left,
				});
		},
		
		/* - close dynamic menu */
		dynamic_filters_close : function($menu){
			$menu
				.removeClass('show-menu')
				.css({
					'display' : 'none'
				});
		},
		
	}
	filter_methods.init();
	
});




