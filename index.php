<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<?php

include "common/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $slot = $_POST["slot"];

    $sql = "INSERT INTO bookings (name, email, phone, slot_id) VALUES ('$name', '$email', '$phone', '$slot')";
    $conn->query($sql);
    $sql = "UPDATE slots SET status=1 WHERE id='$slot'";
    $conn->query($sql);

    $_SESSION["message"] = "Booking successful!";

    header("Location: index.php");
    exit();
}

?>

<?php
// select next 10 available slots where date and time are in the future
$sql = "SELECT * FROM slots WHERE status=0 AND CONCAT(date, ' ', time) > NOW() LIMIT 10";

$result = $conn->query($sql);
$slots = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $slots[] = $row;
    }
}
?>
    <div class="container">

        <h1>Appointment Booking</h1>
        <?php if (count($slots) == 0) { ?>
            <div class="alert alert-danger" role="alert">
                No slots available
            </div>
        <?php } ?>

        <?php if (isset($_SESSION["message"])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION["message"]; ?>
            </div>
            <?php unset($_SESSION["message"]); ?>
        <?php } else { ?>

        <form method="post" action="index.php">
            <div class="mb-3">
                <label for="name">Name:</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            
            <div class="mb-3">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>
            
            <div class="mb-3">
                <label for="phone">Phone:</label>
                <input class="form-control" type="text" name="phone" id="phone" required>
            </div>

            <div class="mb-3">
                <label for="slot">Slot:</label>
                <select class="form-select" name="slot" id="slot" required>
                    <?php foreach ($slots as $slot) { ?>
                        <option value="<?php echo $slot["id"]; ?>"><?php echo $slot["date"] . " " . $slot["time"]; ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Book">
            </div>
        </form>
        <?php } ?>
    </div>
</body>
</html>
