<html>
<head>
<title>add attendance...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
function autoSubmit()
{
    var formObject = document.forms['theForm'];
    formObject.submit();
}
</script>
</head>

<body>
<?php

include("index.php");

if(isset($_POST["ss_attend"]))
{
    $ss_attend = $_POST["ss_attend"];
}
if(!isset($_POST["ss_attend"]))
{
    $ss_attend = "";
}

if(isset($_POST["ss_class"]))
{
    $ss_class = $_POST["ss_class"];
}
if(!isset($_POST["ss_class"]))
{
    $ss_class = "";
} 

if(isset($_POST["ss_hobby"]))
{
    $ss_hobby = $_POST["ss_hobby"];
}
if(!isset($_POST["ss_hobby"]))
{
    $ss_hobby = "";
}

if(isset($_POST["ss_games"]))
{
    $ss_games = $_POST["ss_games"];
}
if(!isset($_POST["ss_games"]))
{
    $ss_games = "";
}

if(isset($_POST["ss_yoga"]))
{
    $ss_yoga = $_POST["ss_yoga"];
}
if(!isset($_POST["ss_yoga"]))
{
    $ss_yoga = "";
}

if(isset($_POST["ss_pt"]))
{
    $ss_pt = $_POST["ss_pt"];
}
if(!isset($_POST["ss_pt"]))
{
    $ss_pt = "";
}
include ("connect_1.php");
?> 
<div class="addform">
<div class="contentB">
<h3>Add Attendance</h3>
<font align=left class=message><font color=red>&nbsp;<b> * </b></font> Mandatory fields </font>
<hr align=left style="margin-top:-2px;" width=15% color=orange size=1>

<form method="post" action="" name="theForm">
<!-------------------------------------------------------- SELECT ATTENDANCE AREA ----------------------------------------------------->
<div class="row">
<div class="left_new"><font color=red><b> * </b></font> Select Area :</div>
<div class="right_new">
<SELECT NAME="ss_attend" onChange="autoSubmit();">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="class_attend" <?php if($ss_attend == "class_attend") echo " selected"; ?>>Class</option>
<option style="margin:5px; padding-left: 10px;" value="games_attend" <?php if($ss_attend == "games_attend") echo " selected"; ?>>Games</option>
<option style="margin:5px; padding-left: 10px;" value="hobby_attend" <?php if($ss_attend == "hobby_attend") echo " selected"; ?>>Hobby</option>
<option style="margin:5px; padding-left: 10px;" value="pt_attend" <?php if($ss_attend == "pt_attend") echo " selected"; ?>>PT</option>
<option style="margin:5px; padding-left: 10px;" value="yoga_attend" <?php if($ss_attend == "yoga_attend") echo " selected"; ?>>Yoga</option>
</SELECT>
</div>

