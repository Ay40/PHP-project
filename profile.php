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
    <style>
        body {
            background: linear-gradient(135deg, #a8dadc, #457b9d); /* Soft blue gradient */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            color: #343a40; /* Default text color */
        }
        .profile-card {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            max-width: 600px; /* Slightly larger for profile details */
            width: 100%;
            text-align: center;
        }
        .profile-card h1 {
            color: #1d3557; /* Dark blue heading */
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2.5rem;
        }
        .profile-photo-container {
            margin-bottom: 30px;
        }
        .profile-photo {
            width: 150px; /* Increased size */
            height: 150px; /* Make it square */
            object-fit: cover; /* Ensure image covers the area */
            border-radius: 50%; /* Circular image */
            border: 4px solid #457b9d; /* Border matching theme */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        .input-group .form-control {
            border-radius: 8px 0 0 8px; /* Rounded left side */
            padding: 10px 15px;
            border: 1px solid #ced4da;
            font-size: 0.95rem;
        }
        .input-group .btn-secondary {
            background-color: #a8dadc; /* Lighter blue for upload button */
            border-color: #a8dadc;
            color: #1d3557; /* Dark text */
            border-radius: 0 8px 8px 0; /* Rounded right side */
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .input-group .btn-secondary:hover {
            background-color: #457b9d;
            border-color: #457b9d;
            color: #f1faee;
        }
        .list-group {
            border-radius: 10px;
            overflow: hidden; /* Ensures rounded corners on inner items */
            margin-bottom: 30px;
        }
        .list-group-item {
            background-color: #f1faee; /* Lighter background for list items */
            border: none; /* Remove default borders */
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0f2f7; /* Subtle separator */
            color: #343a40;
        }
        .list-group-item:last-child {
            border-bottom: none;
        }
        .list-group-item b {
            color: #1d3557; /* Darker bold text */
            margin-right: 10px;
            min-width: 80px; /* Align labels */
            text-align: left;
        }
        .action-links {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px; /* Space between buttons */
        }
        .action-links .btn-action {
            display: inline-block;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-logout {
            background-color: #e63946; /* Red for logout */
            color: #fff;
            border: 1px solid #e63946;
        }
        .btn-logout:hover {
            background-color: #c92f3b;
            border-color: #c92f3b;
            color: #fff;
        }
        .btn-admin {
            background-color: #457b9d; /* Primary blue for admin */
            color: #fff;
            border: 1px solid #457b9d;
        }
        .btn-admin:hover {
            background-color: #1d3557;
            border-color: #1d3557;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <h1>Your Profile</h1>

        <?php if($user->photo) :?>
            <div class="profile-photo-container">
                <img src="_actions/photos/<?= $user->photo ?>" alt="Profile Photo" class="profile-photo">
            </div>
        <?php endif ?>

        <form action="_actions/upload.php" enctype="multipart/form-data" method="post" class="input-group mb-4">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Upload Photo</button>
        </form>

        <ul class="list-group">
            <li class="list-group-item">
                <b>Name:</b> <span><?= $user->name ?></span>
            </li>
            <li class="list-group-item">
                <b>Email:</b> <span><?= $user->email ?></span>
            </li>
            <li class="list-group-item">
                <b>Phone:</b> <span><?= $user->phone ?></span>
            </li>
            <li class="list-group-item">
                <b>Address:</b> <span><?= $user->address ?></span>
            </li>
        </ul>
        
        <div class="action-links">
            <a class="btn-action btn-logout" href="_actions/logout.php">Logout</a>
            <?php if (isset($user->role) && $user->role === 'admin') : // Example: Only show admin button if user is admin. Adjust as per your actual role logic. ?>
                <a class="btn-action btn-admin" href="admin.php">Admin Panel</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>