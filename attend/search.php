	<?php
	include('index.php');

	$searching=$_POST['searching'];
	$find=$_POST['find'];
	$field=$_POST['field']; //This code right here was left out
	$fromdate=$_POST['fromdate'];
	$todate=$_POST['todate'];

	 //This is only displayed if they have submitted the form
	 if ($searching =="yes")
	 {
	 
	//If they did not enter a search term we give them an error
	 if ($find == "")
	 {
	 echo "You forgot to enter a search term";
	 echo exit;
	 }
	  
	include ("connect.php");
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);	
	  
	 //Now we search for our search term, in the field the user specified
	$data = mysql_query("SELECT * FROM attend WHERE upper($field) LIKE '%$find%' AND school_date BETWEEN '$fromdate' AND '$todate' ORDER BY st_class, st_name");
	?>

	<div class="contentB">
	<table class=table1 >
	<tr>
	<th class=th1 style="width:10px;">Date</th>
	<th class=th1 style="width:100px;">Name</th>
	<th class=th1 style="width:10px;">Adm No</th>
	<th class=th1 style="width:5px;">Class</th>
	<th class=th1 style="width:10px;">House</th>
	<th class=th1 style="width:10px;">Area</th>
	<th class=th1 style="width:5px;">Attd</th>
	<th class=th1 style="width:50px;">Remark</th>
	<th class=th1 style="width:10px;">Option</th>
	</tr>

	<?php	
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
		
	 {

	include('search3.php');

	 }?>

	</table><br>	
	<?php
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo "No entries found matching your query";
	 }
	 //And we remind them what they searched for
	 echo "Searched For : &nbsp; $find ";
	 }
	mysql_close();
	 ?>
	<hr color=lightgray size=1>
	&nbsp; &nbsp; &nbsp;<a href='javascript:history.go(-1)'><b><u>Back</u></b></a>	
	</body>
	<html>
