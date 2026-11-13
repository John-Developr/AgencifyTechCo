<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start: Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h3 class="text-themecolor">Manage Schedules</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard') ?>">Home</a>
            </li>
            <li class="breadcrumb-item active"> Schedules</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End: Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body selecoption">
                            <div class="row">
                                <div class="col-md-12 services">
                                    <select name="service_location" class="form-control input-check" id="service_location">
                                        <option selected value="all">All Service Location</option>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body addnew">
                            <a href="#" data-toggle="modal" data-target="#create_modal" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                                <i class="ti-plus"></i> Add New Schedule
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 divider">
                    </div>
                    <div class="col-lg-12">
                        <div class="card-body b-l calender-sidebar">
                            <div id="calendar-schedule"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Category -->
<div class="modal none-border" id="create_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add Event</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form_create">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Title</label>
                            <input class="form-control form-white" placeholder="Enter Title" type="text" name="title" id="title">
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control form-white" name="description" id="description" placeholder="Enter Description" cols="20" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Start Date</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control mydatepicker" name="start" placeholder="MM/DD/YYYY" id="start">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">End Date</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control mydatepicker" name="end" placeholder="MM/DD/YYYY" id="end">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Service Location</label>
                            <select name="service_location" class="form-control input-check" id="service_location">
                                <option hidden selected value="Please Select Location">Select Service Location</option>
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
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Color</label>
                            <select name="color" class="form-control" id="color">
                                <option value="" selected hidden>SELECT COLOR</option>
                                <option style="color:#6772e5;" value="#6772e5">&#9724; Purple</option>
                                <option style="color:#24d2b5;" value="#24d2b5">&#9724; Green</option>
                                <option style="color:#20aee3;" value="#20aee3">&#9724; Blue</option>
                                <option style="color:#ff9041;" value="#ff9041">&#9724; Orange</option>
                                <option style="color:#ff5c6c;" value="#ff5c6c">&#9724; Red</option>
                                <option style="color:#000;" value="#000">&#9724; Black</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success save-event waves-effect waves-light" id="btn-create" disabled>Create event</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- Modal Edit Category -->
<div class="modal none-border" id="edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong id="modal_title">View Event Schedule</strong></h4>
            </div>
            <div class="modal-body">
                <form id="form-edit">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="calendar_id" id="up-id" hidden>
                            <label class="control-label">Title</label>
                            <input class="form-control form-white" placeholder="Enter Title" type="text" name="up-title" id="up-title" readonly />
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control form-white" name="up-description" id="up-description" placeholder="No Description Yet...." cols="20" rows="3" readonly></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Start Date</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control mydatepicker" name="up-start" id="up-start" placeholder="MM/DD/YYYY" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">End Date</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control mydatepicker" name="up-end" id="up-end" placeholder="MM/DD/YYYY" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Service Location</label>
                            <select name="up-service_location" class="form-control input-check" id="up-service_location" disabled>
                                <option hidden selected value="">Select Service Location</option>
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
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Color</label>
                            <select name="up-color" class="form-control" id="up-color" disabled>
                                <option value="" selected hidden>SELECT COLOR</option>
                                <option style="color:#6772e5;" value="#6772e5">&#9724; Purple</option>
                                <option style="color:#24d2b5;" value="#24d2b5">&#9724; Green</option>
                                <option style="color:#20aee3;" value="#20aee3">&#9724; Blue</option>
                                <option style="color:#ff9041;" value="#ff9041">&#9724; Orange</option>
                                <option style="color:#ff5c6c;" value="#ff5c6c">&#9724; Red</option>
                                <option style="color:#000;" value="#000">&#9724; Black</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="sl-icon-close"></i> Close</button>
                <button type="submit" class="btn btn-danger save-event waves-effect waves-light" id="btn-delete"><i class="sl-icon-trash"></i> Delete</button>
                <button type="submit" class="btn btn-success save-event waves-effect waves-light" id="btn-edit"><i class="sl-icon-note"></i> Edit</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->