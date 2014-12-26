
	<?php
	if (isset($_GET['find'])){
	include('index.php');

	$find=$_GET['find'];
	$field=$_GET['field']; //This code right here was left out
	
	 //If they did not enter a search term we give them an error
	 if ($find == "")
	 {
	 echo "<p>You forgot to enter a search term";
	 }
	  
	 // Otherwise we connect to our Database
	 
	include("connect.php");
	  
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);
	  
	 //Now we search for our search term, in the field the user specified
	 $data = mysql_query("SELECT id, idphoto, name, adm, house, class FROM std_2013_14 WHERE upper($field) LIKE'%$find%' ORDER BY name");?>


<div class="contentA">
<div align="left"><?php echo "<a href='find_xls.php?select=$field&enter=$find' title='Export to xls'>Export to xls</a>";?></div>
<table class="table_new" style="border:2px solid #999999;">
<tr>
<th class=th1 style="width:2px;">Photo</th>
<th class=th1 style="width:100px;">Student Name</th>
<th class=th1 style="width:2px;">Adm No.</th>
<th class=th1 style="width:2px;">Class</th>
<th class=th1 style="width:2px;">House</th>

<?php
if ($_SESSION['user_name'] == 'admin' || $_SESSION['user_name'] == 'office' || $_SESSION['user_name'] == 'dilip')
{
?>
<th class=th1 style="width:10px;">Options</th>
<?php
}
?>
</tr>
	<?php 
	 //And we display the results
	 while($result = mysql_fetch_array( $data ))
	 {
	 
	include('search2.php');

	 }?>

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
	 echo "[ <b>Searched For : </b><font color=red>$find</font> ] &nbsp; &nbsp; &nbsp; ";
	 echo "[ <b>Students Found : </b><font color=red>$anymatches</font> ]";
	mysql_close();
	}
	?>

