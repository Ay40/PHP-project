<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #e9ecef; /* Slightly darker light background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; /* A more modern font stack */
        }
        .login-container {
            max-width: 400px; /* Slimmer container */
            width: 100%;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08); /* Lighter shadow */
            text-align: center;
        }
        .login-container h1 {
            font-size: 2.2rem;
            margin-bottom: 35px;
            color: #212529;
            font-weight: 700;
        }
        .form-control {
            border-radius: 5px;
            padding: 10px 12px;
            margin-bottom: 18px; /* More space between inputs */
            font-size: 1rem;
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            border-radius: 5px;
            padding: 12px 0;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .alert {
            margin-bottom: 25px; /* More space below alerts */
            text-align: left;
            font-size: 0.95rem;
            border-radius: 5px;
        }
        .register-link {
            display: block;
            margin-top: 25px;
            font-size: 1rem;
            color: #6c757d; /* Muted link color */
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login to Your Account</h1>

        <?php if( isset($_GET['incorrect'])) :?>
            <div class="alert alert-warning" role="alert">
                Incorrect email or password. Please double-check your credentials.
            </div>
        <?php endif ?>

        <?php if( isset($_GET['suspended'])) :?>
            <div class="alert alert-danger" role="alert">
                Access denied: Your account has been suspended.
            </div>
        <?php endif ?>

        <?php if( isset($_GET['register'])) :?>
            <div class="alert alert-info" role="alert">
                Registration successful! Please log in with your new account.
            </div>
        <?php endif ?>

        <form action="_actions/login.php" method="post">
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="w-100 btn btn-primary">Sign In</button>
        </form>
        <div class="register-link">
            New user? <a href="register.php">Create an account</a>
        </div>
    </div>
</body>
</html>