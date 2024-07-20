<?php

include 'connection.php';


$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];





$sql = "UPDATE kullanıcılar SET name='$name', surname='$surname' WHERE id='$id'";
if (mysqli_query($connect, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($connect);
}


mysqli_close($connect);
?>
