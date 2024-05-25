<!DOCTYPE html>
<html>
<head>
    <title>Delete Slot</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php

include "../common/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    
    $sql = "DELETE FROM slots WHERE id='$id'";
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
    <h1>Delete Slot</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <p>Are you sure you want to delete this slot?</p>
        <button type="submit" class="btn btn-danger">Delete Slot</button>
    </form>
</div>
</body>
</html>
