
<?php


$page = 'license';
$pagesArray = array(
    'req',
    'license',
    'installation',
    'finish'
);
if (!empty($_GET['page'])) {
    if (in_array($_GET['page'], $pagesArray)) {
        $page = $_GET['page'];
    }
}



if(isset($_POST['install'])){

    $errors = [];

    $hostname = trim($_POST['sql_hostname']);
    $username = trim($_POST['sql_username']);
    $password = trim($_POST['sql_password']);
    $dbName = trim($_POST['sql_db_name']);
    $siteUrl = trim(trim($_POST['site_url']), '/');

    $conn = @mysqli_connect(
        $hostname,
        $username,
        $password,
        $dbName
    );

    if (mysqli_connect_errno()) {
        $errors[] = "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(!filter_var($siteUrl, FILTER_VALIDATE_URL)){
        $errors[] = "Invalid site URL";
    }

    if(empty($errors)){

        //attempt to select target database
        mysqli_select_db($conn, $dbName);

        $tempLine = '';
        $lines = file('./../database.sql');

        foreach ($lines as $line){
            if (substr($line, 0, 2) == '--' || $line == '') continue;
            $tempLine .= $line;
            if (substr(trim($line), -1, 1) == ';') {
                mysqli_query($conn, $tempLine) or die('Error performing query \'<strong>' .  mysqli_error($conn) . '\': ' . 1 . '<br /><br />');
                $tempLine = '';
            }
        }

        //write database details
        $file = file_get_contents('./../app/Config/Database.php');
        $file = str_replace("MYSQL_HOST", $hostname, $file);
        $file = str_replace("MYSQL_USER", $username, $file);
        $file = str_replace("MYSQL_PASS", $password, $file);
        $file = str_replace("MYSQL_DB", $dbName, $file);
        $fHandle = fopen('./../app/Config/Database.php', 'w');
        fwrite($fHandle, $file);
        fclose($fHandle);

        //write site url info
        $file = file_get_contents('./../app/Config/App.php');
        $file = str_replace("BASE_SITE_URL", $siteUrl, $file);
        $fHandle = fopen('./../app/Config/App.php', 'w');
        fwrite($fHandle, $file);
        fclose($fHandle);

        //write encryption key
        $file = file_get_contents('./../app/Config/Encryption.php');
        $file = str_replace("e7f5e2744c97fced29b8f54beb7d44797f1c82bf9c84e20a389cfe2fddda025f", createEncryptionKey(), $file);
        $fHandle = fopen('./../app/Config/Encryption.php', 'w');
        fwrite($fHandle, $file);
        fclose($fHandle);

        Header("Location: ?page=finish");
        exit;

    }


}




$reqFailed = false;

$cURL = true;
$php = true;
$mysqli = true;
$urlFOpen = true;
$sqlFile = true;
$intl = true;
$mbstring = true;

$dbConfigWritable = true;
$appConfigWritable = true;
$isHtaccess = true;

if (! version_compare(PHP_VERSION, '7.4.0', '>=')) {
    $php  = false;
    $reqFailed = true;
}

if (! function_exists('mysqli_connect')) {
    $mysqli = false;
    $reqFailed = true;
}

if (! function_exists('curl_init')) {
    $cURL = false;
    $reqFailed = true;
}

if (! is_writable('./../app/Config/Database.php')) {
    $dbConfigWritable = false;
    $reqFailed = true;
}

if (! is_writable('./../app/Config/App.php')) {
    $appConfigWritable = false;
    $reqFailed = true;
}


if (! file_exists('./.htaccess')) {
    $isHtaccess = false;
    $reqFailed = true;
}

if (! file_exists('./../database.sql')) {
    $sqlFile = false;
    $reqFailed = true;
}


if(! ini_get('allow_url_fopen')) {
    $urlFOpen = false;
    $reqFailed = true;
}

if (! extension_loaded('intl')) {
    $intl = false;
    $reqFailed = true;
}

if (! extension_loaded('mbstring')) {
    $mbstring = false;
    $reqFailed = true;
}




?>


















