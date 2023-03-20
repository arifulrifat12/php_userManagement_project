<?php 

    include "../config/database.php";

    if (isset($_POST['save'])) {
        $fname    = $_POST['fname'];
        $lname    = $_POST['lname'];
        $email    = $_POST['email'];
        $roll     = $_POST['roll'];
        $reg      = $_POST['reg'];
        $session  = $_POST['session'];
        $phone    = $_POST['phone'];
        $district = $_POST['district'];
        $board    = $_POST['board'];
        $gender   = $_POST['gender'];

        if (empty($fname) || empty($lname)) {
            $massege =['class_name'=>'danger','massege'=>'All field is require.'];

            // header("location:add_student.php");
        }else {
            $sql = "INSERT INTO students (fname,lname,email,roll,reg,session,phone,district,board,gender) 
            VALUES ('$fname','$lname','$email','$roll','$reg','$session','$phone','$district','$board','$gender')";
            $conn->query($sql);
            $massege =['class_name'=>'success','massege'=>'Student Added Successfull'];

            header("location:../dashbord.php");
        }
    }

?>