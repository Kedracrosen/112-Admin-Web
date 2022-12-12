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
                                <h4 class="page-title">New Rescue Team</h4>
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
                                                    <label class="col-md-2 control-label"> Title </label>
                                                        <div class="col-md-8">   
                                                            <input type="text" placeholder="Team Name (e.g Health Care)" name="title" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-md-2 control-label"> Team description</label>
                                                        <div class="col-md-12">
                                                            <textarea name="details" class="form-control" placeholder="Team description" required> </textarea>
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