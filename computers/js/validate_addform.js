function validateFormissue()
{

if(document.issue_addfrom.customer_name.selectedIndex==0)
{
alert("Please select 'Issue To'!");
document.issue_addfrom.customer_name.focus();
return false;
}

var x=document.forms["issue_addfrom"]["requisition_no"].value;
if (x==null || x=="")
  {
  alert("'Requisition No' field is empty!");
  return false;
  }
 }


function validateFormpurchase()
{

if(document.purchase_addform.supplier_name.selectedIndex==0)
{
alert("Please select 'Supplier Name'!");
document.purchase_addform.supplier_name.focus();
return false;
}

var x=document.forms["purchase_addform"]["bill_no"].value;
if (x==null || x=="")
  {
  alert("'Bill No' field is empty!");
  return false;
  }

var x=document.forms["purchase_addform"]["pindt_no"].value;
if (x==null || x=="")
  {
  alert("'Purchase Indent No' field is empty!");
  return false;
  }
 }
