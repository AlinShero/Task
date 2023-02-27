<?php
$conn=mysqli_connect('localhost','root','','guvi');
if(!$conn){
    die('connection error' . mysqli_connect_error());
}
echo'connected';
?>