
	<?php
	include('index.php');

	$searching=$_POST['searching'];
	$find=$_POST['find'];
	$field=$_POST['field']; //This code right here was left out
	 
	 
	 //This is only displayed if they have submitted the form
	 if ($searching =="yes")
	 {
	
	 //If they did not enter a search term we give them an error
	 if ($find == "")
	 {
	 echo "<font style='font-weight:normal;'>You forgot to enter a search term.</font>";
	 }
	  
	 // Otherwise we connect to our Database
	 
	include("connect.php");
	  
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);
	  
	 //Now we search for our search term, in the field the user specified
	 $data = mysql_query("SELECT id, idphoto, staff_name, mobile_no, designation, department, class_teacher_of, house_parent_of, staff_email FROM staff WHERE upper($field) LIKE '%$find%' AND status = 'Working' ORDER BY staff_name");?>
	 
<div class="contentA">
<table class="table_new">
<tr>
<th class=th1 style="width:5px;">Photo</th>
<th class=th1 style="width:100px;">Staff Name</th>
<th class=th1 style="width:15px;">Designation</th>
<th class=th1 style="width:15px;">Department</th>
<th class=th1 style="width:10px;">Class Teacher Of</th>
<th class=th1 style="width:30px;">House Parent Of</th>
<th class=th1 style="width:60px;">Option</th>
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
	 }

	mysql_close();
	 ?>

