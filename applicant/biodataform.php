<?php
include("./inc/head.php");
?>

<body>
    <?php
    include("./inc/header.php");
    ?>
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <!-- =======================
<?php
include("./inc/banner.php");
?>
        <!-- =======================
Page content START -->
      <section class="pt-0">
    <div class="container">
        <div class="row">

            <?php include("./inc/sidebar.php"); ?>

            <!-- Main content START -->
            <div class="col-xl-9">
                <div class="card glass-card border rounded-3 shadow-sm p-4 my-5">
                    <div class="row">
                        <div class="col-sm-10 col-xl-8 m-auto">

                            <h3 class="text-center mb-4">Applicant Bio-Data Form</h3>
                            <hr>

                            <form id="biodataForm" action="../app/applicant/formhandler.php" method="POST" novalidate autocomplete="off">

                                <div class="row g-3">
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" name="firstname" id="firstname"
                                               value="<?= htmlspecialchars($applicant_bio_data['firstname'] ?? '') ?>"
                                               class="form-control border-0 bg-light rounded ps-3"
                                               required>
                                        <div class="invalid-feedback">Please enter your first name.</div>
                                    </div>

                                    <!-- Middle Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" name="middlename" id="middlename"
                                               value="<?= htmlspecialchars($applicant_bio_data['middlename'] ?? '') ?>"
                                               class="form-control border-0 bg-light rounded ps-3">
                                    </div>
                                </div>

                                <hr class="my-3">

                                <div class="row g-3">
                                    <!-- Last Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" name="lastname" id="lastname"
                                               value="<?= htmlspecialchars($applicant_bio_data['lastname'] ?? '') ?>"
                                               class="form-control border-0 bg-light rounded ps-3" required>
                                        <div class="invalid-feedback">Please enter your last name.</div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <label class="form-label">Gender *</label>
                                        <select name="gender" id="gender" class="form-control border-0 bg-light rounded ps-3" required>
                                            <option value="">-- Select Gender --</option>
                                            <option value="male" <?= ($applicant_bio_data['gender'] ?? '') === 'male' ? 'selected' : '' ?>>Male</option>
                                            <option value="female" <?= ($applicant_bio_data['gender'] ?? '') === 'female' ? 'selected' : '' ?>>Female</option>
                                        </select>
                                        <div class="invalid-feedback">Please select your gender.</div>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <div class="row g-3">
                                    <!-- DOB -->
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Birth *</label>
                                        <input type="date" name="dob" id="dob"
                                               value="<?= htmlspecialchars($applicant_bio_data['dob'] ?? '') ?>"
                                               class="form-control border-0 bg-light rounded ps-3" required>
                                        <div class="invalid-feedback">Please enter your date of birth.</div>
                                    </div>

                                    <!-- Religion -->
                                    <div class="col-md-6">
                                        <label class="form-label">Religion *</label>
                                        <select name="religion" id="religion" class="form-control border-0 bg-light rounded ps-3" required>
                                            <option value="">Select Religion</option>
                                            <option value="Christianity" <?= ($applicant_bio_data['religion'] ?? '') === 'Christianity' ? 'selected' : '' ?>>Christianity</option>
                                            <option value="Islam" <?= ($applicant_bio_data['religion'] ?? '') === 'Islam' ? 'selected' : '' ?>>Islam</option>
                                            <option value="Traditional" <?= ($applicant_bio_data['religion'] ?? '') === 'Traditional' ? 'selected' : '' ?>>Traditional</option>
                                            <option value="Other" <?= ($applicant_bio_data['religion'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
                                        </select>
                                        <div class="invalid-feedback">Please select your religion.</div>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <div class="row g-3">
                                    <!-- Marital Status -->
                                    <div class="col-md-6">
                                        <label class="form-label">Marital Status *</label>
                                        <select class="form-control border-0 bg-light rounded ps-3" id="marital_status" name="marital_status" required>
                                            <option value="">-- Select Marital Status --</option>
                                            <option value="Single" <?= ($applicant_bio_data['marital_status'] ?? '') === 'Single' ? 'selected' : '' ?>>Single</option>
                                            <option value="Married" <?= ($applicant_bio_data['marital_status'] ?? '') === 'Married' ? 'selected' : '' ?>>Married</option>
                                            <option value="Divorced" <?= ($applicant_bio_data['marital_status'] ?? '') === 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                                            <option value="Widowed" <?= ($applicant_bio_data['marital_status'] ?? '') === 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                                        </select>
                                        <div class="invalid-feedback">Please select your marital status.</div>
                                    </div>

                                    <!-- Hometown -->
                                    <div class="col-md-6">
                                        <label class="form-label">Hometown *</label>
                                        <input type="text" name="hometown" id="hometown"
                                               value="<?= htmlspecialchars($applicant_bio_data['hometown'] ?? '') ?>"
                                               class="form-control border-0 bg-light rounded ps-3" required>
                                        <div class="invalid-feedback">Please enter your hometown.</div>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <div class="row g-3">
                                    <!-- Nationality -->
                                    <div class="col-md-6">
                                        <label class="form-label">Nationality *</label>
                                        <select class="form-control border-0 bg-light rounded ps-3" id="nationality" name="nationality" required>
                                            <option value="">-- Select Nationality --</option>
                                            <option value="Nigerian" <?= ($applicant_bio_data['nationality'] ?? '') === 'Nigerian' ? 'selected' : '' ?>>Nigerian</option>
                                            <option value="Non-Nigerian" <?= ($applicant_bio_data['nationality'] ?? '') === 'Non-Nigerian' ? 'selected' : '' ?>>Non-Nigerian</option>
                                        </select>
                                        <div class="invalid-feedback">Please select your Nationality.</div>
                                    </div>

                                    <!-- State of Origin -->
                                    <div class="col-md-6">
                                        <label class="form-label">State of Origin *</label>
                                        <select class="form-control border-0 bg-light rounded ps-3" id="state_origin" name="state_origin" required>
                                            <option value="">-- Select State --</option>
                                            <?php
                                                $states = ["Abia","Adamawa","Akwa Ibom","Anambra","Bauchi","Bayelsa","Benue","Borno","Cross River","Delta","Ebonyi","Edo","Ekiti","Enugu","FCT","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina","Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara","Non-Nigerian"];
                                                foreach($states as $state){
                                                    $selected = ($applicant_bio_data['state_origin'] ?? '') === $state ? 'selected' : '';
                                                    echo "<option value='$state' $selected>$state</option>";
                                                }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">Please select your state of origin.</div>
                                    </div>
                                </div>

                                <input type="hidden" name="action" value="<?= $utility->inputEncode('FORM_submit_biodata') ?>">

                                <hr class="my-4">

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success btn-lg rounded-pill">Save Bio-Data</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content END -->

        </div> <!-- Row END -->
    </div>
</section>

        <!-- =======================
Page content END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <?php
    include("./inc/footer.php");
    ?>