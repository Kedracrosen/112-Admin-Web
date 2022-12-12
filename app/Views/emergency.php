<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <!-- <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol> -->
                        </div>
                        <h4 class="page-title">Emergency Call Data</h4>
                    </div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body" style="color: black;">
                        <h4 class="page-title"> Call Data </h4>
                            <div class="met-profile">
                                <div class="row">
                                    <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                        <div class="met-profile-main">
                                            <div class="met-profile-main-pic">
                                                <!-- <img src="" alt="" class="rounded-circle"> -->
                                                <!-- <span class="fro-profile_main-pic-change">
                                                    <i class="fas fa-camera"></i>
                                                </span> -->
                                            </div>
                                            <div class="met-profile_user-detail">
                                                <h5 class="met-user-name"><?= $emr['firstname'].' '.$emr['lastname'] ?> </h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4 ml-auto">
                                    <p class="mb-0 met-user-name-post"> Type: <?= $call['type'] ?></p>
                                                <p class="mb-0 met-user-name-post"> Category: <?= $call['category'] ?></p>
                                        <p class="mb-0 met-user-name-post"> Status: <?= $status = ($call['status'] == 2) ? '<span class="badge badge-soft-success"> Ended </span>' : '<span class="badge badge-soft-warning"> Inprogress </span>' ?></p>
                                        <p class="mb-0 met-user-name-post"> Time: <?= date('D d M Y h:i a', strtotime($call['date']) ) ?></p>
                                        
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end f_profile-->
                        </div>
                        <!--end card-body-->

                        
                      
                        <!--end card-body-->
                    </div>
                    <!--end card-->

                    
                    <div class="card">
                        <div class="card-body  met-pro-bg">
                        <h4 class="page-title" style="color: white;"> User Data </h4>
                            <div class="met-profile">
                                <div class="row">
                                    <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                        <div class="met-profile-main">
                                            <div class="met-profile-main-pic">
                                                <!-- <img src="" alt="" class="rounded-circle"> -->
                                                <!-- <span class="fro-profile_main-pic-change">
                                                    <i class="fas fa-camera"></i>
                                                </span> -->
                                            </div>
                                            <div class="met-profile_user-detail">
                                                <h5 class="met-user-name"><?= $user['firstname'].' '.$user['lastname'] ?> </h5>
                                                <p class="mb-0 met-user-name-post"> Date of Birth: <?= $user['dob'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4 ml-auto">
                                        <ul class="list-unstyled personal-detail">
                                            <!-- <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> : +91 23456 78910</li> -->
                                            <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : <?= $user['email'] ?> </li>
                                            <li class="mt-2"><i class="dripicons-phone text-info font-18 mt-2 mr-2"></i> <b>Mobile</b> : <?= $user['mobile'] ?>  </li>
                                            <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Address</b> : <?= $call['user_address'] ?>  </li>
                                        </ul>
                                        <div class="button-list btn-social-icon">
                                            <a class="btn btn-outline-danger waves-effect waves-light text" href="<?= base_url('console/user').'/'.$user['id'] ?> ">View User</a>

                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end f_profile-->
                        </div>
                        <!--end card-body-->

                        
                      
                        <!--end card-body-->
                    </div>
                    <!--end card-->

                    <div class="card">
                        <div class="card-body  met-pro-bg">
                        <h4 class="page-title" style="color: white;"> Responder Data </h4>
                            <div class="met-profile">
                                <div class="row">
                                    <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                        <div class="met-profile-main">
                                            <div class="met-profile-main-pic">
                                                <!-- <img src="" alt="" class="rounded-circle"> -->
                                                <!-- <span class="fro-profile_main-pic-change">
                                                    <i class="fas fa-camera"></i>
                                                </span> -->
                                            </div>
                                            <div class="met-profile_user-detail">
                                                <h5 class="met-user-name"><?= $emr['firstname'].' '.$emr['lastname'] ?> </h5>
                                                <p class="mb-0 met-user-name-post"> Date of Birth: <?= $user['dob'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4 ml-auto">
                                        <ul class="list-unstyled personal-detail">
                                            <!-- <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> : +91 23456 78910</li> -->
                                            <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : <?= $emr['email'] ?> </li>
                                            <li class="mt-2"><i class="dripicons-phone text-info font-18 mt-2 mr-2"></i> <b>Mobile</b> : <?= $emr['mobile'] ?>  </li>
                                        </ul>
                                        <div class="button-list btn-social-icon">
                                            <a class="btn btn-outline-danger waves-effect waves-light text" href="<?= base_url('console/emr').'/'.$emr['id'] ?> ">View </a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end f_profile-->
                        </div>
                        <!--end card-body-->

                        
                      
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
           
            <!--end row-->
        </div>
        <!--end row-->

    </div>
    <!-- container -->