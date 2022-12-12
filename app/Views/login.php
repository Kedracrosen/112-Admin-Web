<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin - 911 Video App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url(); ?>/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/sweet-alert2/sweetalert2.min.js"></script>


</head>

<body class="account-body accountbg">

    <!-- Log In page -->
    <div class="container">
        <div class="row vh-100 ">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box">
                                    <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="../assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                                </div>
                                <!--end auth-logo-box-->

                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Let's Get Started</h4>
                                    <p class="text-muted mb-0">Sign in to continue to Admin Console.</p>
                                </div>
                                <!--end auth-logo-text-->


                                <form class="form-horizontal auth-form my-4" action="" method="post">

                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                    <i class="dripicons-user"></i> 
                                                </span>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                                        </div>
                                    </div>
                                    <!--end form-group-->

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                    <i class="dripicons-lock"></i> 
                                                </span>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                        </div>
                                    </div>
                                    <!--end form-group-->

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-switch switch-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                                <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-sm-6 text-right">
                                            <a href="forgot_password" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end form-group-->
                                    email::: admin@admin.com <br/>
                                    password::: mayokun 
                                    <?php
                                    if( !empty($validation) ) {
                                        foreach($validation as $error){
                                            echo '<script> Swal.fire("'.$error.'"); </script>';
                                            // echo $error;
                                        }
                                        // echo $validation;
                                        // echo 'here';
                                    }
                                    ?>
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-danger btn-round btn-block waves-effect waves-light text-white" type="submit"> Log In <i class="fas fa-sign-in-alt ml-1" ></i> </button>
                                            <!-- <a href="../dashboard/dashboard.html" class="btn btn-danger btn-round btn-block waves-effect waves-light text-white" type="button">Log In <i class="fas fa-sign-in-alt ml-1" ></i></a> -->
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end form-group-->
                                </form>
                                <!--end form-->
                            </div>
                            <!--end /div-->

                            <!-- <div class="m-3 text-center text-muted">
                                <p class="">Don't have an account ? <a href="../authentication/auth-register.html" class="text-danger ml-2">Sign Up</a></p>
                            </div> -->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card--
                    <div class="account-social text-center mt-4">
                        <h6 class="my-4">Or Login With</h6>
                        <ul class="list-inline mb-4">
                            <li class="list-inline-item">
                                <a href="" class="">
                                    <i class="fab fa-facebook-f facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="">
                                    <i class="fab fa-twitter twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="">
                                    <i class="fab fa-google google"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--end account-social-->
                </div>
                <!--end auth-page-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
    <!-- End Log In page -->




    <!-- jQuery  -->
    <script src="<?= base_url(); ?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/metismenu.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/waves.js"></script>
    <script src="<?= base_url(); ?>/assets/js/feather.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.slimscroll.min.js"></script>
    <!-- App js -->
    <script src="<?= base_url(); ?>/assets/js/app.js"></script>
    <script>
    // Swal.fire("Our First Alert");
    // console.log('fire');
    </script>

</body>

</html>