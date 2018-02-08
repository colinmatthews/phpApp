<?php


DEFINE('servername','localhost');
DEFINE ('username','matth11f_SQLuser');
DEFINE ('password','password');
DEFINE ('dbname','matth11f_testDB');


// Create connection
$conn = new mysqli(servername,username,password,dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}