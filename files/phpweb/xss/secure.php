<?php 
//file: secure.php
// Purpose: Let people play with secure and insecure programs
//author: Joe McManus josephmc@alumni.cmu.edu
//version: 1.0
//date: 2019/12/12

include_once('../header.php');

echo " 
<br>
 <b> A Secure PHP App Example </b> </b><br>
"; 

isset ( $_REQUEST['i'] ) ? $i = $_REQUEST['i'] : $i = "";

if ( $i == Null ) { 
	echo "
	<form method=post action=secure.php>
	Enter Text: 
	 <input type=\"text\" id=\"i\" name=\"i\">
	<input type=\"submit\" value =\"Submit\" />
	</form>";
} else { 
	print htmlspecialchars($i); 
	echo "<br>View the files on <a href=https://github.com/joemcmanus/sectrain/blob/master/files/phpweb/xss/>github</a> to determine what stopped the XSS"; 
}

include_once('../footer.php')


?> 
