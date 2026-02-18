<?php
include 'include/header.php';
?>

<body>
	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		<section class="min-vh-100 d-flex align-items-center custom-bg">
			<div class="container">
				<div class="row justify-content-center">

					<div class="col-lg-6 col-md-10">
						<div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 glass-card">

							<!-- Logo -->
							<div class="text-center mb-4">
								<img src="assets/images/logo/atibalogo.png" alt="Atiba University Logo" class="logo-img mb-3">
								<h4 class="fw-bold">Resend Verification Code</h4>
								<p class="text-muted small">
									Enter your registered email to receive a new verification link.
								</p>
							</div>

							<?php $utility->displayFlash(); ?>

							<!-- Form -->
							<form id="resendForm" action="./app/applicant/applicantHandler.php" method="POST" novalidate autocomplete="off">

								<div class="mb-4">
									<label class="form-label">Email Address *</label>
									<input type="email" name="email" id="email" class="form-control modern-input" required>
								</div>

								<input type="hidden" name="action" value="<?php echo $utility->inputEncode('send_me_another_verification_code') ?>">

								<div class="d-grid mb-3">
									<button type="submit" class="btn btn-lg btn-gradient rounded-3 fw-semibold">
										Resend Verification
									</button>
								</div>

								<div class="text-center small">
									Verified already?
									<a href="signin.php" class="fw-semibold">Login here</a><br>
									Not registered yet?
									<a href="signup.php" class="fw-semibold">Sign up here</a>
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