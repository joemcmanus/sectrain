<?php 
//file: insecure.php
//purpose: Simple Insecure PHP Example
//author: Joe McManus josephmc@alumni.cmu.edu
//version: 1.0
//date: 2014/09/26

isset ( $_REQUEST['i'] ) ? $i = $_REQUEST['i'] : $i = "";

echo " 
<html> 
 <head> <title> An Insecure PHP App Example </title> </head>
 <body> 
"; 

if ( $i == Null ) { 
	echo "
	<form method=post action=insecure.php>
	Enter Text: 
	 <input type=\"text\" id=\"i\" name=\"i\">
	<input type=\"submit\" value =\"Submit\" /></p>
	</form>
	
	<br>
	<b> Tip: </b> Try something like &gt;&lt;script&gt;alert('xss');&lt;/script&gt; <br>
	";
} else { 
	echo "$i"; 
}
echo "</body> </html>";


?> 
