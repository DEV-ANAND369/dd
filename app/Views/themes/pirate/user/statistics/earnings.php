<?=$this->extend(theme_path('user/__layout/base')) ?>

<?=$this->section("content") ?>

<div class="content">
    <h3 class="content-title "> <?=esc($title) ?> </h3>
</div>


<div class="row row-eq-spacing">

    <div class="col-6 col-lg-3 mb-15">
        <div class="card p-15">
            <h4 class="font-weight-semi-bold text-secondary my-0">
                <?=number_format($earnings['credited']) ?>
            </h4>
            <p class=" text-muted font-size-14  mt-5 mb-0">
                <?=lang("User/EarningsStats.earned_stars") ?>
            </p>
        </div>
    </div>


    <div class="col-6 col-lg-3 mb-15">
        <div class="card p-15">
            <h4 class="font-weight-semi-bold text-success my-0">
                <?=number_format($earnings['active']) ?>
            </h4>
            <p class=" text-muted font-size-14  mt-5 mb-0">
                <?=lang("User/EarningsStats.active_stars") ?>
            </p>

            <a href="<?=site_url('/user/earnings') ?>" class="badge position-absolute top-0 right-0 m-5">
                <i class="fa fa-money" aria-hidden="true"></i>&nbsp;
                Redeem
            </a>
        </div>
    </div>

    <div class="col-6 col-lg-3 mb-15">
        <div class="card p-15">
            <h4 class="font-weight-semi-bold my-0">
                <?=number_format($earnings['redeemed']) ?>
            </h4>
            <p class=" text-muted font-size-14  mt-5 mb-0">
                <?=lang("User/EarningsStats.redeemed_stars") ?>
            </p>
        </div>
    </div>

    <div class="col-6 col-lg-3 mb-15">
        <div class="card p-15">
            <h4 class="font-weight-semi-bold text-danger my-0">
                <?=number_format($earnings['pending']) ?>
            </h4>
            <p class=" text-muted font-size-14  mt-5 mb-0">
                <?=lang("User/EarningsStats.pending_redeem") ?>
            </p>
        </div>
    </div>



</div>

<div class="card">

    <div class="d-flex align-items-center justify-content-between">
        <h3 class="card-title font-size-18">
            <?=lang("User/EarningsStats.monthly_earnings") ?>
        </h3>
        <div class="d-flex align-items-center justify-content-between">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="datetimepicker-wrap">
                    <input type="text" class="form-control w-150" id="earnings-by-monthly-datetime-picker">
                </div>
            </div>

        </div>
    </div>

    <div id="line-chart-earnings-by-monthly"></div>
</div>

<div class="card">

    <h3 class="card-title font-size-18">
        <?=lang("User/EarningsStats.earnings_summary") ?>
    </h3>

    <table class="table">
        <thead>
        <tr>
            <th>Stars Type</th>
            <th class="text-center text-success">Earned Stars</th>
            <th class="text-center text-danger">Lost Stars</th>
            <th class="text-center text-secondary">Pending Stars</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($earningsSummary as $type => $earn): ?>

            <tr>
                <td class="text-muted"> <?=clean_undscr_txt($type) ?> </td>
                <td class="text-center font-weight-semi-bold"> <?=number_format($earn['credited']) ?> </td>
                <td class="text-center font-weight-semi-bold"> <?=number_format($earn['rejected']) ?> </td>
                <td class="text-center font-weight-semi-bold"> <?=number_format($earn['pending']) ?> </td>

            </tr>

        <?php
        endforeach; ?>

        </tbody>
    </table>
</div>






<?=$this->endSection() ?>


<?=$this->section("head") ?>

<link href="<?=theme_assets('/vendors/apexcharts/apexcharts.css') ?>" rel="stylesheet" />
<link href="<?=theme_assets('/vendors/daterangepicker/daterangepicker.css') ?>" rel="stylesheet" />

<?=$this->endSection() ?>

<?php $this->section('scripts'); ?>

<script type="text/javascript"  src="<?=theme_assets('/vendors/apexcharts/apexcharts.min.js') ?>"></script>
<script type="text/javascript"  src="<?=theme_assets('/vendors/daterangepicker/moment.min.js') ?>"></script>
<script type="text/javascript"  src="<?=theme_assets('/vendors/daterangepicker/daterangepicker.js') ?>"></script>


<script type="text/javascript"  src="<?=theme_assets('/js/charts.js') ?>"></script>
<script type="text/javascript"  src="<?=theme_assets('/js/analytics.js') ?>"></script>


<script>

    jQuery(document).ready(function() {

        Analytics.earnByMonthly.init();

    });


</script>

<?php $this->endSection(); ?>
