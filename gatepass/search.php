	<?php
	include('index.php');

	$find=$_GET['find'];
	$field=$_GET['field']; //This code right here was left out
	$fromdate = $_GET['fromdate'];
	$todate = $_GET['todate'];
	
	  
	include ("connect.php");
	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);	
	  
	 //Now we search for our search term, in the field the user specified
	$data = mysql_query("SELECT * FROM gatepass WHERE upper($field) LIKE '%$find%' AND gatepass_date BETWEEN '$fromdate' AND '$todate' ORDER BY gatepass_id");
	?>
        
	<div class="contentB">
	<div class="tbody">	
	<table class=table1 >
	<tr>
	<th class=th1 style="width:10px;">Gatepass No</th>
	<th class=th1 style="width:100px;">Items</th>
	<th class=th1 style="width:10px;">Qty</th>
	<th class=th1 style="width:50px;">Vendor Name</th>
	<th class=th1 style="width:50px;">Vendor Contact</th>
	<th class=th1 style="width:10px;">Out Date</th>	
	<th class=th1 style="width:10px;">In Date</th>
	<th class=th1 style="width:5px;">Returnable</th>
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

	mysql_close();
	 ?>
	</div>
	<div class="clear"></div>
	</div>
	</body>
	<html>
