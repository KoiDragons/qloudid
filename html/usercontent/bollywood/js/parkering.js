

$(function() {

var fileName='flipqard.php?v=1';
  var t ={	"Register your car" : {
				sv : "Registrera din bil",
				de : "Registrieren Sie Ihr Auto",
						},
			"Register" : {
				sv : "Registrera",
				de : "Registrieren",
						},
			"Register your car here for 3 hours of free parking. Enter your car registration number below to start your parking." : {	
				sv : 	"Registrera din bil här för 3 timmars fri parkering. Fyll i bilens registreringsnummer nedan för att starta din parkering.",
				de :	"Hier können Sie Ihr auto für 3 Stunden kostenlos parken. Geben Sie unten Ihr autokennzeichen ein, um mit dem parken zu beginnen.",
						},
			
			"Your cars registration number" : {	
				sv : "Din bils registreringsnummer",
				de : "Das kennzeichen Ihres autos",
						},
			
			"Next" : {	
				sv : "Nästa",
				de : "Nächste",
						},
						
						"Post and Parcels" : {
				sv : "Post och  Paket",
				de : "Briefe und Pakete",
						},
			
			"Register or pick up incoming post or parcels." : {	
				sv : 	"Registrera eller hämta ut inkommet brev och paket.  ",
				de :	"Registrieren Sie sich oder holen Sie eingehende Post oder Pakete ab.",
						},
			
			"Register post and parcels" : {	
				sv : "Registrera brev & paket",
				de : "Post und Pakete registrieren",
						},
			
			"Pick up post and parcels" : {	
				sv : "Hämta ut brev & paket",
				de : "Post und Pakete abholen",
						},
  };
 
 
 var _t = $('body').translate({lang: langVar, t: t});
  var str = _t.g("translate");

  $(".lang_selector").click(function(ev) {
    var lang = $(this).attr("data-value");
    _t.lang(lang);
	 
					var send_data={};
					send_data.lang=lang;
						$.ajax({
							type:"POST",
							url:"../changeLanguage",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								
							}
						});
    ev.preventDefault();
  });



});



    
    
