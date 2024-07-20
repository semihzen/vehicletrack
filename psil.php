<?php

include 'connection.php';

$id = $_POST['id'];


$sql = "DELETE FROM kullanıcılar WHERE id = $id";


if (mysqli_query($connect, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($connect);
}

mysqli_close($connect);
session_start();
session_destroy();


header("Location: signin.php"); 
exit;

?>
