<?php
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$rent = $_POST['rent'] ?? '';
$address = $_POST['address'] ?? '';
$number_of_rooms = $_POST['number_of_rooms'] ?? '';
$contact_info = $_POST['contact_info'] ?? '';

if ($number_of_rooms === null) {
    die("Error: 'number_of_rooms' field is required.");
}

$conn = new mysqli("localhost", "root", "", "hp");
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO hp (title, description, rent, address, number_of_rooms, contact_info) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisis", $title, $description, $rent, $address, $number_of_rooms, $contact_info);
    $stmt->execute();
    echo "Registration Successful.";
    $stmt->close();
    $conn->close();
}
?>
