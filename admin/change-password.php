<?php

require 'auth.php';

require '../includes/db.php';

$message = "";

if(isset($_POST['submit'])){

    $current =
    $_POST['current_password'];

    $new =
    $_POST['new_password'];

    $confirm =
    $_POST['confirm_password'];

    $stmt = $pdo->prepare("
    SELECT * FROM admins
    WHERE username=?
    ");

    $stmt->execute([
        $_SESSION['admin']
    ]);

    $admin = $stmt->fetch();

    if(password_verify(
        $current,
        $admin['password']
    )){

        if($new == $confirm){

            $newHash =
            password_hash(
                $new,
                PASSWORD_DEFAULT
            );

            $update = $pdo->prepare("
            UPDATE admins
            SET password=?
            WHERE id=?
            ");

            $update->execute([

                $newHash,
                $admin['id']

            ]);

            $message =
            "Password Changed Successfully";

        }else{

            $message =
            "New Password Not Match";
        }

    }else{

        $message =
        "Current Password Wrong";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Change Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body style="background:#f5f7fb;font-family:Poppins;">

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-6">

<div class="card shadow border-0 p-4 rounded-4">

<h2 class="mb-4">

Change Password

</h2>

<?php if($message != ""){ ?>

<div class="alert alert-info">

<?= $message ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label>Current Password</label>

<input type="password"
name="current_password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>New Password</label>

<input type="password"
name="new_password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Confirm Password</label>

<input type="password"
name="confirm_password"
class="form-control"
required>

</div>

<button type="submit"
name="submit"
class="btn btn-dark">

Change Password

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>