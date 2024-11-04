<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script>
	 
		function submitform()
		{
			 
			 $("#errorMsg1").html('');
			 if($("#phone_number").val()==null || $("#phone_number").val()=="")
			{
				
				$("#errorMsg1").html('Please enter phone number');
				return false;
			}
			 else if($("#phone_number").val().charAt(0)==0) 
				{
					$("#errorMsg1").html('Phone number cant start with Zero');
					return false;
				}
				else if(isNaN($("#phone_number").val())) 
				{
					$("#errorMsg1").html('Phone number must be a numeric value');
					return false;
				}
				else if($("#phone_number").val().length<5) 
				{
					$("#errorMsg1").html('Phone number must be minimum five digit');
					return false;
				}
				else if($("#phone_number").val()==0) 
				{
					$("#errorMsg1").html('Phone number can not be Zero');
					return false;
				}
				else
			document.getElementById('save_indexing').submit();
			}
		
		 
				
			</script>
			
			
		
	</head>
	<body class="bg_212b3a ffamily_avenir">
	 
			 <div class="column_m header   bs_bb trans_bg " style="height:97.44px; border-bottom: 1px solid #353945;">
         <div class="header__center center padding2080 xs-padding032 " style="display: flex;
    align-items: center; width: 100%;
    max-width: 1280px;
    margin: 0 auto;">
	<a class="header__logo xs-fsz20 " href="#" style="border: 2px solid #ffffff; 
    padding: 10px;
    color: white;
    border-radius: 5px;
    font-family: Avenir;
    font-size: 20PX;
    line-height:25px !important"><?php echo $bookingInformationDetail['hotel_name']; ?></a>
