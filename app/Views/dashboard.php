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
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Helpdesk</h4>
                            </div>
                            <!--end page-title-box-->
                        </div>
                        <!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="row">
                        <div class="col-lg-2">
                            <div class="card card-eco">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="title-text mt-0">All Tickets</h4>
                                            <h3 class="font-weight-semibold mb-1"><?= $all_tickets ?></h3>
                                        </div>
                                        <!--end col-->
                                        <div class="col-4 text-center align-self-center">
                                            <i class="dripicons-ticket text-warning card-eco-icon  align-self-center"></i>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="bg-pattern"></div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col--
                        <div class="col-lg-3">
                            <div class="card card-eco">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="title-text mt-0">Open Tickets</h4>
                                            <h3 class="font-weight-semibold mb-1"><?= $open_tickets ?></h3>
                                        </div>
                                        <!--end col--
                                        <div class="col-4 text-center align-self-center">
                                            <i class="far fa-envelope-open text-danger card-eco-icon  align-self-center"></i>
                                        </div>
                                        <!--end col-
                                    </div>
                                    <!--end row-
                                    <div class="bg-pattern"></div>
                                </div>
                                <!--end card-body-
                            </div>
                            <!--end card-
                        </div>
                        <!--end col-->
                        <div class="col-lg-3">
                            <div class="card card-eco">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="title-text mt-0"> Open Tickets </h4>
                                            <h3 class="font-weight-semibold mb-1"> <?= $open_tickets ?> </h3>
                                        </div>
                                        <!--end col-->
                                        <div class="col-4 text-center align-self-center">
                                            <i class="fas fa-random text-gray text-danger card-eco-icon  align-self-center"></i>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="bg-pattern"></div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        
                        <!--end col-->
                        <div class="col-lg-3">
                            <div class="card card-eco">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="title-text mt-0">Closed Tickets</h4>
                                            <h3 class="font-weight-semibold mb-1">  <?= $closed_tickets ?></h3>
                                        </div>
                                        <!--end col-->
                                        <div class="col-4 text-center align-self-center">
                                            <i class="far fa-check-circle text-success card-eco-icon  align-self-center"></i>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="bg-pattern"></div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end card-->
                        <div class="col-lg-2">
                            <div class="card card-eco">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="title-text mt-0"> Users</h4>
                                            <h3 class="font-weight-semibold mb-1"> <?= $total_users ?> </h3>
                                        </div>
                                        <!--end col-->
                                        <div class="col-4 text-center align-self-center">
                                            <i class="fas fa-random text-gray text-danger card-eco-icon  align-self-center"></i>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="bg-pattern"></div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>

                        <div class="col-lg-2">
                            <div class="card card-eco">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="title-text mt-0"> Total EMR </h4>
                                            <h3 class="font-weight-semibold mb-1"> <?= $total_emr ?> </h3>
                                        </div>
                                        <!--end col-->
                                        <div class="col-4 text-center align-self-center">
                                            <i class="fas fa-random text-gray text-danger card-eco-icon  align-self-center"></i>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="bg-pattern"></div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title"> Recent Calls </h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>S/n</th>
                                                    <th>Name</th>
                                                    <th>Time</th>
                                                    <th>Date</th>
                                                    <th>Location</th>
                                                    <th>Category</th>
                                                    <th>Medium</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 1;
                                                foreach( $emergencies as $emergency) {
                                                    $call_date = strtotime($emergency['date']);
                                                    echo '<tr>
                                                    <td>'.$i.'</td>
                                                    <td> <a href="'.base_url('console/user').'/'.$emergency['user_id'].'"> '.$emergency['u_firstname'].' '.$emergency['u_lastname'].' </a> </td>
                                                    <td>'.date('h:j A', $call_date).'</td>
                                                    <td>'.date('d-m-Y', $call_date).'</td>
                                                    <td>'.$emergency['user_address'].'</td>
                                                    <td><span class="badge badge-soft-warning">'.$emergency['category'].'</span></td>
                                                    <td><span class="badge badge-soft-success">'.$emergency['type'].'</span></td>
                                                    <td>
                                                        <div class="d-inline-block float-right">
                                                            <a class="btn btn-outline-danger waves-effect waves-light text" href="'.base_url('console/emergency').'/'.$emergency['id'].'">View</a>
                                                        </div>
                                                    </td>
                                                </tr>';
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                        <!--end /table-->
                                    </div>
                                    <!--end /tableresponsive-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>

                    <!-- end col -->
                </div>
                <!--end row-->