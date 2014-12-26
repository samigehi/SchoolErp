<?php
//******************************************* DAILY REPORT SETTING ***************************************************************//
//$yesterday = date("Y-m-d", strtotime("-1 day"));
$today = date("Y-m-d");

$body = <<<END
<html>
<head>
<title>Daily Report - Leave Application</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">
<p align=center><font color=black size=2>Sahyadri School</font><br><font color=gray size=1>krishnamurti foundation india</font></p>
<hr color=green>
END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


/*****************************************************CSR Report start ****************************************************/
include("connect.php");

$sql_leave = "SELECT * FROM leave_app WHERE apply_date = '$today' ORDER BY leave_id"; //filter complaints / suggestions / requests

$result_leave = mysql_query($sql_leave);
$count = '0';
$pending = '0';
$approved = '0';	

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$total=mysql_num_rows($result_leave);

$body .=" 	
<p align=left> <font color=darkblue><b>Date : </b></font>".$today."
<table style='font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;'>
<tr bgcolor=#BDF4CB>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Sr.No</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Name</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Apply Date</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Apply By</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>From To</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Type</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Days</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Purpose</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Status</th>
<th style='border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#EBDDE2;'>Approved By</th>
</tr>";

while($data = mysql_fetch_array($result_leave))
   {
$count++;
$leave_id = $data['leave_id'];
$staff_name = $data['staff_name'];
$apply_by = $data['apply_by'];
$apply_date = $data['apply_date'];
$leave_from = $data['leave_from'];
$leave_to = $data['leave_to'];
$leave_type = $data['leave_type'];
$leave_days = $data['leave_days'];
$leave_reason = $data['leave_reason'];
$leave_status = $data['leave_status'];
$approved_by = $data['approved_by'];

if ($leave_status == 'Approved'){
$approved++;
$color='green';
}

if ($leave_status == 'Pending'){
$pending++;
$color='red';
}

$body .=' 
<tr>
<td style="border-width:1px; padding:8px; text-align:center; border-style:solid; border-color:#666666; background-color:white;">'.$count.'</td>
<td style="border-width:1px; padding:8px; text-align:left; border-style:solid; border-color:#666666; background-color:white;"><b>'."<a href=\"http://fileserver/leave_app/update.php?leave_id=$leave_id\"><b>$staff_name</b></a>".'</b></td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:white;">'.$apply_date.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:white;">'.$apply_by.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:white;">'.$leave_from.' - '.$leave_to.'</td>
<td style="border-width:1px; padding:8px; text-align:center; border-style:solid; border-color:#666666; background-color:white;">'.$leave_type.'</td>
<td style="border-width:1px; padding:8px; text-align:center; border-style:solid; border-color:#666666; background-color:white;">'.$leave_days.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:white;">'.$leave_reason.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; color:'.$color.'; background-color:white;">'.$leave_status.'</td>
<td style="border-width:1px; padding:8px; text-align:center; border-style:solid; border-color:#666666; background-color:white;">'.$approved_by.'</td>
</tr>
';
}

$body .= <<<END
</table>
<br>
<hr color="lightgray" size="1">
<table style="font-size:12px;" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td>	
<div style="float:left; width:600px;">
[ <font color=blue><b>Total Records : </b>$total</font> ] &nbsp; &nbsp; &nbsp;
[ <font color=red><b>Pending : </b>$pending</font> ] &nbsp; &nbsp; &nbsp;
[ <font color=green><b>Approved : </b>$approved</font> ] &nbsp; &nbsp; &nbsp;
</div>
</td></tr>
</table>
<hr color="lightgray" size="1">
</body>
</html>
END;

mysql_close();
//******************************************** SMTP SERVER SETTINGS ***************************************************************//

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

$mail->Subject    = "Daily Report - Leave Application";

$mail->AltBody    = "Daily Report - Leave Application"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "shailesh.shirali@gmail.com";
$address1 = "milindgmore@gmail.com";
$address2 = "ramu1949@gmail.com";
$address3 = "sahyadri.server@gmail.com";

$mail->AddAddress($address, "Shailesh Shirali");
$mail->AddAddress($address1, "Milind More");
$mail->AddCC($address2, "P Ramesh");
$mail->AddBCC($address3, "Sahyadri Server");

$mail->AddAttachment("images/ss.gif");      // attachment
//$mail->AddAttachment("images/ss.gif"); // attachment

if(!$mail->Send()) {}

//******************************************** SMTP SETTINGS END ***********************************************************************//
?>
