<?php $this->extend( 'admin/__layout/default' ) ?>


<?php $this->section('content') ?>

<div class="row">
    <div class="col-lg-9">

        <?= form_open('/admin/settings/users/update', [ 'method' => 'post', 'class' => 'form-horizontal form-label-left' ] ) ?>

        <div class="x_panel">
            <div class="x_title">
                <h2>General</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="form-group row">
                    <label class="control-label col-md-3 pt-0">Users system</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label class="mb-0">
                                <?= form_checkbox('users_system','1', get_config('users_system')) ?>
                                Enable/ Disable
                            </label>
                        </div>
                        <small>When you enabled the users system, then users are able to add login or register to the site and join to the rewards program</small>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="control-label col-md-3 pt-0">Email verification</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label class="mb-0">
                                <?= form_checkbox('user_email_verification','1', get_config('user_email_verification')) ?>
                                Enable/ Disable
                            </label>
                        </div>
                        <small>Users are required to verify their email address after registration</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3 pt-0">Admin approval</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label class="mb-0">
                                <?= form_checkbox('user_admin_approval','1', get_config('user_admin_approval')) ?>
                                Enable/ Disable
                            </label>
                        </div>
                        <small>users can not log in to the system until the admin approves their registration</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3 pt-0">2FA login</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label class="mb-0">
                                <?= form_checkbox('is_2fa_login','1', get_config('is_2fa_login')) ?>
                                Enable/ Disable
                            </label>
                        </div>
                        <small>Two-Factor Authentication (2FA) can be used to help protect users' accounts from unauthorized access by requiring you to enter an additional code</small>
                        <br>
                        <small>
                            <span class="text-danger">Note: </span>
                            if you enabled 2fa login also you should set up a system email address
                        </small>
                    </div>
                </div>





            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Rewards Program</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">



                <div class="form-group row">
                    <label class="control-label col-md-3 pt-0">Ref. Rewards system</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label class="mb-0">
                                <?= form_checkbox('ref_rewards_system','1', get_config('ref_rewards_system')) ?>
                                Enable/ Disable
                            </label>
                        </div>
                        <small>Enable/ disable referrals rewards program (pay per view)</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3">Max stream links for a movie per user</label>
                    <div class="col-md-9">
                        <?= form_input([
                            'type' => 'number',
                            'name' => 'max_steaming_links_per_user',
                            'class' => 'form-control',
                            'placeholder' => '1',
                            'min' => 1,
                            'value' => get_config('max_steaming_links_per_user')
                        ]) ?>
                        <small>Num of maximum stream links allowed to add per movie per user </small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3">Max direct dl links for a movie per user</label>
                    <div class="col-md-9">
                        <?= form_input([
                            'type' => 'number',
                            'name' => 'max_download_links_per_user',
                            'class' => 'form-control',
                            'placeholder' => '1',
                            'min' => 1,
                            'value' => get_config('max_download_links_per_user')
                        ]) ?>
                        <small>Num of maximum direct download links allowed to add per movie per user </small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3">Max torrent dl links for a movie per user</label>
                    <div class="col-md-9">
                        <?= form_input([
                            'type' => 'number',
                            'name' => 'max_torrent_links_per_user',
                            'class' => 'form-control',
                            'placeholder' => '1',
                            'min' => 1,
                            'value' => get_config('max_torrent_links_per_user')
                        ]) ?>
                        <small>Num of maximum torrent download links allowed to add per movie per user </small>
                    </div>
                </div>


            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Payouts</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="form-group row">
                    <label class="control-label col-md-3">Value of a star <br> (in real money)</label>
                    <div class="col-md-9">
                        <?= form_input([
                            'type' => 'text',
                            'name' => 'stars_exchange_rate',
                            'class' => 'form-control',
                            'placeholder' => '0.001',
                            'value' => get_config('stars_exchange_rate')
                        ]) ?>
                        <small>Set stars exchange rate per star  </small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3">Minimum stars for redeem</label>
                    <div class="col-md-9">
                        <?= form_input([
                            'type' => 'number',
                            'name' => 'min_payout_stars',
                            'class' => 'form-control',
                            'min'   => 0,
                            'value' => get_config('min_payout_stars')
                        ]) ?>
                        <small>Set minimum stars for a payout request </small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3">Payments methods</label>
                    <div class="col-md-9">
                        <?= form_textarea([
                            'name' => 'payment_methods_for_payouts',
                            'class' => 'form-control',
                            'rows' => 3,
                            'placeholder' => 'paypal, bitcoin'
                        ], implode(', ', get_payout_payment_methods())) ?>
                        <small>Set supported payment methods for redeem stars ( payouts )</small> <br>
                        <small> <span class="text-danger">Note: </span> separate each payment method by comma  </small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-md-3">Note about payout date</label>
                    <div class="col-md-9">
                        <?= form_textarea([
                            'name' => 'note_about_payout_date',
                            'class' => 'form-control',
                            'rows' => 4,
                            'placeholder' => 'Most payments will be processed in five business day or less'
                        ], get_config('note_about_payout_date')) ?>
                        <small>Add small note about the payout date for users </small> <br>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-right">
            <?= form_button([
                'type' => 'submit',
                'class' => 'btn btn-primary'
            ], 'update') ?>
        </div>

        <?= form_close() ?>

    </div>
</div>

<?php $this->endSection() ?>
