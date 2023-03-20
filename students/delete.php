<?php 

include "../config/database.php";

$id=$_GET['id'];

$sql="DELETE FROM students WHERE id=$id";

$data =$conn->query($sql);

if ($data) {
    header("Location:dashbord.php?msg=delete done");
}
else{
    header("Location:dashbord.php?msg=delete faeld");
}


?>