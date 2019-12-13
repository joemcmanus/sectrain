<?php
//file: sql-insecure.php 
//purpose: example contact list
//author: Joe McManus joe.mcmanus@coloado.edu
//version: 1.1 
//date: 2014/09/26

#User passed in var run strip tags on input
isset ( $_REQUEST['i'] ) ? $i = strip_tags($_REQUEST['i']) : $i = "";
isset ( $_REQUEST['s'] ) ? $s = strip_tags($_REQUEST['s']) : $s = "";
isset ( $_REQUEST['st'] ) ? $st = strip_tags($_REQUEST['st']) : $st = "";
isset ( $_REQUEST['first'] ) ? $first = strip_tags($_REQUEST['first']) : $first = "";
isset ( $_REQUEST['last'] ) ? $last = strip_tags($_REQUEST['last']) : $last = "";
isset ( $_REQUEST['email'] ) ? $email = strip_tags($_REQUEST['email']) : $email = "";


$db = mysqli_connect("localhost", "contactsInsecure", "superSecretPassword", "contactsSchema");
if(!$db) {
	echo "Error: " . mysqli_connect_error();
}

//Add new entries to DB
function addContact($db, $first, $last, $email) { 
	//$query="INSERT INTO contactsTable SET first='$first', last='$last', email='$email', id=''";
	$query="INSERT INTO contactsTable (first, last, email, id)  values('$first', '$last', '$email', '')";
	$result=mysqli_query($db, $query);
	echo "$query";
}

//Table Header 
function resultTableHeader()  {
	echo "<table width=60%>
	 <tr> <td bgcolor=#D8D8D8 width=30%> <b><u> First </b> </u> </td>
	  <td bgcolor=#D8D8D8 width=30%> <b><u> Last </b> </u> </td> 
	  <td bgcolor=#D8D8D8 width=40%> <b><u> eMail </b> </u> </td> </tr>";
}

//Results Display
function displayResults($first, $last, $email) {
	echo "<tr> <td>" . htmlspecialchars($first)  . "</td>";
	echo "<td>" . htmlspecialchars($last)  . "</td>";
	echo "<td>" . htmlspecialchars($email)  . "</td></tr>";
}


echo "
<html>
<head>
<title> Contacts </title> 
</head>
<body> 
<center>
<h3> Contact List </h3>
<table width=60%> 
<tr>
 <td bgcolor=#D8D8D8 width=30%> <a href=sql-insecure.php?s=1>Add New </a> </td>
 <td bgcolor=#D8D8D8 width=30%> <a href=sql-insecure.php?s=2>Search</a> </td>
 <td bgcolor=#D8D8D8 width=40%> <a href=sql-insecure.php>Back</a> </td>
</tr>
</table>
";

if ($s == Null) { //If no options, just query the whole table
	resultTableHeader();
	$query="SELECT first, last, email FROM contactsTable"; 
	$result=mysqli_query($db, $query); 
	while($row=mysqli_fetch_row($result)) {
		displayResults($row[0], $row[1], $row[2]);
	}
	echo "</table>";

}elseif ($s == 1) {  //Add new entry
	if ($first == Null) { //If we don't have user input yet
		echo "<form method=post action=\"sql-insecure.php\"> ";
		resultTableHeader();
		echo "	
 		  <td> <input type=text name=\"first\" value=\"\"></input> </td> 
 		  <td> <input type=text name=\"last\" value=\"\"></input> </td> 
 		  <td> <input type=text name=\"email\" value=\"\"></input> </td> 
		  <tr> <td colspan=3 align=center><input type=hidden name=\"s\" value=\"1\">
		   <input type=submit name=\"Submit\" value=\"Submit\"> </td </tr>
		 </table>";
		 
	} elseif ($first != Null) {
		addContact($db, $first, $last, $email) ;
		echo "Added new Entry <br>" .  
		htmlspecialchars($first) . "<br>"  .
		htmlspecialchars($last) . "<br>"  . 
		htmlspecialchars($email) . "<br>";
	}
}elseif( $s == 2) {
	if ($st == Null) { 
		echo "Enter Search Term: 
		<form method=post action=\"sql-insecure.php\">
		<input type=text name=\"st\" value=\"\"> 
		<input type=hidden name=\"s\" value=\"2\">
		<input type=submit value=\"Submit\" name=\"Submit\"> 
		</form>" ;
	} else { 
		resultTableHeader();
		$query="SELECT first, last, email FROM contactsTable WHERE first LIKE '%$st%' or last LIKE '%$st%' or email LIKE '%$st%'";
		echo "$query";
		$result=mysqli_query($db, $query);
		while($row=mysqli_fetch_row($result)) {
			displayResults($row[0], $row[1], $row[2]);
		}
	}
	echo "</table> ";
}

echo " 
  </center>
 </body>
</html>";
?>
