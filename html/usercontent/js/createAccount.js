

$(function() {

var fileName='flipqard.php?v=1';


  var t ={	
 
 "Create an account - For free" : {
				sv : "Skapa ett konto - Gratis",
				de : "Erstellen Sie ein Konto - Kostenlos",
				},
		
			"Create an account by typing your e-mail address and choosing a password. Also fill in the country in which you reside." : {	
				sv : "Skapa konto genom att fylla i din e-postadress och välja ett lösenord. Fyll även i det land där du bor.",
				de : "Erstellen Sie ein Konto, indem Sie Ihre E-Mail-Adresse eingeben und ein Passwort wählen. Füllen Sie auch das Land aus, in dem Sie wohnen.",
				},
		
			"Select country" : {	
				sv : "Välj land",
				de : "Land auswählen",
				},
		
			"Register" : {	
				sv : "Registrera",
				de : "Registrieren",
				},
				"You forgot…" : {
				sv : "Du glömde…",
				de : "Du hast vergessen…",
				},
		
			"Please select country of residence" : {	
				sv : "Vänligen välj hemland",
				de : "Bitte wählen Sie das Land Ihres Wohnsitzes",
				},
		
			"Close" : {	
				sv : "Stäng",
				de : "Schließen",
				},
		"Please accept our " : {	
				sv : "Vänligen acceptera våra ",
				de : "Bitte akzeptieren Sie unsere ",
				},
			"terms and conditions" : {	
				sv : "allmänna villkor",
				de : "Allgemeinen Geschäftsbedingungen",
				},
				"Password field cannot be empty" : {	
				sv : "Lösenordsfältet kan inte vara tomt",
				de : "Das Passwortfeld darf nicht leer sein",
				},
				"Please add a valid email address" : {	
				sv : "Vänligen ange en giltig e-postadress",
				de : "bitte geben Sie eine gültige E-Mail Adresse an",
				},
				
				"Your email address is verified and you can now log into your account." : {
				sv : "Din e-postadress är verifierad och du kan nu logga in på ditt konto.",
				de : "Ihre E-Mail-Adresse wurde verifiziert und Sie können sich jetzt in Ihr Konto einloggen.",
				},
				"Activated" : {	
				sv : "Aktiverad",
				de : "Aktiviert",
				},
			"Email" : {	
				sv : "E-post",
				de : "Email",
				},
		
			"Password" : {	
				sv : "Lösenord",
				de : "Passwort",
				},
				
			"Sign in" : {	
				sv : "Logga in",
				de : "Einloggen",
				},
		
			"Create an account" : {	
				sv : "Skapa konto",
				de : "Konto erstellen",
				},
			"Verify your email address" : {
				sv : "Verifiera din e-postadress",
				de : "Bestätige deine Email-Adresse",
				},
		
			"To complete your registration, you must confirm that the email you entered is yours." : {	
				sv : "För att slutföra din registrering behöver du bekräfta att den angivna e-postadressen tillhör dig. ",
				de : "Um Ihre Registrierung abzuschließen, müssen Sie bestätigen, dass die angegebene E-Mail-Adresse Ihnen gehört.",
				},
		
			"We have sent an e-mail to the e-mail address you used for registration with instructions on how to complete your verification." : {	
				sv : "Vi har skickat ett mejl till den e-postadress du använde vid registrering med instruktion om hur du slutför din verifiering.",
				de : "Wir haben eine E-Mail an die E-Mail-Adresse gesendet, die Sie für die Registrierung verwendet haben, mit Anweisungen zum Abschließen Ihrer Überprüfung.",
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



    
    
