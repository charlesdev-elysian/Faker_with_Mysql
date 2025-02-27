<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('fil_PH'); // Filipino locale

$genres = ['Filipino Literature', 'Historical', 'Romance', 'Mystery', 'Science Fiction', 'Thriller'];
$philippineAuthors = [
    'José Rizal', 'Francisco Balagtas', 'Lualhati Bautista', 'Nick Joaquin', 
    'F. Sionil José', 'Edgar Samar', 'Jessica Zafra', 'Ambeth Ocampo'
];

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fake Philippine Book Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-4">

<h2 class="text-center text-primary mb-4">Fake Philippine Book Records</h2>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Publication Year</th>
            </tr>
        </thead>
        <tbody>';

for ($i = 0; $i < 15; $i++) {
    echo "<tr>
            <td>" . htmlspecialchars($faker->sentence(3)) . "</td>
            <td>" . htmlspecialchars($genres[array_rand($genres)]) . "</td>
            <td>" . htmlspecialchars($philippineAuthors[array_rand($philippineAuthors)]) . "</td>
            <td>" . htmlspecialchars($faker->isbn13) . "</td>
            <td>" . htmlspecialchars($faker->numberBetween(1900, 2024)) . "</td>
          </tr>";
}

echo '    </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>';
?>
