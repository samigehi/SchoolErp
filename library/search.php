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
	 echo "<p style='font-weight:normal; color:#800000;'>You forgot to enter a search term</p>";
	 echo exit;
	 }
	  
	include ("connect.php");
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);	
	  
	 //Now we search for our search term, in the field the user specified
	$data = mysql_query("SELECT id, title, author, class_no, keywords, status, staff_name, remarks FROM books WHERE upper($field) LIKE '%$find%' ORDER BY title");
	?>
        
	<div class="contentB">
	<div class="tbody">	
	<table class=table1 >
	<tr>
	<th class=th1 style="width:10px;">Id</th>
	<th class=th1 style="width:200px;">Title</th>
	<th class=th1 style="width:150px;">Author</th>
	<th class=th1 style="width:20px;">Class No.</th>
	<th class=th1 style="width:15px;">Keywords</th>
	<th class=th1 style="width:10px;">Status</th>
	</tr>
	
	<?php	
	 //And display the results
	 while($result = mysql_fetch_array( $data ))	
	 {
	include('search3.php');
	 }?>	
	</table>
	</div>
	<hr color=lightgray size=1>	
	        	
	<?php
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo "No entries found matching your query<br>";
	 }
	 //And we remind them what they searched for
	 echo "[ <b>Searched For : </b> <font color=red>$find </font> ] &nbsp; &nbsp; ";
	 echo "[ <b>Books Found : </b> <font color=red>$anymatches</font> ]";	 
		
	 }
	mysql_close();
	 ?>
	</div>
	<div class="clear"></div>
	</div>
	</body>
	<html>
