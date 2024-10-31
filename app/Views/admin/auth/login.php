<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?= esc( $title ?? '' ) ?> - <?= esc( site_name() ) ?> </title>
    <!-- Bootstrap -->
    <link href="<?= site_url('/admin-assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= site_url('/admin-assets/css/custom.css') ?>" rel="stylesheet">
</head>


<body class="login">

<div>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">



                <?= form_open('/admin_login', ['method'=>'post']) ?>

                    <h1>Admin Login</h1>

                <?php if(session()->has('error')): ?>
                <div class="alert alert-danger">
                    <span> <?= esc( session()->get('error') ) ?> </span>
                </div>
                <?php endif; ?>

                    <div>
                        <?= form_input([
                                'name' => 'username',
                                'class' => 'form-control',
                                'placeholder' => 'Username',
                                'required' => 'required'
                        ]) ?>
                    </div>
                    <div>
                        <?= form_password([
                            'name' => 'password',
                            'class' => 'form-control',
                            'placeholder' => 'Password',
                            'required' => 'required'
                        ]) ?>
                    </div>
                    <div>
                        <?= form_button([
                                'class' => 'btn btn-secondary btn-block',
                                'type' => 'submit'
                        ], 'Login') ?>
                    </div>

                <?= form_close() ?>
            </section>
        </div>


    </div>
</div>

</body>

</html>
