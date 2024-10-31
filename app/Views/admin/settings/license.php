<?php $this->extend( 'admin/__layout/default' ) ?>


<?php $this->section('content') ?>

    <?php if($status == 'not_confirmed'): ?>
    <div class="alert alert-info font-weight-bold">
        License revoked by HauN! | Visit: HNSMM.NET
    </div>
    <?php endif; ?>

    <?php if($status == 'active'): ?>
        <div class="alert alert-success font-weight-bold">
            Your license is already activated!
        </div>
    <?php endif; ?>

    <?php if(_pq()): ?>
        <div class="alert alert-danger font-weight-bold">
            License confirmation is not required!
        </div>
    <?php endif; ?>

<div class="row">
    <div class="col-lg-9">


        <div class="x_panel">
            <div class="x_content">
                <p>
                    It is not necessary to have a valid license to use this modified VIPEmbed script.
                </p>
                <ul class="">
                    <li class="mb-3 ">If you have received this script from another user, we recommend that you fill in these activation forms. <a href="https://forms.gle/ZYVhmSxgg34N4khB9"><span style="color: #ff0000;"><strong>Click Here</strong></span></a>
                    </li>
                    <li class="mb-3">
                        This license is for life, make the most of it!
                    </li>
                    <li class="mb-3 ">Share and use only in a personal way, commercial use without the realtor's consent is a crime.</li>
                    <li >Do not resell this script to third parties, however you are free to make changes to the script as you see fit!</li>

                </ul>

                <p>Hope you read the clarification above! Enjoy!</p>
            </div>
        </div>

    </div>
    <div class="col-lg-3">
        <div class="x_panel">
            <div class="x_content font-weight-bold">
                License:
                <span class=" float-right">
                    <?php if($status == 'confirmed'){
                        echo '<span class="text-success "> Your license has been confirmed by HauN! </span>';
                    }elseif($status == 'active'){
                        if(get_config('license_type') == 'extended'){
                            echo '<span class="text-info"> Extended </span>';
                        }else{
                            echo '<span class="text-success"> Regular </span>';
                        }
                    }elseif($status){
                        echo '<span class="text-success"> Your license has been validated by HauN! </span>';
                    } ?>
                </span>

            </div>

        </div>
<?php if($status != 'active') : ?>
        <div class="x_panel">
            <div class="x_content">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-license-modal" class="btn btn-sm btn-block btn-warning font-weight-bold text-dark">Confirm License</a>
            </div>
        </div>
<?php endif; ?>
    </div>
</div>

<?php if($status != 'active') : ?>
    <div class="modal fade" id="confirm-license-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <?= form_open() ?>

                <div class="modal-header">
                    <h4 class="modal-title" >License Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>License not required!</label>
                        <input type="text" disabled value="Nulled by HauN | HNSMM.NET" id="license" class="form-control title-suggest" data-type="movie">
                        <span class="form-text">Visit Telegram HauN! <a href="https://t.me/haunytb" target="_blank">haunytb</a> </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirm-license" onclick="confirmLicense()">Confirm it</button>
                </div>

                <?= form_close() ?>

            </div>
        </div>
    </div>

<?php endif; ?>

<?php $this->endSection() ?>