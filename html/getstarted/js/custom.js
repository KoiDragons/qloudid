$(document).ready(function() {
	var $window = $(window),
		$body = $(document.body);
	
	
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
				.find('.sliding-modal-header a.active').removeClass('active');
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
	
	/* Form progress */
	var $form_progress = $('.form-progress');
	if($form_progress[0]){
		var $fp_form = $form_progress.closest('form');
		
		// back
		$form_progress.on('click', '.form-progress-back', function(){
			var $this = $(this),
				$progress = $this.closest('.form-progress'),
				$progress_prev = $progress.prev('.form-progress');
			
			if($progress_prev[0]){
				$progress.hide();
				$progress_prev.show();
			}
			
			return false;
		});
		
		// next 
		$form_progress.on('click', '.form-progress-next', function(){
			var $this = $(this),
				$progress = $this.closest('.form-progress'),
				$progress_next = $progress.next('.form-progress');
			
			if($this.hasClass('form-progress-validate')){
				var isValid = true,
					$validate_groups = $progress.find('.validate-group');
				$validate_groups.removeClass('invalid');
				
				// check validation groups
				for(var i = 0, iL = $validate_groups.length; i < iL; i++){
					var $validate_group = $validate_groups.eq(i),
						cval = false;
					
					// validate radio group
					if($validate_group.hasClass('validate-radio')){
						cval = fp_methods.validate_radio($validate_group);
					}
					
					if(!cval){
						$validate_group.addClass('invalid');
						isValid = cval;
						break;
					}
				}
				
				// if valid - move forward
				if(isValid){
					if($progress_next[0]){
						
						// next tab has a content defined by choices made in current tab
						fp_methods.inner_page_identifier($progress, $progress_next);
						
						// hide current tab and show next
						$progress.hide();
						$progress_next.show();
					}
				}
			}
			// no need for validation - move forward
			else{
				if($progress_next[0]){
					// next tab has a content defined by choices made in current tab
					fp_methods.inner_page_identifier($progress, $progress_next);
						
					// hide current tab and show next
					$progress.hide();
					$progress_next.show();
				}
			}
			
			return false;
		});
		
		// show first progress 
		$form_progress.first().show();
		
		// autocomplete
		var $fp_autocomplete = $form_progress.find('.form-progress-autocomplete');
		if($fp_autocomplete[0]){
			for(var i = 0, iL = $fp_autocomplete.length; i < iL; i++){
				var $fpa = $fp_autocomplete.eq(i),
					dsource = [];
				try{
					dsource = eval($fpa.data('source'));
				}
				catch(e){};
				$form_progress.find('.form-progress-autocomplete').autocomplete({
					source: dsource,
					appendTo: $fpa.parent(),
					select: function(event, ui) {
						var $this = $(this);
						
						if($this.hasClass('fpa-checkbox')){
							fp_methods.autocomplete_checkbox($this, ui.item);
							$this.val('');
							return false;
						}
						
					},
				});
			}
			
		}
		
		
		// methods
		var fp_methods = {
			
			// inner pages
			inner_page_identifier : function($progress, $progress_next){
				var $progress_id = $progress.find('.progress-id');
				if($progress_id[0]){
					var inner_id = '';
						
					if($progress_id.hasClass('progress-id-radio')){
						inner_id = $progress_id.find('input[type=radio]:checked').data('target');
					}
							
					$progress_next.find('.form-progress-inner')
						.hide()
						.filter(inner_id)
							.show();
				}
			},
			
			// radio validation
			validate_radio : function($validate_group){
				var result = false,
					$radios = $validate_group.find('input[type=radio]');
					
				for(var i = 0, iL = $radios.length; i < iL; i++){
					if($radios.eq(i).get(0).checked){
						result = true;
						break;
					}
				}
				
				return result;
			},
			
			// autocomplete checkboxes
			autocomplete_checkbox : function($input, item){
				var $base = $input.closest('.input-base'),
					$colums = $base.find('.checkbox-column');
				
				if($colums[0]){
					var $new_checkbox = $('<div class="marb10 padb10 brdb"><label><input type="checkbox" name="checkbox1" value="' + item.value + '" /> <span class="marl2 valm">' + item.label + '</span></label></div>'),
						$min_column;
					
					
					if($colums.length > 1){
						var citems = 999;
						for(var i = 0, iL = $colums.length; i < iL; i++){
							var $current = $colums.eq(i),
								item_length = $current.find('input').length;
							if(citems > item_length){
								$min_column = $current;
								citems = item_length;
							}
						}
					}
					else{
						$min_column = $colums;
					}
					
					$min_column.append($new_checkbox);
					$new_checkbox.find('input')
						.iCheck({
							checkboxClass: 'icheckbox_minimal-aero',
							radioClass: 'iradio_minimal-aero',
							increaseArea: '20%'
						})
						.iCheck('check');
				}
			},
			
		}
	}
	
	
	/* WP tooltip */
	$body.on('mouseenter', '.wp-tooltip', function(){
		var $this = $(this),
			coff_x = $this.data('offset-x'),
			coff_y = $this.data('offset-y'),
			offset = $this.offset(),
			$tooltip = $body.data('$tooltip');
		
		coff_x = coff_x ? parseInt(coff_x) : 0;
		coff_y = coff_y ? parseInt(coff_y) : 0;
		
		if(!$tooltip){
			$tooltip = $('<div id="wp-tooltip"></div>');
			$body
				.append($tooltip)
				.data('$tooltip', $tooltip);
		}
			
		$tooltip
			.empty()
			.append($this.data('tooltip'))
			.css({
				'top' : offset.top + coff_y,
				'right' : $window.width() - offset.left + coff_x,
				'display' : 'block'
			})
			.show();
		
		return false;
	});
	$body.on('mouseleave', '.wp-tooltip', function(){
		var $this = $(this),
			$tooltip = $body.data('$tooltip');
		
		if(!$tooltip){
			$tooltip = $('<div id="wp-tooltip"></div>');
			$body
				.append($tooltip)
				.data('$tooltip', $tooltip);
		}
		
		$tooltip
			.css({
				'display' : 'none'
			})
		
		return false;
	});
	
	
	/* Toggle button */
	$body.on('click', '.toggle-btn', function(){
		var $this = $(this),
			id = $this.attr('data-toggle-id'),
			$target = [];
		
		if(id == 'base'){
			$target = $this.closest('.base').find('.toggle_content');
			$target = $this.closest('.base').find('.toggle_content');
		}
		else{
			$target = $('#' + id);
		}
		
		if($target[0]){
			if($target.is(":visible")){
				$this
					.removeClass('target_shown')
					.addClass('target_hidden');
					
				$target
					.stop()
					.slideUp();
			}
			else{
				$this
					.removeClass('target_hidden')
					.addClass('target_shown');
					
				$target
					.stop()
					.slideDown();
			}
		}
		return false;
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
	$body.on('click', 'a.toggle-active', function(){
		var $this = $(this),
			$target = $this.hasClass('toggle-base') ? $this : $this.closest('.toggle-base');
		$target.toggleClass('active');
		return false;
	});
	
	
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
			$boolean = $current.find('input[type="checkbox"]');
			checked = $boolean.get(0).checked;
				
			if(checked){
				$current.addClass('checked');
			}
				
			var html = '<div class="boolean-control-wrap"><div class="boolean-control-options">';
			html += '<a href="#" data-value="true" class="boolean-control-option true">' + $boolean.attr('data-true') + '</a>';
			html += '<a href="#" data-value="false" class="boolean-control-option false">' + $boolean.attr('data-false') + '</a>';
			html += '<div class="clear"></div></div></div>';
			$current.append(html);
		}
			
		
		$body.on('click', '.boolean-control-option', function(){
			boolean_controls_select($(this));
			return false;
		});
		
	}
		
	
	// Custom autocomplete
	var $autocomplete_custom = $('.autocomplete-custom');
	if($autocomplete_custom[0]){
		$autocomplete_custom.each(function(){
			var $this = $(this);
			$this
				.autocomplete({
					source: eval($this.data('source')),
					appendTo: $this.parent(),
					response: function( event, ui ) {
						var $parent = $(this).parent();
						if(ui.content.length > 0){
							$parent.removeClass('show_add_button');
						}
						else{
							$parent.addClass('show_add_button');
						}
					},
					_renderItem: function( ul, item ){
					  return $( "<li>" )
						.attr( "data-value", item.value )
						.append( item.label )
						.appendTo( ul );
					},
				})
				.data('uiAutocomplete')._renderItem = function (ul, item) {
					return $('<li></li>')
						.append('<a href="#"><span class="dblock fsz14">' + item.label + '</span><span class="dblock">' + item.location + '</span></a>')
						.data('ui-autocomplete-item', item)
						.appendTo(ul);
				};
		});
	}
	
	// Filter list input
	$('.filter_list_add').on('click', function(){
		/*
		var $this = $(this),
			$parent = $this.closest('.filter_list'),
			$target = $('#' + $this.attr('data-id'));
		*/
		$(this)
			.hide()
			.closest('.filter_list').find('.filter_list_add_form')
				.slideDown();
		return false;
	});
	$('.filter_list_add_form a').on('click', function(){
		var $this = $(this),
			$parent = $this.closest('.filter_list');
		
		if($this.data('action') === 'cancel'){
			$parent.find('.filter_list_add_form').slideUp();
			$parent.find('.filter_list_add').show();
		}
		else if($this.data('action') === 'add'){
			var	$target = $('#' + $this.attr('data-id')),
				filter_tag = $this.data('filter-tag'),
				$model = $parent.find('.filter_list_model').clone(true),
				$input = $parent.find('.filter_list_add_form input'),
				val = $input.val();
			
			if(val.length > 0){
				var $model = $('<tr class="filter_list_model hide">\
									<td class="wi_36p padr15 brdb valm talr">\
										<input type="radio" name="selector" />\
									</td>\
									<td class="content-cell padtb5 brdb valm">\
										<h3 class="padb5 fsz14">' + val + '</h3>\
									</td>\
								</tr>');
				$model
					.appendTo($target)
					.find('input[type="radio"]').iCheck({
						checkboxClass: 'icheckbox_minimal-aero',
						radioClass: 'iradio_minimal-aero',
						increaseArea: '20%'
					});
					
				$input.val('');
				
				$parent.find('.filter_list_input')
					.data('rows', $target.find($this.attr('data-row-tag')))
					.val(val)
					.trigger('change');
				
				$parent.find('.filter_list_add_form a[data-action="cancel"]')
					.trigger('click');
			}
		}
		
		return false;
	});
	$('.filter_list_input').on('keyup change', function(){
		var $this = $(this),
			$rows = $this.data('rows'),
			title = $this.attr('data-filter-tag'),
			val = $this.val().toLowerCase(),
			def_state = $this.data('default');
		
		if(!$rows){
			$rows = $('#' + $this.attr('data-id')).find($this.attr('data-row-tag'));
			$this.data('rows', $rows);
		}
		
		if($rows[0]){
			var $crow = [];
			if(def_state == 'hide'){
				if(val.trim().length === 0){
					$rows.addClass('hide');
					return false;
				}
			}
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
	
	
	/* Add to list */
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
	
});