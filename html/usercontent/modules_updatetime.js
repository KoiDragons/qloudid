/* SUPPLEMENTAL */
var licenceValue=0;
var updateLicenceValue=0;
var pickaproListingInfo=0;
var apartmentAvailable=0;
var keyValue=0;
var company_id='';
var service_id='';
var categ_id='';
var serviceCategoryAvailable=0;
var updateAvailable=0;
var otherRoomUserStatus=0;
var otherRoomStatus=0;
var otherRoomId=0;
var fulldayFeeUpdate=0;
var hourlyFeeApp=0;
var cleaningFeeApp=0;
var reservationFeeApp=0;
var halfDayOpen=0;
var invoiceDateInfo=0;
var updateDepositFee=0;
var discountInfo=0;
var chargeInfo=0;
var remainingPayment=0;
var paidInFull=0;
var parkingTax=0;
var apartmentTax=0;
var monthlyfeeUpdate=0
var apartment_amenity_display=0;
var depositUpdate=0;
var vatUpdate=0;
var amenitiesUpdate=0;
var tenantUpdate=0;
var priceUpdate=0;
var invoiceUpdate=0;
var elevatorValueUpdate=0;
var elevatorUpdate=0;
var basementUpdate=0;
var penthouseUpdate=0;
var garageUpdate=0;
var amenityRuleVale=0;
var taxInfo=0;
var ruleVale=0;
var entry_type=0;
var wifi_available=0;
var building_amenity_display=0;
var amenity_id=0;
var amenity_display=0;
var publishLandloard=0;
var sameAddressAsUser=0;
var ssnAvailable=0;
var nameVisible=0;
var idnumberVisible=0;
var issueDateVisible=0;
var expiryDateVisible=0;
var picVisible=0;
var recurring_event=0;
var recurrEvent=1;
var moreBookingOnRequest=0;
var bookableCategory=0;
var variationRequired=0;
var moreEventOnRequestExtraFee=0;
var moreEventOnRequest=0;
var customerPlaceTourFee=0;
var customerPlace=0;
var bookingDeletion=0;
var bookingYOurself=0;
var workEmp=0;
var lunchTime=0;
var invoiceShow=0;
var invoiceShowc=0;
var nameInfoUpdate=0;
var dayValue=0;
var foodValue=0;
var menuCategory=0;
var menuDish=0;
var broadcast=0;
var cuisine=0;
var tattoo=0;
var smoke=0;
var drink=0;
var tobbacoo=0;
var children=0;
var height=0;
var weight=0;
var showPr=0;
var showP=0;
var renameP=0;
var showSec=0;
var showEn=0;
var showRe=0;
var showHe=0;
var renameHe=0;
var renameRe=0;
var showLogo=0;
var showTxt=0;
var pickupYes=0;
var digitalYes=0;
var invoiceYes=0;
var cardYes=0;
var deliveryYes=0;
var identifyYes=0;
var phoneYes=0;
var companyEmailYes=0;
var companypickupYes=0;
var companydigitalYes=0;
var companyinvoiceYes=0;
var verifyPhoneYes=0;
var verifyEmailYes=0;
(function() {
	// requestAnimationFrame crossbrowser support
	var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
	window.requestAnimationFrame = requestAnimationFrame;
	
	// replaces every instance of sub-string in another string
	String.prototype.replaceAll = function(search, replacement) {
		var target = this;
		return target.split(search).join(replacement);
	};
	
})();

