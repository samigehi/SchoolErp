<?php
if (!isset($_SESSION)) {
session_start();
}
	include('index.php');

	$fromdate = $_GET['fromdate'];
	$todate = $_GET['todate'];
	$find=$_GET['find'];
	$field=$_GET['field']; //This code right here was left out
	 	  
	 // Otherwise we connect to our Database 
	include("connect.php");
	  
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);

	$data = mysql_query("SELECT * FROM members WHERE upper($field) LIKE'%$find%' AND added_date BETWEEN '$fromdate' AND '$todate' ORDER BY st_name");
	?>
<div class="contentA">
<table style="margin:auto auto auto auto; width:100%; font-size:11.5px; color:#333333; border-width:1px; border-color:#999999; border-collapse: collapse;">
<tr>
	<th class=th1 style="width:5px;">Sr. No.</th>
	<th class=th1 style="width:30px;">Name</th>
	<th class=th1 style="width:5px;">Batch</th>
	<th class=th1 style="width:5px;">City</th>
	<th class=th1 style="width:5px;">Mobile No</th>
	<th class=th1 style="width:10px;">Email</th>
	<th class=th1 style="width:40px;">Message from students</th>
	<th class=th1 style="width:60px;">Edit / Delete</th>
</tr>
	<?php 
	$count = '0';
	 //And we display the results
	 while($result = mysql_fetch_array( $data ))
	 {
	$count++;
	$st_name = $result['st_name'];
	$user_id = $result['user_id'];
	?>

	<tr class=tr1>
	<td class=td1 style="text-align:center;"><?php echo $count;?></td>
	<td class=td1><?php echo "<a href=\"show_profile.php?user_id=$user_id\">$st_name</a>";?></td>
	<td class=td1><?php echo $result['batch'];?></td>
	<td class=td1><?php echo $result['city'];?></td>
	<td class=td1><?php echo $result['st_mobile_no'];?></td>
	<td class=td1><?php echo $result['username'];?></td>
	<td class=td1><?php echo $result['contribute'];?></td>
	<td class=td1 style="text-align:center;"><?php echo "<a href=\"show_profile.php?user_id=$user_id\">Edit</a>";?> | <?php echo "<a href=\"delete.php?user_id=$user_id\">Delete</a>";?></td>
	</tr>

	<?php
	 }?>
	</table>
	<br>
	<div align=right>
	<a href="export_xls.php" title="export to xls" > Export <img src="images2/xls.gif" border="0" alt="xls"></a>
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
	 echo "[ <b>Searched For : </b><font color=red>$find</font> ] &nbsp; &nbsp; &nbsp; ";
	 echo "[ <b>Records Found : </b><font color=red>$anymatches</font> ]";
	 ?>
	<br><br>
	</body>
	</html>

