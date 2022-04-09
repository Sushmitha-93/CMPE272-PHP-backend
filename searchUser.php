<?php
header("Access-Control-Allow-Origin: *");

$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, NULL, NULL, NULL); mysqli_real_connect($con, "tutoraway-sql-server.mysql.database.azure.com", "sushadmin@tutoraway-sql-server", "sush93@azure", "tutorawaydb", 3306);

// $method = $_SERVER['REQUEST_METHOD'];

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

//   echo "Connected successfully";

if(isset($_POST["name"])){
    $name = $_POST['name'];  
  } 

$sql = "select * from users".($name?" where name='$name'":''); 
// echo $sql;

$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result)>1) echo '[';

for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
}

if (mysqli_num_rows($result)>1) echo ']';

mysqli_close($con);