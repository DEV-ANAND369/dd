<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="   background: #172d44;">
            <a href="<?= site_url('/admin') ?>" class="site_title text-center"> <span>
                   <b>VIP</b> Embed</span>
            <sup>v<?= get_config('version') ?></sup>
            </a>
        </div>

        <div class="clearfix"></div>

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="<?= admin_url('/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard </a></li>

                    <li><a><i class="fa fa-film"></i> Movies <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/movies/new') ?>">Add Movie</a></li>
                            <li><a href="<?= admin_url('/movies') ?>">View All</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-video-camera"></i> Episodes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/episodes/new') ?>">Add Episode</a></li>
                            <li><a href="<?= admin_url('/episodes') ?>">View All Episodes</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> TV Shows <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/series/new') ?>">Add Show</a></li>
                            <li><a href="<?= admin_url('/series') ?>">View All Shows</a></li>
                        </ul>
                    </li>
                    <?php if( is_admin() ): ?>
                    <li><a><i class="fa fa-users"></i> Users System <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/users/new') ?>">Add User</a></li>
                            <li><a href="<?= admin_url('/users') ?>">View All</a></li>
                            <li><a href="javascript:void(0)">Links <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu">
                                        <a href="<?= admin_url('/users/links/stream') ?>">Stream</a>
                                    </li>
                                    <li>
                                        <a href="<?= admin_url('/users/links/direct_dl') ?>">Direct DL</a>
                                    </li>
                                    <li>
                                        <a href="<?= admin_url('/users/links/torrent_dl') ?>">Torrent DL</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="<?= admin_url('/statistics/earnings') ?>">Earnings</a></li>
                            <li><a href="<?= admin_url('/statistics/referrals') ?>">Referrals</a></li>
                            <li><a href="<?= admin_url('/payouts') ?>">Payouts</a></li>
                            <li><a href="javascript:void(0)">Rewards <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu">
                                        <a href="<?= admin_url('/rewards/general') ?>">General</a>
                                    </li>
                                    <li>
                                        <a href="<?= admin_url('/rewards/referrals') ?>">Referrals</a>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="<?= admin_url('/settings/users') ?>">Settings</a></li>

                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if( is_admin() ): ?>
                    <li><a href="<?= admin_url('/genres') ?>"><i class="fa fa-th-large"></i> Genres </a></li>
                    <?php endif; ?>

                    <li><a href="<?= admin_url('/bulk-import') ?>"><i class="fa fa-indent"></i> Bulk Import </a></li>

                    <?php if( is_admin() ): ?>
                    <li><a><i class="fa fa-line-chart"></i> Statistics <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/statistics/views') ?>">Video views</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if( is_admin() ): ?>
                    <li><a><i class="fa fa-dollar"></i> Advertisement <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/ads/home_page') ?>">Home page</a></li>
                            <li><a href="<?= admin_url('/ads/view_page') ?>">View page</a></li>
                            <li><a href="<?= admin_url('/ads/download_page') ?>">Download page</a></li>
                            <li><a href="<?= admin_url('/ads/link_page') ?>">Link page</a></li>
                            <li><a href="<?= admin_url('/ads/embed_page') ?>">Embed page</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li><a href="<?= admin_url('/next-for-you') ?>"><i class="fa fa-hand-o-right"></i> Next For You
                            <span class="label label-success badge badge-info pull-right"><?= \App\Models\FailedMovies::getPendingCount() ?></span>
                        </a>
                    </li>
                    <li><a href="<?= admin_url('/requests') ?>"><i class="fa fa-comments-o"></i> User Requests
                            <span class="label label-success badge badge-info pull-right"><?= \App\Models\RequestsModel::getPendingCount() ?></span>
                        </a>
                    </li>

                    <li><a><i class="fa fa-rocket"></i> Discover <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/discover/movies') ?>">Movies</a></li>
                            <li><a href="<?= admin_url('/discover/shows') ?>">TV Shows</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-unlink"></i> Links <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/links') ?>">View All</a></li>
                            <li><a href="<?= admin_url('/links/reported') ?>">Reported</a></li>
                            <?php if(! is_admin()): ?>
                            <li><a href="javascript:void(0)">Links <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu">
                                        <a href="<?= admin_url('/links/users-added/stream') ?>">Stream</a>
                                    </li>
                                    <li>
                                        <a href="<?= admin_url('/links/users-added/direct_dl') ?>">Direct DL</a>
                                    </li>
                                    <li>
                                        <a href="<?= admin_url('/links/users-added/torrent_dl') ?>">Torrent DL</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <?php if( is_admin() ): ?>
                    <li><a><i class="fa fa-files-o"></i> Pages <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/pages') ?>">View All</a></li>
                            <li><a href="<?= admin_url('/pages/new') ?>">New Page</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if( is_admin() ): ?>
                    <li><a><i class="fa fa-magic"></i> Third Party APIs <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/third-party-apis') ?>">View All</a></li>
                            <li><a href="<?= admin_url('/third-party-apis/new') ?>">Add New</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if( is_admin() ): ?>
                    <li><a><i class="fa fa-gear"></i> Settings <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= admin_url('/settings/site') ?>">Site</a></li>
                            <li><a href="<?= admin_url('/settings/profile') ?>">Profile</a></li>
                            <li><a href="<?= admin_url('/settings/general') ?>">General</a></li>
                            <li><a href="<?= admin_url('/settings/servers') ?>">Servers</a></li>
                            <li><a href="<?= admin_url('/settings/player') ?>">Player</a></li>
                            <li><a href="<?= admin_url('/settings/firewall') ?>">Firewall</a></li>
                            <li><a href="<?= admin_url('/settings/cache') ?>">Cache</a></li>
                            <li><a href="<?= admin_url('/settings/email') ?>">Email</a></li>
                            <li><a href="<?= admin_url('/settings/api') ?>">Dev API</a></li>
                            <li><a href="<?= admin_url('/settings/permalinks') ?>">Permalinks</a></li>
                            <li><a href="<?= admin_url('/settings/translations') ?>">Translations</a></li>
                            <li><a href="<?= admin_url('/settings/backup') ?>">Backup</a></li>
                            <li><a href="<?= admin_url('/settings/license') ?>">License</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>


                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <div class="sidebar-footer hidden-small">
            <a href="<?= admin_url('/settings/general') ?>"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a href="<?= admin_url('/movies/new') ?>" data-toggle="tooltip" data-placement="top" title="Add Movie" data-original-title="FullScreen">
                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
            </a>
            <a href="<?= admin_url('/episodes/new') ?>" data-toggle="tooltip" data-placement="top" title="Add Episode" data-original-title="Lock">
                <span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="" href="<?= admin_url('/logout') ?>" data-original-title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>


    </div>
</div>