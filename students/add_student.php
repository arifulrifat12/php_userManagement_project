<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <!-- sidebar -->

        <?php
          include "../inc/sidebar.php"; 
        ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none" >
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">

                <!-- Basic Tables start -->

                <!-- Striped rows start -->
                <section class="section">
                    <div class="row" id="table-striped">
                        <div class="col-12">
                                <?php
                                    if (isset($massege)) {                                                         
                                ?>
                                    <div class="alert py-2 alert-<?php echo $massege['class_name'] ?>">
                                        <?php echo $massege['massege'] ?>
                                    </div>
                                <?php
                                    }
                                ?> 
                            <div class="card">
                                <div class="card-header border-bottom  py-2">
                                    <h4 class="card-title d-flex mb-0 align-items-center justify-content-between">New Student
                                        <a href="../dashbord.php" class="btn btn-sm btn-danger">Back </a>
                                    </h4>
                                </div>
                                <div class="card-content px-4 pb-3">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="save.php" method="POST">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">First Name</label>
                                                            <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="First Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="last-name-vertical">Last Name</label>
                                                            <input type="text" id="last-name-vertical" class="form-control" name="lname" placeholder="last Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Email</label>
                                                            <input type="email" id="email-id-vertical" class="form-control" name="email" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">Mobile</label>
                                                            <input type="number" id="contact-info-vertical" class="form-control" name="phone" placeholder="Mobile">
                                                        </div>
                                                        <label for="" class="d-block">Gender</label>
                                                        <div class="d-flex align-items-center">
                                                            <div class="form-check form-group me-3">
                                                                <input class="form-check-input" type="radio" value="Male" name="gender" id="male" >
                                                                <label class="form-check-label" for="male">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-group me-3">
                                                                <input class="form-check-input" type="radio" value="Female" name="gender" id="female" >
                                                                <label class="form-check-label" for="female">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-group">
                                                                <input class="form-check-input" type="radio" value="Others" name="gender" id="others" >
                                                                <label class="form-check-label" for="others">
                                                                    Others
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="roll-id-vertical">Roll</label>
                                                            <input type="number" id="roll-id-vertical" class="form-control" name="roll" placeholder="Roll number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reg-id-vertical">Reg</label>
                                                            <input type="number" id="reg-id-vertical" class="form-control" name="reg" placeholder="Reg number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="session-id-vertical">Session</label>
                                                            <input type="text" id="session-id-vertical" class="form-control" name="session" placeholder="Session">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">District</label>                                                          
                                                            <select class="form-select" name="district" id="basicSelect">
                                                                <option value="" >-- Select District</option>
                                                                <option value="Bogura">Bogura</option>
                                                                <option value="Jamalpur">Jamalpur</option>
                                                                <option value="Sherpur">Sherpur</option>
                                                                <option value="Vhola">Vhola</option>
                                                                <option value="Natore">Natore</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Board</label>                                                          
                                                            <select class="form-select" name="board" id="basicSelect">
                                                                <option value="">-- Select Board</option>
                                                                <option value="Dhaka">Dhaka</option>
                                                                <option value="Rajshahi">Rajshahi</option>
                                                                <option value="Sylhet">Sylhet</option>
                                                                <option value="Mymensing">Mymensing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row text-end">                                                  
                                                    <div>
                                                        <button type="reset" class="btn btn-danger btn-sm rounded-0 me-1 ">Reset</button>                                      
                                                        <button type="submit" name="save" class="btn btn-primary btn-sm rounded-0 me-1 ">Submit</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Striped rows end -->
            </div>

        <!-- footer -->

        <?php
          include "../inc/footer.php"; 
        ?>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>