<html>
 <head> <title> TLEN5530 XSS and SQli Examples </title> </head>
 <body> 
   <ul>
	<li> PHP <a href=xss/secure.php>XSS - Secure </a>
	<li> PHP  <a href=xss/insecure.php>XSS - Insecure </a>
	<li> PHP <a href=base64/base64.html>Base64 Obfuscation Example </a>
<?php 

list($ip,$port) = explode(':', $_SERVER['HTTP_HOST']);

echo " 	
	<li> Python <a href=http://$ip:1985/secure> XSS - Secure </a>
	<li> Python <a href=http://$ip:1985/insecure> XSS - Insecure </a>"; 
?>
  </ul>
 </body>
</html>	
