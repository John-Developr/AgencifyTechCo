        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Schedules</li>
                </ol>
            </div>
            <div class="">
                <!-- <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button> -->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right">
                            <i class="sl-icon-grid nagivation-theme-icon"></i>
                        </div>
                        <hr>
                        <h7 class="font-weight-bold d-block mb-2" style="font-size:11px;">SELECT SERVICE LOCATION</h7>
                        <select name="type" class="select2 form-control custom-select select2-multiple select2-hidden-accessible" data-default="<?= ($_SESSION['userdata']['type'] == 2) ? $userdata[0]['facility_location'] : '' ?>">
                            <optgroup label="SERVICE LOCATION">
                                <option value="Alabama"> Alabama</option>
                                <option value="Alaska"> Alaska</option>
                                <option value="Arizona"> Arizona</option>
                                <option value="Arkansas"> Arkansas</option>
                                <option value="California"> California</option>
                                <option value="Colorado"> Colorado</option>
                                <option value="Connecticut"> Connecticut</option>
                                <option value="Delaware"> Delaware</option>
                                <option value="Florida"> Florida</option>
                                <option value="Georgia"> Georgia</option>
                                <option value="Hawaii"> Hawaii</option>
                                <option value="Idaho"> Idaho</option>
                                <option value="Illinois"> Illinois</option>
                                <option value="Indiana"> Indiana</option>
                                <option value="Iowa"> Iowa</option>
                                <option value="Kansas"> Kansas</option>
                                <option value="Kentucky"> Kentucky</option>
                                <option value="Louisiana"> Louisiana</option>
                                <option value="Maine"> Maine</option>
                                <option value="Maryland"> Maryland</option>
                                <option value="Massachusetts"> Massachusetts</option>
                                <option value="Michigan"> Michigan</option>
                                <option value="Minnesota"> Minnesota</option>
                                <option value="Mississippi"> Mississippi</option>
                                <option value="Missouri"> Missouri</option>
                                <option value="Montana"> Montana</option>
                                <option value="Nebraska"> Nebraska</option>
                                <option value="Nevada"> Nevada</option>
                                <option value="New Hampshire"> New Hampshire</option>
                                <option value="New Jersey"> New Jersey</option>
                                <option value="New Mexico"> New Mexico</option>
                                <option value="New York"> New York</option>
                                <option value="North Carolina"> North Carolina</option>
                                <option value="North Dakota"> North Dakota</option>
                                <option value="Ohio"> Ohio</option>
                                <option value="Oklahoma"> Oklahoma</option>
                                <option value="Oregon"> Oregon</option>
                                <option value="Pennsylvania"> Pennsylvania</option>
                                <option value="Rhode Island"> Rhode Island</option>
                                <option value="South Carolina"> South Carolina</option>
                                <option value="South Dakota"> South Dakota</option>
                                <option value="Tennessee"> Tennessee</option>
                                <option value="Texas"> Texas</option>
                                <option value="Utah"> Utah</option>
                                <option value="Vermont"> Vermont</option>
                                <option value="Virginia"> Virginia</option>
                                <option value="Washington"> Washington</option>
                                <option value="Washington DC"> Washington DC</option>
                                <option value="West Virginia"> West Virginia</option>
                                <option value="Wisconsin"> Wisconsin</option>
                                <option value="Wyoming"> Wyoming</option>
                            </optgroup>
                        </select>
                        <h7 class="d-block mt-4" style="font-size:11px;">AVAILABLE SCHEDULES:</h7>
                        <div class="search-result" id="search-result">
                            <div class="text-center mt-5 mb-3" style="color:#a6b7bf;">
                                <i class="sl-icon-info"></i> PLEASE SELECT SERVICE LOCATION
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right">
                            <i class="sl-icon-grid nagivation-theme-icon"></i>
                        </div>
                        <hr>
                        <h7 class="font-weight-bold d-block mb-2" style="font-size:11px;">APPROVED SCHEDULE</h7>
                        <?php if (!empty($approved)) { ?>
                            <div class="event-list">
                                <?php foreach ($approved as $key => $value) : $count = 0; ?>
                                    <span class="d-block font-weight-bold mb-3" style="font-size:13px;">Schedule on - <?= $key ?></span>
                                    <?php foreach ($value as $key => $data) : $count++; ?>
                                        <div class="card-schedule">
                                            <div class="count-h">
                                                <span class="numbering"><?= $count; ?></span> <span class="card-tttle">Schedule</span>
                                            </div>
                                            <div class="title-hre">
                                                <?= $data['title'] ?>
                                            </div>
                                            <span class="desript-span">Description: </span>
                                            <div class="descript-her">
                                                <?= $data['shift_type'] ?>
                                            </div>
                                            <div class="end-date text-danger">
                                                <span>Ended on -</span> <?= $data['end_date'] ?>
                                            </div>
                                            <div class="action">
                                                <a href="javascript:;" data-id="15" id="view-descript" title="Schedule Details" class="mr-1 bg-info"><i class="sl-icon-info"></i></a>
                                                <span id="select-schedule" class="bg-success"> APPROVED </span>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <span>Schedule Details:</span>
                                            <div class="details-childs">
                                                <p>Tittle </p>
                                                <h5><?= $data['title'] ?></h5>
                                                <p>Schedule Information </p>
                                                <h5><?= $data['shift_type'] ?> and time start at <?= $data['start_time'] ?> - <?= $data['end_time'] ?></h5>
                                                <span>Start on <?= $data['start_date'] ?> - <?= $data['end_date'] ?> at <?= $data['service_location'] ?></span>
                                            </div>
                                        </div>
                                        <br>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php } else { ?>
                            <div class="search-result" id="search-result">
                                <div class="text-center mt-5 mb-3" style="color:#a6b7bf;">
                                    NO APPROVED SCHEDULE
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->

        <div class="modal fade" id="assign-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">ASSIGN SCHEDULE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="assign-sched">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info" id="upload-timesheet-btn">Upload Timesheet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>