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

                            <h3 class="text-center mb-4">Education History Form</h3>
                            <hr>

                            <form id="ssceForm" action="../app/applicant/formhandler.php" method="POST" novalidate autocomplete="off">

                                <!-- Number of Sitting -->
                                <div class="mb-3">
                                    <label class="form-label">Number of Sitting *</label>
                                    <select class="form-control border-0 bg-light rounded ps-3" name="num_sitting" id="num_sitting" required>
                                        <option value="">-- Select --</option>
                                        <option value="1" <?= $num_sitting == 1 ? 'selected' : '' ?>>One Sitting</option>
                                        <option value="2" <?= $num_sitting == 2 ? 'selected' : '' ?>>Two Sittings</option>
                                    </select>
                                </div>

                                <!-- Sitting 1 -->
                                <div id="sitting1" class="sitting-form border p-3 rounded mb-4">
                                    <h5>Sitting 1</h5>
                                    <?php for ($s = 1; $s <= 1; $s++): ?>
                                        <div class="row mb-3">
                                            <div class="col-md-8">
                                                <label>Secondary School Name</label>
                                                <input type="text" name="school_name[1]" class="form-control border-0 bg-light rounded ps-3"
                                                       value="<?= htmlspecialchars($ssce_records[0]['school_name'] ?? '') ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Exam Number</label>
                                                <input type="text" name="exam_number[1]" class="form-control border-0 bg-light rounded ps-3"
                                                       value="<?= htmlspecialchars($ssce_records[0]['exam_number'] ?? '') ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label>Examination Body</label>
                                                <select name="exam_body[1]" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="WAEC" <?= ($ssce_records[0]['exam_body'] ?? '') == "WAEC" ? "selected" : "" ?>>WAEC</option>
                                                    <option value="NECO" <?= ($ssce_records[0]['exam_body'] ?? '') == "NECO" ? "selected" : "" ?>>NECO</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Examination Type</label>
                                                <select name="exam_type[1]" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="School" <?= ($ssce_records[0]['exam_type'] ?? '') == "School" ? "selected" : "" ?>>School</option>
                                                    <option value="Private" <?= ($ssce_records[0]['exam_type'] ?? '') == "Private" ? "selected" : "" ?>>Private</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Examination Year</label>
                                                <input type="number" name="exam_year[1]" class="form-control border-0 bg-light rounded ps-3" min="1980" max="2099"
                                                       value="<?= htmlspecialchars($ssce_records[0]['exam_year'] ?? '') ?>" required>
                                            </div>
                                        </div>

                                        <h6>Subjects & Grades</h6>
                                        <?php
                                        $grades = ["A1","B2","B3","C4","C5","C6","D7","E8","F9","A/R","N/A"];
                                        $subjects = ["AGRICULTURAL SCIENCE","ANIMAL HUSBANDRY","ARABIC","BIOLOGY","BOOK KEEPING","BUSINESS MANAGEMENT","CHEMISTRY",
                                            "CHRISTIAN RELIGIOUS STUDIES","CIVIC EDUCATION","COMMERCE","COMPUTER STUDIES","DATA PROCESSING","ECONOMICS",
                                            "ENGLISH LANGUAGE","FINANCIAL ACCOUNTING","FISHERIES","FRENCH","FURTHER MATHEMATICS","GENERAL MATHEMATICS",
                                            "GEOGRAPHY","GOVERNMENT","HAUSA LANGUAGE","HEALTH SCIENCE/EDUCATION","HISTORY","IGBO LANGUAGE","INSURANCE",
                                            "ISLAMIC STUDIES","LITERATURE IN ENGLISH","MARKETING","OFFICE PRACTICE","PHYSICS","STORE MANAGEMENT",
                                            "TOURISM","YORUBA LANGUAGE"];
                                        for($i = 0; $i < 9; $i++):
                                            $subjVal = $ssce_records[0]['subjects'][$i]['subject_name'] ?? '';
                                            $gradeVal = $ssce_records[0]['subjects'][$i]['grade'] ?? '';
                                        ?>
                                            <div class="row mb-2">
                                                <div class="col-md-8">
                                                    <select name="subject[1][]" class="form-control border-0 bg-light rounded ps-3" required>
                                                        <option value="">-- Select Subject --</option>
                                                        <?php foreach($subjects as $s): ?>
                                                            <option value="<?= $s ?>" <?= $subjVal === $s ? 'selected' : '' ?>><?= $s ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="grade[1][]" class="form-control border-0 bg-light rounded ps-3" required>
                                                        <option value="">-- Grade --</option>
                                                        <?php foreach($grades as $g): ?>
                                                            <option value="<?= $g ?>" <?= $gradeVal === $g ? 'selected' : '' ?>><?= $g ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endfor; ?>

                                    <?php endfor; ?>
                                </div>

                                <!-- Sitting 2 -->
                                <div id="sitting2" class="sitting-form border p-3 rounded mb-4" style="display:none;">
                                    <h5>Sitting 2</h5>
                                    <!-- Dynamically cloned structure like Sitting 1 -->
                                   
                                    <?php for ($s = 1; $s <= 1; $s++): ?>
                                        <div class="row mb-3">
                                            <div class="col-md-8">
                                                <label>Secondary School Name</label>
                                                <input type="text" name="school_name[2]" class="form-control border-0 bg-light rounded ps-3"
                                                       value="<?= htmlspecialchars($ssce_records[1]['school_name'] ?? '') ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Exam Number</label>
                                                <input type="text" name="exam_number[2]" class="form-control border-0 bg-light rounded ps-3"
                                                       value="<?= htmlspecialchars($ssce_records[1]['exam_number'] ?? '') ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label>Examination Body</label>
                                                <select name="exam_body[2]" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="WAEC" <?= ($ssce_records[1]['exam_body'] ?? '') == "WAEC" ? "selected" : "" ?>>WAEC</option>
                                                    <option value="NECO" <?= ($ssce_records[1]['exam_body'] ?? '') == "NECO" ? "selected" : "" ?>>NECO</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Examination Type</label>
                                                <select name="exam_type[2]" class="form-control border-0 bg-light rounded ps-3" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="School" <?= ($ssce_records[1]['exam_type'] ?? '') == "School" ? "selected" : "" ?>>School</option>
                                                    <option value="Private" <?= ($ssce_records[1]['exam_type'] ?? '') == "Private" ? "selected" : "" ?>>Private</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Examination Year</label>
                                                <input type="number" name="exam_year[2]" class="form-control border-0 bg-light rounded ps-3" min="1980" max="2099"
                                                       value="<?= htmlspecialchars($ssce_records[1]['exam_year'] ?? '') ?>" required>
                                            </div>
                                        </div>

                                        <h6>Subjects & Grades</h6>
                                        <?php
                                        $grades = ["A1","B2","B3","C4","C5","C6","D7","E8","F9","A/R","N/A"];
                                        $subjects = ["AGRICULTURAL SCIENCE","ANIMAL HUSBANDRY","ARABIC","BIOLOGY","BOOK KEEPING","BUSINESS MANAGEMENT","CHEMISTRY",
                                            "CHRISTIAN RELIGIOUS STUDIES","CIVIC EDUCATION","COMMERCE","COMPUTER STUDIES","DATA PROCESSING","ECONOMICS",
                                            "ENGLISH LANGUAGE","FINANCIAL ACCOUNTING","FISHERIES","FRENCH","FURTHER MATHEMATICS","GENERAL MATHEMATICS",
                                            "GEOGRAPHY","GOVERNMENT","HAUSA LANGUAGE","HEALTH SCIENCE/EDUCATION","HISTORY","IGBO LANGUAGE","INSURANCE",
                                            "ISLAMIC STUDIES","LITERATURE IN ENGLISH","MARKETING","OFFICE PRACTICE","PHYSICS","STORE MANAGEMENT",
                                            "TOURISM","YORUBA LANGUAGE"];
                                        for($i = 0; $i < 9; $i++):
                                            $subjVal = $ssce_records[0]['subjects'][$i]['subject_name'] ?? '';
                                            $gradeVal = $ssce_records[0]['subjects'][$i]['grade'] ?? '';
                                        ?>
                                            <div class="row mb-2">
                                                <div class="col-md-8">
                                                    <select name="subject[2][]" class="form-control border-0 bg-light rounded ps-3" required>
                                                        <option value="">-- Select Subject --</option>
                                                        <?php foreach($subjects as $s): ?>
                                                            <option value="<?= $s ?>" <?= $subjVal === $s ? 'selected' : '' ?>><?= $s ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="grade[2][]" class="form-control border-0 bg-light rounded ps-3" required>
                                                        <option value="">-- Grade --</option>
                                                        <?php foreach($grades as $g): ?>
                                                            <option value="<?= $g ?>" <?= $gradeVal === $g ? 'selected' : '' ?>><?= $g ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endfor; ?>

                                    <?php endfor; ?>
                                </div>

                                <input type="hidden" name="action" value="<?= $utility->inputEncode('FORM_submit_ssce') ?>">
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">Save Education Record</button>
                                </div>
                            </form>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const numSittingSelect = document.getElementById("num_sitting");
                                    const sitting2 = document.getElementById("sitting2");

                                    function toggleSittings() {
                                        if(numSittingSelect.value === "2") {
                                            sitting2.style.display = "block";
                                            sitting2.querySelectorAll("input, select").forEach(f => f.required = true);
                                        } else {
                                            sitting2.style.display = "none";
                                            sitting2.querySelectorAll("input, select").forEach(f => f.required = false);
                                        }
                                    }

                                    toggleSittings();
                                    numSittingSelect.addEventListener("change", toggleSittings);
                                });
                            </script>

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