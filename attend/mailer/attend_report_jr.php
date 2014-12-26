<?php

//******************************************* "A, L, H ,M" Report start ***************************************************************//
//$today = date("Y-m-d");

$today = date("Y-m-d", strtotime("-1 day"));

$body = <<<END
<html>
<head>
<title>Attendance daily report</title>
</head>
<body style="font-family:verdana,arial,sans-serif; font-size:11px;">
<p align=center><font color=black size=3>Sahyadri School</font><br><font color=gray size=2>krishnamurti foundation india</font></p>
<p align=center><font color=darkblue><b>Attendance Report (4th to 6th ) </b>: PT, Games & Yoga &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Date </b>- $today &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</font></p>
<hr color="red" size="2">
<p align=left><b>Attend Code - </b>Absent = A, Medical = M, Home = H, Late = L</p>
<hr color="orange" size="2">
END;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

include("connect.php");

//-------------------------------------------------------PT attendance area -----------------------------------------------------//
$sql = "SELECT * FROM attend WHERE attend_code != 'P' AND school_date = '$today' AND st_area = 'PT' AND st_class IN (4,5,6) ORDER BY st_house, st_name";

$result = mysql_query($sql);	
$count_pt = '0';

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$pt_total=mysql_num_rows($result);

$body .='
<br><p><font color=darkblue><b>Area - </b></font>PT &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Total Records - </b></font>'.$pt_total.' &nbsp; </p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:100px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name </th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Class</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Area</th>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Attend</th>
<th style="border-width:1px; width:30px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Remark</th>
</tr>';
	
