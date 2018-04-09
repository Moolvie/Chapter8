<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--
      PHP Programming With MySQL Second Edition
      

      Author: Doug Enos	
      Date:   April 7, 2018

      Filename: CreateSubscribersTable.php
   -->
<title>Create Subscribers Table</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8849-1" />
</head>
<body>
<?php
include("inc_db_newsletter.php");

if ($DBConnect !== FALSE) {
     $TableName = "subscribers";
     $SQLstring = "SHOW TABLES LIKE 'subscribers'";
     $QueryResult = $DBConnect->query($SQLstring);
     if (mysqli_num_rows($QueryResult) == 0) {
          $SQLstring = "CREATE TABLE subscribers (subscriberID
               SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
               name VARCHAR(80), email VARCHAR(100),
               subscribe_date DATE,
               confirmed_date DATE)";
          $QueryResult = mysqli_query($DBConnect, $SQLstring);
          if ($QueryResult === FALSE)
               echo "<p>Unable to create the subscribers table.</p>"
               . "<p>Error code " . mysqli_errno($DBConnect)
               . ": " . mysqli_error($DBConnect) . "</p>";
          else
               echo "<p>Successfully created the "
               . "subscribers table.</p>";
     }
     else
          echo "<p>The subscribers table already exists.</p>";
     mysqli_close($DBConnect);
}
?>
</body>
</html>
