        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Pending Schedules</li>
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
                        <h7 class="font-weight-bold d-block mb-2" style="font-size:11px;">PENDING SCHEDULE</h7>
                        <?php if (!empty($pending)) { ?>
                            <div class="event-list">
                                <?php foreach ($pending as $key => $value) : $count = 0; ?>
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
                                                <span id="select-schedule" class="bg-warning"> Pending </span>
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
                                    NO PENDING SCHEDULE
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