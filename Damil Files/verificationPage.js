/*
const button = document.getElementById("myButton");

  button.addEventListener("click", () => {
    alert("Check your email for verification link to proceed with your application");
  });
  

  function showMessage() {
    window.location.href = "message.html";
  }
  

  function displayMessage() {
    var messageDiv = document.getElementById("message");
    messageDiv.innerHTML = "Check your email for verification link to proceed with your application";
  }

  

  function displayMessage() {
    var messageDiv = document.getElementById("message");
    messageDiv.innerHTML = "Check your email for verification link to proceed with your application";
    messageDiv.style.display = "block";
  }

  function displayVerificationMessage() {
    var message = "<h1>Check your email for verification link to proceed with your application</h1>";
    document.getElementById("verification-message").innerHTML = message;
  }
  

  function displayVerificationMessage() {
    var newPage = window.open();
    newPage.document.write("<html><head><title>Verification Message</title></head><body>");
    newPage.document.write("<h1>Check your email for verification link to proceed with your application</h1>");
    newPage.document.write("</body></html>");
  }

  */

  function displayVerificationMessage() {
    // Show the verification message container
    var verificationMessageContainer = document.querySelector('.verification-message-container');
    verificationMessageContainer.style.display = 'block';
  }