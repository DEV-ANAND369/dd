<?=$this->extend(theme_path('user/__layout/base')) ?>

<?=$this->section("content") ?>

<div class="content">
    <h3 class="content-title "> <?=esc($title) ?> </h3>
</div>



<div class="card">
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="card-title font-size-18">
            <?=lang("User/RefStats.monthly_referrals") ?>
        </h3>
        <div class="d-flex align-items-center justify-content-between">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="datetimepicker-wrap">
                    <input type="text" class="form-control w-150" id="referrals-by-monthly-datetime-picker">
                </div>
            </div>

        </div>
    </div>
    <div id="line-chart-referrals-by-monthly"></div>
</div>

<div class="card">

    <div class="d-flex align-items-center justify-content-between">
        <h3 class="card-title font-size-18">
            <?=lang("User/RefStats.referrals_countries") ?>
        </h3>
        <div class="d-flex align-items-center justify-content-between">
            <div class="ref-datetimepicker-wrap">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                    </div>

                    <input type="text" class="form-control w-150" id="referrals-by-countries-datetime-picker">

                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-preloader">
            <div class="card-preloader-inner">
                <div class="spinner-border spinner-border-xl" role="status"></div>
            </div>
        </div>
        <div id="map-referrals-by-countries"  class="w-full h-500"></div>
    </div>

</div>

<?php if (!empty($topRefByCountries)): ?>

    <div class="card">
        <h3 class="card-title font-size-18">
            <?=lang("User/RefStats.top_referrals_countries") ?>
        </h3>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Country</th>
                <th class="text-center text-danger">Unique referrals </th>
                <th class="text-center text-primary">Total referrals</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($topRefByCountries as $k => $ref): ?>

                <tr>
                    <td class="text-muted"> #<?=$k + 1 ?> </td>
                    <td class="text-muted"> <?=$ref['country_name'] ?> </td>
                    <td class="text-center font-weight-semi-bold"> <?=number_format($ref['uniqVisits']) ?> </td>
                    <td class="text-center font-weight-semi-bold"> <?=number_format($ref['totalVisits']) ?> </td>
                </tr>

            <?php
            endforeach; ?>

            </tbody>
        </table>

    </div>

<?php
endif; ?>


<?=$this->endSection() ?>


<?=$this->section("head") ?>

<link href="<?=theme_assets('/vendors/apexcharts/apexcharts.css') ?>" rel="stylesheet" />
<link href="<?=theme_assets('/vendors/jqvmap/jqvmap.min.css') ?>" rel="stylesheet" />
<link href="<?=theme_assets('/vendors/daterangepicker/daterangepicker.css') ?>" rel="stylesheet" />

<?=$this->endSection() ?>

<?php $this->section('scripts'); ?>

<script type="text/javascript"  src="<?=theme_assets('/vendors/apexcharts/apexcharts.min.js') ?>"></script>
<script type="text/javascript"  src="<?=theme_assets('/vendors/daterangepicker/moment.min.js') ?>"></script>
<script type="text/javascript"  src="<?=theme_assets('/vendors/daterangepicker/daterangepicker.js') ?>"></script>

<script type="text/javascript"  src="<?=theme_assets('/vendors/jqvmap/jquery.vmap.min.js') ?>"></script>
<script type="text/javascript"  src="<?=theme_assets('/vendors/jqvmap/maps/jquery.vmap.world.js') ?>"></script>

<script type="text/javascript"  src="<?=theme_assets('/js/charts.js') ?>"></script>
<script type="text/javascript"  src="<?=theme_assets('/js/map.js') ?>"></script>
<script type="text/javascript"  src="<?=theme_assets('/js/analytics.js') ?>"></script>

<script>



    jQuery(document).ready(function() {

        Analytics.referralsByMonthly.init();
        Analytics.referralsByCountriesMap.init();

    });


</script>

<?php $this->endSection(); ?>
