<!DOCTYPE html>
<html>
<head>
	<title>Delete Student Enquiry Form</title>
    <link rel="stylesheet" href="style.css" >
    <style>
        p {
            font-size: 30px;
            margin-top: 20px;
            margin-bottom: 50px;
            text-align: center;
        }
        </style>
</head>
<body>
	<h1>Delete Student Enquiry Data</h1>
	<?php
	// Establishing connection with the database
	$conn = mysqli_connect("localhost", "Oam", "12345", "students_db");

	// Checking if the connection was successful
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Retrieving the form data based on the mobile number
	$mobile = $_POST['mobile'];
	$sql = "SELECT * FROM student_enquiry WHERE mobile='$mobile'";
	$result = mysqli_query($conn, $sql);

	// Displaying the form data in a confirmation message
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		echo "<p>Are you sure you want to delete the following form data?</p>";
		echo "<p><strong>Name:</strong> ".$row['name']."</p>";
		echo "<p><strong>Email ID:</strong> ".$row['email']."</p>";
		echo "<p><strong>Mobile:</strong> ".$row['mobile']."</p>";
		echo "<p><strong>Education:</strong> ".$row['education']."</p>";
		echo "<p><strong>Message:</strong> ".$row['message']."</p>";
		echo "<form method='post' action='deletec.php'>";
		echo "<input type='hidden' name='mobile' value='".$row['mobile']."'>";
		echo "<button type='submit'>Delete</button>";
		echo "</form>";
	} else {
		echo "No results found";
	}

	// Closing the database connection
	mysqli_close($conn);
	?>
</body>
</html>

