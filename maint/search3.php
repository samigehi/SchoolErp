<html>
<head>
<title>Complaint Search...</title>
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

?>
<tr>
<td class=td1 style="text-align:center;"><?php echo $result['id']; ?></td>
<td class=td1><?php echo $result['name']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['compldate']; ?></td>
<td class=td1><? echo $result['location']; ?></td>
<td class=td1><? echo $result['department'];?></td>
<td class=td1> <? echo $result['compldetails']; ?></td>
<td class=td1 style="text-align:center;"><? echo $result['currentpro'];?></td>
<td class=td1 style="text-align:center; color:red;"><? echo $result['admin_remark'];?></td>
</body>
</html>
