<?php 
//file: secure.php
//purpose: Simple Secure PHP Example
//author: Joe McManus josephmc@alumni.cmu.edu
//version: 1.0
//date: 2014/09/26

isset ( $_REQUEST['i'] ) ? $i = $_REQUEST['i'] : $i = "";

echo " 
<html> 
 <head> <title> An Secure PHP App Example </title> </head>
 <body> 
"; 

if ( $i == Null ) { 
	echo "
	<form method=post action=secure.php>
	Enter Text: 
	 <input type=\"text\" id=\"i\" name=\"i\">
	<input type=\"submit\" value =\"Submit\" /></p>
	</form>";
} else { 
	print htmlspecialchars($i); 
}
echo "</body> </html>";


?> 
