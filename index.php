<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="text-center">
    <div class="container mt-5" style="max-width: 600px;">
        <h1 class="h3 mb-3">Login</h1>

        <?php if( isset($_GET['incorrect'])) :?>
            <div class="alert alert-warning">
                Incorrect Email or Password
            </div>
        <?php endif ?>

        <?php if( isset($_GET['suspended'])) :?>
            <div class="alert alert-danger">
                Account Suspended
            </div>
        <?php endif ?>

        <?php if( isset($_GET['register'])) :?>
            <div class="alert alert-info">
                Account created
            </div>
        <?php endif ?>

        <form action="_actions/login.php" method="post" class="mb-3">
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button class="w-100 btn btn-primary">Login</button>
        </form>
        <br>
        <a href="register.php">Register</a>
    </div>
</body>
</html>