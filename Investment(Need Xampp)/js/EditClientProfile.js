function editoptions()
{
  document.getElementById('spanusername').style.display='none';
  document.getElementById('spanemail').style.display='none';
  document.getElementById('spanphoneno').style.display='none';
  document.getElementById('spanoccupation').style.display='none';
  document.getElementById('spanstyle').style.display='none';
  document.getElementById('spangoal').style.display='none';
  document.getElementById('spanhorizon').style.display='none';
  document.getElementById('spaninvestedamount').style.display='none';
  document.getElementById('spanfirstname').style.display='none';
  document.getElementById('spanlastname').style.display='none';
  document.getElementById('spancountry').style.display='none';
  document.getElementById('spanaccount_type').style.display='none';
  document.getElementById('spanrisk_tolerance').style.display='none';
  document.getElementById('changepassword').style.display='none';
  document.getElementById('editaccount').style.display='none';


  document.getElementById('txtusername').style.display='block';
  document.getElementById('txtemail').style.display='block';
  document.getElementById('txtphoneno').style.display='block';
  document.getElementById('txtoccupation').style.display='block';
  document.getElementById('txtstyle').style.display='block';
  document.getElementById('txtgoal').style.display='block';
  document.getElementById('txthorizon').style.display='block';
  document.getElementById('txtinvestedamount').style.display='block';
  document.getElementById('txtamountsymbol').style.display='block';
  document.getElementById('txtfirstname').style.display='block';
  document.getElementById('txtlastname').style.display='block';
  document.getElementById('txtcountry').style.display='block';
  document.getElementById('txtaccount_type').style.display='block';
  document.getElementById('txtrisk_tolerance').style.display='block';
  document.getElementById('currentpassword').style.display='block';
  document.getElementById('txtcurrentpassword').style.display='block';
  document.getElementById('changedpassword').style.display='block';
  document.getElementById('txtchangedpassword').style.display='block';
  document.getElementById('editbutton').style.display='block';
  document.getElementById('deletebutton').style.display='block';

  function Change()
  {
   var pass = document.getElementById("passvariable");
            pass.value = "2";
  }

  document.getElementById('txtchangedpassword').onchange = Change;

}
