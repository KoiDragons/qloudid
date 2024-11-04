$(document).ready(function(){
	//Custom
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
	jQuery('ul.sf-menu ').superfish();
	
	// Input check
	$('input').iCheck({
		checkboxClass: 'icheckbox_minimal-aero',
		radioClass: 'iradio_minimal-aero',
		increaseArea: '20%' // optional
	});
	
	// Minicheck
	$('input.minicheck').iCheck({
		checkboxClass: 'icheckbox_futurico',
		radioClass: 'iradio_futurico',
		increaseArea: '20%' // optional
	});
	
	// Selectric
	$('select.selectric').selectric();
	
	// Slider
	$("#slider-range").slider({
		range: true,
		min: 0,
		max: 500,
		values: [75, 300],
		slide: function(event, ui) {
			$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
		}
	});
	
	// Amount
	$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
	
	// Datepicker calendar
	$(".datepicker").datepicker({
		showOn: "button",
		buttonImage: "images/calendar.png",
		buttonImageOnly: true
	});
	
	// Datepicker yellow
	$(".date_picker_bx").datepicker({
		showOn: "button",
		buttonImage: "images/yellow_date_ico.png",
		buttonImageOnly: true
	});
	
	// Tabs
	$(".prdt_tabs").tabs();
	
	// Accordion
	$("#accordion").accordion({
		heightStyle: "content"
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
	
	// Vex
	
		
	function myfunc(){
		if(coun==1)
	{
		var vex_content = $('#vex_modal_content').html();
	}
	else 
	{
		var vex_content ="";
	}
		alert(vex_content);
		vex.open({
			unsafeContent: vex_content,
			showCloseButton: true,
			escapeButtonCloses: true,
			overlayClosesOnClick: true,
			
		});
		return false;
	};
	
});




