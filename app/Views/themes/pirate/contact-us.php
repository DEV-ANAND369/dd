<?= $this->extend( theme_path('__layout/base') ) ?>



<?= $this->section("content") ?>

<div class="container-fluid">



    <div class="content mt-15">

        <div class="row">
            <div class="col-lg-7 mx-auto ">

                <div class="card">

                    <h1 class="font-weight-semi-bold content-title text-center mt-0 ">
                        <?= esc( $title ) ?>
                    </h1>

                    <?= display_alerts('mx-0') ?>

                    <?= form_open('/contact-us/submit') ?>

                    <?php if(! empty($customTxt)): ?>
                        <div class="mb-3">
                            <?= $customTxt ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label class="required">Your Name</label>
                        <input type="text" name="name" value="<?= old('name') ?>" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-group">
                        <label class="required">Your Email Address</label>
                        <input type="email" name="email" value="<?= old('email') ?>" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-group">
                        <label class="required">Your Message</label>
                        <textarea name="message" class="form-control form-control-lg" required><?= old('message') ?></textarea>
                    </div>

                    <div class="g-recaptcha d-none" data-sitekey="<?= esc( get_config('gcaptcha_site_key') ) ?>"
                         data-badge="bottomright" data-size="invisible" data-callback="setCaptchaResponse"></div>

                    <?= form_hidden('gcaptcha') ?>

                    <?= csrf_field() ?>

                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                        <i class="fa fa-send"></i>&nbsp;
                        Send Message
                    </button>

                    <?= form_close() ?>

                </div>

            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>

<?php if( is_contact_gcaptcha_enabled() ): ?>

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
