<?php
session_start();
include "db_connection.php";

// Check if owner is logged in
if (!isset($_SESSION['owner_logged_in']) || $_SESSION['owner_logged_in'] !== true) {
    header("Location: ownerlogin.php");
    exit();
}


if (isset($_POST['id']) && isset($_POST['status'])) {

    $id = intval($_POST['id']);
    $status = $_POST['status'];

    
    $allowed = ['pending', 'confirmed', 'cancelled'];

    if (in_array($status, $allowed)) {

        
        $sql = "UPDATE bookings SET statuses = ? WHERE B_Id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "si", $status, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ownerdashboard.php");
            exit();
        } else {
            echo "Sorry you con't update status!";
        }

        mysqli_stmt_close($stmt);

    } else {
        echo "Invalid status!";
    }

} else {
    echo "Missing data!";
}
?>