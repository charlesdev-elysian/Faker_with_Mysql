<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('fil_PH'); // Filipino locale

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fake User Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-4">

<h2 class="text-center text-primary mb-4">Fake User Accounts</h2>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password (Encrypted)</th>
                <th>Account Created</th>
            </tr>
        </thead>
        <tbody>';

        for ($i = 1; $i <= 10; $i++) {
            $name = htmlspecialchars($faker->name);
            $email = htmlspecialchars($faker->unique()->safeEmail);
            $username = explode('@', $email)[0]; // Extract first part of email
            $password = password_hash($faker->password, PASSWORD_BCRYPT); // Secure password hashing
            $accountCreated = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');
    
        
        
    echo "<tr>
            <td>{$i}</td>
            <td>{$name}</td>
            <td>{$email}</td>
            <td>{$username}</td>
            <td>{$password}</td>
            <td>{$accountCreated}</td>
        </tr>";
}

echo '    </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>';
?>
