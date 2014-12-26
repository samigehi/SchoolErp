<?php
//saturday summary//
$saturday = date("l");

if($saturday == "Tuesday")
{
//$start_date = date('Y-m-d', strtotime('last monday'));

$start_date = '2013-06-21';
$end_date = date('Y-m-d');
}
$body = <<<END
<html>
<head>
<title>Attendance Weekly Summary</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">
<p align=center><font color=black size=3>Sahyadri School</font><br><font color=gray size=2>krishnamurti foundation india</font></p>
<p align=center><font color=darkblue><b>Attendance Weekly Summary </b>: PT, Games & Yoga </font></p>
<hr color="orange" size="1">
<p align=left><b>Attend Code - </b>Absent = A, Medical = M, Home = H, Late = L</p>
<hr color="orange" size="1">
END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

include("connect.php");

$sql = "SELECT st_name, st_house, st_area,
COUNT(attend_code) AS `A`
FROM attend WHERE attend_code = 'A' AND st_area = 'PT' AND school_date BETWEEN '$start_date' AND '$end_date'
GROUP BY st_name HAVING A>'2'
ORDER BY st_house";

$result6 = mysql_query($sql);

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$summary_total=mysql_num_rows($result6);

$count_summary = '0';

$body .='
<br><p><font color=darkblue><b>Area - </b></font>PT &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Total Records - </b></font>'.$summary_total.' &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Date - </b></font> '.$start_date.' to '.$end_date.' </p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:100px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name </th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Area</th>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">A</th>
</tr>';

while($data6 = mysql_fetch_array($result6))
   {
$count_summary++;
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_summary.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['st_name'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['st_house'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['st_area'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['A'].'</td>
</tr>';
}

$body .= <<<END
</table>
<br>
<hr color="orange" size="1">
END;


$body .= <<<END
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

$mail->Subject    = "Weekly Summary - Attendance";

$mail->AltBody    = "Weekly Summary - Attendance"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "bhaugha@gmail.com";
$mail->AddAddress($address, "Bhau Ghadge");

if(!$mail->Send()) {}

//******************************************** SMTP SETTINGS END ***********************************************************************//

?>
