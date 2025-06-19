<?php
include("vendor/autoload.php");
use Helpers\Auth;

$user = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" style="max-width: 800px;">
        <h1 class="mb-3">Profile</h1>

        <?php if($user->photo) :?>
            <img src="_actions/photos/<?= $user->photo ?>" alt="" class="img-thumbnail" width="300">
            <!-- pls take care no space on photos/ -->
        <?php endif ?>


        <form action="_actions/upload.php" enctype="multipart/form-data" method="post" class="input-group my-4">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Upload</button>
        </form>

        <ul class="list-group">
            <li class="list-group-item">
                <b>Name: </b><?= $user->name ?>
            </li>
            <li class="list-group-item">
                <b>Email: </b><?= $user->email ?>
            </li>
            <li class="list-group-item">
                <b>Phone: </b><?= $user->phone ?>
            </li>
            <li class="list-group-item">
                <b>Address: </b><?= $user->address ?>
            </li>
        </ul>
        <br>
        <a class="text-danger" href="_actions/logout.php">Logout</a>
        <a class="text-danger" href="admin.php">Admin</a>
    </div>
</body>
</html>