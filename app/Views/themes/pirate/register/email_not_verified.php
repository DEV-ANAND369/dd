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

                    <span class="email-icon-wrap email-icon-wrap-red">
                     <img src="<?= theme_assets('/images/icons/svg/email_red.svg') ?>" width="60" alt="play-btn">
                </span>


                    <p class="font-size-16">
                        We are unable to verify <br> your email with this verification link.
                    </p>
                </div>

            </div>





            <div class="content mt-0">
                <p class="text-muted font-size-12">
                    If you think this is not correct or something went wrong, <a href="#">contact us</a> for support.
                </p>
            </div>






        </div>
        <!-- /. col-md-7 col-xl-6 -->
    </div>
    <!-- /. row -->
</div>
<!-- /. container-fluid -->

<?= $this->endSection() ?>
