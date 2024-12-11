<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'concert_booking');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        header("Location: ticket_booking.php");
        exit();
    } else {
        echo "Invalid credentials. <a href='index.html'>Go back</a>";
    }
}
?>
