<?php
if ($result){
//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('mailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



$body             = '<html><body>';
$body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$body .= "<tr style='background : #eee;'><td><strong>Name :</strong> </td><td>" .$name . "</td></tr>";
$body .= "<tr><td><strong>Email :</strong> </td><td>" .$email. "</td></tr>";
$body .= "<tr><td><strong>Tel No :</strong> </td><td>" . $telno . "</td></tr>";
$body .= "<tr><td><strong>$com_sugg No :</strong> </td><td>" . $id . "</td></tr>";
$body .= "<tr><td><strong>$com_sugg Date :</strong> </td><td>" . $compldate . "</td></tr>";
$body .= "<tr><td><strong>Location of $com_sugg :</strong> </td><td>" . $location . "</td></tr>";
$body .= "<tr><td><strong>Work Type :</strong> </td><td>" . $worktype . "</td></tr>";
$body .= "<tr><td><strong>Department :</strong> </td><td>" . $department . "</td></tr>";
$body .= "<tr><td><strong>$com_sugg :</strong> </td><td>" . $compldetails . "</td></tr>";
$body .= "<tr><td><strong>Details of $com_sugg :</strong> </td><td>" . $description . "</td></tr>";
$body .= "<tr><td><strong>Appointment :</strong> </td><td>" .$appodate . "</td></tr>";

$body .= "</table>";
$body .= "</body></html>";


$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "sahyadrischoolkfi@gmail.com";  // GMAIL username
$mail->Password   = "tal#raj$21";            // GMAIL password

$mail->SetFrom('sahyadrischoolkfi@gmail.com', 'Sahyadri School');

$mail->AddReplyTo("bhaugha@gmail.com","Bhau Ghadge");

$mail->Subject    = "New com / sug / req";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "bhaugha@gmail.com";
$mail->AddAddress($address, "Bhau Ghadge");

$mail->AddAttachment("mailer/images/phpmailer.gif");      // attachment
$mail->AddAttachment("mailer/images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {}

}
?>
