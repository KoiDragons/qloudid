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

$(document).ready(function() {
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
	
	
	
	// Regions 
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
	
	
	
	// Timeline 
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
	
	
	
	// Pagination build
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
	
	
	
	// FILTER
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
	
	
	
	// Form progress
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
	
	
	
	// Expander menu
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
	
	
	
	// VEX
	if(isVex){
		
		// Deals : show
		$body.on('click', '.vex_manage_deal_caller', function(e) {
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
		$body.on('click', '.vex_employee_caller', function(e) {
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
		$body.on('click', '.vex_phone_caller', function(e) {
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
		$body.on('click', '.vex_email_caller', function(e) {
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
		$body.on('click', '.vex_address_caller', function(e) {
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
		$body.on('click', '.vex_payment_card_caller', function(e) {
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
		$body.on('click', '.card_modal .set_button', function(e) {
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
		$body.on('click', '.card_modal .delete_button', function(e) {
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
		$body.on('click', '.card_modal .cancel_button', function(e) {
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
		$body.on('click', '.vex_bank_caller', function(e) {
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
		$body.on('click', '.vex_credits_caller', function(e) {
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
	
	
});


