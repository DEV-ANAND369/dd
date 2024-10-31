<div class="x_panel">
    <div class="x_content">
        <div class="form-group row">
            <label class="control-label col-md-3">Username: </label>
            <div class="col-md-9">
                <?= form_input([
                    'type' => 'text',
                    'name' => 'username',
                    'class' => 'form-control',
                    'value' => old('username', $user->username)
                ]) ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">Email: </label>
            <div class="col-md-9">
                <?= form_input([
                    'type' => 'email',
                    'name' => 'email',
                    'class' => 'form-control',
                    'value' => old('email', $user->email)
                ]) ?>
            </div>
        </div>



    </div>
</div>

<?php if(! empty($user->id)): ?>
<div class="x_panel">
    <div class="x_content text-center">
        <a href="<?= admin_url('/statistics/referrals?user=' . $user->id) ?>" class="mr-3">
            <i class="fa fa-users"></i>&nbsp;
            View referrals
        </a>
        <a href="<?= admin_url('/statistics/earnings?user=' . $user->id) ?>" class="mr-3">
            <i class="fa fa-dollar"></i>&nbsp;
            View earnings
        </a>
        <a href="<?= admin_url('/users/links/stream?user=' . $user->id) ?>" class="mr-3">
            <i class="fa fa-link"></i>&nbsp;
            View links
        </a>
        <a href="<?= admin_url('/stars-log?user=' . $user->id) ?>" >
            <i class="fa fa-list"></i>&nbsp;
            View stars log
        </a>
    </div>
</div>


<?php endif; ?>


