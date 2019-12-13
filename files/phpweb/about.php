<?php
// File: index.php
// Author: Joe McManus josephmc@alumni.cmu.edu
// Version: 1.0
// Purpose: a web interface to display coding vulnerabilities

list($ip,$port) = explode(':', $_SERVER['HTTP_HOST']);
include_once('header.php');
echo "
   

This was written as a way to show both secure and insecure web applications to engineers. <br> 
It will add new functionality as time allows. 

<br> Source code can be found at : <a href=https://github.com/joemcmanus/sectrain> github </a> <br>
<br><br>
Thanks - Joe 

";
include_once('footer.php');
