<!DOCTYPE html>
<html>
<head>
    <title>Bookings</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php

include "../common/db.php";

$sql = "SELECT bookings.id id, name, email, phone, date, time FROM bookings inner join slots on bookings.slot_id = slots.id";
$result = $conn->query($sql);

?>

<?php include "../common/nav.php"; ?>

<div class="container">
    <h1>Bookings</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["time"] . "</td>";
                    echo "<td><a href='edit_booking.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a> <a href='delete_booking.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
