

$(function() {

var fileName='flipqard.php?v=1';


  var t ={	
 
  "Log in using SMS code" : {
						sv : "Logga in med sms kod",
						de : "Loggen Sie sich mit SMS-Code ein",
						},
					"To access your colleagues FlipQard, you need to verify your identity by filling in the SMS code you just received to the number your account is registered." : {	
						sv : 	"För att komma åt dina kollegors FlipQard behöver du verifiera din identitet genom att fylla i SMS-koden du precis fått till det nummer ditt konto är registrerat. ",
						de :	"Um auf Flipqard Ihrer kollegen zugreifen zu können, müssen Sie Ihre identität überprüfen, indem Sie den SMS-Code eingeben, den Sie gerade für Ihre telefonnummer ",
						},
					"Enter SMS code" : {	
						sv : "Fyll i SMS kod",
						de : "Geben Sie den SMS-Code ein",
						},
					"Sign and log in" : {	
						sv : "Signera & Logga in",
						de : "Anmelden und einloggen",
						},
						"Fill in the recipients email address and click send" : {	
						sv : 	"Fyll i mottagarens e-postadress och klicka på skicka",
						
						de	:	"Geben Sie die E-Mail-Adresse des Empfängers ein und klicken Sie auf senden",
						},
						
					"Enter email address" : {	
						sv : 	"Fyll i e-postadress ",
						eng :	"Enter email address",
						de	:	"E-Mail-Adresse",
						},
						
					"Send" : {	
						sv : 	"Skicka",
						eng :	"Send",
						de	:	"Senden",
						},
						
					"Cancel" : {	
						sv : 	"Avbryt",
						eng :	"Cancel",
						de	:	"Stornieren",
						},
						"Go back" : {
						sv : "Gå tillbaka",
						de : "Geh zurück",
						},
					"View more" : {	
						sv : 	"Se mer",
						de :	"Mehr sehen",
						},	
						"Select country and enter the recipient's mobile number without the first zero and without the country code." : {
						sv : "Välj land och ange mottagarens  mobilnummer utan första nollan samt utan landskod.",
						de : "Wählen Sie das Land aus und geben Sie die Mobiltelefonnummer des Empfängers ohne die erste Null und ohne die Landesvorwahl ein.",
						},
					"Enter mobile number" : {	
						sv : 	"Fyll i mobilnummer",
						de :	"Handynummer eingeben",
						},
					"Share via SMS" : {
				sv : "Dela via SMS",
				de : "Per sms teilen",
				},
		
			"Share via Email" : {	
				sv : "Dela via Email",
				de : "per email teilen",
				},
		
			"Save to Flipbook" : {	
				sv : "Spara till Flipbook",
				de : "In Flipbook speichern",
				},
		
			"Flipbook directory" : {	
				sv : "Flipbook företag",
				de : "Flipbook-Unternehmen",
				},
				"Flip-Book Colleagues" : {	
				sv : "Flipbook-Kollegor",
				de : "Flip-Book Kollegen",
				},
  };
 
 
 var _t = $('body').translate({lang: langVar, t: t});
  var str = _t.g("translate");

  $(".lang_selector").click(function(ev) {
    var lang = $(this).attr("data-value");
    _t.lang(lang);
	//alert(lang);
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



    
    