<?php
if(isset($_POST["ss_attend"]))
{
if($ss_attend == "class_attend")
{
?>
<!------------------------------------------------------- CLASS ATTENDANCE AREA STARTED---------------------------------------------------->
<div class="row">
<div class="left_new"> &nbsp; <font color=red><b> * </b></font> Select Class :</div>
<div class="right_new">
<SELECT NAME="ss_class" onChange="autoSubmit();">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="4" <?php if($ss_class == "4") echo " selected"; ?>>Class 4</option>
<option style="margin:5px; padding-left: 10px;" value="5" <?php if($ss_class == "5") echo " selected"; ?>>Class 5</option>
<option style="margin:5px; padding-left: 10px;" value="6A" <?php if($ss_class == "6A") echo " selected"; ?>>Class 6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B" <?php if($ss_class == "6B") echo " selected"; ?>>Class 6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A" <?php if($ss_class == "7A") echo " selected"; ?>>Class 7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B" <?php if($ss_class == "7B") echo " selected"; ?>>Class 7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A" <?php if($ss_class == "8A") echo " selected"; ?>>Class 8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B" <?php if($ss_class == "8B") echo " selected"; ?>>Class 8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A" <?php if($ss_class == "9A") echo " selected"; ?>>Class 9A</option>
<option style="margin:5px; padding-left: 10px;" value="9B" <?php if($ss_class == "9B") echo " selected"; ?>>Class 9B</option>
<option style="margin:5px; padding-left: 10px;" value="10A" <?php if($ss_class == "10A") echo " selected"; ?>>Class 10A</option>
<option style="margin:5px; padding-left: 10px;" value="10B" <?php if($ss_class == "10B") echo " selected"; ?>>Class 10B</option>
<option style="margin:5px; padding-left: 10px;" value="11" <?php if($ss_class == "11") echo " selected"; ?>>Class 11</option>
</SELECT>
</div>
</form>

<form method="post" action="added.php" name="form2">
<div class="left_new">&nbsp; <font color=red><b> * </b></font> Date : </div>
<div class="right_new">

<input style="text-align:center; background-color:#D4EDF7;" id="demo20" size="10" class="text1" type="text" name="school_date" value="<?php echo date('Y-m-d');?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo20','yyyyMMdd')" style="cursor:pointer"/>

</div>
<div class="clear"></div>
</div>

<!------------------- Name SELECTION AREA ---------------------->
<?php 
if(isset($_POST["ss_class"]))
{
echo"
<table class=table1>
<tr bgcolor=#BDF4CB>
<th class=th1>Sr. No.</th>
<th class=th1>Name</th>
<th class=th1>Adm No</th>
<th class=th1>Class</th>
<th class=th1>House</th>
<th class=th1>Area</th>
<th class=th1>Attd</th>
<th class=th1>Remark</th>
</tr>";

	$ss_class = $_POST["ss_class"];
        $sql_class = "SELECT * FROM std_2014_15 WHERE profile_status = 'Studing' AND class = '$ss_class' ORDER BY name";
        $class_name = mysql_query($sql_class);
	$count1='0';
        while($row = mysql_fetch_array($class_name))	
        {
	$count1++;
	$st_name=$row['name'];
	$st_adm=$row['adm'];
	$st_class=$row['class'];
	$st_house=$row['house'];
echo'     
<tr>
<td class=td1 style="text-align:center;">'.$count1.'</td>
<td class=td1><input class="input1" name="st_name[]" id="st_name[]" value="'.$st_name.'" type="text" size="20" readonly="readonly" /></td>
<td class=td1><input class="input1" name="st_adm[]" id="st_adm[]" value="'.$st_adm.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_class[]" id="st_class[]" value="'.$st_class.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_house[]" id="st_house[]" value="'.$st_house.'" type="text" size="8" readonly="readonly"/></td>
<td class=td1><input style="text-align:center;" class="input1" name="st_area[]" id="st_area[]" value="'.$ss_class.'" type="text1" size="10" /></td>
<td align="center" class=td1><Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="M">M</option>
<option style="padding-left: 10px;" value="L">L</option>
<option style="padding-left: 10px;" value="H">H</option>
</select> </td>
<td align="center" class=td1><input name="coment[]" id="coment[]" type="text1" size="20" /></td>';
}
}
?>
            
</div>
</table>
<br>
<div align=center>
<input type="submit" name="submit_1" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1></div>
</div>
</form>
<?php	
}
}
?> 

