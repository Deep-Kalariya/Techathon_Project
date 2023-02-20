<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid m-2 rounded" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <a href="<?php echo site_url('users'); ?>" class="btn btn-icon btn-hover-light-primary btn-xs mr-5">
                        <i class="flaticon2-cross"></i>
                    </a>
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">
                        <?php echo (strpos(current_url(), 'add')) ? "Add User" : "Edit User"; 
                        ?>
                    </h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Form-->
                <form method="POST" id="add_edit_user_form">
                    <input type="hidden" name="id" id="id" value="<?= (strpos(current_url(), 'edit')) ? (($userData->userid != '') ? $userData->userid : -1) : -1; ?>">
                    <div class="card-body">
                        <div class="form-group row">                            
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?= (strpos(current_url(), 'edit')) ? (($userData->name != '') ? $userData->name : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?= (strpos(current_url(), 'edit')) ? (($userData->email != '') ? $userData->email : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Contact Number</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==10) return false;" class="form-control" name="mobile" id="mobile" placeholder="Enter Contact Number" value="<?= (strpos(current_url(), 'edit')) ? (($userData->mobileNo != '') ? $userData->mobileNo : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="<?= (strpos(current_url(), 'edit')) ? (($userData->password != '') ? $userData->password : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>User Type</label>
                                <select class="form-control" id="user_type" name="user_type">
                                    <option label="">Select Type</option>
                                    <?php
                                    $data = $this->Custom_model->getRows(USER_TYPE);
                                    foreach ($data as $value) {
                                    ?>
                                        <option value="<?= $value->userTypeId; ?>"><?= $value->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Flat No</label>
                                <select class="form-control" id="flat_no" name="flat_no">
                                    <option label="">Select Flat</option>
                                    <?php
                                    $data = $this->Custom_model->getRows(FLAT);
                                    foreach ($data as $value) {
                                    ?>
                                        <option value="<?= $value->flatid; ?>"><?= $value->flatNo; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Working Time</label>
                                <input type="time" class="form-control" name="working_time" id="working_time" value="<?= (strpos(current_url(), 'edit')) ? (($userData->workingTime != '') ? $userData->workingTime : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Shift</label>
                                <select class="form-control" id="shift" name="shift">
                                    <option label="">Select Shift</option>
                                    <option value="Morning">Morning</option>
                                    <option value="Afternoon">Afternoon</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <button id="reset" type="reset" class="btn btn-secondary btn-lg font-weight-bold px-10" name="reset">Cancel</button>
                            <button id="submitbtn" class="btn btn-primary btn-lg px-10 font-weight-bold" name="submitbtn"><?= (strpos(current_url(), 'edit')) ? 'Update' : 'Add'; ?></button>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

<script type="text/javascript">
    $(document).ready(function(){
        <?php if(strpos(current_url(), 'edit')): ?>
            $('#user_type').val(<?= $userData->userTypeId; ?>);
            $('#flat_no').val(<?= $userData->flatId; ?>);
            $('#shift').val('<?= $userData->shift; ?>');
        <?php endif; ?>
    });
</script>