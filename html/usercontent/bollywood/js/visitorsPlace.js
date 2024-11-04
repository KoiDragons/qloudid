jQuery(document).ready(function() {

var dictionary = {
        "en": {
            "Name": "Name",
            "Lastname": "Lastname",
            "Company name": "Company name",
			"Your email": "Your email",
			"Your mobile phone": "Your mobile phone",
			"Country": "Country",
        },
        "sv": {
            "Name": "Namn",
            "Lastname": "Efternamn",
            "Company name": "Företagsnamn",
			"Your email": "Din e.-post",
			"Your mobile phone": "Ditt mobil nummer",
			"Country": "Land",
        },
		 "de": {
            "Name": "Name",
            "Lastname": "Nachname",
            "Company name": "Firmenname",
			"Your email": "Deine E-Mail",
			"Your mobile phone": "Handynummer",
			"Country": "Land",
        },
    };
   
					
					
    var set_lang = function (dictionary) {
        $("[data-translate]").each(function(){
           if($(this).is( "input" )){
			   //alert($(this).attr('placeholder'));
			  // alert(dictionary[$(this).data("translate")]);
              $(this).attr('placeholder',dictionary[$(this).data("translate")] )
           } else{
               $(this).text(dictionary[$(this).data("translate")])
           }
        })
    };

   // Swap languages when menu changes
   $(".lang_selector").click(function(ev) {
    var lang = $(this).attr("data-value");

        if (dictionary.hasOwnProperty(lang)) {
            set_lang(dictionary[lang]);
        }
    });
    
    // Set initial language to English
    set_lang(dictionary[langVar]);
    
       
  });