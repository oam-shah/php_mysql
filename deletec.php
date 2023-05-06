<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
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
	<h1>Delete Student Enquiry Data</h1>
	<?php
	// Establishing connection with the database
	$conn = mysqli_connect("localhost", "Oam", "12345", "students_db");

	// Checking if the connection was successful
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Retrieving the mobile number from the form submission
	$mobile = $_POST['mobile'];

	// Deleting the form data from the database
	$sql = "DELETE FROM student_enquiry WHERE mobile='$mobile'";
	if (mysqli_query($conn, $sql)) {
		echo "<p>The student data has been successfully deleted.</p>";
		echo "<button onclick=\"window.location.href='index.html'\">Return to Home Page</button>";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}

	// Closing the database connection
	mysqli_close($conn);
	?>
</body>
</html>
