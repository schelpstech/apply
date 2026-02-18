<?php
include 'include/header.php';
?>

<body>
	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		<section class="min-vh-100 d-flex align-items-center position-relative overflow-hidden custom-bg">
			<div class="container">
				<div class="row align-items-center justify-content-center">

					<!-- Left Branding Panel -->
					<div class="col-lg-5 d-none d-lg-block text-white">
						<div class="p-5">
							<h1 class="fw-bold mb-4">Start Your Academic Journey</h1>
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