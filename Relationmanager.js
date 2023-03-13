function validateForm() {

  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var usernameRegex = /^\w{3,}$/;

  if (!usernameRegex.test(username)) {
    alert("Please enter a valid username.");
    return false;
  }

  // Check if "Forgot password" link is clicked
  var forgotPasswordLink = document.getElementById("forgot-password");
  forgotPasswordLink.addEventListener("click", function(event) {
    event.preventDefault();
    var email = prompt("Enter your email address:");
    if (email != null) {
      // Send a request to the server to reset the password
      fetch("/reset-password", {
        method: "POST",
        body: JSON.stringify({ email: email }),
        headers: { "Content-Type": "application/json" }
      })
      .then(response => {
        if (response.status == 200) {
          alert("An email with instructions on how to reset your password has been sent to " + email + ".");
        } else {
          alert("Sorry, we couldn't find an account associated with that email address.");
        }
      })
      .catch(error => {
        console.error(error);
        alert("An error occurred while resetting your password.");
      });
    }
  });

  // Send a request to the server to validate the username and password
  fetch("/login", {
    method: "POST",
    body: JSON.stringify({ username: username, password: password }),
    headers: { "Content-Type": "application/json" }
  })
  .then(response => {
    if (response.status == 200) {
      // Credentials are valid, redirect to the user's dashboard
      window.location.href = "/dashboard";
    } else {
      // Credentials are invalid, display an error message
      alert("Invalid username or password.");
    }
  })
  .catch(error => {
    console.error(error);
    alert("An error occurred while validating your credentials.");
  });

  // Prevent the form from submitting
  return false;
}

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




