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
        echo "<h3>Booking Successful!</h3>";
        echo "<p>Seat Type: $seat_type</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>Total Price: Rs. $total_price</p>";
        echo "<a href='ticket_booking.php'>Back to Booking</a>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Please log in to book.";
}
?>
