<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>







<div class="container">
    <form class="form-signin" method="POST">
        <h2>Login</h2>

        <input type="text" class="form-control" name="username" placeholder="username" required>
        <input type="password" class="form-control" name="password" placeholder="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a href="index.php" class="btn btn-lg btn-primary btn-block">Registration</a>
    </form>
</div>




<?php
session_start();
require ('connect.php');

if (isset($_POST['username'])&& isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if($count == 1){
        $_SESSION['username'] = $username;
    }else {
        $fmsg = "error";
    }
}
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];

        echo "Hello " . $username . "";
        echo " You Are Connected";
        echo "<a href='logout.php' class='btn btn-lg btn-primary' > Logout </a>";

    }
?>


</body>
</html>