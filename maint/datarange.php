<html>
<head>
<title>sort data by date</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="../calendar/jsDatePick_ltr.min.css" />
<script type="text/javascript">
  var win=null;
  function printIt(printThis)
  {
    win = window.open();
    self.focus();
    win.document.open();
    win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
    win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
    win.document.write(printThis);
    win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
    win.document.close();
    win.print();
    win.close();
  }
</script>
</head>
<body>
<?php
include("index.php");
if ($_SESSION['user_level'] == '1' || $_SESSION['user_name'] == 'gbhosale' || $_SESSION['user_name'] == 'dilip' || $_SESSION['user_name'] == 'gsatish' || $_SESSION['user_name'] == 'smanjani')
{
$find ='';
if (!isset($_GET['fromdate'])){
$fromdate = date('Y-m-d');
$todate = date('Y-m-d');
}

if (!isset($_GET['department'])){
$department = '';
$name = '';
}

if (isset($_GET['department'])){
$department = $_GET['department'];
}

if (isset($_GET['fromdate'])){
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$name = $_GET['name'];
}
?>

<div style="float:left; width:98%; padding:10px; background-color:#FDF5E6; border:1px #98AFC7 solid;">
<form method="GET" action="<?php $_SERVER['PHP_SELF']?>">

<b>Enter : </b><input type="text" value="<?php echo $name;?>" name="name" /> &nbsp; 

<b>From : </b><input id="demo8" style="text-align:center; background-color:#D4EDF7;" size="10" class="text1" type="text" name="fromdate" value="<?php echo $fromdate;?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo8','yyyyMMdd')" style="cursor:pointer"/> &nbsp; 

<b>To : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo9" size="10" class="text1" type="text" name="todate" value="<?php echo $todate;?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo9','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>Department : </b><Select NAME="department">
<Option VALUE="">--- select department ---</option>
<optgroup class=red label="Building">
<option class=pink name="electrical" value="electrical" <?php if($department == "electrical") echo " selected"; ?>>Electrical</option>
<option class=pink name="furniture" value="furniture" <?php if($department == "furniture") echo " selected"; ?>>Furniture</option>
<option class=pink name="masonry" value="masonry" <?php if($department == "masonry") echo " selected"; ?>>Masonry</option>
<Option class=pink name="plumbing" value="plumbing" <?php if($department == "plumbing") echo " selected"; ?>>Plumbing</option>
<Option class=pink name="watersupply" value="watersupply" <?php if($department == "watersupply") echo " selected"; ?>>Water supply</option>
<Option class=pink name="sewage" value="sewage" <?php if($department == "sewage") echo " selected"; ?>>Sewage</option>
<Option class=pink name="others" value="others" <?php if($department == "others") echo " selected"; ?>>Others</option>
</optgroup>


<optgroup class=red label="Electronics">
<option class=pink name="computer" value="computer" <?php if($department == "computer") echo " selected"; ?>>Computer</option>
<option class=pink name="telephone" value="telephone" <?php if($department == "telephone") echo " selected"; ?>>Telephone</option>
<option class=pink name="audio visual" value="audio visual" <?php if($department == "audio visual") echo " selected"; ?>>Audio visual</option>
<Option class=pink name="others" value="others" <?php if($department == "others") echo " selected"; ?>>Others</option>
</optgroup>

<optgroup class=red label="Miscellaneous">
<Option class=pink name="admin office" value="admin office" <?php if($department == "admin office") echo " selected"; ?>>Office</option>
<Option class=pink name="accounts office" value="accounts office" <?php if($department == "accounts office") echo " selected"; ?>>Accounts</option>
<Option class=pink name="dining hall" value="dining hall" <?php if($department == "dining hall") echo " selected"; ?>>Dining hall</option>
<Option class=pink name="medical unit" value="medical unit" <?php if($department == "medical unit") echo " selected"; ?>>Medical unit</option>	
<Option class=pink name="security" value="security" <?php if($department == "security") echo " selected"; ?>>Security</option>
<Option class=pink name="transport" value="transport" <?php if($department == "transport") echo " selected"; ?>>Transport</option>
<Option class=pink name="tuckshop" value="tuckshop" <?php if($department == "tuckshop") echo " selected"; ?>>Tuckshop</option>
<Option class=pink name="library" value="library" <?php if($department == "library") echo " selected"; ?>>Library</option>
<Option class=pink name="art room" value="art room" <?php if($department == "art room") echo " selected"; ?>>Art room</option>
<Option class=pink name="guest house" value="guest house" <?php if($department == "guest house") echo " selected"; ?>>Guest house</option>
<Option class=pink name="gardening" value="gardening" <?php if($department == "gardening") echo " selected"; ?>>Gardening</option>
<Option class=pink name="study centre" value="study centre" <?php if($department == "study centre") echo " selected"; ?>>Study centre</option>
<Option class=pink name="others" value="others" <?php if($department == "others") echo " selected"; ?>>Others</option>
</optgroup>
</Select>

&nbsp; &nbsp; <input type="submit" name="submit" value="submit"> 
</form>
</div>
<div class="clear"></div>
</div>
</div>

<?php
if (isset($_GET['fromdate'])){
//$department = $_GET['department'];
include("connect.php");
$data = mysql_query("SELECT * FROM maint WHERE department LIKE '%$department%' AND name LIKE '%$name%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by id");
//And display the results ?>

<div id="printme">
<div class="contentB">
<table class=table1 >
<tr>
<th class=th1 style="width:2px;">CSR No.</th>
<th class=th1 style="width:30px;">Complaintent's Name</th>
<th class=th1 style="width:2px;">Date</th>
<th class=th1 style="width:10px;">Location</th>
<th class=th1 style="width:5px;">Department</th>
<th class=th1 style="width:30px;">Com / Sug / Req </th>
<th class=th1 style="width:30px;">CSR Details</th>
<th class=th1 style="width:5px;"> Status </th>
<th class=th1 style="width:5px;"> Material Used </th>
<th class=th1 style="width:5px;">Adm Remark</th>
</tr>
	<?php
	$completed = '0';
	$inprogress = '0';
	while($result = mysql_fetch_array( $data ))		
	{
	if ($result['currentpro'] == 'completed'){
	$color="green";
	$completed++;
	}

	if ($result['currentpro'] == 'inprogress' || $result['currentpro'] == 'in progress'){
	$color="red";
	$inprogress++;
	}	
 	include('search2.php');
	} 
	?>	
	</table>
	</div>
	</div>
	<?php
	//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	if ($anymatches == 0) 
	 {
	 echo "<p>No entries found matching your query</p>";
	 }
	 ?>
	<hr color=lightgray size=1>
	<table style="font-size:11px;" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td>	
	<div style="float:left; width:600px;">
	<?php
	 echo "[ <b>Searched For : </b>$find</font> ] &nbsp; &nbsp; &nbsp; ";
	 echo "[ <b><font color=blue>Total Records : </b>$anymatches</font> ] &nbsp; &nbsp; &nbsp;";
	 echo "[ <b><font color=red>Inprogress : </b>$inprogress</font> ] &nbsp; &nbsp; &nbsp;";
	 echo "[ <b><font color=green>Completed : </b>$completed</font> ] &nbsp; &nbsp; &nbsp;";
	 ?></td>
	</div>

	<td><div style="float:right;">
	<a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false"><img src='images/print.png' border='0' alt='print'> Print</a> &nbsp; &nbsp; 
	
	<?php echo "<a href=\"export_xls_full.php?fromdate=$fromdate&todate=$todate\" title='export to xls'> <img src='images/xls.gif' border='0' alt='xls'> Export</a>";
	}
	}
	 ?>
	</div>
	</td>	
	</tr>
	</table>
	<hr color=lightgray size=1>
	</body>
	</html>

