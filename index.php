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
<?php
require ('connect.php');

if (isset($_POST['username'])&& isset($_POST['password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
        $result = mysqli_query($connection, $query);

        if($result){
            $smsg = "Registration success";
        } else {
            $fsmsg = "error";
        }
}
?>




    <div class="container">
        <form class="form-signin" method="POST">
        <h2>Registration</h2>
            <?php if(isset($smsg)){ ?> <div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php }?>
            <?php if(isset($fsmsg)){ ?> <div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>
        <input type="text" class="form-control" name="username" placeholder="username" required>
        <input type="email" class="form-control" name="email" placeholder="email" required>
        <input type="password" class="form-control" name="password" placeholder="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a href="login.php" class="btn btn-lg btn-primary btn-block">Login</a>
        </form>
    </div>
</body>
</html>