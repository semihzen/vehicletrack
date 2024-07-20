<?php
session_start(); 

include 'connection.php'; 


$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sname = $_POST['sname'];
    $s_surname = $_POST['s_surname'];
    $vehicle = $_POST['vehicle'];
    $plaka = $_POST['plaka'];
    $edit= "edit";
    $deletes="deletes";

    
    $sql = "INSERT INTO staff_list (sname, s_surname, vehicle, plaka, edit, deletes, user_id) VALUES ('$sname', '$s_surname', '$vehicle', '$plaka', '$edit', '$deletes', '$user_id')";

    if (mysqli_query($connect, $sql)) {
        echo "Veriler başarıyla eklendi!";
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>

