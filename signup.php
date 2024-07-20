<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sign Up</title>

</head>

<body class="k">

    <section class="ksection">
        <h2 class="kh2">Vehicle Tracking Company</h2>
        <h4 class="kh4">Sign Up Page</h4>

        <div id="kdiv" class="container ">
            <div id="kaydol" class="col" ;>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-6">
                        <label for="name" class="form-label"><h5><b>Name</b></h5></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="mb-6">
                        <label for="surname" class="form-label"><h5><b>Surname</b></h5></label>
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="form-label"><h5><b>E-mail Address</b></h5></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="form-label"><h5><b>Password</b></h5></label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark kbutton" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

     
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
        $conn = new mysqli($vt_server, $vt_username, $vt_password, $vt_databasename);

      
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $check_email_sql = "SELECT * FROM kullanıcılar WHERE mail = '$email'";
        $check_result = $conn->query($check_email_sql);
        if ($check_result->num_rows > 0) {
            
            echo "<script>alert('This email is already registered.');</script>";
        } else {
           
            $sql = "INSERT INTO kullanıcılar (name, surname, mail, password) VALUES ('$name', '$surname', '$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
              
                echo "<script>alert('New record created successfully');</script>";
                header("Location: signin.php");
            } else {
               
                echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
            }
        }

     
        $conn->close();
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>