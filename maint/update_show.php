<?php
include ('../login/dbc.php');
page_protect();
include("index.php");
include("connect.php");
$id = $_GET['id'];

$qP = "SELECT * FROM maint WHERE id = '$id'";

$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

//first form
$name = trim($name);
$preid = trim($preid);
$mrms = trim($mrms);
$telno = trim($telno);
$location = trim($location);
$worktype = trim($worktype);
$department = trim($department);
$compldetails = trim($compldetails);
$compldate = trim($compldate);
$compltime = trim($compltime);
$description = trim($description);
$worktype = trim($worktype);
$appodate = trim($appodate);
$appotime = trim($appotime);
$email = trim($email);

//second form
$currentpro = trim($currentpro);
$finishdate = trim($finishdate);
$finishtime = trim($finishtime);
$matrluse = trim($matrluse);
$matrlreq = trim($matrlreq);
$coremark = trim($coremark);
$inprogress = trim($inprogress);
$com_sugg = trim($com_sugg);
$admin_remark = trim($admin_remark);
mysql_close();
?>

<html>
<head>
<title>update show record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<!---------------------**************************** first box *******************************----------------->
<form method="GET" action="update.php">
<div class=mainleft>
<div class="contentA">
<p class=new><?php echo $com_sugg;?> details </p>


<div class="row">
<div class="left">Com / Sug / Req No :</div>
<div class="right_new">
<input style="font-weight:bold; color:black; background-color:#FFC848;" size="10" class="text1" type="text" name="id" readonly="readonly" value="<?php echo $id;?>">
</div>
<div class="left_new">&nbsp;Type :</div>
<div class="contime">
<input size="8" class="text1" type="text" name="worktype" readonly="readonly" value="<?php echo $worktype;?>">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Com / Sug / Req date :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="compldate" readonly="readonly" value="<?php echo $compldate;?>">
</div>
<div class="left_new">&nbsp;Time :</div>
<div class="contime">
<input size="8" type="text" class="text1" name="compltime" readonly="readonly" value="<?php echo $compltime;?>"></div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Tel No :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="name" readonly="readonly" value="<?php echo $telno;?>">
</div>
<div class="left_new">&nbsp; Ref Id :  </div>
<div class="contime">
<input size="7" type="text" class="text1" name="compltime" readonly="readonly" value="<?php echo $preid;?>"></div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Name :</div>
<div class="right">
<input class="text" type="text" name="name" readonly="readonly" value="<?php echo $mrms;?> <?php echo $name;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Email :</div>
<div class="right">
<input class="text" type="text" name="email" readonly="readonly" value="<?php echo $email;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Location of Com / Sug / Req :</div>
<div class="right">
<input class="text" type="text" name="location" readonly="readonly" value="<?php echo $location; ?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Department :</div>
<div class="right">
<input size="15" class="text1" type="text" name="department" readonly="readonly" value="<?php echo $department;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Com / Sug / Req :</div>
<div class="right">
<input class="text" type="text" readonly="readonly" name="compldetails" value="<?php echo $compldetails; ?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Details of Com / Sug / Req :</div>
<div class="right">
<TEXTAREA ROWS="4" class="textarea" name="description" readonly="readonly"><?php echo $description;?></TEXTAREA>
</div>
<div class="clear"></div>


<div class="row">
<div class="left">Appointment, if any :</div>
<div class="right_new">Date :
<input size="8" class="text1" type="text" readonly="readonly" name="appodate" value="<?php echo $appodate;?>">
</div>
<div class="left_new">&nbsp;Time :</div>
<div class="contime">
<input size="7" type="text" class="text1" readonly="readonly" name="appotime" value="<?php echo $appotime;?>"></div>
<div class="clear"></div>
</div>

<input type="hidden" name="com_sugg" value="<?php echo $com_sugg;?>">

</div>
</div>
</div>
</div>

<!----------------------------*************** second box ***************------------------------------------------>
<div class=mainright>
<div class="contentA">
<p class=new><?php echo $com_sugg;?> status</p>

<div class="row">
<div class="left"><font color=red><b> * </b></font> Current status :</div>
<div class="right_new">
<input type="radio" name="currentpro" value="in progress" checked>in progress
<input type="radio" name="currentpro" value="completed">completed  
<input type="radio" name="currentpro" value="expect delay" >expect delay<br>
 
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left"><font color=red><b> * </b></font> Date / PDC / period :</div> 
<div class="right_new">
<input size="10" class="text1" type="text" readonly="readonly" name="inprogress" value="<?php echo $inprogress;?>">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left"><font color=red><b> * </b></font> Material required :</div>
<div class="right">
<input class="text" type="text" name="matrlreq" readonly="readonly" value="<?php echo $matrlreq;?>">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left"><font color=red><b> * </b></font> Material used :</div>
<div class="right">
<input class="text" type="text" name="matrluse" readonly="readonly" value="<?php echo $matrluse;?>">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left"><font color=red><b> * </b></font> Date of updatation :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="finishdate" readonly="readonly" value="<?php echo date("d-m-Y");?>">
</div>
<div class="left_new">Time :</div>
<div class="contime">
<input size="8" type="text" class="text1" name="finishtime" readonly="readonly" value="<? echo date("H:i:s");?>"></div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left"><font color=red><b> * </b></font>Department Remark :</div>
<div class="right">
<TEXTAREA ROWS="4" class="textarea" readonly="readonly" name="coremark"><?php echo $coremark;?></TEXTAREA>
</div>
<div class="clear"></div>
</div>

<?php 

if ($admin_remark == 'Urgent!')
{
echo "
<div class=row>
<div class=left> Sr. Admin Remark :</div>
<div class=right>
<font style='color:white; background-color:#B50303;'><b>&nbsp; $admin_remark &nbsp;</b></font>
</div>
<div class=clear></div>
</div>";
}


if ($_SESSION['user_name'] == 'admin')
{ echo"
<div class=row>
<div class=left><font color=red><b> * </b></font>Sr. Admin Remark :</div>
<div class=right_new>
<input type=radio name=admin_remark value=Urgent! ><font style='color:white; background-color:#B50303;'><b>&nbsp; Urgent! &nbsp;</b></font>&nbsp;
</div>
<div class=clear></div>
</div>";
}
?>

<br><br>
<div align="center">
<input type="submit" name="submitButtonName" value="Edit"> &nbsp; <input type="button" value="Cancel" onclick="window.location='javascript:history.back()'"><input type="hidden" name="id" value="<?=$id?>">
</div>
</div>
</div>
<div class="clear"></div>
</div>
</form>
<p class=new> Please fill the status for the <? echo $com_sugg;?> no : <font color=white><?php echo $id;?></font></p>

</body>
</html>

