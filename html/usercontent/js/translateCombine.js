	var settings = {
	 
      "async": true,
      "crossDomain": true,
      "url": "https://google-translate1.p.rapidapi.com/language/translate/v2",
      "method": "POST",
      "headers": {
        "x-rapidapi-host": "google-translate1.p.rapidapi.com",
        "x-rapidapi-key": "c67265f9c9msheb816a7c8862a56p14f1bcjsnbf897eaca59e",  
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": { 
        "source": "en",
        "q": "Language | English | Sweden | Vacant position | Vacant position | Become a supplier | FIND A CLEANER | Largest marketplace for cleaning agenices in spain | Home | Cleaning | Moving | Cleaning | Window | Cleaning",
        "target": ""
      }
      
    }
	
	function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
	$(document).ready(function(){
		
		var selectedLanguageCookie =  getCookie("selectedLanguageQloudid");
		if(selectedLanguageCookie === null || selectedLanguageCookie === "" || selectedLanguageCookie ==='undefined')
			{
				 setCookie('selectedLanguageQloudid', "en", 1);
			}
			else
			{
				if(selectedLanguageCookie!="en")
				{
				settings.data.target = selectedLanguageCookie;
				var dataText='';
				var items = $('.changedText');
				for(var i = 0; i < items.length; i++)
				{
					dataText=dataText+$(items[i]).text()+' | ';
				}
				var items = $('.floating__label');
	
				for(var i = 0; i < items.length; i++){
					
					dataText=dataText+$(items[i]).attr('data-content')+' | ';
				} 
				dataText=dataText.slice(0,-3);
				settings.data.q =dataText;
				fetchTranslation();
				settings.data.source=$(this).attr("tolang");
				}
			}
        $(".dropdown-item").click(function(e){
		 
          if($(this).attr("tolang") != settings.data.source){
            settings.data.target = $(this).attr("tolang");
			setCookie('selectedLanguageQloudid', $(this).attr("tolang"), 1);
            var dataText='';
		var items = $('.changedText');
		for(var i = 0; i < items.length; i++){
			
			dataText=dataText+$(items[i]).text()+' | ';
		}
		
		var items = $('.floating__label');
	
		for(var i = 0; i < items.length; i++){
			
			dataText=dataText+$(items[i]).attr('data-content')+' | ';
		} 
		
		dataText=dataText.slice(0,-3);
		
		
		var items = $('.checkout__input');
	
		for(var i = 0; i < items.length; i++){
			
			 
			dataText=dataText+$(items[i]).attr('value')+' | ';
		} 
		 
		settings.data.q =dataText;
		 
        fetchTranslation();
		settings.data.source = $(this).attr("tolang");
         } /*else {
		  
			 var dataText='';
	  var items = $('.changedText');
		for(var i = 0; i < items.length; i++){
			
			dataText=dataText+$(items[i]).text()+' | ';
		} 
		dataText=dataText.slice(0,-3);
		alert(dataText); return false;
            updatePlaceholders(dataText);
             
          }  */
		  
		  $('#qrMenu').addClass('hidden')
		  $('#qrMenu').css('display','none');
        });
    });
    function fetchTranslation(){
      $.ajax(settings).done(function (response) {
        
        console.log(response);
        var translatedText = response.data.translations[0].translatedText;
        
        updatePlaceholders(translatedText);
        
      });
    }
    function updatePlaceholders(updateString){
	 i=1;
      var comp = updateString.split('|');
	  
	  var items = $('.changedText');
		for(var i = 0; i < items.length; i++){
			//alert($(items[i]).text());
			$(items[i]).text(comp[i].trim());
		} 
		j=i;
		m=0;
		var items = $('.floating__label');
		var iterateLoop=items.length+j;
		for(var i = j; i < iterateLoop; i++){
			$(items[m]).attr('data-content',comp[i].trim());
			//$(items[i]).prop("data-content",comp[i].trim());
			m++;
		}
		
		j=i;
		m=0;
		var items = $('.checkout__input');
		var iterateLoop=items.length+j;
		for(var i = j; i < iterateLoop; i++){
			$(items[m]).attr('value',comp[i].trim());
			//$(items[i]).prop("data-content",comp[i].trim());
			m++;
		}
	  
	 /* for(j=0;j<4;j++)
	  {
	  
	   $('.changedText'+i).text(comp[j].trim() );
		 i++;
		 
		 }
      $('.changedText'+i).each(function(idx){
	  
        $('.changedText'+i).text(comp[idx+1].trim() );
		 i++;
      });*/
       
    }