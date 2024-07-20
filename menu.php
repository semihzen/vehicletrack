<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <?php
session_start(); 

include 'connection.php'; 
if (!isset($_SESSION['user_id'])) {
   
    
    echo "<script>alert('Giriş yapılması gerekli.'); window.location.href = 'signin.php';</script>";
    exit();
}
?>
</head>
<body>
   
        <div class="maindiv">
    <div class="leftdiv">
          <h3 class="header"><b>Vehicle Tracking Menu</b></h3>
          <hr>
          <ul class="nav flex-column">
          
            <li class="nav-item">
              
              <a class="nav-link a " href="profile.php"><h4 ><i class="fa-solid fa-user fa-flip "></i> Profile</h4></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active a" aria-current="page" href="staf.php"><h4 ><i class="fa-solid fa-list fa-flip"></i>Staf Lists</h4></a>
            </li>
            <li class="nav-item">
              <a class="nav-link a" aria-current="page"  href="vehicles.php"><h4 ><i class="fa-solid fa-car fa-flip"></i>Vehicles</h4></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link a " href="vehicletrack.php"><h4 ><i class="fa-solid fa-timeline fa-flip"></i>Vehicle Track</h4></a>
            </li>
          </ul>
          
          <div class="container"> <a class="nav-link a  " onclick="cikisYap()" ><h4 class="exittext" ><i class="fa-solid fa-door-open fa-xl" style="color: #e73636;"></i> Exit</h4></a></div>
   
    </div>
    <div class="rightdiv">
      <iframe   class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3183.8482716687345!2d35.34815577536231!3d37.061098752950166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15288dcc4aa8cea9%3A0x6bf7bafd35014a46!2zw4d1a3Vyb3ZhIMOcbml2ZXJzaXRlc2kgQmlsZ2lzYXlhciBNw7xoZW5kaXNsacSfaSBiw7Zsw7xtw7w!5e0!3m2!1str!2str!4v1713345850493!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
        <script>
    function cikisYap() {
       
        window.location.href = "cikis.php";
    }
</script>
</body>
</html>
