<?= $this->extend( theme_path('__layout/base') ) ?>



<?= $this->section("content") ?>

<div class="container">

    <div class="row align-items-center">
        <div class="col-auto mx-auto">
            <div class="content mx-15 mt-20 mb-0">
                <h1 class="content-title font-size-36 mb-0 ">
                    <?= esc( $title ) ?>
                </h1>
            </div>
        </div>
    </div>

    <div class="content mt-15">

        <?php if(! empty( $customTxt )): ?>

        <div class="content mx-0">

            <?= $customTxt ?>

        </div>

        <?php endif; ?>

        <div class="card mx-0">
            <h3 class="content-title">
                <?= lang( 'EarnMoney.general_activities_card_title' ) ?>
            </h3>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th> <?= lang( 'EarnMoney.earning_method' ) ?> </th>
                        <th class="text-center"> <?= lang( 'EarnMoney.stars' ) ?> </th>
                        <th class="text-center">
                            <?= lang( 'EarnMoney.value' ) ?>
                            (in <?= esc( get_currency_code() ) ?>)</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($generalRewards as $reward) : ?>
                    <tr>
                        <td> <?= esc( $reward['description'] ) ?> </td>
                        <td class="text-center"> <?= nf( $reward['stars'] ) ?> </td>
                        <td class="text-center"> <?= stars_exchange( $reward['stars'] ) ?> </td>
                    </tr>
                    <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>

        <?php if(! empty($referralRewards)): ?>

            <h3 class="content-title">
                Stars per View
            </h3>

        <div class="row row-eq-spacing align-items-start px-0">

            <?php foreach ($referralRewards as $reward) : ?>
            <div class="col-3">

                <div class="card p-0 mx-0 my-15 tier-card">

                    <div class="content mb-0">
                        <h2 class="content-title"> <?= esc( $reward->name ) ?> </h2>

                        <div class="bg-primary text-white px-15 py-5 rounded mx-auto text-center mb-15">
                            <h3 class="font-size-22 m-0 d-inline-block">
                                <span class="font-weight-semi-bold "> <?= nf( $reward->stars_per_view ) ?> </span>
                                <?= format_stars_txt( $reward->stars_per_view ) ?>
                            </h3>
                            / <?= lang( 'EarnMoney.per_view' ) ?> <br>
                            ( <?= stars_exchange($reward->stars_per_view, true)  ?> )

                        </div>
                        <div class="my-15 overflow-hidden"> </div>

                        <div>
                            <?php if(! empty($reward->countries)): ?>
                            <ul class="mt-15">
                                <?php foreach ($reward->countries as $cc) {
                                    echo '<li>'. get_country_by_code( $cc ) .'</li>';
                                } ?>
                            </ul>
                            <?php endif; ?>

                        </div>


                    </div>



                </div>

            </div>
            <?php endforeach; ?>

        </div>

        <?php endif; ?>

        <?php if(! empty(get_config('default_ref_reward'))): ?>

        <h5>
            <?= sprintf(lang('EarnMoney.note_for_default_reward'),
                get_config('default_ref_reward') . ' '  .format_stars_txt(get_config('default_ref_reward')) ) ?>
        </h5>
<?php endif; ?>


    </div>

</div>

<?= $this->endSection() ?>
