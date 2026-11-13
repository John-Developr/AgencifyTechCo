$(document).ready(function(){
    
    var tbl_contractors = $('#coordinator-data-table').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "destroy": true,
        "order": [
          [0, 'desc']
        ],
        "columns": [
          {
            "data": "fk_id",
          },
          {
            "data": "facility_name",
          },
          {
            "data": "fullname",
          },
          {
            "data": "email",
          },
          {
            "data": "service_location",
          },
          {
            "data": "status",
            "render": function (data, type, row, meta) {
                param['htmlEleA'] = `<div class="text-center"><span class="label label-success label-rounded" style="color:black;">ACTIVATED</span></div>`;
                param['htmlEleD'] = `<div class="text-center"><span class="label label-danger label-rounded" style="color:black;">DEACTIVATED</span></div>`;
                return `${row.status == 0 ? param['htmlEleA'] : param['htmlEleD']}`;
            }
          },
          {
            "data": "status",
            "render": function(data, type, row, meta){
                param['actions'] = `<div class="btn-group d-flex justify-content-center" style="height:0vh;top: -10px;position: relative;">
                <a type="button" class="btn btn-info btn-circle" data-id="${row.fk_id}" id="view-details" data-toggle="modal" data-target="#view-details-modal"><i class="fa fa-eye"></i> </a>
              <a type="button" class="btn btn-success btn-circle" data-id="${row.fk_id}" id="edit-details" data-toggle="modal" data-target="#edit-coordinator"><i class="fa fa-edit"></i> </a>
              <a type="button" class="${row.status == 0 ? 'btn btn-warning btn-circle' : 'btn btn-danger btn-circle'}" data-id="${row.fk_id}" id="${row.status == 0 ? 'deactivate' : 'activate'}" title="${row.status == 0 ? 'deactivate' : 'activate'}">${row.status == 0 ? '<i class="fa fa-lock-open"></i>' : '<i class="fa fa-lock"></i>'}</a>
                </div>`;
                return param['actions'];
              }
          },
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url":  `${param['BASE_URL']}coordinators/listofcoordinators`,
          "type": "POST",
        },
      });
    // End


    // FUNCTIONS Ahh Ahh

    add();
    activate();
    deactivate();
    viewdetails();
    updatedetails();
})

function add(){
    $(document).on('submit', '#create-form', function(e){
        e.preventDefault();
        var data = $(this).serializeArray()
        var url = (`${param['BASE_URL']}coordinators/addcoordinators`)
        var res = sendAjax(url, data)
        
        if(res.status){
            Swal.fire({
                icon: 'success',
                title: 'ADDED',
                text: res.message,
                showConfirmButton: false,
                timer: 1500
              })
              $('#all').text(res.all);
              $('#activated').text(res.active);
            $('#coordinator-data-table').DataTable().ajax.reload()
        }else{
            Swal.fire({
                icon: 'error',
                title: 'ERROR',
                text: res.message,
                showConfirmButton: false,
                timer: 1500
              })
        }
       });
    $(document).on('click','#btn-create', function(){
    $('#create-form').submit();
    $('#create-form')[0].reset();
    $('#create-staff-coordinator').modal('hide');
    });
}

// Start: Deactivate Agencies
function deactivate(){
    $(document).on('click','#deactivate', function(){
        var data = { 'FK_ID' : $(this).attr('data-id')};
        var url = (`${param['BASE_URL']}coordinators/updatestatus`)
        var res = sendAjax(url, data)
        
        if(res){
            Swal.fire({
                icon: res.icon,
                title: 'DEACTIVATED',
                text: res.message,
                showConfirmButton: false,
                timer: 1500
              })
              $('#all').text(res.all);
              $('#deactivated').text(res.inactive);
              $('#activated').text(res.active);
              $('#coordinator-data-table').DataTable().ajax.reload()
        }
    });
}
// End:

// Start: Activate Agencies
function activate(){
    $(document).on('click','#activate', function(){
        var data = { 'FK_ID' : $(this).attr('data-id')};
        var url = (`${param['BASE_URL']}coordinators/updatestatus`)
        var res = sendAjax(url, data)
        
        if(res){
            Swal.fire({
                icon: res.icon,
                title: 'ACTIVATED',
                text: res.message,
                showConfirmButton: false,
                timer: 1500
              });
              $('#all').text(res.all);
              $('#deactivated').text(res.inactive);
              $('#activated').text(res.active);
              $('#coordinator-data-table').DataTable().ajax.reload()
        }
    });
}
// End:

// Start: View Contractor's Details
function viewdetails(){
    $(document).on('click', '#view-details', function(){
        var data = { 'id': $(this).attr('data-id')};
        var url = (`${param['BASE_URL']}coordinators/coordinatordetails`)
        var res = sendAjax(url, data)

        if(res){
            
            $('#fullname').html(res.fullname)
            $('#contact').html(res.phone)
            $('#emailaddress').html(res.email)
            $('#user').html(res.username)
            $('#bu_password').val(res.bu_password)
            
        }
        
    });

    $(document).on('click','#showpwd', function(){
        $(this).toggleClass("fa-eye fa-eye-slash");
        var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
        $("#bu_password").attr("type", type);
    });
}
// End:

function updatedetails(){
    $(document).on('click', '#edit-details', function(){
        var data = { 'id': $(this).attr('data-id')};
        var url = (`${param['BASE_URL']}coordinators/coordinatordetails`)
        var res = sendAjax(url, data)
        if(res){
            $('#up-location option[selected=""]').html("");
            $('#up-id').val(res.fk_id)
            $('#up_fac_name').val(res.facility_name);
            $('#up-fname').val(res.fname)
            $('#up-lname').val(res.lname)
            $('#up-username').val(res.username)
            $('#up-email').val(res.email)
            $('#up-password').val(res.bu_password)
            $('#up-phone').val(res.phone)
            $('#up-location option[selected=""]').append(res.service_location).attr("value",res.service_location);
            
        }
    });

    $(document).on('submit', '#edit-form', function(e){
        e.preventDefault();
        var data = $(this).serializeArray()
        var url = (`${param['BASE_URL']}coordinators/updateuserdetails`)
        var res = sendAjax(url, data)
        
        if(res){
            Swal.fire({
                icon: res.icon,
                title: 'UPDATED',
                text: res.message,
                showConfirmButton: false,
                timer: 1500
            })
            $('#coordinator-data-table').DataTable().ajax.reload()
        }
    });
    $(document).on('click','#btn-update', function(){
        $('#edit-form').submit();
        $('#edit-coordinator').modal('hide');
        
        });


        $('#edit-coordinator').on('hidden.bs.modal', function () {
          $('#up-title :selected').html("");
         });
}