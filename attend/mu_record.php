<html>
<head>
<title>sort attendance...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../attend/css/new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("../attend/index.php");
include("../attend/connect.php");

$adm = $_GET['st_adm'];

$school_date = trim($_GET['school_date']);

$qP = "SELECT * FROM medical WHERE st_adm = '$adm' AND adm_date = '$school_date'";

$rsP = mysql_query($qP);
?>

	<div class="contentB">
	<table class=table1 >
	<tr>
	<th class=th1 style="width:10px;">Date</th>
	<th class=th1 style="width:5px;">Class</th>
	<th class=th1 style="width:100px;">Name</th>
	<th class=th1 style="width:10px;">House</th>
	<th class=th1 style="width:50px;">Complaint</th>
	<th class=th1 style="width:10px;">Dr Remark</th>
	</tr>

	<?php
	 //And display the results
	while($result = mysql_fetch_array( $rsP ))			
	{
 		
$st_name = $result['st_name'];
?>
<tr>
<td class=td1 style="text-align:center;"><?php echo $result['adm_date']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['st_class']; ?></td>
<td class=td1><?php echo $st_name;?></td>
<td class=td1><?php echo $result['st_house']; ?></td>
<td class=td1 style="text-align:center; width:5px;"><?php echo $result['complaint']; ?></td>
<td class=td1 style="text-align:center; width:5px;"><?php echo $result['dr_remark']; ?></td>

	<?php
	 }
		
	?>
</table>
</body>
</html>

