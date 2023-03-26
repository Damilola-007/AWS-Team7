/*
  const getStartedDiv = document.getElementById("get-started");
  getStartedDiv.addEventListener("click", function() {
    window.location.href = "registration-page.html";
  });
  document.getElementById("get-started").onclick = function () {
    location.href = "registration-page.html";
  };
*/

//Get the registration link element
const getStartedButton = document.getElementById('get-started');

getStartedButton.addEventListener('click', function() {
  // Change the appearance of the button
  getStartedButton.classList.add('clicked');
  
  // Redirect to registration page
  window.location.href = 'registration.html';
});


// Get the login link element
const loginLink = document.querySelector('.v1_24');

// Add a click event listener to the login link element
loginLink.addEventListener('click', () => {
  // Navigate to the login page
  window.location.href = 'Login.html';
});