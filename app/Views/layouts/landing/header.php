<div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light main_box">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="<?= current_url() ?>"><b>Dig-Market</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item <?= ($active == 'home') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
                    <li class="nav-item submenu dropdown <?= ($active == 'fotografi' || $active == 'videografi' || $active == 'payment') ? 'active' : '' ?>">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item <?= ($active == 'fotografi') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('shop/fotografi') ?>">Fotografi</a></li>
                            <li class="nav-item <?= ($active == 'videografi') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('shop/videografi') ?>">Videografi</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informasi</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="blog.html">Testimoni</a></li>
                            <li class="nav-item"><a class="nav-link" href="single-blog.html">Rate</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item <?= ($active == 'contact') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('shop/contact') ?>">Contact</a></li>
                    <?php if (session('role') == 'Pengguna') : ?>
                        <li class="nav-item"><a class="nav-link text-success"><span class="ti-check-box mx-1"></span>Logged</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link text-danger">Not Logged</a></li>
                    <?php endif ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (session('role') == 'Pengguna') : ?>
                        <li class="nav-item"><a href="<?= base_url('logout') ?>" class="cart"><span class="ti-power-off"></span></a></li>
                        <li class="nav-item"><a href="<?= base_url('shop/cart') ?>" class="cart"><span class="ti-shopping-cart"></span></a></li>
                    <?php else : ?>
                        <li class="nav-item"><a href="<?= base_url('login') ?>" class="cart"><span class="ti-user"></span></a></li>
                    <?php endif ?>
                    <!-- <li class="nav-item">
                        <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="search_input" id="search_input_box">
    <div class="container">
        <form class="d-flex justify-content-between">
            <input type="text" class="form-control" id="search_input" placeholder="Search Here">
            <button type="submit" class="btn"></button>
            <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
    </div>
</div>