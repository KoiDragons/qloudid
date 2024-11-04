$("tr:odd").addClass("odd");
$("li:first-child").addClass("first");
$("li:last-child").addClass("last");
$(function() {
	$(".tooltip").tooltip({
		track: true
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
	
	/* - selectors data */
	var builders_data = {
		'personal' : [
			{
				'title'		: 'Appstore',
				'value'		: 'per_appstore',
				'list' 	: [
					{
						'title' : 'Product 1',
						'value'	: 'product1'
					},{
						'title' : 'Product 2',
						'value'	: 'product2'
					},
				]
			},
			{
				'title'		: 'District',
				'value'		: 'per_disctrict',
				'list' 	: [
					{
						'title' : 'Product 3',
						'value'	: 'product3'
					},{
						'title' : 'Product 4',
						'value'	: 'product4'
					},
				]
			},
			{
				'title'		: 'Social',
				'value'		: 'per_social',
				'list' 	: [
					{
						'title' : 'Product 3',
						'value'	: 'product3'
					},{
						'title' : 'Product 4',
						'value'	: 'product4'
					},
				]
			},
			{
				'title'		: 'Qpass',
				'value'		: 'per_qpass',
				'list' 	: [
					{
						'title' : 'Product 3',
						'value'	: 'product3'
					},{
						'title' : 'Product 4',
						'value'	: 'product4'
					},
				]
			}
		],
		'business' : [
			{
				'title'		: 'Appstore',
				'value'		: 'bus_appstore',
				'list' 	: [
					{
						'title' : 'Product 1',
						'value'	: 'product1'
					},{
						'title' : 'Product 2',
						'value'	: 'product2'
					},
				]
			},
			{
				'title'		: 'District',
				'value'		: 'bus_disctrict',
				'list' 	: [
					{
						'title' : 'Product 3',
						'value'	: 'product3'
					},{
						'title' : 'Product 4',
						'value'	: 'product4'
					},
				]
			},
			{
				'title'		: 'Social',
				'value'		: 'bus_social',
				'list' 	: [
					{
						'title' : 'Product 3',
						'value'	: 'product3'
					},{
						'title' : 'Product 4',
						'value'	: 'product4'
					},
				]
			},
			{
				'title'		: 'Qpass',
				'value'		: 'bus_qpass',
				'list' 	: [
					{
						'title' : 'Product 3',
						'value'	: 'product3'
					},{
						'title' : 'Product 4',
						'value'	: 'product4'
					},
				]
			},
			{
				'title'		: 'Solutions',
				'value'		: 'bus_solutions',
				'list' 	: [
					{
						'title' : 'Stuffing',
						'value'	: 'stuffing'
					},
				]
			},
		],
	}
	
	/* - menu data */
	var menu_data = [
	{
		'area'		: 'personal',
		'category'	: 'per_appstore',
		'product'	: 'product1',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C1P1',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C1P1',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C1P1',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C1P1',
		}],
	},
	{
		'area'		: 'personal',
		'category'	: 'per_appstore',
		'product'	: 'product2',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C1P2',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C1P2',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C1P2',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C1P2',
		}],
	},
	{
		'area'		: 'personal',
		'category'	: 'per_disctrict',
		'product'	: 'product3',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C2P3',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C2P3',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C2P3',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C2P3',
		}],
	},
	{
		'area'		: 'personal',
		'category'	: 'per_disctrict',
		'product'	: 'product4',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C2P4',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C2P4',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C2P4',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A1C2P4',
		}],
	},
	{
		'area'		: 'personal',
		'category'	: 'per_social',
		'product'	: 'product3',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C3P5',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C3P5',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C3P5',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C3P5',
		}],
	},
	{
		'area'		: 'personal',
		'category'	: 'per_social',
		'product'	: 'product4',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C3P6',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C3P6',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C3P6',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C3P6',
		}],
	},
	{
		'area'		: 'personal',
		'category'	: 'per_qpass',
		'product'	: 'product3',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C4P7',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C4P7',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C4P7',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C4P7',
		}],
	},
	{
		'area'		: 'personal',
		'category'	: 'per_qpass',
		'product'	: 'product4',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C4P8',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C4P8',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C4P8',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A2C4P8',
		}],
	},
	{
		'area'		: 'business',
		'category'	: 'bus_appstore',
		'product'	: 'product1',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C5P9',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C5P9',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C5P9',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C5P9',
		}],
	},
	{
		'area'		: 'business',
		'category'	: 'bus_appstore',
		'product'	: 'product2',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C5P10',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C5P10',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C5P10',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C5P10',
		}],
	},
	{
		'area'		: 'business',
		'category'	: 'bus_disctrict',
		'product'	: 'product3',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C6P11',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C6P11',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C6P11',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C6P11',
		}],
	},
	{
		'area'		: 'business',
		'category'	: 'bus_disctrict',
		'product'	: 'product4',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C6P12',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C6P12',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C6P12',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A3C6P12',
		}],
	},
	{
		'area'		: 'business',
		'category'	: 'bus_social',
		'product'	: 'product3',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C7P13',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C7P13',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C7P13',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C7P13',
		}],
	},
	{
		'area'		: 'business',
		'category'	: 'bus_social',
		'product'	: 'product4',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C7P14',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C7P14',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C7P14',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C7P14',
		}],
	},
	{
		'area'		: 'business',
		'category'	: 'bus_qpass',
		'product'	: 'product3',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C8P15',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C8P15',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C8P15',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C8P15',
		}],
	},
	{
		'area'		: 'business',
		'category'	: 'bus_qpass',
		'product'	: 'product4',
		'menu'		: [{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C8P16',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C8P16',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C8P16',
		},{
			'href'	: 'qstaff3_inner.html',
			'text'	: 'A4C8P16',
		}],
	},
	{
		'area'		: 'business',
		'category'	: 'bus_solutions',
		'product'	: 'stuffing',
		'menu'		: [{
			'href'	: 'qstaff3_bus_stuffing.html',
			'text'	: 'Stuffing',
		}],
	}];
	
	/* - selectors builder */
	var $menu_builders = $('#menu_builders');
	if($menu_builders[0]){
		var $selects = $menu_builders.find('select'),
			$selects_area = $selects.filter('[name="area"]'),
			$selects_category = $selects.filter('[name="category"]'),
			$selects_product = $selects.filter('[name="product"]'),
			$dynamic_menu = $('#dynamic_menu ul');
		
		// product change 
		$selects_product.on('change', function(){
			if($dynamic_menu[0]){
				var area_val = $selects.filter('[name="area"]').val(),
					cat_val = $selects.filter('[name="category"]').val(),
					prod_val = $(this).val(),
					win_loc = window.location.href,
					cur_val = {}, menu_val = '', html = '', li_class = '';
					
				for(var i = 0, iL = menu_data.length; i < iL; i++){
					cur_val = menu_data[i];
					if(cur_val.area === area_val && cur_val.category === cat_val && cur_val.product === prod_val){
						for(var a = 0, aL = cur_val.menu.length; a < aL; a++){
							menu_val = cur_val.menu[a];
							li_class = '';
							if(win_loc.indexOf(menu_val.href) >= 0){
								li_class = 'active';
							}
							html += '<li class="' + li_class + '"><a href="' + menu_val.href + '" class="dblock padtb10 white_txt">' + menu_val.text + '</a></li>';
						}
						break;
					}
				}
				$dynamic_menu
					.empty()
					.append(html);
			}
			return false;
		});
		
		// category change
		$selects_category.on('change', function(){
			var $this = $(this),
				data = $this.data('data'),
				sel_val = $(this).val(),
				list = [],
				html = '';
			
			if(sel_val){
				for(var i = 0, iL = data.length; i < iL; i++){
					if(sel_val === data[i].value){
						list = data[i].list;
						break;
					}
				}
			}
			for(var i = 0, iL = list.length; i < iL; i++){
				html += '<option value="' + list[i].value + '">' + list[i].title + '</option>';
			}
			
			$selects_product
				.empty()
				.append(html)
				.trigger('change')
				.selectric('refresh');
				
			return false;
		});
		
		// area change
		if($selects_area.attr('data-default')){
			$selects_area
				.val($selects_area.attr('data-default'))
				.selectric('refresh');
		}
		
		$selects_area
			.on('change', function(){
				var sel_val = builders_data[$(this).val()],
					html = '';
				if(sel_val){
					for(var i = 0, iL = sel_val.length; i < iL; i++){
						html += '<option value="' + sel_val[i].value + '">' + sel_val[i].title + '</option>';
					}
				}
				$selects_category
					.data('data', sel_val)
					.empty()
					.append(html)
					.trigger('change')
					.selectric('refresh');
					
				return false;
			})
			.trigger('change');
		
		
		if($selects_category.attr('data-default')){
			$selects_category
				.val($selects_category.attr('data-default'))
				.selectric('refresh')
				.trigger('change');
		}
		if($selects_product.attr('data-default')){
			$selects_product
				.val($selects_product.attr('data-default'))
				.selectric('refresh')
				.trigger('change');
		}
	}
	
	/* Language selector */
	var $lang_selector = $('#language_selector');
	if($lang_selector[0]){
		var $lang_list = $lang_selector.siblings('ul');
		$lang_selector
			.on({
				'click': function(){
					if($lang_list.hasClass('opened')){
						$lang_list
							.removeClass('opened')
							.slideUp();
					}
					else{
						$lang_list
							.addClass('opened')
							.slideDown();
					}
					return false;
				},
			});
		
		$lang_list.find('a')
			.on('click', function(){
				var $this = $(this);
				$lang_selector.html($this.html());
				if($lang_list.hasClass('opened')){
					$lang_selector.trigger('click');
				}
				
				var $usermenu_singup = $('#usermenu_singup'),
					$usermenu_singin = $('#usermenu_singin');
					
				if($this.attr('data-lang') === 'eng'){
					$usermenu_singup.html('Sign Up');
					$usermenu_singin.html('Sign In');
				}
				else if($this.attr('data-lang') === 'swd'){
					$usermenu_singup.html('Skapa konto');
					$usermenu_singin.html('Logga In');
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
	
	
	
	
	
});




