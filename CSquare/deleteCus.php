
<?php

// if user click delete icon the record will be deletd, based on the id

$con= mysqli_connect('localhost','root','','assingment');
if(!$con)die("Connection failed"); 


$id = $_GET['id'];

$sql = "DELETE FROM customer WHERE id=$id";

$status = mysqli_query($con,$sql);

if($status){
    header("Location: del.html");
} else {
    echo "Error - Delete!";
}

?>


