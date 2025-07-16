<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dbss';

$my = new mysqli($host, $username, $password, $database);
if ($my->connect_error) {
    die("Connection failed: " . $my->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_car = $_POST['selected_car'];
    $stmt = $my->prepare("INSERT INTO cars (selected_car) VALUES (?)");
    $stmt->bind_param("s", $selected_car);

    if ($stmt->execute()) {
        echo "New record created successfully. You have selected: " . htmlspecialchars($selected_car);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $my->close();
} else {
    echo "Form submission error.";
}
?>
