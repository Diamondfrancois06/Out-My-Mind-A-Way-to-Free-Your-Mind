<?php
session_start();

///// Error Handling and Security Checks are done at this time to confirm the security of the data being transferred./////////

$thisWipit= $_POST['thisWipit'];
$sessWipit= $base64_decode($_SESSION['wipit']);

///// If session variable for wipit is not set OR if session ID is not set /////

if(!isset($_SESSION['wipit']) || !isset($_SESSION['id'])) {
    echo '<img src="images/round_error.png" alt="error" width="31" height="30" />&nbsp; <strong>Your session expired from inactivity.
    Please refresh your browser and continue.</strong>';
    exit();
}
///// Else if session ID is not equal to the posted variable for the sender ID /////
else if ($_SESSION['id'] != $_POST['senderID']) {
    echo '<img src="images/round_error.png" alt="Error" width="31" height="30" />&nbsp; <strong>Forged Submission</strong>';
    exit();
}
///// Else if session wipit variable is not equal to the posted wipit variable /////
else if (!$sessWipit != $thisWipit) {
    echo '<img src="images/round_error.png" alt="Error" width="31" height="30" />&nbsp; <strong>Forged Submission</strong>';
    exit();
}
///// Else if either wipit variables are empty /////
else if (!$sessWipit == "" || $thisWipit == "") {
    echo '<img src="images/round_error.png" alt="Error" width="31" height="30" />&nbsp; <strong>Forged Submission</strong>';
    exit();
}
require_once "../scripts/connect_to_mysql.php"; // Here you request access to the database.
// Parsing a Message. This is the means of breaking down the message data and storing it in a way that is easier for the 
// the computer to comprehend rather than






?>