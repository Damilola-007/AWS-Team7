//Code to display password when the show password box is clicked
// Toggle password visibility if "Show password" checkbox is checked
  function showPasswordCheckbox() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
      passwordField.type = "text";
    } else {
      passwordField.type = "password";
    }
  }
  


  
  