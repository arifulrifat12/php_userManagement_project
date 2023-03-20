<?php

function userEmailUniqueCheck($email){
    global $conn;
    $sql= "SELECT * FROM users WHERE email='$email'";
    $data= $conn->query($sql);
    
    if ($data->num_rows == 1) {
        return false;
    }else {
        return true;
    }
}

?>