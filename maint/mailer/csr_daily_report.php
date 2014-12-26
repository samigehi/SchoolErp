<?php
//******************************************* DAILY REPORT SETTING ***************************************************************//
$yesterday = date("Y-m-d", strtotime("-1 day"));
$today = date("Y-m-d");

$body = <<<END
<html>
<head>
<title>Com / Sug / Req</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">
<p align=center><font color=black size=3>Sahyadri School</font><br><font color=gray size=2>krishnamurti foundation india</font></p>
<p align=center><font color=darkblue><b>CSR Daily Report</b></font></p>
<hr color=orange>
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

$sql_csr = "SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today')"; //filter complaints / suggestions / requests

$result_csr = mysql_query($sql_csr);
$count_csr = '0';	

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$csr_total=mysql_num_rows($result_csr);

$body .=' 	
<p align=left> <font color=darkblue><b>Date : </b></font>'.$today.' &nbsp; <font color=red> | </font> &nbsp; 

<font color=darkblue><b>Total Records : </b></font>'.$csr_total.' </p>

<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Date</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Name</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Location</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dept</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">CSR</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Details of CSR</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dept Remark</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Current progress</th>
</tr>';

while($data_1 = mysql_fetch_array($result_csr))
   {
$count_csr++;
$id_1 = $data_1['id'];
$name_1 = $data_1['name'];

$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_csr.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_1['compldate'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'."<a href=\"http://fileserver/maint/update.php?id=$id_1\"><b>$name_1</b></a>".'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_1['location'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_1['department'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_1['compldetails'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_1['description'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_1['coremark'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#D9F3FF;">'.$data_1['currentpro'].'</td>
</tr>
';
}

$body .= <<<END
</table>
<br><br>
END;


/******************************************* UNCOMPLITED COM / SUG / REQ REPORT ***************************************************************/
$completed = 'completed';

$sql_cnt = "SELECT * FROM maint WHERE currentpro != '$completed'"; //filter complaints / suggestions / requests

$result_cnt = mysql_query($sql_cnt);	
$count_cnt = '0';

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$cnt_total=mysql_num_rows($result_cnt);

$body .=' 	
<p align=center><font color=darkblue><b> Uncompleted / Not updated CSR </b></font></p>
<hr color=orange>
<p align=left><font color=darkblue><b>Date : </b></font>'.$today.' &nbsp; <font color=red> | </font> &nbsp; 

<font color=darkblue><b>Total Records : </b></font>'.$cnt_total.' </p>

<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Date</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Name</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Location</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dept</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">CSR</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Details of CSR</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dept Remark</th>
<th style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Current progress</th>
</tr>';

while($data_2 = mysql_fetch_array($result_cnt))
   {
$count_cnt++;
$id_2 = $data_2['id'];
$name_2 = $data_2['name'];
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_cnt.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_2['compldate'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'."<a href=\"http://fileserver/maint/update.php?id=$id_2\"><b>$name_2</b></a>".'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_2['location'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_2['department'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_2['compldetails'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_2['description'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data_2['coremark'].'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#D9F3FF;">'.$data_2['currentpro'].'</td>
</tr>
';
}
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

$mail->Subject    = "Daily Report - Com / Sug / Req";

$mail->AltBody    = "Daily Report - Com / Sug / Req"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "shailesh.shirali@gmail.com";
$address1 = "ramu1949@gmail.com";
$address2 = "amreshkr@gmail.com";
$address3 = "prabhatbharat@gmail.com";
$address4 = "gbhosale56@gmail.com";
$address5 = "milindgmore@gmail.com";
$address6 = "dilipsksi@gmail.com";
$address7 = "unpasarkar@gmail.com";
$address8 = "sahyadri.server@gmail.com";

$mail->AddAddress($address4, "Gopal Bhosale");
$mail->AddAddress($address5, "Milind More");
$mail->AddAddress($address6, "Dilip shelar");
$mail->AddAddress($address7, "Usha Pasarkar");

$mail->AddCC($address, "Shailesh Shirali");
$mail->AddCC($address1, "P Ramesh");
$mail->AddCC($address2, "Amresh Kumar");
$mail->AddCC($address3, "Prabhat Kumar");
$mail->AddBCC($address8, "Sahyadri Server");

$mail->AddAttachment("images/ss.gif");      // attachment
//$mail->AddAttachment("images/ss.gif"); // attachment

if(!$mail->Send()) {}

//******************************************** SMTP SETTINGS END ***********************************************************************//
?>
