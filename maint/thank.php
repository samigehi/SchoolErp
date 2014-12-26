<html>
<head>
<title>Add New complaint</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("index.php");
include("connect.php");

$qp = "SELECT * FROM maint ORDER BY id DESC LIMIT 1";

//$qP = "SELECT * FROM maint WHERE name = '$name'";
$data = mysql_query($qp);
$result = mysql_fetch_array($data);

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
$com_sugg = $result['com_sugg'];
mysql_close();
?>

<div class=addform>
<div class="contentA">
<p class=new>Thank you for the <? echo $com_sugg;?></p>

<div class="row">
<div class="left">Com / Sug / Req No :</div>
<div class="right_new">
<input style="font-weight:bold; color:black; background-color:#FFC848;" size="10" class="text1" type="text" name="id" readonly="readonly" value="<? echo $id;?>">
</div>
<div class="left_new">&nbsp;Type :</div>
<div class="contime">
<input size="8" class="text1" type="text" name="worktype" readonly="readonly" value="<? echo $worktype;?>">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Com / Sug / Req date :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="compldate" readonly="readonly" value="<? echo $compldate;?>">
</div>
<div class="left_new">&nbsp;Time :</div>
<div class="contime">
<input size="8" type="text" class="text1" name="compltime" readonly="readonly" value="<? echo $compltime;?>"></div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Tel No :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="name" readonly="readonly" value="<? echo $telno;?>">
</div>

<div class="left_new">&nbsp; Ref Id :  </div>
<div class="contime">
<input size="7" type="text" class="text1" name="compltime" readonly="readonly" value="<? echo $preid;?>"></div>

<div class="clear"></div>
</div>

<div class="row">
<div class="left">Name :</div>
<div class="right">
<input class="text" type="text" name="name" readonly="readonly" value="<? echo $mrms;?> <? echo $name;?>">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Email :</div>
<div class="right">
<input class="text" type="text" name="email" readonly="readonly" value="<? echo $email;?>">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Location of Com / Sug / Req :</div>
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
<div class="left">Com / Sug / Req :</div>
<div class="right">
<input class="text" type="text" readonly="readonly" name="compldetails" value="<? echo $compldetails; ?>">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Details of Com / Sug / Req :</div>
<div class="right">
<TEXTAREA ROWS="4" class="textarea" name="description" readonly="readonly"><? echo $description;?></TEXTAREA>
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Appointment, if any :</div>
<div class="right_new">Date :
<input size="8" class="text1" type="text" readonly="readonly" name="appodate" value="<? echo $result['appodate'];?>">
</div>
<div class="left_new">&nbsp;Time :</div>
<div class="contime">
<input size="7" type="text" class="text1" readonly="readonly" name="appotime" value="<? echo $result['appotime'];?>"></div>
<div class="clear"></div>
</div>
<br>
<p style="text-align:center; font-size:12px; color:blue;">Complaint has been registered successfully.</p>

</div>
</div>

</body>
</html>
