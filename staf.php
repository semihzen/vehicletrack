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
  <title>Staf Lists</title>
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
        <table id="liste" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">License Plate</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
session_start(); 

include 'connection.php'; 
if (!isset($_SESSION['user_id'])) {
   
  
    echo "<script>alert('Giriş yapılması gerekli.'); window.location.href = 'signin.php';</script>";
    exit(); 
}


$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM staff_list WHERE user_id = '$user_id'";
$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['sname'] . "</td>";
    echo "<td>" . $row['s_surname'] . "</td>";
    echo "<td>" . $row['vehicle'] . "</td>";
    echo "<td>" . $row['plaka'] . "</td>";
    echo "<td><button class='btn btn-dark' onclick='editRow(" . htmlspecialchars($row['id']) . ")'>Edit</button>" ;
    echo " <button class='btn btn-danger' onclick='editRow2(" . htmlspecialchars($row['id']) . ")'>Delete</button>";
    echo "</tr>";
}

mysqli_free_result($result);
mysqli_close($connect);
?>
            </tbody>
        </table>

        <br><br> 
        <h3>Adding a new staf </h3>        
        <form class="c" id="form">
            <div class="form-group ">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name" required>
                <label for="exampleInputPassword1">Surname</label>
                <input  name="surname" type="text" class="form-control" id="surname" placeholder="Surname" required>
                <label for="exampleInputEmail1">Vehicle</label>
                <input  name="vehicle"  class="form-control" id="vehicle" aria-describedby="emailHelp" placeholder="Vehicle" required>
                <label for="exampleInputPassword1">Plaka</label>
                <input  name="plaka" type="text" class="form-control" id="plaka" placeholder="Plaka" required>
                <button id="ekle" class="btn btn-dark b" type="submit">Insert into the table</button>
            </div>
        </form>
    </div>
</div>


<script>
     function editRow(id) {
        
        let name;
let surname;
let vehicle;
let plaka;

do {
    name = prompt("Enter new name:");
    if (name === null) return; 
} while (!name);

do {
    surname = prompt("Enter new surname:");
    if (surname === null) return; 
} while (!surname);

do {
    vehicle = prompt("Enter new vehicle:");
    if (vehicle === null) return; 
} while (!vehicle);

do {
    plaka = prompt("Enter new plaka:");
    if (plaka === null) return; 
} while (!plaka);

    if (name && surname && vehicle && plaka) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "sguncelle.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        const data = "id=" + encodeURIComponent(id) + "&sname=" + encodeURIComponent(name) + "&s_surname=" + encodeURIComponent(surname) + "&vehicle=" + encodeURIComponent(vehicle) + "&plaka=" + encodeURIComponent(plaka);
        
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
        
        const confirmation = confirm("Are you sure you want to delete this profile?");
      
    if (confirmation) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "ssil.php", true);
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








    document.getElementById("form").addEventListener("submit", function(event) {
        event.preventDefault();
        const name = document.querySelector("#name").value;
        const surname = document.querySelector("#surname").value;
        const vehicle = document.querySelector("#vehicle").value;
        const plaka = document.querySelector("#plaka").value;
       
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "skaydet.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

       
        const data = "sname=" + name + "&s_surname=" + surname + "&vehicle=" + vehicle + "&plaka=" + plaka;

        // İstek gönder
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
               
                console.log(this.responseText);
               
            }
        };
        xhr.send(data);

        
        const tr = document.createElement("tr");

        const tdAd = document.createElement("td");
        tdAd.textContent = name;
        tr.appendChild(tdAd);

        const tdSoyad = document.createElement("td");
        tdSoyad.textContent = surname;
        tr.appendChild(tdSoyad);

        const tdVehicle = document.createElement("td");
        tdVehicle.textContent = vehicle;
        tr.appendChild(tdVehicle);

        const tdPlaka = document.createElement("td");
        tdPlaka.textContent = plaka;
        tr.appendChild(tdPlaka);

        const tdButton = document.createElement("td");
            const button = document.createElement("button");
            button.textContent = "Edit";
            button.className = "btn btn-dark"; 
            button.onclick = function() { editRow(this.id); };
            tdButton.appendChild(button);
            tr.appendChild(tdButton);
            
            const td2Button = document.createElement("td");
            const button2 = document.createElement("button");
            button2.textContent = "Delete";
            button2.className = "btn btn-danger"; 
            button.onclick = function() { editRow2(this.id); };
            
            tdButton.appendChild(button2);
            tr.appendChild(td2Button);
            setTimeout(function() {
                location.reload();
            }, 50);

           
          
            

       
       
        document.querySelector("#liste tbody").appendChild(tr);
       
        document.querySelector("#name").value = "";
        document.querySelector("#surname").value = "";
        document.querySelector("#vehicle").value = "";
        document.querySelector("#plaka").value = "";
    });
</script>

<script>
    function cikisYap() {
        
        window.location.href = "cikis.php";
    }
</script>


</body>
</html>