$(document).ready(function () {
    onload();
    select();
    select_schedule();
    viewdescrip();
});

param['process_setting'] = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    allowOutsideClick: false,
    allowEscapeKey: false
});

const select = () => {
    $(".select2").select2({ width: '100%' }).on('select2:select', function (e) {
        $('#search-result').html(`<div class="searching-area mt-4">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p class="mt-3">PLEASE WAIT FOR A SECONDS, WE ARE FINDING YOUR SELECTED SERVICE LOCATION..</p>
            </div>`);
        let schedules = '';
        param['DATA'] = new FormData();
        param['DATA'].append('service_location', $(this).val());
        param['server_request'] = server(`${param['BASE_URL']}home/schedules`, param['DATA']);
        if (param['server_request'].length !== 0) {
            schedules += `<div class="event-list">`;
            $.each(param['server_request'], function (index, arr) {
                schedules += `<span class="d-block font-weight-bold mb-3" style="font-size:13px;">Available schedule on - ${index}</span>`;
                param['count'] = 0;
                $.each(arr, function (index, data) {
                    param['count']++;
                    schedules += `<div class="card-schedule">
                        <div class="count-h">
                            <span class="numbering">${param['count']}</span>  <span class="card-tttle">Available Schedule</span>
                        </div>
                        <div class="title-hre">
                            ${data.title}
                        </div>
                        <span class="desript-span">Shift type: </span>
                        <div class="descript-her">
                            ${data.shift_type}
                        </div>
                        <div class="end-date text-danger">
                           <span>Ended on -</span> ${data.end_date}
                        </div>
                        <div class="action">
                            <a href="javascript:;" data-id="${data.id}" id="view-descript" title="Schedule Details" class="mr-1 bg-info"><i class="sl-icon-info"></i></a>
                            <a href="javascript:;" ${data.selected_stats ? `title="Selected Schedule" class="selected-items"><i class="sl-icon-check"></i>` : `data-id="${data.id}" data-title="${data.title}" data-startdate="${data.start_date}" data-endate="${data.end_date}" id="select-schedule" title="Select Schedule">Select Schedule <i class="sl-icon-plus"></i>`}</a>
                        </div>
                    </div>
                    <div class="details">
                        <span>Schedule Details</span>
                        <div class="details-childs">
                            <p>Tittle </p>
                            <h5>${data.title}</h5>
                            <p>Schedule Information </p>
                            <h5>${data.shift_type} and time start at ${data.start_time} - ${data.end_time}</h5>
                            <span>Start on ${data.start_date} - ${data.end_date}</span>
                        </div>
                    </div>`;
                });
                schedules += `<br>`;
            });
            schedules += `</div>`;
        } else {
            schedules = `<div class="text-center mt-5 mb-3 text-uppercase" style="color:#a6b7bf;">
                        <i class="sl-icon-close"></i> NO AVAILABLE SCHEDULE FOR THIS SERVICE LOCATION <b>${$(this).val()}</b>
                    </div>`;
        }
        setTimeout(function () {
            $('#search-result').html(schedules);
        }, 2000);
    });
}