<!------------------------------------------------------------ HOBBY CLASS ATTENDANCE AREA STARTED------------------------------------------------------>
<?php
if(isset($_POST["ss_attend"]))
{
if($ss_attend == "hobby_attend")
{
?>
<!------------------- HOBBY SELECTION AREA ---------------------->
<div class="row">
<div class="left_new"><font color=red><b> * </b></font> Select Class :</div>
<div class="right_new">
<SELECT NAME="ss_hobby" onChange="autoSubmit();">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="Bharatnatyam" <?php if($ss_hobby == "Bharatnatyam") echo " selected"; ?>>Bharatnatyam</option>
<option style="margin:5px; padding-left: 10px;" value="Guitar" <?php if($ss_hobby == "Guitar") echo " selected"; ?>>Guitar</option>
<option style="margin:5px; padding-left: 10px;" value="Piano" <?php if($ss_hobby == "Piano") echo " selected"; ?>>Piano</option>
<option style="margin:5px; padding-left: 10px;" value="Sitar" <?php if($ss_hobby == "Sitar") echo " selected"; ?>>Sitar</option>
<option style="margin:5px; padding-left: 10px;" value="Tabla" <?php if($ss_hobby == "Tabla") echo " selected"; ?>>Tabla</option>
<option style="margin:5px; padding-left: 10px;" value="Vocal Music" <?php if($ss_hobby == "Vocal Music") echo " selected"; ?>>Vocal Music</option>
</SELECT>
</div>
</form>

<form method="post" action="added.php" name="form2">
<div class="left_new"><font color=red><b>&nbsp;</b></font> Date :</div>
<div class="right_new">
<input style="text-align:center; background-color:#D4EDF7;" id="demo21" size="10" class="text1" type="text" name="school_date" value="<?php echo date('Y-m-d');?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo21','yyyyMMdd')" style="cursor:pointer"/>
</div>

<div class="clear"></div>
</div>

<!------------------- Name SELECTION AREA ---------------------->
<?php 
if(isset($_POST["ss_hobby"]))
{
echo"
<table class=table1>
<tr bgcolor=#BDF4CB>
<th class=th1>Sr. No.</th>
<th class=th1>Name</th>
<th class=th1>Adm No</th>
<th class=th1>Class</th>
<th class=th1>House</th>
<th class=th1>Area</th>
<th class=th1>Attd</th>
<th class=th1>Remark</th>
</tr>";

	$ss_hobby = $_POST["ss_hobby"];
        $sql_hobby = "SELECT * FROM std_2014_15 WHERE profile_status = 'Studing' AND hobby_1 = '$ss_hobby' OR hobby_2 = '$ss_hobby' OR hobby_3 = '$ss_hobby' ORDER BY name";
        $class_hobby = mysql_query($sql_hobby);
	$count2='0';       
        while($row = mysql_fetch_array($class_hobby))
        {
	$count2++;
	$st_name=$row['name'];
	$st_adm=$row['adm'];
	$st_class=$row['class'];
	$st_house=$row['house'];
echo'     
<tr>
<td class=td1 style="text-align:center;">'.$count2.'</td>
<td class=td1><input class="input1" name="st_name[]" id="st_name[]" value="'.$st_name.'" type="text" size="20" readonly="readonly" /></td>
<td class=td1><input class="input1" name="st_adm[]" id="st_adm[]" value="'.$st_adm.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_class[]" id="st_class[]" value="'.$st_class.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_house[]" id="st_house[]" value="'.$st_house.'" type="text" size="10" readonly="readonly"/></td>
<td class=td1><input style="text-align:center;" class="input1" name="st_area[]" id="st_area[]" value="'.$ss_hobby.'" type="text1" size="10" /></td>
<td align="center" class=td1><Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="M">M</option>
<option style="padding-left: 10px;" value="L">L</option>
<option style="padding-left: 10px;" value="H">H</option>
<option style="padding-left: 10px;" value="">-</option>
</select> </td>
<td align="center" class=td1><input name="coment[]" id="coment[]" type="text1" size="20" /></td>';
}
}
?>      
</div>
</table>
<br>
<div align=center>
<input type="submit" name="submit_1" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1></div>
</div>
</form>
<?php	
}
}
?> 

