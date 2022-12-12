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
                                        <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Emergencies</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Emergencies</h4>
                            </div>
                            <!--end page-title-box-->
                        </div>
                        <!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
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
                                            // echo json_encode($emergencies);
                                                foreach( $emergencies as $emergency) {
                                                    $call_date = strtotime($emergency['date']);
                                                    echo '<tr>
                                                    <td>'.$i.'</td>
                                                    <td><a href="'.base_url('console/user').'/'.$emergency['user_id'].'"> '.$emergency['u_firstname'].' '.$emergency['u_lastname'].' </a> </td>
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
                                                $i++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php echo $pager->links('num') ?>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->
