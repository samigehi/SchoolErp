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
	 echo "<p>You forgot to enter a search term";
	echo exit;
	 }
	  
	include ("connect.php");

	 // We preform a bit of filtering
	 $find = strtoupper($find);
	 $find = strip_tags($find);
	 $find = trim ($find);	
	  
	 //Now we search for our search term, in the field the user specified
	$data = mysql_query("SELECT * FROM maint WHERE upper($field) LIKE'%$find%' ORDER BY id");

	//filter complaints / suggestions / requests

	if (isset($_POST['searching'])){

	$com = mysql_query("SELECT * FROM maint WHERE upper($field) LIKE'%$find%' AND com_sugg='complaint'");
	$num_com = mysql_num_rows($com);

	$sug = mysql_query("SELECT * FROM maint WHERE upper($field) LIKE'%$find%' AND com_sugg='suggestion'");
	$num_sug = mysql_num_rows($sug);	
	
	$req = mysql_query("SELECT * FROM maint WHERE upper($field) LIKE'%$find%' AND com_sugg='request'");
	$num_req = mysql_num_rows($req);

	echo "<div style='margin:auto auto auto auto; text-align:center; width:50%; background-color:#FFD062; font-size:13px;'><b> &nbsp; Search : &nbsp;<font color=blue> $find </b></font> &nbsp; &nbsp; &nbsp; &nbsp;";
	echo "<font &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b> Complaints : <font color=blue> $num_com </font> &nbsp; &nbsp; Suggestions : <font color=blue> $num_sug </font> &nbsp; &nbsp; Requests : <font color=blue> $num_req </b></font>
	</div>";
	} ?>


<div class="contentB">
<table class=table1 >
<tr>
<th class=th1 style="width:2px;">ID</th>
<th class=th1 style="width:30px;">Complainant's Name</th>
<th class=th1 style="width:2px;">Date</th>
<th class=th1 style="width:10px;">Location</th>
<th class=th1 style="width:10px;">Department</th>
<th class=th1 style="width:100px;">Com / Sug / Req </th>
<th class=th1 style="width:10px;">Status</th>
<th class=th1 style="width:10px;">Adm Remark</th>
</tr>
	<?php
	 //And display the results
	 while($result = mysql_fetch_array( $data ))
		
	{

	include('search3.php');

	 }?>

	</table>
	</div>
	</div>		
	<?php
	  
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that
	 $anymatches=mysql_num_rows($data);
	 if ($anymatches == 0)
	 {
	 echo " <p>No entries found matching your query</p>";
	 }
	  
	 //And we remind them what they searched for
	 echo "<h4>Searched For : $find </h4>";
	 }

	mysql_close();
	 ?>

