$(document).ready(function(){
	 var properID = 0;
	 var ajaxData = {};
    var $window = $(window),
        $body = $(document.body),
        $intercom = $('#intercom-window'),
        uid = 'dEhIeDFjdTYvZ3VsT25pL0ZGSU5QUT09';

        try{
            uid = parent.window.document.getElementById('qmatchup-init').getAttribute('data-uid');
        }
        catch(e){}
//alert(uid);
    var methods = {

        // INIT
        init : function(){

            // Initialize form and events
            methods.init_form();

        },



        // FORM
        init_form: function(){

         //  alert("hi");
            methods.get_data(undefined, 'http://www.qloudid.com/api.php/companyDetail/'+uid);
				 
            // Login form
            $intercom.on('submit', '#login-form', function(){
				//alert("hi");
				$form1 = $(this);	
				methods.get_data($form1);
				return false;
            });
			
			$intercom.on('click', '#sub', function(){
				$form1 = $("#login-form");	
				  //ajaxData ={};
				  $("#wrong").remove();
				ajaxData.email =$("#login-form input[name=email]").val();
				ajaxData.password = $("#login-form input[name=password]").val();
				           if($("#login-form input[name=email]").val()=="" || $("#login-form input[name=email]").val()==null)
						   {
							   alert("Please enter email");
							   return false;
						   }
						   if($("#login-form input[name=password]").val()=="" ||  $("#login-form input[name=password]").val()==null)
						   {
							   alert("Please enter password");
							   return false;
						   }
				methods.checkCredentials(ajaxData);
				/* window.open('http://www2.example.org.localhost/remotia/qid/user/index.php/LoginAccount/loginUser', '_blank');
				  timeSpent = 0;
				var refreshId = setInterval(function() 
						{
						 
						  methods.checkLogin();
						  console.log(properID);
						  if (properID == 1 || timeSpent >= 120000) {
							  
							  if(properID == 1)
							  {
								  $("#sub").attr("type","submit");
								  $("#login-form").attr("action","http://www2.example.org.localhost/remotia/qid/api.php/companyFullDetail/"+uid);
								  $("#sub").html("Click to verify");
								  $("#login-form").submit();
								  //change button to submit and action of form
								  //change button title to "Click to Verify"
								  //submit form 
							  }
							clearInterval(refreshId);
						  }
						  timeSpent+=2000;
						  if(timeSpent >= 120000)
						  {
							  $("#sub").html("Click again to login");
						  }
						  
						}, 2000);*/
				/* to - do
				// Open a new tab so that user can login and 
				//check every two seconds if user is logged in until 2 mins
				// once user is logged in then break the loop and do following steps:
						// 1. Change form action to user-data.php
						// 2. change form button to submit
						// 3. Submit form so that code on line #31 can be executed*/
				
            });
 
        },
		
		checkCredentials: function()
		{
			
			$.ajax({
                url: 'http://www.qloudid.com/user/index.php/CheckLogin/checkCredentials',
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                dataType: 'text',
                data:ajaxData,
            })
            .done(function(data1) {

                alert(data1);
				
                    if(data1==1)
					{
						properID=1;
						$("#sub").attr("type","submit");
						$("#login-form").attr("action","http://www.qloudid.com/api.php/companyFullDetail/"+uid);
						//$("#sub").html("Click to verify");
						$("#login-form").submit();
					
					}
					else{
						
						properID=0;
						$("#sub").parent().append('<div class="wi_100 padrl10 talc padt10" id="wrong"><label  class="nobrd bg_trans txt_f curp">Wrong Credentials</label></div>');
					//return false;
						}
              
            });
		},

        // Get data via AJAX
        get_data: function($form, url){
			console.log($form);
            var data = {
                uid: uid,
                location: window.location.href
            };
			var sendData;
			//alert(data['uid']);
			//sendData = JSON.stringify(data);
            if($form){
                url = $form.attr('action');
				
				data.email =$("#login-form input[name=email]").val();
				data.password = $("#login-form input[name=password]").val();
                //data.data = $form.serialize();
				sendData = data;

                $form.attr('data-loading', 'true');
            }
			else{
				 sendData = JSON.stringify(data);
				 
			}

            $.ajax({
                url: url,
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                data: sendData,
            })
            .done(function(data) {

               // alert(data);
                if(data.status == 'ok'){
                    var message = data.message;
					var message2=data.type;

                    // login content
                    if(message.type == 'login-data'){
                        methods.build_login_content(message);
                    }
        
                    // user content
                    else  if(message.type == 'user-data'){
                        methods.build_user_content(message);
                    }
                }
                
                // Error
                else{
                    
                }
            })
            .fail(function() {
                console.log('fail');
            })
            .always(function() {
                if($form){
                    $form.attr('data-loading', 'false');
                }
            });

            

        },

        // Build login form
        build_login_content: function(data){

            // Top content
            var html = '<div class="dflex fxwrap_w alit_fs pos_rel padtb15 padrl30 tall">';

            if(data.user_content.user){
                var user_image = data.user_content.user.image;
                if(user_image){
                    html += '<div class="wi_30"><img src="' + user_image.src + '" class="wi_100 hei_auto"' + (user_image.alt ? ' alt="' + user_image.alt + '"' : '') + (user_image.title ? ' title="' + user_image.title + '"' : '') + '></div>';
                }
            }

            // - wi_70
            html += '<div class="wi_70 bs_bb marb10 padl5">';
            if(data.user_content.company){
                if(data.user_content.company.name){
                    html += '<h2 class="padb15 uppercase bold fsz18">' + data.user_content.company.name + '</h2>';
                }
            }

            html += '<div>';
            if(data.user_content.country){
                var country_image = data.user_content.country.image;
                if(country_image){
                    html += '<img src="' + country_image.src + '" class="marr5 valm"' + (country_image.alt ? ' alt="' + country_image.alt + '"' : '') + (country_image.title ? ' title="' + country_image.title + '"' : '') + '>';
                }
            }
            if(data.user_content.user){
                if(data.user_content.user.name){
                    html += '<span class="valm fsz15">' + data.user_content.user.name + '</span>';
                }
            }
            html += '</div>';

            if(data.user_content.score){
                html += '<div class="mart10">';
                var score_image = data.user_content.score.image;
                if(score_image){
                    html += '<img src="' + score_image.src + '" class="marr5 valm"' + (score_image.alt ? ' alt="' + score_image.alt + '"' : '') + (score_image.title ? ' title="' + score_image.title + '"' : '') + '>';
                }
                if(data.user_content.score.text){
                    html += '<span class="valm fsz15">' + data.user_content.score.text + '</span>';
                }
                html += '</div>';
            }

            html += '</div>'; // -wi_70


            html += '<div class="wi_100 order_3 padt10 fsz12"><div class="marl-20">';
            if(data.user_content.fields){
                for(var f = 0, fL = data.user_content.fields.length; f < fL; f++){
                    var field = data.user_content.fields[f],
                        field_text = field.text ? field.text : '&nbsp;';
                    if(field.type === 'large'){
                        html += '<div class="wi_100 pos_rel padb10 padl20"><span>' + field.label + '</span><span class="dblock brdb brdclr_lgtgrey2 fsz16">' + field_text + '</span></div>';
                    }
                }
            }
            html += '</div></div>';

            html += '</div>'; // top content


            // Form

            if(data.form_content){
                html += '<div class="padtb15 padrl30 bg_1f8ceb"><form' + (data.form_content.id ? ' id="' + data.form_content.id + '"' : '') + (data.form_content.method ? ' method="' + data.form_content.method + '"' : '') + (data.form_content.action ? ' action="' + data.form_content.action + '"' : '') + '><div class="dflex fxwrap_w marrl-10">';
				if(data.form_content.is_logged_in==0)
				{
			if(data.form_content.fields){
                    for(var f = 0, fL = data.form_content.fields.length; f < fL; f++){
                        var field = data.form_content.fields[f];
                        html += '<div class="wi_50 marb10 padrl10"><label for="form-' + field.name + '-' + f + '" class="sr-only">' + field.label + '</label><input type="' + field.type + '" name="' + field.name + '" id="form-' + field.name + '-' + f + '" class="wi_100 pad5" placeholder="' + field.label + '"></div>';
                    }
                }
				}
                if(data.form_content.button){
					if(data.form_content.button.type=='button')
					{
                    html += '<div class="wi_100 padrl10 talc"><button type="'+data.form_content.button.type+'" id="'+data.form_content.button.id+'"  class="nobrd bg_trans txt_f curp">' + data.form_content.button.label + '</button></div>';
					}
					else
					{
						 html += '<div class="wi_100 padrl10 talc"><button type="'+data.form_content.button.type+'" class="nobrd bg_trans txt_f curp">' + data.form_content.button.label + '</button></div>';
					}
                }

                html += '</div></form></div>';
            }

            html += '</div>'; // final

            $intercom.html(html);
        },

        // Build user content
        build_user_content: function(data){

            // Top content
            var html = '<div class="dflex fxwrap_w alit_fs pos_rel padtb15 padrl30 tall">';

            if(data.user_content.user){
                var user_image = data.user_content.user.image;
                if(user_image){
                    html += '<div class="wi_30"><img src="' + user_image.src + '" class="wi_100 hei_auto"' + (user_image.alt ? ' alt="' + user_image.alt + '"' : '') + (user_image.title ? ' title="' + user_image.title + '"' : '') + '></div>';
                }
            }

            // - wi_70
            html += '<div class="wi_70 bs_bb marb10 padl5">';
            if(data.user_content.company){
                if(data.user_content.company.name){
                    html += '<h2 class="padb15 uppercase bold fsz18">' + data.user_content.company.name + '</h2>';
                }
            }

            html += '<div>';
            if(data.user_content.country){
                var country_image = data.user_content.country.image;
                if(country_image){
                    html += '<img src="' + country_image.src + '" class="marr5 valm"' + (country_image.alt ? ' alt="' + country_image.alt + '"' : '') + (country_image.title ? ' title="' + country_image.title + '"' : '') + '>';
                }
            }
            if(data.user_content.user){
                if(data.user_content.user.name){
                    html += '<span class="valm fsz15">' + data.user_content.user.name + '</span>';
                }
            }
            html += '</div>';

            if(data.user_content.score){
                html += '<div class="mart10">';
                var score_image = data.user_content.score.image;
                if(score_image){
                    html += '<img src="' + score_image.src + '" class="marr5 valm"' + (score_image.alt ? ' alt="' + score_image.alt + '"' : '') + (score_image.title ? ' title="' + score_image.title + '"' : '') + '>';
                }
                if(data.user_content.score.text){
                    html += '<span class="valm fsz15">' + data.user_content.score.text + '</span>';
                }
                html += '</div>';
            }

            html += '</div>'; // -wi_70


            html += '<div class="wi_100 order_3 padt10 fsz12"><div class="marl-20">';
            if(data.user_content.fields){
                for(var f = 0, fL = data.user_content.fields.length; f < fL; f++){
                    var field = data.user_content.fields[f],
                        field_text = field.text ? field.text : '&nbsp;';
                    if(field.type === 'large'){
                        html += '<div class="wi_100 pos_rel padb10 padl20"><span>' + field.label + '</span><span class="dblock brdb brdclr_lgtgrey2 fsz16">' + field_text + '</span>';
                        if(field.status){
                            if(field.status === 'success'){
                                html += '<div class="wi_15p hei_15p pos_abs top0 left0 brdrad10 bg_00c281 talc txt_f"><span class="fa fa-check fsz10"></span></div>';
                            }
                            else if(field.status === 'fail'){
                                html += '<div class="wi_15p hei_15p pos_abs top0 left0 brdrad10 bg_red talc txt_f"><span class="fa fa-close fsz10"></span></div>';
                            }
                        }
                        html += '</div>';
                    }
                }
                html += '<div class="dflex fxwrap_w marr-5">';
                for(var f = 0, fL = data.user_content.fields.length; f < fL; f++){
                    var field = data.user_content.fields[f],
                        field_text = field.text ? field.text : '&nbsp;';
                    if(field.type === 'small'){
                        html += '<div class="wi_50 pos_rel bs_bb padr5 padb10 padl20"><span>' + field.label + '</span><span class="dblock brdb brdclr_lgtgrey2 fsz16">' + field_text + '</span>';
                        if(field.status){
                            if(field.status === 'success'){
                                html += '<div class="wi_15p hei_15p pos_abs top0 left0 brdrad10 bg_00c281 talc txt_f"><span class="fa fa-check fsz10"></span></div>';
                            }
                            else if(field.status === 'fail'){
                                html += '<div class="wi_15p hei_15p pos_abs top0 left0 brdrad10 bg_red talc txt_f"><span class="fa fa-close fsz10"></span></div>';
                            }
                        }
                        html += '</div>';
                    }
                }
                html += '</div>';
            }
            html += '</div></div>';

            html += '</div>'; // top content

            html += '</div>'; // final

            $intercom.html(html);
        },


        // get search params from window.location.search
		get_search_params : function(str){
			if(!str){
				str = window.location.search;
			}
			str = decodeURIComponent(str);
			var objURL = {};
				
			str.replace(
				new RegExp( "([^?=&]+)(=([^&]*))?", "g" ),
				function( $0, $1, $2, $3 ){
					objURL[ $1 ] = $3;
				}
			);
			return objURL;
		},
    }
    methods.init();
});