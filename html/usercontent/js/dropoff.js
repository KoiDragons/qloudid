

$(function() {

var fileName='flipqard.php?v=1';
  var t ={	"Welcome" : {
			sv : "Välkommen",
			de : "Willkommen",
			},
		
		"Please select an option…" : {	
			sv : 	"Vänligen välj ett alternativ...",
			de :	"Bitte wählen Sie eine option aus...",
			},
		
		"I want to check in my child" : {	
			sv : "Jag vill checka in mitt barn",
			de : "Ich werde Kinder verlassen",
			},
		
		"I want to pick up my child" : {	
			sv : "Jag vill hämta mitt barn",
			de : "Ich möchte mein Kind abholen",
			},	
			"Check-in a child" : {
			sv : "Checka in barn",
			de : "Kinder einchecken",
			},
			"Check-in" : {
			sv : "Checka in",
			de : "Einchecken",
			},
			"Select" : {
			sv : "Välj",
			de : "Auswählen",
			},
		"Sign in" : {	
			sv : "Signera",
			de : "Anmelden",
			},
		"Identify yourself with your social security number when you leave a child to daycare." : {	
			sv : 	"Identifiera dig med ditt personnummer när du lämnar ett barn till dagis.",
			de :	"Identifizieren Sie sich mit Ihrer Sozialversicherungsnummer, wenn Sie ein Kind dem Kindergarten überlassen.",
			},
			"Who will be registered?" : {
			sv : "Vem ska checkas in?",
			de : "Wer wird eingecheckt?",
			},
		
		"Select and check in the child you want to place in daycare today. Wait for verification from authorized personnel to complete the check-in process." : {	
			sv : 	"Markera och checka in det barn som du vill lämna på dagis idag. Invänta verifiering från behörig personal för att slutföra in incheckningen.",
			de :	"Wählen Sie das Kind aus, das Sie heute im Kindergarten lassen möchten, und geben Sie es ein. Warten Sie auf die Bestätigung durch autorisiertes Personal, um den Check-in abzuschließen.",
			},
			
			"Connected parents will receive a text message when staff confirm the attendance." : {	
			sv : 	"Anslutna föräldrar kommer få ett sms när personalen bekräftar närvaron.",
			de :	"Verbundene Eltern erhalten eine SMS, wenn das Personal die Teilnahme bestätigt.",
			},
		
		"The staff at Demo SafeQid thank you for registering and wish you a pleasant day." : {	
			sv : "Personalen på Demo SafeQid tackar för registeringen och önskar er en trevlig dag.",
			de : "Die Mitarbeiter von Demo SafeQid bedanken sich für Ihre Anmeldung und wünschen Ihnen einen schönen Tag.",
			},
		
		"Close" : {	
			sv : "Stäng",
			de : "Schließen",
			},
			"Check in process of the kids have started!" : {
			sv : "Kolla in processen för barnen har börjat!",
			de : "Einchecken der Kinder hat begonnen!",
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



    
    
