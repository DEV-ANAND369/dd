<?= $this->extend(theme_path("user/__layout/base")) ?>

<?= $this->section("content") ?>

<!-- Page title content-->
<div class="content d-flex align-items-center justify-content-between">
    <h3 class="content-title ">
        <?= esc( $title ) ?>
    </h3>
    <div>
        <button type="button" class="btn btn-primary font-weight-semi-bold" data-toggle="modal" data-target="add-links-by-imdb-id-modal">
            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
            <?= lang("User/Dashboard.add_links") ?>
        </button>
    </div>
</div>
<!-- /. Page title content-->

<?= display_alerts() ?>

<!-- row -->
<div class="row row-eq-spacing">

    <!-- col-6 col-lg-6-->
    <div class="col-6 col-lg-3">
        <div class="card p-15">
            <h2 class="card-title text-muted font-size-18 mb-5">
                <?= lang("User/Dashboard.earned_stars") ?>
            </h2>
            <h4 class="font-weight-semi-bold text-secondary my-0">
                <?= nf($analytics["earnings"]["credited"] ?? 0) ?>
            </h4>
        </div>
    </div>
    <!-- /. col-6 col-lg-6-->

    <!-- col-6 col-lg-6-->
    <div class="col-6 col-lg-3">
        <div class="card p-15">
            <h2 class="card-title text-muted font-size-18 mb-5">
                <?= lang("User/Dashboard.active_stars") ?>
            </h2>
            <h4 class="font-weight-semi-bold text-primary my-0">
                <?= nf(current_user()->getActiveStars()) ?>
            </h4>


        </div>
    </div>
    <!-- /. col-6 col-lg-6-->

    <!-- col-6 col-lg-6-->
    <div class="col-6 col-lg-3">
        <div class="card p-15">
            <h2 class="card-title text-muted font-size-18 mb-5">
                <?= lang("User/Dashboard.pending_stars") ?>
            </h2>
            <h4 class="font-weight-semi-bold text-danger my-0">
                <?= nf($analytics["earnings"]["pending"] ?? 0) ?>
            </h4>
        </div>
    </div>
    <!-- /. col-6 col-lg-6-->

    <!-- col-6 col-lg-6-->
    <div class="col-6 col-lg-3">
        <div class="card p-15">
            <h2 class="card-title text-muted font-size-18 mb-5">
                <?= lang("User/Dashboard.reliability") ?>
            </h2>
            <h4 class="font-weight-semi-bold  my-0">
                <?= display_reliability_val($analytics["reliability"] ?? 0) ?>
                <small class="text-muted">% </small> </h4>
        </div>
    </div>
    <!-- /. col-6 col-lg-6-->

</div>
<!-- /. row -->

<?php if (!empty($recommendMovies)): ?>

    <div class="content">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="content-title font-size-18">
                <?= lang("User/Dashboard.recommended_movies") ?>
                <span class="text-muted">
                <?= lang("User/Dashboard.to_add_links") ?>
            </span>
            </h2>
            <a href="<?= site_url("/user/recommend/movies") ?>" class="btn">
                <?= lang("User/Dashboard.view_all_btn") ?>
            </a>
        </div>

        <?php the_theme_table_list($recommendMovies, true, false); ?>

    </div>

<?php endif; ?>

<?php if (!empty($recommendSeries)): ?>

    <div class="content">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="content-title font-size-18">
                <?= lang("User/Dashboard.complete_these_tv_shows") ?>
            </h2>
            <a href="<?= site_url("/user/recommend/series") ?>" class="btn">
                <?= lang("User/Dashboard.view_all_btn") ?>
            </a>
        </div>

        <?php the_theme_table_list($recommendSeries, false, false); ?>

    </div>

<?php endif; ?>

<?= $this->endSection() ?>
