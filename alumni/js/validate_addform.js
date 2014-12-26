function validateForm()
{
var x=document.forms["cv_addform"]["cv_name"].value;
if (x==null || x=="")
  {
  alert("Error: 'Name' field is empty");
  return false;
  }

var x=document.forms["cv_addform"]["cv_dob"].value;
if (x==null || x=="")
  {
  alert("Error: 'Date of Birth' is empty");
  return false;
  }

if(document.cv_addform.gender.selectedIndex==0)
{
alert("Error: Please select Gender");
document.cv_addform.gender.focus();
return false;
}

if(document.cv_addform.marital_status.selectedIndex==0)
{
alert("Error: Please select Marital Status");
document.cv_addform.marital_status.focus();
return false;
}

var x=document.forms["cv_addform"]["cv_email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Error: Not a valid e-mail address");
  return false;
  }

var x=document.forms["cv_addform"]["mobile_no"].value;
if (x==null || x=="")
  {
  alert("Error: 'Mobile no.' field is empty");
  return false;
  }

var x=document.forms["cv_addform"]["address"].value;
if (x==null || x=="")
  {
  alert("Error: 'Street address' field is empty");
  return false;
  }

var x=document.forms["cv_addform"]["city"].value;
if (x==null || x=="")
  {
  alert("Error: 'City/Town' field is empty");
  return false;
  }

var x=document.forms["cv_addform"]["state"].value;
if (x==null || x=="")
  {
  alert("Error: 'State' field is empty");
  return false;
  }

var x=document.forms["cv_addform"]["country"].value;
if (x==null || x=="")
  {
  alert("Error: 'Country' field is empty");
  return false;
  }

if(document.cv_addform.graduation.selectedIndex==0)
{
alert("Error: Please fill the data for Educational qualifications.");
document.cv_addform.gender.focus();
return false;
}

if ( ( form.select_kfi[0].checked == true ))
{
alert ( "Please choose your Gender: Male or Female" );
return false;
}

var x=document.forms["cv_addform"]["cv_file"].value;
if (x==null || x=="")
  {
  alert("Error: Please upload your CV");
  return false;
  }

var fup = document.getElementById('filename');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "doc" || ext == "docx" || ext == "pdf" || ext == "odt" || ext == "rtf")
{
return true;
} 
else
{
alert("Upload only doc, docx, pdf, odt & rtf files");
fup.focus();
return false;
}
}
