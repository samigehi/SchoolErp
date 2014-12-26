
	<?php
	if (isset($_GET['find'])){
	include('index.php');

	$find=$_GET['find'];
	$field=$_GET['field']; //This code right here was left out
		  
	include("connect.php");
	  
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);
	  
	 //Now we search for our search term, in the field the user specified
	 $data = mysql_query("SELECT id, idphoto, name, adm, house, class, class_teach, house_parent, email, email_2, mobile_no, mobile_no_2, profile_status FROM std_2014_15 WHERE upper($field) LIKE'%$find%' ORDER BY name");?>

<?php echo "<a href=\"find_xls.php?select=$field&enter=$find\" title='export to xls'> <img src='images2/xls.gif' border='0' alt='xls'> Export</a>";?>

<table class="table_new" style="border:2px solid #999999;">
<tr>
<th class=th1 style="width:2px;">Photo</th>
<th class=th1 style="width:50px;">Student Name</th>
<th class=th1 style="width:2px;">Adm No.</th>
<th class=th1 style="width:2px;">Class</th>
<th class=th1 style="width:2px;">Class Teacher</th>
<th class=th1 style="width:2px;">House</th>
<th class=th1 style="width:2px;">House Parent</th>
<th class=th1 style="width:10px;">Options</th>
</tr>
	<?php 
	$studing = '0';	
	$left = '0';
	 //And we display the results
	 while($result = mysql_fetch_array( $data ))
	 {
$profile_status = $result ['profile_status'];	
if ($profile_status == "Studing"){
	$studing++;
	}

if ($profile_status == "Left"){
	$left++;
	}
$id = $result['id']; 
$adm = $result['adm']; 
$name = $result['name'];
$class = $result['class'];
$idphoto = $result['idphoto'];
?>
<tr class=tr1>
<td class=td1 style="text-align:center;"><?php echo "<a href=\"upload.php?id=$id&find=$find&field=$field\"><img style='background-image:url(bg.jpg);' class='img1' src='upload/$idphoto' title='upload profile photo'></a>";?></td>
<td class=td1 title="view profile"> &nbsp; <?php echo "<a href=\"update_show.php?id=$id\">$name</a>";?>
<br>&nbsp; Email (F): <?php echo $result['email']; ?>
<br>&nbsp; Email (M): <?php echo $result['email_2']; ?>
<br>
<br>&nbsp; Mobile (F): <?php echo $result['mobile_no']; ?>
<br>&nbsp; Mobile (M): <?php echo $result['mobile_no_2']; ?>
</td>

<td class=td1 style="text-align:center;"><?php echo $result['adm']; ?></td>
<td class=td1 style="text-align:center;"><?php echo $result['class']; ?></td>
<td class=td1 style="text-align:left;"><?php echo $result['class_teach']; ?></td>
<td class=td1 style="text-align:left;"><?php echo $result['house']; ?></td>
<td class=td1 style="text-align:left;"><?php echo $result['house_parent']; ?></td>

<td class=td1 style='text-align:center;'>
<?php
echo"<a href=\"update.php?id=$id\" title='edit profile'><img src='images2/edit.gif' border='0' alt='edit'></a>";
echo"&nbsp; <a href=\"id_card.php?id=$id\" target='_blank' title='generate ID card'><img src='images2/idcard.png' border='0' alt='Icard'></a>"; 
echo"&nbsp; <a href=\"delete.php?id=$id\" title='delete profile'><img src='images2/delete.png' border='0' alt='edit'></a></td>";
?>
</tr>
<?php
}
?>
</table>
</div>
</div>
<div class="clear"></div>
</div>
<hr color=lightgray size=1>

	<?php
	  
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo "Sorry, but we can not find an entry to match your query<br><br>";
	 }
	  
	 //And we remind them what they searched for
	 echo "<p style='font-weight:normal;'>[ Searched For : $find ] &nbsp; &nbsp; ";
	 echo "[  <font color=blue> Records :$anymatches </font>] &nbsp; &nbsp;";
	 echo "[ <font color=green> Studing : $studing </font>] &nbsp; &nbsp;";
	 echo "[ <font color=red> Left : $left </font>] </p>";
	mysql_close();
	}
	?>

