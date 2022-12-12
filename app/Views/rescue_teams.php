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
                                        <li class="breadcrumb-item active">Rescue Team</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Rescue Teams</h4>
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
                                                    <th>Agency</th>
                                                    <th>Activity</th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach ($rescue_categories as $category) {
                                                    // echo $category->name;
                                                    echo '<tr>
                                                    <td>'.$category->name.'</td>
                                                    <td>'.$category->details.'</td>
                                                    <td> <a class="btn btn-danger" href="'.base_url('console/rescue_team/'.$category->id).'"> View </a> </td>
                                                </tr>';

                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <span class="float-right">
                                        <a href="<?= base_url('console/rescue_team/add_team'); ?>" id="but_add" class="btn btn-danger"> Add Rescue Team </a>
                                    </span>
                                    <!-- <span class="float-right">
                                        <button id="but_add" class="btn btn-danger">Add New Row</button>
                                    </span> -->
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