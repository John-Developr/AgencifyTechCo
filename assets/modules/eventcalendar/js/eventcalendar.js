$(document).ready(function(){

    var tbl_schedules = $('#schedules-data-table').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "destroy": true,
        "order": [
          [0, 'desc']
        ],
        "columns": [
          {
            "data": "id",
            "width": "2%",
          },
          {
            "data": "title",
          },
          {
            "data": "shift_type",
          },
          {
            "data": "service_location",
          },
          {
            "data": "start_time",
              "render":function ( data, type, row, meta ) {
                var time = row.start_time;
                var hour = parseInt(time.split(":")[0]);
                var period = hour >= 12 ? "PM" : "AM";
                hour = hour % 12;
                hour = hour ? hour : 12;
                var convertedTime = hour + ":" + time.split(":")[1] + " " + period;
                return param['time'] = `<td>`+ convertedTime + `</td>`;
              }
          },
          {
            "data": "end_time",
              "render":function ( data, type, row, meta ) {
                var time = row.end_time;
                var hour = parseInt(time.split(":")[0]);
                var period = hour >= 12 ? "PM" : "AM";
                hour = hour % 12;
                hour = hour ? hour : 12;
                var convertedTime = hour + ":" + time.split(":")[1] + " " + period;
                return param['time'] = `<td>`+ convertedTime + `</td>`;
              }
          },
          {
            "data": "start_date",
          },
          {
            "data": "end_date",
          },
          {
            "data": "id",
            "render": function ( data, type, row, meta ) {
              param['actions'] = `<div class="btn-group d-flex justify-content-center" style="height:0vh;top: -10px;position: relative;">
                <a type="button" class="btn btn-info btn-circle" data-id="${row.id}" id="view-sched" data-toggle="modal" data-target="#view-details-modal"><i class="fa fa-eye"></i> </a>
                <a type="button" class="btn btn-success btn-circle" data-id="${row.id}" id="edit-sched" data-toggle="modal" data-target="#edit_modal"><i class="fa fa-edit"></i> </a>
                <a type="button" class="btn btn-danger btn-circle" data-id="${row.id}" id="delete-sched"><i class="fa fa-trash"></i> </a>
                </div>`;
              return param['actions'];
            }
          },
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url":  `${param['BASE_URL']}eventcalendar/displaySchedules`,
          "type": "POST",
        },
      });
    // End


    addsched();
    shiftoption();
    editschedule();
    deleteschedule();
    viewdetails();
});

function shiftoption(){
    $('#title').change(function() {
        var title = $(this).val();

        if(title === 'RN' || title === 'CNA' || title === 'HHA'){
            $('#shift_sched').change(function(){
                var sched = $(this).val();

                if(sched === 'AM'){
                    $('#time_start').val("06:00");
                    $('#time_end').val("14:00");
                }else if(sched === 'PM'){
                    $('#time_start').val("14:00");
                    $('#time_end').val("22:00");
                }else{
                    $('#time_start').val("22:00");
                    $('#time_end').val("06:00");
                }
            });
        }
    });

    $('#up_title').change(function() {
      var title = $(this).val();

      if(title === 'RN' || title === 'CNA' || title === 'HHA'){
          $('#up_shift_sched').change(function(){
              var sched = $(this).val();

              if(sched === 'AM'){
                  $('#up_time_start').val("06:00");
                  $('#up_time_end').val("14:00");
              }else if(sched === 'PM'){
                  $('#up_time_start').val("14:00");
                  $('#up_time_end').val("22:00");
              }else{
                  $('#up_time_start').val("22:00");
                  $('#up_time_end').val("06:00");
              }
          });
      }
  });

    $('#up_shift_sched').change(function(){
      var sched = $(this).val();

      if(sched === 'AM'){
          $('#up_time_start').val("06:00");
          $('#up_time_end').val("14:00");
      }else if(sched === 'PM'){
          $('#up_time_start').val("14:00");
          $('#up_time_end').val("22:00");
      }else{
          $('#up_time_start').val("22:00");
          $('#up_time_end').val("06:00");
      }
  });
}

function addsched(){
    $(document).on('submit', '#form_create', function(e){
     e.preventDefault();
     var form = $(this);
     var data = $(this).serializeArray()
     var url = (`${param['BASE_URL']}eventcalendar/addSched`)
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
           $('#schedules-data-table').DataTable().ajax.reload()
           $('#form_create')[0].reset();
           $('#create_modal').modal('hide');
           
     }else{
        $.each(res.errors, function(key, val){
            $('[name="'+ key +'"]', form).after(val);
        });
     }
    });
 }

 function editschedule(){
    $(document).on('click', '#edit-sched', function(){
      var data = { 'id': $(this).attr('data-id')};
      var url = (`${param['BASE_URL']}eventcalendar/scheduledetails`)
      var res = sendAjax(url, data)
      if(res){

        var up_start_time = res.start_time.slice(0, -3);
        var up_end_time = res.end_time.slice(0, -3);

        console.log(up_start_time);
        $('#up_id').val(res.id)
        $('#up_title :selected').append(res.title).attr("value", res.title);
        $('#up_shift_sched :selected').append(res.shift_type," Shift").attr("value", res.shift_type);
        $('#up_time_start').attr("value", up_start_time);
        $('#up_time_end').attr("value", up_end_time);
        $('#up_start').append(res.start_date).attr("value", res.start_date);
        $('#up_end').append(res.end_date).attr("value", res.end_date);
        $('#up_service_location :selected').append(res.service_location).attr("value", res.service_location);
          console.log(res);
      }
   });


   $('#edit_modal').on('hidden.bs.modal', function () {
     $('#up_title :selected').html("");
     $('#up_shift_sched :selected').html("");
    $(this).find('form').trigger('reset');
    });


    $(document).on('submit', '#form-edit', function(e){
      e.preventDefault();
      var data = $(this).serializeArray();
      var url = (`${param['BASE_URL']}eventcalendar/updatesched`)
      var res = sendAjax(url, data)

      if(res){
          Swal.fire({
              icon: res.icon,
              title: 'UPDATED',
              text: res.message,
              showConfirmButton: false,
              timer: 1500
            })
          $('#edit_modal').modal('hide');
      }
      $('#schedules-data-table').DataTable().ajax.reload()
      $('#form-edit')[0].reset();
  });

}

function deleteschedule(){
    $(document).on('click','#delete-sched', function(){
        var data = { 'id': $(this).attr('data-id')};
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed){
  
            var url = (`${param['BASE_URL']}eventcalendar/delete`)
            var res = sendAjax(url, data)
      
              if(res){
                  Swal.fire({
                      icon: res.icon,
                      title: 'DELETED',
                      text: res.message,
                      showConfirmButton: false,
                      timer: 1500
                    })
                    $('#schedules-data-table').DataTable().ajax.reload()
              }
          }
        })
    });
  }
  
  function viewdetails(){
    $(document).on('click', '#view-sched', function(){
      var data = { 'id': $(this).attr('data-id')};
      var url = (`${param['BASE_URL']}eventcalendar/scheduledetails`)
      var res = sendAjax(url, data)
      if(res){
        console.log(res);
        $('#title12').html(res.title);
        $('#type').html(res.shift_type);
        $('#location').html(res.service_location);
        $('#stime').html(res.start_time);
        $('#etime').html(res.end_time);
        $('#sdate').html(res.start_date);
        $('#edate').html(res.end_date);
        $('#created').html(res.create_at);
        
      }
   });
  
  }