<?php
$user = 'root';
$pass = '';
$db = 'nfq';

$con = new mysqli('localhost', $user, $pass, $db);

if ($con->connect_error) {
	die ("Klaida: Nepavyko prisijungti. " . $con->connect_error);
}
mysqli_set_charset($con,"utf8");
?>