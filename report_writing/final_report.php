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
?>
<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false" title="print this page"><img src='images2/print.png' border='0' alt='pdf'></a>
<div id="printme">
<?php
$html = '
<body style="font-family: 10px/1.3 Gill Sans,My Gill Sans,sans-serif;">
<div style="margin:50px; border-radius:15px; height:820px; border:1px solid gray; margin-right:50px; text-align:center;">

<h2 style="margin-top:110px; font-family:Georgia, Sans Serif; color:black; background:none;" align=center>'.$report_term.'</h2><br><br>

<h3 align=center style="font-family:Georgia, Sans Serif; background:none;">Academic Session '.$year.'</h3>
<h3 align=center style="font-family:Georgia, Sans Serif; background:none;">'.$term.'</h3><br>

<img style="padding:1px; margin-top:200px; border:0px;" height="60px" width="230px;" src="images2/ssmain.png">
<div style="letter-spacing:7px; margin-top:1px;">sahyadri school</div>
<div style="letter-spacing:1px; margin-top:1px;">krishnamurti foundation india</div><br><br>

<p style="font-size:12px;">Tiwai Hill, Rajgurunagar, Pune - 410513.<br>
Telephone : 02135-306100, 288442, 288443<br>
Email : sahyadrischool@gmail.com, Web : www.sahyadrischool.org</p>
</div><br>

<!----------------------- Report Card header ----------------------------------------------->
<div align="right" style="margin-right:45px;">
<img style="padding:1px; border:0px;" height="88px" width="170px;" src="images2/sahyadri.png">
</div>
<h3 style="text-align:right; background:none; margin-right:45px;">'.$report_term.' - '.$year.'</h3>
<div style="margin-left:50px; margin-top:-20px; width:400px; float:left;"><h4 style="text-align:left;">'.trim($name).' (Adm. No:'.trim($adm).')</h4></div>

<div style="width:100px; margin-right:10px; margin-top:-20px; float:right;"><h4 style="text-align:left;"> Class: '.trim($class).'</h4></div>
<div style="clear:both;"></div>

<div style="margin-left:50px; margin-right:50px; float:left;">
<hr style="margin-top:-12px; width:100%; color:black; height:1px;"><br>
<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Class Teacher - '.trim($class_teacher_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($class_teacher).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">English - '.trim($english_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($english).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Hindi - '.trim($hindi_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($hindi).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Marathi - '.trim($marathi_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($marathi).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">History - '.trim($history_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($history).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Geography - '.trim($geography_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($geography).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Mathematics - '.trim($maths_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($maths).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Physics - '.trim($physics_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($physics).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Chemistry - '.trim($chemistry_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($chemistry).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Biology - '.trim($biology_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($biology).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Music - '.trim($music_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($music).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">Art - '.trim($art_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($art).'</p><br>

<div style="font-weight:bold; padding:5px; background:lightgray; font-size:11px;">House Parent - '.trim($house_parent_teacher).'</div>
<p style="margin-top:1px; text-align:justify; margin-left:15px;">'.trim($house_parent).'</p><br>
<br><br>

<div style="margin-left:25px; margin-top:60px; width:150px; font-weight:bold; float:left;">
<p><b>Principal<br>
Shailesh Shirali</b></p>
</div>

<div style="width:180px; margin-top:60px; font-weight:bold; float:right;">
<p><b>Class Teacher<br>
'.$class_teacher_teacher.'</b></p>
</div>
<div style="clear:both;"></div>

<br>
<hr style="width:100%; color:black; height:1px;">
<br>
</div>
';

echo $html;

}
?>
</html>
