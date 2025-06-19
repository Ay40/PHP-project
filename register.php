<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="text-center">
    <div class="container mt-5" style="max-width: 600px;">
        <h1 class="h3 mb-3">Register</h1>

        <form action="_actions/create.php" method="post" class="mb-3">
            <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone" required>
            <textarea name="address" placeholder="Address" class="form-control mb-2" required></textarea>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button class="w-100 btn btn-primary">Register</button>
        </form>
        <br>
        <a href="index.php">Login</a>
    </div>
</body>
</html>