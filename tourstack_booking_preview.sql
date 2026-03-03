

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `bookings` (
  `B_Id` int(11) NOT NULL,
  `guest_name` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `nights` int(13) NOT NULL,
  `price_per_night` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statuses` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `bookings` (`B_Id`, `guest_name`, `phone`, `room_type`, `nights`, `price_per_night`, `total_cost`, `created_at`, `statuses`) VALUES
(6, 'Remy', 783539548, 'single', 14, 20000, 280000, '2026-03-02 12:55:09', 'pending'),
(7, 'ISHIMWE', 798576539, 'twin', 2, 35000, 70000, '2026-03-02 13:03:16', 'cancelled'),
(8, 'RichKid', 78888004, 'single', 2, 20000, 40000, '2026-03-02 13:03:13', 'confirmed');



ALTER TABLE `bookings`
  ADD PRIMARY KEY (`B_Id`);


--
ALTER TABLE `bookings`
  MODIFY `B_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;


