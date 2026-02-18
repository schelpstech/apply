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

                            <h3 class="text-center mb-4">Applicant Programme of Study</h3>
                            <hr>

                            <form action="../app/applicant/formhandler.php" id="programmeForm" method="POST" autocomplete="off">

                                <!-- Course & Centre -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="course" class="form-label">Course of Study *</label>
                                        <select name="course_id" id="course" class="form-control border-0 bg-light rounded ps-3" required>
                                            <option value="">-- Select Course --</option>
                                            <?php
                                            $courses = $model->getRows("courses", ["order_by" => "course_name ASC"]);
                                            foreach ($courses as $c) {
                                                $selected = ($programme && $programme['prog_course_id'] == $c['course_id']) ? "selected" : "";
                                                echo "<option value='{$c['course_id']}' $selected>{$c['course_name']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="centre" class="form-label">Preferred Centre of Study *</label>
                                        <select name="centre_id" id="centre" class="form-control border-0 bg-light rounded ps-3" required>
                                            <option value="">-- Select Centre --</option>
                                            <?php
                                            $centres = $model->getRows("study_centre", ["order_by" => "centre_name ASC"]);
                                            foreach ($centres as $cen) {
                                                $selected = ($programme && $programme['prog_centre_id'] == $cen['centre_id']) ? "selected" : "";
                                                echo "<option value='{$cen['centre_id']}' $selected>{$cen['centre_name']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <hr>

                                <!-- Mode & Entry Level -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="mode" class="form-label">Mode of Study *</label>
                                        <select name="study_mode" id="mode" class="form-control border-0 bg-light rounded ps-3" required>
                                            <option value="Distance Learning" <?= ($programme && $programme['study_mode'] == "Distance Learning") ? "selected" : "" ?>>Distance Learning</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="level" class="form-label">Entry Level *</label>
                                        <select name="entry_level" id="level" class="form-control border-0 bg-light rounded ps-3" required>
                                            <option value="">-- Select Entry Level --</option>
                                            <option value="100" <?= ($programme && $programme['entry_mode'] == "100") ? "selected" : "" ?>>100 Level</option>
                                            <option value="200" <?= ($programme && $programme['entry_mode'] == "200") ? "selected" : "" ?>>200 Level (Direct Entry)</option>
                                        </select>
                                    </div>
                                </div>

                                <hr>

                                <!-- Programme Type & Intake -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="programme_type" class="form-label">Programme Type *</label>
                                        <select name="programme_type" id="programme_type" class="form-control border-0 bg-light rounded ps-3" required>
                                            <option value="">-- Select Type --</option>
                                            <option value="Undergraduate" <?= ($programme && $programme['programme_type'] == "Undergraduate") ? "selected" : "" ?>>Undergraduate</option>
                                            <option value="Diploma" <?= ($programme && $programme['programme_type'] == "Diploma") ? "selected" : "" ?>>Diploma</option>
                                            <option value="Professional" <?= ($programme && $programme['programme_type'] == "Professional") ? "selected" : "" ?>>Professional</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="academic_session" class="form-label">Preferred Intake Session</label>
                                        <select name="academic_session" id="academic_session" class="form-control border-0 bg-light rounded ps-3">
                                            <option value="2025/2026" <?= ($programme && $programme['academic_session'] == "2025/2026") ? "selected" : "" ?>>2025/2026</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="action" value="<?= $utility->inputEncode('FORM_submit_programme') ?>">

                                <hr>

                                <!-- Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success btn-lg rounded-pill">Save Programme Details</button>
                                </div>

                            </form>
                            <!-- Application Form END -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content END -->

        </div> <!-- Row END -->
    </div>
</section>
===============
Page content END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <?php
    include("./inc/footer.php");
    ?>