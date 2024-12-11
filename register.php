<?php
$conn = new mysqli('localhost', 'root', '', 'concert_booking');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $phone);
    if ($stmt->execute()) {
        echo "Registration successful! <a href='index.html'>Go back</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