<!-------------------------------------------------------------- GAMES ATTENDANCE AREA STARTED------------------------------------------------------------->
<?php
if(isset($_POST["ss_attend"]))
{
if($ss_attend == "games_attend")
{
?>
<!------------------- GAMES SELECTION AREA ---------------------->
<div class="row">
<div class="left_new"><font color=red><b> * </b></font> Select Class :</div>
<div class="right_new">
<SELECT NAME="ss_games" onChange="autoSubmit();">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="4" <?php if($ss_games == "4") echo " selected"; ?>>Class 4</option>
<option style="margin:5px; padding-left: 10px;" value="5" <?php if($ss_games == "5") echo " selected"; ?>>Class 5</option>
<option style="margin:5px; padding-left: 10px;" value="6A" <?php if($ss_games == "6A") echo " selected"; ?>>Class 6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B" <?php if($ss_games == "6B") echo " selected"; ?>>Class 6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A" <?php if($ss_games == "7A") echo " selected"; ?>>Class 7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B" <?php if($ss_games == "7B") echo " selected"; ?>>Class 7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A" <?php if($ss_games == "8A") echo " selected"; ?>>Class 8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B" <?php if($ss_games == "8B") echo " selected"; ?>>Class 8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A" <?php if($ss_games == "9A") echo " selected"; ?>>Class 9A</option>
<option style="margin:5px; padding-left: 10px;" value="9B" <?php if($ss_games == "9B") echo " selected"; ?>>Class 9B</option>
<option style="margin:5px; padding-left: 10px;" value="10A" <?php if($ss_games == "10A") echo " selected"; ?>>Class 10A</option>
<option style="margin:5px; padding-left: 10px;" value="10B" <?php if($ss_games == "10B") echo " selected"; ?>>Class 10B</option>
<option style="margin:5px; padding-left: 10px;" value="11" <?php if($ss_games == "11") echo " selected"; ?>>Class 11</option>
</SELECT>
</div>
</form>

<form method="post" action="added.php" name="form2">
<div class="left_new"><font color=red><b>&nbsp;</b></font> Date :</div>
<div class="right_new">
<input style="text-align:center; background-color:#D4EDF7;" id="demo22" size="10" class="text1" type="text" name="school_date" value="<?php echo date('Y-m-d');?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo22','yyyyMMdd')" style="cursor:pointer"/>
</div>

<div class="clear"></div>
</div>

<!------------------- Name SELECTION AREA ---------------------->
<?php 
if(isset($_POST["ss_games"]))
{
echo"
<table class=table1>
<tr bgcolor=#BDF4CB>
<th class=th1>Sr. No.</th>
<th class=th1>Name</th>
<th class=th1>Adm No</th>
<th class=th1>Class</th>
<th class=th1>House</th>
<th class=th1>Area</th>
<th class=th1>Attd</th>
<th class=th1>Remark</th>
</tr>";

	$ss_games = $_POST["ss_games"];
        $sql_games = "SELECT * FROM std_2014_15 WHERE profile_status = 'Studing' AND class = '$ss_games' ORDER BY name";
        $games_name = mysql_query($sql_games);
	$count3='0';        
        while($row = mysql_fetch_array($games_name))	
        {
	$count3++;
	$st_name=$row['name'];
	$st_adm=$row['adm'];
	$st_class=$row['class'];
	$st_house=$row['house'];
echo'     
<tr>
<td class=td1 style="text-align:center;">'.$count3.'</td>
<td class=td1><input class="input1" name="st_name[]" id="st_name[]" value="'.$st_name.'" type="text" size="20" readonly="readonly" /></td>
<td class=td1><input class="input1" name="st_adm[]" id="st_adm[]" value="'.$st_adm.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_class[]" id="st_class[]" value="'.$st_class.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_house[]" id="st_house[]" value="'.$st_house.'" type="text" size="8" readonly="readonly"/></td>
<td class=td1><input style="text-align:center;" class="input1" name="st_area[]" id="st_area[]" value="Games" type="text1" size="10" /></td>
<td align="center" class=td1><Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="M">M</option>
<option style="padding-left: 10px;" value="L">L</option>
<option style="padding-left: 10px;" value="H">H</option>
<option style="padding-left: 10px;" value="">-</option>
</select> </td>
<td align="center" class=td1><input name="coment[]" id="coment[]" type="text1" size="20" /></td>';
}
}
?>            
</div>
</table>
<br>
<div align=center>
<input type="submit" name="submit_1" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1></div>
</div>
</form>
<?php	
}
}
?> 


