<?php
// index.php
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TourStack Booking</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<header>
    <h2>TourStack Booking Preview</h2>
</header>
<p>Simple • Fast • Reliable</p>
<div class="container">
    <h3>Welcome to TourStack</h3>
    <p>
        A simple and professional booking system for local home-stays.
        Clear pricing. Organized bookings. Easy tracking.
    </p>

    <a href="booking.php">
        <button>Make Booking</button>
    </a>

    <a href="checkbooking.php">
        <button>Track Booking</button>
    </a>

    <a href="ownerlogin.php">
        <button>Owner Login</button>
    </a>
</div>
<?php echo date("Y"); ?>
</body>
</html>