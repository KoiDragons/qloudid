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

	
});




