$("tr:odd" ).addClass("odd");
$("ul li:nth-child(3n)").addClass("third");
$("ul li:nth-child(4n)").addClass("fourth");
$("ul li:nth-child(5n)").addClass("fifth");
$("ul li:nth-child(6n)").addClass("sixth");
$("li:first-child").addClass("first");
$("li:last-child").addClass("last");

$(function() {
$( ".tooltip" ).tooltip({
track: true
});
});
$("li.click_slect_list").click(function(){
  $("li.click_slect_list").removeClass("selected");
  $(this).addClass("selected");
});
jQuery(document).ready(function(){
		jQuery('ul.sf-menu ').superfish();
});
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_minimal-aero',
    radioClass: 'iradio_minimal-aero',
    increaseArea: '20%' // optional
  });
});

$(document).ready(function(){
  $('input.minicheck').iCheck({
    checkboxClass: 'icheckbox_futurico',
    radioClass: 'iradio_futurico',
    increaseArea: '20%' // optional
  });
});

$(function(){
	$('select.selectric').selectric();
});
$(function() {
$( "#slider-range" ).slider({
range: true,
min: 0,
max: 500,
values: [ 75, 300 ],
slide: function( event, ui ) {
$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
}
});
$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
" - $" + $( "#slider-range" ).slider( "values", 1 ) );
});







$(function() {
$( "#datepicker" ).datepicker({
showOn: "button",
buttonImage: "images/calendar.png",
buttonImageOnly: true
});
});

$(function() {
$( ".datepicker" ).datepicker({
showOn: "button",
buttonImage: "images/calendar.png",
buttonImageOnly: true
});
});

$(function() {
$( ".date_picker_bx" ).datepicker({
showOn: "button",
buttonImage: "images/yellow_date_ico.png",
buttonImageOnly: true
});
});
$(function() {
$( ".prdt_tabs" ).tabs();
});
$(function() {
$( "#accordion" ).accordion({
heightStyle: "content"
});
});


$('.collapsible').hide();
$('.collapsible:first').show();
$('.collapsible_menu h3:first').addClass("active");
	$(".collapsible_menu > h3").click(function(){
		$(this).toggleClass("active");
		$(this).next(".collapsible").slideToggle(500);
		//$(this).siblings("li").removeClass("active");
});






