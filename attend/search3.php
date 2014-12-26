
<html>
<head>
<title>daily attendance...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php 
$id = $result['id'];
$st_name = $result['st_name'];
?>
<tr>
<td class=td1 style="text-align:center;"><?php echo $count;?></td>
<td class=td1 style="text-align:center;"><?php echo $result['school_date']; ?></td>
<td class=td1><?php echo "<a href=\"update.php?id=$id\" title='click to edit'>$st_name</a>";?></td>
<td class=td1 style="text-align:center;"><?php echo $result['st_adm']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['st_class']; ?></td>
<td class=td1><?php echo $result['st_house']; ?></td>
<td class=td1 style="text-align:center; width:5px;"><?php echo $result['st_area']; ?></td>
<td class=td1 style="text-align:center; width:5px;"><?php echo $result['attend_code']; ?></td>
<td class=td1><?php echo $result['coment']; ?></td>
<td class=td1 style="text-align:center;">
<?php
echo "<a href='../attend/update.php?id=$id' title='edit'>Edit</a>"; 

if ($_SESSION['user_name'] == 'admin')
{
echo 
"&nbsp; &nbsp; <a href='../attend/delete.php?id=$id' title='delete'>Delete</a>";
}
?>
</td>
</tr>
</div>
</body>
</html>
