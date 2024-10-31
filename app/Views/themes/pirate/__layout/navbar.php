<nav class="navbar">


    <div class="navbar-content <?= sidebar_disabled() ? 'd-inline-block d-md-none' : '' ?>">
        <button id="toggle-sidebar-btn" class="btn btn-action" type="button" onclick="halfmoon.toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
    </div>
    <a href="<?= site_url() ?>" class="navbar-brand ml-10 ml-sm-20">
        <?php if(! has_site_logo()): ?>
            <h1 class="ve-logo-text"> <?= esc( site_name() ) ?> </h1>
        <?php else: ?>
            <img src="<?= site_logo() ?>" class="h-20 h-sm-30" alt="">
        <?php endif; ?>
    </a>

    <?php $uri = http_uri(); ?>
    <!-- Navbar nav -->
    <ul class="navbar-nav d-none d-md-flex ml-0"> <!-- d-none = display: none, d-md-flex = display: flex on medium screens and up (width > 768px) -->
        <li class="nav-item <?php if( $uri->getPath() == '/' || $uri->getSegment(1) === 'home'  ) echo 'active' ?>   ">
            <a href="<?= site_url() ?>" class="nav-link font-weight-semi-bold"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;
                <?= lang('TopNav.home') ?>
            </a>
        </li>

        <li class="nav-item <?php if($uri->getTotalSegments() >= 2 && $uri->getSegment(2) === 'movies'  ) echo 'active' ?>">
            <a href="<?= library_url() ?>" class="nav-link font-weight-semi-bold "><i class="fa fa-film" aria-hidden="true"></i>&nbsp;
                <?= lang('TopNav.movies') ?>
            </a>
        </li>

        <li class="nav-item <?php if($uri->getTotalSegments() >= 2 && $uri->getSegment(2) === 'shows'  ) echo 'active' ?>">
            <a href="<?= library_url([], 'shows') ?>" class="nav-link font-weight-semi-bold"><i class="fa fa-television" aria-hidden="true"></i>&nbsp;
                <?= lang('TopNav.tv_shows') ?>
            </a>
        </li>

        <?php if( is_users_system_enabled() ): ?>
        <li class="nav-item <?php if( $uri->getSegment(1) === 'earn-money'  ) echo 'active' ?>">
            <a href="<?= site_url('earn-money') ?>" class="nav-link font-weight-semi-bold"><i class="fa fa-dollar" aria-hidden="true"></i>&nbsp;
                Earn Money
            </a>
        </li>
        <?php endif; ?>

        <?php if(get_config('request_system')): ?>
        <li class="nav-item <?php if( $uri->getSegment(1) === 'request'  ) echo 'active' ?>">
            <a href="<?= site_url('request') ?>" class="nav-link font-weight-semi-bold "><i class="fa fa-plus-square" aria-hidden="true"></i>
                &nbsp; <?= lang('TopNav.request') ?>
            </a>
        </li>
        <?php endif; ?>




		
    </ul>

    <!-- Navbar nav -->
    <form class="form-inline ml-auto" action="..." method="..."> <!-- ml-auto = margin-left: auto -->

        <?php if(! is_users_system_enabled()): ?>

        <div class="input-group" style="min-width: auto">
            <input type="text" class="form-control d-none d-md-inline-block" data-toggle="modal" data-target="search-modal" placeholder="<?= lang('TopNav.search_placeholder') ?>" required="required">
            <div class="input-group-append">
                <button class="btn" type="button" data-toggle="modal" data-target="search-modal">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <span class="sr-only"><?= lang('TopNav.search_placeholder') ?></span> <!-- sr-only = show only on screen readers -->
                </button>
            </div>
        </div>

        <?php else: ?>

            <?php if(! is_logged()): ?>

                <div class="form-inline d-none d-md-flex ml-auto">
                    <a href="<?= site_url('/login') ?>" class="nav-link font-weight-semi-bold mr-5">
                        <i class="fa fa-sign-in"></i>&nbsp;
                        Log in
                    </a>
                    <a href="<?= site_url('/register') ?>" class="btn btn-primary font-weight-semi-bold">Register</a>
                    <a href="javascript:void(0)"  data-toggle="modal" data-target="search-modal"  class="btn font-weight-semi-bold">
                        <i class="fa fa-search"></i>
                    </a>
                </div>

            <?php else: ?>

            <div class="">

                <?php if(! is_user()): ?>
                    <a href="<?=  site_url('/admin/dashboard') ?>" class="btn btn-danger font-weight-semi-bold mr-5">
                        <i class="fa fa-user-secret"></i>&nbsp;
                        ADMIN
                    </a>
                <?php endif; ?>

                <?php if(! is_admin()): ?>
                <a href="<?=  site_url('/user/dashboard') ?>" class="btn btn-primary font-weight-semi-bold mr-5">
                    <i class="fa fa-dashboard"></i>&nbsp;
                    Dashboard
                </a>
                <?php endif; ?>
                <a href="javascript:void(0)"  data-toggle="modal" data-target="search-modal"  class="btn font-weight-semi-bold mr-5">
                    <i class="fa fa-search"></i>
                </a>
                <a href="<?= is_admin() ?  site_url('/admin/logout') : site_url('/user/logout') ?>" class="btn font-weight-semi-bold">
                    <i class="fa fa-sign-out"></i>
                </a>

            </div>

            <?php endif; ?>


        <?php endif; ?>


        <?php if(is_multi_languages_enabled() && ! empty( get_selected_languages() )): ?>

        <div class="dropdown  ml-5">
            <button class="btn p-5" data-toggle="dropdown" type="button" >
                <img  class="d-block"
                        src="<?= lang_flag( current_language() ) ?>"
                        width="30"
                        alt="South Africa">
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-toggle-btn-1">
                <h6 class="dropdown-header">Select Language</h6>
                <?php foreach ( get_selected_languages(true) as $lang) : ?>
                <a href="<?= lang_url( $lang ) ?>" class="dropdown-item d-flex align-items-center">
                    <img  class="mr-5"
                          src="<?= lang_flag( $lang ) ?>"
                          width="30"
                          alt="South Africa">
                    <?= lang_name( $lang ) ?>
                </a>
                <?php endforeach; ?>

            </div>
        </div>

        <?php endif; ?>

    </form>


</nav>