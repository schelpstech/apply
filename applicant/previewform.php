<?php
include("./inc/head.php");
?>
<style>
    @media print {

        @page {
            size: A4;
            margin: 10mm;
        }

        body * {
            visibility: hidden;
        }

        .print-container,
        .print-container * {
            visibility: visible;
        }

        .print-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 190mm;
            min-height: 277mm;
            margin: 0;
            padding: 10mm;
            background: #fff;
            box-shadow: none;
        }

        .no-print {
            display: none !important;
        }

        body {
            font-size: 12px;
            line-height: 1.3;
        }

        .section-title {
            font-size: 13px;
            padding: 5px 8px;
        }

        .table-preview th,
        .table-preview td {
            padding: 4px;
            font-size: 11px;
        }

        .application-header h2 {
            font-size: 16px;
        }

        .application-header p {
            font-size: 11px;
        }

        table,
        tr,
        td,
        th {
            page-break-inside: avoid !important;
        }
    }

    /* A4 Preview on screen */
    .print-container {
        width: 210mm;
        min-height: 297mm;
        margin: 20px auto;
        padding: 12mm;
        background: #fff;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        transform: scale(0.95);
        /* slightly shrink to fit screen */
        transform-origin: top center;
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
        font-size: 12px;
    }

    .table-preview th {
        width: 30%;
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
                            <div class="application-header d-flex align-items-center justify-content-between">

                                <!-- LOGO -->
                                <div>
                                    <img src="../assets/images/atibaunimage.jpg" alt="University Logo"
                                        style="width:70px; height:70px; object-fit:contain;">
                                </div>

                                <!-- TITLE -->
                                <div style="text-align:center; flex:1;">
                                    <h2 style="margin-bottom:5px;">ATIBA UNIVERSITY, OYO</h2>
                                    <p><strong>Postgraduate School Application Form</strong></p>
                                    <p>Academic Session: <?= htmlspecialchars($programme['academic_session'] ?? '-') ?></p>
                                </div>

                                <!-- PASSPORT -->
                                <div>
                                    <?php if (!empty($uploadedDocs['passport_photo'])): ?>
                                        <img src="../<?= htmlspecialchars($uploadedDocs['passport_photo']) ?>"
                                            style="width:80px; height:90px; object-fit:cover; border:1px solid #ccc;">
                                    <?php endif; ?>
                                </div>

                            </div>

                            <hr>
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
                                    <td><?= htmlspecialchars($applicant_prog_data['degree_type'] . " - " . $applicant_prog_data['course_name'] ?? '-') ?></td>
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

                            <!-- ACADEMIC CREDENTIALS -->
                            <div class="section-title">ACADEMIC QUALIFICATIONS</div>

                            <?php if (!empty($applicant_credentials)): ?>

                                <table class="table-preview mb-4">
                                    <thead>
                                        <tr>
                                            <th>Institution</th>
                                            <th>Degree</th>
                                            <th>Class</th>
                                            <th>Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($applicant_credentials as $cred): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($cred['institution'] ?? '-') ?></td>
                                                <td><?= htmlspecialchars($cred['degree_awarded'] ?? '-') ?></td>
                                                <td><?= htmlspecialchars($cred['graduation_class'] ?? '-') ?></td>
                                                <td><?= htmlspecialchars($cred['year_obtained'] ?? '-') ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>

                            <?php else: ?>

                                <table class="table-preview mb-4">
                                    <tr>
                                        <td style="text-align:center;">No Academic Credentials Found</td>
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