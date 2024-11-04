

$(function() {

var fileName='personal_request.php?v=1';
  var t ={
    
	"Superadmin": {
      sv: "Huvudadministrator"
	  
    },
    
    "Translate to English": {
      sv: "Översätt till engelska"
    },
    "Translate to Swedish": {
      sv: "Översätt till svenska"
    },
	"Thu September 20, 2018": {
	sv:"Tis den 20 september 2018"

	},
	"Upgrade security": {
	sv:"Uppgradera säkerhet"
	},
	"CONSENT":{
	sv: "SAMTYCKE"
	},
	"One time": {
	sv: "En gång"
	},
	"Ongoing" : {
	sv: "Pågående"
	},
	"GET STARTED" : {
	sv: "KOM IGÅNG"
	},
	"Store/Update your data" : {
	sv : "Spara / uppdatera din data"
	},
	"Events" : {
	sv: "Evenemang"
	},
	"User" : {
	sv: "Användare"
	},
	"Passport" : {
	sv: "Pass"
	},
	"Social Security Number" : {
	sv: "Personnummer"
	},
	"Family name" : {
	sv: "Efternamn"
	},
	"Given name" : {
	sv: "Förnamn"
	},
	"Address" : {
	sv: "Adress"
	},
	"Date of birth" : {
	sv: "Födelsedatum"
	},
	"Sex" : {
	sv: "Kön"
	},
	"Date of issue" : {
	sv: "Utfärdandedatum"
	},
	"INFO" : {
	sv: "INFO"
	},
	"Received Requests" : {
	sv: "Mottagna förfrågningar"
	},
	"Sent Requests" : {
	sv: "Skickade förfrågningar"
	},
	"Approved Consent" : {
	sv: "Godkända samtycken"
	},
	"Rejected Consent" : {
	sv: "Avslagna samtycken"
	},
	"User Name" : {
	sv: "Användarnamn"
	},
	"Created Date" : {
		sv: "Skapat Datum"
	},
	"Approve" : {
	sv: "Godkänn"
	},
	"View More" : {
	sv: "Visa mer"
	},
	
	"Sign in as": {
      sv: "Logga in som"
    },
	"Logout": {
      sv: "Logga ut"
    },
	"Personal": {
      sv: "Personlig"
    },
	"newsfeed": {
      sv: "nyhetsflöde"
    },
	"Newsfeed": {
      sv: "Nyhetsflöde"
    },
	
	"News": {
      sv: "Nyheter"
    },
	"View": {
      sv: "Visa"
    },
	"More": {
      sv: "mer"
    },
	"User": {
      sv: "Användare"
    },
	"Passport": {
      sv: "Pass"
    },
	"Change Password": {
      sv: "Ändra lösenord"
    },
	"Request connection": {
      sv: "Begär anslutning"
    },
	"Add your company": {
      sv: "Lägg till ditt företag"
    },
	"Social Security Number": {
      sv: "Personnummer"
    },
	"Family name": {
      sv: "Efternamn"
    },
	"Given names": {
      sv: "Givna namn"
    },
	"Address": {
      sv: "Adress"
    },
	"Date of birth": {
      sv: "Födelsedatum"
    },
	"Sex": {
      sv: "Sex"
    },
	"Endorsements": {
      sv: "påskrifter"
    },
	"Date of Exp": {
      sv: "Datum för Exp"
    },
	"Restrictions": {
      sv: "begränsningar"
    },
	"Classification": {
      sv: "klassificeringar"
    },
	"Date of issue": {
      sv: "Utgivningsdatum"
    },
	"Update Image": {
      sv: "Uppdatera bild"
    },
	"Veteran": {
      sv: "Veteran"
    },
	"Landlord": {
      sv: "Hyresvärd"
    },
	"Employer": {
      sv: "Arbetsgivare"
    },
	"School": {
      sv: "Skola"
    },
	"My carrier": {
      sv: "Min karriär"
    },
    
  };
 
 
 
 var _t = $('body').translate({lang: "en", t: t});
  var str = _t.g("translate");

  $(".lang_selector").click(function(ev) {
    var lang = $(this).attr("data-value");
    _t.lang(lang);

    console.log(lang);
    ev.preventDefault();
  });



});



    
    
