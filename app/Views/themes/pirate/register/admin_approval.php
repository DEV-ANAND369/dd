<?= $this->extend( theme_path('__layout/base') ) ?>

<?= $this->section("content") ?>

<div class="container-fluid mb-20">

    <!-- row -->
    <div class="row">

        <!-- col-md-7 col-xl-6 -->
        <div class="col-md-7 col-xl-6 mx-auto">

            <!-- Server dest card -->
            <div class="card text-center mb-5 p-0">

                <div class="content">
                    <h3 class="font-weight-semi-bold content-title mt-0">
                    <?= esc( $title ) ?>
                    </h3>

                    <span class="email-icon-wrap">
                     <img src="<?= theme_assets('/images/icons/svg/time-left_blue.svg') ?>" width="60" alt="play-btn">
                </span>


                    <p class="font-size-16">
                       Your account is waiting for our <br> administrator approval. Please check back later.
                    </p>
                </div>

                <div class="px-card py-15 bg-light-lm bg-very-dark-dm rounded-bottom"> <!-- py-10 = padding-top: 1rem (10px) and padding-bottom: 1rem (10px), bg-light-lm = background-color: var(--gray-color-light) only in light mode, bg-very-dark-dm = background-color: var(--dark-color-dark) only in dark mode, rounded-bottom = rounded corners on the bottom -->
                    <a href="<?= site_url('/home') ?>" class="font-weight-semi-bold">Back to home</a>
                </div>

            </div>








        </div>
        <!-- /. col-md-7 col-xl-6 -->
    </div>
    <!-- /. row -->
</div>
<!-- /. container-fluid -->

<?= $this->endSection() ?>
