<?= $this->extend('layouts/landing/main') ?>
<?= $this->section('content') ?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Proses Payment</h1>
                <nav class="d-flex align-items-center">
                    <a href="<?= base_url('/') ?>">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="<?= current_url() ?>">Payment</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/cart.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p><?= $jasaModel['nama_jasa'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5><?= 'Rp ' . number_format($jasaModel['harga_jasa'], 0, ',', '.'); ?></h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty" disabled>
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button" disabled><i class="lnr lnr-chevron-up"></i></button>
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button" disabled><i class="lnr lnr-chevron-down"></i></button>
                                </div>
                            </td>
                            <td>
                                <h5><?= 'Rp ' . number_format($jasaModel['harga_jasa'], 0, ',', '.'); ?></h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="<?= base_url('/') ?>">Back</a>
                                    <a class="primary-btn" href="#" id="pay-button">Continue Shopping</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

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
            url: '<?= site_url('shop/payment/update-status/') ?>' + orderId,
            method: 'POST',
            data: {
                status: status,
                order_id: orderId,
                payment_method: paymentMethod
            },
            success: function(response) {
                console.log('Transaction status updated on the server.');
                window.location.href = '<?= site_url('shop/payment/berhasil') ?>';
            },
            error: function(error) {
                console.error('Error updating transaction status:', error);
            }
        });
    }
</script>
<?= $this->endSection() ?>