<?php

//******************************************* OPD Report start ***************************************************************//
//$today = date("Y-m-d");

$today = date("Y-m-d", strtotime("-1 day"));

$body = <<<END
<html>
<head>
<title>MU daily report</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">
<p align=center><font color=black size=3>Sahyadri School</font><br><font color=gray size=2>krishnamurti foundation india</font></p>
<p align=center><font color=darkblue><b>Daily Report </b>: Medical Unit &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Date </b>- $today &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</font></p>
<hr color=orange>
END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//*********************************************************************OPD reports Start****************************************************************//
include("connect.php");

$sql = "SELECT std_master.std_2014_15.name, std_master.std_2014_15.class, std_master.std_2014_15.house, mu_store.patient_records.complaint, mu_store.patient_records.prescription, mu_store.patient_records.dr_remark FROM mu_store.patient_records INNER JOIN std_master.std_2014_15 ON mu_store.patient_records.customer_name = std_master.std_2014_15.account_name where pt_date = '$today' AND mu_store.patient_records.pt_type = 'OPD' ORDER BY std_master.std_2014_15.name";

$result = mysql_query($sql);
$count_opd = '0';	

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$opd_total=mysql_num_rows($result);

$body .='	
<p align=left><font color=darkblue><b>Patient Type :</b></font> OPD &nbsp; <font color=red>|</font> &nbsp;  <font color=darkblue><b>Total Records : </b></font>'.$opd_total.'</p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:50px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Class</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:20px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Complaint</th>
<th style="border-width:1px; width:20px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Prescription</th>
<th style="border-width:1px; width:50px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dr_Remark</th>
</tr>
';

while($data = mysql_fetch_array($result))
   {
$count_opd++;
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_opd.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['name'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['class'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['house'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['complaint'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['prescription'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['dr_remark'].'</td>
</tr>
'
;}

$body .= <<<END
</table>
<br>
<hr color=orange>
END;


//*********************************************************************IPD reports Start****************************************************************//
include("connect.php");

$sql_ipd = "SELECT std_master.std_2014_15.name, std_master.std_2014_15.class, std_master.std_2014_15.house, mu_store.patient_records.complaint, mu_store.patient_records.prescription, mu_store.patient_records.dr_remark FROM mu_store.patient_records INNER JOIN std_master.std_2014_15 ON mu_store.patient_records.customer_name = std_master.std_2014_15.account_name where pt_date = '$today' AND mu_store.patient_records.pt_type = 'IPD' ORDER BY std_master.std_2014_15.name";

$result_ipd = mysql_query($sql_ipd);
$count_ipd = '0';	
	
//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$ipd_total=mysql_num_rows($result_ipd);

$body .='
<p align=left><font color=darkblue><b>Patient Type :</b></font> IPD &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Total Records : </b></font>'.$ipd_total.'</p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:50px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Class</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:20px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Complaint</th>
<th style="border-width:1px; width:20px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Prescription</th>
<th style="border-width:1px; width:50px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dr_Remark</th>
</tr>';

while($data_ipd = mysql_fetch_array($result_ipd))
   {
$count_ipd++;

$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_ipd.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_ipd['name'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_ipd['class'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_ipd['house'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_ipd['complaint'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_ipd['prescription'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_ipd['dr_remark'].'</td>
</tr>
'
;}

$body .= <<<END
</table>
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

$mail->Subject    = "Daily Report - Medical Unit";

$mail->AltBody    = "Daily Report - Medical Unit"; // optional, comment out and test

$mail->MsgHTML($body);

$address_a = "shailesh.shirali@gmail.com";
$address_b = "amreshkr@gmail.com";
$address1 = "prabhatbharat@gmail.com";
$address3 = "drpradnyavirnak@gmail.com";
$address4 = "mivandan@gmail.com";
$address5 = "sahyadrischool@gmail.com";
$address6 = "ramu1949@gmail.com";
$address7 = "milindgmore@gmail.com";
$address8 = "sahyadri.server@gmail.com";

$mail->AddAddress($address_a, "Shailesh Shirali");
$mail->AddAddress($address_b, "Amresh Kumar");
$mail->AddAddress($address1, "Prabhat Kumar");
$mail->AddAddress($address3, "Pradnya Virnak");
$mail->AddAddress($address4, "Vandan Soundattikar");
$mail->AddCC($address5, "Sahyadri School");
$mail->AddCC($address6, "P Ramesh");
$mail->AddCC($address7, "Milind More");
$mail->AddCC($address8, "Sahyadri server");


$mail->AddAttachment("images/ss.gif");      // attachment
//$mail->AddAttachment("images/ss.gif"); // attachment

if(!$mail->Send()) {}

//******************************************** SMTP SETTINGS END ***********************************************************************//
?>
