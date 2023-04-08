function changepassword()
{
	document.getElementById('changepassword').style.display='none';
  	document.getElementById('editaccount').style.display='none';
  	document.getElementById('currentpassword').style.display='block';
    document.getElementById('txtcurrentpassword').style.display='block';
    document.getElementById('changedpassword').style.display='block';
    document.getElementById('txtchangedpassword').style.display='block';
    document.getElementById('editbutton').style.display='block';
    document.getElementById('editbutton').style.width='200px';
    document.getElementById('editbutton').innerHTML='Change Password';
    document.getElementById("txtchangedpassword").required = true;

        var pass = document.getElementById("passvariable");
            pass.value = "1";
}