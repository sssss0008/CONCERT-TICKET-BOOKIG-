<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'concert_booking');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $seat_type = $_POST['seatType'];
    $quantity = $_POST['quantity'];

    $price_map = ['Normal' => 100, 'Deluxe' => 200, 'Luxury' => 300];
    $total_price = $quantity * $price_map[$seat_type];

    $stmt = $conn->prepare("INSERT INTO bookings (user_id, seat_type, quantity, total_price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isii", $user_id, $seat_type, $quantity, $total_price);
    if ($stmt->execute()) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Please log in to book.";
}
?>
