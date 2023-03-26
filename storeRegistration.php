
// 
// $field = $_POST['field'];
// $value = $_POST['value'];

// Store the data in your database using a query
// $query = "INSERT INTO my_table ($field) VALUES ('$value')";

$.ajax({
  url: '',
  method: 'POST',
  data: {
    field: $(this).attr('name'),
    value: value
  }
});


// $field = $_POST['field'];
// $value = $_POST['value'];

// Prepare and bind the SQL statement
// $stmt = $conn->prepare("INSERT INTO my_table ($field) VALUES (?)");
// $stmt->bind_param("s", $value);

// Execute the statement
 // $stmt->execute();

// Close the statement and connection
// $stmt->close();
// $conn->close();
// ?>


<?php
// Collect user registration data from form submission
// $username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$postal_code = $_POST['postal_code'];
$account_type = $_POST['account_type'];
$investment_style = $_POST['investment_style'];
$investment_goal = $_POST['investment_goal'];
$investment_horizon = $_POST['investment_horizon'];
$occupation = $_POST['occupation'];
$annual_income = $_POST['annual_income'];
$risk_tolerance = $_POST['risk_tolerance'];
$net_worth = $_POST['net_worth'];
$investment_amount = $_POST['investment_amount'];
$age = $_POST['age'];

// Store user registration data in database
// Connect to database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mydatabase";
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert user registration data into database
$sql = "INSERT INTO users (username, password, email, first_name, last_name, phone_number, address, city, state, country, postal_code, account_type, investment_style, investment_goal, investment_horizon, employment_status, annual_income, risk_tolerance, net_worth, investment_amount) VALUES ('$username', '$password', '$email', '$first_name', '$last_name', '$phone_number', '$address', '$city', '$state', '$country', '$postal_code', '$account_type', '$investment_style', '$investment_goal', '$investment_horizon', '$employment_status', '$annual_income', '$risk_tolerance', '$net_worth', '$investment_amount')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
