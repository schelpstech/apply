<?php
include 'include/header.php';
?>

<body>
    <!-- **************** MAIN CONTENT START **************** -->
   <main>
    <section class="min-vh-100 d-flex align-items-center custom-bg">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <!-- Login Form -->
                <div class="col-lg-6 col-md-10">
                    <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 glass-card">

                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <img src="assets/images/logo/logo.png" class="logo-img mb-3">
                            <h4 class="fw-bold">Applicant Login</h4>
                            <p class="text-muted small">
                                Enter your registered email and password
                            </p>
                        </div>

                        <?php $utility->displayFlash(); ?>

                        <form id="loginForm" action="./app/applicant/applicantHandler.php" method="POST" novalidate autocomplete="off">

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email Address *</label>
                                <input type="email" name="email" id="email" class="form-control modern-input" required>
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label class="form-label">Password *</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control modern-input" required>
                                    <button class="btn btn-light border" type="button" onclick="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <input type="hidden" name="action" value="<?php echo $utility->inputEncode('sign_me_in_form') ?>">

                            <!-- Submit -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-lg btn-gradient rounded-3 fw-semibold">
                                    Continue Application
                                </button>
                            </div>

                            <div class="text-center small">
                                Forgot Password? <a href="#" class="fw-semibold">Reset here</a><br>
                                Not registered yet? <a href="signup.php" class="fw-semibold">Sign up here</a><br>
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