<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--
      PHP Programming With MySQL Second Edition
      Chapter 8

      Author: Doug Enos	
      Date:   April 7, 2018

      Filename: CreateNewsletterDB.php
   -->
<title>Creating Database</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8849-1" />
</head>
<body>
<?php
$DBName = "newsletter"; 
$sql = "CREATE DATABASE $DBName";
$DBConnect = mysqli_connect("localhost", "root", "crumplebatverifytree");
    if ($DBConnect === FALSE)    
        echo "<p>Connection error: " . mysqli_error() . "</p>\n"; 
    else { 
            if ($DBConnect->query($sql) === FALSE) 
                echo "<p>Could not create the \"$DBName\" " . "database: " . mysqli_error($DBConnect) . "</p>\n";    
             else 
                echo "<p>Successfully created the " . "\"$DBName\" database.</p>\n";
                mysqli_close($DBConnect);  
    }
   
?>
</body>
</html>
