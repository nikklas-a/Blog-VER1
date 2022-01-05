<?php 

session_start();

//Database connection

$servername = "localhost";
$username = "blogadmin";
$password = "blogadmin";
$db = "blogver1";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

define ('ROOT_PATH', realpath(dirname(__FILE__)));
define ('BASE_URL', 'http://localhost:8080/');

$blognamn = "Unnamed Blog";

?>