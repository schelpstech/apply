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
                                    <?php
                                    $programme = $applicant_prog_data ?? [];
                                    ?>
                                    <form action="../app/applicant/formhandler.php" id="programmeForm" method="POST" autocomplete="off">

                                        <!-- Degree + Course -->
                                        <div class="row mb-3">

                                            <!-- Degree -->
                                            <div class="col-md-6">
                                                <label class="form-label">Degree in View *</label>
                                                <select name="programme_type" id="degree_type" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select Degree --</option>

                                                    <option value="PGD" <?= (!empty($programme['programme_type']) && $programme['programme_type'] == 'PGD') ? 'selected' : '' ?>>
                                                        Postgraduate Diploma (PGD)
                                                    </option>

                                                    <option value="MSc" <?= (!empty($programme['programme_type']) && $programme['programme_type'] == 'MSc') ? 'selected' : '' ?>>
                                                        Master of Science (MSc)
                                                    </option>

                                                    <option value="MBA" <?= (!empty($programme['programme_type']) && $programme['programme_type'] == 'MBA') ? 'selected' : '' ?>>
                                                        Master of Business Administration(MBA)
                                                    </option>

                                                    <option value="PhD" <?= (!empty($programme['programme_type']) && $programme['programme_type'] == 'PhD') ? 'selected' : '' ?>>
                                                        Doctor of Philosophy (PhD)
                                                    </option>
                                                </select>
                                            </div>

                                            <!-- Course -->
                                            <div class="col-md-6">
                                                <label class="form-label">Course of Study *</label>
                                                <select name="course_id" id="course" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select Degree First --</option>
                                                </select>
                                            </div>

                                        </div>

                                        <hr>

                                        <!-- Centre + Mode -->
                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <label class="form-label">Preferred Centre *</label>
                                                <select name="centre_id" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select Centre --</option>

                                                    <?php
                                                    $centres = $model->getRows("study_centre", ["order_by" => "centre_name ASC"]);

                                                    foreach ($centres as $cen) {

                                                        $selected = (!empty($programme['prog_centre_id']) &&
                                                            $programme['prog_centre_id'] == $cen['centre_id'])
                                                            ? "selected" : "";

                                                        echo "<option value='{$cen['centre_id']}' {$selected}>
                {$cen['centre_name']}
              </option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Mode of Study *</label>
                                                <select name="study_mode" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select Mode --</option>

                                                    <option value="Full-Time" <?= (!empty($programme['study_mode']) && $programme['study_mode'] == 'Full-Time') ? 'selected' : '' ?>>
                                                        Full-Time
                                                    </option>

                                                    <option value="Part-Time" <?= (!empty($programme['study_mode']) && $programme['study_mode'] == 'Part-Time') ? 'selected' : '' ?>>
                                                        Part-Time
                                                    </option>

                                                    <option value="Distance Learning" <?= (!empty($programme['study_mode']) && $programme['study_mode'] == 'Distance Learning') ? 'selected' : '' ?>>
                                                        Distance Learning
                                                    </option>
                                                </select>
                                            </div>

                                        </div>

                                        <hr>

                                        <!-- Entry + Session -->
                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <label class="form-label">Entry Mode *</label>
                                                <select name="entry_mode" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select Entry Mode --</option>

                                                    <option value="Regular" <?= (!empty($programme['entry_mode']) && $programme['entry_mode'] == 'Regular') ? 'selected' : '' ?>>
                                                        Regular
                                                    </option>

                                                    <option value="Direct" <?= (!empty($programme['entry_mode']) && $programme['entry_mode'] == 'Direct') ? 'selected' : '' ?>>
                                                        Direct Entry
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Academic Session *</label>
                                                <select name="academic_session" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select Session --</option>

                                                    <option value="2025/2026" <?= (!empty($programme['academic_session']) && $programme['academic_session'] == '2025/2026') ? 'selected' : '' ?>>
                                                        2025/2026
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                        <input type="hidden" name="action" value="<?= $utility->inputEncode('FORM_submit_programme') ?>">

                                        <hr>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-success btn-lg rounded-pill">
                                                Save Programme Details
                                            </button>
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

   <script>
document.addEventListener("DOMContentLoaded", function () {

    const degree = document.getElementById('degree_type');
    const course = document.getElementById('course');

    const savedCourseId = "<?= $programme['prog_course_id'] ?? '' ?>";

    function loadCourses(degreeValue, selectedCourse = null) {

        course.innerHTML = '<option value="">Loading...</option>';

        fetch('../app/ajax/fetch_courses.php?degree=' + degreeValue)
            .then(res => res.json())
            .then(data => {

                course.innerHTML = '<option value="">-- Select Course --</option>';

                data.forEach(c => {

                    let selected = (selectedCourse && selectedCourse == c.course_id)
                        ? 'selected'
                        : '';

                    course.innerHTML += `
                        <option value="${c.course_id}" ${selected}>
                            ${c.course_name}
                        </option>
                    `;
                });
            });
    }

    // When degree changes
    degree.addEventListener('change', function () {
        loadCourses(this.value);
    });

    // If editing existing record → auto load
    if (degree.value) {
        loadCourses(degree.value, savedCourseId);
    }

});
</script>