while($data = mysql_fetch_array($result))
   {
$count_pt++;
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_pt.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['st_name'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['st_class'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['st_house'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['st_area'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['attend_code'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data['coment'].'</td>
</tr>';
}
$body .= <<<END
</table>
<br>
<hr color="orange" size="1">
END;


//-----------------------------------------------------------GAMES attendance area-----------------------------------------------//
$sql1 = "SELECT * FROM attend WHERE attend_code != 'P' AND school_date = '$today' AND st_area = 'Games' AND st_class IN (4,5,6) ORDER BY st_house, st_name";

$result1 = mysql_query($sql1);	
$count_games = '0';

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$games_total=mysql_num_rows($result1);

$body .='
<br><p><font color=darkblue><b>Area - </b></font>Games &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Total Records - </b></font>'.$games_total.'</p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:100px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name </th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Class</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Area</th>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Attend</th>
<th style="border-width:1px; width:30px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Remark</th>
</tr>';

while($data1 = mysql_fetch_array($result1))
   {
$count_games++;
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_games.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data1['st_name'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data1['st_class'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data1['st_house'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data1['st_area'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data1['attend_code'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data1['coment'].'</td>
</tr>';
   }
$body .= <<<END
</table>
<br>
<hr color="orange" size="1">
END;

//-----------------------------------------------------------Yoga attendance area--------------------------------------------------//
$sql2 = "SELECT * FROM attend WHERE attend_code != 'P' AND school_date = '$today' AND st_area = 'Yoga' AND st_class IN (4,5,6) ORDER BY st_house, st_name";

$result2 = mysql_query($sql2);	
$count_yoga = '0';

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$yoga_total=mysql_num_rows($result2);

$body .='
<br><p><font color=darkblue><b>Area - </b></font>Yoga &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Total Records - </b></font>'.$yoga_total.'</p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:100px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name </th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Class</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Area</th>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Attend</th>
<th style="border-width:1px; width:30px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Remark</th>
</tr>';
	
while($data2 = mysql_fetch_array($result2))
   {
$count_yoga++;
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_yoga.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data2['st_name'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data2['st_class'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data2['st_house'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data2['st_area'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data2['attend_code'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data2['coment'].'</td>
</tr>';
   }


$body .= <<<END
</table>
<br>
<hr color="orange" size="1">
END;

//***********************  hobby classes attendance weekly report start ***************************//
$monday = date("l");

if($monday == "Thursday")
{
$start_date = date('Y-m-d', strtotime('last monday -7 day'));
$end_date   = date('Y-m-d', strtotime('last sunday'));

$body .= <<<END
<br>
<p align=center><font color=darkblue><b>Hobby Attendance Report </b>: Bharatnatyam, Sitar & Guitar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>Date </b>- $end_date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</font></p>
<hr color="red" size="2">
END;

//-----------------------------------------------------------Bharatnatyam attendance area--------------------------------------------------//
$sql3 = "SELECT * FROM attend WHERE attend_code != 'P' AND school_date BETWEEN '$start_date' AND '$end_date' AND st_area = 'Bharatnatyam' AND st_class IN (4,5,6) ORDER BY st_house, st_name";

$result3 = mysql_query($sql3);	

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$Bharatnatyam_total=mysql_num_rows($result3);

$count_Bharatnatyam = '0';

$body .='
<br><p><font color=darkblue><b>Area - </b></font>Bharatnatyam &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Total Records - </b></font>'.$Bharatnatyam_total.'</p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:100px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name </th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Class</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Area</th>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Attend</th>
<th style="border-width:1px; width:30px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Remark</th>
</tr>';
	
while($data3 = mysql_fetch_array($result3))
   {
$count_Bharatnatyam++;
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_Bharatnatyam.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data3['st_name'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data3['st_class'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data3['st_house'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data3['st_area'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data3['attend_code'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data3['coment'].'</td>
</tr>';
   }
$body .= <<<END
</table>
<br>
<hr color="orange" size="1">
END;

//-----------------------------------------------------------Sitar attendance area--------------------------------------------------//
$sql4 = "SELECT * FROM attend WHERE attend_code != 'P' AND school_date BETWEEN '$start_date' AND '$end_date' AND st_area = 'Sitar' AND st_class IN (4,5,6) ORDER BY st_house, st_name";

$result4 = mysql_query($sql4);	

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$Sitar_total=mysql_num_rows($result4);

$count_Sitar = '0';

$body .='
<br><p><font color=darkblue><b>Area - </b></font>Sitar &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Total Records - </b></font>'.$Sitar_total.'</p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:100px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name </th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Class</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Area</th>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Attend</th>
<th style="border-width:1px; width:30px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Remark</th>
</tr>';
	
while($data4 = mysql_fetch_array($result4))
   {
$count_Sitar++;
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_Sitar.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data4['st_name'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data4['st_class'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data4['st_house'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data4['st_area'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data4['attend_code'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data4['coment'].'</td>
</tr>';
   }

$body .= <<<END
</table>
<br>
<hr color="orange" size="1">
END;

//-----------------------------------------------------------Guitar attendance area--------------------------------------------------//
$sql5 = "SELECT * FROM attend WHERE attend_code != 'P' AND school_date BETWEEN '$start_date' AND '$end_date' AND st_area = 'Guitar' AND st_class IN (4,5,6) ORDER BY st_house, st_name";

$result5 = mysql_query($sql5);	

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$Guitar_total=mysql_num_rows($result5);

$count_Guitar = '0';

$body .='
<br><p><font color=darkblue><b>Area - </b></font>Guitar &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Total Records - </b></font>'.$Guitar_total.'</p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:100px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name </th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Class</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Area</th>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Attend</th>
<th style="border-width:1px; width:30px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Remark</th>
</tr>';
	
while($data5 = mysql_fetch_array($result5))
   {
$count_Guitar++;
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_Guitar.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data5['st_name'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data5['st_class'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data5['st_house'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data5['st_area'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data5['attend_code'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data5['coment'].'</td>
</tr>';
}
$body .= <<<END
</table>
END;

//-----------------------------------------------------------Piano attendance area--------------------------------------------------//
$piano_start_date = date('Y-m-d', strtotime('this week'));
$piano_end_date   = date('Y-m-d', strtotime('this week +4 days'));

$sql6 = "SELECT * FROM attend WHERE attend_code != 'P' AND school_date BETWEEN '$piano_start_date' AND '$piano_end_date' AND st_area = 'Piano' AND st_class IN (4,5,6) ORDER BY st_house, st_name";

$result6 = mysql_query($sql6);	

//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$Piano_total=mysql_num_rows($result6);

$count_Piano = '0';

$body .='
<br><p><font color=darkblue><b>Area - </b></font>Piano &nbsp; <font color=red>|</font> &nbsp; <font color=darkblue><b>Total Records - </b></font>'.$Piano_total.'</p>
<table style="font-family:verdana,arial,sans-serif; font-size:11px; width:100%; color:#333333; border-width:1px; border-color:#FDF5E6; border-collapse: collapse;">
<tr bgcolor=#BDF4CB>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Sr. No.</th>
<th style="border-width:1px; width:100px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Student Name </th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Class</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Dorm</th>
<th style="border-width:1px; width:5px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Area</th>
<th style="border-width:1px; width:10px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Attend</th>
<th style="border-width:1px; width:30px; padding:8px; border-style:solid; border-color:#666666; background-color:#BDF4CB;">Remark</th>
</tr>';
	
while($data6 = mysql_fetch_array($result6))
   {
$count_Piano++;
$body .=' 
<tr>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$count_Piano.'</td>
<td style="border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['st_name'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['st_class'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['st_house'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['st_area'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['attend_code'].'</td>
<td style="text-align:center; border-width:1px; padding:8px; border-style:solid; border-color:#666666; background-color:#FDF5E6;">'.$data6['coment'].'</td>
</tr>';
}
$body .= <<<END
</table>
<br>
<hr color="orange" size="1">
END;
}

$body .= <<<END
</table>
<br>
<hr color="orange" size="1">
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

$mail->Subject    = "Daily Report - Attendance";

$mail->AltBody    = "Daily Report - Attendance"; // optional, comment out and test

$mail->MsgHTML($body);

$address="anjalikrishna@gmail.com";
$address1 = "sahyadri.server@gmail.com";

$mail->AddAddress($address, "Anjali Krishna");
$mail->AddAddress($address1, "Sahyadri server");

//$address = "bhaugha@gmail.com";
//$mail->AddAddress($address, "Bhau Ghadge");

if(!$mail->Send()) {}

//******************************************** SMTP SETTINGS END ***********************************************************************//

?>


