<?php
header("Access-Control-Allow-Origin: *");

$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, NULL, NULL, NULL); mysqli_real_connect($con, "tutoraway-sql-server.mysql.database.azure.com", "sushadmin@tutoraway-sql-server", "sush93@azure", "tutorawaydb", 3306);

// $method = $_SERVER['REQUEST_METHOD'];

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

//   echo "Connected successfully";

$name = $_POST["name"];
$email = $_POST["email"];
$city = $_POST["city"];
$phone = $_POST["phone"];

$sql="insert into users (name,email,city,phone) values('$name', '$email', '$city', '$phone')";

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);