<html>
<head>
<title>delete record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../maint/css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php

include ('../login/dbc.php');
page_protect();

include("../maint/index.php");

$id = $_GET['id'];

include("../maint/connect.php");

//Now we search for our search term, in the field the user specified
	 $data = mysql_query("SELECT * FROM maint where id = '$id'");
	  
	 //And we display the results
	 while($result = mysql_fetch_array( $data ))
	 {
$id = $result['id'];
$name = $result['name'];
$mrms = $result['mrms'];
$preid = $result['preid'];
$telno = $result['telno'];
$location = $result['location'];
$worktype = $result['worktype'];
$department = $result['department'];
$compldetails = $result['compldetails'];
$compldate = $result['compldate'];
$compltime = $result['compltime'];
$description = $result['description'];
$appodate = $result['appodate'];
$appotime = $result['appotime'];
$email = $result['email'];
$currentpro = $result['currentpro'];
$matrlreq = $result['matrlreq'];
$matrluse = $result['matrluse'];
$finishdate = $result['finishdate'];
$finishtime = $result['finishtime'];
$coremark = $result['coremark'];
$inprogress = $result['inprogress'];
$com_sugg = $result['com_sugg'];
$admin_remark = $result['admin_remark'];
}

?>

<hr size="1" color="lightgray">
<!-----first box------>
<form method="post" action="../maint/deleted.php">
<div class=mainleft>
<div class="contentA">
<p class=new><? echo $com_sugg; ?> details </p>


<div class="row">
<div class="left">Com / Sug / Req No :</div>
<div class="right_new">
<input style="font-weight:bold; color:black; background-color:#FFC848;" size="10" class="text1" type="text" name="id" readonly="readonly" value="<? echo $id; ?>">
</div>
<div class="left_new">&nbsp;Type :</div>
<div class="contime">
<input size="8" class="text1" type="text" name="worktype" readonly="readonly" value="<? echo $worktype; ?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Com / Sug / Req date :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="compldate" readonly="readonly" value="<? echo $compldate; ?>">
</div>
<div class="left_new">&nbsp;Time :</div>
<div class="contime">
<input size="8" type="text" class="text1" name="compltime" readonly="readonly" value="<? echo $compltime; ?>"></div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Tel No :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="name" readonly="readonly" value="<? echo $telno; ?>">
</div>
<div class="left_new">&nbsp; Ref Id :  </div>
<div class="contime">
<input size="7" type="text" class="text1" name="compltime" readonly="readonly" value="<? echo $preid;?>"></div>

<div class="clear"></div>
</div>


<div class="row">
<div class="left">Name :</div>
<div class="right">
<input class="text" type="text" name="name" readonly="readonly" value="<? echo $mrms; ?> <? echo $name; ?>">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Email :</div>
<div class="right">
<input class="text" type="text" name="email" readonly="readonly" value="<? echo $email; ?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Com / Sug / Req Location :</div>
<div class="right">
<input class="text" type="text" name="location" readonly="readonly" value="<? echo $location; ?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Department :</div>
<div class="right">
<input size="10" class="text1" type="text" name="department" readonly="readonly" value="<? echo $department;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Com / Sug :</div>
<div class="right">
<input class="text" type="text" readonly="readonly" name="compldetails" value="<? echo $compldetails; ?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Details of Com / Sug / Req :</div>
<div class="right">
<textarea rows="4" class="textarea" readonly="readonly"><? echo $description;?></textarea>
</div>
<div class="clear"></div>


<div class="row">
<div class="left">Appointment, if any :</div>
<div class="right_new">
<input size="10" class="text1" type="text" readonly="readonly" name="appodate" value="<? echo $appodate;?>">
</div>
<div class="left_new">Time :</div>
<div class="contime">
<input size="8" type="text" class="text1" readonly="readonly" name="appotime" value="<? echo $appotime;?>"></div>
<div class="clear"></div>
</div>


</div>
</div>
</div>
</div>
</div>


<!-----second box------>
<div class=mainright>
<div class="contentB">
<p class=new><? echo $com_sugg; ?> status</p>
<div class="row">
<div class="left">Current progress :</div>
<div class="right">
<input class="text" type="text" name="currentpro" readonly="readonly" value="<? echo $currentpro;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left"> Date / PDC / period :</div>
<div class="right">
<input size="15" class="text1" type="text" name="inprogress" readonly="readonly" value="<? echo $inprogress;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Material required :</div>
<div class="right">
<input class="text" type="text" name="matrlreq" readonly="readonly" value="<? echo $matrlreq;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Material used :</div>
<div class="right">
<input class="text" type="text" name="matrluse" readonly="readonly" value="<? echo $matrluse;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Date of updatation :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="finishdate" readonly="readonly" value="<? echo $finishdate;?>">
</div>
<div class="left_new">Time :</div>
<div class="contime">
<input size="8" type="text" class="text1" name="finishtime" readonly="readonly" value="<? echo $finishtime;?>"></div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">CO Remark :</div>
<div class="right">
<TEXTAREA ROWS="4" COLS="35" name="coremark" readonly="readonly"><? echo $coremark;?></TEXTAREA>
</div>
<div class="clear"></div>


<? if ($admin_remark == 'Urgent!')
{
echo "
<div class=row>
<div class=left> Sr. Admin Remark :</div>
<div class=right>
<font style='color:white; background-color:#B50303;'><b>&nbsp; Urgent! &nbsp;</b></font>
</div>
<div class=clear></div>
</div>";
}
?>

</div>
</div>
</div>
<div class="clear"></div>
</div>
</form>
</div>

<div align=center>
<font color=blue size=2><b> Are you sure?</b></font> &nbsp; <a href="../maint/deleted.php?id=<?php echo "$id" ?>"><font color=blue style=background-color:yellow;> &nbsp; Yes &nbsp;</font></a> &nbsp; &nbsp;---&nbsp; &nbsp; <a href="../maint/index.php"><font color=blue style=background-color:yellow;>&nbsp; No &nbsp;</font></a>
</div>

<p class=new> You are deleting the <? echo $com_sugg; ?> No : <?php echo "$id" ?> </a></p>