<!---------------------------------------------------------YOGA ATTENDANCE AREA STARTED-------------------------------------------------------------->
<?php
if(isset($_POST["ss_attend"]))
{
if($ss_attend == "yoga_attend")
{
?>
<!------------------- Yoga SELECTION AREA ---------------------->
<div class="row">
<div class="left_new"><font color=red><b> * </b></font> Select Class :</div>
<div class="right_new">
<SELECT NAME="ss_yoga" onChange="autoSubmit();">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="4" <?php if($ss_yoga == "4") echo " selected"; ?>>Class 4</option>
<option style="margin:5px; padding-left: 10px;" value="5" <?php if($ss_yoga == "5") echo " selected"; ?>>Class 5</option>
<option style="margin:5px; padding-left: 10px;" value="6A" <?php if($ss_yoga == "6A") echo " selected"; ?>>Class 6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B" <?php if($ss_yoga == "6B") echo " selected"; ?>>Class 6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A" <?php if($ss_yoga == "7A") echo " selected"; ?>>Class 7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B" <?php if($ss_yoga == "7B") echo " selected"; ?>>Class 7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A" <?php if($ss_yoga == "8A") echo " selected"; ?>>Class 8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B" <?php if($ss_yoga == "8B") echo " selected"; ?>>Class 8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A" <?php if($ss_yoga == "9A") echo " selected"; ?>>Class 9A</option>
<option style="margin:5px; padding-left: 10px;" value="9B" <?php if($ss_yoga == "9B") echo " selected"; ?>>Class 9B</option>
<option style="margin:5px; padding-left: 10px;" value="10A" <?php if($ss_yoga == "10A") echo " selected"; ?>>Class 10A</option>
<option style="margin:5px; padding-left: 10px;" value="10B" <?php if($ss_yoga == "10B") echo " selected"; ?>>Class 10B</option>
<option style="margin:5px; padding-left: 10px;" value="11" <?php if($ss_yoga == "11") echo " selected"; ?>>Class 11</option>
</SELECT>
</div>
</form>

<form method="post" action="added.php" name="form2">
<div class="left_new"><font color=red><b>&nbsp;</b></font> Date :</div>
<div class="right_new">
<input style="text-align:center; background-color:#D4EDF7;" id="demo23" size="10" class="text1" type="text" name="school_date" value="<?php echo date('Y-m-d');?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo23','yyyyMMdd')" style="cursor:pointer"/>
</div>

<div class="clear"></div>
</div>

<!------------------- Name SELECTION AREA ---------------------->
<?php 
if(isset($_POST["ss_attend"]))
{
if(isset($_POST["ss_yoga"]))
{
echo"
<table class=table1>
<tr bgcolor=#BDF4CB>
<th class=th1>Sr. No.</th>
<th class=th1>Name</th>
<th class=th1>Adm No</th>
<th class=th1>Class</th>
<th class=th1>House</th>
<th class=th1>Area</th>
<th class=th1>Attd</th>
<th class=th1>Remark</th>
</tr>";
	$ss_yoga = $_POST["ss_yoga"];
        $sql_yoga = "SELECT * FROM std_2014_15 WHERE profile_status = 'Studing' AND class = '$ss_yoga' ORDER BY name";
        $yoga_name = mysql_query($sql_yoga);
	$count4='0';
        while($row = mysql_fetch_array($yoga_name))	
        {
	$count4++;
	$st_name=$row['name'];
	$st_adm=$row['adm'];
	$st_class=$row['class'];
	$st_house=$row['house'];
echo'     
<tr>
<td class=td1 style="text-align:center;">'.$count4.'</td>
<td class=td1><input class="input1" name="st_name[]" id="st_name[]" value="'.$st_name.'" type="text" size="20" readonly="readonly" /></td>
<td class=td1><input class="input1" name="st_adm[]" id="st_adm[]" value="'.$st_adm.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_class[]" id="st_class[]" value="'.$st_class.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_house[]" id="st_house[]" value="'.$st_house.'" type="text" size="8" readonly="readonly"/></td>
<td class=td1><input style="text-align:center;" class="input1" name="st_area[]" id="st_area[]" value="Yoga" type="text1" size="10" /></td>
<td align="center" class=td1><Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="M">M</option>
<option style="padding-left: 10px;" value="L">L</option>
<option style="padding-left: 10px;" value="H">H</option>
<option style="padding-left: 10px;" value="">-</option>
</select> </td>
<td align="center" class=td1><input name="coment[]" id="coment[]" type="text1" size="20" /></td>';
}
}
}
?>            
</div>
</table>
<br>
<div align=center>
<input type="submit" name="submit_1" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1></div>
</div>
</form>
<?php	
}
}
?> 

