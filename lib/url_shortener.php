<?php
/*
USAGE:
code must be surrounded with try/catch block
import url_shortener.php

try{
	$longUrl = YOUR_URL;
	$short_url = getShortUrl($longUrl);	
}
catch(Exception $e) {
  $e->getMessage(); //this method will return the Exception message
}


*/

	function getShortUrl($url)
	{
		
		if($url !== '' && $url !== NULL && !empty($url))
		{
			if (filter_var($url, FILTER_VALIDATE_URL) !== false) 
			{
				return file_get_contents('http://tinyurl.com/api-create.php?url='.$url);		
			}
			else
			{
				throw new Exception('Invalid URL');
			}
			
		}
		else
		{
			throw new Exception('Url can not be null or empty string');
		}
    		
		return 'error';
	}
	
?>
