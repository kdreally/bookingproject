<!DOCTYPE html>
<html>
<head>
    <title>Add Slot</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php

include "../common/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $time = $_POST["time"];
    $status = $_POST["status"];
    
    $sql = "INSERT INTO slots (date, time, status) VALUES ('$date', '$time', '$status')";
    $conn->query($sql);
    
    header("Location: slots.php");
    exit();
}

?>
<?php include "../common/nav.php"; ?>
<div class="container">
    <h1>Add Slot</h1>
    <form method="post">
        <div class="mb-3">
            <label for="date">Date:</label>
            <input class="form-control" type="date" name="date" id="date" required>
        </div>
        <div class="mb-3">
            <label for="time">Time:</label>
            <input class="form-control" type="time" name="time" id="time" required>
        </div>
        <div class="mb-3">
            <label for="status">Status:</label>
            <select class="form-select" name="status" id="status" required>
                <option value="0">Available</option>
                <option value="1">Booked</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Slot</button>
    </form>
</div>
</body>
</html>
