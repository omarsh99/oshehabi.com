<?php

$serverName = "localhost";
$dBUsername = "anabgdqc_omar";
$dBPassword = "Omarshehabi1598741";
$dBName = "anabgdqc_users";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}