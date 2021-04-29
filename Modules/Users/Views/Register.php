<?php
    error_reporting(5);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- <title>My Virtual Repair |<?php //echo $title ?></title> -->
        <title>My Virtual Repair |<?php echo $title; ?></title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mannat Themes">
        <meta name="keyword" content="">


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
                                                <h5 class="mt-3"><b>Register</b></h5>
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
                                                        <input class="form-control form-control-line" type="text" name="first_name" placeholder="First Name" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-line" type="text" name="last_name"  placeholder="Last Name" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-line" type="email" name="email" placeholder="Email" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-line" type="phone" name="phone" placeholder="Phone: 999-888-7777">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-line" type="password" name="password" placeholder="Password" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-line" type="password" name="confirm_password" name="password" placeholder="Confirm Password" required="required">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <div class="col-12">
                                                        <label class="cr-styled">
                                                            <input type="checkbox" checked>
                                                            <i class="fa"></i> 
                                                            I accept <a href="">Terms and Conditions</a>
                                                        </label>
                                                    </div>
                                                </div> -->
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-12 mt-4">
                                                        <button class="btn btn-primary btn-block" type="submit">Sign Up Free</button>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12 mt-4 text-center">
                                                        <a href="<?= site_url('/user_login') ?>">Already have an account ?</a>
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

