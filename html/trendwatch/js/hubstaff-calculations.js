/* WPdev functionality */
$(document).ready(function(){
	var $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body);
	
	var settings = {
		currencies: {
			'usd': {
				icon: '&#36;',
				rate: 1,
			},
			'gbp': {
				icon: '&pound;',
				rate: 0.825,
			},
			'aud': {
				icon: 'AU&#36;',
				rate: 1.35,
			},
			'eur': {
				icon: '&euro;',
				rate: 0.925,
			},
			'sgd': {
				icon: 'S&#36;',
				rate: 1.4,
			},
			'jpy': {
				icon: '&yen;',
				rate: 120,
			},
		},
		
		addons: {
			templates: {
				main: '<div id="{id}" class="dflex fxwrap_w alit_c justc_sb padb5 padl15">\
							<h3 class="title mar0 marr15 marb10 pad0 fsz18 xs-fsz15 txt_2d3e50">{label}</h3>\
							<div class="marb10 talr">\
								<div class="price-change ws_now">\
									<sup class="currency fsz13"></sup>\
									<strong class="price marrl-2 fsz20 xs-fsz16" data-price="{price}"></strong>\
									{regularity}\
								</div>\
								{note}\
							</div>\
						</div>',
				regularities: {
					monthly: '<span class="fsz14 txt_425b76">/month</span>',
				},
			}
		},
		
		onces: {
			templates: {
				main: '<div id="{id}" class="dflex fxwrap_w alit_c justc_sb padb5">\
							<h3 class="title mar0 marr15 marb10 pad0 fsz20 xs-fsz16 txt_2d3e50">{label}</h3>\
							<div class="marb10 talr">\
								<div class="price-change ws_now">\
									<sup class="currency fsz13">$</sup>\
									<strong class="price marrl-2 fsz20 xs-fsz16" data-price="{price}"></strong>\
								</div>\
								{note}\
							</div>\
						</div>',
			}
		},
		
	}
	
	var methods = {
		
		// INIT
		init: function(){
			if(settings){
				methods.init_once();
				methods.init_addons();
				methods.init_calculation();
				methods.init_currencies();
				methods.change_currencies((methods.$currency_selector).find('a.active'));
			}
		},
		
		
		// CALCULATIONS
		init_calculation: function($forms){
			if(!$forms){
				$forms = $('.calculation-form');
			}
			for(var i = 0, iL = $forms.length; i < iL; i++){
				var $form = $forms.eq(i),
					$monthly_total = $form.find('.monthly-total'),
					$yearly_total = $form.find('.yearly-total'),
					$get_started_total = $form.find('.get-started-total'),
					monthly_price = 0,
					once_price = 0,
					$price_values = $form.find('.price-value'),
					$monthlies = $price_values.filter('[data-regularity="monthly"]'),
					$onces = $price_values.filter('[data-regularity="once"]');
				
				
				for(var p = 0, pL = $monthlies.length; p < pL; p++){
					var $monthly = $monthlies.eq(p);
					
					if($monthly.attr('type') === 'checkbox' || $monthly.attr('type') === 'radio'){
						if($monthly.get(0).checked){
							var val = parseInt($monthly.val());
							val = (val && !isNaN(val)) ? val : 0;
							monthly_price += val;
						}
					}
					else if($monthly.hasClass('price-variable-value')){
						var val = $monthly.data('calculated-value');
						val = (val && !isNaN(val)) ? val : 0;
						monthly_price += val;
					}
					else{
						var val = parseInt($monthly.val());
						val = (val && !isNaN(val)) ? val : 0;
						monthly_price += val;
					}
				}
				
				for(var p = 0, pL = $onces.length; p < pL; p++){
					var $once = $onces.eq(p);
					if($once.attr('type') === 'checkbox' || $once.attr('type') === 'radio'){
						if($once.get(0).checked){
							var val = parseInt($once.val());
							val = (val && !isNaN(val)) ? val : 0;
							once_price += val;
						}
					}
					else{
						var val = parseInt($once.val());
						val = (val && !isNaN(val)) ? val : 0;
						once_price += val;
					}
				}
				
				$monthly_total.find('.price').data('price', monthly_price);
				var yearly_total = monthly_price * 12;
				$yearly_total.find('.price').data('price', yearly_total);
				$get_started_total.find('.price').data('price', yearly_total + once_price);
			}
		},
		
		
		
		// ONCES
		init_once: function($forms){
			if(!$forms){
				$forms = $('.calculation-form');
			}
			$forms.each(function(){
				methods.process_once($(this));
			});
		},
		
		// - process onces
		process_once: function($form){
			var $once_list = $form.find('.once-list'),
				$onces = $form.find('.price-value[data-regularity="once"]'),
				onces_html = '';
				
			$once_list.empty();
			if($onces[0]){
				$onces.each(function(){
					var $once = $(this),
						once_type = $once.attr('type');
					
					if(once_type != 'checkbox' && once_type != 'radio'){
						var template = settings.onces.templates.main,
							title = $once.data('label'),
							val = $once.val(),
							note = $once.data('note');
								
						note = note ? '<i>' + note + '</i>' : '';
						
						template = methods.replace_all(template, '{id}', $once.attr('id') + '_summary');
						title = methods.replace_all(title, '{value}', val);
						template = methods.replace_all(template, '{label}', title);
						template = methods.replace_all(template, '{price}', val);
						template = methods.replace_all(template, '{note}', note);
							
						onces_html += template;
					}
				});
				$once_list.html(onces_html);
			}
		},
		
		
		
		// CURRENCIES
		init_currencies: function(){
			var $currency_selector = $('#currency-selector');
			methods.$currency_selector = $currency_selector;
			
			$currency_selector.on('click', 'a', function(){
				methods.change_currencies($(this));
				return false;
			});
		},
		
		// - change currency
		change_currencies: function($link, $prices){
			if(!$prices){
				$prices = $('.price-change');
			}
			var currency = settings.currencies[$link.data('currency')];
			$link
				.addClass('active')
				.siblings('.active')
					.removeClass('active');
			
			if(currency){
				$prices.each(function(){
					var $this = $(this),
						$price = $this.find('.price'),
						base_price = $price.data('price') ? parseInt($price.data('price')) : 0;
						
					$this.find('.currency').html(currency.icon);
					$price.html(methods.format_price(base_price * currency.rate));
				});
			}
		},
		
		// - format price output
		format_price: function(price){
			price = Math.round(price);
			if(price > 999){
				price = price.toString();
				var semi_price = '',
					lng = price.length,
					start = lng - 3,
					end = lng;
					
				for(var i = 0, iL = Math.ceil(lng / 3); i < iL; i++){
					if(semi_price.length > 0){
						semi_price = ',' + semi_price;
					}
					semi_price = price.substring(start, end) + semi_price;
					start -= 3;
					end -= 3;
				}
				return semi_price;
			}
			return price;
		},
		
		
		
		// ADDONS
		init_addons: function(){
			$body.on('change keyup', '.price-addon', function(){
				var $form = $(this).closest('form');
				methods.process_addon(this);
				methods.init_calculation($form);
				methods.change_currencies((methods.$currency_selector).find('a.active'), $form.find('.price-change'));
			});
		},
		
		// - process addon change
		process_addon: function(addon){
			var $addon = $(addon),
				$form = $addon.closest('form'),
				$list = ($addon.data('regularity') === 'monthly') ? $form.find('.addons-list') : ($addon.data('regularity') === 'once' ? $form.find('.once-list') : ''),
				id = $addon.attr('id'),
				$summary = $list.find('#' + id + '_summary');
			
			// variable price
			if($addon.hasClass('price-variable-value')){
				var val = $addon.val(),
					min = $addon.data('min'),
					base = $addon.data('base'),
					each = $addon.data('each');
				
				if(min && min > val){
					val = 0;
				}
				else{
					val = Math.ceil((val - min) / base) * each;
				}
				
				$addon.data('calculated-value', val);
				
				if($summary[0]){
					if(val > 0){
						$summary.find('.price').data('price', val);
						$summary.find('.title').html(methods.replace_all($addon.data('label'), '{init-value}', $addon.val()));
					}
					else{
						$summary.remove();
					}
				}
				else{
					if(val > 0){
						methods.build_addon($list, $addon, val, $addon.val());
					}
					else{
						$summary.remove();
					}
				}
			}
			// regular price
			else{
				if(addon.checked){
					if(!$summary[0]){
						methods.build_addon($list, $addon, $addon.val());
					}
				}
				else{
					if($summary[0]){
						$summary.remove();
					}
				}
			}
		},
		
		// - build new addon
		build_addon: function($addons_list, $addon, val, init_val){
			var template = settings.addons.templates.main,
				title = $addon.data('label'),
				regularity = settings.addons.templates.regularities[$addon.data('regularity')],
				note = $addon.data('note'),
				id = $addon.attr('id');
						
			regularity = regularity ? regularity : '';
			note = note ? '<i>' + note + '</i>' : '';
							
			template = methods.replace_all(template, '{id}', id + '_summary');
			if(init_val){
				title = methods.replace_all(title, '{init-value}', init_val);
			}
			else{
				title = methods.replace_all(title, '{init-value}', '');
			}
			template = methods.replace_all(template, '{label}', title);
			template = methods.replace_all(template, '{price}', val);
			template = methods.replace_all(template, '{regularity}', regularity);
			template = methods.replace_all(template, '{note}', note);
						
			$addons_list.append(template);
		},
		
		
		
		// SUPPLEMENTALS
		
		// - replace all occurrences
		replace_all: function(template, search, replacement){
			return template.split(search).join(replacement);
		},
		
	}
	methods.init();
	
});




