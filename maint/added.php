<html>
<head>
<title>record added</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="maint/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("connect.php");
$name = trim($_POST['name']);
$mrms = trim($_POST['mrms']);
$telno = trim($_POST['telno']);

//allow escape string//
$location_es = trim($_POST['location']);
$location = mysql_escape_string($location_es);

$worktype = trim($_POST['worktype']);
$com_sugg = trim($_POST['com_sugg']);
$preid = trim($_POST['preid']);
$department = trim($_POST['department']);

//allow escape string//
$compldetails_es = trim($_POST['compldetails']);
$compldetails = mysql_escape_string($compldetails_es);

$description = mysql_escape_string($_POST['description']);
$appodate = trim($_POST['appodate']);
$appotime = trim($_POST['appotime']);
$email = trim($_POST['email']);
$compldate = date("Y-m-d");
$compltime = date("H:i:s");

$query = "INSERT INTO maint (name, mrms, telno, location, worktype, com_sugg, preid, department, compldetails, compldate, compltime, description, appodate, appotime, email)
VALUES ('$name', '$mrms', '$telno', '$location', '$worktype', '$com_sugg', '$preid', '$department', '$compldetails', '$compldate', '$compltime', '$description', '$appodate', '$appotime', '$email')";
$results = mysql_query($query);

if ($results)
{
header ("Location: thank.php");
?>

<?php
$sql = "SELECT * FROM maint ORDER BY id DESC LIMIT 1";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
extract($row);

$id = trim($id);
$name = trim($name);
$compldate = trim($compldate);
$location = trim($location);
$compldetails = trim($compldetails);
$description = trim($description);
$currentpro = trim($currentpro);

$body = <<<END
<html>
<head>
<title>Com / Sug / Req</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">

<p align=left>Dear $name, </p><p> Your complaint has been registered and the details are as below. This is an automated response to indicate that your complaint has been registered. Please do not reply to this email. </p>

<p align=center><font color=black size=2>Sahyadri School</font><br><font color=gray size=1>krishnamurti foundation india</font></p>
<hr color=orange>
<br>
<table style='font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;'>
<tr>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>CSR No.</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Date</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Name</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Location</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>CSR</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Details of CSR</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Current progress</th>
</tr>
END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('mailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$body .=' 
<tr>
<td style="border-width:1px; padding:8px; text-align:center; border-style:solid; border-color:#666666; background-color:orange;"><b>'.$id.'</b></td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$compldate.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$name.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$location.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$compldetails.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$description.'</td>
<td style="border-width:1px; padding:8px; text-align:center; border-style:solid; border-color:#666666; background-color:#D9F3FF;">'.$currentpro.'</td>
</tr>';

$body .= <<<END
</table>
</body>
</html>

END;
mysql_close();

//***************************************** SMTP SERVER SETTING **************************************// 
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "sahyadri.server@gmail.com";  // GMAIL username
$mail->Password   = "omnamo123";            // GMAIL password

$mail->SetFrom("sahyadri.server@gmail.com", "Sahyadri Server");

$mail->AddReplyTo("sahyadri.server@gmail.com", "Sahyadri Server");

$mail->Subject    = "CSR registration mail";

$mail->AltBody    = "CSR registration mail"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $email;
$address1 = "sahyadri.server@gmail.com";
$address2 = "gbhosale56@gmail.com";

$mail->AddAddress($address, $name);
$mail->AddAddress($address1, "Sahyadri Server");
$mail->AddAddress($address2, "Gopal Bhosale");

$mail->AddAttachment("images/ss.gif");      // attachment
//$mail->AddAttachment("images/ss.gif"); // attachment

if(!$mail->Send()) {}

}
else
{ 
echo "Not Successful"; 
}
?>
