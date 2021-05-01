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

$nazwa = $_POST['nazwa'];
$email = $_POST['email'];
$haslo = $_POST['haslo'];

$select = "select * from konta_uzytkownikow where email='$email'";
$result = mysqli_query($conn, $select);
$num = mysqli_num_rows($result);
if($num == 1)
{
    echo" user already exists";
}
else
{
    $reg = "insert into konta_uzytkownikow(nazwa,email,haslo) values('$nazwa','$email','$haslo')";
    mysqli_query($conn, $reg);
}
?>