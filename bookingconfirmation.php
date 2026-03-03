<?php
include"db_connection.php";


if(!isset($_GET['B_Id'])){
    echo "<p>Booking ID not specified.</p>";
    exit();
}

$id = (int)$_GET['B_Id'];


$sql = "SELECT * FROM bookings WHERE B_Id = $id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    echo "<p>Booking not found.</p>";
    exit();
}

$booking = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<header>
    <h2>Booking Confirmation</h2>
</header>

<div class="container">

    <h3>Your Booking Details</h3>

    <table>
        <tr>
            <td><strong>Guest Name:</strong></td>
            <td><?php echo htmlspecialchars($booking['guest_name']); ?></td>
        </tr>
        <tr>
            <td><strong>Phone:</strong></td>
            <td><?php echo htmlspecialchars($booking['phone']); ?></td>
        </tr>
        <tr>
            <td><strong>Number of Nights:</strong></td>
            <td><?php echo $booking['nights']; ?></td>
        </tr>
        <tr>
            <td><strong>Price per Night:</strong></td>
            <td><?php echo $booking['price_per_night']; ?> RWF</td>
        </tr>
        <tr>
            <td><strong>Total Cost:</strong></td>
            <td><?php echo $booking['total_cost']; ?> RWF</td>
        </tr>
        <tr>
            <td><strong>Status:</strong></td>
            <td class="status-<?php echo $booking['statuses']; ?>">
                <?php echo ucfirst($booking['statuses']); ?>
            </td>
        </tr>
        <tr>
            <td><strong>Booking Date:</strong></td>
            <td><?php echo $booking['created_at']; ?></td>
        </tr>
    </table>

    <br>
    <a href="index.php"><button>Back to Home</button></a>
    <a href="checkbooking.php"><button>Track Booking</button></a>

</div>

</body>
</html>