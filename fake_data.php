fake_data.php

<?php
require 'vendor/autoload.php';
require 'connection_db.php'; // ✅ Use external connection file

// Initialize Faker with Philippine Locale
$faker = Faker\Factory::create('en_PH');

// Faker Office Data (50 rows)
echo "Faker Office Data...<br>";
for ($i = 0; $i < 50; $i++) {
    $stmt = $conn->prepare("INSERT INTO office (name, contactnum, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $contactnum, $email, $address, $city, $country, $postal);
    
    $name = $faker->company;
    $contactnum = $faker->phoneNumber;
    $email = $faker->email;
    $address = $faker->streetAddress;
    $city = $faker->city;
    $country = 'Philippines';
    $postal = $faker->postcode;
    
    $stmt->execute();
}
echo "✅ Office Data Inserted!<br>";

// Get Office IDs
$office_ids = [];
$result = $conn->query("SELECT id FROM office");
while ($row = $result->fetch_assoc()) {
    $office_ids[] = $row['id'];
}

// Seed Employee Data (200 rows)
echo "Faker Employee Data...<br>";
for ($i = 0; $i < 200; $i++) {
    $stmt = $conn->prepare("INSERT INTO employee (lastname, firstname, office_id, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $lastname, $firstname, $office_id, $address);
    
    $lastname = $faker->lastName;
    $firstname = $faker->firstName;
    $office_id = $faker->randomElement($office_ids);
    $address = $faker->streetAddress;
    
    $stmt->execute();
}
echo "✅ Employee Data Inserted!<br>";

// Get Employee IDs
$employee_ids = [];
$result = $conn->query("SELECT id FROM employee");
while ($row = $result->fetch_assoc()) {
    $employee_ids[] = $row['id'];
}

// Seed Transaction Data (500 rows)
echo "Faker Transaction Data...<br>";
for ($i = 0; $i < 500; $i++) {
    $stmt = $conn->prepare("INSERT INTO transaction (employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss", $employee_id, $office_id, $datelog, $action, $remarks, $documentcode);
    
    $employee_id = $faker->randomElement($employee_ids);
    $office_id = $faker->randomElement($office_ids);
    $datelog = $faker->dateTimeThisDecade()->format('Y-m-d');
    $action = $faker->word();
    $remarks = $faker->sentence();
    $documentcode = strtoupper($faker->bothify('DOC###??'));
    
    $stmt->execute();
}
echo "✅ Transaction Data Inserted!<br>";

echo "<br>🎉 Faker Data Completed Successfully!";
?>