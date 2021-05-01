<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "konta";

// Połączenie z bazą
$conn = mysqli_connect("localhost","root","","konta");

// Test połączenia
if (!$conn) {
  die("Połączenie nieudane: " . mysqli_connect_error());
}

$email = $_POST['email'];
$haslo = $_POST['haslo'];

$select = "select * from konta_uzytkownikow where email='$email' && haslo='$haslo'";
$result = mysqli_query($conn, $select);
$num = mysqli_num_rows($result);
if($num == 1)
{
    header('location:index.php');
}
else
{
    echo"błąd logowania";;
}
?>