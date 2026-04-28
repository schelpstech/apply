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

                                    <h3 class="text-center mb-4">Academic Credentials</h3>
                                    <hr>

                                    <form id="credentialForm" method="POST" action="../app/applicant/formhandler.php" enctype="multipart/form-data" autocomplete="off">

                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <label class="form-label">Institution *</label>
                                                <input type="text" name="institution" class="form-control" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Degree Awarded *</label>
                                                <select name="degree_awarded" class="form-control" required>
                                                    <option value="">-- Select Degree --</option>
                                                    <option value="OND">OND</option>
                                                    <option value="HND">HND</option>
                                                    <option value="BSc">BSc</option>
                                                    <option value="BA">BA</option>
                                                    <option value="BEng">BEng</option>
                                                    <option value="PGD">PGD</option>
                                                    <option value="MSc">MSc</option>
                                                    <option value="MBA">MBA</option>
                                                    <option value="MA">MA</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <label class="form-label">Graduation Class *</label>
                                                <select name="graduation_class" class="form-control" required>
                                                    <option value="">-- Select Class --</option>
                                                    <option value="First Class">First Class</option>
                                                    <option value="Second Class Upper">Second Class Upper</option>
                                                    <option value="Second Class Lower">Second Class Lower</option>
                                                    <option value="Third Class">Third Class</option>
                                                    <option value="Pass">Pass</option>
                                                    <option value="Distinction">Distinction</option>
                                                    <option value="Merit">Merit</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Year Obtained *</label>
                                                <input type="number" name="year_obtained" class="form-control" min="1980" max="2099" required>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Upload Certificate *</label>
                                                <input type="file" name="certificate" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                                                <small class="text-muted">Allowed: PDF, JPG, PNG (Max: 2MB)</small>
                                            </div>
                                        </div>

                                        <input type="hidden" name="action" value="<?= $utility->inputEncode('FORM_ADD_CREDENTIAL') ?>">

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary rounded-pill">
                                                Add Credential
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="card glass-card border rounded-3 shadow-sm p-4 my-5">
                            <div class="row">
                                <div class="col-sm-10 col-xl-8 m-auto">

                                    <h3 class="text-center mb-4">Credential History</h3>
                                    <hr>
                                    <div class="mt-4">
                                        <h5>Added Credentials</h5>

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Institution</th>
                                                    <th>Degree</th>
                                                    <th>Class</th>
                                                    <th>Year</th>
                                                    <th>Certificate</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="credentialTable">

                                                <?php
                                                $credentials = $model->getRows("applicant_credentials", [
                                                    "where" => ["applicant_id" => $_SESSION['applicant_id']],
                                                    "order_by" => "year_obtained DESC"
                                                ]);

                                                if (!empty($credentials)) {
                                                    foreach ($credentials as $c) {

                                                        $file = htmlspecialchars($c['certificate']);
                                                        $id = $c['id'];

                                                        $deleteUrl = "../app/applicant/formhandler.php?action="
                                                            . $utility->inputEncode('DELETE_CREDENTIAL')
                                                            . "&id=" .  $utility->inputEncode($id);

                                                        echo "<tr>
    <td>" . htmlspecialchars($c['institution']) . "</td>
    <td>" . htmlspecialchars($c['degree_awarded']) . "</td>
    <td>" . htmlspecialchars($c['graduation_class']) . "</td>
    <td>" . htmlspecialchars($c['year_obtained']) . "</td>
    <td>
        <a href='./storage/credentials/{$file}' target='_blank' class='btn btn-sm btn-info'>
            View
        </a>
    </td>
    <td>
        <form method='POST' action='../app/applicant/formhandler.php' onsubmit=\"return confirm('Are you sure you want to delete this credential?')\">
            <input type='hidden' name='action' value='" . $utility->inputEncode('DELETE_CREDENTIAL') . "'>
            <input type='hidden' name='id' value='" . $utility->inputEncode($id) . "'>
            <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
        </form>
    </td>
</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='6'>No credentials added yet</td></tr>";
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main content END -->
                </div>
            </div>
        </section>




        <!-- =======================
Page content END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <?php
    include("./inc/footer.php");
    ?>