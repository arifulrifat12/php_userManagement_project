<?php
session_start();
include "config/database.php"; 

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
    <div id="auth">
        <?php 
            if (isset($_POST['signin'])) {
                $username=$_POST['username'];
                $password=$_POST['password'];

                if (empty($username) || empty($password)) {
                    $massege=['class_name'=>'danger','massege'=>'All Field Require!'];
                }else {
                   $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' OR email='$username' AND password='$password'";
                   $data = $conn->query($sql);
                   $checkUser= $data->num_rows;

                   if ($checkUser ==1) {
                    $userData = $data->fetch_assoc();

                    $_SESSION['name']=$userData['name'];
                    $_SESSION['username']=$userData['username'];

                    header('location:dashbord.php');

                    $massege=['class_name'=>'success','massege'=>'Login Success'];
                   }else {
                    $massege=['class_name'=>'danger','massege'=>'Username or Password is not correct!'];
                   }
                }
            }
        
        
        ?>

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
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                            <?php
                                if (isset($massege)) {                                                         
                            ?>
                                <div class="alert alert-<?php echo $massege['class_name'] ?>">
                                    <?php echo $massege['massege'] ?>
                                </div>
                            <?php
                                }
                            ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="username" name="username" class="form-control form-control-xl" placeholder="Username or email address">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit" name="signin">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="signup.php"
                                class="font-bold">Sign
                                up</a>.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>