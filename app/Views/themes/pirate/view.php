<?= $this->extend( theme_path('__layout/base') ) ?>

<?= $this->section("content") ?>

<div class="container-fluid mb-20">


    <!-- Title Section -->
    <div class="row align-items-center">
        <div class="col-auto">
            <div class="content my-15">
                <div>
                    <a href="<?= library_url() ?>"> <?= lang('General.back_to_library') ?> </a>
                </div>
                <h1 class="content-title mt-5">
                    <?= esc( $title ) ?>
                </h1>
            </div>
        </div>
    </div>
    <!-- ./ End Title Section -->

    <!-- Content Body Section -->
    <div class="row row-eq-spacing my-5">
        <div class="col-lg-7 col-xl-8">

            <!-- leaderboard ad-->
            <?php if( has_display_banner_ad('view.banner.player-bottom', $ads) ) {
                echo display_banner_ad('view.banner.player-bottom', $ads);
            } ?>

            <?php the_embed_player( $activeMovie ) ?>

            <!-- leaderboard ad-->
            <?php if( has_display_banner_ad('view.banner.player-top', $ads) ) {
                echo display_banner_ad('view.banner.player-top', $ads);
            } ?>

            <?php if(! empty($seasons)) : ?>

            <div class="card seasons-list" data-series-id="<?= $activeMovie->getUniqueId() ?>"
                 data-series-id-type="<?= $activeMovie->getUniqueIdType() ?>">
                <div class="input-group">
                <?= format_seasons_list( $activeMovie, $seasons ) ?>
                </div>
            </div>

            <?php endif; ?>

            <?php if(! empty($activeMovie->description)): ?>
            <div class="card">
                <h2 class="card-title font-size-22">
                    Storyline
                </h2>
                <p>
                    <?= esc( $activeMovie->description ) ?>
                </p>
            </div>
            <?php endif; ?>


            <div class="card">
                <h2 class="card-title font-size-22">
                    Share & Earn Money
                </h2>
                <?php the_embed_links_group( $activeMovie ); ?>
            </div>

        </div>
        <div class="col-lg-5 col-xl-4 mt-15 mt-lg-0">

            <?php if(get_config('is_telegram_card_enabled')): ?>

            <div class="card telegram-card p-5 ">
                <a href="https://t.me/<?= esc( get_config('telegram_username') ) ?>" target="_blank">
                    <div class="card-body d-flex align-items-center">
                        <div class="img-wrap mr-15">
                            <img src="<?= theme_assets('/images/icons/svg/telegram.svg') ?>" width="55" alt="telegram">
                        </div>
                        <div class="txt-wrap">
                            <h4 class="m-0 ">Join us on  <b class="telegram-txt">Telegram</b> </h4>
                            <span class="telegram-link-badge">t.me/<?= esc( get_config('telegram_username') ) ?></span>
                        </div>
                    </div>
                </a>
            </div>

            <?php endif; ?>

            <div class="w-250 mw-full ">
                <div class="card m-0 mb-10 p-5">
                    <img src="<?= poster_uri( $activeMovie->poster ) ?>" class="img-fluid w-full" alt="">
                    <div class="p-10">
                        Video Quality:
                        <span class="badge float-right"><?= esc( $activeMovie->quality ) ?></span>
                    </div>
                </div>

                <?php if(! empty( $activeMovie->trailer )): ?>
                <button class="btn btn-block" data-toggle="modal" data-target="trailer-modal"><i class="fa fa-video-camera" aria-hidden="true"></i>
                    &nbsp; Watch Trailer</button>
                <?php endif; ?>

            </div>

            <div class="content">

                <?php the_movie_meta_info( $activeMovie ) ?>

            </div>

            <!-- sidebar ad-->
            <?php if( has_display_banner_ad('view.banner.sidebar', $ads) ) {
                echo display_banner_ad('view.banner.sidebar', $ads);
            } ?>



        </div>
    </div>
    <!-- ./ End Content Body Section -->

</div>


<?= $this->endSection() ?>


<?= $this->section('end-of-content') ?>

    <?php if(! empty( $activeMovie->trailer )): ?>
    <!-- Modal Trailer -->
    <div class="modal" id="trailer-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-media w-600 p-10"> <!-- w-500 = width: 50rem (500px) -->
                <a href="javascript:void(0)" class="close" role="button" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </a>

                <div class="iframe-wrapper">
                    <iframe class="lazy" width="560" height="315" data-src="<?= esc( $activeMovie->getMovieTrailer() ) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

            </div>
        </div>
    </div>
    <?php endif; ?>

<?= $this->endSection() ?>