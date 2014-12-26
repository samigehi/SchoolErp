 <?php
//********************************************************** Class = 10A & Dorm = Shivneri ***************************************************//  

//$today = date("d-m-Y");

$today = date("Y-m-d", strtotime("-1 day"));

$body = <<<END
<html>
<head>
<title>MU daily report</title>
</head>
<body>
<p align=center><font color=black size=3>Sahyadri School</font><br><font color=gray size=2>krishnamurti foundation india</font></p>
<p align=center><font color=darkblue><b>Medical Unit </b> - Daily Report &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Date </b>- $today &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <b>House </b> - Shivneri</font></p>
<hr color=orange>
<table style='font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;'>
<tr bgcolor=#BDF4CB>
<th style='border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Sr.No.</th>
<th style='border-width:1px; width:50px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'> Student Name </th>
<th style='border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Class</th>
<th style='border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Dorm</th>
<th style='border-width:1px; width:80px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Complaint</th>
<th style='border-width:1px; width:20px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Prescription</th>
<th style='border-width:1px; width:100px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;'>Dr_Remark</th>
</tr>
END;


//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

include("connect.php");

$house = "Shivneri";

$sql = "SELECT std_master.std_2014_15.name, std_master.std_2014_15.class, std_master.std_2014_15.house, mu_store.patient_records.complaint, mu_store.patient_records.prescription, mu_store.patient_records.dr_remark FROM mu_store.patient_records INNER JOIN std_master.std_2014_15 ON mu_store.patient_records.customer_name = std_master.std_2014_15.account_name where pt_date = '$today' AND std_master.std_2014_15.house = '$house' ORDER BY std_master.std_2014_15.name";

$result = mysql_query($sql);	
$count='';	
while($data = mysql_fetch_array($result))
   {
$count++;
$body .=' 
<tr>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FFC848;">'.$count.'</td>
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
</body>
</html>
END;

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

//$mail->AddReplyTo("sahyadri.server@gmail.com", "Sahyadri Server");

$mail->Subject    = "Daily Report - Medical Unit";

$mail->AltBody    = "Daily Report - Medical Unit"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "smriti.iyengar11@gmail.com";
$address3 = "sahyadri.server@gmail.com";

$mail->AddAddress($address, "Smriti Iyengar");
$mail->AddAddress($address3, "Sahyadri Server");

mysql_close();

if(!$mail->Send()) {}

//******************************************** SMTP SETTINGS END ***********************************************************************//
?>

