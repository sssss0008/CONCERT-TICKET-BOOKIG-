<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🎟️ Ticket Booking Page 🎶</h1>
    <form action="process_booking.php" method="POST">
        <label for="seatType">Select Seat Type:</label>
        <select id="seatType" name="seatType" required>
            <option value="Normal">Normal - Rs. 100</option>
            <option value="Deluxe">Deluxe - Rs. 200</option>
            <option value="Luxury">Luxury - Rs. 300</option>
        </select>
        
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>
        
        <button type="submit">Book Ticket</button>
    </form>
    
    <button onclick="logout()">Logout</button>
    
    <script>
        function logout() {
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>
