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
                                        <li class="breadcrumb-item active">Users</li>
                                    </ol>
                                </div>
                                <h4 class="page-title"> All Users </h4>
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
                                    <!-- <h4 class="mt-0 header-title">Edit list With Button</h4> -->
                                    <!-- <button class="btn  btn-danger mb-3" id="submit_data">Submit</button> -->
                                    <div class="table-responsive">
                                        <table class="table  table-bordered" id="makeEditable">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th> Email </th>
                                                    <th> Mobile </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            // echo json_encode( $users );
                                                foreach ($users as $member) {
                                                    echo '<tr>
                                                    <td>'.$member['firstname'].'</td>
                                                    <td>'.$member['lastname'].'</td>
                                                    <td>'.$member['email'].'</td>
                                                    <td>'.$member['mobile'].'</td>
                                                    <td> <a href="'.base_url('console/user').'/'.$member['id'].'" class="btn btn-danger" href=""> View </a> </td>
                                                </tr>';

                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php echo $pager->links('num') ?>

                                    <span class="float-right">
                                        <a href="<?= base_url('console/rescue_team/add_member'); ?>" id="but_add" class="btn btn-danger"> Add EMR </a>
                                    </span>
                                    <!--end table-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!--end row-->