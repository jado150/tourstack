<?php
include "db_connection.php";


$room_prices = [
    "single" => 20000,
    "double" => 30000,
    "twin"   => 35000,
    "triple" => 50000,
    "suite"  => 80000
];

if(isset($_POST['submit'])){

    $guest_name = mysqli_real_escape_string($conn, $_POST['guest_name']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone']);
    $nights = (int) $_POST['nights'];
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);

    
    $price = $room_prices[$room_type];

   
    $total = $nights * $price;

    $query = "INSERT INTO bookings 
        (guest_name, phone, room_type, nights, price_per_night, total_cost, statuses)
        VALUES ('$guest_name', '$phoneNumber', '$room_type', '$nights', '$price', '$total', 'pending')";

    if(mysqli_query($conn, $query)){
        header("Location: bookingconfirmation.php?B_Id=" . mysqli_insert_id($conn));
        exit();
    } else {
        echo "Error saving booking: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Booking</title>
    <link rel="stylesheet" href="main.css">
    <script src="main.js" defer></script>
</head>
<body>

<header>
    <h1>Create Booking</h1>
</header>

<div class="container">
    <form method="POST">

        <input type="text" name="guest_name" placeholder="Guest Name" required><br><br>

        <input type="text" name="phone" placeholder="Phone Number" required><br><br>

        <input type="number" name="nights" id="nights" placeholder="Number of Nights" value="1" min="1" required><br><br>

        
        <label for="room_type">Select Room Type:</label>
        <select name="room_type" id="room_type" required>
            <option value="">--Choose Room--</option>
            <option value="single">Single</option>
            <option value="double">Double</option>
            <option value="twin">Twin</option>
            <option value="triple">Triple</option>
            <option value="suite">Suite.</option>
        </select><br><br>

        
        <p><strong>Price per Night:</strong> <span id="price">0</span> RWF</p>

        
        <p><strong>Estimated Total:</strong> <span id="total">0</span> RWF</p>

        <button type="submit" name="submit">Submit_Booking</button>
    </form>
</div>


</body>
</html>