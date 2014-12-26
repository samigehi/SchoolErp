<html>
<head>
<title>Staff Search</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php 
$id = $result['id']; 
$staff_name = $result['staff_name'];
$idphoto = $result['idphoto'];
?>
<tr class=tr1>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"upload.php?id=$id\"><img style='background-image:url(bg.jpg);' class='img1' src='upload/$idphoto' title='upload profile photo'></a>";?></td>
<td class=td1 title="click to edit profile"><?php echo "<a href=\"update_show.php?id=$id\">$staff_name</a>";?><br>
Email : <?php echo $result['staff_email']; ?><br>
Mobile No : <?php echo $result['mobile_no']; ?>
</td>
<td class=td1 style="text-align:center;"><?php echo $result['designation']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['department']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['class_teacher_of']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['house_parent_of']; ?></td>
<td class=td1 style="text-align:center;">
<?php
echo"<a href=\"update.php?id=$id\" title='edit profile'><img src='images2/edit.gif' border='0' alt='edit'></a>";
echo"&nbsp; <a href=\"id_card.php?id=$id\" target='_blank' title='generate ID card'><img src='images2/idcard.png' border='0' alt='Icard'></a>"; 
echo"&nbsp; <a href=\"delete.php?id=$id\" title='delete profile'><img src='images2/delete.png' border='0' alt='edit'></a></td>";
?>
</tr>

</body>
</html>







