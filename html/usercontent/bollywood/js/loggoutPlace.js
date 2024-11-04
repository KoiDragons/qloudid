jQuery(document).ready(function() {

var dictionary = {
        "en": {
            "E-mail": "E-mail",
            "Password": "Password",
            
        },
        "sv": {
            "E-mail": "E-post",
            "Password": "Lösenord",
            
        },
		 "de": {
            "E-mail": "E-post",
            "Password": "Passwort",
            
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