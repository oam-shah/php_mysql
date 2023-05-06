<!DOCTYPE html>
<html>
<head>
	<title>Student Enquiry Data</title>

	<style>

		body {
			text-align: center;
			font-family: Arial, sans-serif;
            color:white;
            background-image: linear-gradient(to right, #8A2387, #E94057, #F27121);
  
		}

		h1 {
			color: white;
			margin-top: 50px;
		}

		table {
			margin: 50px auto;
			border-collapse: collapse;
			width: 80%;
			text-align: left;
		}

		th, td {
			padding: 10px;
			border-bottom: 1px solid #ddd;
            font-size: 20px;
		}

		tr:hover {
			background-color: #f5f5f5;
            color: black;
		}

		form {
			margin-bottom: 50px;
		}

		input[type=text] {
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			
			width: 200px;
			margin-right: 10px;
		}

		button {
			background-color: #E94057;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
			cursor: pointer;
		}

       

		button:hover {
            background-color: #F27121;
		}
	</style>

</head>
<body>

<body>
	<h1>View Data by Mobile Number</h1>

	<!-- Search form -->
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="mobile">Enter Mobile Number:</label>
		<input type="text" name="mobile" id="mobile" required>
		<button type="submit" name="submit">Search</button>
	</form>
	<h1>Student Enquiry Data</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Email ID</th>
			<th>Mobile</th>
			<th>Education</th>
			<th>Message</th>
			<th>Action</th>
		</tr>

		<?php

        // Establishing connection with the database
	$conn = mysqli_connect("localhost", "Oam", "12345", "students_db");

	// Checking if the connection was successful
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
		
		// Displaying the form data in a table
        if (isset($_POST['submit'])) {
            $mobile = $_POST['mobile'];
            $sql = "SELECT * FROM student_enquiry WHERE mobile='$mobile'";
            $result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['mobile']."</td>";
				echo "<td>".$row['education']."</td>";
				echo "<td>".$row['message']."</td>";
				echo "<td>";
				echo "<form method='post' action='update.php'>";
				echo "<input type='hidden' name='mobile' value='".$row['mobile']."'>";
				echo "<button type='submit'>Update</button>";
				echo "</form>";
				echo "<form method='post' action='delete.php'>";
				echo "<input type='hidden' name='mobile' value='".$row['mobile']."'>";
				echo "<button type='submit'>Delete</button>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
			}
		} 
    }else {
			echo "<tr><td colspan='6'>No results found</td></tr>";
		}
		?>
	</table>
</body>
</html>
