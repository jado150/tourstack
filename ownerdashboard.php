<?php
session_start();
include "db_connection.php";

/* Check if owner is logged in */
if (!isset($_SESSION['owner_logged_in']) || $_SESSION['owner_logged_in'] !== true) {
    header("Location: owner_login.php");
    exit();
}

/* Fetch bookings */
$sql = "SELECT * FROM bookings ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Owner Dashboard</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<header>
    <h2>Owner Dashboard</h2>
</header>

<div class="container">

    <a href="logout.php">
        <button>Logout</button>
    </a>

    <h3>All Bookings</h3>
display bookings in a table with options to update status in perfect way
    <table border="1" width="100%" cellpadding="8">

        <tr>
            <th>ID</th>
            <th>Guest Name</th>
            <th>Phone</th>
            <th>Nights</th>
            <th>Total Cost</th>
            <th>Status</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>

        <tr>

            <td><?php echo $row['B_Id']; ?></td>

            <td><?php echo htmlspecialchars($row['guest_name']); ?></td>

            <td><?php echo htmlspecialchars($row['phone']); ?></td>

            <td><?php echo $row['nights']; ?></td>

            <td><?php echo $row['total_cost']; ?> RWF</td>

           
            <td>

            <form method="POST" action="updatebookingstatus.php">

                <input type="hidden" name="id"
                       value="<?php echo $row['B_Id']; ?>">

                <select name="status"
                        onchange="this.form.submit()">

                    <option value="pending"
                    <?php if (strtolower($row['statuses']) == "pending") echo "selected"; ?>>
                        Pending
                    </option>

                    <option value="confirmed"
                    <?php if (strtolower($row['statuses']) == "confirmed") echo "selected"; ?>>
                        Confirmed
                    </option>

                    <option value="cancelled"
                    <?php if (strtolower($row['statuses']) == "cancelled") echo "selected"; ?>>
                        Cancelled
                    </option>

                </select>

            </form>

            </td>

        </tr>

        <?php endwhile; ?>

    </table>

</div>

</body>
</html>