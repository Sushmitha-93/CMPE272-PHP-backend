<?php
header("Access-Control-Allow-Origin: *");

$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, NULL, NULL, NULL); mysqli_real_connect($con, "tutoraway-sql-server.mysql.database.azure.com", "sushadmin@tutoraway-sql-server", "sush93@azure", "tutorawaydb", 3306);

// $method = $_SERVER['REQUEST_METHOD'];

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

//   echo "Connected successfully";

$userid=$_POST['userid'];
$name = $_POST['name'];  
$email=$_POST['email'];
$city=$_POST['city'];
$phone=$_POST['phone'];

$sql = "select * from users where ".($userid!='[object HTMLInputElement]'? 
"userid = '$userid'" : "name like '%$name%' and email like '%$email%' and city like '%$city%' and phone like '%$phone%'"); 
//echo $sql;

$result = mysqli_query($con,$sql);

echo '[';

for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
}

echo ']';

mysqli_close($con);