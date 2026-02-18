<?php
include("./inc/head.php");
?>
<style>
    @media print {
        body {
            background: #fff !important;
        }

        .no-print {
            display: none !important;
        }

        .print-container {
            width: 210mm;
            min-height: 297mm;
            margin: 0;
            padding: 15mm;
            background: #fff;
        }
    }

    .print-container {
        background: #fff;
        padding: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
    }

    .section-title {
        background: #0d6b3c;
        color: #fff;
        padding: 8px 12px;
        font-weight: 600;
        font-size: 15px;
        letter-spacing: 0.5px;
    }

    .table-preview {
        width: 100%;
        border-collapse: collapse;
    }

    .table-preview th {
        width: 35%;
        background: #f8f9fa;
        text-align: left;
        padding: 8px;
        border: 1px solid #dee2e6;
    }

    .table-preview td {
        padding: 8px;
        border: 1px solid #dee2e6;
    }

    .application-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .application-header h2 {
        margin: 0;
        font-weight: 700;
    }

    .application-header p {
        margin: 2px 0;
        font-size: 14px;
    }

    .signature-box {
        margin-top: 60px;
    }

    .signature-line {
        border-top: 1px solid #000;
        width: 250px;
        margin-top: 40px;
    }
</style>

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

                    <div class="col-xl-9">
                        <div class="print-container">

                            <!-- HEADER -->
                            <div class="application-header">
                                <h2>APPLICATION FORM PREVIEW</h2>
                                <p><strong>Distance Learning Programme</strong></p>
                                <p>Academic Session: <?= htmlspecialchars($programme['academic_session'] ?? '-') ?></p>
                                <hr>
                            </div>

                            <!-- PASSPORT TOP RIGHT -->
                            <div>
                                <?php if (!empty($uploadedDocs['passport_photo'])): ?>
                                    <img src="../<?= htmlspecialchars($uploadedDocs['passport_photo']) ?>"
                                        style="width:120px; height:140px; object-fit:cover; border:1px solid #ccc;">
                                <?php endif; ?>
                            </div>
                            <!-- BIODATA -->
                            <div class="section-title">PERSONAL INFORMATION</div>

                            <table class="table-preview mb-4">
                                <tr>
                                    <th>Full Name</th>
                                    <td>
                                        <?= htmlspecialchars(
                                            ($applicant_bio_data['firstname'] ?? '') . ' ' .
                                                ($applicant_bio_data['middlename'] ?? '') . ' ' .
                                                ($applicant_bio_data['lastname'] ?? '')
                                        ) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td><?= htmlspecialchars($applicant_bio_data['gender'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td><?= htmlspecialchars($applicant_bio_data['dob'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>State of Origin</th>
                                    <td><?= htmlspecialchars($applicant_bio_data['state_origin'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Nationality</th>
                                    <td><?= htmlspecialchars($applicant_bio_data['nationality'] ?? '-') ?></td>
                                </tr>
                            </table>

                            <!-- CONTACT -->
                            <div class="section-title">CONTACT INFORMATION</div>
                            <table class="table-preview mb-4">
                                <tr>
                                    <th>Email</th>
                                    <td><?= htmlspecialchars($applicant['email'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?= htmlspecialchars($applicant['phone'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>
                                        <?= htmlspecialchars($applicant_contact_data['address'] ?? '-') ?>,
                                        <?= htmlspecialchars($applicant_contact_data['city'] ?? '-') ?>
                                    </td>
                                </tr>
                            </table>

                            <!-- PROGRAMME -->
                            <div class="section-title">PROGRAMME DETAILS</div>
                            <table class="table-preview mb-4">
                                <tr>
                                    <th>Course of Study</th>
                                    <td><?= htmlspecialchars($applicant_prog_data['course_name'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Study Centre</th>
                                    <td><?= htmlspecialchars($applicant_prog_data['centre_name'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Entry Level</th>
                                    <td><?= htmlspecialchars($applicant_prog_data['entry_mode'] ?? '-') ?></td>
                                </tr>
                                <tr>
                                    <th>Mode of Study</th>
                                    <td><?= htmlspecialchars($applicant_prog_data['study_mode'] ?? '-') ?></td>
                                </tr>
                            </table>

                            <?php if (!empty($ssce_records)): ?>

                                <?php foreach ($ssce_records as $index => $record): ?>

                                    <div class="section-title">
                                        O’LEVEL RESULT (SITTING <?= $index + 1 ?>)
                                    </div>

                                    <!-- Exam Info Table -->
                                    <table class="table-preview mb-4">
                                        <tr>
                                            <th>School Name</th>
                                            <td><?= htmlspecialchars($record['school_name'] ?? '-') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Exam Body</th>
                                            <td><?= htmlspecialchars($record['exam_body'] ?? '-') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Exam Type</th>
                                            <td><?= htmlspecialchars($record['exam_type'] ?? '-') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Exam Year</th>
                                            <td><?= htmlspecialchars($record['exam_year'] ?? '-') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Exam Number</th>
                                            <td><?= htmlspecialchars($record['exam_number'] ?? '-') ?></td>
                                        </tr>
                                    </table>

                                    <!-- Subjects Table -->
                                    <table class="table-preview mb-5">
                                        <thead>
                                            <tr>
                                                <th style="width:70%">Subject</th>
                                                <th style="width:30%">Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($record['subjects'])): ?>
                                                <?php foreach ($record['subjects'] as $subject): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($subject['subject_name'] ?? '-') ?></td>
                                                        <td><?= htmlspecialchars($subject['grade'] ?? '-') ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="2" style="text-align:center;">No Subjects Found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <!-- If No Sitting Exists -->
                                <div class="section-title">O’LEVEL RESULT</div>
                                <table class="table-preview mb-4">
                                    <tr>
                                        <td style="text-align:center;">No O’Level Record Found</td>
                                    </tr>
                                </table>

                            <?php endif; ?>


                            <!-- DOCUMENT CHECKLIST -->
                            <div class="section-title">DOCUMENT UPLOAD CHECKLIST</div>

                            <table class="table-preview mb-4">
                                <thead>
                                    <tr>
                                        <th style="width:60%">Document</th>
                                        <th style="width:20%">Status</th>
                                        <th style="width:20%">Verification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $documents = [
                                        'passport_photo' => 'Passport Photograph',
                                        'olevel_result' => 'O’Level Result',
                                        'birth_certificate' => 'Birth Certificate',
                                        'identity_card' => 'Local Government Certificate'
                                    ];

                                    foreach ($documents as $key => $label):
                                        $isUploaded = !empty($uploadedDocs[$key]);
                                    ?>
                                        <tr>
                                            <td><?= $label ?></td>
                                            <td>
                                                <?= $isUploaded ?
                                                    '<span style="color:green;font-weight:600;">✔ Uploaded</span>' :
                                                    '<span style="color:red;font-weight:600;">✖ Not Uploaded</span>' ?>
                                            </td>
                                            <td style="text-align:center;">

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>


                            <!-- SIGNATURE AREA -->
                            <div class="signature-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="signature-line"></div>
                                        Applicant Signature
                                    </div>

                                    <div class="col-6 text-end">
                                        Date Printed:
                                        <br>
                                        <small>
                                            <?= date("F j, Y - h:i A") ?>
                                        </small>
                                    </div>
                                </div>
                            </div>


                            <!-- BUTTONS (HIDDEN ON PRINT) -->
                            <div class="d-flex justify-content-between mt-5 no-print">
                                <a href="dashboard.php" class="btn btn-secondary">Back</a>

                                <?php if ($progress['submission_status'] !== "pending"): ?>

                                    <!-- Already Submitted -->
                                    <button onclick="window.print()" class="btn btn-success">
                                        Print Application
                                    </button>

                                <?php else: ?>

                                    <!-- Not Yet Submitted -->
                                    <form id="submitApplicationForm" method="POST" action="../app/applicant/formhandler.php">
                                        <input type="hidden" name="action" value="<?= $utility->inputEncode('FORM_submit_application') ?>">
                                        <button type="button" onclick="confirmSubmission()" class="btn btn-primary">
                                            Submit Application
                                        </button>
                                    </form>

                                <?php endif; ?>
                            </div>


                        </div>
                    </div>
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

    <script>
        function confirmSubmission() {
            if (confirm("Are you sure you want to submit your application? After submission, you will not be able to edit your details.")) {
                document.getElementById("submitApplicationForm").submit();
            }
        }
    </script>