// return selected option html
function get_select_option_name($select){
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



/* POPUPS */

// - wp fade
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

// - sliding modal
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

// - popup modal
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
	var $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body);
	
	
	// TOOLTIP
	if($.fn.tooltip){
	
		// general
		$('.tooltip').tooltip({
			track: true
		});
		
		// custom
		var $tooltip_custom = $('.tooltip_custom'),
			$tooltip_cont = $('#tooltip_cont');
		
		$tooltip_custom.tooltip({
			tooltipClass: 'custom_tootip_class',
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
		
		$body.on('click', '.tooltip_btn a', function(e){
			$tooltip_custom.tooltip('close');
			return false;
		});
	}
	
	
	
	/* FORM CONTROLS */
	
	// iCheck
	if($.fn.iCheck){
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
		
		
		// - toggle active
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
		
		// toggle visited
		$body.on('ifChecked', 'input[type=checkbox].toggle-visited', function(event){
			var $target = $($(this).data('target'));
			if($target[0]){
				$target.addClass('visited');
			}
		});
		$body.on('ifUnchecked', 'input[type=checkbox].toggle-visited', function(event){
			var $this = $(this),
				$target = $($this.data('target'));
			
			if($target[0]){
				if($this.data('check-all') == true){
					var $base = $this.data('closest') ? $this.closest($this.data('closest')) : $body,
						$inputs = $base.find('input[type=checkbox].toggle-visited[data-target="' + $this.data('target') + '"]'),
						status = true;
						
					for(var i = 0, iL = $inputs.length; i < iL; i++){
						if($inputs.eq(i).get(0).checked){
							status = false;
							break;
						}
					}
					
					if(status){
						$target.removeClass('visited');
					}	
				}
				else{
					$target.removeClass('visited');
				}
				
			}
		});
		
		// toggle class
		$body.on('ifChecked', 'input[type=checkbox].toggle-class', function(event){
			var $this = $(this),
				$target = $this.data('$class-target'),
				classes = $this.data('classes');
			
			if(!$target){
				var closest = $this.data('class-closest'),
					target = $this.data('class-target');
					
				if(closest){
					var $closest = $this.closest(closest);
					if(target){
						$target = $closest.find(target);
					}
					else{
						$target = $closest;
					}
				}
				else{
					$target = $(target);
				}
				
				$this.data('$class-target', $target);
			}
			
			if($target[0]){
				$target.addClass(classes);
			}
		});
		$body.on('ifUnchecked', 'input[type=checkbox].toggle-class', function(event){
			var $this = $(this),
				$target = $this.data('$class-target'),
				classes = $this.data('classes');
			
			if(!$target){
				var closest = $this.data('class-closest'),
					target = $this.data('class-target');
					
				if(closest){
					var $closest = $this.closest(closest);
					if(target){
						$target = $closest.find(target);
					}
					else{
						$target = $closest;
					}
				}
				else{
					$target = $(target);
				}
				
				$this.data('$class-target', $target);
			}
			
			if($target[0]){
				$target.removeClass(classes);
			}
		});
	}
	
	// Slider range
	if($.fn.slider){
		
		// - custom
		$('.slider-range').each(function(){
			var $this = $(this),
				slide_options = {};
			
			// range
			if($this.data('range')){
				slide_options['range'] = $this.data('range');
			}
			
			// additional display control
			if($this.data('capture')){
				var $this_capture = $($this.data('capture'));
				$this_capture.data('$range', $this);
				
				if($this.data('sync') == true){
					$this_capture.on('keyup change', function(){
						var val = parseInt(this.value);
						val = isNaN(val) ? 0 : val;
						$(this).data('$range').slider('value', val);
					});
				}
				
				$this.data('$capture', $this_capture);
				slide_options['slide'] = function(event, ui){
					var $capture = $(this).data('$capture');
					$capture.val(ui.value);
				};
				slide_options['change'] = function(event, ui){
					var $capture = $(this).data('$capture');
					$capture.val(ui.value);
				};
			}
			
			slide_options['min'] = $this.data('min') ? $this.data('min') : 0;
			slide_options['max'] = $this.data('max') ? $this.data('max') : 100;
			
			if($this.data('range-classes') || $this.data('handle-classes')){
				
				slide_options['create'] = function(event, ui){
					var $this_control = $(this);
					
					if($this.data('range-classes')){
						$this_control.find('.ui-slider-range').addClass($this.data('range-classes'));
					}
					if($this.data('handle-classes')){
						$this_control.find('.ui-slider-handle').addClass($this.data('handle-classes'));
					}
				};
				
				
			}
			
			
			$this.slider(slide_options);
		});
		
		// - general
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: 500,
			values: [75, 300],
			slide: function(event, ui) {
				$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
			}
		});
		$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
	}
	
	// Select menu plugin
	if($.fn.selectmenu){
		$('select.jui-select').each(function(){
			var $this = $(this),
				options = {};
			
			if($this.data('button-classes') || $this.data('icon-classes') || $this.data('menu-classes')){
				
				options['create'] = function(event, ui){
					var $button = $(event.target).siblings('.ui-selectmenu-button');
					
					// Button
					if($this.data('button-classes')){
						$button.addClass($this.data('button-classes'));
					}
					
					// Icon
					if($this.data('icon-classes')){
						$button.find('.ui-selectmenu-icon').addClass($this.data('icon-classes'));
					}
					
					// Menu
					if($this.data('menu-classes')){
						$this.selectmenu('menuWidget').addClass($this.data('menu-classes'));
					}
				};
			}
			
			
			$this.selectmenu(options);
		});
	}
	
	// Selectric
	if($.fn.selectric){
		
		// - general
		$('select.selectric').selectric();
	}
	
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
	
	// Custom select-like control
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
	
	// Datepicker
	if($.fn.datepicker){
		
		// - default
		$('.datepicker2').datepicker();
		
		// - general
		$('#datepicker, .datepicker').datepicker({
			showOn: 'button',
			buttonImage: 'images/calendar.png',
			buttonImageOnly: true
		});
		$('.date_picker_bx').datepicker({
			showOn: 'button',
			buttonImage: 'images/yellow_date_ico.png',
			buttonImageOnly: true
		});
	}
	
	// File selector
	/*
		data-preview [css selector] = preview target
		data-type [img] = preview type
		data-img-class [string] = a list of classes to be applied to img data-type
	*/
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
	
	// Boolean control
	var $boolean_controls = $('.boolean-control');
	if($boolean_controls[0]){
		var boolean_controls_select = function($option){
			var $boolean_control = $option.closest('.boolean-control'),
				$boolean = $boolean_control.find('input[type="checkbox"]'),
				$target = $($boolean.data('target'))
			
			if($option.attr('data-value') === 'true'){
				$boolean.get(0).checked = true;
				$boolean_control.addClass('checked');
				
				
				if(amenity_display==1)
				{
					  var send_data={};
				 send_data.amenity_id=amenity_id;
				 send_data.app_display=1;
				 $.ajax({
							type:"POST",
							url:"../../updateCommunityAmenityDisplay",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					amenity_id=0;
					amenity_display=0;
				}
				
				
				if(amenityRuleVale==1)
				{
					 
				 var send_data={};
				 send_data.updateInfo=1;
				 send_data.rule_id=amenityRuleId;
				 $.ajax({
							type:"POST",
							url:"../../../updateAmenityRuleInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					amenityRuleVale=0;
					}
				
				
				if(ruleVale==1)
				{
					 
				 var send_data={};
				 send_data.updateInfo=1;
				 send_data.rule_id=ruleId;
				 send_data.subrule_id=subruleId;
				 $.ajax({
							type:"POST",
							url:"../../updateRuleInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					ruleVale=0;
					}
				
				
				if(building_amenity_display==1)
				{
					 
					  var send_data={};
				 send_data.amenity_id=amenity_id;
				 send_data.app_display=1;
				 $.ajax({
							type:"POST",
							url:"../../updateBuildingAmenityDisplay",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					amenity_id=0;
					building_amenity_display=0;
				}
				
				
				if(apartment_amenity_display==1)
				{
					 
					  var send_data={};
				 send_data.amenity_id=amenity_id;
				 send_data.app_display=1;
				 $.ajax({
							type:"POST",
							url:"../../updateBuildingAmenityDisplay",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					amenity_id=0;
					apartment_amenity_display=0;
				}
				
				
				
				if(paidInFull==1)
				{
					 
				var send_data={};
				send_data.id=1;
				 $.ajax({
				type:"POST",
				url:"../../getEmiInfo",
				data:send_data,
				dataType:"text",
				contentType: "application/x-www-form-urlencoded;charset=utf-8",
				success: function(data1){
				$('#emiData').removeClass('hidden');	
				$('#emiData').html(data1);
				}
				});	
					$('#total_emis').val(1);
					$('#paid_in_full').val(1);
					 $('#paymentEmis').addClass('hidden');
					 $('#depositFee').addClass('hidden');
					 $('.depositRequired').removeClass('checked');
					 $('#deposit_fee').val(0);
					  $('#deposit_fee_applicable').val(0);
					paidInFull=0;
				}
				
				if(discountInfo==1)
				{
					$('#discount_applicable').val(1);
					$('#totalDiscount').removeClass('hidden');
					discountInfo=0;
				}
				
				if(invoiceDateInfo==1)
				{
					$('#invoice_date_same').val(1);
					$('#invoiceDateInfo').addClass('hidden');
					invoiceDateInfo=0;
				}
				
				if(halfDayOpen==1)
				{
					$('#half_day_booking_available').val(1);
					$('#halfDayBooking').removeClass('hidden');
					$("#pre_lunch_price").val(0);
					$("#post_lunch_price").val(0);
					halfDayOpen=0;
				}
				if(reservationFeeApp==1)
				{
					$('#reservation_fee_applicable').val(1);
					$('#reservationFee').removeClass('hidden');
					$("#reservation_deposit").val(0);
					reservationFeeApp=0;
				}
				
				if(cleaningFeeApp==1)
				{
					$('#cleaning_fee_applicable').val(1);
					$('#cleaningFee').removeClass('hidden');
					$("#cleaning_fee").val(0);
					cleaningFeeApp=0;
				}
				
				
				if(hourlyFeeApp==1)
				{
					$('#hourly_booking_available').val(1);
					$('#hourlyPrice').removeClass('hidden');
					$("#hourly_price").val(0);
					hourlyFeeApp=0;
				}
				
				
				if(fulldayFeeUpdate==1)
				{
					$('#full_day_booking_available').val(1);
					$('#fullDay').removeClass('hidden');
					$("#full_day_price").val(0);
					fulldayFeeUpdate=0;
				}
				
				
				
				if(updateDepositFee==1)
				{
					$('#deposit_fee_applicable').val(1);
					$('#depositFee').removeClass('hidden');
					updateDepositFee=0;
				}
				if(chargeInfo==1)
				{
					$('#charge_applicable').val(1);
					$('#totalCharge').removeClass('hidden');
					chargeInfo=0;
				}
				
				if(remainingPayment==1)
				{
						var send_data={};
						send_data.id=1;
						 $.ajax({
						type:"POST",
						url:"../../getEmiInfo",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
						$('#emiData').removeClass('hidden');	
						$('#emiData').html(data1);
						}
						});	
					$('#total_emis').val(1);
					
					$('#fullPayment').addClass('hidden');
					$('#remaining_fee_paid_in_full').val(1);
					$('#emiData').addClass('hidden');
					$('#total_emis').val(1);
					remainingPayment=0;
				}
				
				
				
				if(otherRoomStatus==1)
				{
						var send_data={};
						send_data.id=otherRoomId;
						send_data.aid=apartmentId;
						send_data.updateInfo=1;
						 $.ajax({
						type:"POST",
						url:"../../../../updateOtherRoomInfo",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
						}
						});	
					 
					otherRoomStatus=0;
				}
				
				
				
				if(otherRoomUserStatus==1)
				{
						var send_data={};
						send_data.id=otherRoomId;
						send_data.aid=apartmentId;
						send_data.updateInfo=1;
						 $.ajax({
						type:"POST",
						url:"../updateOtherRoomInfo",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
						}
						});	
					 
					otherRoomUserStatus=0;
				}
				
				if(updateAvailable==1)
				{
						var send_data={};
						send_data.gid=getStartedId;
						send_data.updateInfo=1;
						 $.ajax({
						type:"POST",
						url:"../updateAvailableGetstarted",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							$('#discriptionPhoto').removeClass('hidden');
							$('#photoDisplay').removeClass('hidden');
						} 
						});	
					 
					updateAvailable=0;
				}
				
				if(keyValue==1)
				{
					$('#key_available').val(1);
					$('#keyInfo').removeClass('hidden');
					keyValue=0;
				}
				
				
				if(apartmentAvailable==1)
				{
					$('#apartment_available').val(1);
					$('#AlreadyAdded').removeClass('hidden');
					$('#NotAdded').addClass('hidden');
					apartmentAvailable=0;
				}
				if(serviceCategoryAvailable==1)
				{
						var send_data={};
						send_data.updateInfo=1;
						send_data.company_id=company_id;
						send_data.service_id=service_id;
						send_data.categ_id=categ_id;
						 $.ajax({
						type:"POST",
						url:"../../../updateAvailableServiceCategory",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							$('#todoInfo').removeClass('hidden');
							$('#amenities_info').html('');
							$('#amenities_info').html(data1); 
						} 
						});	
					 
					serviceCategoryAvailable=0;
				}
				
				
				if(picVisible==1)
				{
					$('#is_visible').val(1);
					$('#visibleTrue').removeClass('hidden');
					$('#name_visible').val(2);
					$('#idnumber_visible').val(2);
					$('#issue_date_visible').val(2);
					$('#expiry_date_visible').val(2);
					picVisible=0; 
				}
				 
				if(entry_type==1)
				{
					$('#entry_code').val(''); 
					$('#entry').removeClass('hidden');
					$('#entry_type').val(1);
					entry_type=0; 
				}
				
				
				
				
				if(amenitiesUpdate==1)
				{
					$('#amenities_available').val(1);
					amenitiesUpdate=0; 
				}
				
				
				if(depositUpdate==1)
				{
					
					$('#deposit_required').val(1);
					$('#deposit_amount').val(0);
					$('#deposit_payment_date').val('');
					$('#depositInfo').removeClass('hidden');
					depositUpdate=0; 
				}
				if(vatUpdate==1)
				{
					$('#vat_applicable').val(1);
					$('#total_vat').val(0);
					$('#VatInfo').removeClass('hidden');
					vatUpdate=0; 
				}
				
				if(updateLicenceValue==1)
				{
					$('#licence'+licenceValue).val(1);
					updateLicenceValue=0; 
				}
				if(parkingTax==1)
				{
					$('#parking_tax_applicable').val(1);
					$('#parking_payment_tax').val(12);
					$('#prTaxInfo').removeClass('hidden');
					parkingTax=0; 
				}
				
				if(apartmentTax==1)
				{
					$('#apartment_tax_applicable').val(1);
					$('#apartment_payment_tax').val(12);
					$('#apTaxInfo').removeClass('hidden');
					apartmentTax=0; 
				}
				
				
				if(tenantUpdate==1)
				{
					$('#tenant_available').val(1);
					tenantUpdate=0; 
				}
				
				if(priceUpdate==1)
				{
					$('#pricing_available').val(1);
					$('#InvoiceInfo').removeClass('hidden');
					priceUpdate=0; 
				}
				
				if(invoiceUpdate==1)
				{
					$('#invoice_available').val(1);
					invoiceUpdate=0; 
				}
				
				if(elevatorValueUpdate==1)
				{
					$('#elevator_'+id).val(1);
					elevatorValueUpdate=0; 
				}
				
				if(elevatorUpdate==1)
				{
					$('#elevator'+id).val(1);
					elevatorUpdate=0; 
				}
				if(basementUpdate==1)
				{
					$('#basement_available').val(1);
					basementUpdate=0; 
				}
				
				if(penthouseUpdate==1)
				{
					$('#penthouse_available').val(1);
					penthouseUpdate=0; 
				}
				
				if(garageUpdate==1)
				{
					$('#garage_available').val(1);
					garageUpdate=0; 
				}
				if(wifi_available==1)
				{
					$('#wifi_username').val(''); 
					$('#wifi_password').val(''); 
					$('#wifi_info').removeClass('hidden');
					$('#wifi_available').val(1);
					wifi_available=0; 
				}
				
				if(sameAddressAsUser==1)
				{
					$('#sameAddress').addClass('hidden');
					$('#is_address_same').val(1);
					sameAddressAsUser=0; 
				}
				if(ssnAvailable==1)
				{
					$('#isAvailable').removeClass('hidden');
					$('#is_ssn_available').val(1);
					ssnAvailable=0; 
				}
				if(nameVisible==1)
				{
					$('#name_visible').val(1);
					nameVisible=0; 
				}
				if(idnumberVisible==1)
				{
					$('#idnumber_visible').val(1);
					idnumberVisible=0; 
				}
				
				if(issueDateVisible==1)
				{
					$('#issue_date_visible').val(1);
					issueDateVisible=0; 
				}
				if(expiryDateVisible==1)
				{
					$('#expiry_date_visible').val(1);
					expiryDateVisible=0; 
				}
				
				
				if(workEmp==1)
				{
					 $('#working_day_'+dayValueId).val(1);
					$("#day_"+dayValueId).removeClass('hidden');
					$("#lunchTimeInfo_"+dayValueId).removeClass('hidden');
					workEmp=0;
				}
				
				if(lunchTime==1)
				{
					$('#lunch_time_'+dayValueId).val(1);
					$("#lunch_"+dayValueId).removeClass('hidden');
					lunchTime=0;
				}
				
				
				if(invoiceShow==1)
				{
					$('#same_invoice').val(1);
					$("#ShowInvoice").addClass('hidden');
					invoiceShow=0;
				}
				if(invoiceShowc==1)
				{
					$('#same_invoicec').val(1);
					$("#ShowInvoicec").addClass('hidden');
					invoiceShowc=0;
				}
				if(companypickupYes==1)
				{
					$('#company_pickup_info').val(1);
					companypickupYes=0;
				}
				
				if(companydigitalYes==1)
				{
					$('#company_digital_delivery').val(1);
					companydigitalYes=0;
				}
				if(companyinvoiceYes==1)
				{
					$('#company_invoice_address').val(1);
					companyinvoiceYes=0;
				}
				if(companyEmailYes==1)
				{
					$('#company_email').val(1);
					companyEmailYes=0;
				}
				if(pickupYes==1)
				{
					$('#pickup_info').val(1);
					pickupYes=0;
				}
				
				if(digitalYes==1)
				{
					$('#digital_delivery').val(1);
					digitalYes=0;
				}
				if(invoiceYes==1)
				{
					$('#invoice_address').val(1);
					invoiceYes=0;
				}
				
				if(deliveryYes==1)
				{
					$('#delivery_address').val(1);
					deliveryYes=0;
				}
				
				if(cardYes==1)
				{
					$('#card_detail').val(1);
					cardYes=0;
				}
				
				if(identifyYes==1)
				{
					$('#identificator_info').val(1);
					identifyYes=0;
				}
				
				if(phoneYes==1)
				{
					$('#phone_detail').val(1);
					$('#ifVerifyPhone').removeClass('hidden');
					phoneYes=0;
				}
				
				if(verifyEmailYes==1)
				{
					$('#verify_email').val(1);
					verifyEmailYes=0;
				}
				
				if(verifyPhoneYes==1)
				{
					$('#verify_phone_detail').val(1);
					verifyPhoneYes=0;
				}
				if(nameInfoUpdate==1)
				{
					$('#same_name').val(1);
					$("#nameInfo").addClass('hidden');
					nameInfoUpdate=0;
				}
				
				if(publishLandloard==1)
				{
					$('#food1').val(1);
					$("#food_1").removeClass('hidden');
					publishLandloard=0;
					updatePublishInfo(1);
				}
				
				$('#food_'+foodValue).removeClass('hidden');
				$('#food'+foodValue).val(1); 
				$('#day_'+dayValue).removeClass('hidden');
				$('#day'+dayValue).val(1); 
				$('#feeDetail'+dayValue).val(0); 
				$('#broadcast_type').val(1); 
				if(customerPlace==1)
				{
				$('#event_at_customer_place').val(1);
				$('#customerPlaceTour').removeClass('hidden');
				
				customerPlace=0;	
				}
				if(customerPlaceTourFee==1)
				{
				$('#tour_fee_applicable').val(1);
				$('#tourFee').removeClass('hidden');
				customerPlaceTourFee=0;		
				}
				
				if(moreEventOnRequest==1)
				{
					 
				$('#more_event_on_request').val(1);
				$('#moreEvents').removeClass('hidden');
				moreEventOnRequest=0;		
				}
				
				if(moreEventOnRequestExtraFee==1)
				{
				$('#more_event_extra_fee').val(1);
				$('#extraFee').removeClass('hidden');
				moreEventOnRequestExtraFee=0;		
				}
				if(bookingYOurself==1)
				{
				$('#book_for_yourself').val(1);
				bookingYOurself=0;
				}
				if(bookingDeletion==1)
				{
				$('#delete_of_ongoing_booking').val(1);
					bookingDeletion=0;				
				}
				if(bookableCategory==1)
				{
				$('#is_bookable').val(1);
				$('#bookableSevice').removeClass('hidden');
				$('#bookable_service_category_id').val(1);
					bookableCategory=0;				
				}
				
				if(pickaproListingInfo==1)
				{
				var subcatg='<option value="0" class="lgtgrey2_bg">Select</option>';
				$('#pickapro_listing').val(1);
				$('#pickaproSevice').removeClass('hidden');
				$('#category_id').val(0);
				$('#subcategory_id').html(subcatg);
					pickaproListingInfo=0;			
				}
				
				if(moreBookingOnRequest==1)
				{
				$('#more_booking_on_request').val(1);
				$('#ExtraEventOnRequest').removeClass('hidden');
				moreBookingOnRequest=0;				
				}
				
				if(recurrEvent==1)
				{
				$('#recurring_event').val(1);
				$('#isRecurringEvent').removeClass('hidden');
				$('#notRecurringEvent').addClass('hidden');
				recurrEvent=0;				
				}
				if(taxInfo==1)
				{
				$('#tax_included').val(1);
				$('#tax_amount').val(0);
				$('#taxInfo').addClass('hidden');
				taxInfo=0;				
				}
				
				
				if(variationRequired==1)
				{
				$('#variation_type').val(1); 
				$('#row1').removeClass('hidden');
				$('#variation_count').val(1);
				$('#moreValues').removeClass('hidden');
				variationRequired=0;
				}
				
				$('#cate_'+menuCategory).removeClass('hidden');
				$('#serve'+menuCategory).val(1); 
				$('#menu_'+menuDish).removeClass('hidden');
				$('#categ'+menuDish).val(1); 
				$('#b_channels').removeClass('hidden');
				$('#type'+cuisine).val(1);
				if(smoke==1)
				{
				$('#smoking').val(1);
				smoke=0;
				}
				if(tattoo==1)
				{
				$('#user_body_tattoo').val(1);
				tattoo=0;
				}
				if(drink==1)
				{
				$('#drinking').val(1);
				drink=0;
				}
				if(tobbacoo==1)
				{
				$('#tobbacoo').val(1);
				tobbacoo=0;
				}  
				if(children==1)
				{
				$('#children').val(1);
				$('#childDetails').attr('style','display:block');
				children=0;
				}
			
				if(weight==1)
				{
				$('#weight_important').val(1);
				$('#weight_preffer').removeClass('hidden');
				  weight=0;
				}
				
				if(height==1)
				{
				$('#height_important').val(1);
				$('#height_prefer').removeClass('hidden');
				  height=0;
				}
				
				if(renameP==1)
				{
				$('#rename_products').val(1);
				$('#renameProduct').attr('style','display:block;');
				  renameP=0;
				}
				
				if(showP==1)
				{
				$('#show_products').val(1);
				$('#productDetails').attr('style','display:block;');
				  showP=0;
				}
				
				if(showPr==1)
				{
				$('#show_privacy').val(1);
				$('#privacyDetails').attr('style','display:block;');
				  showPr=0;
				}
				
				if(showSec==1)
				{
				$('#show_security').val(1);
				$('#securityDetails').attr('style','display:block;');
				  showSec=0;
				}
				if(showEn==1)
				{
				$('#show_environment').val(1);
				$('#environmentDetails').attr('style','display:block;');
				  showEn=0;
				}
				
				
				if(renameHe==1)
				{
				$('#rename_help').val(1);
				$('#renamehelp').attr('style','display:block;');
				  renameHe=0;
				}
				
				if(showHe==1)
				{
				$('#show_help').val(1);
				$('#helpDetails').attr('style','display:block;');
				$('#morehelp').html('');
				  showHe=0;
				}
				
				if(renameRe==1)
				{
				$('#rename_resources').val(1);
				$('#renameresource').attr('style','display:block;');
				  renameRe=0;
				}
				
				if(showRe==1)
				{
				$('#show_resources').val(1);
				$('#resourceDetails').attr('style','display:block;');
				$('#moreresource').html('');
				  showRe=0;
				}
				if(showLogo==1)
				{
				$('#show_company_logo').val(1);
				 
				  showLogo=0;
				}
				if(showTxt==1)
				{
				$('#show_company_subtext').val(1);
				$('#subText').attr('style','display:block;');
				 
				  showTxt=0;
				}
			if($target[0]){
					$target
						.stop()
						.slideDown();
				}
			}
			else{
				$boolean.get(0).checked = false;
				$boolean_control.removeClass('checked');
				
				if(amenity_display==1)
				{
					  var send_data={};
				 send_data.amenity_id=amenity_id;
				 send_data.app_display=0;
				 $.ajax({
							type:"POST",
							url:"../../updateCommunityAmenityDisplay",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					amenity_id=0;
					amenity_display=0;
				}
				
				if(amenityRuleVale==1)
				{
					 
				 var send_data={};
				 send_data.updateInfo=0;
				 send_data.rule_id=amenityRuleId;
				 $.ajax({
							type:"POST",
							url:"../../../updateAmenityRuleInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					amenityRuleVale=0;
					}
				
				if(ruleVale==1)
				{
					 
				var send_data={};
				send_data.updateInfo=0;
				 send_data.rule_id=ruleId;
				 send_data.subrule_id=subruleId;
				 $.ajax({
							type:"POST",
							url:"../../updateRuleInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					ruleVale=0;
					}
				if(building_amenity_display==1)
				{
					  var send_data={};
				 send_data.amenity_id=amenity_id;
				 send_data.app_display=0;
				 $.ajax({
							type:"POST",
							url:"../../updateBuildingAmenityDisplay",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					amenity_id=0;
					building_amenity_display=0;
				}
				
				if(apartment_amenity_display==1)
				{
					  var send_data={};
				 send_data.amenity_id=amenity_id;
				 send_data.app_display=0;
				 $.ajax({
							type:"POST",
							url:"../../updateBuildingAmenityDisplay",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								 
							}
						});	
					amenity_id=0;
					apartment_amenity_display=0;
				}
				
				if(publishLandloard==1)
				{
					$('#food1').val(0);
					$("#food_1").addClass('hidden');
					publishLandloard=0;
					updatePublishInfo(0);
				}
				
				if(paidInFull==1)
				{
					 
				var send_data={};
				send_data.id=1;
				 $.ajax({
				type:"POST",
				url:"../../getEmiInfo",
				data:send_data,
				dataType:"text",
				contentType: "application/x-www-form-urlencoded;charset=utf-8",
				success: function(data1){
				$('#emiData').removeClass('hidden');	
				$('#emiData').html(data1);
				}
				});	
				
				$('#total_emis').val(1);
					$('#paid_in_full').val(0);
					 $('#paymentEmis').removeClass('hidden');
					 $('#depositFee').removeClass('hidden');
					 $('.depositRequired').addClass('checked');
					 $('#deposit_fee').val(0);
					  $('#deposit_fee_applicable').val(1);
					paidInFull=0;
				}
				
				if(discountInfo==1)
				{
					$('#discount_applicable').val(0);
					$('#totalDiscount').addClass('hidden');
					discountInfo=0;
				}
				
				if(invoiceDateInfo==1)
				{
					$('#invoice_date_same').val(0);
					$('#invoiceDateInfo').removeClass('hidden');
					invoiceDateInfo=0;
				}
				
				if(chargeInfo==1)
				{
					$('#charge_applicable').val(0);
					$('#totalCharge').addClass('hidden');
					chargeInfo=0;
				}
				
				if(halfDayOpen==1)
				{
					$('#half_day_booking_available').val(0);
					$('#halfDayBooking').addClass('hidden');
					$("#pre_lunch_price").val(0);
					$("#post_lunch_price").val(0);
					halfDayOpen=0;
				}
				if(reservationFeeApp==1)
				{
					$('#reservation_fee_applicable').val(0);
					$('#reservationFee').addClass('hidden');
					$("#reservation_deposit").val(0);
					reservationFeeApp=0;
				}
				
				if(cleaningFeeApp==1)
				{
					$('#cleaning_fee_applicable').val(0);
					$('#cleaningFee').addClass('hidden');
					$("#cleaning_fee").val(0);
					cleaningFeeApp=0;
				}
				
				if(hourlyFeeApp==1)
				{
					$('#hourly_booking_available').val(0);
					$('#hourlyPrice').addClass('hidden');
					$("#hourly_price").val(0);
					hourlyFeeApp=0;
				}
				
				
				if(fulldayFeeUpdate==1)
				{
					$('#full_day_booking_available').val(0);
					$('#fullDay').addClass('hidden');
					$("#full_day_price").val(0);
					fulldayFeeUpdate=0;
				}
				if(updateDepositFee==1)
				{
					$('#deposit_fee_applicable').val(0);
					$('#depositFee').addClass('hidden');
					updateDepositFee=0;
				}
				if(remainingPayment==1)
				{
					var send_data={};
						send_data.id=1;
						 $.ajax({
						type:"POST",
						url:"../../getEmiInfo",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
						$('#emiData').removeClass('hidden');	
						$('#emiData').html(data1);
						}
						});	
					$('#total_emis').val(1);
					
					$('#fullPayment').removeClass('hidden');
					$('#remaining_fee_paid_in_full').val(0);
					$('#emiData').removeClass('hidden');
					remainingPayment=0;
				}
				if(otherRoomStatus==1)
				{
					 
						var send_data={};
						send_data.id=otherRoomId;
						send_data.aid=apartmentId;
						send_data.updateInfo=0;
						 $.ajax({
						type:"POST",
						url:"../../../../updateOtherRoomInfo",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
						}
						});	
					 
					otherRoomStatus=0;
				}
				
				if(otherRoomUserStatus==1)
				{
					 
						var send_data={};
						send_data.id=otherRoomId;
						send_data.aid=apartmentId;
						send_data.updateInfo=0;
						 $.ajax({
						type:"POST",
						url:"../updateOtherRoomInfo",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
						}
						});	
					 
					otherRoomUserStatus=0;
				}
				
				if(updateAvailable==1)
				{
						var send_data={};
						send_data.gid=getStartedId;
						send_data.updateInfo=0;
						 $.ajax({
						type:"POST",
						url:"../updateAvailableGetstarted",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							$('#discriptionPhoto').addClass('hidden');
							$('#photoDisplay').addClass('hidden');
						} 
						});	
					 
					updateAvailable=0;
				}
				
				if(keyValue==1)
				{
					$('#key_available').val(0);
					$('#keyInfo').addClass('hidden');
					keyValue=0;
				}
				
				if(serviceCategoryAvailable==1)
				{
						var send_data={};
						send_data.updateInfo=0;
						send_data.company_id=company_id;
						send_data.service_id=service_id;
						send_data.categ_id=categ_id;
						 $.ajax({
						type:"POST",
						url:"../../../updateAvailableServiceCategory",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							$('#todoInfo').addClass('hidden');
							$('#amenities_info').html('');
							 
						} 
						});	
					 
					serviceCategoryAvailable=0;
				}
				
				
				if(apartmentAvailable==1)
				{
					$('#apartment_available').val(0);
					$('#AlreadyAdded').addClass('hidden');
					$('#NotAdded').removeClass('hidden');
					apartmentAvailable=0;
				}
				
				if(picVisible==1)
				{
					$('#is_visible').val(2);
					$('#visibleTrue').removeClass('hidden');
					$('#name_visible').val(2);
					$('#idnumber_visible').val(2);
					$('#issue_date_visible').val(2);
					$('#expiry_date_visible').val(2);
					picVisible=0; 
				}
				if(ssnAvailable==1)
				{
					$('#isAvailable').addClass('hidden');
					$('#is_ssn_available').val(0);
					ssnAvailable=0; 
				}
				
				if(entry_type==1)
				{
					$('#entry_code').val(''); 
					$('#entry').addClass('hidden');
					$('#entry_type').val(0);
					entry_type=0; 
				}
				
				if(amenitiesUpdate==1)
				{
					$('#amenities_available').val(0);
					amenitiesUpdate=0; 
				}
				
				if(depositUpdate==1)
				{
					
					$('#deposit_required').val(0);
					$('#deposit_amount').val(0);
					$('#deposit_payment_date').val('');
					$('#depositInfo').addClass('hidden');
					depositUpdate=0; 
				}
				if(vatUpdate==1)
				{
					$('#vat_applicable').val(0);
					$('#total_vat').val(0);
					$('#VatInfo').addClass('hidden');
					vatUpdate=0; 
				}
				
				
				if(updateLicenceValue==1)
				{
					$('#licence'+licenceValue).val(0);
					updateLicenceValue=0; 
				}
				
				if(parkingTax==1)
				{
					$('#parking_tax_applicable').val(0);
					$('#parking_payment_tax').val(0);
					$('#prTaxInfo').addClass('hidden');
					parkingTax=0; 
				}
				
				if(apartmentTax==1)
				{
					$('#apartment_tax_applicable').val(0);
					$('#apartment_payment_tax').val(0);
					$('#apTaxInfo').addClass('hidden');
					apartmentTax=0; 
				}
				if(tenantUpdate==1)
				{
					$('#tenant_available').val(0);
					tenantUpdate=0; 
				}
				
				if(priceUpdate==1)
				{
					$('#pricing_available').val(0);
					$('#InvoiceInfo').addClass('hidden');
					$('#invoice_available').val(0);
					priceUpdate=0; 
				}
				
				if(invoiceUpdate==1)
				{
					$('#invoice_available').val(0);
					invoiceUpdate=0; 
				}
				
				if(elevatorUpdate==1)
				{
					$('#elevator'+id).val(0);
					elevatorUpdate=0; 
				}
				
				if(elevatorValueUpdate==1)
				{
					$('#elevator_'+id).val(0);
					elevatorValueUpdate=0; 
				}
				if(basementUpdate==1)
				{
					$('#basement_available').val(0);
					basementUpdate=0; 
				}
				
				if(penthouseUpdate==1)
				{
					$('#penthouse_available').val(0);
					penthouseUpdate=0; 
				}
				
				if(garageUpdate==1)
				{
					$('#garage_available').val(0);
					garageUpdate=0; 
				}
				
				if(wifi_available==1)
				{
					$('#wifi_username').val(''); 
					$('#wifi_password').val(''); 
					$('#wifi_info').addClass('hidden');
					$('#wifi_available').val(0);
					wifi_available=0; 
				}
				if(sameAddressAsUser==1)
				{
					$('#sameAddress').removeClass('hidden');
					$('#is_address_same').val(0);
					sameAddressAsUser=0; 
				}
				if(nameVisible==1)
				{
					$('#name_visible').val(2);
					nameVisible=0; 
				}
				if(idnumberVisible==1)
				{
					$('#idnumber_visible').val(2);
					idnumberVisible=0; 
				}
				
				if(issueDateVisible==1)
				{
					$('#issue_date_visible').val(2);
					issueDateVisible=0; 
				}
				if(expiryDateVisible==1)
				{
					$('#expiry_date_visible').val(2);
					expiryDateVisible=0; 
				}
				
				if(customerPlace==1)
				{
				$('#event_at_customer_place').val(0);
				$('#customerPlaceTour').addClass('hidden');
				$('#tour_fee_applicable').val(0);
				$('#tourFee').addClass('hidden');
				customerPlace=0;	
				}
				if(customerPlaceTourFee==1)
				{
				$('#tour_fee_applicable').val(0);
				$('#tourFee').addClass('hidden');
				$('#more_event_on_request').val(0);
				$('#moreEvents').addClass('hidden');
				$('#more_event_extra_fee').val(0);
				$('#extraFee').addClass('hidden');
				$('#extraFeeChe').removeClass('checked'); 
				customerPlaceTourFee=0;		
				}
				
				if(moreEventOnRequest==1)
				{
				$('#more_event_on_request').val(0);
				$('#moreEvents').addClass('hidden');
				$('#more_event_extra_fee').val(0);
				$('#extraFee').addClass('hidden');
				$('#extraFeeChe').removeClass('checked'); 
				moreEventOnRequest=0;		
				}
				
				if(moreEventOnRequestExtraFee==1)
				{
				$('#more_event_extra_fee').val(0);
				$('#extraFee').addClass('hidden');
				moreEventOnRequestExtraFee=0;		
				}
				
				
				
				if(workEmp==1)
				{
					
					$('#lunch_time_'+dayValueId).val(0);
				   $('#working_day_'+dayValueId).val(0);
				   $("#day_"+dayValueId).addClass('hidden');
				   $("#lunchTimeInfo_"+dayValueId).addClass('hidden');
				   $('#work_start_time_'+dayValueId).val(1);
				   $('#work_end_time_'+dayValueId).val(1);
				   $('#lunch_start_time_'+dayValueId).val(1);
				   $('#lunch_end_time_'+dayValueId).val(1);
				   $('.week_'+dayValueId).removeClass('checked');
				   $("#lunch_"+dayValueId).addClass('hidden');
				   workEmp=0;
				}
				
				if(lunchTime==1)
				{
					$('#lunch_time_'+dayValueId).val(0);
					$('#lunch_start_time_'+dayValueId).val(1);
				   $('#lunch_end_time_'+dayValueId).val(1);
				   $('.week_'+dayValueId).removeClass('checked');
				   $("#lunch_"+dayValueId).addClass('hidden');
				   lunchTime=0;
				}
				if(invoiceShow==1)
				{
					$('#same_invoice').val(0);
					$("#ShowInvoice").removeClass('hidden');
				invoiceShow=0;
				}
				if(invoiceShowc==1)
				{
					$('#same_invoicec').val(0);
					$("#ShowInvoicec").removeClass('hidden');
				invoiceShowc=0;
				}
				if(verifyEmailYes==1)
				{
					$('#verify_email').val(0);
					verifyEmailYes=0;
				}
				
				if(verifyPhoneYes==1)
				{
					$('#verify_phone_detail').val(0);
					verifyPhoneYes=0;
				}
				if(companypickupYes==1)
				{
					$('#company_pickup_info').val(0);
					companypickupYes=0;
				}
				
				if(companydigitalYes==1)
				{
					$('#company_digital_delivery').val(0);
					companydigitalYes=0;
				}
				if(companyinvoiceYes==1)
				{
					$('#company_invoice_address').val(0);
					companyinvoiceYes=0;
				}
				if(companyEmailYes==1)
				{
					$('#company_email').val(0);
					companyEmailYes=0;
				}
				if(pickupYes==1)
				{
					$('#pickup_info').val(0);
					pickupYes=0;
				}
				
				if(digitalYes==1)
				{
					$('#digital_delivery').val(0);
					digitalYes=0;
				}
				if(invoiceYes==1)
				{
					$('#invoice_address').val(0);
					invoiceYes=0;
				}
				
				if(deliveryYes==1)
				{
					$('#delivery_address').val(0);
					deliveryYes=0;
				}
				
				if(cardYes==1)
				{
					$('#card_detail').val(0);
					cardYes=0;
				}
				
				if(identifyYes==1)
				{
					$('#identificator_info').val(0);
					identifyYes=0;
				}
				
				if(phoneYes==1)
				{
					$('#phone_detail').val(0);
					$('#ifVerifyPhone').addClass('hidden');
					phoneYes=0;
				}
				
				if(nameInfoUpdate==1)
				{
					$('#same_name').val(0);
					$("#nameInfo").removeClass('hidden');
					nameInfoUpdate=0;
				}
				$('#food_'+foodValue).addClass('hidden');
				$('#food'+foodValue).val(0); 
				$('#day_'+dayValue).addClass('hidden');
				$('#day'+dayValue).val(0);  
				$('#feeDetail'+dayValue).val(0); 
				$('#cate_'+menuCategory).addClass('hidden');
				$('#serve'+menuCategory).val(0); 
				$('#menu_'+menuDish).addClass('hidden');
				$('#categ'+menuDish).val(0); 
				$('#broadcast_type').val(0); 
				if(bookingYOurself==1)
				{
				$('#book_for_yourself').val(0);
				bookingYOurself=0;
				}
				if(bookingDeletion==1)
				{
				$('#delete_of_ongoing_booking').val(0);
					bookingDeletion=0;				
				}
				if(bookableCategory==1)
				{
				$('#is_bookable').val(0);
				$('#bookableSevice').addClass('hidden');
				$('#bookable_service_category_id').val(1);
					bookableCategory=0;				
				}
				
				if(pickaproListingInfo==1)
				{
					var subcatg='<option value="0" class="lgtgrey2_bg">Select</option>';
				$('#pickapro_listing').val(0);
				$('#pickaproSevice').addClass('hidden');
				$('#category_id').val(0);
				$('#subcategory_id').html(subcatg);
					pickaproListingInfo=0;			
				}
				if(variationRequired==1)
				{
				$('#variation_type').val(0); 
				$('#moreValues').addClass('hidden');
				$('#row1').addClass('hidden');
				$('#row2').addClass('hidden');
				$('#row3').addClass('hidden');
				$('#sub2').html('');
				$('#sub3').html('');
				$('#variation_count').val(0);
				variationRequired=0;
				}
				
				if(moreBookingOnRequest==1)
				{
				$('#more_booking_on_request').val(0);
				$('#ExtraEventOnRequest').addClass('hidden');
				$('#max_booking_on_request').val(1);
				$('#extra_fee_booking_on_request').val(0);
					moreBookingOnRequest=0;				
				}
				if(recurrEvent==1)
				{
				$('#recurring_event').val(0);
				$('#isRecurringEvent').addClass('hidden');
				$('#notRecurringEvent').removeClass('hidden');
				recurrEvent=0;				
				}
				
				if(taxInfo==1)
				{
				$('#tax_included').val(0);
				$('#tax_amount').val(0);
				$('#taxInfo').removeClass('hidden');
				taxInfo=0;				
				}
				
				$('#b_channels').addClass('hidden');
				$('#type'+cuisine).val(0);
				
				if(smoke==1)
				{
				$('#smoking').val(0);
				smoke=0;
				}
				if(tattoo==1)
				{
				$('#user_body_tattoo').val(0);
				tattoo=0;
				}
				if(drink==1)
				{
				$('#drinking').val(0);
				drink=0;
				}
				if(tobbacoo==1)
				{
				$('#tobbacoo').val(0);
				tobbacoo=0;
				}
				if(children==1)
				{
				$('#children').val(2);
				$('#childDetails').attr('style','display:none');
				$('#moreChild').html('');
				children=0;
				}
				
				if(weight==1)
				{
				$('#weight_important').val(0);
				$('#weight_preffer').addClass('hidden');
				 weight=0;
				}
				
				if(height==1)
				{
				$('#height_important').val(0);
				$('#height_prefer').addClass('hidden');
				 height=0;
				}
				
				
				if(renameP==1)
				{
				$('#rename_products').val(0);
				$('#renameProduct').attr('style','display:none;');
				  renameP=0;
				}
				
				if(showP==1)
				{
				$('#show_products').val(0);
				$('#productDetails').attr('style','display:none;');
				$('#moreProduct').html('');
				  showP=0;
				}
				
				
				if(renameHe==1)
				{
				$('#rename_help').val(0);
				$('#renamehelp').attr('style','display:none;');
				  renameHe=0;
				}
				
				if(showHe==1)
				{
				$('#show_help').val(0);
				$('#helpDetails').attr('style','display:none;');
				$('#morehelp').html('');
				  showHe=0;
				}
				
				if(renameRe==1)
				{
				$('#rename_resources').val(0);
				$('#renameresource').attr('style','display:none;');
				  renameRe=0;
				}
				
				if(showRe==1)
				{
				$('#show_resources').val(0);
				$('#resourceDetails').attr('style','display:none;');
				$('#moreresorce').html('');
				  showRe=0;
				}
				
				if(showPr==1)
				{
				$('#show_privacy').val(0);
				$('#privacyDetails').attr('style','display:none;');
				  showPr=0;
				}
				
				if(showSec==1)
				{
				$('#show_security').val(0);
				$('#securityDetails').attr('style','display:none;');
				  showSec=0;
				}
				if(showEn==1)
				{
				$('#show_environment').val(0);
				$('#environmentDetails').attr('style','display:none;');
				  showEn=0;
				}
				if(showLogo==1)
				{
				$('#show_company_logo').val(0);
				 
				  showLogo=0;
				}
				if(showTxt==1)
				{
				$('#show_company_subtext').val(0);
				$('#subText').attr('style','display:none;');
				 
				  showTxt=0;
				}
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
	
	// TinyMCE
	if (typeof(tinyMCE) != 'undefined'){
		var tinyMCE_options = {
			selector: 'textarea.mce-editor',
			setup: function (editor) {
	            editor.on('change', function () {
	            	this.save();
	        	});
	       	},
			plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
			toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
			menubar: false,
			toolbar_items_size: 'small',
			style_formats: [{title:"Bold text",inline:"b"},{title:"Red text",inline:"span",styles:{color:"#ff0000"}},{title:"Red header",block:"h1",styles:{color:"#ff0000"}},{title:"Example 1",inline:"span",classes:"example1"},{title:"Example 2",inline:"span",classes:"example2"},{title:"Table styles"},{title:"Table row 1",selector:"tr",classes:"tablerow1"}],
			templates: [{title: 'Test template 1',content: 'Test 1'},{title: 'Test template 2',content: 'Test 2'}]
		}
		tinyMCE.init(tinyMCE_options);
	}
	
	// TABS
	
	// jQuery ui tabs
	if($.fn.tabs){
		
		// - default
		$('.prdt_tabs').tabs();
	}
	
	function test($el, l2){
		var $dis = $('#dis'),
			val = $dis.val();
		if(l2){
			val += '\n\t\t\t\t\t},{';
			val += '\n\t\t\t\t\t\t\'label\': \'' + $el.attr('value') + '\',';
			val += '\n\t\t\t\t\t\t\'value\': \'' + $el.text().trim() + '\',';
			val += '\n\t\t\t\t\t\t\'choices-sublabel\': \'Position:\',';
			val += '\n\t\t\t\t\t\tchoices: [{';
			val += '\n\t\t\t\t\t\t\t\'label\': \'--Select--\',';
			val += '\n\t\t\t\t\t\t\t\'value\': \'\',';
			val += '\n\t\t\t\t\t\t},{';
			val += '\n\t\t\t\t\t\t\t\'label\': \'\',';
			val += '\n\t\t\t\t\t\t\t\'value\': \'\',';
			val += '\n\t\t\t\t\t\t}]';
		}
		else{
			val += '\n\t\t\t\t\t\t},{';
			val += '\n\t\t\t\t\t\t\t\'label\': \'' + $el.attr('value') + '\',';
			val += '\n\t\t\t\t\t\t\t\'value\': \'' + $el.text().trim() + '\',';
		}
		$dis.val(val);
	}
	
	// tab header with links
	$body.on('click', '.tab-header a', function(){
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
			
			if($this.data('extra')){
				var $extra = $($this.data('extra')),
					$extra_sibl = $extra.siblings('.active');
				
				$extra_sibl.removeClass('active');
				$extra.addClass('active');
			}
			
			return false;
		}
	});
	$('.tab-header a.active').trigger('click');
	
	// tabs header with select
	$body.on('change', 'select.tab-header', function(){
		var $tab = $('#' + $(this).val());
		$tab.siblings('.active')
			.removeClass('active')
			.hide();
		$tab
			.addClass('active')
			.show();
		return false;
	});
	$('select.tab-header').trigger('change');
	
	// tabs header with detached select
	$body.on('change', 'select.tab-detached-header', function(){
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
					.appendTo($container);
			}
		}
		
		return false;
	});
	$('select.tab-detached-header').trigger('change');
	
	// tabs header with radio
	$body.on('change', '.tab-header input[type="radio"]', function(){
		if(this.checked){
			var $tab = $('#' + this.value);
			$tab.siblings('.active')
				.removeClass('active')
				.hide();
			$tab
				.addClass('active')
				.show();
		}
	});
	$('.tab-header input[type="radio"]').trigger('change');
	
	
	
	// POPUPS
	
	// Show wpdev modal
	$body.on('click', '.show_wpmod', function(){
		var $this = $(this),
			$target = $($this.data('modal'));
		
		if($target[0]){
			$target.data('caller', $this);
			wp_fade('show', $target);
		}
		
		return false;
	});
	
	// Popup modal
	var $popup_fade = $('#popup_fade');
	$body
		.on('click', '.show_popup_modal', function(){
			var $this = $(this),
				$target = $this.data('$target');
			
			if(!$target || !$target[0]){
				$target = $($this.data('target'));
			}
			if($target[0]){
				$('.show_popup_modal').removeClass('active');
				$this.addClass('active');
				
				show_popup_modal('show', $target, $popup_fade, $body);
			}
			return false;
		})
		.on('click', '.close_popup_modal', function(){
			var $this = $(this),
				$target = $this.data('$target');
			
			if($this.data('target')){
				if(!$target || !$target[0]){
					$target = $($this.data('target'));
				}
			}
			else{
				$target = $this.closest('.popup_modal');
			}
			show_popup_modal('hide', $target, $popup_fade, $body);
			return false;
		});
	
	
	// Sliding modal
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
	
	
	
	// APPLY ANIMATION
	var $applY_animation = $('.apply-animation');
	if($applY_animation[0]){
		
		// slide In Down
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
	
	
	
	// SLICK SLIDER
	/*
		data-slick-settings [prop:val,] = a list of default Object-like pair of settings
		data-slick-md-settings [prop:val,] = settings for medium screen resultion
		data-slick-sm-settings [prop:val,] = settings for small screen resultion
		data-slick-xs-settings [prop:val,] = settings for extra small screen resultion
		data-slick-xxs-settings [prop:val,] = settings for extra-extra small screen resultion
	*/
	if($.fn.slick){
		$('.slick-slider').each(function(){
			var $this = $(this),
				settings = {};
			
			var def_settings = $this.data('slick-settings') ? $this.data('slick-settings').split(',') : false;
			if(def_settings){
				for(var i = 0, iL = def_settings.length; i < iL; i++){
					var split = def_settings[i].split(':');
					if(split.length > 1){
						var opt = split[1].trim();
						if(opt === 'true'){ opt = true; }
						else if(opt === 'false'){ opt = false; }
						else{
							var opt2 = parseInt(opt);
							if(!isNaN(opt2)){
								opt = opt2;
							}
						}
						settings[split[0].trim()] = opt;
					}
				}
			}
			
			if($this.data('slick-md-settings')){
				var md_settings = $this.data('slick-md-settings') ? $this.data('slick-md-settings').split(',') : false;
				if(md_settings){
					if(!settings['responsive']){ settings['responsive'] = []; }
					var resp = settings['responsive'],
						md_set = {'breakpoint' : 1200, 'settings' : {}};
					for(var i = 0, iL = md_settings.length; i < iL; i++){
						var split = md_settings[i].split(':');
						if(split.length > 1){
							var opt = split[1].trim();
							if(opt === 'true'){ opt = true; }
							else if(opt === 'false'){ opt = false; }
							else{
								var opt2 = parseInt(opt);
								if(!isNaN(opt2)){
									opt = opt2;
								}
							}
							md_set['settings'][split[0].trim()] = opt;
						}
					}
					resp[resp.length] = md_set;
				}
			}
			if($this.data('slick-sm-settings')){
				var sm_settings = $this.data('slick-sm-settings') ? $this.data('slick-sm-settings').split(',') : false;
				if(sm_settings){
					if(!settings['responsive']){ settings['responsive'] = []; }
					var resp = settings['responsive'],
						sm_set = {'breakpoint' : 992, 'settings' : {}};
					for(var i = 0, iL = sm_settings.length; i < iL; i++){
						var split = sm_settings[i].split(':');
						if(split.length > 1){
							var opt = split[1].trim();
							if(opt === 'true'){ opt = true; }
							else if(opt === 'false'){ opt = false; }
							else{
								var opt2 = parseInt(opt);
								if(!isNaN(opt2)){
									opt = opt2;
								}
							}
							sm_set['settings'][split[0].trim()] = opt;
						}
					}
					resp[resp.length] = sm_set;
				}
			}
			if($this.data('slick-xs-settings')){
				var xs_settings = $this.data('slick-xs-settings') ? $this.data('slick-xs-settings').split(',') : false;
				if(xs_settings){
					if(!settings['responsive']){ settings['responsive'] = []; }
					var resp = settings['responsive'],
						xs_set = {'breakpoint' : 768, 'settings' : {}};
					for(var i = 0, iL = xs_settings.length; i < iL; i++){
						var split = xs_settings[i].split(':');
						if(split.length > 1){
							var opt = split[1].trim();
							if(opt === 'true'){ opt = true; }
							else if(opt === 'false'){ opt = false; }
							else{
								var opt2 = parseInt(opt);
								if(!isNaN(opt2)){
									opt = opt2;
								}
							}
							xs_set['settings'][split[0].trim()] = opt;
						}
					}
					resp[resp.length] = xs_set;
				}
			}
			if($this.data('slick-xxs-settings')){
				var xxs_settings = $this.data('slick-xxs-settings') ? $this.data('slick-xxs-settings').split(',') : false;
				if(xxs_settings){
					if(!settings['responsive']){ settings['responsive'] = []; }
					var resp = settings['responsive'],
						xxs_set = {'breakpoint' : 540, 'settings' : {}};
					for(var i = 0, iL = xxs_settings.length; i < iL; i++){
						var split = xxs_settings[i].split(':');
						if(split.length > 1){
							var opt = split[1].trim();
							if(opt === 'true'){ opt = true; }
							else if(opt === 'false'){ opt = false; }
							else{
								var opt2 = parseInt(opt);
								if(!isNaN(opt2)){
									opt = opt2;
								}
							}
							xxs_set['settings'][split[0].trim()] = opt;
						}
					}
					resp[resp.length] = xxs_set;
				}
			}
			
			$this.slick(settings);
		});
	}
	
	
	
	// CONTENT TOGGLER
	/*
		data-parent [css selector] = parent selector for all blocks
		data-current [css selector] = current shown content
		data-target [css selector] = target selector
	*/
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
	
	
	
	// CLASS TOGGLER
	/*
		data-closest [css selector] = closest target to start search from
		data-target [css selector] = target selector (becomes data-closest is not present)
		data-classes [string] = space separated list of classes to toggle
		data-type [string] = classes toggle type
			- separate = each class is toggled separately (default)
	*/
	$body.on('click', '.class-toggler', function(){
		var $this = $(this),
			classes = $this.data('classes'),
			type = $this.data('toggle-type'),
			$target = $this.data('$target'),
			remove = $this.data('remove'),
			$remove = [];
		
		if(!$target){
			var closest = $this.data('closest'),
				target = $this.data('target');
			
			if(target === 'parent'){
				$target = $this.parent();
			}
			else{
				if(closest){
					var $closest = $this.closest(closest);
					$target = target ? $closest.find(target) : $closest;
				}
				else{
					$target = target ? $(target) : $this;
				}
			}
			
			$this.data('$target', $target);
		}
		
		if(remove){
			$remove = $this.data('$remove');
			if(!$remove){
				var rem_closest = $this.data('remove-closest');
				
				if(rem_closest){
					var $rem_closest = $this.closest(rem_closest);
					$remove = remove ? $rem_closest.find(remove) : $rem_closest;
				}
				else{
					$remove = remove ? $(remove) : $this;
				}
				$this.data('$remove', $remove);
			}
		}
		
		if($target[0]){
			if(classes){
				classes = classes.split(' ');
				for(var t = 0, tL = $target.length; t < tL; t++){
					var $t = $target.eq(t);
					for(var i = 0, iL = classes.length; i < iL; i++){
						if($t.hasClass(classes[i])){
							$t.removeClass(classes[i]);
						}
						else{
							$t.addClass(classes[i]);
						}
					}
				}
			}
		}
		
		if($remove[0] && classes){
			$remove.removeClass(classes);
		}
		
		
		return false;
	});
	
	
	
	// CLASS SETTER
	/*
		set class on target, removes class on others
		data-closest [css selector] = closest target to start search from
		data-target [css selector] = target selector
		data-classes [string] = space separated list of classes to add/remove
	*/
	$body.on('click', '.class-setter', function(){
		var $this = $(this),
			$target = $this.data('$target');
		
		if(!$target){
			var target = $this.data('target'); 
			$target = target ? $(target) : $this;
			$this.data('$target', $target);
		}
		
		if($target[0]){
			var closest = $this.data('closest'),
				classes = $this.data('classes');
				
			if(classes){
				var $base = [];
				
				if(closest){
					$base = $target.closest(closest);
				}
				
				if($base[0]){
					var split = classes.split(' ');
					for(var i = 0, iL = split.length; i < iL; i++){
						$base.find('.' + split[i]).removeClass(split[i]);
					}
				}
				
				$target.addClass(classes);
			}
		}
		
		return false;
	});
	
	
	
	// REMOTE TRIGGER
	/*
		data-base [css selector] = base selector to start search from
		data-target [css selector] = target selector
		data-action [string(click)] = required action (click is default)
	*/
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
	
	
	// CHAINED EVENT TRIGGER
	$body.on('click', '.chained-trigger', function(){
		var $this = $(this),
			$targets = $this.data('$targets'),
			delay = $this.data('delay') ? parseInt($this.data('delay')) : 0;
		
		if(!$targets){
			var base = $this.data('base'),
				actions = $this.data('actions') ? $this.data('actions').split(',') : ['click'];
			
			
			if(base){
				var $base = $this.closest(base);
				if($base[0]){
					$targets = $base.find($this.data('targets'));
				}
			}
			else{
				$targets = $this.parent().find($this.data('targets'));
			}
			for(var i = 0, iL = $targets.length; i < iL; i++){
				$targets.eq(i).data('action', actions[i] ? actions[i] : actions[0]);
			}
			$this.data('$targets', $targets);
		}
		
		if($targets[0]){
			var execute_actions = function($target){
				$target.trigger($target.data('action'));
			}
			
			if(delay > 0){
				var delay_compute = 0;
				for(var i = 0, iL = $targets.length; i < iL; i++){
					setTimeout(function(){ 
						execute_actions($targets.eq(i)); 
						delay_compute += delay;
					}, delay_compute);
				}
			}
			else{
				$targets.each(function(){
					execute_actions($(this));
				});
			}
		}
		return false;
	});
	
	
	// REMOVE CLOSEST
	/*
		data-target [css selector] = target selector
	*/
	$body.on('click', '.remove_closest', function(){
		var $this = $(this);
		$this.closest($this.data('target')).remove();
		return false;
	});
	
	
	
	// REPLACE CONTENT
	/*
		data-base [css selector] = base selector to start search from
		data-target [css selector] = target selector
		data-source [string] = javascript object source, this value will be the key
	*/
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
	
	
	
	// INSERT CONTENT
	/*
		data-base [css selector] = base selector to start search from
		data-target [css selector] = target selector
		data-source [string] = javascript object source, this value will be the key
		data-level [int] = insertion level
		data-increment [int] = increment variable
	*/
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
	
	
	
	// SUPERFISH
	if($.fn.superfish){
		$('ul.sf-menu').superfish();
	}
	
	
	// Accordion
	if($.fn.accordion){
		$('#accordion').accordion({
			heightStyle: 'content'
		});
	}
	
	
});

$(document).ready(function() {
	var $html_body = $('html, body'),
		$window = $(window),
		$body = $(document.body)
	
	
	// is VEX present
	try{
		var isVex = true;
		vex.defaultOptions.className = 'vex-theme-default';
	}
	catch(e){ var isVex = false; }
	
	
	
	// Add to list
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
	
	
	
	// Google map Autocomplete
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
	
	
	
	// Editable
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
	
	
	
	// Expanding input
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
	
	

	// Populate me
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
	
	
	
	// Toggle button
	$body.on('click', '.toggle-btn', function(){
		var $this = $(this),
			id = $this.data('toggle-id'),
			$target = [];
		
		if(id == 'base'){
			$target = $this.closest('.base').find('.toggle_content');
		}
		else{
			$target = $this.data('toggle-ids') ? $($this.data('toggle-ids')) : $('#' + $this.data('toggle-id'));
		}
		
		if($target[0]){
			$target.each(function(){
				var $ctar = $(this);
				if($ctar.is(":visible")){
					$this
						.removeClass('active');
					
					$ctar
						.stop()
						.slideUp();
				}
				else{
					$this
						.addClass('active');
						
					$ctar
						.stop()
						.slideDown();
				}
			});
		}
		return false;
	});
	
	
	
	// Expander
	$body.on('click', '.expander-toggler', function(){
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
				$this.removeClass('active');
				clearTimeout($target.data('tm'));
					
				$target
					.stop()
					.slideUp(300);
			}
			else{
				$this.addClass('active');
					
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
	
	
	
	// Wpdev columns
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
					else{
						$link
							.attr(link_params)
							.appendTo($li);
					}
				}
				
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
			
			if($menu.has('li')[0]){
				$scroll_menu.append($menu);
			}
		}
			
			
		$scroll_menu.on('click', 'a', function(){
			var $this = $(this),
				did = $this.attr('data-id');
				
			if($window.width() <= 991 && $this.closest('.mobile-menu')[0]){
				$this.closest('.scroll-fix-wrap').addClass('hidden-xs hidden-sm');
			}
				
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
	}
	
	
	// Scroll menu (v2)
	$body
		.on('selectmenuopen', '.jui-select.selectmenu-scroll-to', function(event, ui){
			$(this).data('opened', true);
		})
		.on('selectmenuclose', '.jui-select.selectmenu-scroll-to', function(event, ui){
			$(this).data('opened', false);
		})
		.on('selectmenuselect', '.jui-select.selectmenu-scroll-to', function(event, ui){
			var $this = $(this),
				$target = $(ui.item.value);
			if($this.data('opened') === true && $target[0]){
				var top_offset = 0;
				
				// add offset from elements
				var offset_exclude = $this.data('offset-exclude');
				if(offset_exclude){
					var $offset_exclude = $this.data('$offset_exclude');
					if(!$offset_exclude){
						$offset_exclude = $(offset_exclude);
					}
					if($offset_exclude[0]){
						top_offset += $offset_exclude.height();
					}
				}
				
				// add flat offset
				var offset_flat = $this.data('offset');
				if(offset_flat){
					top_offset += parseInt(offset_flat);
				}
				
				$this.data('persist', true);
				$html_body.animate({
					scrollTop: $target.offset().top - top_offset
				}, 500, function(){
					requestAnimationFrame(function(){
						$this.data('persist', false);
					});
				});
			}
		});
	
	
	// Scroll detect
	var $scroll_detect = $('.jui-select.selectmenu-scroll-detect');
	if($scroll_detect[0]){
		
		var check_in_view = function($el){
			$sd = $el.data('$sd');
			$targets = $el.data('$targets');
			var min = 99999,
				$current = [];
			for(var t = 0, tL = $targets.length; t < tL; t++){
				var $target = $targets.eq(t);
				if($target.hasClass('in-view') && min > $target.data('top')){
					$current = $target;
					min = $target.data('top');
				}
			}
			
			if($current[0]){
				var current_id = '#' + $current.attr('id');
				if($sd.val() != current_id && $sd.data('persist') !== true){
					$sd
						.val(current_id)
						.selectmenu('refresh');
				}
			}
		}
		
		for(var s = 0, sL = $scroll_detect.length; s < sL; s++){
			var $sd = $scroll_detect.eq(s),
				$options = $sd.find('option'),
				selector = '';
			for(var o = 0, oL = $options.length; o < oL; o++){
				if(selector.length > 0){
					selector += ',';
				}
				selector += $options.eq(o).attr('value');
			}
			var $targets = $(selector);
			$targets
				.data({
					'$sd': $sd,
					'$targets': $targets
				})
				.each(function(){
					var $target = $(this);
					$target.data('top', $target.offset().top)
				});
			$sd.data('$targets', $targets);
			
			var top_offset = 0;
				
			// add offset from elements
			var offset_exclude = $sd.data('offset-exclude');
			if(offset_exclude){
				var $offset_exclude = $sd.data('$offset_exclude');
				if(!$offset_exclude){
					$offset_exclude = $(offset_exclude);
				}
				if($offset_exclude[0]){
					top_offset += $offset_exclude.height();
				}
			}
				
			// add flat offset
			var offset_flat = $sd.data('offset');
			if(offset_flat){
				top_offset += parseInt(offset_flat);
			}
			inView.offset({
				top: top_offset
			});
			inView(selector)
				.on('enter', function(el){
					var $el = $(el);
					$el.addClass('in-view');
					check_in_view($el);
				})
				.on('exit', function(el){
					var $el = $(el);
					$(el).removeClass('in-view');
					check_in_view($el);
				});
		}
	}
	
	
	// Sticky
	if($.fn.stick_in_parent){
		$('.sticky').stick_in_parent({
			parent: '#section-content',
			offset_top: 50,
			spacer: '.sticky_spacer'
		});
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
	
	
	// SCROLL TO ELEMENT
	$body.on('click', '.scroll-to', function(){
		var $this = $(this),
			$target = $this.data('$target'),
			offset = $this.data('offset') ? parseInt($this.data('offset')) : 0;
		
		if(!$target){
			$target = $($this.data('target')).first();
			$this.data('$target', $target);
		}
		
		if($target[0]){
			$html_body.animate({
				scrollTop: $target.offset().top - offset
			}, 1000);
		}
		return false;
	});


	
	// PERFORM ACTIONS BASED ON SEARCH PARAMS
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
				bd_methods.refresh_data_source();
			},
			
			// on select change event
			select_change : function($select){
				var select_val = $select.val(),
					select_src = $select.data('src'),
					$target = [];
					
				if($select.attr('id') == 'binded_select1'){
					$target = $binded_selects.filter('#binded_select2');
					$binded_selects.filter('#binded_select3').closest('.select-base').hide();
				}
				else if($select.attr('id') == 'binded_select2'){
					$target = $binded_selects.filter('#binded_select3');
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
			refresh_data_source : function(){
				var $roots = $binded_selects.filter('#binded_select1');
				
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
				console.log($crow);
				console.log($crow.find(title));
				console.log('***');
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
	
	
	
	
});


