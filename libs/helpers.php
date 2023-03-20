<?php

function usernameEmailCheck($username){
    global $conn;
    $sql= "SELECT * FROM users WHERE username='$username'";
    $data= $conn->query($sql);

    if ($data->num_rows == 1) {
        return false;
    }else {
        return true;
    }
}
?>