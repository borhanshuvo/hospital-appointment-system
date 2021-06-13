<!DOCTYPE html>
<html>
<head>
	<title>Hospital Appointment</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" href="img/hospital.png" sizes="16x16" type="image/png">
</head>
<body>
	<section>	
		<nav class="navber">
		<h1>
			<span class="logo-text">Hospital
			</span>Appointment
		</h1>
		<ul>
			<li> <a href="#">Home</a></li>
			<li> <a href="#about">About</a></li>
			<li> <a href="#doctor">Doctor</a></li>
			<li> <a href="#department">Department</a></li>
			<li> <a href="#contact">Contact</a></li>
			<li> <a href="login.php">Login</a></li>
		</ul>
	</nav>
		<div class="header-showcase">
		<div class="full">
			<div class="header-text text-center">
				<h1><span>Wellcome To</span>
				</h1>
				<h2>Hospital Appointment System</h2>
			</div>
		</div>
	</div>
	</section>
	<section class="about" id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<h1>ABOUT US</h1>
					<p>Hospital are the essentialpart of our life, providing best medical facilities to people suffering from virus ailments, which may be due to change in climate condition, increased work-load, emotional trauma strees etc.It is necessaryfor the hospitals to keep track of its day to day activities & record of its patient, doctor, nurses, wardboys and other staff personals that keep the hospital running smoothly & successfully.</p>
				</div>
			</div>
		</div>
	</section>
	<section class="doctor" id="doctor">
		<div class="container">
			<div class="row">
				<div class="col-lg-1">
					<div class="col-lg-3 doctor-content">
						<h1>Doctor</h1>
						<p>Hospital are the essentialpart of our life, providing best medical facilities to people suffering from virus ailments, which may be due to change in climate condition, increased work-load, emotional trauma strees etc.It is necessaryfor the hospitals to keep track of its day to day activities & record of its patient, doctor, nurses, wardboys and other staff personals that keep the hospital running smoothly & successfully.</p>
					</div>
					<div class="col-lg-7 doctor-i">
						<div class="row">
							<div class="col-lg-5">
								<div class="doctor-img">
									<img src="img/d1.jpg">
								</div>
							</div>
							<div class="col-lg-5">
								<div class="doctor-img">
									<img src="img/d2.jpg">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-5">
								<div class="doctor-img">
									<img src="img/d3.png">
								</div>
							</div>
							<div class="col-lg-5">
								<div class="doctor-img">
									<img src="img/d4.jpg">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="dept text-center" id="department">
		<div class="container">
			<div class="row">
				<div class="col-lg-1">
					<div class="text-center">
						<h1>DEPARTMENT</h1>
						<p>Our department & special service</p>
					</div>
					<div class="con">
						<ul>
							<li><a href="#">General Surgery</a></li>
							<li><a href="#">Microbiology</a></li>
							<li><a href="#">Nephrology</a></li>
							<li><a href="#">Pharnacy</a></li>
							<li><a href="#">Radiotherapy</a></li>
							<li><a href="#">Neonatal</a></li>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<section class="contact text-center text" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-1">
					<div class="contact-contant">
						<h1>CONTACT US</h1>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-lg-1">
					
					<div class="col-lg-1">
						<div class="contact-input">
							<form>
								<input type="text" name="" placeholder="Name" required="">
								<input type="email" name="" placeholder="E-mail" required="">
								<textarea required="">Message</textarea>
								<button type="submit">SEND</button>
							</form>
						</div>
					</div>
					
				</div>
			</div>			
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-1">
					<div class="text-center">
						<a href="#">© 2020 Webtech. </a>
					</div>
				</div>
			</div>

		</div>
	</footer>
	<?php 
		$err_f_name="";
		$f_name="";
		$err_l_name="";
		$l_name="";
	 ?>
</body>
</html>