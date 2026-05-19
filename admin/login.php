<?php

session_start();

require 'config.php';

if(isset($_SESSION['admin'])){

    header("Location: dashboard.php");
    exit;
}


$error = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = $_POST['username'];

    $password = $_POST['password'];

    $stmt = $pdo->prepare(
        "SELECT * FROM admins WHERE username=?"
    );

    $stmt->execute([$username]);

    $admin = $stmt->fetch();

    if($admin && password_verify($password,$admin['password'])){

    $_SESSION['admin'] = $admin['username'];

    /* ROLE SESSION */

    $_SESSION['role'] = $admin['role'];

    header("Location: dashboard.php");
    exit;

}else{

        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

    margin:0;

    background:#071c3c;

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    font-family:Poppins;
}

.login-box{

    width:420px;

    background:#fff;

    padding:40px;

    border-radius:20px;

    box-shadow:0 10px 40px rgba(0,0,0,.25);
}

.login-box h2{

    text-align:center;

    margin-bottom:30px;

    color:#071c3c;

    font-weight:700;
}

.form-control{

    height:55px;
}

.btn-login{

    width:100%;

    height:55px;

    border:none;

    background:#d4a017;

    color:#071c3c;

    border-radius:10px;

    font-weight:700;

    margin-top:10px;
}

</style>

</head>

<body>

<div class="login-box">

    <h2>ADMIN LOGIN</h2>

    <?php if($error){ ?>

        <div class="alert alert-danger">

            <?= $error ?>

        </div>

    <?php } ?>

    <form method="POST">

        <div class="mb-3">

            <label>Username</label>

            <input type="text"
                name="username"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>Password</label>

            <input type="password"
                name="password"
                class="form-control"
                required>

        </div>

        <button class="btn-login">

            LOGIN

        </button>

    </form>

</div>

</body>
</html>