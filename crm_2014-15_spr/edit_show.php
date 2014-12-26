<html>
<head>
<title>CRM :: Spring Term 2013-14</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_level'] == '2' || $_SESSION['user_name'] == 'v.pradnya' || $_SESSION['user_name'] == 'milindm')
{
$user_name = $_SESSION['user_name'];
if(isset($_GET["class"]))
{
    $ss_class = $_GET["class"];
}
if(!isset($_GET["class"]))
{
    $ss_class = ""; 
}

if(isset($_GET["ss_area"]))
{
   $ss_area = $_GET["ss_area"];
}
if(!isset($_GET["ss_area"]))
{
   $ss_area = ""; 
}
?>
<font align="center" style="color:blue; font-family:Trebuchet MS; font-size:13px;">Data Saved...</font>
<div style="color:#575757; font-family:Trebuchet MS; font-size:13px; padding:5px;">
<table class="table1">
<tr>
<td class="td1">
<form method="POST" action="" name="theForm">
<!-------------------------------------------------------- SELECT CLASS ----------------------------------------------------->
Select Class :
<SELECT style="background-color:#D4D4D4;" NAME="class" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $ss_class;?>"><?php echo $ss_class;?></option>
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
</SELECT> &nbsp; &nbsp; 


Select Area :
<SELECT style="background-color:#D4D4D4;" NAME="ss_area" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $ss_area;?>"><?php echo $ss_area;?></option>
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
</SELECT> &nbsp; &nbsp;
</form> 

<form method="post" action="edit.php" name="mainform">
Teacher (User): 
<select style="background-color:#D4D4D4;" name="area_teacher" disabled="disabled">
<option style="margin:5px; padding-left: 10px;" value="<?php echo $user_name;?>"><?php echo $user_name;?></option>
<option style="margin:5px; padding-left: 10px;" value="">- Select -</option>
</select> &nbsp; &nbsp;
<img src='images2/arrow.gif' border='0' alt='edit'> <?php echo "<a href=\"crm_report.php?class=$ss_class\" title='view report' target='_blank'>view report</a>";?>
</td>
</tr>
</table>
</div>

<input type="submit" name="Edit" value="Edit"> <input type="button" value="cancel" onclick="window.location='javascript:history.back()'">

<div class="contentC">
<div class="tbody">
<table class="table1">
<!------------------- Name SELECTION AREA ---------------------->
<tr>
<th class=th1 style="width:10px;">Sr. No.</th>
<th class=th1 style="width:70px;">Student</th>
<th class=th1 style="width:50px;">Area Remark</th>
<th class=th1 style="width:10px;">Grade</th>
<?php
if ($ss_area == 'class_teacher')
{
?>
<th class=th1 style="width:50px;">Inputs after CRM</th>
<th class=th1 style="width:5px;">Special Concern</th>
<?php
}
?>
</tr>
	<?php
	include("connect.php");
	$ss_area_f = strtolower($_GET["ss_area"]); //convert letters to lowercase//
        $ss_class = $_GET["class"]; 

        $sql_f = "SELECT * FROM crm_2015_spring WHERE class = '$ss_class' ORDER BY name";
        $data_f = mysql_query($sql_f);
	$count1='0';
	$grade = ""; 
	$subject = ""; 
        while($row_f = mysql_fetch_array($data_f))	
        {
	$count1++;
	$adm=$row_f['adm'];
	$name=$row_f['name'];
	$subject=$row_f[$ss_area_f];
	$grade=$row_f[$ss_area_f.'_grade'];	
echo'     
<tr>
<td class=td1 style="text-align:center;">'.$count1.'</td>
<td class=td1>
<input type="hidden" name="adm[]" id="adm[]" value="'.$adm.'">
<b>'.$name.'</b>
</td>
<td align="center" class=td1><textarea ROWS="6" readonly="readonly" class="textarea" id="'.$ss_area_f.'[]"  name="'.$ss_area_f.'[]">'.$subject.'</textarea></td>
<td align="center" class=td1>
<Select style="background-color:#D4D4D4;" NAME="'.$ss_area_f.'_grade[]" disabled="disabled">
<option class=pink value="'.$grade.'">'.$grade.'</option>
<option class=pink value="A">A</option>
<option class=pink value="B">B</option>
<option class=pink value="B+">B+</option>
<option class=pink value="B-">B-</option>
<option class=pink value="C">C</option>
</select></td>';

if ($ss_area == 'class_teacher')
{
$remarks=$row_f['remarks'];
$inputs_from_crm=$row_f['inputs_from_crm'];
$special_concern = $row_f['special_concern'];
echo '
<td align="center" class=td1><textarea ROWS="6" class="textarea" readonly="readonly" id="inputs_from_crm[]"  name="inputs_from_crm[]">'.$inputs_from_crm.'</textarea></td>';

echo'
<td align="center" class=td1>
<Select NAME="special_concern[]">
<option class=pink value="'.$special_concern.'">'.$special_concern.'</option>
<option class=pink value="">-</option>
<option class=pink value="Yes">Yes</option>
<option class=pink value="No">No</option>
</select></td>';

}
}
?>
</div>
</table>
<input type="hidden" name="class" value="<?php echo $ss_class;?>"><input type="hidden" name="ss_area" value="<?php echo $ss_area;?>">
</form>
</div>
<div class="clear"></div>
</div>
<?php  
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data_f);
	 if ($anymatches == 0)
	 {
	 echo " <p>No entries found matching your query</p>";
	 }
	 else
	 { 
	 //And we remind them what they searched for
	 echo "[ <b>Records Found : </b> <font color=red>$anymatches</font> ]";
	 echo "<p>&nbsp;</p>";
	 }
	
}
?>
</body>
</html>            


