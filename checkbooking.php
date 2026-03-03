<?php
include"db_connection.php";

$bookings = null;
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $sql = "SELECT * FROM bookings WHERE phone = '$phone' ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $bookings = $result;
    } else {
        $message = "No bookings found for this phone number.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Track Booking</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<header>
    <h2>Track Your Booking</h2>
</header>

<div class="container">

    <form method="POST">
        <input type="text" name="phone" placeholder="Enter Phone Number" required>
        <button type="submit">Search Booking</button>
    </form>

    <br>

    <?php if ($message != ""): ?>
        <p style="color:red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <?php if ($bookings): ?>

        <h3>Your Booking History</h3>

        <table>
            <tr>
                <th>Guest Name</th>
                <th>Nights</th>
                <th>Total Cost</th>
                <th>Status</th>
                <th>Date</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($bookings)): ?>

                <tr>
                    <td><?php echo htmlspecialchars($row['guest_name']); ?></td>
                    <td><?php echo $row['nights']; ?></td>
                    <td><?php echo $row['total_cost']; ?> RWF</td>

                    <td class="status-<?php echo $row['statuses']; ?>">
                        <?php echo ucfirst($row['statuses']); ?>
                    </td>

                    <td><?php echo $row['created_at']; ?></td>
                </tr>

            <?php endwhile; ?>

        </table>

    <?php endif; ?>

    <br>
    <a href="index.php">
        <button>Back to Home</button>
    </a>

</div>

</body>
</html>