<html>
<head>
<title>Add new complaint / Suggestion</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/new.css" rel="stylesheet" type="text/css" />

<script language="javascript"> 
function toggle() {
	var ele = document.getElementById("div1");
	
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		
  	}
	else {
		ele.style.display = "block";
			}
} 

function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}

//**************************************************************************//
function validateForm()
{
var x=document.forms["FormName"]["name"].value;
if (x==null || x=="")
  {
  alert("Name must be filled out");
  return false;
  }

var x=document.forms["FormName"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Please input valid e-mail address");
  return false;
  }

var x=document.forms["FormName"]["department"].value;
if (x==null || x=="")
  {
  alert("Please select department");
  return false;
  }

var x=document.forms["FormName"]["location"].value;
if (x==null || x=="")
  {
  alert("Please input location");
  return false;
  }


var x=document.forms["FormName"]["compldetails"].value;
if (x==null || x=="")
  {
  alert("Please input Complaint / Suggestion / Request");
  return false;
  }

WaitDiv();
}
//************************************************************************//

</script>
<style type="text/css">
#wait
{
	position: absolute;
	width: 350;
	heigth: 200;
	margin-left: 300;
	margin-top: 150;
	background-color:#FFF000;
	text-align:center;
	border: solid 1px #FFFFFF;
}
</style>
<script type="text/javascript">

function WaitDiv()
{
document.getElementById('wait').style.display = 'block';
}
</script>

</head>
<body>
<?
include("index.php");
?>

<div id="wait" style="background-color:yellow; border:1px solid black;display:none;width:300px;height:50px;"><br><b>Please wait while loading...</b></div>

<form action="added.php" method="post" name="FormName"  onsubmit="return validateForm();">
<div class=addform>
<div class="contentB">
<h3>Complaint / Suggestion / Request Form</h3><br>

<font align=left class=message><font color=red>&nbsp;<b> * </b></font> Mandatory fields </font>
<hr align=left style="margin-top:-2px;" width=98% color=orange size=1>

<div class="row">
<div class="left"><font color=red><b>* </b></font>Name :</div>
<div class="left_new">
<select NAME=mrms style="background-color:white; font-weight:normal;">
<Option value="Mr.">Mr.</option>
<Option value="Ms.">Ms.</option>
</select>
&nbsp;<input size="21" class="text1" type="text" name="name" required= "required">
</div>
<div class="left_new"> &nbsp; Tel no :</div>
<div class="contime">
<input size="8" type="text" class="text1" name="telno" value=""></div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left"><font color=red><b>* </b></font>Email :</div>
<div class="right">
<input class="text" type="text" title="Please insert valid email address!" name="email" value="">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left"><font color=red><b> * </b></font>Select :</div>
<div class="right_new">
<input type="radio" name="com_sugg" value="Complaint" checked>Complaint &nbsp;   
<input type="radio" name="com_sugg" value="Suggestion">Suggestion
<input type="radio" name="com_sugg" value="Request">Request
</div>
<div class="clear"></div>
</div> 

<div class="row">
<div class="left"><font color=red><b> * </b></font> Department :</div>
<div class="right">
<Select NAME="department">
<Option VALUE="">--- select department ---</option>

<optgroup label="Building">
<option value="electrical">Electrical</option>
<option value="furniture">Furniture</option>
<option value="masonry">Masonry</option>
<Option value="plumbing">Plumbing</option>
<Option value="watersupply">Water supply</option>
<Option value="sewage">Sewage</option>
<Option value="others">Others</option>
</optgroup>

<optgroup label="Electronics">
<option value="computer">Computer</option>
<option value="telephone">Telephone</option>
<option value="audio visual">Audio visual</option>
<Option value="others">Others</option>
</optgroup>

<optgroup label="Miscellaneous">
<Option value="admin office">Admin off</option>
<Option value="accounts office">Accounts</option>
<Option value="dining hall">Dining hall</option>
<Option value="medical unit">Medical unit</option>	
<Option value="security">Security</option>
<Option value="transport">Transport</option>
<Option value="tuckshop">Tuckshop</option>
<Option value="library">Library</option>
<Option value="art room">Art room</option>
<Option value="guest house">Guest house</option>
<Option value="gardening">Gardening</option>
<Option value="study centre">Study centre</option>
<Option value="others">Others</option>
</optgroup>
</Select>
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left"><font color=red><b> * </b></font>Location of Com / Sug / Req :</div>
<div class="right">
<input class="text" type="text" name="location" value="">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left"><font color=red><b> * </b></font>Type :</div>
<div class="right_new">
<input type="radio" name="worktype" value="new" onclick="toggle();" checked>New &nbsp;   
<input type="radio" name="worktype" value="repeat" onclick="toggle();" >Repeat  
</div>

<div id="div1" class="divstyle">
<div class="left_new"><font color=red><b> * </b></font>Ref Id :</div>
<div class="right_new">
<input class="text1" size="5" title="mention previous com / sug id" type="text" name="preid" value="">
</div>
</div>
<div class="clear"></div>
</div> 

<div class="row">
<div class="left"><font color=red><b> * </b></font> Com / Sug / Req :</div>
<div class="right">
<input class="text" type="text" name="compldetails" value="">
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">&nbsp;&nbsp;Details of Com / Sug / Req : <br>&nbsp;&nbsp;<font size="1">( Max characters: 200)</div>
<div class="right">
<TEXTAREA ROWS="4" class="textarea" id="limitedtextarea" name="description" onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,200);" onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,200);" wrap="soft"></TEXTAREA><br>
You have <input style="font-size:10px; height:20px;" readonly type="text" name="countdown" size="3" value="200"> characters left.</font>
</div>
<div class="clear"></div>
</div>

<div class="row">
<div class="left">&nbsp;&nbsp;Appointment, if any :</div>
<div class="right_new">Date :
<input size="8" class="text1" type="text" name="appodate" value="">
</div>
<div class="left_new">&nbsp; Time :</div>
<div class="contime">
<input size="8" type="text" class="text1" name="appotime" value=""></div>
<div class="clear"></div>
</div>
</div>

<div align=center>
<input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset"></div>
<hr style="margin-top:4px;" width=50% color=orange size=1></div>
</div>
</form>
</div>
<div class="clear"></div>
</div>
</div>
<hr size="1" color="lightgray">
</body>
</html>
