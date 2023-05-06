<!DOCTYPE html>
<html>
<head>
	<title>Update Student Enquiry Form</title>
    <link rel="stylesheet" href="style.css" >
<style>
    body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        
        h1 {
            color: white;
            margin-top: 50px;
        }
        
        p {
            font-size: 18px;
            margin-top: 30px;
            margin-bottom: 50px;
        }
        
        button {
			background-color: white;
            color: black;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            border: #F27121;
			cursor: pointer;
		}
        
        button:hover {
            background-color: #F27121;
		}
        </style>
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

	// Retrieving the form data from the update form
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$education = $_POST['education'];
	$message = $_POST['message'];

	// Updating the form data in the database
	$sql = "UPDATE student_enquiry SET name='$name', email='$email', education='$education', message='$message' WHERE mobile='$mobile'";
	if (mysqli_query($conn, $sql)) {
		echo "<p>The student enquiry form data has been successfully updated.</p>";
		echo "<button onclick=\"location.href='index.html'\">Return to Home Page</button>";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}

	// Closing the database connection
	mysqli_close($conn);
	?>
</body>
</html>
