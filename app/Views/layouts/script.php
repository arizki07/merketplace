 <!-- Core JS -->
 <!-- build:js assets/vendor/js/core.js -->
 <script src="<?= base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>
 <script src="<?= base_url() ?>assets/vendor/libs/popper/popper.js"></script>
 <script src="<?= base_url() ?>assets/vendor/js/bootstrap.js"></script>
 <script src="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
 <script src="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.js"></script>

 <script src="<?= base_url() ?>assets/vendor/libs/hammer/hammer.js"></script>
 <script src="<?= base_url() ?>assets/vendor/libs/i18n/i18n.js"></script>
 <script src="<?= base_url() ?>assets/vendor/libs/typeahead-js/typeahead.js"></script>

 <script src="<?= base_url() ?>assets/vendor/js/menu.js"></script>
 <!-- endbuild -->

 <!-- Vendors JS -->
 <script src="<?= base_url() ?>assets/vendor/libs/swiper/swiper.js"></script>

 <!-- Main JS -->
 <script src="<?= base_url() ?>assets/js/main.js"></script>

 <script src="<?= base_url() ?>assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
 <script src="<?= base_url() ?>assets/js/extended-ui-sweetalert2.js"></script>

 <!-- Page JS -->
 <script src="<?= base_url() ?>assets/js/dashboards-analytics.js"></script>

 <script src="<?= base_url() ?>assets/datatables/datatables.min.js"></script>

 <script src="<?= base_url() ?>assets/js/pages-profile.js"></script>

 <script>
new DataTable('#example');
 </script>

 <!-- Sweetalert untuk login -->
 <script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the logout button element
    var logoutBtn = document.getElementById('logoutBtn');

    // Add a click event listener to the logout button
    logoutBtn.addEventListener('click', function() {
        // Show a confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, log out',
            cancelButtonText: 'Cancel',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function(result) {
            // Check if the user clicked the confirm button
            if (result.isConfirmed) {
                // Redirect to the logout URL or trigger your logout process
                window.location.href = "<?= base_url('logout') ?>";
            }
        });
    });
});
 </script>