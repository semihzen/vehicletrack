<?php
session_start(); 

include 'connection.php'; 


$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicles = $_POST['vehicles'];
    $licenseplate = $_POST['licenseplate'];
    $origin = $_POST['origin'];
    $arrival = $_POST['arrival'];
    $edit= "edit";
    $deletes="deletes";

    $sql = "INSERT INTO vehicle (vehicles, licenseplate, origin, arrival, edit, deletes, user_id) VALUES ('$vehicles', '$licenseplate', '$origin', '$arrival', '$edit', '$deletes', '$user_id')";

    if (mysqli_query($connect, $sql)) {
        echo "Veriler başarıyla eklendi!";
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>