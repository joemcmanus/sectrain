<?php
// File: index.php
// Author: Joe McManus josephmc@alumni.cmu.edu
// Version: 1.0
// Purpose: a web interface to display coding vulnerabilities

list($ip,$port) = explode(':', $_SERVER['HTTP_HOST']);
include_once('header.php');
echo "
   
	 PHP <a href=xss/secure.php>XSS - Secure </a> <br>
	 PHP  <a href=xss/insecure.php>XSS - Insecure </a> <br>
	 PHP <a href=base64/base64.html>Base64 Obfuscation Example </a> <br>
	 Python <a href=http://$ip:1985/secure> XSS - Secure </a> <br>
	 Python <a href=http://$ip:1985/insecure> XSS - Insecure </a> <br>

";
include_once('footer.php');