<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./../public/assets/cpanel/img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="./../public/assets/cpanel/img/favicon.ico" type="image/x-icon"/>
    <link href="./admin-assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./admin-assets/css/custom.min.css" rel="stylesheet"/>
    <title>VIP Embed | Installation </title>
    <style>

        body{
            line-height: 1.2;
        }

        .page{
            max-width: 768px;
            width: 100%;
            margin: 0 auto;
        }

        .fd-text{
            color: #6d7f70;
        }
        .fd-bg{
            background-color: #6d7f70;
        }
        h2{
            font-size: 24px;
        }
    </style>
</head>
<body>



<div class="page">

    <h2 class="text-uppercase text-center my-5">
        <span class="bg-light fd-text font-weight-bold">&nbsp;VIP&nbsp;</span><span class="fd-bg text-light font-weight-bold">&nbsp;Embed&nbsp;</span>
        Installation
    </h2>
    <?php if($page == 'license'): ?>

    <div class="x_panel">
        <div class="x_title">
            <h2>LICENSE AGREEMENT</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p>
                You must agree to the terms of the following license before using our script and I kindly request that you read and understand it carefully.
            </p>
            <ul class="">
                <li class="mb-3 ">This regular license allows you to use a single project item for personal or commercial use on behalf of yourself or a client.
                </li>
                <li class="mb-3 ">It is strictly forbidden to resell, distribute, distribute or trade in any way with any third party or person without permission.</li>
                <li >However, you are free to make other changes to the script as you see fit.</li>

            </ul>

            <p>I hope you agree to the terms of the license above and use it properly.</p>

            <div class="d-flex align-items-center justify-content-between">
                <label class="form-check d-inline-block">
                    <input class="form-check-input mt-0" onclick="goToNext()" id="isAgreed" type="checkbox" >
                    <span class="form-check-label">I agree to the terms of use and privacy policy</span>
                </label>
                <a href="?page=req" class="btn btn-primary disabled" id="go-to-req">Next</a>
            </div>

        </div>
    </div>

    <?php elseif($page == 'req'): ?>

        <div class="x_panel">
            <div class="x_title">
                <h2>Requirements</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <?php if(!$reqFailed): ?>

                    <div class="alert alert-success">
                        <b>Awesome!</b> It seems that all the requirements for the installation have been met.
                    </div>

                <?php else: ?>

                    <div class="alert alert-danger">
                        <b>Oh!</b> It appears that not all of the requirements for your installation have been met.
                    </div>
                    <div class="alert alert-info">
                        Please try to meet the requirements below
                    </div>



                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>PHP 7.4+</td>
                            <td>Required PHP version 7.4.0 or more</td>
                            <td>
                                <?php echo ($php == true) ? '<span class="badge bg-success">Installed</span>' : '<span class="badge bg-danger">Not Installed</span>' ; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Intl</td>
                            <td>Required Intl PHP extension</td>
                            <td>
                                <?php echo ($intl == true) ? '<span class="badge bg-success">Installed</span>' : '<span class="badge bg-danger">Not Installed</span>' ; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>MySQLi</td>
                            <td>Required MySQLi PHP extension <br>
                                <small>( If you need use another database driver, install script manually )</small>
                            </td>
                            <td>
                                <?php echo ($mysqli == true) ? '<span class="badge bg-success">Installed</span>' : '<span class="badge bg-danger">Not Installed</span>' ; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>cURL</td>
                            <td> Required cURL PHP extension</td>
                            <td>
                                <?php echo ($cURL == true) ? '<span class="badge bg-success">Installed</span>' : '<span class="badge bg-danger">Not Installed</span>' ; ?>
                            </td>
                        </tr>


                        <tr>
                            <td>allow_url_fopen</td>
                            <td>Required allow_url_fopen</td>
                            <td>
                                <?php echo ($urlFOpen == true) ? '<span class="badge bg-success">Enabled</span>' : '<span class="badge bg-danger">Disabled</span>' ; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>.htaccess</td>
                            <td>Required .htaccess file</td>
                            <td>
                                <?php echo ($isHtaccess == true) ? '<span class="badge bg-success">Uploaded</span>' : '<span class="badge bg-danger">Not Uploaded</span>' ; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>database.sql</td>
                            <td>Required <i>database.sql</i> file</td>
                            <td>
                                <?php echo ($sqlFile == true) ? '<span class="badge bg-success">Uploaded</span>' : '<span class="badge bg-danger">Not Uploaded</span>' ; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Database.php</td>
                            <td>Required <i>app/Config/Database.php</i> to be writable for the installation</td>
                            <td>
                                <?php echo ($dbConfigWritable == true) ? '<span class="badge bg-success">Writable</span>' : '<span class="badge bg-danger">Not Writable</span>' ; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>App.php</td>
                            <td>Required <i>app/Config/App.php</i> to be writable for the installation</td>
                            <td>
                                <?php echo ($appConfigWritable == true) ? '<span class="badge bg-success">Writable</span>' : '<span class="badge bg-danger">Not Writable</span>' ; ?>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>

            </div>
            <!-- Card footer -->
            <div class="w-100 d-flex align-items-center justify-content-between">
                <a href="?page=license" class="btn btn-secondary">Back</a>
                <a href="?page=installation" class="btn btn-primary <?php if($reqFailed) echo 'disabled'; ?>"  >Next</a>
            </div>

            </div>
        </div>

    <?php elseif($page == 'installation'): ?>

        <div class="x_panel">
            <div class="x_title">
                <h2>MySQL & Other Details</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form method="POST">
                <?php
                if(!empty($errors)){
                    $htmlList = '<ul class="mb-0">';
                    foreach ($errors as $error){
                        $htmlList .= '<li>' . $error . '</li>';
                    }
                    $htmlList .= '</ul>';

                    echo '<div class="alert alert-danger">'.$htmlList.'</div>';

                }

                ?>

                <div class="form-group mb-3 row">
                    <label class="form-label col-4 col-form-label">MySQL Host</label>
                    <div class="col">
                        <input type="text" name="sql_hostname" class="form-control" placeholder="" required>
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <label class="form-label col-4 col-form-label">MySQL Username</label>
                    <div class="col">
                        <input type="text" name="sql_username" class="form-control" placeholder="" required>
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <label class="form-label col-4 col-form-label">MySQL Password</label>
                    <div class="col">
                        <input type="text" name="sql_password" class="form-control" placeholder="" >
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <label class="form-label col-4 col-form-label">MySQL Database Name</label>
                    <div class="col">
                        <input type="text" name="sql_db_name" class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="hr-text">More Info</div>

                <div class="form-group mb-3 row">
                    <label class="form-label col-4 col-form-label">Site URL</label>
                    <div class="col">
                        <input type="url" name="site_url"  class="form-control" placeholder="http://siteurl.com/" required>

                        <small class="form-hint">Examples: <br><br>
                            <ul>
                                <li>http://siteurl.com/</li>
                                <li>http://www.siteurl.com/</li>
                                <li>http://subdomain.siteurl.com/</li>
                                <li>http://siteurl.com/subfolder/</li>
                            </ul>
                            You can use https:// too.</small>
                    </div>
                </div>

            <div class="text-right">

                <input type="submit" name="install" value="Install"  class="btn btn-primary">
            </div>

                </form>


            </div>
        </div>

    <?php elseif($page == 'finish'): ?>

        <div class="x_panel">
            <div class="x_title">
                <h2>Good Job, It's done.</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p style="font-size: 16px;line-height: 1.5; font-weight: 300" >
                    We are pleased to announce that the script has been successfully installed and is now up to standard use. 😊


                </p>
                <p>
                    Finally I urge you never to hesitate to seek my help if you encounter any problems with the vip embed in the future.
                    <br><br>
                    <i>best regards and stay safe  </i> <br>
                    <a href="#" class="d-inline-block mt-2">
                        <img src="./signature.png" height="35" alt="">
                    </a>

                </p>

            <!-- Card footer -->
            <div class="text-right">

                <a href="./" class="btn btn-primary">Let's Start</a>
            </div>

            </div>
        </div>

    <?php endif; ?>

</div>


<script>
    function goToNext()
    {
        let nextBtn = document.getElementById('go-to-req');
        if (document.getElementById('isAgreed').checked)
        {
            nextBtn.classList.remove('disabled');
        } else {
            nextBtn.classList.add('disabled');
        }
    }

</script>

</body>
</html>

<?php

function createEncryptionKey(){
    return bin2hex(random_bytes(32));
}

if($page == 'finish'){
    unlink(__FILE__);
}

?>