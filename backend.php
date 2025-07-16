<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dbss';

$conn = new mysqli($host, $username, $password, $database);


if (!$conn) {
    die("Connection failed dueto : " .mysqli_connect_error());
}
// echo "successfully connected";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $username = $_POST['username'] ?? ''; 
    $email = $_POST['email'] ?? '';
    $city = $_POST['city'] ?? ''; 
    $gender = $_POST['gender'] ?? '';
    $address = $_POST['address'] ?? '';
    $payment_method = $_POST['paymentMethod'] ?? '';


    $stmt = $conn->prepare("INSERT INTO registrations (name, username, email, city, gender, address, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    $stmt->bind_param("sssssss", $name, $username, $email, $city, $gender, $address, $payment_method);

    if ($stmt->execute()) {
       
        header("Location: buy.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
} else {
    echo "Please submit the form correctly.";
}
?>