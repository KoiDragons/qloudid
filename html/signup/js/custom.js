$("tr:odd").addClass("odd");
$("li:first-child").addClass("first");
$("li:last-child").addClass("last");
$(function() {
	$(".tooltip").tooltip({
		track: true
	});
	
	
	var $tooltip_custom = $(".tooltip_custom"),
		$tooltip_cont = $('#tooltip_cont');
	
	$tooltip_custom.tooltip({
		tooltipClass: "custom_tootip_class",
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
	
	
	
});
$("li.click_slect_list").click(function() {
	$("li.click_slect_list").removeClass("selected");
	$(this).addClass("selected");
});
jQuery(document).ready(function() {
	jQuery('ul.sf-menu ').superfish();
});
$(document).ready(function() {
	$('input').iCheck({
		checkboxClass: 'icheckbox_minimal-aero',
		radioClass: 'iradio_minimal-aero',
		increaseArea: '20%' // optional
	});
});

$(document).ready(function() {
	$('input.minicheck').iCheck({
		checkboxClass: 'icheckbox_futurico',
		radioClass: 'iradio_futurico',
		increaseArea: '20%' // optional
	});
});

$(function() {
	$('select.selectric').selectric();
});
$(function() {
	$("#slider-range").slider({
		range: true,
		min: 0,
		max: 500,
		values: [75, 300],
		slide: function(event, ui) {
			$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
		}
	});
	$("#amount").val("$" + $("#slider-range").slider("values", 0) +
		" - $" + $("#slider-range").slider("values", 1));
});




$(function() {
	$("#datepicker").datepicker({
		showOn: "button",
		buttonImage: "images/calendar.png",
		buttonImageOnly: true
	});
});

$(function() {
	$(".datepicker").datepicker({
		showOn: "button",
		buttonImage: "images/calendar.png",
		buttonImageOnly: true
	});
});

$(function() {
	$(".date_picker_bx").datepicker({
		showOn: "button",
		buttonImage: "images/yellow_date_ico.png",
		buttonImageOnly: true
	});
});
$(function() {
	$(".prdt_tabs").tabs();
});
$(function() {
	$("#accordion").accordion({
		heightStyle: "content"
	});
});


$('.collapsible').hide();
$('.collapsible:first').show();
$('.collapsible_menu h3:first').addClass("active");
$(".collapsible_menu > h3").click(function() {
	$(this).toggleClass("active");
	$(this).next(".collapsible").slideToggle(500);
	//$(this).siblings("li").removeClass("active");
});

/* WPdev functionality */
$(document).ready(function(){
	var $doc_body = $(document.body);
	
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
			$target = $('#' + $this.attr('data-toggle-id'));
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
	
	/* Scroll fix */
	var $scroll_fix = $('.scroll-fix');
	if($scroll_fix[0]){
		$scroll_fix.each(function(){
			var $this = $(this);
			$this.css('height', $this.find('.scroll-fix-wrap').height());
		});
		
		var $window = $(window),
			$current_scroll = [];
		$window.on('scroll', function(){
			var scroll_top = $window.scrollTop();
			
			for(var i = 0, iL = $scroll_fix.length; i < iL; i++){
				$current_scroll = $scroll_fix.eq(i);
				
				if($current_scroll.offset().top < scroll_top){
					$current_scroll.addClass('affix');
				}
				else{
					$current_scroll.removeClass('affix');
				}
			}
			return false;
		});
	}
	
	
	// Tabs
	var $tabs_links = $('.tab-header a');
	$tabs_links.on('click', function(){
		var $this = $(this);
			if($this.parent().get(0).tagName == 'LI'){
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
				.stop()
				.removeClass('active');
				
			$tab
				.stop()
				.addClass('active');
			
			if($this.hasClass('scroll_to_tab')){
				if($doc_body.data('init_tab') == true){
					setTimeout(function(){
						$doc_body
							.stop()
							.animate({
								scrollTop: $tab.offset().top - 69
							}, 1000);
					}, 100);
				}
				$doc_body.data('init_tab', true);
			}
		return false;
	})
	$tabs_links.filter('.active').trigger('click');
	
	
	var test = document.querySelectorAll('#country-selector-container .VIpgJd-j7LFlb .VIpgJd-j7LFlb-bN97Pc');
	var html = '';
	for(var i = 0, iL = test.length; i < iL; i++){
		html += '&lt;option value="' + test[i].parentNode.id + '"&gt;' + test[i].innerHTML + '&lt;/option&gt;<br/>';
	}
	
	var test_div = document.createElement('div');
	test_div.innerHTML = html;
	document.body.appendChild(test_div);
	
});