<!---------------------------------------------------------PT AREA STARTED------------------------------------------------------->
<?php
if(isset($_POST["ss_attend"]))
{
if($ss_attend == "pt_attend")
{
?>
<!------------------- PT SELECTION AREA ---------------------->
<div class="row">
<div class="left_new"><font color=red><b> * </b></font> Select Class :</div>
<div class="right_new">
<SELECT NAME="ss_pt" onChange="autoSubmit();">
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
<option style="margin:5px; padding-left: 10px;" value="4" <?php if($ss_pt == "4") echo " selected"; ?>>Class 4</option>
<option style="margin:5px; padding-left: 10px;" value="5" <?php if($ss_pt == "5") echo " selected"; ?>>Class 5</option>
<option style="margin:5px; padding-left: 10px;" value="6A" <?php if($ss_pt == "6A") echo " selected"; ?>>Class 6A</option>
<option style="margin:5px; padding-left: 10px;" value="6B" <?php if($ss_pt == "6B") echo " selected"; ?>>Class 6B</option>
<option style="margin:5px; padding-left: 10px;" value="7A" <?php if($ss_pt == "7A") echo " selected"; ?>>Class 7A</option>
<option style="margin:5px; padding-left: 10px;" value="7B" <?php if($ss_pt == "7B") echo " selected"; ?>>Class 7B</option>
<option style="margin:5px; padding-left: 10px;" value="8A" <?php if($ss_pt == "8A") echo " selected"; ?>>Class 8A</option>
<option style="margin:5px; padding-left: 10px;" value="8B" <?php if($ss_pt == "8B") echo " selected"; ?>>Class 8B</option>
<option style="margin:5px; padding-left: 10px;" value="9A" <?php if($ss_pt == "9A") echo " selected"; ?>>Class 9A</option>
<option style="margin:5px; padding-left: 10px;" value="9B" <?php if($ss_pt == "9B") echo " selected"; ?>>Class 9B</option>
<option style="margin:5px; padding-left: 10px;" value="10A" <?php if($ss_pt == "10A") echo " selected"; ?>>Class 10A</option>
<option style="margin:5px; padding-left: 10px;" value="10B" <?php if($ss_pt == "10B") echo " selected"; ?>>Class 10B</option>
<option style="margin:5px; padding-left: 10px;" value="11" <?php if($ss_pt == "11") echo " selected"; ?>>Class 11</option>
</SELECT>
</div>
</form>

<form method="post" action="added.php" name="form2">
<div class="left_new"><font color=red><b>&nbsp;</b></font> Date :</div>
<div class="right_new">
<input style="text-align:center; background-color:#D4EDF7;" id="demo24" size="10" class="text1" type="text" name="school_date" value="<?php echo date('Y-m-d');?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo24','yyyyMMdd')" style="cursor:pointer"/>
</div>

<div class="clear"></div>
</div>

<!------------------- Name SELECTION AREA ---------------------->
<?php 
if(isset($_POST["ss_pt"]))
{
echo"
<table class=table1>
<tr bgcolor=#BDF4CB>
<th class=th1>Sr. No.</th>
<th class=th1>Name</th>
<th class=th1>Adm No</th>
<th class=th1>Class</th>
<th class=th1>House</th>
<th class=th1>Area</th>
<th class=th1>Attd</th>
<th class=th1>Remark</th>
</tr>";
	$ss_pt = $_POST["ss_pt"];
        $sql_pt = "SELECT * FROM std_2014_15 WHERE profile_status = 'Studing' AND class = '$ss_pt' ORDER BY name";
        $pt_name = mysql_query($sql_pt);
	$count5 = '0';  
        while($row = mysql_fetch_array($pt_name))	
        {
	$count5++;
	$st_name=$row['name'];
	$st_adm=$row['adm'];
	$st_class=$row['class'];
	$st_house=$row['house'];
echo'     
<tr>
<td class=td1 style="text-align:center;">'.$count5.'</td>
<td class=td1><input class="input1" name="st_name[]" id="st_name[]" value="'.$st_name.'" type="text" size="20" readonly="readonly" /></td>
<td class=td1><input class="input1" name="st_adm[]" id="st_adm[]" value="'.$st_adm.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_class[]" id="st_class[]" value="'.$st_class.'" type="text" size="5" readonly="readonly"/></td>
<td class=td1><input class="input1" name="st_house[]" id="st_house[]" value="'.$st_house.'" type="text" size="8" readonly="readonly"/></td>
<td class=td1><input style="text-align:center;" class="input1" name="st_area[]" id="st_area[]" value="PT" type="text1" size="10" /></td>
<td align="center" class=td1><Select NAME="attend_code[]">
<option style="padding-left: 10px;" value="P">P</option>
<option style="padding-left: 10px;" value="A">A</option>
<option style="padding-left: 10px;" value="M">M</option>
<option style="padding-left: 10px;" value="L">L</option>
<option style="padding-left: 10px;" value="H">H</option>
<option style="padding-left: 10px;" value="">-</option>
</select>
</td>
<td align="center" class=td1><input name="coment[]" id="coment[]" type="text1" size="20" /></td>';
}
}
?>            
</div>
</table>
<br>
<div align=center>
<input type="submit" name="submit_1" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=30% color=orange size=1></div>
</div>
</form>
<?php	
}
}
?>
</div>
<div class="clear"></div>
</div>
</div>
</body>
</html>
