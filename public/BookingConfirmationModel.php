<?php
	require_once('../AppModel.php');
	class BookingConfirmationModel extends AppModel
	{
		
		 function verifyEmailPhoneCodeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$stmt = $dbCon->prepare("select email_verification_code,verification_code from user_professional_service_request where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $job_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['verification_code']==$_POST['v_code'] && $row['email_verification_code']==$_POST['ev_code'])
				{
				$stmt->close();
				$dbCon->close();
				return 1;
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return 0;
				}
					
		}
	
	
	 function verifyEmailCodeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$stmt = $dbCon->prepare("select email_verification_code,verification_code from user_professional_service_request where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $job_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['email_verification_code']==$_POST['ev_code'])
				{
				$stmt->close();
				$dbCon->close();
				return 1;
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return 0;
				}
					
		}
	
	function senverificationCode($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				 $code=mt_rand(111111,999999);
				$stmt = $dbCon->prepare("update user_professional_service_request set email_verification_code=? where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $job_id);
				$stmt->execute();
				  
				$subject='Verify email';
				$emailContent='<html><head></head><body>


<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:rgb(254,254,254)"><tbody><tr><td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td align="left"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3Fdh_8slomy-uTKO2Dq10h"><img src="https://ci3.googleusercontent.com/meips/ADKq_NaBI_6gkv7v7goJGIhVrzYso7ZttkAsiO-ZvK3-nCFChG7NCY4Gi8guMx1qGgIbsKgUGPl4aEF9DKKVv3_5Z4nmdS9JJ39_gU2rBJMmXrPSLW09ZpIqb0o9wC60wphQhQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/klarna-logo.png" alt="Klarna." width="98" height="40" border="0" style="display:block;outline:0px;width:98px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Your 6-digit code</h1><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi there! Your 6-digit code is:</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">165749</h2><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Use this code to complete the verification process in the app or website.</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Do not share this code. Klarna representatives will never reach out to you to verify this code over the phone or SMS.</div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><b>The code is valid for 10 minutes.</b></div></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Support</font></font></h2><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td><h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">If you have any questions please contact us on</h3><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><a href="http://click.klarna.es/f/a/Fr0UR8yR1Q7pXm9FR-8wng~~/AABVuwA~/RgRoNYYFP0QuaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy9hdGVuY2lvbi1hbC1jbGllbnRlL1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/Fr0UR8yR1Q7pXm9FR-8wng~~/AABVuwA~/RgRoNYYFP0QuaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy9hdGVuY2lvbi1hbC1jbGllbnRlL1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3S2E-PheN6wUGeLVEcBolo">Customer Service</a></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">Want to learn more about us?</h3><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Visit our website at<span>&nbsp;</span><a href="http://click.klarna.es/f/a/ndorCSqqvjFf1u52A9OR4w~~/AABVuwA~/RgRoNYYFP0QZaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lc1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(12,12,12);font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/ndorCSqqvjFf1u52A9OR4w~~/AABVuwA~/RgRoNYYFP0QZaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lc1cFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw17Rs1qQzciF0u_R0-FCHy9">https://www.klarna.com/es</a></div></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td style="padding-left:20px;padding-right:20px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/kBBj1AYp9jgiYKUYjz0LTA~~/AABVuwA~/RgRoNYYFP0QhaHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9rbGFybmEvVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/kBBj1AYp9jgiYKUYjz0LTA~~/AABVuwA~/RgRoNYYFP0QhaHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9rbGFybmEvVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw0uXWSCGG_grCLULW_dUVpd"><img src="https://ci3.googleusercontent.com/meips/ADKq_NbVH5I-tVL_aM-mt5JYLNklwUOCIxdpnGRWqh5oAERsamtp3mBW0EIIPWrivA4cLCKGknedoP3XF-sX6eKn1PRq4G0m5Svq060Ak-6lDpxzEoETv7tPVOyjvP654ogFRsQPhsZDoi7DYTDjerIsZMlXhNTw=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/instagram.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/szXxBZl_bjIkVNnJ9T0KWA~~/AABVuwA~/RgRoNYYFP0QeaHR0cHM6Ly93d3cudGlrdG9rLmNvbS9Aa2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/szXxBZl_bjIkVNnJ9T0KWA~~/AABVuwA~/RgRoNYYFP0QeaHR0cHM6Ly93d3cudGlrdG9rLmNvbS9Aa2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw37Rvp9S1T076Vx8sub7B4g"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nb-5o3UYndP1zOh4Ej9HOQLv9y8p_iqPAEpko-6Ou2V8py_CzvVkf_flYetPmki20CvUnvqz-O5yqRPdjkaYJghmu9R7MmnL6wLW_r2hopYylQjR89DwLCmlRfgWNkrZBMHcHoPjqsYI7QQnVnTR3Uk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/tiktok.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/aXJjQkBm9hMbJGgg_Ulg5g~~/AABVuwA~/RgRoNYYFP0QnaHR0cHM6Ly93d3cubGlua2VkaW4uY29tL2NvbXBhbnkva2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/aXJjQkBm9hMbJGgg_Ulg5g~~/AABVuwA~/RgRoNYYFP0QnaHR0cHM6Ly93d3cubGlua2VkaW4uY29tL2NvbXBhbnkva2xhcm5hVwVzcGNldUIKZlEFAVNmWZBYyFIZa293YWtlbi5naGlybWFpQGdtYWlsLmNvbVgEAAAAAg~~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3HNtBaRVhrbuQ7LybNdxsc"><img src="https://ci3.googleusercontent.com/meips/ADKq_Narh5WtNTQVK0ecV0Bkk2cxukxXzkc15Xo_bWiZD1L8xWKIslwqr-opbo414kzX8GL0q90xvuLcT2ynanniooJyvnBwHIJI0Fgp82_6IgyDmim0pBamR8tMZE3e8eP5pmKMDtQARu_zQYy7Ds4jMWvLdTY=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/linkedin.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/OWr5Q8XkPBQYIwoYsCdeDA~~/AABVuwA~/RgRoNYYFP0QaaHR0cHM6Ly90d2l0dGVyLmNvbS9LbGFybmFXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/OWr5Q8XkPBQYIwoYsCdeDA~~/AABVuwA~/RgRoNYYFP0QaaHR0cHM6Ly90d2l0dGVyLmNvbS9LbGFybmFXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw1aQS7b5ENj7MttadKGvEIe"><img src="https://ci3.googleusercontent.com/meips/ADKq_Na0Bikraixp5WMdKm0lV_f2hcw_zD3RYBpjVKvnPt-TjOxopC06s2v0iBEPCKGBo8eGlM-6gn_gzKQS9IhNaN_LqgRYC9zofUoPzHifG-4EflMD0jWffSZ7o5VEx2rnk2Vjj84ZbtLtbrFojg=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/x.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40" style="padding-right:5px"><a href="http://click.klarna.es/f/a/mTv8X7Ll9HJv_kuhWaOi5g~~/AABVuwA~/RgRoNYYFP0QfaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0tsYXJuYVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/mTv8X7Ll9HJv_kuhWaOi5g~~/AABVuwA~/RgRoNYYFP0QfaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0tsYXJuYVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw22VCmNVXx8oiKpHRcSXC2q"><img src="https://ci3.googleusercontent.com/meips/ADKq_NZeVlLBwVC5BhHnilPrDenr4aSamGC_P59GTJ-fhhZxSpfSXN171N_R5PVhqtFjEfkqzqZ7kFqEesGKu4--hKiY2HY01r2LZqWxIcXIuTMJYcD4_WBbKaNFd7TBvNhPiHWH8nBeRi8Gp1uGH5fnZ4nGxAk=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/lollipop/icons/footer/facebook.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td><td align="center" width="40" height="40"><a href="http://click.klarna.es/f/a/m8HHr_sT10BssSdRMkvJPw~~/AABVuwA~/RgRoNYYFP0QmaHR0cHM6Ly93d3cueW91dHViZS5jb20vS2xhcm5hT2ZmaWNpYWxXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/m8HHr_sT10BssSdRMkvJPw~~/AABVuwA~/RgRoNYYFP0QmaHR0cHM6Ly93d3cueW91dHViZS5jb20vS2xhcm5hT2ZmaWNpYWxXBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3CO2PeHslv9yIDLWxOb5e3"><img src="https://ci3.googleusercontent.com/meips/ADKq_NYofWUS-rn-gKW1ci3kTu7SEf6Dfxz8Cle-sLEcAsBO3jxp4r2ecyarpXCRtjeKpwp6k9Xw4-CAcAjKN8xz656hWnaxJ8V2JHPC5nFrcnDUUHX2rCxUec3i4DrIbk4DGP_3kLbCNzWPFCkt7P5TkU8wkQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.12/comms-platform/lollipop/icons/footer/youtube.png" alt="" width="40" height="40" border="0" style="display:block;outline:0px;width:40px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse"><tbody><tr><td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056153000&amp;usg=AOvVaw1fIc6r2xnvLp3QQldTLyXl"><img src="https://ci3.googleusercontent.com/meips/ADKq_NaBI_6gkv7v7goJGIhVrzYso7ZttkAsiO-ZvK3-nCFChG7NCY4Gi8guMx1qGgIbsKgUGPl4aEF9DKKVv3_5Z4nmdS9JJ39_gU2rBJMmXrPSLW09ZpIqb0o9wC60wphQhQ=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.10/comms-platform/klarna-logo.png" alt="Klarna." width="98" height="40" border="0" style="display:block;outline:0px;width:98px;height:40px" class="CToWUd" data-bit="iit"></a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Klarna Bank AB (publ) </font></font><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sveavägen 46 </font></font></span><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">111 34 Stockholm</font></font></span></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td></tr></tbody></table><a href="http://click.klarna.es/f/a/BwaF5wds69zA8tnvdBlCuA~~/AABVuwA~/RgRoNYYFP0RMaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy8_dXRtX21lZGl1bT1lbWFpbCZ1dG1fc291cmNlPWtsYXJuYS1jb21tcy1wbGF0Zm9ybVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;text-decoration:underline!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/BwaF5wds69zA8tnvdBlCuA~~/AABVuwA~/RgRoNYYFP0RMaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9lcy8_dXRtX21lZGl1bT1lbWFpbCZ1dG1fc291cmNlPWtsYXJuYS1jb21tcy1wbGF0Zm9ybVcFc3BjZXVCCmZRBQFTZlmQWMhSGWtvd2FrZW4uZ2hpcm1haUBnbWFpbC5jb21YBAAAAAI~&amp;source=gmail&amp;ust=1718337056153000&amp;usg=AOvVaw0SKa0LmC2s7lI768Cb9uJU">klarna.com/es</a></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%"><tbody><tr><td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%"><tbody><tr><td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table></body></html>';
				$to            = $_POST['email'];
				$res= sendEmail($subject, $to, $emailContent);
				
				$stmt->close();
				$dbCon->close();
				return 1;
		}
		
		
		
	
	
		function updatePropertyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_property_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$_POST['b_id'], $request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			 return 1;
		 }
		 
		 function userSignupRequestProperty($data)
		{
			$dbCon = AppModel::createConnection();
		   
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select user_property_id from user_professional_service_request where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 return $row;
			
			
		}
		function vitechCityList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from vitech_city");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option>';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
			}
				
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		function userProperty($data)
		{
			$dbCon = AppModel::createConnection();
		   
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
		  
			$stmt = $dbCon->prepare("select * from user_address where user_id = (select user_id from user_professional_service_request where id=?)");
			/* bind parameters for markers */
			$cont=1;
		   $stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);	
			}
			 $stmt->close();
			$dbCon->close();
			 return $org;
			
			
		}
		
		function addProfessionalProperty($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where user_logins.id= (select user_id from user_professional_service_request where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$data['user_id']=$row['id'];
			if($_POST['same_name']==1)
			{
			$full_name=$row['first_name'].' '.$row['last_name'];	
			}
			else
			{
			$full_name=	htmlentities($_POST['flname'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			$_POST['same_invoice']=1;
			if($_POST['same_invoice']==1)
			{
			$_POST['iaddress']=$_POST['addrs'];	
			$_POST['i_port_number']=$_POST['pnumber'];	
			$_POST['izip']=$_POST['dzip'];
			$_POST['icity']=$_POST['dcity'];
			}
			$st=0;
			$_POST['addrs']=htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');
			
			$stmt = $dbCon->prepare("select count(id) as num from user_address where user_id = ?");
				
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowId    = $result->fetch_assoc();	
			if($rowId['num']==0)
			{
				$st=1;
				$added_on_place=2;
			$stmt = $dbCon->prepare("insert into  user_address (property_type, `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code,floors_available,added_on_place) values (?, ? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?, ?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iissssssssiissii",$_POST['property_type_detail'],$data['user_id'],$_POST['addrs'],$_POST['dcity'], htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['pnumber'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['iaddress'],$_POST['icity'],htmlentities($_POST['izip'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$full_name,$_POST['entry_code'],$_POST['total_floors'],$added_on_place);
			$stmt->execute();
			
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("update user_profiles set name_on_door=?, entry_code=?, full_address=?, port_number=?, address=?, city=?, zipcode=?,invoice_address=?,invoice_zipcode=?,invoice_city=?,invoice_port=?,is_invoice_same=?,is_name_on_house_same=?, is_id_active=1  where user_logins_id=?");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssssiii",$full_name,$_POST['entry_code'], $_POST['addrs'],$_POST['pnumber'], $_POST['addrs'],htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['izip'],htmlentities($_POST['icity'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$data['user_id']);
			}
			else
			{
			$added_on_place=2;
			$stmt = $dbCon->prepare("insert into  user_address (property_type, `user_id`, `address`  , `city`  , `zipcode` , `port_number` , `invoice_address`  , `invoice_city`  , `invoice_zipcode`  , `invoice_port_number`  , `is_name_same`  , `is_invoice_same`  , `name_on_house`   , `created_on`,entry_code,floors_available,added_on_place ) values (?, ? , ?, ?, ?, ? , ?, ?, ?, ? , ?, ?, ?, now(), ?,?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iissssssssiissii",$_POST['property_type_detail'],$data['user_id'],$_POST['addrs'],$_POST['dcity'], htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['pnumber'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['iaddress'],$_POST['icity'],htmlentities($_POST['izip'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['i_port_number'],$_POST['same_invoice'],$_POST['same_name'],$full_name,$_POST['entry_code'],$_POST['total_floors'],$added_on_place);
			$stmt->execute();
			
			$id=$stmt->insert_id;
			}
			
			for($i=0;$i<$_POST['total_bathrooms'];$i++)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_bathroom_detail (user_address_id, created_on, modified_on) values (?,now(), now())");
			$stmt->bind_param("i", $id);
			$stmt->execute();		
			}
			
			
			for($i=0;$i<$_POST['total_bedrooms'];$i++)
			{
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms (user_address_id, created_on) values (?,now())");
			$stmt->bind_param("i",$id);
			$stmt->execute();	
			$id1=$stmt->insert_id;
			$bed='Single';
			$stmt = $dbCon->prepare("insert into user_apartment_bedrooms_beds (bedroom_id,bed_info, created_on,modified_on) values (?,?,now(),now())");
			$stmt->bind_param("is", $id1,$bed);
			$stmt->execute();
			}
			  $stmt = $dbCon->prepare("update user_professional_service_request set property_type_detail=?,user_property_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$_POST['property_type_detail'],$id, $request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function addUserDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']);
			$came_from=5;
			$stmt = $dbCon->prepare("select id,country_of_residence from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				
			$stmt = $dbCon->prepare("select user_logins.id,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $_POST['country'],$_POST['pnumber']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			if(!empty($rowCheck))
			{
			$stmt = $dbCon->prepare("update user_profiles   set phone_number='' where user_logins_id=?");
			$stmt->bind_param("i", $rowCheck['id']);
			$stmt->execute();	
			}
			$stmt = $dbCon->prepare("update user_visiting_countries   set phone_number='' where country_info=?  and phone_number=?");
			$stmt->bind_param("is", $_POST['country'],$_POST['pnumber']);
			$stmt->execute();	
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,user_came_from,domain_id ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?)");
			$stmt->bind_param("ssiissiiii", $_POST['fname'], $_POST['lname'],$st,$st,$_POST['email'], $data['random_hash'], $_POST['country'],$rf,$came_from,$domain_id);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number ) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id'], $_POST['pnumber']);
			$stmt->execute();
			 
			}
			else
			{
			$data['user_id']=$row['id'];	
			}
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
			
		}
	
		function selectedMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
			$stmt->bind_param("i", $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function serviceSelected($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);  
				
				if(isset($data['booked_from']))
				{
					$booked_from=$this->encrypt_decrypt('decrypt',$data['booked_from']);  
				}
				else
				{
					$booked_from=0;  
				}
				$booked_from=$this->encrypt_decrypt('decrypt',$data['booked_from']);  
				$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set booked_from=? where professional_user_job_id=?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("ii",  $booked_from,$domain_id);
					$stmt->execute();
				
				
				$stmt = $dbCon->prepare("select professional_category_id,company_id from dishes_detail_information where id in (select dish_id from hotel_roomservice_item_ordered where professional_user_job_id=?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $job_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rule=2;
				while($row_country = $result->fetch_assoc())
				{
					 
					$stmt = $dbCon->prepare("select payment_option from professional_company_selected_service_todos where professional_category_id = ? and domain_id=? and company_id=?");
					/* bind parameters for markers */
					$cont=1;
					$stmt->bind_param("iii",  $row_country['professional_category_id'],$domain_id,$row_country['company_id']);
					$stmt->execute();
					$result1 = $stmt->get_result();
					$row2 = $result1->fetch_assoc();
					
					
					if($row2['payment_option']==2)
					{
						$rule=2;
						break;
					}
					else
					{
					$rule=$row2['payment_option'];
					  	
					}						
				}
				  
				$stmt->close();
				$dbCon->close();
				return $rule;	
				 
		}
	
		function selectedMarketplaceDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
			$stmt->bind_param("i",$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$filename="../estorecss/".$row['background_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['background_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['background_image'].'.jpg' );  $row['background_image']='../../../'.$imgs; } else { $row['background_image']=""; }
			 
			$stmt->close();
			$dbCon->close();
			return $row;	
		}
		
		function verifyIP()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			 $stmt = $dbCon->prepare("select login_status from user_certificates where login_started_for=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			
			if($row['login_status']!=2)
			{
				$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
				/* bind parameters for markers */
				$stmt->bind_param("s", $ip);
				$stmt->execute();	
			}
			 
				 $t=microtime();
				 
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$ip);
			 
		}
		
			function bookingServiceInvoiceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id= $this -> encrypt_decrypt('decrypt',$data['job_id']);
			 
			$stmt = $dbCon->prepare("select invoice_id,hotel_roomservice_item_ordered.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as full_name,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join employees on employees.id=hotel_roomservice_item_ordered.booked_employee_id left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where hotel_roomservice_item_ordered.professional_user_job_id=?");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select dish_name,time_required,post_production_time,preparation_time,dish_price from dishes_detail_information where id in(select dish_id from hotel_roomservice_item_ordered where professional_user_job_id=?)");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$total_price=0;
			while($row2 = $result2->fetch_assoc())
			{
				$total_price=$total_price+$row2['dish_price'];
				 
			}
			//print_r($row['invoice_id']); die;
			if($row['invoice_id']==0)
			{
				$stmt = $dbCon->prepare("insert into professional_services_payment_invoice(total_price,user_id)values(?,?)");
				$stmt->bind_param("ii", $total_price,$row['booking_person_id']);
				$stmt->execute();
				$id=$stmt->insert_id;
				
				$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set invoice_id=? where professional_user_job_id=?");
				$stmt->bind_param("ii",$id, $job_id);
				$stmt->execute();
				$invoice_id= $this -> encrypt_decrypt('encrypt',$id);
			}
			else
			{
				$invoice_id= $this -> encrypt_decrypt('encrypt',$row['invoice_id']);
			}
			$stmt->close();
			$dbCon->close();
			return $invoice_id;
			
			
		}
		
		
		 function loginAppAccount()
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		
        $stmt = $dbCon->prepare("select login_status,user_id from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		
		if($row['login_status']!=2)
		{
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,time_out=1 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
				
		$stmt->close();
        $dbCon->close();
		return 0;		
		}
		else
		{
			
		 
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
		
		 $stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowUser    = $result->fetch_assoc();
		$userid = $rowUser['id'];
		$stmt->close();
		$dbCon->close();
		return $userid;
		}
		}
		
	function updateUserOnJob($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_id=?,carried_for=? where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("iii", $data['user_id'],$data['carried_for'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  hotel_roomservice_item_ordered set booking_person_id=?,user_id=? where professional_user_job_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$data['user_id'],$data['user_id'],$job_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
	
		function verifyCodeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$stmt = $dbCon->prepare("select verification_code from user_professional_service_request where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $job_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['verification_code']==$_POST['v_code'])
				{
				$stmt->close();
				$dbCon->close();
				return 1;
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return 0;
				}
					
		}
		
		function sendVerificationCode($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['country_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
				 
				$code=mt_rand(111111,999999); 
				
				$stmt = $dbCon->prepare("update user_professional_service_request set verification_code=? where id=?");
			 
				/* bind parameters for markers */
				 
				$stmt->bind_param("ii", $code,$job_id);
				$stmt->execute();
				
				$to            = '+'.$row_country['country_code'].''.trim($_POST['phone_number']);
				$subject='Verify';
				$emailContent='Please verify your phone number using code - '.$code;
				$res=sendSms($subject, $to, $emailContent);
				$stmt->close();
				$dbCon->close();
				return 1;	
		}
		function userSignupMarketplaces($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from user_signup_marketplaces where user_id=? and domain_id=?");
			$stmt->bind_param("ii",$data['user_id'], $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into user_signup_marketplaces(user_id,domain_id) values(?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'], $domain_id);
			$stmt->execute();
			$id=$stmt->insert_id;
			}
			else
			{
				$id=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}

		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from user_logins where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}	
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}	
		function checkUserInfo()
		{
			$dbCon = AppModel::createConnection();
			  $stmt = $dbCon->prepare("select id from user_logins where email=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if(empty($row))
				{
				$stmt->close();
				$dbCon->close();
				return 0;
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return $row['id'];
				}
					
		}
		
		
		function verifyEmail($data)
		{
			$dbCon = AppModel::createConnection();
			  
				$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				 
				$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
				 
				if(empty($row_country))
				{
				$stmt->close();
				$dbCon->close();
				return 0;	
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return $row_country['id'];	
				}
		}
		
		
		function saveServicePaymentCardData($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			// print_r($_POST); 
			$stmt = $dbCon->prepare("insert into user_service_payment_info(card_number,cvv,expiry_date,job_id) values(?,?,?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("sssi",$_POST['card_number'],$_POST['cvv'],$_POST['exp_date'],$job_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateVerificationInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			
			$codeInfo=$this->codeInfo($data);
			
			$stmt = $dbCon->prepare("select user_logins.id,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $codeInfo['country_id'],$codeInfo['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			if(!empty($rowCheck))
			{
			$stmt = $dbCon->prepare("update user_profiles   set phone_number='' where user_logins_id=?");
			$stmt->bind_param("i", $rowCheck['id']);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("update user_visiting_countries   set phone_number='' where country_info=?  and phone_number=?");
			$stmt->bind_param("is", $codeInfo['country_id'],$codeInfo['phone_number']);
			$stmt->execute();	
			$rf=0;	
			$st=1;
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,user_came_from,domain_id ) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?)");
			$stmt->bind_param("ssiissiiii", $codeInfo['first_name'], $codeInfo['last_name'],$st,$st,$codeInfo['email'], $data['random_hash'], $codeInfo['country_id'],$rf,$came_from,$domain_id);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number ) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id'], $codeInfo['phone_number']);
			$stmt->execute();
			$updateServicePaymentDetail=$this->updateServicePaymentDetail($data);
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function codeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$verification_id=$this->encrypt_decrypt('decrypt',$data['verification_id']);
			 
			$stmt = $dbCon->prepare("select * from user_service_payment_info where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("i", $verification_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}	
		
		function updateServicePaymentData($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$code=mt_rand(1111,9999); 
			$code1=mt_rand(1111,9999); 
			$_POST['fname']=htmlentities($_POST['fname'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['fname']=htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into user_service_payment_info(email,first_name,last_name,country_id,phone_number,card_number,cvv,expiry_date,job_id,email_otp,phone_otp) values(?,?,?,?,?,?,?,?,?,?,?)");
				
			/* bind parameters for markers */
			$stmt->bind_param("sssisssssss",$_POST['email'],$_POST['fname'],$_POST['lname'],$_POST['country'],$_POST['pnumber'],$_POST['card_number'],$_POST['cvv'],$_POST['exp_date'],$job_id,$code,$code1);
			$stmt->execute();
			$id=$stmt->insert_id;
			$stmt = $dbCon->prepare("select country_code,country_name from country where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$subject='Verify phone';
			$emailContent='Please verify your phone using code - '.$code1;
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			 
			try{
			$res=json_decode(sendSms($subject, $to, $emailContent),true);
			}
			catch(Exception $e) {
						 
					   
					}
				catch (Error $e) {
					 
											}

			$subject='Verify email';
			$emailContent='Please verify your email using code - '.$code;
			$to            = $_POST['email'];
			$res= sendEmail($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);
		}
		
		function updateServicePaymentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_id=?,carried_for=1 where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("ii", $data['user_id'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  hotel_roomservice_item_ordered set booking_person_id=?,user_id=? where professional_user_job_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$data['user_id'],$data['user_id'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select sum(dish_price) as total_price,first_name,last_name,email from hotel_roomservice_item_ordered left join user_logins on user_logins.id=hotel_roomservice_item_ordered.user_id where hotel_roomservice_item_ordered.professional_user_job_id=?");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2040&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$row['first_name']."&email=".$row['email']."&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$total_price=$row['total_price']*100;
			if($total_price<500)
			{
				$total_price=500;
			}
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$total_price."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			$Chargeid=$c['id'];	
			
			
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set charge_id=?,customer_id=? where professional_user_job_id=?");
			$stmt->bind_param("ssi",$Chargeid,$cuId, $job_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		
		
		function updateUserPayInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$invoice_id=$this->encrypt_decrypt('decrypt',$data['invoice_id']);
			$stmt = $dbCon->prepare("update user_professional_service_request set user_id=?,carried_for=? where id=?");
			 
			/* bind parameters for markers */
			 
			$stmt->bind_param("iii", $data['user_id'],$data['carried_for'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  hotel_roomservice_item_ordered set booking_person_id=?,user_id=?,booking_checkin_status=0 where professional_user_job_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$data['user_id'],$data['user_id'],$job_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update  professional_services_payment_invoice set user_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'],$invoice_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}	
		function selectedSubcategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			
			$stmt = $dbCon->prepare("select property_information_required from professional_service_subcategory where id=(select subcategory_id from user_professional_service_request where id=?)");
			$stmt->bind_param("i",$job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row['property_information_required'];	
		}
		
		 function sendPropertyLink($data)
		{
		$subject='Job posted successfully';
		$to      = $data['email'];
		$emailContent='<html xmlns="http://www.w3.org/1999/xhtml" style="background-color: rgb(240, 240, 240);"><head>
  <title>Reservation confirmed</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
    /* GT AMERICA */

    @font-face {
      font-display: fallback;
      font-family: "GT America Regular";
      font-weight: 400;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Medium";
      font-weight: 600;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Condensed Bold";
      font-weight: 700;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
    }

    /* CLIENT-SPECIFIC RESET */

    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Prevent WebKit and Windows mobile changing default text sizes */

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Remove spacing between tables in Outlook 2007 and up */

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */

    .im {
      color: inherit !important;
    }

    /* DEVICE-SPECIFIC RESET */

    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* iOS BLUE LINKS */

    /* RESET */

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      display: block;
    }

    table {
      border-collapse: collapse;
    }

    table td {
      border-collapse: collapse;
      display: table-cell;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* BG COLORS */

    .mainTable {
      background-color: #F0F0F0;
    }

    .mainTable--hospitality {
      background-color: #f7f2ed;
    }

    html {
      background-color: #F0F0F0;
    }

    /* VARIABLES */

    .bg-white {
      background-color: white;
    }

    .hr {
      /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
      background-color: #d3d3d8;
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      mso-line-height-rule: exactly;
      line-height: 1px;
    }

    .textAlignLeft {
      text-align: left !important;
    }

    .textAlignRight {
      text-align: right !important;
    }

    .textAlignCenter {
      text-align: center !important;
    }

    .mt1 {
      margin-top: 6px;
    }

    .list {
      padding-left: 18px;
      margin: 0;
    }

    /* TYPOGRAPHY */

    body {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      color: #4f4f65;
      -webkit-font-smoothing: antialiased;
      -ms-text-size-adjust: 100%;
      -moz-osx-font-smoothing: grayscale;
      font-smoothing: always;
      text-rendering: optimizeLegibility;
    }

    .h1 {
      font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 700;
      vertical-align: middle;
      font-size: 36px;
      line-height: 42px;
    }

    .h2 {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
      vertical-align: middle;
      font-size: 16px;
      line-height: 24px;
    }

    .text {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 21px;
    }

    .text-list {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 25px;
    }

    .textSmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 14px;
    }

    .text-xsmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      line-height: 22px;
      letter-spacing: 1px;
    }

    .text-bold {
      font-weight: 600;
    }

    .text-link {
      text-decoration: underline;
    }

    .text-linkNoUnderline {
      text-decoration: none;
    }

    .text-strike {
      text-decoration: line-through;
    }

    /* FONT COLORS */

    .textColorDark {
      color: #23233e;
    }

    .textColorNormal {
      color: #4f4f65;
    }

    .textColorBlue {
      color: #2020c0;
    }

    .textColorGrayDark {
      color: #7B7B8B;
    }

    .textColorGray {
      color: #A5A8AD;
    }

    .textColorWhite {
      color: #FFFFFF;
    }

    .textColorRed {
      color: #df3232;
    }

    /* BUTTON */

    .Button-primary-wrapper {
      border-radius: 3px;
      background-color: #2020C0;
    }

    .Button-primary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #ffffff;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    .Button-secondary-wrapper {
      border-radius: 3px;
      background-color: #ffffff;
    }

    .Button-secondary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #2020C0;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    /* LAYOUT */

    .Content-container {
      padding-left: 60px;
      padding-right: 60px;
    }

    .Content-container--main {
      padding-top: 54px;
      padding-bottom: 60px;
    }

    .Content {
      width: 580px;
      margin: 0 auto;
    }

    .wrapper {
      max-width: 600px;
    }

    .section {
      padding: 24px 0px;
      border-bottom: 1px solid #d3d3d8;
    }

    .section--noBorder {
      padding: 24px 0px 0;
    }

    .section--last {
      padding: 24px 0px;
    }

    .message {
      background-color: #F4F4F5;
      padding: 18px;
    }

    .card {
      border: 1px solid #d3d3d8;
      padding: 18px;
    }

    /* HEADER */

    .header-tockLogoImage {
      display: block;
      color: #F0F0F0;
    }

    .header-heroImage {
      padding-bottom: 24px;
    }

    /* PREHEADER */

    .preheader {
      display: none;
      font-size: 1px;
      color: #FFFFFF;
      line-height: 1px;
      max-height: 0px;
      max-width: 0px;
      opacity: 0;
      overflow: hidden;
    }

    /* BANNER */

    .notice {
      padding: 12px;
      background: #23233E;
      color: #FFFFFF;
      display: block;
      font-size: 14px;
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
    }

    /* INTRO */

    .section--intro {
      padding-bottom: 48px;
    }

    /* BOOKING INFO */

    .business-logo__container {
      width: 48px;
      height: 48px;
      border-radius: 3px;
      border: 1px solid #d3d3d8;
      overflow: hidden;
    }

    .business-logo__image {
      border: 1px solid transparent;
      border-radius: 3px;
      width: 48px;
      height: 48px;
      display: block;
    }

    .business-address--address {
      width: 50%;
    }

    .business-address--map {
      width: 50%;
    }

    .business-address--map-image {
      width: 100%;
    }

    /* MOBILE TICKETS */

    .mobile-ticket--description {
      width: 65%;
      margin-top: 12px;
      margin-right: 5%;
    }

    .mobile-ticket--code {
      width: 30%;
    }

    .mobile-ticket--code-image {
      width: 100%;
    }

    /* RESERVATION ACTIONS */

    .linksTable {
      border-bottom: 1px solid #d3d3d8;
    }

    .linksTableRow {
      padding: 24px 12px;
    }

    .actions-icon {
      vertical-align: middle;
    }

    .actions-text {
      vertical-align: middle;
    }

    /* RECEIPT */

    .receipt__container {
      border: 1px solid #d3d3d8;
      padding: 24px;
    }

    .receipt__row {
      border-top: 1px solid #d3d3d8;
    }

    /* FEEDBACK ICONS */

    .feedback-link {
      border: 1px solid #d4d5da;
      border-radius: 3px;
      display: inline-block;
      width: calc(32% - 2px);
      padding: 10px 0;
    }

    .feedback-link-bumper {
      display: inline-block;
      width: 1%;
    }

    .feedback-link img {
      height: 50px;
      width: 50px;
    }

    /* SOCIAL ICONS */

    .social-link {
      display: inline-block;
      width: auto;
    }

    .social-link-text {
      padding: 14px 24px 14px 14px;
    }

    /* TABLET STYLES */

    @media screen and (max-width: 648px) {
      /* DEVICE-SPECIFIC RESET */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
      /* ANDROID CENTER FIX */
      /* LAYOUT */
      .wrapper {
        width: 100% !important;
        max-width: 100% !important;
      }
      .Content {
        width: 90% !important;
      }
      .Content-container {
        padding-left: 36px !important;
        padding-right: 36px !important;
      }
      .Content-container--main {
        padding-top: 30px !important;
        padding-bottom: 42px !important;
      }
      .responsiveTable {
        width: 100% !important;
      }
      /* RESERVATION ACTIONS */
      .linksTableRow {
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
      }
      .linksTableRow--borderRight {
        border-right: none !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      /* FEEDBACK LINK */
      .feedback-link img {
        height: 38px !important;
        width: 38px !important;
      }
    }

    /* MOBILE STYLES */

    @media screen and (max-width: 480px) {
      /* TYPOGRAPHY */
      .h1 {
        font-size: 30px !important;
        line-height: 30px !important;
      }
      .text {
        font-size: 16px !important;
        line-height: 22px !important;
      }
      /* BUTTON */
      .mobile-buttonContainer {
        width: 100% !important;
      }
      /* LAYOUT */
      .Content {
        width: 100% !important;
      }
      .Content-container {
        padding-left: 18px !important;
        padding-right: 18px !important;
      }
      .Content-container--main {
        padding-top: 24px !important;
        padding-bottom: 30px !important;
      }
      .section {
        padding: 18px 0 !important;
      }
      .section--last {
        padding: 18px 0 !important;
      }
      .header {
        padding: 0 18px !important;
      }
      .business-address--address {
        width: 100% !important;
      }
      .business-address--map {
        margin-top: 30px !important;
        width: 100% !important;
      }
      .mobile-ticket--description {
        width: 100% !important;
        margin-top: 0px !important;
      }
      .mobile-ticket--code {
        margin-top: 30px !important;
        margin-left: 0;
        width: 100% !important;
      }
      /* RECEIPT */
      .receipt__container {
        padding: 12px !important;
      }
      /* SOCIAL ICONS */
      .social-link {
        display: block !important;
        width: 100% !important;
        border-bottom: 1px solid #d3d3d8 !important;
      }
      /* INTRO */
      .section--intro {
        padding-top: 18px !important;
        padding-bottom: 18px !important;
      }
    }
  </style>
</head>

<body style="margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;">
   
  <!--[if mso]>
    <style type="text/css">
.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
.text-bold {font-weight: 600 !important;}
.text-link {text-decoration: underline !important;}
.text-linkNoUnderline {text-decoration: none !important;}
.text-strike {text-decoration: line-through !important;}
.textColorDark {color: #23233e !important;}
.textColorNormal {color: #4f4f65 !important;}
.textColorBlue {color: #2020c0 !important;}
.textColorGray {color: #A5A8AD !important;}
.textColorWhite {color: #FFFFFF !important;}
.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
    </style>
    <![endif]-->
  <!-- HIDDEN PREHEADER TEXT -->
  <div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
    <tbody>
<tr>
<td style="display:none !important;
 visibility:hidden;
 mso-hide:all;
 font-size:1px;
 color:#ffffff;
 line-height:1px;
 max-height:0px;
 max-width:0px;
 opacity:0;
 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
    <!-- HEADER -->
    </tr>
<tr>
      <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Qloud ID</h1>               </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->
      </td>
    </tr>
    <!-- CONTENT -->
    <tr>
      <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
          <tbody>
<tr>
            <td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                <!-- RESTAURANT INFO -->
                <tbody>
<tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- INTRO -->
                <tr>
                  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">Signup Completed</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- MESSAGE -->
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                    <div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">A message from Qloud ID</span>
                      <br> We are thrilled that you will be joining us. If you would like to hear from you, please do not hesitate to reach out. Restore your account and start using Qloud ID
                    </div>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- BOOKING INFO -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://safeqloud-228cbc38a2be.herokuapp.com/public/index.php/BookingConfirmation/listUserProperties/'.$data['checkout_id'].'/'.$data['cid'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Select property</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                  </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                  <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      
                      
                      
                      
                      <tr>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                
                
                <!-- RECEIPT -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">Add pricing</div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>You are almost there. To get service completed please provide the property information by clicking the button above.</span>
                            <span></span>
                          </div>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- QUESTIONS -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>
<tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Questions?
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            If you have questions about your reservation, contact us at&nbsp;
                            <a></a>                            or by calling
                            <a>+46 762072193</a>.
                          </div>
                        </td>
                      </tr>
                    </tbody>
</table>
                  </td>
                </tr>
              </tbody>
</table>
            </td>
          </tr>
        </tbody>
</table>
      </td>
    </tr>
    <!-- FOOTER -->
    <tr>
      <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
        <!-- Will most likely required a feature flag -->
        <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
          <tbody>
<tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
          </tr>
          <tr class="spacer">
            <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                © 2019 Tock, Inc.
              </div>
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                All Rights Reserved
              </div>
            </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody>
</table>
        <!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
      </td>
    </tr>
  </tbody>
</table>
</body></html>';
 

			try {
				 sendEmail($subject, $to, $emailContent);
				  
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
	}

	
	}		