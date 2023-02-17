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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Add User</h5>
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
                <form method="POST" id="add_user_form">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="card-body">
                        <div class="form-group row">                            
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" maxlength="50" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" maxlength="50" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Contact Number</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==10) return false;" class="form-control" name="mobile" id="mobile" placeholder="Enter Contact Number"/>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" maxlength="20" minlength="6" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>User Type</label>
                                <select class="form-control" id="user_type" name="user_type" style="-webkit-appearance: none;">
                                    <option label="">Select User Type</option>
                                    <option value="0">Admin</option>
                                    <option value="1">User</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Address</label>
                                <textarea class="form-control" name="address" id="address" placeholder="Enter Address" rows="3" maxlength="200"></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button id="reset" type="reset" class="btn btn-secondary btn-lg font-weight-bold px-10" name="reset">Cancel</button>
                            <button id="submitbtn" class="btn btn-primary btn-lg px-10 font-weight-bold" name="submitbtn">Add</button>
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