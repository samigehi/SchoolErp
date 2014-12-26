<html>
<head>
<title>sort attendance...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php

include("index.php");

include("connect.php");

if(isset($_POST["st_area"]))
{
 $ss_area = $_POST["st_area"];
}

if(!isset($_POST["st_area"]))
{
 $ss_area = "";
}

if(isset($_POST["st_house"]))
{
 $ss_att = $_POST["st_house"];
}

if(!isset($_POST["st_house"]))
{
 $ss_att = "";
}

if(isset($_POST["attend_code"]))
{
 $attend_code = $_POST["attend_code"];
}

if(!isset($_POST["attend_code"]))
{
 $attend_code = "";
}

if (!isset($_POST['fromdate'])){

$fromdate = date('Y-m-d');

$todate = date('Y-m-d');
}

if (isset($_POST['fromdate'])){

$fromdate = $_POST['fromdate'];

$todate = $_POST['todate'];
}
?>

<div style="float:left; width:98%; padding:10px; background-color:#FDF5E6; border:1px #98AFC7 solid;">

<form method="post" action="<?php $_SERVER['PHP_SELF']?>">

&nbsp; &nbsp; &nbsp; &nbsp; From : <input id="demo8" style="text-align:center; background-color:#D4EDF7;" size="10" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo8','yyyyMMdd')" style="cursor:pointer"/> &nbsp; 

To : <input style="text-align:center; background-color:#D4EDF7;" id="demo9" size="10" class="text1" type="text" name="todate" value="<?php echo $todate;?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo9','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;


<font color=red><b> * </b></font> Dorm : <Select NAME="st_house">
<Option style="margin:5px; padding-left: 10px;" VALUE="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="Alaknanda" <?php if($ss_att == "Alaknanda") echo " selected"; ?>> Alaknanda </option>
<option style="margin:5px; padding-left: 10px;" value="Indrayani" <?php if($ss_att == "Indrayani") echo " selected"; ?>> Indrayani </option>
<option style="margin:5px; padding-left: 10px;" value="Himadri" <?php if($ss_att == "Himadri") echo " selected"; ?>> Himadri </option>
<option style="margin:5px; padding-left: 10px;" value="Jaintia" <?php if($ss_att == "Jaintia") echo " selected"; ?>> Jaintia </option>
<option style="margin:5px; padding-left: 10px;" value="Kritika" <?php if($ss_att == "Kritika") echo " selected"; ?>> Kritika </option>
<option style="margin:5px; padding-left: 10px;"value="Palash" <?php if($ss_att == "Palash") echo " selected"; ?>> Palash </option>
<option style="margin:5px; padding-left: 10px;" value="Phalguni" <?php if($ss_att == "Phalguni") echo " selected"; ?>> Phalguni </option>
<option style="margin:5px; padding-left: 10px;" value="Shivneri" <?php if($ss_att == "Shivneri") echo " selected"; ?>> Shivneri </option>
<option style="margin:5px; padding-left: 10px;" value="Shravani" <?php if($ss_att == "Shravani") echo " selected"; ?>> Shravani </option>
<option style="margin:5px; padding-left: 10px;" value="Torna" <?php if($ss_att == "Torna") echo " selected"; ?>> Torna </option>
<option style="margin:5px; padding-left: 10px;" value="Vishakha"<?php if($ss_att == "Vishakha") echo " selected"; ?>> Vishakha </option>
<option style="margin:5px; padding-left: 10px;" value="BD1"<?php if($ss_att == "BD1") echo " selected"; ?>> BD1 </option>
<option style="margin:5px; padding-left: 10px;" value="BD2"<?php if($ss_att == "BD2") echo " selected"; ?>> BD2 </option>
</Select> &nbsp; &nbsp;



