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
  <title>Vehicles</title>
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
                <a class="nav-link a"  aria-current="page" href="vehicles.php"><h4 ><i class="fa-solid fa-car fa-flip"></i>Vehicles</h4></a>
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
                    <th scope="col">Vehicles</th>
                    <th scope="col">License Plate</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Arrival</th>
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

$sql = "SELECT * FROM vehicle WHERE user_id = '$user_id'";
$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['vehicles'] . "</td>";
    echo "<td>" . $row['licenseplate'] . "</td>";
    echo "<td>" . $row['origin'] . "</td>";
    echo "<td>" . $row['arrival'] . "</td>";
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
        <h3>Adding a new vehicle </h3>        
        <form class="c" id="form">
            <div class="form-group ">
                <label for="vehicleInput">Vehicles</label>
                <input name="vehicles" type="text" class="form-control" id="vehicles" placeholder="Vehicles"required>
                <label for="licensePlateInput">License Plate</label>
                <input  name="licenseplate" type="text" class="form-control" id="licenseplate" placeholder="License Plate"required>
                <label for="originInput">Origin</label>
                <input  name="origin" type="text" class="form-control" id="origin" placeholder="Origin"required>
                <label for="arrivalInput">Arrival</label>
                <input  name="arrival" type="text" class="form-control" id="arrival" placeholder="Arrival"required>
                <button id="ekle" class="btn btn-dark b" type="submit">Insert into the Table</button>
            </div>
        </form>
    </div>
</div>

<script>
   function editRow(id) {
    let vehicles;
let licenseplate;
let origin;
let arrival;

do {
    vehicles = prompt("Enter new vehicles:");
    if (vehicles === null) return; 
} while (!vehicles);

do {
    licenseplate = prompt("Enter new license plate:");
    if (licenseplate === null) return; 
} while (!licenseplate);

do {
    origin = prompt("Enter new origin:");
    if (origin === null) return; 
} while (!origin);

do {
    arrival = prompt("Enter new arrival:");
    if (arrival === null) return; 
} while (!arrival);




        if (vehicles && licenseplate && origin && arrival) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "vguncelle.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            const data = "id=" + encodeURIComponent(id) + "&vehicles=" + encodeURIComponent(vehicles) + "&licenseplate=" + encodeURIComponent(licenseplate) + "&origin=" + encodeURIComponent(origin) + "&arrival=" + encodeURIComponent(arrival);
            
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
            xhr.open("POST", "vehiclesil.php", true);
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
        const vehicles = document.querySelector("#vehicles").value;
        const licenseplate = document.querySelector("#licenseplate").value;
        const origin = document.querySelector("#origin").value;
        const arrival = document.querySelector("#arrival").value;

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "vehiclekaydet.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        const data = "vehicles=" + vehicles + "&licenseplate=" + licenseplate + "&origin=" + origin + "&arrival=" + arrival;

        
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
               
                console.log(this.responseText);
                location.reload();
            }
        };
        xhr.send(data);

        const tr = document.createElement("tr");

        
        const tdVehicles = document.createElement("td");
        tdVehicles.textContent = vehicles;
        tr.appendChild(tdVehicles);

        const tdLicensePlate = document.createElement("td");
        tdLicensePlate.textContent = licenseplate;
        tr.appendChild(tdLicensePlate);

        const tdOrigin = document.createElement("td");
        tdOrigin.textContent = origin;
        tr.appendChild(tdOrigin);

        const tdArrival = document.createElement("td");
        tdArrival.textContent = arrival;
        tr.appendChild(tdArrival);

        const tdButton = document.createElement("td");
        const button = document.createElement("button");
        button.textContent = "Edit";
        button.className = "btn btn-dark"; 
        button.onclick = function() { editRow(id); };
        tdButton.appendChild(button);
        tr.appendChild(tdButton);
        
        const td2Button = document.createElement("td");
        const button2 = document.createElement("button");
        button2.textContent = "Delete";
        button2.className = "btn btn-danger"; 
        button2.onclick = function() { editRow2(id); };
        
        tdButton.appendChild(button2);
        tr.appendChild(td2Button);

       
        document.querySelector("#liste tbody").appendChild(tr);

        
        document.querySelector("#vehicles").value = "";
        document.querySelector("#licenseplate").value = "";
        document.querySelector("#origin").value = "";
        document.querySelector("#arrival").value = "";
    });
</script>
<script>
    function cikisYap() {
     
        window.location.href = "cikis.php";
    }
</script>
</body>
</html>