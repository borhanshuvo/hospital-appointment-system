<?php
    include_once('session_user.php');

    $db               = mysqli_connect("localhost", "root", "", "hospital");

    $query            = "SELECT * FROM add_department";
    $department       = mysqli_query($db, $query);
    $total_department = mysqli_num_rows($department);

    $query            = "SELECT * FROM add_hospital";
    $hospital         = mysqli_query($db, $query);
    $total_hospital   = mysqli_num_rows($hospital);

    $query            = "SELECT * FROM users WHERE user_type='admin'";
    $admin            = mysqli_query($db, $query);
    $total_admin      = mysqli_num_rows($admin);

    $query            = "SELECT * FROM users WHERE user_type='doctor'";
    $doctor           = mysqli_query($db, $query);
    $total_doctor     = mysqli_num_rows($doctor);

    $query            = "SELECT * FROM users WHERE user_type='patient'";
    $patient          = mysqli_query($db, $query);
    $total_patient    = mysqli_num_rows($patient);
?>
<!DOCTYPE html>
<html>
    <head>   
        <title>Dashboard</title>
        <?php include_once('css/bootstrap.php'); ?>
        <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    </head>
    <body>

        <?php include_once('header.php'); ?>
        <?php include_once('sidebar.php'); ?>

            <section class="col-md-10 pt-5">
                <div class="row">
                	<?php
                        if($_SESSION['user_types'] == 'super_admin')
                        {
                     ?>
                    
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="list_admin.php" class="nav-link text-dark">Admin</a></h5>
                                <p class="card-text">Total Admin - <strong><?php echo $total_admin; ?></strong></p>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                     ?>

                     <?php
                        if($_SESSION['user_types'] == 'super_admin' || $_SESSION['user_types'] == 'admin')
                        {
                     ?>


                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="list_hospital.php" class="nav-link text-dark">Hospital</a></h5>
                                <p class="card-text">Total Hospital - <strong><?php echo $total_hospital; ?></strong></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="list_department.php" class="nav-link text-dark">Department</a></h5>
                                <p class="card-text">Total Department - <strong><?php echo $total_department; ?></strong></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="list_doctor.php" class="nav-link text-dark">Doctor</a></h5>
                                <p class="card-text">Total Doctor - <strong><?php echo $total_doctor; ?></strong></p>
                            </div>
                        </div>
                    </div>

                     <?php
                        }
                     ?>

                     <?php
                        if($_SESSION['user_types'] == 'super_admin' || $_SESSION['user_types'] == 'admin' || $_SESSION['user_types'] == 'doctor')
                        {
                     ?>

                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="list_patient.php" class="nav-link text-dark">Patient</a></h5>
                                <p class="card-text">Total Patient - <strong><?php echo $total_patient; ?></strong></p>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                     ?>

                     <?php
                        if($_SESSION['user_types'] == 'super_admin' || $_SESSION['user_types'] == 'admin' || $_SESSION['user_types'] == 'doctor' || $_SESSION['user_types'] == 'patient')
                        {
                     ?>
                    
                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Room</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 pb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Bed</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                     ?>

                </div>
            </section>
        </main>

        <?php include_once('js/javascript.php'); ?>

    </body>
</html>