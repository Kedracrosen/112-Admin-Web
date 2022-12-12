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
                        <h4 class="page-title">User Data</h4>
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
                                        <!-- </ul>
                                        <div class="button-list btn-social-icon"> -->
                                           <?php
                                                if( empty($user['blood_type']) || empty($user['height']) || empty($user['weight']) || empty($user['allergies']) ) {
                                                    echo '<span style="color: red;"> Incomplete registration </span>';
                                                } else {
                                                    echo '<li class="mt-2"> <b>Height</b> : '.$user['height'].'</li>
                                                    <li class="mt-2"> <b>Blood Type</b> : '.$user['blood_type'].'</li>
                                                    <li class="mt-2"> <b>Weight</b> : '.$user['weight'].'</li>
                                                    <li class="mt-2"> <b>Allergies</b> : '.$user['allergies'].'</li>';
                                                }
                                           ?>
                                        <!-- </div> -->
                                            </ul>
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
                    <div class="row">
                        <div class="col-12">
                        <h4 class="page-title"> Recent Emergency Calls </h4>

                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="mt-0 header-title">Edit list With Button</h4> -->
                                    <!-- <button class="btn  btn-danger mb-3" id="submit_data">Submit</button> -->
                                    <?php
                                    if( empty( $emergency_history )) {
                                        echo 'No data!';
                                    } else { ?>
                                    <div class="table-responsive">
                                        <table class="table  table-bordered" id="makeEditable">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Category</th>
                                                    <th> Status </th>
                                                    <th> Time </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach ($emergency_history as $history) {
                                                    $status = ( $history['status'] == 2) ? '<span style="padding: 3px; color: #ffff; background-color: green; border-radius: 3px;"> Call Ended </span>' : '<span style="padding: 3px; color: #ffff; background-color: red; border-radius: 3px;"> Call Ongoing </span>'; 
                                                    echo '<tr>
                                                    <td>'.$history['type'].'</td>
                                                    <td>'.$emergency_categories[$history['category'] - 1]['name'].'</td>
                                                    <td>'.$status.'</td>
                                                    <td>'.date('d M Y H:i:s', strtotime($history['date'])).'</td>
                                                </tr>';

                                                }
                                                // echo json_encode($emergency_categories);
                                            ?>
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                    </div>

                                    
                                    <!--end table-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!-- end col -->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
           
            <!--end row-->
        </div>
        <!--end row-->

    </div>
    <!-- container -->