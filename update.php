<!DOCTYPE html>
<html>
<head>
	<title>Update Student Enquiry Form</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>
	<h1>Update Student Enquiry Form</h1>
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

	// Displaying the form data in a form for updating
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		echo "<form method='post' action='updatec.php'>";
		echo "<label>Name:</label>";
		echo "<input type='text' name='name' value='".$row['name']."'><br><br>";
		echo "<label>Email ID:</label>";
		echo "<input type='email' name='email' value='".$row['email']."'><br><br>";
		echo "<label>Mobile:</label>";
		echo "<input type='text' name='mobile' value='".$row['mobile']."' readonly><br><br>";
		echo "<label>Education:</label>";
		echo "<input type='text' name='education' value='".$row['education']."'><br><br>";
		echo "<label>Message:</label>";
		echo "<textarea name='message'>".$row['message']."</textarea><br><br>";
		echo "<button type='submit'>Update</button>";
		echo "</form>";
	} else {
		echo "No results found";
	}

	// Closing the database connection
	mysqli_close($conn);
	?>
</body>
</html>
