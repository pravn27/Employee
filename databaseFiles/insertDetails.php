<?php 
	require_once 'database_connections.php';
	$data = json_decode(file_get_contents("php://input")); 
	$name = mysqli_real_escape_string($con, $data->name);
	$email = mysqli_real_escape_string($con, $data->email);
	$gender = mysqli_real_escape_string($con, $data->gender);
	$address = mysqli_real_escape_string($con, $data->address);

	$query = "INSERT into emp_details (emp_name,emp_email,emp_gender,emp_address) VALUES ('$name','$email','$gender','$address')";
	mysqli_query($con, $query);
	echo true;
?>