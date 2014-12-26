<html>
<head>
<title>Report writing main page...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>

 <div align="center" class="img1" style="margin-top:5%;">
<h1 style="font-size:26px; color:#0000CD; font-family:Trebuchet MS, Helvetica, sans-serif;">Report writing system</h1>
<hr color="orange" size="1" width="28%" style="margin-top:-18px;">
<br><br>
</div>
<?php
include ('connect.php');
$today = date('Y-m-d');
include("connect.php");
$qP = "SELECT date_format(teach_date_start,'%d %b, %Y') teach_date_start,  date_format(teach_date_end,'%d %b, %Y') teach_date_end, date_format(edit_date_start,'%d %b, %Y') edit_date_start, date_format(edit_date_end,'%d %b, %Y') edit_date_end, date_format(final_date,'%d %b, %Y') final_date FROM report_date";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);
$teach_date_start = trim($teach_date_start);
$teach_date_end = trim($teach_date_end);
$edit_date_start = trim($edit_date_start);
$edit_date_end = trim($edit_date_end);
$final_date = trim($final_date);
$today = time();
?>

<div style="width:50%; padding:20px; border: 1px solid orange; border-radius:25px; margin:auto auto auto auto;">
<h3>Spring Term 2014-15</h3>
<table class=table1>
<tr>
<th class=th1>Report Process</th>
<th class=th1>Date</th>
<th class=th1>Day's Left</th>
</tr>

<tr>
<td class=td1><b>Writing start</b></td>
<td class=td1><?php echo $teach_date_start;?></td>
<td class=td1></td>
</tr>

<tr>
<td class=td1><b>Writing end</b></td>
<td class=td1><?php echo $teach_date_end;?></td>
<td class=td1 align="center"><?php $teach_end_days = strtotime($teach_date_end)-$today; echo floor($teach_end_days/(60*60*24));?></td>
</tr>

<tr>
<td class=td1><b>Editing start</b></b></td>
<td class=td1><?php echo $edit_date_start;?></td>
<td class=td1></td>
</tr>
<tr>
<td class=td1><b>Editing end</b></td>
<td class=td1><?php echo $edit_date_end;?></td>
<td class=td1 align="center"><?php $edit_end_days = strtotime($edit_date_end)-$today; echo floor($edit_end_days/(60*60*24));?></td>
</tr>

</tr>
<td class=td1><b>Final</b></td>
<td class=td1><?php echo $final_date;?></td>
<td class=td1 align="center"><?php $final_date_days = strtotime($final_date)-$today; echo floor($final_date_days/(60*60*24));?></td>
</tr>
</table>
</div>

<div align="center"><br>
<a href="index.php">
<img src="images2/enter.gif" height="21" width="63" border="0" alt="enter"/>
 </a>
</div>

<?php
mysql_close();
?>
</body>
</html>




