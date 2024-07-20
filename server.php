
<?php include 'connection.php' ?>

<?php
 $sql1=" SELECT * from profile";
$results=mysqli_query($connect,$sql1);
$json_array=array();
while($data=mysqli_fetch_assoc($results)){
  $json_array[]=$data;
}
echo json_encode($json_array)
?>