<html>
<head>
<title>sort data by status</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
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
$today = date("Y-m-d");

include("index.php");

if (isset($_POST['submit'])){

$fromdate = $_POST['fromdate'];

$todate = $_POST['todate'];

$currentpro = $_POST['currentpro'];
}

?>
<div style="float:left; width:98%; padding:10px; background-color:#FDF5E6; border:1px #98AFC7 solid;">
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">

From : </b><input id="demo8" style="text-align:center; background-color:#D4EDF7;" size="10" class="text1" type="text" name="fromdate" value="<?php echo date('Y-m-d');?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo8','yyyyMMdd')" style="cursor:pointer"/> &nbsp; 
<b>To : </b><input style="text-align:center; background-color:#D4EDF7;" id="demo9" size="10" class="text1" type="text" name="todate" value="<?php echo date('Y-m-d');?>" style="background-color:#D4EDF7;"><img src="images2/cal.gif" onclick="javascript:NewCssCal('demo9','yyyyMMdd')" style="cursor:pointer"/> &nbsp; &nbsp;

<b>Department : </b><Select NAME="department">
<Option VALUE="">--- select department ---</option>

<optgroup class=red label="Building">
<option class=pink name="electrical" value="electrical">electrical</option>
<option class=pink name="furniture" value="furniture">furniture</option>
<option class=pink name="masonry" value="masonry">masonry</option>
<Option class=pink name="plumbing" value="plumbing">plumbing</option>
<Option class=pink name="watersupply" value="watersupply">water supply</option>
<Option class=pink name="sewage" value="sewage">sewage</option>
<Option class=pink name="others" value="others">others</option>
</optgroup>

<optgroup class=red label="Electronics">
<option class=pink name="computer" value="computer">computer</option>
<option class=pink name="telephone" value="telephone">telephone</option>
<option class=pink name="audio visual" value="audio visual">audio visual</option>
<Option class=pink name="others" value="others">others</option>
</optgroup>

<optgroup class=red label="Miscellaneous">
<Option class=pink name="admin office" value="admin office">office</option>
<Option class=pink name="accounts office" value="accounts office">Accounts</option>
<Option class=pink name="dining hall" value="dining hall">dining hall</option>
<Option class=pink name="medical unit" value="medical unit">medical unit</option>	
<Option class=pink name="security" value="security">security</option>
<Option class=pink name="transport" value="transport">transport</option>
<Option class=pink name="tuckshop" value="tuckshop">tuckshop</option>
<Option class=pink name="library" value="library">library</option>
<Option class=pink name="art room" value="art room">art room</option>
<Option class=pink name="guest house" value="guest house">guest house</option>
<Option class=pink name="gardening" value="gardening">gardening</option>
<Option class=pink name="study centre" value="study centre">study centre</option>
<Option class=pink name="others" value="others">others</option>
</optgroup>
</Select>&nbsp; &nbsp; &nbsp;

<b>Status : </b><Select NAME="currentpro">
<Option class=pink value="">--- All ---</option>
<Option class=pink name="completed" value="completed">completed</option>
<Option class=pink name="in progress" value="in progress">in progress</option>
<Option class=pink name="expect delay" value="expect delay">expect deley</option>
</select>

&nbsp; &nbsp; <input type="submit" name="submit" value="Go">
</form>
</div>
<div class="clear"></div>
</div>
<br>

<?php
//Admin user
include("../maint/connect.php");

if (isset($_POST['submit']) && ($_SESSION['user_name'] == 'admin'))
{
$department = $_POST['department'];

$data = mysql_query("SELECT * FROM maint WHERE department LIKE '%$department%' AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

//for building user
if (isset($_POST['submit']) && ($_SESSION['user_name'] == 'satish' || $_SESSION['user_name'] == 'bsriram')) 
{
$building_1 = "electrical";
$building_2 = "furniture";
$building_3 = "masonry";
$building_4 = "plumbing";
$building_5 = "watersupply";
$building_6 = "sewage";
$building_7 = "others";
$building_8 = "gardening";
$building_9 = "security";
$data = mysql_query("SELECT * FROM maint WHERE department IN ('$building_1','$building_2', '$building_3', '$building_4', '$building_5', '$building_6', '$building_7', '$building_8', '$building_9') AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

//electronics
if ($_SESSION['user_name'] == 'gbhau')
{
$electronics_1 = "computer";
$electronics_2 = "telephone";
$electronics_3 = "audio visual";
$data = mysql_query("SELECT * FROM maint WHERE department IN ('$electronics_1', '$electronics_2', '$electronics_3') AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

//admin office
if ($_SESSION['user_name'] == 'adminoff')
{
$adminoff_1 = "admin office";
$adminoff_2 = "transport";
$adminoff_3 = "guest house";
$adminoff_4 = "study centre";
$adminoff_5 = "";
$adminoff_6 = "office";
$adminoff_7 = "others";
$data = mysql_query("SELECT * FROM maint WHERE department IN ('$adminoff_1', '$adminoff_2', '$adminoff_3', '$adminoff_4', '$adminoff_5', '$adminoff_6', '$adminoff_7') AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

//accounts
if ($_SESSION['user_name'] == 'accounts')
{$accounts = "accounts office";
$data = mysql_query("SELECT * FROM maint WHERE department IN ('$accounts') AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

//medical
if ($_SESSION['user_name'] == 'medical')
{$medical = "medical unit";
$data = mysql_query("SELECT * FROM maint WHERE department IN ('$medical') AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

//library
if ($_SESSION['user_name'] == 'library')
{$library = "library";
$data = mysql_query("SELECT * FROM maint WHERE department IN ('$library') AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

//salim
if ($_SESSION['user_name'] == 'salim')
{$art_room = "art room";
$data = mysql_query("SELECT * FROM maint WHERE department IN ('$art_room') AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

//tuckshop
if ($_SESSION['user_name'] == 'tuckshop')
{$tuckshop = "tuckshop";
$data = mysql_query("SELECT * FROM maint WHERE department IN ('$tuckshop') AND currentpro LIKE '%$currentpro%' AND com_sugg LIKE '%$com_sugg%' AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

//dining hall
if ($_SESSION['user_name'] == 'dininghall')
{$dining_hall = "dining hall";
$data = mysql_query("SELECT * FROM maint WHERE department IN ('$dining_hall') AND currentpro LIKE '%$currentpro%' AND compldate BETWEEN '$fromdate' AND '$todate' ORDER by compldate ASC");
}

if (isset($_POST['submit'])){
//And display the results ?>

<br>
<div align="left"><a href="#" onclick="printIt(document.getElementById('printme').innerHTML); return false">
Print Record
</a>
<div id="printme">

<div class="contentB">
<table class=table1 >
<tr>
<th class=th1 style="width:2px;">CSR No.</th>
<th class=th1 style="width:30px;">Complaintent's Name</th>
<th class=th1 style="width:2px;">Date</th>
<th class=th1 style="width:10px;">Location</th>
<th class=th1 style="width:10px;">Department</th>
<th class=th1 style="width:100px;">Com / Sug / Req </th>
<th class=th1 style="width:10px;"> &nbsp; Status &nbsp; </th>
<th class=th1 style="width:10px;">Adm Remark</th>
</tr>

	<?php
	while($result = mysql_fetch_array( $data ))		
	{
 	include('../maint/search2.php');
	 } ?>
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
	}
	 ?>
	</body>
	</html>

