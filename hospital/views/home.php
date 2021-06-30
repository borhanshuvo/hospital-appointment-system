<!DOCTYPE html>
<html>
<head>
	<?php include_once('css/bootstrap.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<title>Home</title>
</head>
<body>
	<?php include_once('home_header.php'); ?>
	<main>
		
		<section>
			
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">

                <div class="carousel-item active">
                  <img src="img/backimage.jpg" style="height: 100vh;" class="d-block w-100" alt="">
                </div>

              </div>
            </div>

		</section>

		<section id="about" class="container pt-5 pb-5">
			
            <div class="pt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">A B O U T &nbsp; U S</h3>
                    </div>
                    <div class="card-body">
                    <p class="card-text">Hospital are the essentialpart of our life, providing best medical facilities to people suffering from virus ailments, which may be due to change in climate condition, increased work-load, emotional trauma strees etc.It is necessaryfor the hospitals to keep track of its day to day activities & record of its patient, doctor, nurses, wardboys and other staff personals that keep the hospital running smoothly & successfully.Hospital are the essentialpart of our life, providing best medical facilities to people suffering from virus ailments, which may be due to change in climate condition, increased work-load, emotional trauma strees etc.It is necessaryfor the hospitals to keep track of its day to day activities & record of its patient, doctor, nurses, wardboys and other staff personals that keep the hospital running smoothly & successfully.Hospital are the essentialpart of our life, providing best medical facilities to people suffering from virus ailments, which may be due to change in climate condition, increased work-load, emotional trauma strees etc.It is necessaryfor the hospitals to keep track of its day to day activities & record of its patient, doctor, nurses, wardboys and other staff personals that keep the hospital running smoothly & successfully.</p>
                    </div>
                </div>
            </div>

		</section>

		<section id="doctor" class="container pt-5 pb-5">
			
            <div class="pt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">O U R  &nbsp; &nbsp; D O C T O R</h3>
                    </div>
                    <div class="card-body">
                    	<div class="pb-4">
                    		<p class="card-text">Hospital are the essentialpart of our life, providing best medical facilities to people suffering from virus ailments, which may be due to change in climate condition, increased work-load, emotional trauma strees etc.It is necessaryfor the hospitals to keep track of its day to day activities & record of its patient, doctor, nurses, wardboys and other staff personals that keep the hospital running smoothly & successfully.Hospital are the essentialpart of our life, providing best medical facilities to people suffering from virus ailments, which may be due to change in climate condition, increased work-load, emotional trauma strees etc.</p>
                    	</div>
                        <div class="container row">

                            <div class="col-md-4 pb-4">
                                <div class="card">
                                  <img style="height: 300px;" src="img/d2.jpg" class="card-img-top" alt="...">
                                  <div class="card-body text-center">
                                    <h5 class="card-title">Dr. Hero Alam</h5>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-4 pb-4">
                                <div class="card">
                                  <img style="height: 300px;" src="img/d3.png" class="card-img-top" alt="...">
                                  <div class="card-body text-center">
                                    <h5 class="card-title">Dr. Hero Alam</h5>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-4 pb-4">
                                <div class="card">
                                  <img style="height: 300px;" src="img/d4.jpg" class="card-img-top" alt="...">
                                  <div class="card-body text-center">
                                    <h5 class="card-title">Dr. Hero Alam</h5>
                                  </div>
                                </div>
                            </div>

                        </div> 
                    </div>
                </div>
            </div>

		</section>

		<section id="department" class="container pt-5 pb-5">
			
            <div class="pt-3">
                <div class="container">
                	<div class="card">
                		<div class="card-header">
                			<h3 class="text-center">O U R  &nbsp; &nbsp; D E P A R T M E N T</h3>
                		</div>
		                <div class="row card-body">
		                	<div class="col-md-4 pb-2">
		                		<div class="card">
		                			<p class="m-auto p-2">General Surgery</p>
		                		</div>
		                	</div>
		                	<div class="col-md-4 pb-2">
		                		<div class="card">
		                			<p class="m-auto p-2">Microbiology</p>
		                		</div>
		                	</div>
		                	<div class="col-md-4 pb-2">
		                		<div class="card">
		                			<p class="m-auto p-2">Nephrology</p>
		                		</div>
		                	</div>
		                	<div class="col-md-4 pb-2">
		                		<div class="card">
		                			<p class="m-auto p-2">Pharnacy</p>
		                		</div>
		                	</div>
		                	<div class="col-md-4 pb-2">
		                		<div class="card">
		                			<p class="m-auto p-2">Radiotherapy</p>
		                		</div>
		                	</div>
		                	<div class="col-md-4 pb-2">
		                		<div class="card">
		                			<p class="m-auto p-2">Neonatal</p>
		                		</div>
		                	</div>
		                </div>
                	</div>
                </div>
            </div>

		</section>

		<section id="contact" class="container pt-5 pb-5">
			
			<div class="pt-5 pb-5">
                    <div class="container d-flex justify-content-center card w-75">
                        <div class="card-header">
                            <h2 class="text-center">C O N T A C T &nbsp; U S</h2>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" class="row">

                              <div class="col-12 pb-1">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" onkeyup="checkName()" onblur="checkName()">
                                <span style="color:red" id="err_name"></span>
                              </div>

                              <div class="col-12 pb-1">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email" onkeyup="checkEmail()" onblur="checkEmail()">
                                <span style="color:red" id="err_email"></span>
                              </div>

                              <div class="col-12 pb-1">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" class="form-control" id="message" rows="8" onkeyup="checkMessage()" onblur="checkMessage()"></textarea>
                                <span style="color:red" id="err_message"></span>
                              </div>

                              <div class="col-12 pt-2 pb-1 d-flex justify-content-end">
                                <input type="submit" name="submitMessage" id="submit" class="btn btn-primary" value="Submit">
                              </div>

                            </form>
                        </div>
                    </div>
                </div>

		</section>

	</main>
	<footer class="container-fluid pt-5" style="background-color: #251D58;">
		
		<div class="pt-5 container">
            <div class="row text-white">
                <div class="col-md-4">
                    <p></p>
                    <p></p>
                    <p>H#000(5th Floor), Road #12</p>
                    <p>Dhaka, Bangladesh</p>
                </div>
                <div class="col-md-4">
                    <h6><u>Company</u></h6>
                    <p></p>
                    <p>About</p>
                    <p>Project</p>
                    <p>Our Team</p>
                    <p>Terms Condition</p>
                    <p>Submit Listing</p>
                </div>
                <div class="col-md-4">
                    <h6><u>Quick Links</u></h6>
                    <p></p>
                    <p>Rentals</p>
                    <p>Sales</p>
                    <p>Contact</p>
                    <p>Our Blog</p>
                </div>
            </div>
        </div>
        <div class="text-center text-white pt-5 pb-3">
            <p>Copyright 2021 All Rights Reserved</p>
        </div>

	</footer>
	<?php include_once('js/javascript.php'); ?>
</body>
</html>