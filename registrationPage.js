// Get the form element
const form = document.querySelector("form");

// Add event listener for form submission
form.addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent default form submission

  // Get the form inputs
  const firstNameInput = document.getElementById("firstname");
  const lastNameInput = document.getElementById("lastname");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const confirmPasswordInput = document.getElementById("confirmpassword");

  // Validate the form inputs
  let isValid = true;

  // Check if first name is empty
  if (firstNameInput.value.trim() === "") {
    alert("Please enter your first name.");
    isValid = false;
  }

  // Check if last name is empty
  if (lastNameInput.value.trim() === "") {
    alert("Please enter your last name.");
    isValid = false;
  }

  // Check if email is empty
  if (emailInput.value.trim() === "") {
    alert("Please enter your email address.");
    isValid = false;
  }

  // Check if email is valid
  if (!isValidEmail(emailInput.value.trim())) {
    alert("Please enter a valid email address.");
    isValid = false;
  }

  // Check if password is empty
  if (passwordInput.value.trim() === "") {
    alert("Please enter your password.");
    isValid = false;
  }

  // Check if password is at least 8 characters long
  if (passwordInput.value.trim().length < 8) {
    alert("Your password must be at least 8 characters long.");
    isValid = false;
  }

  // Check if confirm password is empty
  if (confirmPasswordInput.value.trim() === "") {
    alert("Please confirm your password.");
    isValid = false;
  }

  // Check if password and confirm password match
  if (passwordInput.value.trim() !== confirmPasswordInput.value.trim()) {
    alert("Your passwords do not match. Please try again.");
    isValid = false;
  }

  // If form is valid, redirect to verification page
  if (isValid) {
    window.location.href = "verification.html";
  }
});

// Function to validate email address
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

//To set password rules
function checkPasswordStrength(password) {
    // Define regular expressions for password validation
    var regex = {
      lowercase: /[a-z]/,
      uppercase: /[A-Z]/,
      number: /\d/,
      special: /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]+/
    };
    
    var strength = 0;
    
    // Check password length
    if (password.length >= 8) {
      strength++;
    }
    
    // Check password complexity
    if (regex.lowercase.test(password)) {
      strength++;
    }
    
    if (regex.uppercase.test(password)) {
      strength++;
    }
    
    if (regex.number.test(password)) {
      strength++;
    }
    
    if (regex.special.test(password)) {
      strength++;
    }
    
    return strength;
  }

  const passwordInput = document.getElementById("password");
const passwordMessage = document.getElementById("password-message");

function validatePassword() {
  const password = passwordInput.value;
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
  
  if (!passwordRegex.test(password)) {
    passwordMessage.textContent = "Password is not strong enough. Please include at least 8 characters, including 1 uppercase letter, 1 lowercase letter, and 1 number.";
  } else {
    passwordMessage.textContent = "";
  }
}

passwordInput.addEventListener("input", validatePassword);

/*
const passwordInput = document.getElementById("password-input");
const passwordStrength = document.getElementById("password-strength");
const passwordRequirements = document.getElementById("password-requirements");

// function to update password strength indicator and requirements
function updatePasswordInfo() {
  const password = passwordInput.value;
  
  // Check if password meets all requirements
  const hasNumber = /\d/.test(password);
  const hasLowercase = /[a-z]/.test(password);
  const hasUppercase = /[A-Z]/.test(password);
  const hasSpecialChar = /[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/.test(password);
  const isValid = password.length >= 8 && hasNumber && hasLowercase && hasUppercase && hasSpecialChar;

  // Update password strength indicator
  if (isValid) {
    passwordStrength.textContent = "Strong";
    passwordStrength.classList.remove("weak", "medium");
    passwordStrength.classList.add("strong");
  } else if (password.length >= 6 && password.length < 8 && (hasNumber || hasLowercase || hasUppercase)) {
    passwordStrength.textContent = "Medium";
    passwordStrength.classList.remove("weak", "strong");
    passwordStrength.classList.add("medium");
  } else {
    passwordStrength.textContent = "Weak";
    passwordStrength.classList.remove("medium", "strong");
    passwordStrength.classList.add("weak");
  }

  // Update password requirements
  const requirements = [
    {isValid: hasNumber, message: "at least one number"},
    {isValid: hasLowercase, message: "at least one lowercase letter"},
    {isValid: hasUppercase, message: "at least one uppercase letter"},
    {isValid: hasSpecialChar, message: "at least one special character"},
    {isValid: password.length >= 8, message: "at least 8 characters long"}
  ];

  passwordRequirements.innerHTML = "";
  requirements.forEach((requirement) => {
    const li = document.createElement("li");
    li.textContent = requirement.message;
    li.classList.add(requirement.isValid ? "valid" : "invalid");
    passwordRequirements.appendChild(li);
  });

  // Display error message if password is not strong enough
  const errorMessage = document.getElementById("error-message");
  if (!isValid && password.length > 0) {
    errorMessage.style.display = "block";
  } else {
    errorMessage.style.display = "none";
  }
}

// update password strength and requirements on input change
passwordInput.addEventListener("input", updatePasswordInfo);
*/
