<!-- begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column">
        <!--begin::Job Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <!--begin::Job detail Row-->
                    <div class="row d-flex flex-row justify-content-between">
                        <div class="col-lg-3 col-md-6 mb-md-3">
                            <div class="bg-light-primary d-flex align-items-center justify-content-between rounded-xl row p-8 mr-md-1 mb-3 mb-md-0">
                                <div class="col text-primary font-weight-bold font-size-h1 text-center" id="total_visitors"><?= $total_visitors; ?></div>
                                <div class="col text-primary font-weight-bold font-size-h4 text-center">Total Visitors</div>
                            </div>                                
                        </div>
                        <div class="col-lg-3 col-md-6 mb-md-3">
                            <div class="bg-light-success d-flex align-items-center justify-content-between rounded-xl row p-8 mr-lg-1 mb-3 mb-md-0">
                                <!-- <div class="col text-success font-weight-bold font-size-h1 text-center" id="active_flats"></div>
                                <div class="col text-success font-weight-bold font-size-h4 text-center">Active Flates</div> -->
                                <div class="col text-success font-weight-bold font-size-h1 text-center" id="total_flats"><?= $total_flats; ?></div>
                                <div class="col text-success font-weight-bold font-size-h4 text-center">Total Flates</div>
                            </div>                                 
                        </div>
                        <div class="col-lg-3 col-md-6 mb-md-3">
                            <div class="bg-light-warning d-flex align-items-center justify-content-between rounded-xl row p-8 mr-md-1 mb-3 mb-md-0">
                                <!-- <div class="col text-warning font-weight-bold font-size-h1 text-center" id="total_flats"></div>
                                <div class="col text-warning font-weight-bold font-size-h4 text-center">Total Flates</div> -->
                                <div class="col text-warning font-weight-bold font-size-h1 text-center" id="total_users"><?= $total_users; ?></div>
                                <div class="col text-warning font-weight-bold font-size-h4 text-center">Total Users</div>
                            </div>                                   
                        </div>
                        <div class="col-lg-3 col-md-6 mb-md-3">
                            <div class="bg-light-danger d-flex align-items-center justify-content-between rounded-xl row p-8">
                                <!-- <div class="col text-danger font-weight-bold font-size-h1 text-center" id="empty_flats"></div>
                                <div class="col text-danger font-weight-bold font-size-h4 text-center">Total Flates</div> -->
                                <div class="col-4 text-danger font-weight-bold font-size-h1 text-center" id="total_user_types"><?= $total_user_types; ?></div>
                                <div class="col-8 text-danger font-weight-bold font-size-h4 text-center">Total User Type</div>
                            </div>                                  
                        </div>
                    </div>
                    <!-- end::Job detail Row -->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Job Container-->
    </div>
    <!--end::Entry-->

</div>
<!--end::Content