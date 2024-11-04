

$(function() {

var fileName='flipqard.php?v=1';


  var t ={	
 
		"Logged out" : {
				sv : "Utloggad",
				de : "Abgemeldet",
				},
		
			"Either you have chosen to be logged out. Or we have logged you out due to inactivity for security reasons." : {	
				sv : "Antingen har du valt att bli utloggad. Eller så har vi loggat ut dig pga inaktivitet av säkerhetsskäl.",
				de : "Entweder Sie haben sich dafür entschieden, ausgeloggt zu werden. Oder wir haben Sie aus Sicherheitsgründen aufgrund von Inaktivität abgemeldet.",
				},
		
			"E-mail" : {	
				sv : "E-post",
				de : "Email",
				},
				
			"Password" : {	
				sv : "Lösenord",
				de : "Passwort",
				},
		
			"Remember me" : {	
				sv : "Kom ihåg mig",
				de : "Erinnere dich an mich",
				},
				
			"Forgot password?" : {	
				sv : "Glömt lösenord?",
				de : "Passwort vergessen?",
				},
			"Sign in" : {	
				sv : "Logga in",
				de : "Einloggen",
				},
				
			"Skapa konto" : {	
				sv : "Glömt lösenord?",
				de : "Konto erstellen",
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
							url:"CreateAccount/changeLanguage",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								
							}
						});
    ev.preventDefault();
  });



});



    
    
