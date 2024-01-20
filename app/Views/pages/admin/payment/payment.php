<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container">
    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
    <div class="row g-4">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="row m-sm-4 m-0">
                        <div class="col-md-6 mb-md-0 mb-4 ps-0">
                            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                                <img src="<?= base_url('assets/upload/testi/' . $jasaModel['testimoni_foto']); ?>" alt="Avatar Image" class="rounded-circle w-px-100 h-px-100" />
                                <span class="app-brand-text fw-bold fs-4"> <?= $jasaModel['nama_jasa'] ?> </span>
                            </div>
                            <p class="mb-2"><?= $jasaModel['lokasi'] ?></p>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div class="invoice-calculations">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100">Subtotal:</span>
                                    <span class="fw-semibold">Rp <?= $jasaModel['harga_jasa'] ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100">Discount:</span>
                                    <span class="fw-semibold">Rp 0</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100">Tax:</span>
                                    <span class="fw-semibold">Rp 0</span>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <span class="w-px-100">Total:</span>
                                    <span class="fw-semibold">Rp <?= $jasaModel['harga_jasa'] ?></span>
                                </div>
                                <button id="pay-button" class="btn btn-primary mt-3">Bayar Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl flex-grow-1 container">
    <div id="payment-status" class="mt-4"></div>
</div>

<?= $this->endsection() ?>

<!-- AREA MIDTRANS -->
<?= $this->section('scripts') ?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= config('Midtrans')->clientKey ?>"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        snap.pay('<?= $snapToken ?>', {
            onSuccess: function(result) {
                var orderId = result.order_id;
                var paymentMethod = result.payment_type;
                updateTransactionStatus(orderId, 'Success', paymentMethod);
            },
            onPending: function(result) {
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                document.getElementById('payment-status').innerHTML = 'Payment is pending...';

                updateTransactionStatus('Pending');
            },
            onError: function(result) {
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                document.getElementById('payment-status').innerHTML = 'Payment failed!';

                updateTransactionStatus('Failed');
            }
        });
    };

    function updateTransactionStatus(orderId, status, paymentMethod) {
        $.ajax({
            url: '<?= site_url('admin/payment/update-status/') ?>' + orderId,
            method: 'POST',
            data: {
                status: status,
                order_id: orderId,
                payment_method: paymentMethod
            },
            success: function(response) {
                console.log('Transaction status updated on the server.');
                window.location.href = '<?= site_url('admin/detail') ?>';
            },
            error: function(error) {
                console.error('Error updating transaction status:', error);
            }
        });
    }
</script>
<?= $this->endSection() ?>