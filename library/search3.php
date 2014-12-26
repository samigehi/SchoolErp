
<html>
<head>
<title>books search...</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php 
$id = $result['id'];
$title = $result['title'];
$status = $result['status'];
$staff_name = $result['staff_name'];
?>
<tr class=tr1>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"edit_show.php?id=$id\" title='click to edit'><font color=darkblue>$id</font></a>";?></td>
<td class=td1><?php echo "<a href=\"edit_show.php?id=$id\" title='click to edit'>$title</a>";?></td>
<td class=td1><?php echo $result['author']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['class_no']; ?></td>
<td class=td1><?php echo $result['keywords']; ?></td>
<td class=td1 style="text-align:center;">
<?php 
if ($status != 'Available')
 {
?>
<?php echo "<a href=\"edit_show.php?id=$id\" title='Book is Issued by - $staff_name'><font color=red>$status</font></a>"?>
<?
}
?>

<?php 
if ($status == 'Available')
 {
?>
<?php echo "<a href=\"issue.php?id=$id\" title='Book is Available'><font color=blue>$status</font></a>"?>
<?
}
?>
</td>
</tr>
</div>
</body>
</html>
