<?= $this->extend( theme_path('__layout/base') ) ?>

<?= $this->section("content") ?>

<div class="container-fluid mb-20">

    <!-- row -->
    <div class="row">

        <!-- col-md-7 col-xl-6 -->
        <div class="col-md-7  col-xl-6 mx-auto">

            <!-- Server dest card -->
            <div class="card">
                <h3 class="font-weight-semi-bold content-title text-center mt-0 ">
                   <?= esc( $title ) ?>
                </h3>

                <?= display_alerts('mx-0') ?>

                <?= form_open('/register/create') ?>

                    <div class="form-group">
                        <?= form_label(lang("Register.username"), '', ['class'=>'required']) ?>
                        <?= form_input([
                                'name' => 'username',
                                'class' => 'form-control form-control-lg',
                                'value' => old('username')
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= form_label(lang("Register.email"), '', ['class'=>'required']) ?>
                        <?= form_input([
                            'type' => 'email',
                            'name' => 'email',
                            'class' => 'form-control form-control-lg',
                            'value' => old('email')
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= form_label(lang("Register.password"), '', ['class'=>'required']) ?>
                        <?= form_password([
                            'name' => 'password',
                            'class' => 'form-control form-control-lg'
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= form_label(lang("Register.confirm_password"), '', ['class'=>'required']) ?>
                        <?= form_password([
                            'name' => 'confirm_password',
                            'class' => 'form-control form-control-lg'
                        ]) ?>
                    </div>


                <div class="g-recaptcha d-none" data-sitekey="<?= esc( get_config('gcaptcha_site_key') ) ?>"
                     data-badge="bottomright" data-size="invisible" data-callback="setCaptchaResponse"></div>

                <?= form_hidden('gcaptcha') ?>

                <!-- CSRF -->
                <?= csrf_field() ?>
                <!-- /. CSRF -->

                <div>
                    <p>
                        By signing up you confirm that you agree with the our
                        <a href="#">terms and conditions</a>
                    </p>
                </div>



                 <input class="btn btn-lg btn-primary btn-block" type="submit" value="<?= lang("Register.register_btn") ?>">

                <?= form_close() ?>

                <div class="mt-15 text-center">
                    <a href="<?= site_url('/login') ?>">
                        <?= lang("Register.login") ?>
                    </a>
                </div>

            </div>
            <!-- /. Server dest card -->




        </div>
        <!-- /. col-md-7 col-xl-6 -->
    </div>
    <!-- /. row -->
</div>
<!-- /. container-fluid -->

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>

<?php if( is_register_gcaptcha_enabled() ): ?>

    <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback' async defer></script>

    <script>
        window.onloadCallback = function() {
            grecaptcha.execute();
        };

        function setCaptchaResponse(response) {
            $('input[name="gcaptcha"]').val( response );
        }
    </script>

<?php endif; ?>

<?= $this->endSection() ?>