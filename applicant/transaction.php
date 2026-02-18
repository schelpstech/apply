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
                        <!-- Billing history START -->
                        <div class="card glass-card border rounded-3 shadow-sm">
                            <!-- Card header START -->
                            <div class="card-header bg-transparent border-bottom">
                                <h3 class="mb-0">Transaction History</h3>
                            </div>
                            <!-- Card header END -->

                            <!-- Card body START -->
                            <div class="card-body p-0">
                                <!-- Transactions table START -->
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" class="border-0 rounded-start">Date</th>
                                                <th scope="col" class="border-0">Reference</th>
                                                <th scope="col" class="border-0">Payment method</th>
                                                <th scope="col" class="border-0">Status</th>
                                                <th scope="col" class="border-0">Total</th>
                                                <th scope="col" class="border-0 rounded-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($transactionHistory)): ?>
                                                <?php foreach ($transactionHistory as $transaction): ?>
                                                    <tr>
                                                        <!-- Date -->
                                                        <td><?= date("d M Y", strtotime($transaction['created_at'])); ?></td>

                                                        <!-- Reference -->
                                                        <td>
                                                            <h6 class="mb-0">
                                                                <a href="#" class="text-decoration-none"><?= strtoupper($transaction['reference'] ?? "N/A"); ?></a>
                                                            </h6>
                                                        </td>

                                                        <!-- Payment Method -->
                                                        <td class="d-flex align-items-center">
                                                            <img src="../assets/images/logo/paystack.png" class="h-40px" alt="">
                                                            <span class="ms-2"><?= strtoupper($transaction['payment_method'] ?? "N/A"); ?></span>
                                                        </td>

                                                        <!-- Status -->
                                                        <td>
                                                            <?php
                                                            $status = strtolower($transaction['status'] ?? 'N/A');
                                                            $badgeClass = match ($status) {
                                                                'success' => 'bg-success bg-opacity-15 text-success',
                                                                'pending' => 'bg-warning bg-opacity-15 text-warning',
                                                                'failed' => 'bg-danger bg-opacity-15 text-danger',
                                                                default => 'bg-secondary bg-opacity-15 text-secondary'
                                                            };
                                                            ?>
                                                            <span class="badge <?= $badgeClass ?> text-uppercase"><?= $transaction['status'] ?? 'N/A'; ?></span>
                                                        </td>

                                                        <!-- Total -->
                                                        <td>₦<?= number_format($transaction['amount'], 2) ?></td>

                                                        <!-- Action -->
                                                        <td>
                                                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle"
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Download">
                                                                <i class="bi bi-download"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="6" class="text-center py-4">You have no transactions yet.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Transactions table END -->
                            </div>
                            <!-- Card body END -->
                        </div>
                        <!-- Billing history END -->
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