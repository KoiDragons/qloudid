

$(function() {

var fileName='flipqard.php?v=1';
  var t ={	"Welcome" : {
						sv : "Välkommen",
						de : "Willkommen",
						},

					"Please select an option…" : {	
						sv : 	"Vänligen välj ett alternativ…",
						de :	"Bitte wählen Sie eine option aus...",
						},
						
					"Visitor" : {	
						sv : "Besökare",
						de : "Besucher",
						},
						"I am here for a meeting" : {	
						sv : "Jag är här för ett möte",
						de : "Ich bin hier für ein Treffen",
						},
						"I want free parking" : {	
						sv : "Jag vill ha gratis parkering",
						de : "Ich möchte kostenlose Parkplätze",
						},
					"Parking" : {	
						sv : "Parkering",
						de : "Parkplatz",
						},
						
					"Delivery" : {	
						sv : "Leverans",
						de : "Lieferung",
						},	

						"I want to pick up a package" : {	
						sv : "Jag vill hämta ett paket",
						de : "Ich möchte ein Paket abholen",
						},			
					"What we do..." : {
						sv : "Vad vi gör...",
						de : "Was wir machen...",
						},
					"Mission" : {	
						sv : 	"Mission",
						de :	"Mission",
						},
					"Vision" : {
						sv : "Vision",
						de : "Vision",
						},
					"CSR" : {	
						sv : 	"CSR",
						de :	"CSR",
						},
					"Announcement" : {
						sv : "Annonseringar",
						de : "Ankündigung",
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



    
    