const select_schedule = () => {
    $(document).on('click', '#select-schedule', function () {
     if(user_type == 1 ){
        param['this'] = $(this);
        param['this'].html(`<div class="spinner-border spinner-border-sm" role="status">
            <span class="sr-only">Loading...</span>
            </div>`);
        param['sched_id'] = $(this).attr('data-id');
        param['title'] = $(this).attr('data-title');
        param['start_date'] = $(this).attr('data-startdate');
        param['end_date'] = $(this).attr('data-endate');
        param['DATA'] = new FormData();
        param['DATA'].append('sched_id', param['sched_id']);
        Swal.fire({
            title: 'CONFIRMATION',
            showCancelButton: true,
            icon: 'warning',
            html: `<span style="font-size: 14px;">Are you sure you want to select this schedule <b class="text-danger text-uppercase">${param['title']}</b> on <b class="text-danger">${param['start_date']} - ${param['end_date']}</b> ?</span>`,
            confirmButtonText: 'Yes, Select it',
            confirmButtonColor: '#2a3e52',
        }).then((result) => {
            if (result.isConfirmed) {
                param['server_request'] = server(`${param['BASE_URL']}home/select`, param['DATA']);
                if (param['server_request'].status) {
                    param['this'].addClass('selected-items').html('<i class="sl-icon-check"></i>').removeAttr('id').removeAttr('data-id').removeAttr('data-title').removeAttr('data-startdate').removeAttr('data-endate').attr('title', 'Selected Schedule');
                    param['process_setting'].fire({
                        position: 'bottom-start',
                        icon: 'success',
                        title: '<span class="d-inline-block ml-2 text-uppercase">SUCCESSFULLY SELECTED..</span>',
                        timer: 3000
                    });
                }
            } else {
                param['this'].html(`Select Schedule <i class="sl-icon-plus"></i>`);
            }
        })


     }else{
        param['this'] = $(this);
        param['this'].html(`<div class="spinner-border spinner-border-sm" role="status">
            <span class="sr-only">Loading...</span>
            </div>`);
        param['sched_id'] = $(this).attr('data-id');
        param['title'] = $(this).attr('data-title');
        param['start_date'] = $(this).attr('data-startdate');
        param['end_date'] = $(this).attr('data-endate');
        param['DATA'] = new FormData();
        param['DATA'].append('sched_id', param['sched_id']);
        
        let selectOptions = '';

        
        const title = $(this).attr('data-title')
        const form = new FormData()
        form.append('title', title)
        response = server(`${param['BASE_URL']}home/getStaff`, form)
        if(response){
            console.log(response);
            $.each(response, function(index, option) {
                selectOptions += `<option value="${option.fk_user_id}">${option.full_name}</option>`;
            });

                // add select dropdown to the Swal modal
                Swal.fire({
                    title: 'CONFIRMATION',
                    showCancelButton: true,
                    icon: 'warning',
                    html: `
                    <label class="text-center text-info" style="font-weight:900;">Assign this schedule to:</label>
                    <select id="my-dropdown" name="my-dropdown" class="form-control custom-select text-center" style="width:60%;">
                        <option value="" selected hidden>---Select A Staff---</option>
                        ${selectOptions}
                    </select><br>
                    <span style="font-size: 14px;">Are you sure you want to select this schedule <b class="text-danger text-uppercase">${param['title']}</b> on <b class="text-danger">${param['start_date']} - ${param['end_date']}</b> ?</span>
                        `,
                    confirmButtonText: 'Yes, Select it',
                    confirmButtonColor: '#2a3e52',
                }).then((result) => {
                    if (result.isConfirmed) {
                        const selectedOptions = Array.from(document.getElementById('my-dropdown').selectedOptions)
                                                  .map(option => option.value);
                        // add selected options to FormData object
                        $.each(selectedOptions, function(index, value) {
                            param['DATA'].append('fk_user_id', value);
                        });
                        param['server_request'] = server(`${param['BASE_URL']}home/select`, param['DATA']);
                        if (param['server_request'].status) {
                            param['this'].html('Select Schedule <i class="sl-icon-plus"></i>').attr('title', 'Selected Schedule');
                            param['process_setting'].fire({
                                position: 'bottom-start',
                                icon: 'success',
                                title: '<span class="d-inline-block ml-2 text-uppercase">SUCCESSFULLY SELECTED..</span>',
                                timer: 3000
                            });
                        }else{
                            param['this'].html('Select Schedule <i class="sl-icon-plus"></i>').attr('title', 'Selected Schedule');
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please select a staff.',
                                showConfirmButton: false,
                                timer: 1500
                              })
                        }
                    } else {
                        param['this'].html(`Select Schedule <i class="sl-icon-plus"></i>`);
                    }
                })
            }
     }
    });

    
}


const viewdescrip = () => {
    $(document).on('click', '#view-descript', function () {
        param['this'] = $(this).parents('.card-schedule').next('.details');
        param['details'] = $('.details');
        if(param['this'].hasClass('active')){
           param['this'].slideUp().removeClass('active');
        }else{
            $.each(param['details'], function (index, attr) {
                if ($(attr).hasClass('active')) {
                    $(attr).slideUp().removeClass('active');
                    return false;
                }
            });
            param['this'].slideDown().addClass('active')
        }
    });
}

const onload = () => {
    var options = $('.select2 > optgroup:nth-child(1) > option');
    
    if($('.select2').attr('data-default') != ""){
        $.each(options, function(i, sltr){
                if($(sltr).val() != $('.select2').attr('data-default')){
                    $(sltr).attr('disabled', 'disabled')
                }
        });
    }
}