<?php

include 'connection.php';


$id = $_POST['id'];
$sname = $_POST['sname'];
$s_surname = $_POST['s_surname'];
$vehicle = $_POST['vehicle'];
$plaka = $_POST['plaka'];



$sql = "UPDATE staff_list SET sname='$sname', s_surname='$s_surname', vehicle='$vehicle', plaka='$plaka' WHERE id='$id'";
if (mysqli_query($connect, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($connect);
}


mysqli_close($connect);
?>
