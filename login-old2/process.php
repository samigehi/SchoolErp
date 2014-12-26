<html>
<head>
<title>current process</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />

</head>
<body>


<?php


include("index.php");
include("connect.php");

$id = $_GET['id'];

$qP = "SELECT * FROM maint WHERE id = '$id'";
$rsP = mysql_query($qP);
$row = mysql_fetch_array($rsP);
extract($row);

//$id = trim($id);
$name = trim($name);
$location = trim($location);
$worktype = trim($worktype);
$department = trim($department);
$compldetails = trim($compldetails);
$compldate = trim($compldate);
$compltime = trim($compltime);
$description = trim($description);

mysql_close();
?>


<br>
<hr size="1" color="lightgray">

<!-----first box------>
<form method="post" action="updated.php">
<div style="float: left; margin-left:50px; width:550px; height:470px; background-color:#FDF5E6; margin-right:50px;">
<div class="contentA">
<p class=new>complaint details </p>


<div class="row">
<div class="left">Complaint No :</div>
<div class="right">
<input size="10" class="text1" type="text" name="id" readonly="readonly" value="<? echo $id;?>">
</div>
<div class="clear"></div>
</div>



<div class="row">
<div class="left">Complaint date :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="compldate" readonly="readonly" value="<? echo $compldate;?>">
</div>
<div class="left_new">Time :</div>
<div class="contime">
<input size="8" type="text" class="text1" name="compltime" readonly="readonly" value="<? echo $compltime;?>"></div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">Complainant name :</div>
<div class="right">
<input class="text" type="text" name="name" readonly="readonly" value="<? echo $name;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Location :</div>
<div class="right">
<input class="text" type="text" name="location" readonly="readonly" value="<? echo $location; ?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Complaint :</div>
<div class="right">
<input class="text" type="text" readonly="readonly" name="compldetails" value="<? echo $compldetails; ?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Department :</div>
<div class="right">
<input size="15" class="text1" type="text" name="department" readonly="readonly" value="<? echo $department;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Complaint Type :</div>
<div class="right">
<input size="8" class="text1" type="text" name="worktype" readonly="readonly" value="<? echo $worktype;?>">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left">Description :</div>
<div class="right">
<TEXTAREA ROWS="4" COLS="50" name="description" readonly="readonly"><? echo $description;?></TEXTAREA>
</div>
<div class="clear"></div>
</div>
</div>
</div>
</div>


<!----------------------------*************** second box ***************------------------------------------------>

<div style="float: left; background-color:#FDF5E6; width:550px; height:470px; margin-right: 20px;">
<div class="contentA">
<p class=new>complaint status</p>
<div class="row">
<div class="left"><font color=red><b> * </b></font> Current process :</div>
<div class="right">
<input class="text" type="text" name="currentpro" value="">
</div>
<div class="clear"></div>
</div>





<div class="row">
<div class="left"><font color=red><b> * </b></font> Material required :</div>
<div class="right">
<input class="text" type="text" name="matrlreq" value="">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left"><font color=red><b> * </b></font> Material used :</div>
<div class="right">
<input class="text" type="text" name="matrluse" value="">
</div>
<div class="clear"></div>
</div>


<div class="row">
<div class="left"><font color=red><b> * </b></font> Update date :</div>
<div class="right_new">
<input size="10" class="text1" type="text" name="finishdate" value="<? echo date("Y-m-d");?>">
</div>
<div class="left_new">Time :</div>
<div class="contime">
<input size="8" type="text" class="text1" name="finishtime" value="<? echo date("H:i:s");?>"></div>
<div class="clear"></div>
</div>




<div class="row">
<div class="left"><font color=red><b> * </b></font>Remark :</div>
<div class="right">
<TEXTAREA ROWS="4" COLS="50" name="coremark"></TEXTAREA>
</div>
<div class="clear"></div>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
</form>
<hr size="1" color="lightgray">
</body>
</html>
