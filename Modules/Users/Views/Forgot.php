<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mannat Themes">
        <meta name="keyword" content="">

        <title>My Virtual Repair |<?= $title ?></title>

        <!-- Theme icon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Theme Css -->
        <link href="Modules/Backend/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="Modules/Backend/assets/css/slidebars.min.css" rel="stylesheet">
        <link href="Modules/Backend/assets/css/icons.css" rel="stylesheet">
        <link href="Modules/Backend/assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="Modules/Backend/assets/css/style.css" rel="stylesheet">
    </head>

    <body class="sticky-header">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                <!-- <img src="Modules/Backend/assets/images/logo_sm_2.png" alt="" class=""> -->
                                                <h5 class="mt-3"><b>Forgot Your Password?</b></h5>
                                                <?php
                                                $validation = \Config\Services::validation();
                                                if($validation->getErrors() or session()->getFlashdata('error'))
                                                {
                                                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                                                    echo $validation->listErrors();
                                                    echo session()->getFlashdata('error');
                                                    echo "</div>";
                                                }
                                                elseif(session()->getFlashdata('success'))
                                                {
                                                    echo "<div class=\"alert alert-success\" role=\"alert\">";
                                                    echo session()->getFlashdata('success');
                                                    echo "</div>";
                                                    unset($_SESSION['success']);
                                                }
                                            ?>
                                            </div>  
                                            <form class="form mt-5 contact-form" method="post">
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-line" type="text" name="email" placeholder="Email" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12 mt-4">
                                                        <button class="btn btn-primary btn-block" type="submit">Retrieve</button>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12 mt-4 text-center">
                                                        <a href="<?= site_url('/user_login'); ?>"><i class="fa fa-lock m-r-5"></i> Already Registered?</a>
                                                    </div>
                                                    <div class="col-sm-12 mt-4 text-center">
                                                        <a href="<?= site_url('/user_register'); ?>"><i class="fa fa-lock m-r-5"></i> Not registered?</a>
                                                    </div>
                                                </div>

                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery -->
        <script src="Modules/Backend/assets/js/jquery-3.2.1.min.js"></script>
        <script src="Modules/Backend/assets/js/popper.min.js"></script>
        <script src="Modules/Backend/assets/js/bootstrap.min.js"></script>
        <script src="Modules/Backend/assets/js/jquery-migrate.js"></script>
        <script src="Modules/Backend/assets/js/modernizr.min.js"></script>
        <script src="Modules/Backend/assets/js/jquery.slimscroll.min.js"></script>
        <script src="Modules/Backend/assets/js/slidebars.min.js"></script>
        

        <!--app js-->
        <script src="Modules/Backend/assets/js/jquery.app.js"></script>
    </body>
</html>
