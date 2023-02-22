<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid m-2 rounded" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <a href="<?php echo site_url('flats'); ?>" class="btn btn-icon btn-hover-light-primary btn-xs mr-5">
                        <i class="flaticon2-cross"></i>
                    </a>
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">
                        <?php echo (strpos(current_url(), 'add')) ? "Add Flat" : "Edit Flat"; 
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
                <form method="POST" id="add_flat_form">
                    <input type="hidden" name="id" id="id" value="<?= (strpos(current_url(), 'edit')) ? (($userData->flatid != '') ? $userData->flatid : -1) : -1; ?>">
                    <div class="card-body">
                        <div class="form-group row">  
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Visitor Name" value="<?= (strpos(current_url(), 'edit')) ? (($userData->name != '') ? $userData->name : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                <label>Contact Number</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==10) return false;" class="form-control" name="mobile" id="mobile" placeholder="Enter Contact Number" value="<?= (strpos(current_url(), 'edit')) ? (($userData->mobileno != '') ? $userData->mobileno : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?= (strpos(current_url(), 'edit')) ? (($userData->email != '') ? $userData->email : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                <label>Flat No</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==5) return false;" class="form-control" name="flat_no" id="flat_no" placeholder="Enter Flat No" value="<?= (strpos(current_url(), 'edit')) ? (($userData->flatNo != '') ? $userData->flatNo : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                <label>No of year to stay</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==5) return false;" class="form-control" name="no_of_year" id="no_of_year" placeholder="Enter Year" value="<?= (strpos(current_url(), 'edit')) ? (($userData->noOfYearToStay != '') ? $userData->noOfYearToStay : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                <label>No of person</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==5) return false;" class="form-control" name="no_of_person" id="no_of_person" placeholder="Enter Year" value="<?= (strpos(current_url(), 'edit')) ? (($userData->noOfPerson != '') ? $userData->noOfPerson : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                <label>Owner Business</label>
                                <input type="text" class="form-control" name="owner_business" id="owner_business" placeholder="Enter Owner Business" value="<?= (strpos(current_url(), 'edit')) ? (($userData->ownerBusiness != '') ? $userData->ownerBusiness : '') : ''; ?>" />
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
    <?php if(strpos(current_url(), 'edit')): ?>
        $('#flat_no').val(<?= $userData->flatid; ?>);
        $('#purpose').html('<?= $userData->purpose; ?>');
        $('#address').html('<?= $userData->address; ?>');
        
    <?php endif; ?>
</script>