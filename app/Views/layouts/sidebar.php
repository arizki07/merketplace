<?php if (session()->get('role') === 'Admin') : ?>
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo mt-4">
            <a href="<?= base_url('/dashboard') ?>" class="app-brand-link">
                <span class="app-brand-logo demo">
                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
                    </svg>
                </span>
                <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-4">
            <!-- Dashboards -->
            <li class="menu-item <?= ($active ?? '') == 'dashboard' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/dashboard') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-dashboard"></i>
                    <div>Dashboard</div>
                </a>
            </li>

            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data Master</span>
            </li>
            <li class="menu-item <?= ($active ?? '') == 'users' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/data-user') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div>Data User</div>
                </a>
            </li>
            <li class="menu-item <?= ($active ?? '') == 'administrator' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/administrator') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-lock"></i>
                    <div>Administrator</div>
                </a>
            </li>
            <li class="menu-item <?= ($active == 'google' || $active == 'otp') ? 'active open' : '' ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-lock-access"></i>
                    <div>Authenticated</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?= ($active == 'google') ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/google') ?>" class="menu-link">
                            <div>Data Akses Google</div>
                        </a>
                    </li>
                    <li class="menu-item <?= ($active == 'otp') ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/otp') ?>" class="menu-link">
                            <div>Data OTP</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Jasa</span>
            </li>
            <!-- Layouts -->
            <li class="menu-item <?= ($active == 'penyedia' || $active == 'pengguna') ? 'active open' : '' ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-address-book"></i>
                    <div>Biodata</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?= ($active == 'penyedia') ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/penyedia-jasa') ?>" class="menu-link">
                            <div>Penyedia Jasa</div>
                        </a>
                    </li>
                    <li class="menu-item <?= ($active == 'pengguna') ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/pengguna-jasa') ?>" class="menu-link">
                            <div>Pengguna Jasa</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item <?= ($active == 'jasa') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/list-jasa') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-checklist"></i>
                    <div>Product Jasa</div>
                </a>
            </li>
            <li class="menu-item <?= ($active == 'detail') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/detail') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-mail"></i>
                    <div>Pesan Jasa</div>
                </a>
            </li>
            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Transaksi &amp; Ulasan</span>
            </li>
            <li class="menu-item <?= ($active == 'pesanan') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/pesanan') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div>Pesanan</div>
                </a>
            </li>
            <li class="menu-item <?= ($active == 'transaksi') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/transaksi') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-coin"></i>
                    <div>Transaksi</div>
                </a>
            </li>
            <li class="menu-item <?= ($active == 'ulasan') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/ulasan') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-messages"></i>
                    <div>Ulasan</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Sessions</span>
            </li>
            <li class="menu-item">
                <a href="<?= base_url('logout') ?>" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-logout"></i>
                    <div>Logout</div>
                </a>
            </li>
        </ul>
    </aside>
<?php elseif (session()->get('role') === 'Pengguna') : ?>

<?php elseif (session()->get('role') === 'Penyedia') : ?>
    <?php if ((session('user_id_biodata') == '0' || session('status') == '0')) : ?>
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo mt-4">
                <a href="<?= base_url('/dashboard') ?>" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
                        </svg>
                    </span>
                    <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                    <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-4">
                <!-- Dashboards -->
                <li class="menu-item <?= ($active ?? '') == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('penyedia/dashboard') ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-dashboard"></i>
                        <div>Dashboard</div>
                    </a>
                </li>

                <li class="menu-item <?= ($active == 'profile') ? 'active' : '' ?>">
                    <a href="<?= base_url('/penyedia/profile/create') ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div>Profile</div>
                    </a>
                </li>
            </ul>
        </aside>
    <?php else : ?>
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo mt-4">
                <a href="<?= base_url('/dashboard') ?>" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
                        </svg>
                    </span>
                    <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                    <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-4">
                <!-- Dashboards -->
                <li class="menu-item <?= ($active ?? '') == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('penyedia/dashboard') ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-dashboard"></i>
                        <div>Dashboard</div>
                    </a>
                </li>

                <li class="menu-item <?= ($active == 'profile') ? 'active' : '' ?>">
                    <a href="<?= base_url('/penyedia/profile') ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div>Profile</div>
                    </a>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Data Master</span>
                </li>

                <li class="menu-item <?= ($active == 'jasa') ? 'active' : '' ?>">
                    <a href="<?= base_url('penyedia/list-jasa') ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-address-book"></i>
                        <div>Product Jasa</div>
                    </a>
                </li>

                <li class="menu-item <?= ($active == 'detail') ? 'active' : '' ?>">
                    <a href="<?= base_url('penyedia/detail') ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-mail"></i>
                        <div>Detail Jasa</div>
                    </a>
                </li>

                <!-- Apps & Pages -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Transaksi &amp; Ulasan</span>
                </li>
                <li class="menu-item <?= ($active == 'pesanan') ? 'active' : '' ?>">
                    <a href="<?= base_url('penyedia/pesanan') ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-messages"></i>
                        <div>Pesanan</div>
                    </a>
                </li>
                <li class="menu-item <?= ($active == 'transaksi') ? 'active' : '' ?>">
                    <a href="<?= base_url('penyedia/transaksi') ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-coin"></i>
                        <div>Transaksi</div>
                    </a>
                </li>
                <li class="menu-item <?= ($active == 'ulasan') ? 'active' : '' ?>">
                    <a href="<?= base_url('penyedia/ulasan') ?>" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-messages"></i>
                        <div>Ulasan</div>
                    </a>
                </li>
            </ul>
        </aside>
    <?php endif ?>
<?php endif ?>