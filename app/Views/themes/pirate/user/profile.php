<?= $this->extend( theme_path('user/__layout/base') ) ?>

<?= $this->section("content") ?>

<div class="content">
    <h3 class="content-title ">
        <?= esc( $title ) ?>
    </h3>
</div>

<?= display_alerts() ?>

<div class="row">
    <div class="col-lg-8">

        <div class="card p-0 mt-0">

            <!-- Content -->
            <div class="content">

                <?= form_open('/user/profile/update', ['class'=>'form-inline']) ?>
                <div class="form-group">
                    <label class="w-250">Username : </label>
                    <?= form_input([
                        'class' => 'form-control',
                        'value' => current_user()->username,
                        'name'  => 'username',
                        'required' => 'required'
                    ]) ?>
                </div>
                <div class="form-group">
                    <label class="w-250">Email Address : </label>
                    <?= form_input([
                            'type' => 'email',
                            'class' => 'form-control',
                            'value' => current_user()->email,
                            'disabled' => 'disabled'
                    ]) ?>
                </div>

                <div class="form-group mb-0"> <!-- mb-0 = margin-bottom: 0 -->
                    <input type="submit" class="btn btn-primary ml-auto" value="Update"> <!-- ml-auto = margin-left: auto -->
                </div>

                <?= form_close() ?>
            </div>

        </div>
        <div class="card p-0">
            <!-- Card header -->
            <div class="px-card py-10 border-bottom">
                <h2 class="card-title font-size-18 m-0">
                    Change Password
                </h2>
            </div>
            <!-- Content -->
            <div class="content">

                <?= form_open('/user/profile/update', ['class'=>'form-inline']) ?>
                <div class="form-group">
                    <label class="w-250">Enter Old Password : </label>
                    <?= form_password([
                            'class' => 'form-control',
                            'name'  => 'old_passwd'
                    ]) ?>
                </div>
                <div class="form-group">
                    <label class="w-250">Enter New Password : </label>
                    <?= form_password([
                        'class' => 'form-control',
                        'name'  => 'new_passwd'
                    ]) ?>
                </div>
                <div class="form-group">
                    <label class="w-250" >Confirm Password : </label>
                    <?= form_password([
                        'class' => 'form-control',
                        'name'  => 'confirm_passwd'
                    ]) ?>
                </div>


                <div class="form-group mb-0">
                    <input type="submit" class="btn btn-primary ml-auto" value="Change passwd"> <!-- ml-auto = margin-left: auto -->
                </div>

                <?= form_close() ?>
            </div>

        </div>

        <?php if(get_config('is_2fa_login')): ?>
        <div class="card p-0"> <!-- p-0 = padding: 0 -->
            <!-- Card header -->
            <div class="px-card py-10 border-bottom"> <!-- py-10 = padding-top: 1rem (10px) and padding-bottom: 1rem (10px), border-bottom: adds a border on the bottom -->
                <h2 class="card-title font-size-18 m-0"> <!-- font-size-18 = font-size: 1.8rem (18px), m-0 = margin: 0 -->
                Security
                </h2>
            </div>
            <!-- Content -->
            <div class="content">

                <?= form_open('/user/profile/update', ['class'=>'form-inline']) ?>
                <div class="form-group">
                    <label class="w-250">2fa Authentication : </label>
                    <div class="custom-checkbox">
                        <?= form_checkbox([
                                'id' => '2fa',
                                'name' => '2fa',
                                'checked' => current_user()->is2FaLoginEnabled()
                        ]) ?>
                        <label for="2fa">Enable/ Disable</label>
                    </div>
                    <span class="text-muted mt-5">To help keep your account secure, we'll ask you to submit a code when using a new device to log in. We'll send the code via email.</span>
                </div>



                <div class="form-group mb-0"> <!-- mb-0 = margin-bottom: 0 -->
                    <input type="submit" class="btn btn-primary ml-auto" value="Update"> <!-- ml-auto = margin-left: auto -->
                </div>

                <?= form_close() ?>
            </div>

        </div>
        <?php endif; ?>


    </div>
</div>

<?= $this->endSection() ?>
