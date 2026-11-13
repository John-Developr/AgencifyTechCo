$(document).ready(function(){
    // Start : contractor DataTable
    param['DATA'] = $('#agencies-data-table').DataTable({
      "columns": [
          { "data": "id" },
          { "data": "full_name" },
          { "data": "email" },
          { "data": "facility_location" },
          { "data": "date_added" },
          { "data": "status",
              "render": function (data, type, row, meta) {
              param['htmlEleA'] = `<div class="text-center"><span class="label label-success label-rounded" style="color:black;">ACTIVATED</span></div>`;
              param['htmlEleD'] = `<div class="text-center"><span class="label label-danger label-rounded" style="color:black;">DEACTIVATED</span></div>`;
              return `${row.status == 0 ? param['htmlEleA'] : param['htmlEleD']}`;
          }
          },
          { "data": "action",
              "render": function (data, type, row, meta) {
                  param['actions'] = `<div class="btn-group d-flex justify-content-center" style="height:0vh;top: -10px;position: relative;">
                  <a type="button" class="btn btn-info btn-circle" data-id="${row.fk_id}" id="view-details" data-toggle="modal" data-target="#view-details-modal"><i class="fa fa-eye"></i> </a>
                  <a type="button" class="btn btn-success btn-circle" data-id="${row.fk_id}" id="edit-details" data-toggle="modal" data-target="#edit-agencies"><i class="fa fa-edit"></i> </a>
                  <a type="button" class="${row.status == 0 ? 'btn btn-warning btn-circle' : 'btn btn-danger btn-circle'}" data-id="${row.fk_id}" id="${row.status == 0 ? 'deactivate' : 'activate'}" title="${row.status == 0 ? 'deactivate' : 'activate'}">${row.status == 0 ? '<i class="fa fa-lock-open"></i>' : '<i class="fa fa-lock"></i>'}</a>
                  </div>`;
                  return param['actions'];
              }
          },
      ],
      "order": [[ 1, "asc" ]],
      "ajax":{
          url: `${param['BASE_URL']}agencies/listofdata`,
          type:'POST',
      },
      "responsive": true, "autoWidth": false,
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ],
  });
  // End : Contractor DataTable

  // ===== FUNCTIONS ===== //
    add();
    deactivate();
    activate();
    viewdetails();
    updatedetails();
});

function add(){
    $(document).on('submit', '#create-form', function(e){
        e.preventDefault();
        var data = $(this).serializeArray()
        var url = (`${param['BASE_URL']}agencies/addstaffingagencies`)
        var res = sendAjax(url, data)
        console.log(res);
        if(res.status){
            Swal.fire({
                icon: res.icon,
                title: 'ADDED',
                text: res.message,
                showConfirmButton: false,
                timer: 1500
              })
              $('#all').text(res.all);
              $('#activated').text(res.active);
            $('#agencies-data-table').DataTable().ajax.reload()
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
    $('#create-staff-agency').modal('hide');
    });
}

// Start: Deactivate Agencies
function deactivate(){
    $(document).on('click','#deactivate', function(){
        var data = { 'FK_ID' : $(this).attr('data-id')};
        var url = (`${param['BASE_URL']}agencies/updatestatus`)
        var res = sendAjax(url, data)
        console.log(data);
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
              $('#agencies-data-table').DataTable().ajax.reload()
        }
    });
}
// End:

// Start: Activate Agencies
function activate(){
    $(document).on('click','#activate', function(){
        var data = { 'FK_ID' : $(this).attr('data-id')};
        var url = (`${param['BASE_URL']}agencies/updatestatus`)
        var res = sendAjax(url, data)
        console.log(data);
        if(res){
            Swal.fire({
                icon: res.icon,
                title: 'ACTIVATED',
                text: res.message,
                showConfirmButton: false,
                timer: 1500
              })
              $('#all').text(res.all);
              $('#deactivated').text(res.inactive);
              $('#activated').text(res.active);
            $('#agencies-data-table').DataTable().ajax.reload()
        }
    });
}
// End:

// Start: View Contractor's Details
function viewdetails(){
    $(document).on('click', '#view-details', function(){
        var data = { 'id': $(this).attr('data-id')};
        var url = (`${param['BASE_URL']}agencies/staffdetails`)
        var res = sendAjax(url, data)

        if(res){
            console.log();
            $('#fullname').html(res.fullname)
            $('#contact').html(res.phone)
            $('#emailaddress').html(res.email)
            $('#location').html(res.facility_location)
            $('#job').html(res.job_title)
            $('#org').html(res.organization)
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
        var url = (`${param['BASE_URL']}agencies/staffdetails`)
        var res = sendAjax(url, data)
            $('#up-location option[selected=""]').html("");
        if(res){
            console.log($('#up-location option[selected=""]'));
            $('#up-id').val(res.fk_id)
            $('#up-fname').val(res.fname)
            $('#up-lname').val(res.lname)
            $('#up-username').val(res.username)
            $('#up-email').val(res.email)
            $('#up-password').val(res.bu_password)
            $('#up-phone').val(res.phone)
            $('#up-job').val(res.job_title)
            $('#up-org').val(res.organization)
            $('#up-location option[selected=""]').append(res.facility_location).attr("value",res.facility_location);
        }
    });

    $(document).on('submit', '#edit-form', function(e){
        e.preventDefault();
        var data = $(this).serializeArray()
        var url = (`${param['BASE_URL']}agencies/updateuserdetails`)
        var res = sendAjax(url, data)
        console.log(res);
        if(res){
            Swal.fire({
                icon: res.icon,
                title: 'UPDATED',
                text: res.message,
                showConfirmButton: false,
                timer: 1500
            })
            $('#agencies-data-table').DataTable().ajax.reload()
        }
    });
    $(document).on('click','#btn-update', function(){
        $('#edit-form').submit();
        $('#up-location option[selected=""]').html("");
        $('#edit-agencies').modal('hide');
        
        });
}