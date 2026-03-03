<?php
session_start();
include("includes/database_connection.php");

// Check login
if(!isset($_SESSION['owner_logged_in']) || $_SESSION['owner_logged_in'] !== true){
    header("Location: owner_login.php");
    exit();
}

// Fetch all bookings
$sql = "SELECT * FROM bookings ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Owner Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h2>Owner Dashboard</h2>
</header>

<div class="container">

    <a href="logout.php"><button>Logout</button></a>

    <h3>All Bookings</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Guest Name</th>
            <th>Phone</th>
            <th>Nights</th>
            <th>Total Cost</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['guest_name']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo $row['nights']; ?></td>
                <td><?php echo $row['total_cost']; ?> RWF</td>
                <td class="status-<?php echo $row['status']; ?>">
                    <?php echo ucfirst($row['status']); ?>
                </td>
                <td>
                    <?php if($row['status'] === "pending"): ?>
                        <a href="update_booking_status.php?id=<?php echo $row['id']; ?>&status=confirmed">Confirm</a> |
                        <a href="update_booking_status.php?id=<?php echo $row['id']; ?>&status=cancelled">Cancel</a>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>

</body>
</html>