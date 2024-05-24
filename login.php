
<?php
    if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>

<?php

    $email = $_POST['email'];

    $conn = mysqli_connect();
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['userid'] = mysqli_fetch_assoc($result)['id'];
        redirect('index.php');
    } else {
        $_SESSION['error'] = 'Invalid email';
        redirect('login.php');
    }

    mysqli_close($conn);

?>