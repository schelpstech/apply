<?php
include("./inc/head.php");
?>

<body>

    <?php
    include("./inc/header.php");
    ?>

    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <?php
        include("./inc/banner.php");
        ?>
        <!-- =======================
Page content START -->
        <section class="pt-4 pb-5">
            <div class="container">
                <div class="row">

                    <?php include("./inc/sidebar.php"); ?>

                    <!-- Main content START -->
                    <div class="col-xl-9">
                        <div class="card shadow-lg border-0 rounded-4 p-4 glass-card">

                            <!-- Application Overview START -->
                            <div class="row g-4 text-center mb-4">
                                <div class="col-6 col-lg-3">
                                    <span class="text-muted">Applicant Profile</span>
                                    <h4 class="fw-bold <?php echo $progress['bio_data'] ? 'text-success' : 'text-danger'; ?>">
                                        <?php echo $progress['bio_data'] ? 'Completed' : 'Pending'; ?>
                                    </h4>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <span class="text-muted">Payment Status</span>
                                    <h4 class="fw-bold <?php echo $progress['admission_payment'] ? 'text-success' : 'text-danger'; ?>">
                                        <?php echo $progress['admission_payment'] ? 'Paid' : 'Not Paid'; ?>
                                    </h4>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <span class="text-muted">Form Completion</span>
                                    <h4 class="fw-bold <?php echo $completed == $total ? 'text-success' : 'text-danger'; ?>">
                                        <?php echo $completed == $total ? 'Completed' : 'Incomplete'; ?>
                                    </h4>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <span class="text-muted">Application Status</span>
                                    <h4 class="fw-bold <?php echo !empty($progress['submission_status']) && $progress['submission_status'] == 'submitted' ? 'text-success' : 'text-danger'; ?>">
                                        <?php echo !empty($progress['submission_status']) && $progress['submission_status'] == 'submitted' ? 'Submitted' : 'In Progress'; ?>
                                    </h4>
                                </div>
                            </div>
                            <!-- Application Overview END -->

                            <!-- Progress bar -->
                            <div class="overflow-hidden mb-4">
                                <div class="d-flex justify-content-between mb-1">
                                    <h6 class="mb-0 text-muted">Application Progress</h6>
                                    <h6 class="mb-0 <?php echo $percent == 100 ? 'text-success' : 'text-warning'; ?>">
                                        <?php echo $percent; ?>%
                                    </h6>
                                </div>
                                <div class="progress progress-sm rounded-pill bg-light" style="height: 20px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated <?php echo $percent == 100 ? 'bg-success' : 'bg-warning'; ?>"
                                        role="progressbar"
                                        style="width: <?php echo $percent; ?>%; min-width: 2%;"
                                        aria-valuenow="<?php echo $percent; ?>"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>

                            <!-- Next Actions -->
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-center mb-4">
                                <div>
                                    <p class="mb-0 small text-muted">
                                        Last updated: <?php echo date("M d, Y", strtotime($progress['updated_at'])); ?>
                                    </p>
                                </div>
                                <div class="mt-2 mt-sm-0">
                                    <?php if (!$progress['admission_payment']) { ?>
                                        <a href="../app/applicant/paymentHandler.php" class="btn btn-gradient btn-sm mb-1">
                                            Pay Portal Application Fee - ₦23,200
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="my-4">

                            <!-- Application Steps -->
                            <div class="row">
                                <h6 class="mb-3 text-center text-muted">Your Admission Steps</h6>
                                <div class="col-md-8 offset-md-2">
                                    <ul class="list-unstyled">
                                        <?php
                                        $steps = [
                                            'admission_payment' => 'Admission Form Payment',
                                            'bio_data' => 'Bio-data Submission',
                                            'contact_details' => 'Contact Details Submission',
                                            'education_history' => 'Education History Submission',
                                            'credential_history' => 'Academic Credential History Submission',
                                            'programme_details' => 'Programme Details Submission',
                                            'supporting_docs' => 'Supporting Documents Upload',
                                            'submission_status' => 'Application Form Submission'
                                        ];
                                        foreach ($steps as $key => $label) {
                                            $statusClass = ($key == 'submission_status') ? ($progress[$key] == 'submitted' ? 'text-success' : 'text-muted') : ($progress[$key] ? 'text-success' : 'text-muted');
                                            echo '<li class="mb-3 h6 fw-light"><i class="bi bi-patch-check-fill me-2 ' . $statusClass . '"></i>' . $label . '</li>';
                                        }
                                        ?>
                                    </ul>
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