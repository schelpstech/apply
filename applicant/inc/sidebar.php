<!-- Left sidebar START -->
<div class="col-xl-3">
    <!-- Responsive offcanvas body START -->
    <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
        <!-- Offcanvas header -->
        <div class="offcanvas-header bg-light border-bottom">
            <h5 class="offcanvas-title fw-bold" id="offcanvasNavbarLabel">My Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
        </div>

        <!-- Offcanvas body -->
        <div class="offcanvas-body p-3 p-xl-0">
            <div class="glass-card p-3 w-100">
                <!-- Dashboard menu -->
                <div class="list-group list-group-flush">
                    <!-- Always available -->
                    <a class="list-group-item list-group-item-action mb-1 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active-link' : ''; ?>" href="dashboard.php">
                        <i class="bi bi-speedometer2 fa-fw me-2"></i>Dashboard
                    </a>

                    <!-- Forms locked until payment -->
                    <?php
                    $forms = [
                        'biodataform.php' => ['icon'=>'bi-person-badge','label'=>'Bio-Data'],
                        'contactform.php' => ['icon'=>'bi-telephone','label'=>'Contact Details'],
                        'educationhistform.php' => ['icon'=>'bi-mortarboard','label'=>'Education History'],
                        'programmedetails.php' => ['icon'=>'bi-journal-text','label'=>'Programme Details'],
                        'documentform.php' => ['icon'=>'bi-upload','label'=>'Document Upload'],
                        'previewform.php' => ['icon'=>'bi-eye','label'=>'Application Preview']
                    ];

                    foreach ($forms as $file => $data) {
                        $disabled = false;
                        if ($file == 'previewform.php') {
                            $canPreview = $paymentMade && !empty($progress['supporting_docs']);
                            $disabled = !$canPreview;
                        } else {
                            $disabled = !$paymentMade;
                        }
                        $href = $disabled ? '#' : $file;
                        $tabindex = $disabled ? 'tabindex="-1" aria-disabled="true" onclick="return false;"' : '';
                        echo '<a class="list-group-item list-group-item-action mb-1 rounded '.($disabled ? 'disabled-link' : '').'" href="'.$href.'" '.$tabindex.'>';
                        echo '<i class="'.$data['icon'].' me-2"></i>'.$data['label'].'</a>';
                    }
                    ?>

                    <!-- Always available -->
                    <a class="list-group-item list-group-item-action mb-1 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'transaction.php' ? 'active-link' : ''; ?>" href="transaction.php">
                        <i class="bi bi-credit-card fa-fw me-2"></i>Transaction History
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Responsive offcanvas body END -->
</div>

<!-- Left sidebar END -->