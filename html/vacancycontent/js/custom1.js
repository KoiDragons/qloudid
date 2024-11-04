(function() {
	/* requestAnimationFrame crossbrowser support */
	var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
	window.requestAnimationFrame = requestAnimationFrame;
	
	/* replaces every instance of sub-string in another string */
	String.prototype.replaceAll = function(search, replacement) {
		var target = this;
		return target.split(search).join(replacement);
	};
	
})();

/* return selected option html */
var get_select_option_name = function($select){
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
	if($.fn.superfish){
		$('ul.sf-menu ').superfish();
	}
	
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
});

$(document).ready(function() {
	var $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body),
		isVex = false;
	
	try{
		isVex = true;
		vex.defaultOptions.className = 'vex-theme-default';
	}
	catch(e){}
	
	
	/* APPLY ANIMATION */
	var $applY_animation = $('.apply-animation');
	if($applY_animation[0]){
		
		// Slide In Down
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
	
	/* File selector */
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
	
	
	/* Regions */
	var $tmregions = $('#tm-regions');
	if($tmregions[0]){
		
		// data
		window.regions_data = {
			'usa' : {
				'label' : 'USA',
				'states' : {
					'texas' : {
						'label' : 'Texas',
						'cities' : {
							'houston' : {
								'label' : 'Houston',
								'districts' : [{
									'value' : 'navasota',
									'label' : 'Navasota'
								},{
									'value' : 'waller',
									'label' : 'Waller'
								},{
									'value' : 'royal',
									'label' : 'Royal'
								}]
							},
							'austin' : {
								'label' : 'Austin',
								'districts' : [{
									'value' : 'lakeway',
									'label' : 'Lakeway'
								},{
									'value' : 'leander',
									'label' : 'Leander'
								},{
									'value' : 'round_rock',
									'label' : 'Round Rock'
								}]
							},
							'dallas' : {
								'label' : 'Dallas',
								'districts' : [{
									'value' : 'irving',
									'label' : 'Irving'
								},{
									'value' : 'richardson',
									'label' : 'Richardson'
								},{
									'value' : 'garland',
									'label' : 'Garland'
								}]
							}
						},
						
					},
					'california' : {
						'label' : 'California',
						'cities' : {
							'monterey' : {
								'label' : 'Monterey',
								'districts' : [{
									'value' : 'san_mateo',
									'label' : 'San Mateo'
								},{
									'value' : 'santa_cruz',
									'label' : 'Santa Cruz'
								},{
									'value' : 'canta_clara',
									'label' : 'Santa Clara'
								}]
							},
							'mendocino' : {
								'label' : 'Mendocino',
								'districts' : [{
									'value' : 'sonoma',
									'label' : 'Sonoma'
								},{
									'value' : 'marin',
									'label' : 'Marin'
								},{
									'value' : 'napa',
									'label' : 'Napa'
								}]
							},
							'santa_barbara' : {
								'label' : 'Santa Barbara',
								'districts' : [{
									'value' : 'ventura',
									'label' : 'Ventura'
								},{
									'value' : 'san_luis_obispo',
									'label' : 'San Luis Obispo'
								}]
							}
						},
						
					},
					'florida' : {
						'label' : 'Florida',
						'cities' : {
							'jacksonville' : {
								'label' : 'Jacksonville',
								'districts' : [{
									'value' : 'Nassau',
									'label' : 'Nassau'
								},{
									'value' : 'Cisy',
									'label' : 'Cisy'
								},{
									'value' : 'Guval',
									'label' : 'Guval'
								}]
							},
							'orlando' : {
								'label' : 'Orlando',
								'districts' : [{
									'value' : 'seminole',
									'label' : 'Seminole'
								},{
									'value' : 'osceola',
									'label' : 'Osceola'
								},{
									'value' : 'polk',
									'label' : 'Polk'
								}]
							},
							'tampa' : {
								'label' : 'Tampa',
								'districts' : [{
									'value' : 'pinellas',
									'label' : 'Pinellas'
								},{
									'value' : 'pasco',
									'label' : 'Pasco'
								},{
									'value' : 'hillsborough',
									'label' : 'Hillsborough'
								}]
							}
						},
						
					},
					
				}
			},
			'sweden' : {
				'label' : 'Sweden',
				'states' : {
					'vasta_gotaland' : {
						'label' : 'Vasta Gotaland',
						'cities' : {
							'uddevalla' : {
								'label' : 'Uddevalla',
								'districts' : [{
									'value' : 'akermynta',
									'label' : 'Åkermynta'
								},{
									'value' : 'akersberga',
									'label' : 'Åkersberga'
								},{
									'value' : 'alvsjö',
									'label' : 'Älvsjö'
								}]
							},
							'boras' : {
								'label' : 'Boras',
								'districts' : [{
									'value' : 'ostermalm',
									'label' : 'Östermalm'
								},{
									'value' : 'akalla',
									'label' : 'Akalla'
								},{
									'value' : 'bålsta',
									'label' : 'Bålsta'
								}]
							},
							'skovde' : {
								'label' : 'Skovde',
								'districts' : [{
									'value' : 'bagarmossen',
									'label' : 'Bagarmossen'
								},{
									'value' : 'bandhagen',
									'label' : 'Bandhagen'
								},{
									'value' : 'barkarby',
									'label' : 'Barkarby'
								}]
							}
						},
						
					},
					'varmland' : {
						'label' : 'Varmland',
						'cities' : {
							'arvika' : {
								'label' : 'Arvika',
								'districts' : [{
									'value' : 'bredäg',
									'label' : 'Bredäg'
								},{
									'value' : 'bromma',
									'label' : 'Bromma'
								},{
									'value' : 'brommaplan',
									'label' : 'Brommaplan'
								}]
							},
							'arjang' : {
								'label' : 'Arjang',
								'districts' : [{
									'value' : 'edsberg',
									'label' : 'Edsberg'
								},{
									'value' : 'ekerö',
									'label' : 'Ekerö'
								},{
									'value' : 'enskede',
									'label' : 'Enskede'
								}]
							},
							'holjes' : {
								'label' : 'Holjes',
								'districts' : [{
									'value' : 'enskededal',
									'label' : 'Enskededal'
								},{
									'value' : 'farsta',
									'label' : 'Farsta'
								},{
									'value' : 'globen',
									'label' : 'Globen'
								}]
							}
						},
						
					},
					'dalarna' : {
						'label' : 'Dalarna',
						'cities' : {
							'falun' : {
								'label' : 'Falun',
								'districts' : [{
									'value' : 'gustavsberg',
									'label' : 'Gustavsberg'
								},{
									'value' : 'hägersten',
									'label' : 'Hägersten'
								},{
									'value' : 'hägerstensåsen',
									'label' : 'Hägerstensåsen'
								}]
							},
							'borlange' : {
								'label' : 'Borlange',
								'districts' : [{
									'value' : 'häggvik',
									'label' : 'Häggvik'
								},{
									'value' : 'hässelby',
									'label' : 'Hässelby'
								},{
									'value' : 'högalid',
									'label' : 'Högalid'
								}]
							},
							'mora' : {
								'label' : 'Mora',
								'districts' : [{
									'value' : 'järfälla',
									'label' : 'Järfälla'
								},{
									'value' : 'johanneshov',
									'label' : 'Johanneshov'
								},{
									'value' : 'karlaplan',
									'label' : 'Karlaplan'
								}]
							}
						},
						
					},
					
				}
			},
			'russia' : {
				'label' : 'Russia',
				'states' : {
					'astrakhan' : {
						'label' : 'Astrakhan',
						'cities' : {
							'petrozavodsk' : {
								'label' : 'Petrozavodsk',
								'districts' : [{
									'value' : 'navasota',
									'label' : 'Navasota'
								},{
									'value' : 'waller',
									'label' : 'Waller'
								},{
									'value' : 'royal',
									'label' : 'Royal'
								}]
							},
							'kotlas' : {
								'label' : 'Kotlas',
								'districts' : [{
									'value' : 'lakeway',
									'label' : 'Lakeway'
								},{
									'value' : 'leander',
									'label' : 'Leander'
								},{
									'value' : 'round_rock',
									'label' : 'Round Rock'
								}]
							},
							'syktyvkar' : {
								'label' : 'Syktyvkar',
								'districts' : [{
									'value' : 'irving',
									'label' : 'Irving'
								},{
									'value' : 'richardson',
									'label' : 'Richardson'
								},{
									'value' : 'garland',
									'label' : 'Garland'
								}]
							}
						},
						
					},
					'chelyabinsk' : {
						'label' : 'Chelyabinsk',
						'cities' : {
							'magnitogorsk' : {
								'label' : 'Magnitogorsk',
								'districts' : [{
									'value' : 'san_mateo',
									'label' : 'San Mateo'
								},{
									'value' : 'santa_cruz',
									'label' : 'Santa Cruz'
								},{
									'value' : 'canta_clara',
									'label' : 'Santa Clara'
								}]
							},
							'sankin' : {
								'label' : 'Sankin',
								'districts' : [{
									'value' : 'sonoma',
									'label' : 'Sonoma'
								},{
									'value' : 'marin',
									'label' : 'Marin'
								},{
									'value' : 'napa',
									'label' : 'Napa'
								}]
							},
							'varen' : {
								'label' : 'Varen',
								'districts' : [{
									'value' : 'ventura',
									'label' : 'Ventura'
								},{
									'value' : 'san_luis_obispo',
									'label' : 'San Luis Obispo'
								}]
							}
						},
						
					},
					'novgorod' : {
						'label' : 'Novgorod',
						'cities' : {
							'volot' : {
								'label' : 'Volot',
								'districts' : [{
									'value' : 'Nassau',
									'label' : 'Nassau'
								},{
									'value' : 'Cisy',
									'label' : 'Cisy'
								},{
									'value' : 'Guval',
									'label' : 'Guval'
								}]
							},
							'soltci' : {
								'label' : 'Soltci',
								'districts' : [{
									'value' : 'seminole',
									'label' : 'Seminole'
								},{
									'value' : 'osceola',
									'label' : 'Osceola'
								},{
									'value' : 'polk',
									'label' : 'Polk'
								}]
							},
							'shymsk' : {
								'label' : 'Shymsk',
								'districts' : [{
									'value' : 'pinellas',
									'label' : 'Pinellas'
								},{
									'value' : 'pasco',
									'label' : 'Pasco'
								},{
									'value' : 'hillsborough',
									'label' : 'Hillsborough'
								}]
							}
						},
						
					},
					
				}
			},
		}
		
		var regions_methods = {
			
			// init
			init : function(){
				
				// Country type change
				$tmregions.on('change', '.tm-type-country', function(){
					var $this = $(this);
					
					if($this.val() === '2'){
						regions_methods.country_add($(this));
					}
					else{
						regions_methods.country_remove($this);
					}
				});
				
				// Choose country
				$tmregions.on('change', '.tm-select-country', function(){
					regions_methods.state_reset($(this));
				});
				
				// Add country button click
				$tmregions.on('click', '.tm-add-country', function(){
					regions_methods.country_add($(this));
					return false;
				});
				
				
				
				// State type change
				$tmregions.on('change', '.tm-type-state', function(){
					var $this = $(this);
					
					if($this.val() === '2'){
						regions_methods.state_add($(this));
					}
					else{
						regions_methods.state_remove($this);
					}
				});
				
				// Choose state
				$tmregions.on('change', '.tm-select-state', function(){
					regions_methods.city_reset($(this));
				});
				
				// Add state button click
				$tmregions.on('click', '.tm-add-state', function(){
					regions_methods.state_add($(this));
					return false;
				});
				
				
				
				// City type change
				$tmregions.on('change', '.tm-type-city', function(){
					var $this = $(this);
					
					if($this.val() === '2'){
						regions_methods.city_add($(this));
					}
					else{
						regions_methods.city_remove($this);
					}
				});
				
				// Choose city
				$tmregions.on('change', '.tm-select-city', function(){
					regions_methods.district_reset($(this));
				});
				
				// Add city button click
				$tmregions.on('click', '.tm-add-city', function(){
					regions_methods.city_add($(this));
					return false;
				});
				
				
				
				// District type change
				$tmregions.on('change', '.tm-type-district', function(){
					var $this = $(this);
					
					if($this.val() === '2'){
						regions_methods.district_add($(this));
					}
					else{
						regions_methods.district_remove($this);
					}
				});
				
				// Add district button click
				$tmregions.on('click', '.tm-add-district', function(){
					regions_methods.district_add($(this));
					return false;
				});
			
			},
			
			
			
			// add country
			country_add : function($this){
				var $countries = $this.closest('.tm-countries'),
					$last_country = $countries.find('.tm-country'),
					country_index = parseInt($countries.data('countries')) + 1;
				
				// remove Add button - it will be added to a new city
				$countries.find('.tm-add-wrap-country').remove();
				
				// check if there are any states already present
				if($last_country[0]){
					$last_country = $last_country.last();
				}
				else{
					$last_country = $countries.find('.country-clear');
				}
				
				// check data
				var country_data = [];
				try{ country_data = regions_data; }
				catch(e){}
				
				// build html
				var html = '<div class="tm-country tm-country-' + country_index + '">';
				html += '<div class="wi_50 fleft bs_bb marb20 padrl15"><select name="country-' + country_index + '" class="tm-select-country default wi_100 hei_30p dblock bs_bb padrl5 brd brdrad3" required="required">';
				html += '<option value="">-- Select a country --</option>';
				for(var ct in country_data){
					if(country_data.hasOwnProperty(ct)){
						html += '<option value="' + ct + '">' + country_data[ct]['label'] + '</option>';
					}
				}
				html += '</select></div>';
				html += '<div class="tm-add-wrap-country wi_50 fleft bs_bb marb20 padrl15"> <button type="button" class="tm-add-country hei_30p dblock nobrd brdrad3 blue_bg talc white_txt">+ Add country</button> </div>';
				html += '</div><div class="clear"></div>';
				
				$countries
					.append(html)
					.data('countries', country_index);
			},
			
			// remove country
			country_remove : function($this){
				$this.closest('.tm-countries')
					.data('countries', 0)
					.find('.tm-country').remove();
			},
			
			
			
			// reset state
			state_reset : function($this){
				var $country = $this.closest('.tm-country'),
					$state_selector = $country.find('.tm-states');
				
				// remove all current States
				$state_selector.remove();
				
				// if country is selected - append fresh state selector
				if($this.val()){
					$country.append('<div class="tm-states padrl10" data-states="0"><div class="clear"></div><div class="wi_50 fleft bs_bb marb20 padrl15"> <label>Which State</label> <select name="state-type-1" class="tm-type-state default wi_100 hei_30p dblock bs_bb padrl5 brd brdrad3" required="required"> <option value="">Select</option> <option value="1">All States</option> <option value="2">A State</option> </select> </div> <div class="state-clear clear"></div> <div class="clear"></div> </div>');
				}
			},
			
			// add state
			state_add : function($this){
				var $states = $this.closest('.tm-states'),
					$last_state = $states.find('.tm-state'),
					$country = $states.closest('.tm-country').find('.tm-select-country'),
					
					state_index = parseInt($states.data('states')) + 1,
					country_index = $country.closest('.tm-countries').data('countries');
				
				// remove Add button - it will be added to a new city
				$states.find('.tm-add-wrap-state').remove();
				
				// check if there are any states already present
				if($last_state[0]){
					$last_state = $last_state.last();
				}
				else{
					$last_state = $states.find('.state-clear');
				}
				
				// check data
				var state_data = [];
				try{ state_data = regions_data[$country.val()]['states']; }
				catch(e){}
				
				// build html
				var html = '<div class="tm-state tm-state-' + state_index + '">';
				html += '<div class="wi_50 fleft bs_bb marb20 padrl15"><select name="state-' + country_index + '-' + state_index + '" class="tm-select-state default wi_100 hei_30p dblock bs_bb padrl5 brd brdrad3" required="required">';
				html += '<option value="">-- Select a state --</option>';
				for(var st in state_data){
					if(state_data.hasOwnProperty(st)){
						html += '<option value="' + st + '">' + state_data[st]['label'] + '</option>';
					}
				}
				html += '</select></div>';
				html += '<div class="tm-add-wrap-state wi_50 fleft bs_bb marb20 padrl15"> <button type="button" class="tm-add-state hei_30p dblock nobrd brdrad3 blue_bg talc white_txt">+ Add state</button> </div> <div class="clear"></div>';
				html += '</div>';
				
				$(html).insertAfter($last_state);
				$states.data('states', state_index);
			},
			
			// remove state
			state_remove : function($this){
				$this.closest('.tm-states')
					.data('states', 0)
					.find('.tm-state').remove();
			},
			
			
			
			// reset city
			city_reset : function($this){
				var $state = $this.closest('.tm-state'),
					$city_selector = $state.find('.tm-cities');
				
				// remove all current Cities
				$city_selector.remove();
				
				// if state is selected - append fresh city selector
				if($this.val()){
					$state.append('<div class="tm-cities padrl10" data-cities="0"><div class="clear"></div><div class="wi_50 fleft bs_bb marb20 padrl15"> <label>Which City</label> <select name="city-type-1-1" class="tm-type-city default wi_100 hei_30p dblock bs_bb padrl5 brd brdrad3" required="required"> <option value="">Select</option> <option value="1">All Cities</option> <option value="2">A City</option> </select> </div> <div class="city-clear clear"></div> <div class="clear"></div> </div>');
				}
			},
			
			// add city
			city_add : function($this){
				var $cities = $this.closest('.tm-cities'),
					$last_city = $cities.find('.tm-city'),
					$state = $cities.closest('.tm-state').find('.tm-select-state'),
					$country = $state.closest('.tm-country').find('.tm-select-country'),
					
					city_index = parseInt($cities.data('cities')) + 1,
					state_index = $state.closest('.tm-states').data('states'),
					country_index = $country.closest('.tm-countries').data('countries');
				
				// remove Add button - it will be added to a new city
				$cities.find('.tm-add-wrap-city').remove();
				
				// check if there are any cities already present
				if($last_city[0]){
					$last_city = $last_city.last();
				}
				else{
					$last_city = $cities.find('.city-clear');
				}
				
				// check data
				var city_data = [];
				try{ city_data = regions_data[$country.val()]['states'][$state.val()]['cities']; }
				catch(e){}
				
				// build html
				var html = '<div class="tm-city tm-city-' + city_index + '">';
				html += '<div class="wi_50 fleft bs_bb marb20 padrl15"><select name="city-' + country_index + '-' + state_index + '-' + city_index + '" class="tm-select-city default wi_100 hei_30p dblock bs_bb padrl5 brd brdrad3" required="required">';
				html += '<option value="">-- Select a city --</option>';
				for(var ct in city_data){
					if(city_data.hasOwnProperty(ct)){
						html += '<option value="' + ct + '">' + city_data[ct]['label'] + '</option>';
					}
				}
				html += '</select></div>';
				html += '<div class="tm-add-wrap-city wi_50 fleft bs_bb marb20 padrl15"><button type="button" class="tm-add-city hei_30p dblock nobrd brdrad3 blue_bg talc white_txt">+ Add city</button></div><div class="clear"></div>';
				html += '</div>';
				
				$(html).insertAfter($last_city);
				$cities.data('cities', city_index);
			},
			
			// remove city
			city_remove : function($this){
				$this.closest('.tm-cities')
					.data('cities', 0)
					.find('.tm-city').remove();
			},
			
			
			
			// reset district
			district_reset : function($this){
				var $city = $this.closest('.tm-city'),
					$district_selector = $city.find('.tm-districts');
				
				// remove all current Districts
				$district_selector.remove();
				
				// if city is selected - append fresh district selector
				if($this.val()){
					$city.append('<div class="tm-districts padrl10" data-districts="0"><div class="clear"></div><div class="wi_50 fleft bs_bb marb20 padrl15"> <label>Which District</label> <select name="district-type-1-1-1" class="tm-type-district default wi_100 hei_30p dblock bs_bb padrl5 brd brdrad3" required="required"> <option value="">Select</option> <option value="1">All Districts</option> <option value="2">A District</option> </select> </div> <div class="district-clear clear"></div> <div class="clear"></div> </div>');
				}
			},
			
			// add district
			district_add : function($this){
				var $districts = $this.closest('.tm-districts'),
					$last_district = $districts.find('.tm-district'),
					$add_button = $districts.find('.tm-add-wrap-district'),
					$city = $districts.closest('.tm-city').find('.tm-select-city'),
					$state = $city.closest('.tm-state').find('.tm-select-state'),
					$country = $state.closest('.tm-country').find('.tm-select-country'),
					
					district_index = parseInt($districts.data('districts')) + 1;
					city_index = $city.closest('.tm-cities').data('cities'),
					state_index = $state.closest('.tm-states').data('states'),
					country_index = $country.closest('.tm-countries').data('countries');
				
				// check if there are any districts already present
				if($last_district[0]){
					$last_district = $last_district.last();
				}
				else{
					$last_district = $districts.find('.district-clear');
				}
				
				// check data
				var districts_data = [];
				try{ districts_data = regions_data[$country.val()]['states'][$state.val()]['cities'][$city.val()]['districts']; }
				catch(e){}
				
				// build html
				var html = '<div class="tm-district tm-district-' + district_index + ' wi_50 fleft bs_bb marb20 padrl15">';
				html += '<select name="district-' + country_index + '-' + state_index + '-' + city_index + '-' + district_index + '" class="tm-select-district default wi_100 hei_30p dblock bs_bb padrl5 brd brdrad3" required="required">';
				html += '<option>-- Select a district --</option>';
				for(var i = 0, iL = districts_data.length; i < iL; i++){
					html += '<option value="' + districts_data[i]['value'] + '">' + districts_data[i]['label'] + '</option>';
				}
				html += '</div>';
				
				// check if Add button is present
				if(!$add_button[0]){
					$('<div class="tm-add-wrap-district wi_50 fleft bs_bb marb20 padrl15"> <button type="button" class="tm-add-district hei_30p dblock nobrd brdrad3 blue_bg talc white_txt">+ Add district</button> </div>').insertAfter($last_district);
				}
				
				$(html).insertAfter($last_district);
				$districts.data('districts', district_index);
			},
			
			// remove district
			district_remove : function($this){
				$this.closest('.tm-districts')
					.data('districts', 0)
					.find('.tm-district, .tm-add-wrap-district').remove();
			},
		
		}
		regions_methods.init();
		
	}
	
	
	/* Timeline */
	var $timeline = $('#wp-timeline');
	if($timeline[0]){
		
		// submit form
		$body.on('submit', '.timeline-form', function(){
			var $this = $(this),
				$tm_item = $this.closest('.timeline-item'),
				$menu_item = $timeline.find('li[data-target="#' + $tm_item.attr('id') + '"]'),
				$next_menu = $menu_item.next();
			
			if($next_menu[0]){
				var $next_item = $($next_menu.data('target'));
				
				$menu_item
					.removeClass('active')
					.addClass('visited');
					
				$next_menu
					.removeClass('visited')
					.addClass('active');
				
				$tm_item
					.removeClass('active')
					.hide();
				
				$next_item
					.addClass('active')
					.show();
				
				if($next_item.data('scroll-to')){
					requestAnimationFrame(function(){
						$html_body.animate({
							scrollTop: $($next_item.data('scroll-to')).offset().top
						}, 500);
					})
				}
			}
		});
		
		// edit timeline
		$timeline.on('click', '.edit-timeline', function(){
			var $this = $(this),
				$parent = $this.parent(),
				$target = $($parent.data('target'));
			
			if($target[0] && !$target.hasClass('active')){
				$parent
					.removeClass('visited')
					.addClass('active')
					.siblings('.active')
						.removeClass('active');
				
				$target
					.addClass('active')
					.show()
					.siblings('.active')
						.removeClass('active')
						.hide();
			}
			
			return false;
		});
		
		// show active timeline content on load
		var $init_timeline = $timeline.find('.active');
		if($init_timeline[0]){
			$($init_timeline.data('target'))
				.addClass('active')
				.show();
		}
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
	
	/* Pagination build */
	var $pagination_build = $('.pagination-build');
	if($pagination_build[0]){
		$body.on('click', '.pagination-control a', function(){
			var $this = $(this),
				$build = $this.closest('.pagination-build');
			
			if($this.hasClass('page-prev')){
				var $active = $this.siblings('.active'),
					$prev = $active.prev();
				if($prev[0] && !$prev.hasClass('page-prev')){
					$prev.trigger('click');
				}
			}
			else if($this.hasClass('page-next')){
				var $active = $this.siblings('.active'),
					$next = $active.next();
				if($next[0] && !$next.hasClass('page-next')){
					$next.trigger('click');
				}
			}
			else{
				if(!$this.hasClass('active')){
					var $pages = $build.find('.page'),
						$active_page = $pages .filter('.active'),
						$next_page = $pages.filter('.page-' + $this.data('page'));
						
					$this
						.addClass('active')
						.siblings('.active')
							.removeClass('active');
					
					$pages.stop();
					if($active_page[0]){
						$active_page
							.removeClass('active')
							.fadeOut('350', function(){
								$next_page
									.addClass('active')
									.fadeIn('350');
							});
					}
					else{
						$next_page
							.addClass('active')
							.show();
					}
				}
			}
			return false;
		});
		
		for(var i = 0, iL = $pagination_build.length; i < iL; i++){
			var $pbuild = $pagination_build.eq(i),
				count = $pbuild.data('count') ? parseInt($pbuild.data('count')) : 10,
				$elms = $pbuild.find($pbuild.data('target')),
				control_links_class = $pbuild.data('links-class'),
				page_counter = 1,
				control_html = '<div class="pagination-control ' + $pbuild.data('control-class') + '"><a href="#" class="page-prev ' + control_links_class + '">' + $pbuild.data('prev-html') + '</a>';
			
			if($elms[0]){
				var $page = [];
				for(var e = 0, eL = $elms.length; e < eL; e++){
					if(e%count === 0){
						if($page[0]){
							$page.appendTo($pbuild);
						}
						$page = $pbuild.find('.page-' + page_counter);
						if(!$page[0]){
							$page = $(document.createElement('DIV'));
							$page
								.css('display', 'none')
								.addClass('page page-' + page_counter);
						}
						
						control_html += '<a href="#" class="page-number page-number-' + page_counter + ' ' + control_links_class + '" data-page="' + page_counter + '">' + page_counter + '</a>';
						page_counter++;
					}
					$page.append($elms.eq(e));
				}
				$page.appendTo($pbuild);
				control_html += '<a href="#" class="page-next ' + control_links_class + '">' + $pbuild.data('next-html') + '</a></div>';
			}
			
			$pbuild
				.append(control_html)
				.removeClass('hide');
			
			requestAnimationFrame(function(){
				$pbuild.find('.page-number-1').trigger('click');
			});
		}
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
			$target = $($this.data('target'));
			$this.data('$target', $target);
		}
		
		if($target[0]){
			if(classes){
				classes = classes.split(' ');
				
				if(type === 'separate'){
					for(var i = 0, iL = classes.length; i < iL; i++){
						if($target.hasClass(classes[i])){
							$target.removeClass(classes[i]);
						}
						else{
							$target.addClass(classes[i]);
						}
					}
				}
				
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
	
	/* Replace content */
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
	
	/* Insertion */
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
	
	
	/* Google map Autocomplete */
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
			$input
				.each(function(){
					var $current = $(this);
					if(!$current.siblings('.iCheck-helper')[0]){
						$current.iCheck({
							checkboxClass: 'icheckbox_minimal-aero',
							radioClass: 'iradio_minimal-aero',
							increaseArea: '20%',
						});
					}
				})
				.on({
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
	
	/* Remove closest */
	$body.on('click', '.remove_closest', function(){
		var $this = $(this);
		$this.closest($this.data('target')).remove();
		return false;
	});
	
	/* Editable */
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
	
	/* Expanding input */
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
	
	
	
	// Invocation
	if(isVex){
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
	}
	
	
	/* Expander */
	$('.expander-toggler').on('click', function(){
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
	/*
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
	*/
	
	
	
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
		$form_progress.filter(':first-child').show();
		
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
				}
				
				$link.on('click', function(){
					var $this = $(this);
					if($window.width() <= 991 && $this.closest('.mobile-menu')[0]){
						$this.closest('.scroll-fix-wrap').addClass('hidden-xs hidden-sm');
					}
				});
				
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
			$scroll_menu.append($menu);
			
			$scroll_menu.on('click', 'a', function(){
				var $this = $(this),
					did = $this.attr('data-id');
				
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

		} else {
			$menu_header.hide();
		}
	}
	
	/* Expander menu */
	var $expander_menu = $('#expander_menu');
	if ($expander_menu[0]) {
		var $menu_header = $('.expander_menu_section:not(.initial)');
		if ($menu_header[0]) {
			var $menus = $expander_menu.find('ul'),
				$current = [],
				$li, $link, section_id, header_id;
			
			for (var i = 0, iL = $menu_header.length; i < iL; i++) {
				$current = $menu_header.eq(i);
				section_id = $current.attr('id') ? $current.attr('id') : 'expander_menu_section' + i;
				$current.attr('id', section_id);
				header_id = $current.data('header');
				
				$li = $(document.createElement('LI'));
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

				$link = $(document.createElement('A'));
				var link_html = '';
				if($current.data('icon')){
					link_html += '<span class="' + $current.data('icon') + '"></span>';
				}
				link_html += '<span class="valm">' + $current.data('text') + '</span>';
								
				var link_params = $current.data('link-params'),
					link_attrs = {};
				if(link_params){
					link_params = link_params.split(',');
					for(var p = 0, pL = link_params.length; p < pL; p++){
						var cp = link_params[p].split('|');
						if(cp && cp.length > 1){
							link_attrs[cp[0]] = cp[1];
						}
					}
				}
				
				$link
					.html(link_html)
					.attr(link_attrs)
					.attr({
						'href': '#',
						'data-id': section_id
					})
					.appendTo($li);
				
				if(header_id){
					var $curh = $menus.filter(header_id);
					if($curh[0]){
						$curh.append($li);
					}
					else{
						$menus.filter('#header-default').append($li);
					}
				}
				else{
					$menus.filter('#header-default').append($li);
				}
			}
			
			$expander_menu.on('click', 'a:not(.custom-action)', function(){
				var $this = $(this),
					section_id = $this.attr('data-id');
				
				if(section_id){
					var $section = $('.expander_menu_section'),
						$csection = $section.filter('#' + section_id);
					
					if(!$csection.hasClass('active')){
						$this
							.closest('#expander_menu').find('a.active')
								.removeClass('active');
						$this.addClass('active');
						
						$section.filter('.active')
							.removeClass('active')
							.find('.expander-content')
								.stop()
								.slideUp();
							
						$csection
							.addClass('active')
							.find('.expander-content')
								.stop()
								.slideDown();
					}
					else{
						$this.removeClass('active');
						$csection
							.removeClass('active')
							.find('.expander-content')
								.stop()
								.slideUp();
					}
					
					return false;
				}
			});
		}
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
			return false;
		}
	});
	$tabs_links.filter('.active').trigger('click');
	
	// Tabs select
	$body
		.on('change', 'select.tab-header', function(){
			var $tab = $('#' + $(this).val());
			$tab.siblings('.active')
				.removeClass('active')
				.hide();
			$tab
				.addClass('active')
				.show();
			return false;
		})
		.find('select.tab-header')
			.trigger('change');
	
	// Tabs detached select
	$body
		.on('change', 'select.tab-detached-header', function(){
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
						.appendTo($container)
						/*
						.find('.active-element').each(function(){
							var $act = $(this);
							//$act.trigger($act.data('action'));
						})*/;
				}
			}
			
			return false;
		})
		.find('select.tab-detached-header')
			.trigger('change');
	
	// Tabs select
	$('.tab-header input[type="radio"]')
		.on('change', function(){
			if(this.checked){
				var $tab = $('#' + this.value);
				$tab.siblings('.active')
					.removeClass('active')
					.hide();
				$tab
					.addClass('active')
					.show();
			}
		})
		.trigger('change');
	
	
	
	/* VEX */

	if(isVex){
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
	
});


