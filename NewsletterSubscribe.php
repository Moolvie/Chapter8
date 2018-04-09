<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--
      PHP Programming With MySQL Second Edition
      

      Author: Doug Enos	
      Date:   April 7, 2018

      Filename: NewsletterSubscribe.php
   -->
<title>Subscribe to our Newsletter</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8849-1" />
</head>
<body>
<h1>Subscribe to our Newsletter</h1>
<?php
$ShowForm = FALSE;
$SubscriberName = "";
$SubscriberEmail = "";

if (isset($_POST['Submit'])) { 
    $FormErrorCount = 0;
    if (isset($_POST['SubName'])){
        $SubscriberName = stripslashes($_POST['SubName']);
        $SubscriberName = trim($SubscriberName);
        if (strlen($SubscriberName) == 0){
            echo "<p> You must include your name!</p>\n";
            ++$FormErrorCount;
        }
    }
    else {
        echo "<p>Form submittal erro (No 'SubName' field)!<p/>\n";
        ++$FormErrorCount;
    }
    if (isset($_POST['SubEmail'])){
        $SubscriberEmail = stripslashes($_POST['SubEmail']);
        $SubscriberEmail = trim($SubscriberEmail);
        if (strlen($SubscriberEmail) == 0){
            echo "<p>You must include your email address!</p>\n";
            ++$FormErrorCount;
        }
    }
    else {
        echo "<p>Form Submittal error (No 'SubEmail' field)!</p>\n";
        ++$FormErrorCount;
    }
    if ($FormErrorCount == 0){
        $ShowForm == FALSE;
        include("inc_db_newsletter.php");
        if ($DBConnect !== FALSE){
            $TableName = "subscribers";
            $SubscriberDate = date("Y-m-d");
            $SQLstring = "INSERT INTO $TableName " .
                "(name, email, subscribe_date) VALUES " .
                "('$SubscriberName', '$SubscriberEmail',
                '$SubscriberDate')";
            $QueryResult = @mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE)
                echo "<p>Unable to insert the values into the subscriber table </p>" 
                    . "<p>Error code " . mysqli_errno($DBConnect)
                    . ": " . mysqli_error($DBConnect) . "</p>";
            }
            else {
                $SubscriberID = mysqli_insert_id($DBConnect);
                echo "<p>" . htmlentities($SubscriberName) .
                ", you are now subscribed to our newsletter.<br />";
                echo "Your subscriber ID is $SubscriberID.<br />";
                echo "Your email address is ". htmlentities($SubscriberEmail) . ".</p>";
            }
            mysqli_close($DBConnect);
        }
    }
    else {
        $ShowForm = TRUE;
        $SubscriberName = "";
        $SubscriberEmail = "";   
    }
if($ShowForm){
    ?>
    <form action="NewsletterSubscribe.php" method="POST">
    <p><strong>Your Name: </strong>
    <input type="text" name="SubName" value="<?php echo $SubscriberName; ?>" /></p>
    <p><strong>Your Email Address: </strong>
    <input type="text" name="SubEmail" value="<?php echo $SubscriberEmail; ?>" /></p>
    <p><input type="Submit" name="Submit" value="Submit" /></p>
    </form>
        <?php
}

?>
</body>
</html>
