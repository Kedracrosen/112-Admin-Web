<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body  met-pro-bg">
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
                                                <h5 class="met-user-name"><?= session()->get('firstname').' '.session()->get('lastname') ?> </h5>
                                                <p class="mb-0 met-user-name-post"> Admin</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4 ml-auto">
                                        <ul class="list-unstyled personal-detail">
                                            <!-- <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> : +91 23456 78910</li> -->
                                            <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : <?= session()->get('email') ?> </li>
                                            <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : NG </li>
                                        </ul>
                                        <!-- <div class="button-list btn-social-icon">
                                            <button type="button" class="btn btn-blue btn-circle">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>

                                            <button type="button" class="btn btn-secondary btn-circle ml-2">
                                                <i class="fab fa-twitter"></i>
                                            </button>

                                            <button type="button" class="btn btn-pink btn-circle  ml-2">
                                                <i class="fab fa-dribbble"></i>
                                            </button>
                                        </div> -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end f_profile-->
                        </div>
                        <!--end card-body-->
                        <div class="card-body">
                            <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <!-- <a class="nav-link btn btn-outline-danger btn-block waves-effect waves-light text" id="settings_detail_tab" data-toggle="pill" href="#settings_detail">Settings</a> -->
                                </li>
                            </ul>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-12">
                    <div class="tab-content detail-list" id="pills-tabContent">
                        <div class="tab-pane fade" id="settings_detail">
                            <div class="row">
                                <div class="col-lg-12 col-xl-9 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="">
                                                <form class="form-horizontal form-material mb-0">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <input type="text" placeholder="First Name" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" placeholder="Last Name" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <input type="email" placeholder="Email" class="form-control" name="example-email" id="example-email">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="password" placeholder="password" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="password" placeholder="Re-password" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <input type="text" placeholder="Phone No" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select class="form-control">
                                                                <option>London</option>
                                                                <option>India</option>
                                                                <option>Usa</option>
                                                                <option>Canada</option>
                                                                <option>Thailand</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-danger btn-sm px-4 mt-3 float-right mb-0">Update Profile</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end settings detail-->
                    </div>
                    <!--end tab-content-->

                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end row-->

    </div>
    <!-- container -->