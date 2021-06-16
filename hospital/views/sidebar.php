<main class="row container-fluid">
<section class="col-md-2">

    <div class="pt-3 ps-3 pb-3 bg-white" style="width: 200px;">

      <ul class="list-unstyled ps-0">

        <li class="mb-1">
          <a href="dashboard.php" class="btn align-items-center rounded">Dashboard</a>
        </li>

        <?php
          if($_SESSION['user_types'] == 'super_admin' || $_SESSION['user_types'] == 'admin')
          {
         ?>

         <li class="border-top my-3"></li>

        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#hospital-collapse" aria-expanded="false">
            Hospital
          </button>
          <div class="collapse" id="hospital-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="add_hospital.php" class="link-dark rounded">Add Hospital</a></li>
              <li><a href="list_hospital.php" class="link-dark rounded">Hospital List</a></li>
            </ul>
          </div>
        </li>

        <li class="border-top my-3"></li>

        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#department-collapse" aria-expanded="false">
            Department
          </button>
          <div class="collapse" id="department-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="add_department.php" class="link-dark rounded">Add Department</a></li>
              <li><a href="list_department.php" class="link-dark rounded">Department List</a></li>
            </ul>
          </div>
        </li>

        <?php
          }
         ?>

        <?php
          if($_SESSION['user_types'] == 'super_admin')
          {
         ?>
        <li class="border-top my-3"></li>
        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#admin-collapse" aria-expanded="false">
            Admin
          </button>
          <div class="collapse" id="admin-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="add_admin.php" class="link-dark rounded">Add Admin</a></li>
              <li><a href="list_admin.php" class="link-dark rounded">Admin List</a></li>
            </ul>
          </div>
        </li>

        <?php
          }
         ?>

         <?php
          if($_SESSION['user_types'] == 'super_admin' || $_SESSION['user_types'] == 'admin')
          {
         ?>

        <li class="border-top my-3"></li>

        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#doctor-collapse" aria-expanded="false">
            Doctor
          </button>
          <div class="collapse" id="doctor-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="add_doctor.php" class="link-dark rounded">Add Doctor</a></li>
              <li><a href="list_doctor.php" class="link-dark rounded">Doctor List</a></li>
            </ul>
          </div>
        </li>

        <?php
          }
         ?>

         <?php
          if($_SESSION['user_types'] == 'super_admin' || $_SESSION['user_types'] == 'admin' || $_SESSION['user_types'] == 'doctor')
          {
         ?>

        <li class="border-top my-3"></li>

        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#patient-collapse" aria-expanded="false">
            Patient
          </button>
          <div class="collapse" id="patient-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="add_patient.php" class="link-dark rounded">Add Patient</a></li>
              <li><a href="list_patient.php" class="link-dark rounded">Patient List</a></li>
            </ul>
          </div>
        </li>

        <?php
          }
         ?>

         <?php
          if($_SESSION['user_types'] == 'super_admin' || $_SESSION['user_types'] == 'admin')
          {
         ?>

        <li class="border-top my-3"></li>

        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#room-collapse" aria-expanded="false">
            Room
          </button>
          <div class="collapse" id="room-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="add_room.php" class="link-dark rounded">Add Room</a></li>
              <li><a href="list_room.php" class="link-dark rounded">Room List</a></li>
            </ul>
          </div>
        </li>

        <li class="border-top my-3"></li>

        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#bed-collapse" aria-expanded="false">
            Bed
          </button>
          <div class="collapse" id="bed-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="add_bed.php" class="link-dark rounded">Add Bed</a></li>
              <li><a href="list_bed.php" class="link-dark rounded">Bed List</a></li>
            </ul>
          </div>
        </li>

        <?php
          }
         ?>

         <?php
          if($_SESSION['user_types'] == 'super_admin' || $_SESSION['user_types'] == 'admin' || $_SESSION['user_types'] == 'doctor' || $_SESSION['user_types'] == 'patient')
          {
         ?>

        <li class="border-top my-3"></li>

        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#appointment-collapse" aria-expanded="false">
            Appointment
          </button>
          <div class="collapse" id="appointment-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            	<?php
		          if($_SESSION['user_types'] == 'patient')
		          {
		         ?>
              		<li><a href="add_appointment.php" class="link-dark rounded">Add Appointment</a></li>
              <?php
	            }
	           ?>
	           <?php
		          if($_SESSION['user_types'] == 'super_admin' || $_SESSION['user_types'] == 'admin' || $_SESSION['user_types'] == 'doctor' || $_SESSION['user_types'] == 'patient')
		          {
		         ?>
              <li><a href="list_appointment.php" class="link-dark rounded">Appointment List</a></li>
              <?php
	            }
	           ?>
            </ul>
          </div>
        </li>

        <?php
          }
         ?>

        <li class="border-top my-3"></li>

        <li class="mb-1">
          <a href="" class="btn align-items-center rounded ">Profile</a>
        </li>
      
        <li class="border-top my-3"></li>

        <li class="mb-1">
          <a href="logout.php" class="btn align-items-center rounded ">Logout</a>
        </li>

      </ul>

    </div>

</section>