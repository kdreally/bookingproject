<!DOCTYPE html>
<html>
<head>
    <title>Slots</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php

include "../common/db.php";

$sql = "SELECT * FROM slots";
$result = $conn->query($sql);

?>

<?php include "../common/nav.php"; ?>
<div class="container">
    <h1>Slots</h1>
    <a href="add_slot.php" class="btn btn-primary">Add Slot</a>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["time"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td><a href='edit_slot.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a> <a href='delete_slot.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
