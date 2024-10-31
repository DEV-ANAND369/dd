<?= $this->extend( theme_path('user/__layout/base') ) ?>

<?= $this->section("content") ?>

<div class="content d-flex align-items-center justify-content-between">
    <h3 class="content-title "> <?= esc( $title ) ?> - (<span class="text-muted"> <?= count( $movies ) ?> </span>) </h3>

    <div class="tabs p-5 bg-dark-light font-weight-semi-bold mr-0">
        <a href="<?= site_url('/user/my-movies') ?>" class="d-inline-block <?= $isMovie  ? 'btn' : 'nav-link' ?>" >
            <i class="fa fa-film" aria-hidden="true"></i>&nbsp;
            <?= lang('General.movies') ?>
        </a>
        <a href="<?= site_url('/user/my-shows') ?>" class="d-inline-block <?= ! $isMovie ? 'btn' : 'nav-link' ?>" >
            <i class="fa fa-television" aria-hidden="true"></i>&nbsp;
            <?= lang('General.tv_shows') ?>
        </a>
    </div>


</div>

<div class="content">

    <?php the_theme_table_list($movies, $isMovie) ?>

</div>

<?= $this->endSection() ?>




