function editmanageroptions()
{
  document.getElementById('spanmanagername').style.display='none';
  document.getElementById('spanemail').style.display='none';
  document.getElementById('spanphoneno').style.display='none';
  document.getElementById('spanlocation').style.display='none';
  document.getElementById('spanbio').style.display='none';
  document.getElementById('changepassword').style.display='none';
  document.getElementById('editaccount').style.display='none';

  document.getElementById('txtmanagername').style.display='block';
  document.getElementById('txtemail').style.display='block';
  document.getElementById('txtphoneno').style.display='block';
  document.getElementById('txtlocation').style.display='block';
  document.getElementById('txabio').style.display='block';
  document.getElementById('currentpassword').style.display='block';
  document.getElementById('txtcurrentpassword').style.display='block';
  document.getElementById('changedpassword').style.display='block';
  document.getElementById('txtchangedpassword').style.display='block';
  document.getElementById('editbutton').style.display='block';
  document.getElementById('deletebutton').style.display='block';
}