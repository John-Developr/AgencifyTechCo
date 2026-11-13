$(document).ready(function(){
        
        // Start
        var tbl_contractors = $('#independent-data-table').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "destroy": true,
            "order": [
              [0, 'desc']
            ],
            "columns": [
              {
                "width": "5%",
                "data": "fullname",
              },
              {
                "width": "15%",
                "data": "email",
              },
              // {
              //   "width": "5%",
              //   "data": "degree",
              // },
              // {
              //   "data": "specialty",
              // },
              {
                "data": "service_location",
              },
              {
                "data": "status",
                "render": function (data, type, row, meta) {
                  param['htmlEleA'] = `<div class="text-center"><span class="label label-success label-rounded">ACTIVATED</span></div>`;
                  param['htmlEleD'] = `<div class="text-center"><span class="label label-danger label-rounded">DEACTIVATED</span></div>`;
                  return `${row.status == 0 ? param['htmlEleA'] : param['htmlEleD']}`;
                }
              },
              {
                "data": "status",
                "render": function(data, type, row, meta){
                  param['actions'] = `<div class="btn-group d-flex justify-content-center">
                        <a href="javascript:void(0);" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-cog" style="font-size:22px;"></i></a>
                        <div class="dropdown-menu animated flipInX" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="javascript:void(0);" data-id="${row.number_rows}" id="view"><i class="fas fa-eye"></i> View</a>
                        </div>
                      </div>`;
                  return param['actions'];
                  }
              },
            ],
            // Load data for the table's content from an Ajax source
            "ajax": {
              "url":  `${param['BASE_URL']}/allusers/independentContractors`,
              "type": "POST",
            },
          });
        // End
        

         // Start
         var tbl_agencies = $('#agencies-data-table').DataTable({
          "processing": true,
          "serverSide": true,
          "responsive": true,
          "destroy": true,
          "order": [
            [0, 'desc']
          ],
          "columns": [
            {
              "width": "5%",
              "data": "fullname",
            },
            {
              "width": "15%",
              "data": "email",
            },
            // {
            //   "data": "job_title",
            // },
            // {
            //   "data": "organization",
            // },
            {
              "data": "facility_location",
            },
            {
              "data": "status",
              "render": function (data, type, row, meta) {
                param['htmlEleA'] = `<div class="text-center"><span class="label label-success label-rounded">ACTIVATED</span></div>`;
                param['htmlEleD'] = `<div class="text-center"><span class="label label-danger label-rounded">DEACTIVATED</span></div>`;
                return `${row.status == 0 ? param['htmlEleA'] : param['htmlEleD']}`;
              }
            },
            {
              "data": "status",
              "render": function(data, type, row, meta){
                param['actions'] = `<div class="btn-group d-flex justify-content-center">
                      <a href="javascript:void(0);" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-cog" style="font-size:22px;"></i></a>
                      <div class="dropdown-menu animated flipInX" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <a class="dropdown-item" href="javascript:void(0);" data-id="${row.number_rows}" id="view1"><i class="fas fa-eye"></i> View</a>
                      </div>
                    </div>`;
                return param['actions'];
                }
            },
          ],
          // Load data for the table's content from an Ajax source
          "ajax": {
            "url":  `${param['BASE_URL']}/allusers/agencies`,
            "type": "POST",
          },
        });
      // End

        userdetails();
});

function userdetails(){
    
    $(document).on('click','#view', function(){
        
        var data = { 'id': $(this).attr('data-id')}
        var url = `${param['BASE_URL']}allusers/icuserdetails`;
        var res = sendAjax(url, data)
        

        if(res){
            console.log(res);
            $('#fullname').html(res.fullname)
            $('#email').html(res.email)
            $('#phone').html(res.phone)
            $('#location').html(res.service_location)
            // $('#degree').html(res.degree)
            $('#specialty').html(res.specialty)
            $('#username').html(res.username)
            // $('#password').html(res.password)
        }
        $('#indecont-modal').modal('show');
    });

    $(document).on('click','#view1', function(){

        var data = { 'id': $(this).attr('data-id')}
        var url = `${param['BASE_URL']}allusers/staffuserdetails`;
        var res = sendAjax(url, data)
        

        if(res){
            console.log(res);
            $('#fullname1').html(res.fullname)
            $('#email1').html(res.email)
            $('#phone1').html(res.phone)
            $('#location1').html(res.facility_location)
            $('#job').html(res.job_title)
            $('#org').html(res.organization)
            $('#username1').html(res.username)
            // $('#password').html(res.password)
        }
        $('#staff-modal').modal('show');
        
        
    });
    $('#indecont-modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $('#staff-modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });

}