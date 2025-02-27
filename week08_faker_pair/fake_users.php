<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH'); // Filipino locale

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fake User Data (Philippines)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-4">

<h2 class="text-center text-primary">Fake User Data (Philippines)</h2>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Complete Address</th>
                <th>Job Title</th>
            </tr>
        </thead>
        <tbody>';

for ($i = 0; $i < 5; $i++) {
    $name = htmlspecialchars($faker->name);
    $phone = htmlspecialchars(str_replace(['(', ')', ' '], '', $faker->phoneNumber));
    $address = nl2br(htmlspecialchars($faker->address)); // Preserve line breaks
    $jobTitle = htmlspecialchars($faker->jobTitle);

    echo "<tr>
            <td>{$name}</td>
            <td>{$phone}</td>
            <td>{$address}</td>
            <td>{$jobTitle}</td>
        </tr>";
}

echo '    </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>';
?>
