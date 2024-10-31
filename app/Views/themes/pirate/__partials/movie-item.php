<div class="card movie-card p-5 border-0 mb-10"> <!-- p-0 = padding: 0 -->
    <div class="front" >




<div class="poster-img lazy"  data-bg-multi="linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ), url(<?= poster_uri( esc( $movie->poster ) )  ?>)">

</div>
        <div class="top">
            <?php if(! empty($movie->season)): ?>
                <span class="badge bg-dark-dm border-0">
                    <?= the_episode_label($movie->season, $movie->episode) ?>
                </span>
            <?php else: ?>
                <span></span>
            <?php endif; ?>

            <?php if(! $imdbBased): ?>

                <?php if(! empty( $movie->quality )): ?>
                    <span class="badge bg-dark-dm border-0 font-weight-semi-bold float-right">
                    <?= esc( $movie->quality ) ?>
                </span>
                <?php endif; ?>

            <?php else: ?>

                <?php if(! empty( $movie->imdb_rate )): ?>
                    <span class="badge badge-secondary border-0 font-weight-semi-bold float-right">
                    <?= $movie->imdb_rate ?>
                </span>
                <?php endif; ?>

            <?php endif; ?>

        </div>
        <div class="bottom">
            <?php if(! empty( $movie->duration )): ?>
                <span class="badge bg-dark-dm border-0">
                    <?= $movie->duration ?> <?= lang('General.min') ?>
                </span>
            <?php else: ?>
                <span></span>
            <?php endif; ?>
            <?php if(is_movie_viewed( $movie->imdb_id )): ?>
            <span class="badge bg-dark-dm border-0 float-right">
                <i class="fa fa-eye text-primary" aria-hidden="true"></i>
            </span>
            <?php endif; ?>
        </div>

    </div>
    <div class="back">
        <p class="title mt-0"> <?= esc( $movie->title ) ?> <?php if(! empty( $movie->year )) echo ' - ' . $movie->year; ?> </p>
        <div class="btn-list">
            <a href="<?= esc( $movie->getViewLink() ) ?>" class="btn btn-lg btn-square">
                <i class="fa fa-play" aria-hidden="true"></i>
            </a>
            <?php if( is_download_enabled() ): ?>
            <a href="<?= esc( $movie->getDownloadLink( true ) ) ?>" class="btn btn-lg btn-square">
                <i class="fa fa-download" aria-hidden="true"></i>
            </a>
            <?php endif; ?>
            <a href="javascript:void(0)"  data-toggle="modal" data-target="embed-links-modal" class="btn btn-lg btn-square show-embed-codes">
                <i class="fa fa-code" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <span class="embed--link--1 d-none" ><?= esc( $movie->getEmbedLink(true) ) ?></span>
    <span class="embed--link--2 d-none" ><?= esc( $movie->getEmbedLink() ) ?></span>
</div>