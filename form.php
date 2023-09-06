<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);




// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

//Database connection
$conn = new mysqli('localhost','root', '', 'portfoliodb');

if ($conn -> connect_error){
    die('Connection Failed: ' . $conn -> connect_error);
}else{
    $stmt = $conn -> prepare ("INSERT INTO contact_submissions (name, email, message)
      VALUES (?, ?, ?)");
      $stmt -> bind_param ("sss", $name, $email, $message);
      $stmt -> execute();
      echo "Registration successfully...";
      $stmt -> close();
      $conn -> close();
}

?>






