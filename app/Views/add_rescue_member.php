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
                                <h4 class="page-title">New Rescue Member</h4>
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
                                <form class="form-horizontal form-material mb-0" method="POST">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <input type="text" name="firstname" placeholder="First Name" class="form-control" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" name="lastname" placeholder="Last Name" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-8">
                                                            <input type="email" name="email" placeholder="Email" class="form-control" name="example-email" id="example-email" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="tel" name="mobile" placeholder="Phone No" class="form-control" required>
                                                        </div>
                                                        <!-- <div class="col-md-4">
                                                            <input type="password" placeholder="Re-password" class="form-control">
                                                        </div> -->
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <select name="rescue_category" class="form-control" required>
                                                                <option value="">Select Rescue Team category </option>
                                                                <?php
                                                                foreach ( $rescue_categories as $category) {
                                                                    echo '<option value="'.$category->id.'">'.$category->name.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        if( !empty($validation_errors) ) {
                                                            $errors = "";
                                                            foreach($validation_errors as $validation_error) {
                                                                $errors .= $validation_error.'<br/>';
                                                            }
                                                            echo '<script> Swal.fire("'.$errors.'"); </script>';
                                                            // echo json_encode($validation_errors);

                                                        }
                                                    ?>
                                                    <div class="form-group">
                                                        <button class="btn btn-danger btn-sm px-4 mt-3 float-right mb-0">Proceed</button>
                                                    </div>
                                                </form>
                        
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!--end row-->