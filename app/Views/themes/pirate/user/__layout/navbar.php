<nav class="navbar">

    <div class="container">

        <!-- navbar-brand-->
        <a href="<?=site_url() ?>" class="navbar-brand">
            <?php if (!has_site_logo()): ?>
                <h1 class="ve-logo-text"> <?=esc(site_name()) ?> </h1>
            <?php
            else: ?>
                <img src="<?=site_logo() ?>" class="h-20 h-sm-30" alt="">
            <?php
            endif; ?>
        </a>
        <!-- /. navbar-brand-->

        <?php $uri = http_uri(); ?>
        <!-- Top Navbar menus -->
        <ul class="navbar-nav d-none d-md-flex ml-0">

            <!-- nav-item-->
            <li class="nav-item <?php if ($uri->getTotalSegments() >= 2 && $uri->getSegment(2) === 'dashboard') echo 'active' ?>   ">
                <a href="<?=site_url('/user/dashboard') ?>" class="nav-link font-weight-semi-bold"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;
                    <?=lang('User/Navbar.dashboard') ?>
                </a>
            </li>
            <!-- /. nav-item-->

            <!-- nav-item-->
            <li class="nav-item <?php if ($uri->getTotalSegments() >= 2 && ($uri->getSegment(2) === 'my-movies' || $uri->getSegment(2) === 'my-shows')) echo 'active' ?>">
                <a href="<?=site_url('/user/my-movies') ?>" class="nav-link font-weight-semi-bold "  ><i class="fa fa-film" aria-hidden="true"></i>&nbsp;
                    <?=lang('User/Navbar.my_movies') ?>
                </a>
            </li>
            <!-- /. nav-item-->

            <!-- nav-item-->
            <li class="nav-item <?php if ($uri->getTotalSegments() >= 2 && $uri->getSegment(2) === 'my-links') echo 'active' ?>">
                <a href="<?=site_url('/user/my-links') ?>" class="nav-link font-weight-semi-bold "><i class="fa fa-link" aria-hidden="true"></i>&nbsp;
                    <?=lang('User/Navbar.my_links') ?>
                </a>
            </li>
            <!-- /. nav-item-->

            <!-- nav-item-->
            <li class="nav-item dropdown with-arrow">
                <a href="javascript:void(0)" class="nav-link font-weight-semi-bold" data-toggle="dropdown" >
                    <i class="fa fa-area-chart"></i>&nbsp;
                    <?=lang('User/Navbar.statistics') ?> <i class="fa fa-angle-down ml-5" aria-hidden="true"></i> <!-- ml-5 = margin-left: 0.5rem (5px) -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="...">
                    <a href="<?=site_url('/user/statistics/earnings') ?>" class="dropdown-item">
                        <i class="fa fa-star-half-o"></i>&nbsp;
                        <?=lang('User/Navbar.earnings_stats') ?>
                    </a>

                    <a href="<?=site_url('/user/statistics/referrals') ?>" class="dropdown-item">
                        <i class="fa fa-users"></i>&nbsp;
                        <?=lang('User/Navbar.referrals_stats') ?>
                    </a>
                </div>
            </li>
            <!-- /. nav-item-->

        </ul>
        <!-- /. Top Navbar menus-->

        <!-- Navbar nav -->
        <ul class="navbar-nav ml-auto">

            <!-- nav-item-->
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="add-links-by-imdb-id-modal">
                   <span class="badge">
                        <i class="fa fa-plus"></i>
                   </span>
                </a>
            </li>
            <!-- /. nav-item-->

            <!-- nav-item-->
            <li class="nav-item dropdown with-arrow">
                <a class="nav-link" data-toggle="dropdown" id="nav-link-dropdown-toggle">
                    <img src="<?= site_url('/admin-assets/images/avatar.jpg') ?>" class="img-fluid rounded-circle w-30" alt="rounded circle image">
                    &nbsp;&nbsp;<?=esc(current_user()
                        ->username) ?>
                    <i class="fa fa-angle-down ml-5" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-link-dropdown-toggle">
                    <a href="<?=site_url('/user/profile') ?>" class="dropdown-item">
                        <?=lang('User/Navbar.my_profile') ?>
                    </a>
                    <a href="<?=site_url('/user/payouts') ?>" class="dropdown-item">
                        <?=lang('User/Navbar.payouts') ?>
                    </a>
                    <a href="<?=site_url('/user/earnings') ?>" class="dropdown-item">
                        <?=lang('User/Navbar.earnings') ?>
                    </a>
                    <a href="<?=site_url('/user/stars-log') ?>" class="dropdown-item">
                        <?=lang('User/Navbar.stars_log') ?>
                    </a>

                    <div class="dropdown-divider"></div>
                    <div class="dropdown-content">
                        <a href="<?=site_url('/user/logout') ?>" class="btn btn-block" role="button">
                            <?=lang('User/Navbar.logout') ?>
                            <i class="fa fa-sign-out ml-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </li>
            <!-- /. nav-item-->

        </ul>

    </div>



</nav>
