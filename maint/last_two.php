<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="refresh" content="300;url=today.php">
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

<?php
include("../maint/index.php");

$today = date("Y-m-d");
$yesterday = date("Y-m-d", strtotime("-1 day"));

include("connect.php");

if ($_SESSION['user_name'] == 'admin')
{
$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') order by id desc");
}

//for building 
if($_SESSION['user_name'] == 'satish' || $_SESSION['user_name'] == 'bsriram')
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
$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') AND department IN ('$building_1','$building_2', '$building_3', '$building_4', '$building_5', '$building_6', '$building_7', '$building_8', '$building_9') order by id desc");
}

//electronics
if ($_SESSION['user_name'] == 'gbhau')
{
$electronics_1 = "computer";
$electronics_2 = "telephone";
$electronics_3 = "audio visual";
$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') AND department IN ('$electronics_1', '$electronics_2', '$electronics_3') order by id desc");
}

//admin office
if ($_SESSION['user_name'] == 'adminoff')
{
$adminoff_1 = "admin office";
$adminoff_2 = "transport";
$adminoff_3 = "guest house";
$adminoff_4 = "study centre";
$adminoff_5 = "";
$adminoff_6 = "others";
$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') AND department IN ('$adminoff_1', '$adminoff_2', '$adminoff_3', '$adminoff_4', '$adminoff_5', '$adminoff_6') order by id desc");
}

//accounts
if ($_SESSION['user_name'] == 'accounts')
{$accounts = "accounts";

$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') AND department IN ('$accounts') order by id desc");
}

//medical
if ($_SESSION['user_name'] == 'medical')
{$medical = "medical unit";
$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') AND department IN ('$medical') order by id desc");
}

//library
if ($_SESSION['user_name'] == 'library')
{$library = "library";
$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') AND department IN ('$library') order by id desc");
}

//salim
if ($_SESSION['user_name'] == 'salim')
{$art_room = "art room";
$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') AND department IN ('$art_room') order by id desc");
}

//tuckshop
if ($_SESSION['user_name'] == 'tuckshop')
{$tuckshop = "tuckshop";
$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') AND department IN ('$tuckshop') order by id desc");
}

//dining hall
if ($_SESSION['user_name'] == 'dininghall')
{$dining_hall = "dining hall";
$data = mysql_query("SELECT * FROM maint WHERE compldate IN ('$yesterday', '$today') AND department IN ('$dining_hall') order by id desc");
} ?>

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
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
		
	{
	include('search2.php');
	 }?>

	</table>
	</div>
	</div>	

	<?php	  
//This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	if ($anymatches == 0)
	 {
	 echo "<p>No entries found for today</p>";
	 }
	 ?>

</html>
