<?php
    include("vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\Auth;

    $auth = Auth::check();
    $table = new UsersTable(new MySQL());
    $users = $table->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" defer></script>
    <style>
        body {
            background: linear-gradient(135deg, #a8dadc, #457b9d); /* Soft blue gradient */
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #343a40;
        }

        .navbar {
            background-color: #1d3557 !important; /* Dark blue from your palette */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }
        .navbar-brand {
            color: #f1faee !important; /* Light text */
            font-weight: 700;
            font-size: 1.8rem;
            letter-spacing: 1px;
        }
        .navbar-nav .nav-link {
            color: #f1faee !important;
            font-weight: 500;
            margin-left: 15px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .container {
            margin-top: 40px;
            padding-bottom: 40px;
        }

        .table-responsive {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Ensures responsiveness for table */
        }

        .table {
            margin-bottom: 0; /* Remove default table margin */
        }

        .table thead th {
            background-color: #457b9d; /* Medium blue for table header */
            color: #f1faee; /* Light text for header */
            font-weight: 600;
            padding: 15px;
            border-bottom: none; /* Remove default border */
            vertical-align: middle;
            text-align: center;
        }
        .table tbody td {
            vertical-align: middle;
            padding: 12px 15px;
            border-top: 1px solid #e0f2f7; /* Light border between rows */
            text-align: center;
        }
        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Role Badges */
        .badge {
            padding: 0.5em 0.8em;
            font-size: 0.85em;
            font-weight: 600;
            border-radius: 0.35rem;
        }
        .badge.bg-success { /* Admin */
            background-color: #3a5a40 !important; /* Dark green */
            color: #f1faee;
        }
        .badge.bg-primary { /* Manager */
            background-color: #457b9d !important; /* Medium blue */
            color: #f1faee;
        }
        .badge.bg-secondary { /* User */
            background-color: #a8dadc !important; /* Light blue */
            color: #1d3557;
        }

        /* Dropdown and Button Styling */
        .btn-group.dropdown {
            display: inline-flex; /* Ensure it stays together */
        }
        .btn-sm.btn-outline-primary.dropdown-toggle {
            color: #1d3557;
            border-color: #1d3557;
            background-color: transparent;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-sm.btn-outline-primary.dropdown-toggle:hover {
            background-color: #1d3557;
            color: #f1faee;
        }
        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: none;
            overflow: hidden; /* For smooth corners */
        }
        .dropdown-item {
            color: #1d3557;
            padding: 10px 20px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .dropdown-item:hover {
            background-color: #e0f2f7; /* Very light blue on hover */
            color: #457b9d;
        }

        /* Action Buttons */
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.9rem;
            border-radius: 6px;
            font-weight: 500;
        }
        .btn-sm.btn-warning { /* Ban (active suspend) */
            background-color: #e63946; /* Red */
            border-color: #e63946;
            color: #fff;
        }
        .btn-sm.btn-warning:hover {
            background-color: #c92f3b;
            border-color: #c92f3b;
        }
        .btn-sm.btn-outline-warning { /* Ban (not suspended) */
            color: #e63946;
            border-color: #e63946;
            background-color: transparent;
        }
        .btn-sm.btn-outline-warning:hover {
            background-color: #e63946;
            color: #fff;
        }
        .btn-sm.btn-outline-danger {
            color: #e63946;
            border-color: #e63946;
            background-color: transparent;
        }
        .btn-sm.btn-outline-danger:hover {
            background-color: #e63946;
            color: #fff;
        }
        .btn-group {
            gap: 5px; /* Space between action buttons */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand">
        <div class="container">
            <a href="#" class="navbar-brand">Admin Panel</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link"><?= $auth->name ?></a>
                </li>
                <li class="nav-item">
                    <a href="_actions/logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th colspan="2">Actions</th> </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?= $user->id ?></td>
                            <td><?= $user->name ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->phone ?></td>
                            <td>
                                <?php if ($user->role_id == 3): ?>
                                    <span class="badge bg-success">
                                        <?= $user->role ?>
                                    </span>
                                <?php elseif ($user->role_id == 2): ?>
                                    <span class="badge bg-primary">
                                        <?= $user->role ?>
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">
                                        <?= $user->role ?>
                                    </span>
                                <?php endif ?>
                            </td>
                            <td> <div class="btn-group dropdown">
                                    <?php if($auth->role_id == 3): ?>
                                        <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                            data-bs-toggle="dropdown">Role</a>
                                        <div class="dropdown-menu">
                                            <a href="_actions/role.php?id=<?= $user->id ?>&role=1"
                                                class="dropdown-item">User</a>
                                            <a href="_actions/role.php?id=<?= $user->id ?>&role=2"
                                                class="dropdown-item">Manager</a>
                                            <a href="_actions/role.php?id=<?= $user->id ?>&role=3" class="dropdown-item">Admin</a>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </td>
                            <td> <div class="btn-group">
                                    <?php if($auth->role_id >= 2): ?>
                                        <?php if ($user->suspended): ?>
                                            <a href="_actions/unsuspend.php?id=<?= $user->id ?>"
                                                class="btn btn-sm btn-warning">Unban</a>
                                        <?php else: ?>
                                            <a href="_actions/suspend.php?id=<?= $user->id ?>"
                                                class="btn btn-sm btn-outline-warning">Ban</a>
                                        <?php endif ?>
                                    <?php endif ?>

                                    <?php if ($auth->role_id == 3): ?>
                                        <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                                    <?php endif ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>