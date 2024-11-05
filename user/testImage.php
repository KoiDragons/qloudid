<?php 
$imagedata = file_get_contents("https://www.qloudid/html/usercontent/images/article/img1.jpg");
             // alternatively specify an URL, if PHP settings allow
$base64 = base64_encode($imagedata);
echo $base64;
?>