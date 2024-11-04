<?php $ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2030&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, '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' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			print_r($a);
			
			?>