function autoSubmit()
{
    var formObject = document.forms['theForm'];
    formObject.submit();
}


function validateFormissue()
{

if(document.theForm.staff_type.selectedIndex==0)
{
alert("Please select 'Customer Type'");
document.theForm.staff_type.focus();
return false;
}
}


function validateFormpurchase()
{

if(document.purchase_addform.supplier.selectedIndex==0)
{
alert("Please select 'Supplier Name'!");
document.purchase_addform.supplier.focus();
return false;
}

var x=document.forms["purchase_addform"]["bill_no"].value;
if (x==null || x=="")
  {
  alert("'Bill No' field is empty!");
  return false;
  }
 }


