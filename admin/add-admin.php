<?php

require 'auth.php';

require '../includes/db.php';

/* ONLY SUPER ADMIN */

if($_SESSION['role'] != 'super_admin'){

    header("Location:dashboard.php");
    exit;
}

$message = "";

if(isset($_POST['submit'])){

    $username = trim($_POST['username']);

    $password = trim($_POST['password']);

    $role = $_POST['role'];

    /* CHECK EXIST */

    $check = $pdo->prepare("
    SELECT * FROM admins
    WHERE username=?
    ");

    $check->execute([$username]);

    if($check->rowCount() > 0){

        $message = "Username already exists";

    }else{

        $hashedPassword =
        password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $stmt = $pdo->prepare("
        INSERT INTO admins
        (username,password,role)
        VALUES(?,?,?)
        ");

        $stmt->execute([

            $username,
            $hashedPassword,
            $role

        ]);

        $message =
        "Admin Added Successfully";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

body{
    background:#f5f7fb;
    font-family:Poppins;
}

.main-box{

    background:#fff;

    padding:35px;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.06);
}

</style>

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-6">

<div class="main-box">

<h2 class="mb-4">

Add New Admin

</h2>

<?php if($message != ""){ ?>

<div class="alert alert-info">

<?= $message ?>

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

<div class="mb-3">

<label>Role</label>

<select name="role"
class="form-select">

<option value="admin">

Admin

</option>

<option value="super_admin">

Super Admin

</option>

</select>

</div>

<button type="submit"
name="submit"
class="btn btn-dark">

Add Admin

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>