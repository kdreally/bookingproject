<!DOCTYPE html>
<html>
<head>
    <title>Edit Slot</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php

include "../common/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $status = $_POST["status"];
    
    $sql = "UPDATE slots SET date='$date', time='$time', status='$status' WHERE id='$id'";
    $conn->query($sql);
    
    header("Location: slots.php");
    exit();
}

$id = $_GET["id"];
$sql = "SELECT * FROM slots WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
 <?php include "../common/nav.php"; ?>
 
<div class="container">
    <h1>Edit Slot</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <div class="mb-3">
            <label for="date">Date:</label>
            <input class="form-control" type="date" name="date" id="date" value="<?php echo $row["date"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="time">Time:</label>
            <input class="form-control" type="time" name="time" id="time" value="<?php echo $row["time"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="status">Status:</label>
            <select class="form-select" name="status" id="status" required>
                <option value="0" <?php if ($row["status"] == 0) { echo "selected"; } ?>>Available</option>
                <option value="1" <?php if ($row["status"] == 1) { echo "selected"; } ?>>Booked</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit Slot</button>
    </form>
</div>
</body>
</html>
