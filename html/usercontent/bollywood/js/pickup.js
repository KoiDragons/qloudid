

$(function() {

var fileName='flipqard.php?v=1';
  var t ={	"Pick up children" : {
			sv : "Hämta barn",
			de : "Kinder abholen",
			},
		"Pick up" : {
			sv : "Hämta",
			de : "Abholen",
			},
			"Select" : {
			sv : "Välj",
			de : "Auswählen",
			},
		"Identify yourself with your social security number when you pick up a child from daycare." : {	
			sv : "Identifiera dig med ditt personnummer när du hämtar ett barn fråndagis.",
			de : "Identifizieren Sie sich mit Ihrer Sozialversicherungsnummer, wenn Sie ein Kind aus der Kindertagesstätte abholen.",
			},
		
		"Sign in" : {	
			sv : "Signera",
			de : "Anmelden",
			},
			"Who will you pick up?" : {
			sv : "Vem ska hämtas? ",
			de : "Wer wird abgeholt?",
			},
		"Who ?" : {
			sv : "Vem ? ",
			de : "Wer ?",
			},
		"Select and check out the child that you are going to pick up from daycare." : {	
			sv : "Markera och checka ut det barn som du ska hämta från dagis.",
			de : "Wählen Sie das Kind aus, das Sie im Kindergarten abholen möchten.",
			},
		
		"Check out" : {	
			sv : "Checka ut",
			de : "Auschecken",
			},
			"Check out of children has begun!" : {
			sv : "Kolla in barnen har börjat!",
			de : "Das Auschecken von Kindern hat begonnen!",
			
			},
		
		"Please wait for an employee to accept the request before leaving the premises." : {	
			sv : "Vänligen invänta på att en anställd accepterar förfrågan innan du lämnar lokalerna.",
			de : "Bitte warten Sie, bis ein Mitarbeiter die Anfrage akzeptiert, bevor Sie das Gebäude verlassen.",
			},
		
		"Meanwhile, you can meet your child.." : {	
			sv : "Under tiden kan du möta ditt barn..",
			de : "In der Zwischenzeit können Sie Ihr Kind treffen..",
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



    
    
