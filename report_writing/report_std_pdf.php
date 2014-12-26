<?php

include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2')
{
$user_name = $_SESSION['user_name'];
include("connect.php");

$today = date("d F Y");
//edit the Term and Year
$report_term = "Spring Term Report";
$year = "2014-15";
$term = "November 25, 2014 to March 28, 2015";



$adm = $_GET['adm'];

$qP = "SELECT * FROM spring_2015 WHERE adm = '$adm'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

$html = '
<body style="font-family: 1em/1.3 Gill Sans,My Gill Sans,sans-serif;">
<div style="margin:50px; border-radius:15px; height:1200px; border:1px solid gray; margin-right:50px; text-align:center;">

<h2 style="margin-top:150px; font-family:Georgia, Sans Serif;" align=center>'.$report_term.'</h2><br><br>

<h3 align=center style="font-family:Georgia, Sans Serif;">Academic Session '.$year.'</h3>
<h3 align=center style="font-family:Georgia, Sans Serif;">'.$term.'</h3><br>

<img style="padding:1px; margin-top:300px; border:0px;" height="60px" width="230px;" src="images2/ssmain.png">
<div style="letter-spacing:7px; margin-top:1px;">sahyadri school</div>
<div style="letter-spacing:1px; margin-top:1px;">krishnamurti foundation india</div><br><br>

<p style="font-size:12px;">Tiwai Hill, Rajgurunagar, Pune - 410513.<br>
Telephone : 02135-306100, 288442, 288443<br>
Email : sahyadrischool@gmail.com, Web : www.sahyadrischool.org</p>

</div>
';

$html .= '
<!----------------------- Report Card header ----------------------------------------------->
<div align="right" style="margin-right:45px;">
<img style="padding:1px; border:0px;" height="88px" width="170px;" src="images2/sahyadri.png">
</div>
<h3 style="text-align:right; margin-right:45px;">'.$report_term.' - '.$year.'</h3>
<div style="margin-left:50px; width:400px; float:left;"> <h4 style="text-align:left;">'.trim($name).' (Adm. No:'.trim($adm).')</h4></div>
<div style="width:100px; margin-right:22px; float:right;"><h4 style="text-align:left;"> Class: '.trim($class).'</h4></div></div>

<hr style="margin-top:-12px; margin-left:50px; width:88%; color:black; height:3px;">

<div style="margin-left:50px; margin-right:50px; float:left;">

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Class Teacher - '.trim($class_teacher_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($class_teacher).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">English - '.trim($english_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($english).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Hindi - '.trim($hindi_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($hindi).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Marathi - '.trim($marathi_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($marathi).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">History - '.trim($history_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($history).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Geography - '.trim($geography_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($geography).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Mathematics - '.trim($maths_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($maths).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Physics - '.trim($physics_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($physics).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Chemistry - '.trim($chemistry_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($chemistry).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Biology - '.trim($biology_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($biology).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Music - '.trim($music_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($music).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">Art - '.trim($art_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($art).'</p>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:13px;">House Parent - '.trim($house_parent_teacher).'</div>
<p style="margin-top:1px; margin-left:20px;">'.trim($house_parent).'</p>
<br>

<div style="margin-left:25px; margin-top:60px; width:150px; font-weight:bold; float:left;">
<p>Principal<br>
Shailesh Shirali</p>
</div>

<div style="width:150px; margin-top:60px; font-weight:bold; float:right;">
<p>Class Teacher<br>
'.$class_teacher_teacher.'</p>
</div>
<br><br>
</div>
</div>
';

//==============================================================
//==============================================================
//==============================================================

include("app_pdf/mpdf.php");

$mpdf=new mPDF('c','A4'); 

$mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins (1 or 0)

$mpdf->SetDisplayMode('fullpage','two');


//$mpdf->setHTMLFooter('<hr style="margin-top:-12px; margin-left:50px; width:87%; color:black; height:1px;"><div align="right" style="font-size:10px; margin-right:50px;"><b><i>Page {PAGENO} of {nbpg}</i></b><br></div>', 'O');

$mpdf->setHTMLFooter('<div align="center" style="font-size:10px;"><hr style="margin-top:-12px; width:87%; color:black; height:1px;"><b><i>Page {PAGENO} of {nbpg}</i></b><br></div>', 'E') ;

$mpdf->WriteHTML($html);

$filename= 'Report_'.$name.'_'.$adm;

$mpdf->Output($filename.'.pdf','D');
exit;

//==============================================================
//==============================================================
//==============================================================

}
?>
