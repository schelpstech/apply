<?php
include 'include/header.php';
?>

<body>
	<style>
		/* Animated University Gradient Background */
		.leadership-area {
			background: linear-gradient(270deg, #0b6b3a, #0ea55a, #12c975, #07a84f);
			background-size: 800% 800%;
			animation: gradientMove 15s ease infinite;
			border-radius: 20px;
			padding: 40px;
		}

		@keyframes gradientMove {
			0% {
				background-position: 0% 50%
			}

			50% {
				background-position: 100% 50%
			}

			100% {
				background-position: 0% 50%
			}
		}


		/* Glassmorphism Card */
		.leader-card {
			backdrop-filter: blur(15px);
			background: rgba(255, 255, 255, 0.15);
			border-radius: 20px;
			overflow: hidden;
			border: 1px solid rgba(255, 255, 255, 0.2);
			transition: all 0.4s ease;
		}

		/* Hover Animation */
		.leader-card:hover {
			transform: translateY(-8px);
			box-shadow: 0 25px 45px rgba(0, 0, 0, 0.3);
		}

		/* Leader Image */
		.leader-img {
			height: 320px;
			object-fit: cover;
		}


		/* Badge styling */
		.leader-badge {
			display: inline-block;
			padding: 6px 14px;
			border-radius: 30px;
			background: linear-gradient(135deg, #ffd700, #f5c518);
			color: #000;
			font-size: 12px;
			font-weight: 600;
			margin-top: 6px;
		}

		/* Carousel fade smoothness */
		.carousel-fade .carousel-item {
			transition: opacity 1s ease-in-out;
		}
	</style>
	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		<section class="min-vh-100 d-flex align-items-center position-relative overflow-hidden custom-bg">
			<div class="container">
				<div class="row align-items-center justify-content-center">

					<!-- Left Branding Panel -->
					<div class="col-lg-6 d-none d-lg-block text-white">

						<div class="leadership-area">

							<div id="leadershipSlider" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">

								<div class="carousel-inner">

									<!-- Founder -->
									<div class="carousel-item active">
										<div class="leader-card text-center mx-auto" style="max-width:420px;">
											<img src="assets/images/atiba/founder.png" class="leader-img w-100">

											<div class="p-4">
												<h5 class="fw-bold mb-1 text-white">Dr. James O. Ojebode</h5>
												<div class="leader-badge">Founder</div>
											</div>

										</div>
									</div>

									<!-- Chancellor -->
									<div class="carousel-item">
										<div class="leader-card text-center mx-auto" style="max-width:420px;">
											<img src="assets/images/atiba/thechancellor.png" class="leader-img w-100">

											<div class="p-4">
												<h5 class="fw-bold mb-1 text-white">HRH ALH. DR. Shehu Chindo Yamusa III Ph.D, CON</h5>
												<div class="leader-badge">Chancellor</div>
											</div>

										</div>
									</div>

									<!-- Pro Chancellor -->
									<div class="carousel-item">
										<div class="leader-card text-center mx-auto" style="max-width:420px;">
											<img src="assets/images/atiba/prochancellor.png" class="leader-img w-100">

											<div class="p-4">
												<h5 class="fw-bold mb-1 text-white">H.R.M OBA PROF. ADEKUNLE ADEOGUN-OKUNOYE</h5>
												<div class="leader-badge">Pro-Chancellor</div>
											</div>

										</div>
									</div>

									<!-- Vice Chancellor -->
									<div class="carousel-item">
										<div class="leader-card text-center mx-auto" style="max-width:420px;">
											<img src="assets/images/atiba/vc.png" class="leader-img w-100">

											<div class="p-4">
												<h5 class="fw-bold mb-1 text-white">Prof. Sunday Olawale Okeniyi</h5>
												<div class="leader-badge">Vice Chancellor</div>
											</div>

										</div>
									</div>
									<!--  Bursar -->
									<div class="carousel-item">
										<div class="leader-card text-center mx-auto" style="max-width:420px;">
											<img src="assets/images/atiba/bursar.png" class="leader-img w-100">

											<div class="p-4">
												<h5 class="fw-bold mb-1 text-white">Mr. Olugboyega Adetiloye Oyeniyi, ACA, B.Sc., M.Sc., PhD. (In view)</h5>
												<div class="leader-badge">Bursar</div>
											</div>

										</div>
									</div>

									<!-- Registrar -->
									<div class="carousel-item">
										<div class="leader-card text-center mx-auto" style="max-width:420px;">
											<img src="assets/images/atiba/registrar.png" class="leader-img w-100">

											<div class="p-4">
												<h6 class="fw-bold mb-1 text-white">
													Oyepeju Ayomide, OGUNSEYE ESQ., LL.B (ABUAD), LL.M(IBADAN), BL, DRS, CISM, ACIHRM
												</h6>
												<div class="leader-badge">Registrar</div>
											</div>

										</div>
									</div>

								</div>
							</div>

						</div>

						<h1 class="fw-bold mt-5 mb-4">Start Your Academic Journey</h1>

						<p class="lead">
							Experience flexible learning with Atiba University Open and Distance Learning.
							Study anywhere. Learn anytime. Graduate with confidence.
						</p>

						<ul class="list-unstyled mt-4">
							<li class="mb-2"><i class="fas fa-check-circle me-2"></i> Accredited Programs</li>
							<li class="mb-2"><i class="fas fa-check-circle me-2"></i> Flexible Study Schedule</li>
							<li class="mb-2"><i class="fas fa-check-circle me-2"></i> Dedicated Student Support</li>
						</ul>

					</div>
					<!-- Right Form Panel -->
					<div class="col-lg-6 col-md-10">
						<div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 glass-card">

							<!-- Logo -->
							<div class="text-center mb-4">
								<img src="assets/images/logo/logo.png" class="logo-img mb-3">
								<h4 class="fw-bold">Open and Distance Learning Centre</h4>
								<h6 class="fw-bold">Student Application Portal</h6>
								<p class="text-muted small">Create your account to begin</p>
							</div>

							<?php $utility->displayFlash(); ?>

							<form id="applyForm" action="./app/applicant/applicantHandler.php" method="POST" novalidate autocomplete="off">

								<div class="row">
									<div class="col-md-6 mb-3">
										<label class="form-label">First Name *</label>
										<input type="text" name="firstname" id="firstname" class="form-control modern-input" required>
									</div>

									<div class="col-md-6 mb-3">
										<label class="form-label">Last Name *</label>
										<input type="text" name="lastname" id="lastname" class="form-control modern-input" required>
									</div>
								</div>

								<div class="mb-3">
									<label class="form-label">Email Address *</label>
									<input type="email" name="email" id="email" class="form-control modern-input" required>
								</div>

								<div class="mb-3">
									<label class="form-label">Phone Number *</label>
									<input type="text" name="phone" id="phone" class="form-control modern-input" required>
								</div>

								<div class="mb-3">
									<label class="form-label">Password *</label>
									<div class="input-group">
										<input type="password" name="password" id="password" autocomplete="new-password" class="form-control modern-input" required>
										<button class="btn btn-light border" type="button" onclick="togglePassword('password')">
											<i class="fas fa-eye"></i>
										</button>
									</div>
								</div>

								<div class="mb-4">
									<label class="form-label">Confirm Password *</label>
									<div class="input-group">
										<input type="password" name="confirm_password" autocomplete="new-password" id="confirm_password" class="form-control modern-input" required>
										<button class="btn btn-light border" type="button" onclick="togglePassword('confirm_password')">
											<i class="fas fa-eye"></i>
										</button>
									</div>
								</div>

								<input type="hidden" name="action" value="<?php echo $utility->inputEncode('submit_new_application') ?>">

								<div class="d-grid mb-3">
									<button type="submit" class="btn btn-lg btn-gradient rounded-3 fw-semibold">
										Submit Application
									</button>
								</div>

								<div class="text-center small">
									Already registered? <a href="signin.php" class="fw-semibold">Login here</a><br>
									Email Not Verified? <a href="resendverification.php" class="fw-semibold">Resend here</a>
								</div>

							</form>

						</div>
					</div>

				</div>
			</div>
		</section>
	</main>

	<!-- **************** MAIN CONTENT END **************** -->

	<?php
	include 'include/footer.php';
	?>