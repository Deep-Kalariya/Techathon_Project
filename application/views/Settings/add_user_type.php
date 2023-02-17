<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid m-2 rounded" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <a href="<?php echo site_url('user-types'); ?>" class="btn btn-icon btn-hover-light-primary btn-xs mr-5">
                        <i class="flaticon2-cross"></i>
                    </a>
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Add User Type</h5>
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
                <form method="POST" id="add_user_type_form">
                    <!-- <input type="hidden" name="id" id="id" value=""> -->
                    <div class="card-body">
                        <div class="form-group row">                            
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Type Name" />
                            </div>
                        </div>
                        <div class="text-right">
                            <button id="reset" type="reset" class="btn btn-secondary btn-lg font-weight-bold px-10" name="reset">Cancel</button>
                            <button id="submitbtn" class="btn btn-primary btn-lg px-10 font-weight-bold" name="submitbtn">Add User Type</button>
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