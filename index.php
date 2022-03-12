<?php
header("Access-Control-Allow-Origin: *");
// $x = readfile("contacts.txt");
// echo json_decode($x, true);
$contactsJSON =  file_get_contents("contacts.txt");

$contacts = json_decode($contactsJSON);

echo json_encode($contacts[0]); 


//return ($contacts);
