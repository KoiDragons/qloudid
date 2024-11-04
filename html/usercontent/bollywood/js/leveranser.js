

$(function() {

var fileName='flipqard.php?v=1';
  var t ={	
						"Post and Parcels" : {
				sv : "Post och  Paket",
				de : "Briefe und Pakete",
						},
			"Parcels" : {
				sv : "Paket",
				de : "Pakete",
						},
						"Register" : {
				sv : "Registrera",
				de : "Registrieren",
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
				"Pick up" : {	
				sv : "Hämta ut",
				de : "Abholen",
						},		
		"Pick up post and parcels " : {
				sv : "Hämta ut brev & paket",
				de : "Post und Pakete abholen",
						},
			
		"Pick up your post or parcels with SMS or QR code." : {	
				sv : 	"Hämta ut ditt brev eller paket med sms- eller QR-kod.",
				de :	"Holen Sie Ihre Post oder Pakete mit SMS oder QR-Code ab.",
						},
			
		"Please enter your SMS code" : {	
				sv : "Vänligen fyll i din sms-kod",
				de : "Bitte geben Sie Ihren SMS-Code ein",
						},
			
		"Register" : {	
				sv : "Registrera",
				de : "Registrieren",
						},
						
						"Register post and parcels" : {
				sv : "Registrera brev och paket",
				de : "Post und Pakete registrieren",
						},
			
			"Notify the recipient that there is a post or parcels to pick up by typing the person's name." : {	
				sv : 	"Meddela mottagaren om att det finns ett brev eller paket att hämta genom att fylla i personens namn. ",
				de :	"Benachrichtigen Sie den Empfänger, dass eine Post oder Pakete abgeholt werden müssen, indem Sie den Namen der Person eingeben.",
						},
			
			"Name of recipient" : {	
				sv : "Namn på mottagaren",
				de : "Name des Empfängers",
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



    
    
