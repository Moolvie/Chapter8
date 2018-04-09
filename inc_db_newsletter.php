<?php
    // PHP Programming With MySQL Second Edition
    // Author: Doug Enos	
    // Date:   April 7, 2018
    // Filename: inc_db_newsletter.php

$DBName = "newsletter"; 
$DBConnect = @mysqli_connect("localhost", "root", "!root"); 
    if ($DBConnect === FALSE)
      echo "<p>Connection error: " . mysqli_error() . "</p>\n"; 
    else {
        if (@mysqli_select_db($DBName, $DBConnect) === FALSE) { 
              echo "<p>Could not select the \"$DBName\" " . "database: " . mysqli_error($DBConnect) . "</p>\n";
              mysqli_close($DBConnect); 
              $DBConnect = FALSE;
        }

    }
?>
