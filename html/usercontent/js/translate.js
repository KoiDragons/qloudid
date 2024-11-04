	var settings = {
	 
      "async": true,
      "crossDomain": true,
      "url": "https://google-translate1.p.rapidapi.com/language/translate/v2",
      "method": "POST",
      "headers": {
        "x-rapidapi-host": "google-translate1.p.rapidapi.com",
        "x-rapidapi-key": "411309b5d5mshe0a2eeddd06126ep19c17ajsn0380f3e58c98",
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "source": "en",
        "q": "Language | English | Sweden | Vacant position | Vacant position | Become a supplier | FIND A CLEANER | Largest marketplace for cleaning agenices in spain | Home | Cleaning | Moving | Cleaning | Window | Cleaning",
        "target": ""
      }
      
    }
    $(document).ready(function(){
	
        $(".dropdown-item").click(function(e){
		 
          if($(this).attr("tolang") != settings.data.source){
            settings.data.target = $(this).attr("tolang");
            var dataText='';
		var items = $('.changedText');
		for(var i = 0; i < items.length; i++){
			
			dataText=dataText+$(items[i]).text()+' | ';
		} 
		dataText=dataText.slice(0,-3);
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