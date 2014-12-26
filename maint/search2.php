<html>
<head>
<title>complaint Search...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
<style type="text/css">
a:link .img, a:visited .img { width: 100px; height: 100px; }
a:hover .img { width: 200px; height: 200px; }
</style> 

</head>
<body>

<?php 
$id = $result['id']; 
$name = $result['name'];
if ($result['currentpro'] == 'completed'){
	$color="green";
	}

	if ($result['currentpro'] == 'inprogress'){
	$color="red";
	}
?>
<tr>
<td class=td1 style="text-align:center; background-color:#FFCC66;"><b><?php echo $id; ?></b></td>
<td class=td1><?php echo "<a href=\"update.php?id=$id&fromdate=$fromdate&todate=$todate&name=$name\">$name</a>";?></td>
<td class=td1 style="text-align:center;"><?php echo $result['compldate']; ?></td>
<td class=td1><?php echo $result['location']; ?></td>
<td class=td1><?php echo $result['department'];?></td>
<td class=td1> <?php echo $result['compldetails']; ?></td>
<td class=td1> <?php echo $result['description']; ?></td>
<td class=td1 style="text-align:center; color:<?php echo $color;?>;"><?php echo $result['currentpro'];?></td>
<td class=td1><?php echo $result['matrluse'];?></td>
<td class=td1 style="text-align:center; color:red;"><blink><u><?php echo $result['admin_remark'];?></u></blink></td>
</tr>
</body>
</html>
