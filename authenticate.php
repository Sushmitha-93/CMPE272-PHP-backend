<?php
header("Access-Control-Allow-Origin: *");

$method = $_SERVER['REQUEST_METHOD'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['userid']=='admin' && $_POST['password']=="password")
    echo("true");
    else
    echo("false");
<?php
header("Access-Control-Allow-Origin: *");

$method = $_SERVER['REQUEST_METHOD'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['userid']=='admin' && $_POST['password']=="password")
    echo("true");
    else
    echo("false");
}