<font color=red><b> * </b></font> Area : <Select NAME="st_area">
<Option style="margin:5px; padding-left: 10px;" VALUE="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="4" <?php if($ss_area == "4") echo " selected"; ?>> class 4 </option>
<option style="margin:5px; padding-left: 10px;" value="5" <?php if($ss_area == "5") echo " selected"; ?>> class 5 </option>
<option style="margin:5px; padding-left: 10px;" value="6A" <?php if($ss_area == "6A") echo " selected"; ?>> class 6A </option>
<option style="margin:5px; padding-left: 10px;" value="6B" <?php if($ss_area == "6B") echo " selected"; ?>> class 6B </option>
<option style="margin:5px; padding-left: 10px;" value="7A" <?php if($ss_area == "7A") echo " selected"; ?>> class 7A </option>
<option style="margin:5px; padding-left: 10px;" value="7B" <?php if($ss_area == "7B") echo " selected"; ?>> class 7B </option>
<option style="margin:5px; padding-left: 10px;" value="8A" <?php if($ss_area == "8A") echo " selected"; ?>> class 8A </option>
<option style="margin:5px; padding-left: 10px;" value="8B" <?php if($ss_area == "8B") echo " selected"; ?>> class 8B </option>
<option style="margin:5px; padding-left: 10px;" value="9A" <?php if($ss_area == "9A") echo " selected"; ?>> class 9A </option>
<option style="margin:5px; padding-left: 10px;" value="9B" <?php if($ss_area == "9B") echo " selected"; ?>> class 9B </option>
<option style="margin:5px; padding-left: 10px;" value="10A" <?php if($ss_area == "10A") echo " selected"; ?>> class 10A </option>
<option style="margin:5px; padding-left: 10px;" value="10B" <?php if($ss_area == "10B") echo " selected"; ?>> class 10B </option>
<option style="margin:5px; padding-left: 10px;" value="11" <?php if($ss_area == "11") echo " selected"; ?>> class 11 </option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam" <?php if($ss_area == "Bharatnatyam") echo " selected"; ?>>Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar" <?php if($ss_area == "Guitar") echo " selected"; ?>>Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Games" <?php if($ss_area == "Games") echo " selected"; ?>>Games</option>
<option style="margin:5px; padding-left: 10px;" value="Piano" <?php if($ss_area == "Piano") echo " selected"; ?>>Piano</option>
<option style="margin:5px; padding-left: 10px;" value="PT" <?php if($ss_area == "PT") echo " selected"; ?>>PT</option>
<option style="margin:5px; padding-left: 10px;" value="Sitar" <?php if($ss_area == "Sitar") echo " selected"; ?>>Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla" <?php if($ss_area == "Tabla") echo " selected"; ?>>Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Yoga" <?php if($ss_area == "Yoga") echo " selected"; ?>>Yoga</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music" <?php if($ss_area == "Vocal Music") echo " selected"; ?>>Vocal Music</option>
</Select>

<font color=red><b> * </b></font> Attend : <Select NAME="attend_code">
<option style="padding-left: 10px;" value="P" <?php if($attend_code == "P") echo " selected"; ?>>P</option>
<option style="padding-left: 10px;" value="A" <?php if($attend_code == "A") echo " selected"; ?>>A</option>
<option style="padding-left: 10px;" value="L" <?php if($attend_code == "L") echo " selected"; ?>>L</option>
<option style="padding-left: 10px;" value="M" <?php if($attend_code == "M") echo " selected"; ?>>M</option>
<option style="padding-left: 10px;" value="H" <?php if($attend_code == "H") echo " selected"; ?>>H</option>
</select>

&nbsp; &nbsp; <input type="submit" name="submit" value="Go"> 
</form>
</div>
<div class="clear"></div>
</div>
</div>

<?php

if (isset($_POST['submit']))
{
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$st_area = $_POST['st_area'];
$st_house = $_POST['st_house'];
$attend_code = $_POST['attend_code'];


$data = mysql_query("SELECT * FROM attend WHERE st_area LIKE '%$st_area%' AND attend_code LIKE '%$attend_code%' AND st_house LIKE '%$st_house%' AND school_date BETWEEN '$fromdate' AND '$todate' ORDER BY st_class, st_name");
?>

	<div class="contentB">
	<table class=table1 >
	<tr>
	<th class=th1 style="width:5px;">Sr. No.</th>
	<th class=th1 style="width:10px;">Date</th>
	<th class=th1 style="width:100px;">Name</th>
	<th class=th1 style="width:10px;">Adm No</th>	
	<th class=th1 style="width:5px;">Class</th>		
	<th class=th1 style="width:10px;">House</th>
	<th class=th1 style="width:10px;">Area</th>
	<th class=th1 style="width:5px;">Attd</th>
	<th class=th1 style="width:50px;">Remark</th>
	<th class=th1 style="width:10px;">Option</th>
	</tr>

	<?php
	$count = '0';
	 //And display the results
	while($result = mysql_fetch_array( $data ))			
	{
	$count++;
 	include('search3.php');
	 }
	?>
	</table>
	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	if ($anymatches == 0) 
	 {
	 echo "No entries found matching your query";
	 }
	echo "<br>[ <b>Record Found : </b> <font color=red>$anymatches</font> ]";
  	}
	mysql_close();
	 ?>

</body>
</html>

