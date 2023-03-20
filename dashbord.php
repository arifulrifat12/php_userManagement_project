<?php
    session_start();

    if (!isset($_SESSION['name']) && !isset($_SESSION['username'])) {
        header('location:index.php');
    }
    include "config/database.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <!-- sidebar -->

        <?php
          include "inc/sidebar.php"; 
        ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">

                <!-- Basic Tables start -->

                <!-- Striped rows start -->
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body py-2 text-end">
                                    <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="table-striped">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title d-flex align-items-center justify-content-between">Student List
                                        <a href="students/add_student.php" class="btn btn-sm btn-primary ">add student</a>
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <!-- table striped -->
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Fitst Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Roll</th>
                                                    <th>Reg</th>
                                                    <th>session</th>
                                                    <th>Phone</th>
                                                    <th>District</th>
                                                    <th>Board</th>
                                                    <th>Gender</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                        $sql ="SELECT * FROM students ORDER BY id DESC";
                                                        $data =$conn->query($sql);
                                                    ?>
                                                    <?php 
                                                        while ($student = $data->fetch_object()) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $student->fname ?></td>
                                                    <td><?php echo $student->lname ?></td>
                                                    <td><?php echo $student->email ?></td>
                                                    <td><?php echo $student->roll ?></td>
                                                    <td><?php echo $student->reg ?></td>
                                                    <td><?php echo $student->session ?></td>
                                                    <td><?php echo $student->phone ?></td>
                                                    <td><?php echo $student->district ?></td>
                                                    <td><?php echo $student->board ?></td>
                                                    <td><?php echo $student->gender ?></td>
                                                    <td>
                                                        <a href="students/edit.php" class="btn btn-sm btn-info">Edit</a>
                                                        <a href="students/delete.php" class="btn btn-sm btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                        <?php }?>
                                            </tbody>
                                        </table>
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
          include "inc/footer.php"; 
        ?>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>