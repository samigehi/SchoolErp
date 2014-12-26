<div class=maintab>
<form name="search" action="search.php" method="post">

	<b>Select Criterion Here :</b>
	<Select NAME="field">
	<option style="margin:5px; padding-left: 10px; color:darkblue;" class=red VALUE="">-- Select --</option> 
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="st_class">Class</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="st_house">Dorm</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="st_name">Name</option>
	</Select> &nbsp;

	<b>Enter : </b><input type="text" name="find" /> &nbsp; 
        <b>Date : </b><input type="text1" id="inputField5" size="10" value="<?php echo date('Y-m-d');?>" name="school_date" /> &nbsp; 
	
	<b>Select Area :</b>
	<Select NAME="attend_area">
	<option style="margin:5px; padding-left: 10px; color:darkblue;" class=red VALUE="">-- Select --</option> 
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="Music">Music</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="Yoga">Yoga</option>
	<Option style="margin:5px; padding-left: 10px; color:darkblue;" class=pink VALUE="Sports">Sports</option>
	</Select> &nbsp;

	<input type="hidden" name="searching" value="yes" />
	<input type="submit" name="search" value="Search" />


 
</form>
</div>
