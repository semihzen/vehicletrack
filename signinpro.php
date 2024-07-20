<?php
session_start(); 

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Geçersiz giriş.'); window.location.href = 'signin.php';</script>";
        exit(); 
    }

    $conn = new mysqli($vt_server, $vt_username, $vt_password, $vt_databasename);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM kullanıcılar WHERE mail = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_surname'] = $row['surname'];
            $_SESSION['user_email'] = $row['mail'];

            header("Location: menu.php");
            exit();
        } else {
            echo "<script>alert('Yanlış şifre'); window.location.href = 'signin.php';</script>";
        }
    } else {
        echo "<script>alert('Kullanıcı bulunamadı'); window.location.href = 'signin.php';</script>";
    }
    

    $conn->close();
}
?>
