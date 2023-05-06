<?php
// Establishing connection with the database
$conn = mysqli_connect("localhost", "Oam", "12345", "students_db");

// Checking if the connection was successful
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Processing the form data if the submit button is clicked
if (isset($_POST['submit'])) {
	// Retrieving the form data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$education = $_POST['education'];
	$message = $_POST['message'];

	// Validating the email and mobile fields
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email format";
		exit();
	}
	if (!preg_match("/^[0-9]{10}$/", $mobile)) {
		echo "Invalid mobile number";
		exit();
	}

	// Inserting the form data into the database
	$sql = "INSERT INTO student_enquiry (name, email, mobile, education, message) VALUES ('$name', '$email', '$mobile', '$education', '$message')";
	if (mysqli_query($conn, $sql)) {
        header("Location: confirmation.html");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

// Closing the database connection
mysqli_close($conn);
?>
