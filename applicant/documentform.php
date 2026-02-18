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

                            <h3 class="text-center mb-4">Applicant Document Form</h3>
                            <hr>

                            <form action="../app/applicant/formhandler.php" method="POST" enctype="multipart/form-data">

                                <!-- Passport -->
                                <div class="mb-3">
                                    <label class="form-label">Passport Photograph - Image only (jpg, jpeg, png)</label>
                                    <?php if (!empty($uploadedDocs['passport_photo'])): ?>
                                        <div class="mb-2">
                                            <img src="../<?= $uploadedDocs['passport_photo']; ?>" alt="Passport" class="doc-preview">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="passport_photo" class="form-control border-0 bg-light rounded ps-3" accept="image/*">
                                </div>
                                <hr>

                                <!-- O’Level Result -->
                                <div class="mb-3">
                                    <label class="form-label">O’Level Result - PDF only</label>
                                    <?php if (!empty($uploadedDocs['olevel_result'])): ?>
                                        <div class="mb-2">
                                            <iframe src="../<?= $uploadedDocs['olevel_result']; ?>" class="doc-iframe"></iframe>
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="olevel_result" class="form-control border-0 bg-light rounded ps-3" accept=".pdf">
                                </div>
                                <hr>

                                <!-- Birth Certificate -->
                                <div class="mb-3">
                                    <label class="form-label">Birth Certificate - PDF only</label>
                                    <?php if (!empty($uploadedDocs['birth_certificate'])): ?>
                                        <div class="mb-2">
                                            <iframe src="../<?= $uploadedDocs['birth_certificate']; ?>" class="doc-iframe"></iframe>
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="birth_certificate" class="form-control border-0 bg-light rounded ps-3" accept=".pdf">
                                </div>
                                <hr>

                                <!-- Identity Card -->
                                <div class="mb-3">
                                    <label class="form-label">Identity Card - PDF only</label>
                                    <?php if (!empty($uploadedDocs['identity_card'])): ?>
                                        <div class="mb-2">
                                            <iframe src="../<?= $uploadedDocs['identity_card']; ?>" class="doc-iframe"></iframe>
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="identity_card" class="form-control border-0 bg-light rounded ps-3" accept=".pdf">
                                </div>

                                <input type="hidden" name="action" value="<?= $utility->inputEncode('FORM_submit_docs') ?>">
                                <hr>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">Upload Documents</button>
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


        <!-- =======================
Page content END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <?php
    include("./inc/footer.php");
    ?><script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const fileRules = {
        passport_photo: { types: ["image/jpeg", "image/jpg", "image/png"], max: 100 * 1024 },
        olevel_result: { types: ["application/pdf"], max: 200 * 1024 },
        birth_certificate: { types: ["application/pdf"], max: 200 * 1024 },
        identity_card: { types: ["application/pdf"], max: 200 * 1024 }
    };

    form.addEventListener("submit", function(e) {
        let errors = [];

        for (let inputName in fileRules) {
            const input = form.querySelector(`input[name="${inputName}"]`);
            if (input && input.files.length > 0) {
                const file = input.files[0];
                const rules = fileRules[inputName];

                if (!rules.types.includes(file.type)) {
                    errors.push(`${inputName.replace("_", " ")}: Invalid file type.`);
                }

                if (file.size > rules.max) {
                    const maxKB = Math.round(rules.max / 1024);
                    errors.push(`${inputName.replace("_", " ")}: File must not exceed ${maxKB}KB.`);
                }
            }
        }

        if (errors.length > 0) {
            e.preventDefault();
            alert(errors.join("\n"));
        }
    });
});
</script>
