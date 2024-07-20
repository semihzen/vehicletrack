
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css.css">
    <?php include 'connection.php'?>;
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sign In</title>
   
   
</head>

<body style="background-image: url('https://i0.wp.com/papier-transfert.fr/wp-content/uploads/2022/10/Motifs-voiture.jpg?fit=845%2C845&ssl=1')">

    <section class="section">

        <div id="div" class="container ">
            <div class="row div c" style="width: 55%; margin-left: 20%; ">
                <div id="leftdiv" class="col">

                    <h3 class="carvehicle"><b>Vehicle Tracking System</b></h3>
                    <br>
                    <h4>How To Use?</h4><br>
                    Using our Vehicle Tracking System is easy and efficient. Simply log in to your account, enter the vehicle details, and start tracking! With our intuitive interface, you can monitor your vehicles' locations in real-time, set up alerts for specific events, and generate reports to analyze vehicle usage.

Stay connected and in control of your fleet with our user-friendly Vehicle Tracking System.

                </div>


                <div id="rightdiv" class="col" ;>
                <form action="signinpro.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label"><h5><b>E-mail Address</b></h5></label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="name@example.com">
                        </div>
                        <label for="password" class="form-label"><h5><b>Password</b></h5></label>
                        <input type="password" name="password" id="password" class="form-control"
                            aria-describedby="passwordHelpBlock" placeholder="Password">
                        <div id="passwordHelpBlock" class="form-text">
                            <div class="d-grid gap-2">
                                <button class="btn btn-dark b" style="margin-left: 10%; margin-right:10%" type="submit"><h5><b>Sign In</b></h5></button>
                            </div>
                            
                            <hr>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a href="signup.php" style="text-decoration: none; color: black;"><button class="btn btn-dark" type="button"><h5><b>Sign Up</b></h5></button></a>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
       
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
       
</body>
</html>