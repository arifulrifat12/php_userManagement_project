<?php

$conn= new mysqli('localhost','root','root','user_management_register');

if ($conn->connect_errno) {
    echo "Field Database Connection ". $conn->connect_error;
}
?>