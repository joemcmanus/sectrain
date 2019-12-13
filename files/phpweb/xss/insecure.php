<?php 
//file: insecure.php
// Purpose: Let people play with secure and insecure programs
//author: Joe McManus josephmc@alumni.cmu.edu
//version: 1.0
//date: 2019/12/12

include_once('../header.php');

echo " 
<br>
 <b> An Insecure PHP App Example </b> </b><br>
"; 

isset ( $_REQUEST['i'] ) ? $i = $_REQUEST['i'] : $i = "";

if ( $i == Null ) { 
	echo "
	<form method=post action=insecure.php>
	Enter Text: 
	 <input type=\"text\" id=\"i\" name=\"i\">
	<input type=\"submit\" value =\"Submit\" />
	</form>
	<br>
	<b> Tip: </b> Try something like &gt;&lt;script&gt;alert('xss');&lt;/script&gt; <br> ";
} else { 
	echo "$i";
}
include_once('../footer.php')

?> 
