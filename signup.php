<?php
    session_start();
    include "config/database.php"; 
    include "libs/helper.php";
    include "libs/helpers.php";

     if (isset($_SESSION['name']) && isset($_SESSION['username'])) {
        header('location:dashbord.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>

        <?php
            if (isset($_POST['submit_btn'])) {
                $name     =$_POST['name'];
                $username =$_POST['username'];
                $email    =$_POST['email'];
                $password =$_POST['password'];
                $confirm_password =$_POST['confirm_password'];

                if (empty($name) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
                    $massege= ['class_name'=>'danger','massege'=>'All Field Require.'];
                }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    $massege=['class_name'=>'danger','massege'=>'The Email Field is invalid'];
                }elseif (strlen($password < 7)) {
                    $massege=['class_name'=>'danger','massege'=>'The password less then 8 charecter'];
                } elseif ($password !== $confirm_password) {
                    $massege= ['class_name'=>'danger','massege'=>'The password is doesn\,t match'];
                }elseif (userEmailUniqueCheck($email) == false) {
                    $massege=['class_name'=>'danger','massege'=>'The email field is already taken'];
                }elseif (usernameEmailCheck($username) == false) {
                    $massege=['class_name'=>'danger','massege'=>'The username field is already taken'];
                }else{
                    $sql = "INSERT INTO users (name,username,email,password) VALUES ('$name','$username','$email','$password')";

                    $conn->query($sql);

                    $_SESSION['name']=$name;
                    $_SESSION['username']=$username;
                    header('location:dashbord.php');

                }
            }
        
        ?>
    <div id="auth">
        <div class="row h-100">
        <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                        
                        <?php
                            if (isset($massege)) {                                                         
                        ?>
                            <div class="alert py-2 alert-<?php echo $massege['class_name'] ?>">
                                 <?php echo $massege['massege'] ?>
                            </div>
                        <?php
                            }
                        ?>    

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="name" placeholder="Name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="email" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="confirm_password" placeholder="Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" name="submit_btn" type="submit">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="index.php"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>