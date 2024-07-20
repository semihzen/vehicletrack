<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="menu.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Satisfy&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
  <?php include 'connection.php' ?>
  <title>Profile</title>
</head>
<body>
<div class="maindiv">
    <div class="leftdiv">
        <h3 class="header"><b>Vehicle Tracking Menu</b></h3>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link a" href="profile.php"><h4 ><i class="fa-solid fa-user fa-flip "></i> Profile</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active a" aria-current="page" href="staf.php"><h4 ><i class="fa-solid fa-list fa-flip"></i>Staf Lists</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link a" href="vehicles.php"><h4 ><i class="fa-solid fa-car fa-flip"></i>Vehicles</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link a" href="vehicletrack.php"><h4 ><i class="fa-solid fa-timeline fa-flip"></i>Vehicle Track</h4></a>
            </li>
        </ul>
        <div class="container"> <a class="nav-link a  " onclick="cikisYap()" ><h4 class="exittext" ><i class="fa-solid fa-door-open fa-xl" style="color: #e73636;"></i> Exit</h4></a></div>
   
    </div>

    <div class="rightdiv">
        <h2>Welcome <?php
session_start(); 


$user_id = $_SESSION['user_id'];


$sql = "SELECT name FROM kullanıcılar WHERE id = '$user_id'";
$result = mysqli_query($connect, $sql);


if ($result) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name']; 
    echo  $name; 
} else {
    echo "Kullanıcı adı alınamadı.";
}


mysqli_free_result($result);
mysqli_close($connect);
?>!
 </h2> <br>
        <table id="liste" class="table table-bordered table1">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Mail</th>
                   
                </tr>
            </thead>
            <tbody>
            <?php
       
  

include 'connection.php'; 
if (!isset($_SESSION['user_id'])) {
   
    echo "<script>alert('Giriş yapılması gerekli.'); window.location.href = 'signin.php';</script>";
    exit(); 
}


$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM kullanıcılar WHERE id = '$user_id'";
$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['surname'] . "</td>";
    echo "<td>" . $row['mail'] . "</td>";
  
    echo "<td><button class='btn btn-dark' onclick='editRow(" . htmlspecialchars($row['id']) . ")'>Edit</button>" ;
    echo " <button class='btn btn-danger' onclick='editRow2(" . htmlspecialchars($row['id']) . ")'>Delete my account</button>";
    echo "</tr>";
}

mysqli_free_result($result);
mysqli_close($connect);
?>
            </tbody>
        </table>

       


<script>
     function editRow(id) {
        let ad;
let soyad;

do {
    ad = prompt("Enter new name:");
    if (ad === null) return; 
} while (!ad);

do {
    soyad = prompt("Enter new surname:");
    if (soyad === null) return; 
} while (!soyad);




    if (ad && soyad  ) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "pguncelle.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        const data = "id=" + encodeURIComponent(id) + "&name=" + encodeURIComponent(ad) + "&surname=" + encodeURIComponent(soyad) ;
        
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                console.log(this.responseText);
                location.reload(); 
            }
        };
        xhr.send(data);
    }
    }
    function editRow2(id) {
        
        const confirmation = confirm("Are you sure you want to delete this account? If you delete this account you can't sign in again.");
       
      
    if (confirmation) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "psil.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        const data = "id=" + encodeURIComponent(id);
        
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                console.log(this.responseText);
                location.reload(); 
            }
        };
        xhr.send(data);
    }
    }
    </script>




<script>
    function cikisYap() {
       
        window.location.href = "cikis.php";
    }
</script>


</body>
</html>