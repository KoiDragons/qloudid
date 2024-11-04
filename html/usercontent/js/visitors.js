

$(function() {

var fileName='flipqard.php?v=1';
  var t ={	"Oh no..." : {
						sv : "Åh nej...",
						de : "Oh nein..",
						},

					"The person you are looking for is not registered. Try a new name or contact the staff." : {	
						sv : 	"Personen du söker finns inte registrerad. Pröva nytt namn eller kontakta personalen.",
						de :	"Die gesuchte Person ist nicht registriert. Probieren Sie einen neuen namen oder wenden Sie sich an das personal.",
						},
						
					"Close" : {	
						sv : "Stäng",
						de : "Schließen",
						},	
						"Notify your arrival" : {
						sv : "Meddela din ankomst",
						de : "Benachrichtigen Sie Ihre ankunft",
						},
						"Notify" : {
						sv : "Meddela",
						de : "Benachrichtigen",
						},
					"Enter the name of the person to visit…" : {	
						sv : 	"Skriv namnet på den som du ska besöka…",
						de :	"Geben Sie den Namen der zu besuchenden Person ein…",
						},
					"Who will you meet?" : {	
						sv : "Vem ska du träffa? ",
						de : "Wen solltest du treffen?",
						},
					"Next" : {	
						sv : "Nästa",
						de : "Nächste",
						},
						"Fill in your details" : {
						sv : "Fyll i dina uppgifter",
						de : "Geben Sie Ihre daten ein",
						},
					
					"Fill in your details below or use express registration and sign with your FlipQard." : {	
						sv : "Fyll i dina uppgifter nedan eller använd express registrering och signera med ditt FlipQard. ",
						de : "Füllen Sie unten Ihre daten aus oder nutzen Sie die Express-Registrierung und unterschreiben Sie mit Ihrer FlipQard.",
						},
						
						"About you" : {
						sv : "Om dig",
						de : "Über dich",
						},
					
					"Fill in your details below or use Express login." : {	
						sv : "Fyll i dina uppgifter eller använd express login.",
						de : "Füllen Sie unten Ihre Daten aus oder verwenden Sie die Express-Anmeldung.",
						},
						
					"Send" : {	
						sv : "Skicka",
						de : "Senden",
						},
						" is notified" : {
						sv : "  är meddelad",
						de : "  wird angekündigt",
						},
						"Welcome to " : {	
						sv : 	"Varmt välkommen till  ",
						de :	"Willkommen bei ",
						},
					" You have received a sms with further information about your visit." : {	
						sv : 	" Du har fått ett sms med ytterligare information om ditt besök.",
						de :	" Sie haben eine SMS mit weiteren Informationen zu Ihrem Besuch erhalten.",
						},
					"Who will you meet?" : {	
						sv : "Vem ska du träffa? ",
						de : "Wen solltest du treffen?",
						},
					"Close" : {	
						sv : "Stäng",
						de : "Schließen",
						},
					"Name" : {
						sv : "Namn",
						de : "Name",
						},
					
					"Lastname" : {	
						sv : "Efternamn",
						de : "Frachtname",
						},
					
					"Company name" : {	
						sv : "Företagsnamn",
						de : "Firmenname",
						},
					
					"Your email" : {	
						sv : "Din e-postadress",
						de : "Ihre E-Mail-Adresse",
						},
					
					"Your mobile phone" : {	
						sv : "Ditt mobilnr",
						de : "Ihre Handynummer",
						},
						"Country" : {	
						sv : "Land",
						de : "Land",
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
							url:"../../changeLanguage",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								
							}
						});
    ev.preventDefault();
  });



});



    
    
