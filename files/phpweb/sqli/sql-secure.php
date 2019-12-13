<?php
//file: sql-secure.php 
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


#Database Connection 
function connectDB(&$db){
	$db_host='localhost';
	$db_user='contactsUser';
	$db_pass='superSecretPassword';
	$db_name='contactsSchema';
	$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if (mysqli_connect_errno()) {
		print "<br> Houston we have a problem! <br>
		There seems to be an error connecting to the MySQL Database. 
		<br> The error we hit was: <br> " .  htmlspecialchars(mysqli_connect_error()) .
		"<br> error code  " . htmlspecialchars(mysql_errno());
		exit;
	}
}

//Add new entries to DB
function addContact($db, $first, $last, $email) { 
	$first=mysqli_real_escape_string($db, $first);
	$last=mysqli_real_escape_string($db, $last);
	$email=mysqli_real_escape_string($db, $email);
	if ($stmt = mysqli_prepare($db, "INSERT INTO contactsTable SET first=?, last=?, email=?, id=''")) {
		mysqli_stmt_bind_param($stmt, "sss", $first, $last, $email); 
		mysqli_stmt_execute($stmt); 
		mysqli_stmt_close($stmt);
	} else {
		echo " We elsed";
	}
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

//Coonect to the DB to begin
connectDB($db);

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
 <td bgcolor=#D8D8D8 width=30%> <a href=sql-secure.php?s=1>Add New </a> </td>
 <td bgcolor=#D8D8D8 width=30%> <a href=sql-secure.php?s=2>Search</a> </td>
 <td bgcolor=#D8D8D8 width=40%> <a href=sql-secure.php>Back</a> </td>
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
		echo "<form method=post action=\"sql-secure.php\"> ";
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
		<form method=post action=\"sql-secure.php\">
		<input type=text name=\"st\" value=\"\"> 
		<input type=hidden name=\"s\" value=\"2\">
		<input type=submit value=\"Submit\" name=\"Submit\"> 
		</form>" ;
	} else { 
		$st=mysqli_real_escape_string($db, $st);
		resultTableHeader();
		if ($stmt = mysqli_prepare($db, "SELECT first, last, email FROM contactsTable WHERE 
			first LIKE CONCAT('%', ? ,'%') or
			last LIKE CONCAT('%', ? ,'%') or
			email LIKE CONCAT('%', ? ,'%')")){
			mysqli_stmt_bind_param($stmt, "sss", $st, $st, $st); 
			mysqli_stmt_execute($stmt); 
			mysqli_stmt_bind_result($stmt, $first, $last, $email);
			while(mysqli_stmt_fetch($stmt)) {
				displayResults($first, $last, $email);
			}
			mysqli_stmt_close($stmt);
		}
		echo "</table> ";
	}		
}

echo " 
  </center>
 </body>
</html>";
?>