</div>
      </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart60 " id="loginBank">
				<div class="wrap maxwi_100 padrl25 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_70 xxs-lgn_hight_50 padb0 white_txt trn ffamily_avenir changedText">Invite</h1>
									</div>
									<div class=" xxs-tall talc xs-padb20 padb35 ffamily_avenir"> <a href="#" class="txt_777E90 fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_30 changedText">Please invite the guest using their personal email</a></div>
			 
					 <div class="clear"></div>
							
		<form action="../phoneIinviteAdultForCheckin/<?php echo $data['hotel_checkin_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="UTF-8">
								
								 
											 <div class="column_m container fsz14 dark_grey_txt">
												<div class="bg_212b3a  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 txt_777E90 changedText">Guest detail</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  txt_777E90 changedText">Please provide guest information to send Pre Check-in request.</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									  
									 
									 <div class="on_clmn padt10">
											 <div class="thr_clmn  wi_20 padr5"> 
										<div class="pos_rel">
										<select id="country_id" name="country_id" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25 custom-select" fdprocessedid="qh9hm">
														
																											
															<option value="38">+1</option>
																											
															<option value="143">+1</option>
																											
															<option value="224">+1</option>
																											
															<option value="230">+1</option>
																											
															<option value="182">+7</option>
																											
															<option value="64">+20</option>
																											
															<option value="237">+27</option>
																											
															<option value="86">+30</option>
																											
															<option value="159">+31</option>
																											
															<option value="19">+32</option>
																											
															<option value="73">+33</option>
																											
															<option value="67">+34</option>
																											
															<option value="98">+36</option>
																											
															<option value="236">+38</option>
																											
															<option value="107">+39</option>
																											
															<option value="181">+40</option>
																											
															<option value="40">+41</option>
																											
															<option value="16">+43</option>
																											
															<option value="77">+44</option>
																											
															<option value="60">+45</option>
																											
															<option value="201">+46</option>
																											
															<option value="35">+47</option>
																											
															<option value="160">+47</option>
																											
															<option value="190">+47</option>
																											
															<option value="172">+48</option>
																											
															<option value="57">+49</option>
																											
															<option value="168">+51</option>
																											
															<option value="136">+52</option>
																											
															<option value="52">+53</option>
																											
															<option value="9">+54</option>
																											
															<option value="31">+55</option>
																											
															<option value="41">+56</option>
																											
															<option value="48">+57</option>
																											
															<option value="228">+58</option>
																											
															<option value="150">+60</option>
																											
															<option value="15">+61</option>
																											
															<option value="39">+61</option>
																											
															<option value="53">+61</option>
																											
															<option value="99">+62</option>
																											
															<option value="169">+63</option>
																											
															<option value="163">+64</option>
																											
															<option value="167">+64</option>
																											
															<option value="187">+65</option>
																											
															<option value="208">+66</option>
																											
															<option value="111">+77</option>
																											
															<option value="110">+81</option>
																											
															<option value="117">+82</option>
																											
															<option value="231">+84</option>
																											
															<option value="42">+86</option>
																											
															<option value="216">+90</option>
																											
															<option value="100">+91</option>
																											
															<option value="165">+92</option>
																											
															<option value="2">+93</option>
																											
															<option value="125">+94</option>
																											
															<option value="141">+95</option>
																											
															<option value="103">+98</option>
																											
															<option value="66">+212</option>
																											
															<option value="131">+212</option>
																											
															<option value="62">+213</option>
																											
															<option value="215">+216</option>
																											
															<option value="122">+218</option>
																											
															<option value="83">+220</option>
																											
															<option value="186">+221</option>
																											
															<option value="145">+222</option>
																											
															<option value="139">+223</option>
																											
															<option value="81">+224</option>
																											
															<option value="43">+225</option>
																											
															<option value="21">+226</option>
																											
															<option value="154">+227</option>
																											
															<option value="207">+228</option>
																											
															<option value="20">+229</option>
																											
															<option value="148">+230</option>
																											
															<option value="121">+231</option>
																											
															<option value="192">+232</option>
																											
															<option value="79">+233</option>
																											
															<option value="156">+234</option>
																											
															<option value="206">+235</option>
																											
															<option value="37">+236</option>
																											
															<option value="44">+237</option>
																											
															<option value="50">+238</option>
																											
															<option value="197">+239</option>
																											
															<option value="85">+240</option>
																											
															<option value="76">+241</option>
																											
															<option value="46">+242</option>
																											
															<option value="45">+243</option>
																											
															<option value="3">+244</option>
																											
															<option value="84">+245</option>
																											
															<option value="101">+246</option>
																											
															<option value="222">+246</option>
																											
															<option value="203">+248</option>
																											
															<option value="185">+249</option>
																											
															<option value="183">+250</option>
																											
															<option value="69">+251</option>
																											
															<option value="195">+252</option>
																											
															<option value="58">+253</option>
																											
															<option value="112">+254</option>
																											
															<option value="219">+255</option>
																											
															<option value="220">+256</option>
																											
															<option value="18">+257</option>
																											
															<option value="144">+258</option>
																											
															<option value="238">+260</option>
																											
															<option value="134">+261</option>
																											
															<option value="151">+262</option>
																											
															<option value="180">+262</option>
																											
															<option value="239">+263</option>
																											
															<option value="152">+264</option>
																											
															<option value="149">+265</option>
																											
															<option value="126">+266</option>
																											
															<option value="36">+267</option>
																											
															<option value="202">+268</option>
																											
															<option value="49">+269</option>
																											
															<option value="189">+290</option>
																											
															<option value="65">+291</option>
																											
															<option value="1">+297</option>
																											
															<option value="74">+298</option>
																											
															<option value="88">+299</option>
																											
															<option value="54">+345</option>
																											
															<option value="80">+350</option>
																											
															<option value="175">+351</option>
																											
															<option value="128">+352</option>
																											
															<option value="102">+353</option>
																											
															<option value="105">+354</option>
																											
															<option value="5">+355</option>
																											
															<option value="140">+356</option>
																											
															<option value="70">+358</option>
																											
															<option value="23">+359</option>
																											
															<option value="127">+370</option>
																											
															<option value="129">+371</option>
																											
															<option value="68">+372</option>
																											
															<option value="133">+373</option>
																											
															<option value="10">+374</option>
																											
															<option value="27">+375</option>
																											
															<option value="6">+376</option>
																											
															<option value="132">+377</option>
																											
															<option value="194">+378</option>
																											
															<option value="226">+379</option>
																											
															<option value="221">+380</option>
																											
															<option value="96">+385</option>
																											
															<option value="200">+386</option>
																											
															<option value="26">+387</option>
																											
															<option value="138">+389</option>
																											
															<option value="56">+420</option>
																											
															<option value="199">+421</option>
																											
															<option value="124">+423</option>
																											
															<option value="72">+500</option>
																											
															<option value="188">+500</option>
																											
															<option value="28">+501</option>
																											
															<option value="89">+502</option>
																											
															<option value="193">+503</option>
																											
															<option value="95">+504</option>
																											
															<option value="157">+505</option>
																											
															<option value="51">+506</option>
																											
															<option value="166">+507</option>
																											
															<option value="196">+508</option>
																											
															<option value="97">+509</option>
																											
															<option value="55">+537</option>
																											
															<option value="82">+590</option>
																											
															<option value="30">+591</option>
																											
															<option value="63">+593</option>
																											
															<option value="90">+594</option>
																											
															<option value="92">+595</option>
																											
															<option value="176">+595</option>
																											
															<option value="147">+596</option>
																											
															<option value="198">+597</option>
																											
															<option value="223">+598</option>
																											
															<option value="7">+599</option>
																											
															<option value="212">+670</option>
																											
															<option value="12">+672</option>
																											
															<option value="94">+672</option>
																											
															<option value="155">+672</option>
																											
															<option value="33">+673</option>
																											
															<option value="162">+674</option>
																											
															<option value="171">+675</option>
																											
															<option value="213">+676</option>
																											
															<option value="191">+677</option>
																											
															<option value="232">+678</option>
																											
															<option value="71">+679</option>
																											
															<option value="170">+680</option>
																											
															<option value="233">+681</option>
																											
															<option value="47">+682</option>
																											
															<option value="158">+683</option>
																											
															<option value="234">+685</option>
																											
															<option value="115">+686</option>
																											
															<option value="153">+687</option>
																											
															<option value="217">+688</option>
																											
															<option value="178">+689</option>
																											
															<option value="210">+690</option>
																											
															<option value="75">+691</option>
																											
															<option value="137">+692</option>
																											
															<option value="174">+850</option>
																											
															<option value="93">+852</option>
																											
															<option value="130">+853</option>
																											
															<option value="114">+855</option>
																											
															<option value="119">+856</option>
																											
															<option value="22">+880</option>
																											
															<option value="218">+886</option>
																											
															<option value="135">+960</option>
																											
															<option value="120">+961</option>
																											
															<option value="109">+962</option>
																											
															<option value="204">+963</option>
																											
															<option value="104">+964</option>
																											
															<option value="118">+965</option>
																											
															<option value="184">+966</option>
																											
															<option value="235">+967</option>
																											
															<option value="164">+968</option>
																											
															<option value="177">+970</option>
																											
															<option value="8">+971</option>
																											
															<option value="106">+972</option>
																											
															<option value="24">+973</option>
																											
															<option value="179">+974</option>
																											
															<option value="34">+975</option>
																											
															<option value="142">+976</option>
																											
															<option value="161">+977</option>
																											
															<option value="209">+992</option>
																											
															<option value="211">+993</option>
																											
															<option value="17">+994</option>
																											
															<option value="78">+995</option>
																											
															<option value="113">+996</option>
																											
															<option value="225">+998</option>
																											
															<option value="25">+1242</option>
																											
															<option value="32">+1246</option>
																											
															<option value="4">+1264</option>
																											
															<option value="14">+1268</option>
																											
															<option value="229">+1284</option>
																											
															<option value="29">+1441</option>
																											
															<option value="87">+1473</option>
																											
															<option value="205">+1649</option>
																											
															<option value="146">+1664</option>
																											
															<option value="91">+1671</option>
																											
															<option value="11">+1684</option>
																											
															<option value="123">+1758</option>
																											
															<option value="59">+1767</option>
																											
															<option value="227">+1784</option>
																											
															<option value="173">+1787</option>
																											
															<option value="61">+1809</option>
																											
															<option value="214">+1868</option>
																											
															<option value="116">+1869</option>
																											
															<option value="108">+1876</option>
																											
															<option value="13">+3166</option>
																																												
															   
																													
													</select>
													 
												 <label for="country_id" class="floating__label tall nobold padl10" data-content="Code">
											<span class="hidden--visually">
											  Code</span></label>
												</div>
												</div>
												<div class="thr_clmn  wi_80  padl5"> 
											<div class="pos_rel">
												
												<input type="text" name="phone_number" id="phone_number" placeholder="Phone number" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="phone_number" class="floating__label tall nobold padl10" data-content="Mobile">
											<span class="hidden--visually">
											 Mobile</span></label> 
												
											 </div>
											</div>
											 
											</div>
											
												 
											 
								 <div class="clear"></div>
								 
							 
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
							<div class="padt20 xxs-talc talc padb50 mart35">
								
								<a href="#" onclick="submitform();"><button type="button" name="forward" class="bold forword minhei_55p   fsz16 padrl70 nobold" style="border-radius: 50px; background: #ffffff; color: #777E90;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="changedText">Send request</font></font></button></a>
								
							</div>
					 
											</div>
											</div>
											
										</div>
								  
							
						 
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
	 
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
		
			<script>
			 
		function updateInd(id)
			{
				id1=$("#ind").val();
				 
				 id1 = id1.replace(id+",", "");
				 $("#ind").val(id1);
			}
			
			function updateInd1(id)
			{
				id1=$("#ind1").val();
				 
				 id1 = id1.replace(id+",", "");
				 $("#ind1").val(id1);
			}
			
			function updateInd2(id)
			{
				id1=$("#ind2").val();
				 
				 id1 = id1.replace(id+",", "");
				 $("#ind2").val(id1);
			}
			
			function updateInd3(id)
			{
				id1=$("#ind3").val();
				 
				 id1 = id1.replace(id+",", "");
				 $("#ind3").val(id1);
			}
			
			// Collborators autocomplete
			var $col_cont = $('#collaborators-container'),
			$col_form = $("#save_indexing"),
			$lookup = $("#collaborators-lookup");
			var col_html='';
			
			if($col_cont[0] && $lookup[0]){
				$lookup
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "../../getAirports",
							data: {
								filter: request.term
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							id1=$("#ind").val()+'' +indset + ',' ;
							$lookup.data('item', item);
							event.target.value = item['label'];
							$("#ind").val(id1);
							//alert($('#collaborators-lookup').val());
							col_html='<div class="collaborator-row dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + item['label'].charAt(0).toUpperCase() + '</div>';
							col_html += '<div class="flex_1 padr40 padl15 fsz13">';
						
							col_html += '<div><strong>' + item['airport_name'] +  '</strong></div>';
						
						
						col_html += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont.append(col_html);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
				 
			}
			
			
			var $col_cont1 = $('#collaborators-container1'),
			//$col_form = $("#save_indexing"),
			$lookup1 = $("#collaborators-lookup1");
			var col_html1='';
			
			if($col_cont1[0] && $lookup1[0]){
				$lookup1
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "../../getLanguages",
							data: {
								filter: request.term
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							id1=$("#ind1").val()+'' +indset + ',' ;
							$lookup1.data('item', item);
							event.target.value = item['label'];
							$("#ind1").val(id1);
							//alert($('#collaborators-lookup1').val());
							col_html1='<div class="collaborator-row1 dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + item['label'].charAt(0).toUpperCase() + '</div>';
							col_html1 += '<div class="flex_1 padr40 padl15 fsz13">';
						
							col_html1 += '<div><strong>' + item['lang_eng'] +  '</strong></div>';
						
						
						col_html1 += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row1"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd1('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont1.append(col_html1);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup1.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
				 
			}
			
			
			var $col_cont2 = $('#collaborators-container2'),
			//$col_form = $("#save_indexing"),
			$lookup2 = $("#collaborators-lookup2");
			var col_html2='';
			
			if($col_cont2[0] && $lookup2[0]){
				$lookup2
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "../../getCurrency",
							data: {
								filter: request.term
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							id1=$("#ind2").val()+'' +indset + ',' ;
							$lookup2.data('item', item);
							event.target.value = item['label'];
							$("#ind2").val(id1);
							//alert($('#collaborators-lookup2').val());
							col_html2='<div class="collaborator-row2 dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + item['label'].charAt(0).toUpperCase() + '</div>';
							col_html2 += '<div class="flex_1 padr40 padl15 fsz13">';
						
							col_html2 += '<div><strong>' + item['short_name'] +  '</strong></div>';
						
						
						col_html2 += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row2"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd2('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont2.append(col_html2);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup2.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
				 
			}
			
			
			var $col_cont3 = $('#collaborators-container3'),
			//$col_form = $("#save_indexing"),
			$lookup3 = $("#collaborators-lookup3");
			var col_html3='';
			
			if($col_cont3[0] && $lookup3[0]){
				$lookup3
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "../../getCards",
							data: {
								filter: request.term
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							id1=$("#ind3").val()+'' +indset + ',' ;
							$lookup3.data('item', item);
							event.target.value = item['label'];
							$("#ind3").val(id1);
							//alert($('#collaborators-lookup3').val());
							col_html3='<div class="collaborator-row3 dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + item['label'].charAt(0).toUpperCase() + '</div>';
							col_html3 += '<div class="flex_1 padr40 padl15 fsz13">';
						
							col_html3 += '<div><strong>' + item['card_name'] +  '</strong></div>';
						
						
						col_html3 += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row3"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd3('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont3.append(col_html3);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup3.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
				 
			}
		</script>
	
										
	</body>
	<?php 
		if(isset($_GET['error']))
		{
			if($_GET['error']==1)
			{
				echo '<script>alert("Some error occured while completing your request !!!")</script>';	
			}
			else if($_GET['error']==2)
			{
				echo '<script>alert("You have an active employee for the same email !!!")</script>';	
			}
		}
	?>							