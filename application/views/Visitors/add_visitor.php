<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid m-2 rounded" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <a href="<?php echo site_url('visitors'); ?>" class="btn btn-icon btn-hover-light-primary btn-xs mr-5">
                        <i class="flaticon2-cross"></i>
                    </a>
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">
                        <?php echo (strpos(current_url(), 'add')) ? "Add Visitor" : "Edit Visitor"; 
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
                <form method="POST" id="add_visitor_form" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= (strpos(current_url(), 'edit')) ? (($userData->id != '') ? $userData->id : -1) : -1; ?>">
                    <div class="card-body">
                        <div class="form-group row">                            
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <?php if(strpos(current_url(), 'add')){ ?>
                                    <label>Photo</label><br>
                                    <input type="file" class="form-control" name="photo" id="photo" />
                                <?php }else{ ?>
                                            <label>Photo</label><br>
                                            <label for="photo" class="btn btn-primary form-control-sm"><?= (strpos(current_url(), 'edit')) ? 'Update Image' : 'Select Image'; ?></label>
                                            <label><?= (strpos(current_url(), 'edit')) ? (($userData->photo != '') ? $userData->photo : '') : ''; ?></label>
                                            <input type="file" class="form-control" style="visibility: hidden;" name="photo" id="photo" />
                                <?php } ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3 d-flex justify-content-center">
                                <img src="<?= base_url().'assets/upload/'; ?><?= (strpos(current_url(), 'edit')) ? (($userData->photo != '') ? $userData->photo : '') : ''; ?>" class="img-fluid <?= (strpos(current_url(), 'add')) ? 'd-none' : ''; ?>" width="50%">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Visitor Name</label>
                                <input type="text" class="form-control" name="visitor_name" id="visitor_name" placeholder="Enter Visitor Name" value="<?= (strpos(current_url(), 'edit')) ? (($userData->visitorName != '') ? $userData->visitorName : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Contact Number</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==10) return false;" class="form-control" name="mobile" id="mobile" placeholder="Enter Contact Number" value="<?= (strpos(current_url(), 'edit')) ? (($userData->mobileNo != '') ? $userData->mobileNo : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                <label>No of Visitor</label>
                                <input type="number" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==10) return false;" class="form-control" name="no_of_visitor" id="no_of_visitor" placeholder="Enter No of Visitor" value="<?= (strpos(current_url(), 'edit')) ? (($userData->noOfVisitor != '') ? $userData->noOfVisitor : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                <label>Whom To Meet</label>
                                <input type="text" class="form-control" name="whom_to_meet" id="whom_to_meet" placeholder="Enter Whom to Meet" value="<?= (strpos(current_url(), 'edit')) ? (($userData->whomToMeet != '') ? $userData->whomToMeet : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 py-3">
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
                                <label>Purpose</label>
                                <textarea class="form-control" name="purpose" id="purpose" placeholder="Enter Purpose" rows="3" maxlength="200"></textarea>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Address</label>
                                <textarea class="form-control" name="address" id="address" placeholder="Enter Address" rows="3" maxlength="200"></textarea>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Entry Time</label>
                                <input type="time" class="form-control" name="entry_time" id="entry_time" value="<?= (strpos(current_url(), 'edit')) ? (($userData->entryTime != '') ? date('h:i', strtotime($userData->entryTime)) : date('h:i')) : date('h:i'); ?>" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Exit Time</label>
                                <input type="time" class="form-control" name="exit_time" id="exit_time" value="<?= (strpos(current_url(), 'edit')) ? (($userData->exitTime != '') ? date('h:i', strtotime($userData->exitTime)) : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Out Time</label>
                                <input type="time" class="form-control" name="out_time" id="out_time" value="<?= (strpos(current_url(), 'edit')) ? (($userData->outTime != '') ? date('h:i', strtotime($userData->outTime)) : '') : ''; ?>" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                <label>Visited Date</label>
                                <input type="date" class="form-control" name="visited_date" id="visited_date" value="<?= (strpos(current_url(), 'edit')) ? (($userData->visitedDate != '') ? $userData->visitedDate : date('Y-m-d', time())) : date('Y-m-d', time()); ?>" />
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