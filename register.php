<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        }
        .register-card {
            margin-top: 50px;
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            max-width: 500px; /* Slightly wider for more input fields */
            width: 100%;
            text-align: center;
        }
        .register-card h1 {
            color: #1d3557; /* Dark blue heading */
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2.5rem;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px; /* Consistent spacing */
            font-size: 1rem;
        }
        .form-control:focus {
            border-color: #457b9d;
            box-shadow: 0 0 0 0.2rem rgba(69, 123, 157, 0.25);
        }
        textarea.form-control {
            min-height: 90px; /* Taller for address */
            resize: vertical; /* Allow vertical resizing */
        }
        .btn-primary {
            background-color: #1d3557; /* Dark blue button */
            border-color: #1d3557;
            color: #f1faee; /* Light text */
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 10px; /* Space above button */
        }
        .btn-primary:hover {
            background-color: #457b9d;
            border-color: #457b9d;
        }
        .login-link {
            margin-top: 25px;
            font-size: 1rem;
            color: #3a5a40; /* Dark green link */
        }
        .login-link a {
            color: #3a5a40;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .login-link a:hover {
            color: #588157;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <h1>Create Your Account</h1>

        <form action="_actions/create.php" method="post" class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
            <textarea name="address" placeholder="Your Address" class="form-control" required></textarea>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="w-100 btn btn-primary">Register</button>
        </form>
        <div class="login-link">
            Already have an account? <a href="index.php">Log in here</a>
        </div>
    </div>
</body>
</html>