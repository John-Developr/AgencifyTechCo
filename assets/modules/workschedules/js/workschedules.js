$(document).ready(function(){
    // Start
    var tbl_contractors = $('#contractors-data-table').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "destroy": true,
        "order": [
          [0, 'desc']
        ],
        "columns": [
          {
            "data": "fullname",
          },
          {
            "data": "title",
          },
          {
            "data": "start_date",
          },
          {
            "data": "end_date",
          },
          {
            "data": "status",
            "render": function (data, type, row, meta) {
                if(row.status == 0){
                    return param['htmlEleA'] = `<div class="text-center"><span class="label label-warning label-rounded">Pending</span></div>`;
                }else if(row.status == 1){
                    return param['htmlEleB'] = `<div class="text-center"><span class="label label-info label-rounded">In Progress</span></div>`;
                }else if(row.status == 2){
                    return param['htmlEleC'] = `<div class="text-center"><span class="label label-success label-rounded">Approved</span></div>`;
                }else{
                    return param['htmlEleC'] = `<div class="text-center"><span class="label label-danger label-rounded">Declined</span></div>`;
                }
            }
          },
          {
            "data": "status",
            "render": function(data, type, row, meta){
                return param['htmlEleB'] = `<div class="btn-group d-flex justify-content-center">
                    <a href="javascript:void(0);" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-cog" style="font-size:22px;"></i></a>
                        <div class="dropdown-menu animated flipInX" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="javascript:void(0);" data-id="${row.id}" id="approve"><i class="fas fa-check"></i> Approve</a>
                            <a class="dropdown-item" href="javascript:void(0);" data-id="${row.id}" id="decline"><i class="fas fa-times"></i> Decline</a>
                        </div>
                    </div>`;
              }
          },
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url":  `${param['BASE_URL']}/workschedules/contractorreq`,
          "type": "POST",
        },
      });
    // End

    // Start
    var tbl_agencies = $('#agencies-datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "destroy": true,
        "order": [
          [0, 'desc']
        ],
        "columns": [
          {
            "data": "fullname",
          },
          {
            "data": "title",
          },
          {
            "data": "start_date",
          },
          {
            "data": "end_date",
          },
          {
            "data": "status",
            "render": function (data, type, row, meta) {
                if(row.status == 0){
                    return param['htmlEleA'] = `<div class="text-center"><span class="label label-warning label-rounded">Pending</span></div>`;
                }else if(row.status == 1){
                    return param['htmlEleB'] = `<div class="text-center"><span class="label label-info label-rounded">In Progress</span></div>`;
                }else if(row.status == 2){
                    return param['htmlEleC'] = `<div class="text-center"><span class="label label-success label-rounded">Approved</span></div>`;
                }else{
                    return param['htmlEleC'] = `<div class="text-center"><span class="label label-danger label-rounded">Declined</span></div>`;
                }
            }
          },
          {
            "data": "status",
            "render": function(data, type, row, meta){
                return param['htmlEleB'] = `<div class="btn-group d-flex justify-content-center">
                    <a href="javascript:void(0);" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-cog" style="font-size:22px;"></i></a>
                        <div class="dropdown-menu animated flipInX" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="javascript:void(0);" data-id="${row.id}" id="approve2"><i class="fas fa-check"></i> Approve</a>
                            <a class="dropdown-item" href="javascript:void(0);" data-id="${row.id}" id="decline2"><i class="fas fa-times"></i> Decline</a>
                        </div>
                    </div>`;
                // return `${row.status != 1 ? param['htmlEleA'] : param['htmlEleB']}`;
              }
          },
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url":  `${param['BASE_URL']}/workschedules/agenciesreq`,
          "type": "POST",
        },
      });
    // End

    //Start: Function
    updatedschedContractor(); 
    updateschedagencies();
});

function updatedschedContractor(){

    $(document).on('click','#approve', function(){

        var data = { 'status_id' : $(this).attr('data-id')}
        var url = `${param['BASE_URL']}workschedules/approved`
        var res = sendAjax(url, data)

        if(res){
            Swal.fire({
                icon: 'success',
                title: 'APPROVED',
                text: 'Schedule Approved',
                showConfirmButton: false,
                timer: 1500
              })
              $('#contractors-data-table').DataTable().ajax.reload()
              $('#agencies-datatable').DataTable().ajax.reload()

        }
    });

    $(document).on('click','#decline', function(){
        var data = { 'status_id' : $(this).attr('data-id')}
        var url = `${param['BASE_URL']}workschedules/decline`
        var res = sendAjax(url, data)

        if(res){
            Swal.fire({
                icon: 'error',
                title: 'DECLINED',
                text: 'Schedule Declined',
                showConfirmButton: false,
                timer: 1500
              })
              $('#contractors-data-table').DataTable().ajax.reload()
              $('#agencies-datatable').DataTable().ajax.reload()
        }
    });
}

function updateschedagencies(){
    // Approved
    $(document).on('click','#approve2', function(){

        var data = {'status_id' : $(this).attr('data-id')}
        var url = `${param['BASE_URL']}workschedules/approved`
        var res = sendAjax(url, data)

        if(res){
            Swal.fire({
                icon: 'success',
                title: 'APPROVED',
                text: 'Schedule Approved',
                showConfirmButton: false,
                timer: 1500
              })
              $('#agencies-datatable').DataTable().ajax.reload()
              $('#agencies-datatable').DataTable().ajax.reload()
        }
    });

    // Decline
    $(document).on('click','#decline2', function(){
        var data = { 'status_id' : $(this).attr('data-id')}
        var url = `${param['BASE_URL']}workschedules/decline`
        var res = sendAjax(url, data)

        if(res){
            Swal.fire({
                icon: 'error',
                title: 'DECLINED',
                text: 'Schedule Declined',
                showConfirmButton: false,
                timer: 1500
              })
              $('#agencies-datatable').DataTable().ajax.reload()
              $('#agencies-datatable').DataTable().ajax.reload()
        }
    });
}



// $(document).ready(function () {
//   // Start
//   var tbl_contractors = $('#contractors-data-table').DataTable({
//     "processing": true,
//     "serverSide": true,
//     "responsive": true,
//     "destroy": true,
//     "order": [
//       [0, 'desc']
//     ],
//     "columns": [
//       {
//         "data": "fullname",
//       },
//       {
//         "data": "title",
//       },
//       {
//         "data": "start_date",
//       },
//       {
//         "data": "end_date",
//       },
//       {
//         "data": "status",
//         "render": function (data, type, row, meta) {
//           if (row.status == 0) {
//             return param['htmlEleA'] = `<div class="text-center"><span class="label label-warning label-rounded">Pending</span></div>`;
//           } else if (row.status == 1) {
//             return param['htmlEleB'] = `<div class="text-center"><span class="label label-info label-rounded">In Progress</span></div>`;
//           } else if (row.status == 2) {
//             return param['htmlEleC'] = `<div class="text-center"><span class="label label-secondary label-rounded">Approved</span></div>`;
//           } else if (row.status == 4) {
//             return param['htmlEleC'] = `<div class="text-center"><span class="label label-success label-rounded">completed</span></div>`;
//           } else {
//             return param['htmlEleC'] = `<div class="text-center"><span class="label label-danger label-rounded">Declined</span></div>`;
//           }
//         }
//       },
//       {
//         "data": "status",
//         "render": function (data, type, row, meta) {
//           param['htmlEleA'] = `<div class="btn-group d-flex justify-content-center">
//           <a href="javascript:void(0);" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-cog" style="font-size:22px;"></i></a>
//               <div class="dropdown-menu animated flipInX" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
//                   <a class="dropdown-item update-stats" href="javascript:void(0);" data-id="${row.id}" data-status-type="2"><i class="sl-icon-check" style="margin-left: 2px;margin-right: 5px;position: relative;bottom: -3px;"></i> Approved</a>
//                   <a class="dropdown-item update-stats" href="javascript:void(0);" data-id="${row.id}" data-status-type="3"><i class="sl-icon-close" style="margin-left: 2px;margin-right: 5px;position: relative;bottom: -3px;"></i> Decline</a>
//               </div>
//            </div>`;
//           param['htmlEleB'] = `<div class="btn-group d-flex justify-content-center">
//           <a href="javascript:void(0);" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-cog" style="font-size:22px;"></i></a>
//               <div class="dropdown-menu animated flipInX" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
//                   <a class="dropdown-item update-stats" href="javascript:void(0);" data-id="${row.id}" data-status-type="1"><i class="sl-icon-hourglass" style="margin-left: 2px;margin-right: 5px;position: relative;bottom: -3px;"></i> In Progress</a>
//                   <a class="dropdown-item update-stats" href="javascript:void(0);" data-id="${row.id}" data-status-type="4"><i class="sl-icon-check" style="margin-left: 2px;margin-right: 5px;position: relative;bottom: -3px;"></i> Completed</a>
//               </div>
//           </div>`;
//           return `${row.status == 0 ? param['htmlEleA'] : param['htmlEleB']}`;
//         }
//       },
//     ],
//     // Load data for the table's content from an Ajax source
//     "ajax": {
//       "url": `${param['BASE_URL']}/workschedules/contractorreq`,
//       "type": "POST",
//     },
//   });
//   // End

//   // Start
//   var tbl_agencies = $('#agencies-datatable').DataTable({
//     "processing": true,
//     "serverSide": true,
//     "responsive": true,
//     "destroy": true,
//     "order": [
//       [0, 'desc']
//     ],
//     "columns": [
//       {
//         "data": "fullname",
//       },
//       {
//         "data": "title",
//       },
//       {
//         "data": "start_date",
//       },
//       {
//         "data": "end_date",
//       },
//       {
//         "data": "status",
//         "render": function (data, type, row, meta) {
//           if (row.status == 0) {
//             return param['htmlEleA'] = `<div class="text-center"><span class="label label-warning label-rounded">Pending</span></div>`;
//           } else if (row.status == 1) {
//             return param['htmlEleB'] = `<div class="text-center"><span class="label label-info label-rounded">In Progress</span></div>`;
//           } else if (row.status == 2) {
//             return param['htmlEleC'] = `<div class="text-center"><span class="label label-secondary label-rounded" style="background:black;">Approved</span></div>`;
//           } else if (row.status == 4) {
//             return param['htmlEleC'] = `<div class="text-center"><span class="label label-success label-rounded">completed</span></div>`;
//           } else {
//             return param['htmlEleC'] = `<div class="text-center"><span class="label label-danger label-rounded">Declined</span></div>`;
//           }
//         }
//       },
//       {
//         "data": "status",
//         "render": function (data, type, row, meta) {
//           param['htmlEleA'] = `<div class="btn-group d-flex justify-content-center">
//                     <a href="javascript:void(0);" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-cog" style="font-size:22px;"></i></a>
//                         <div class="dropdown-menu animated flipInX" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
//                             <a class="dropdown-item update-stats" href="javascript:void(0);" data-id="${row.id}" data-status-type="2"><i class="sl-icon-check" style="margin-left: 2px;margin-right: 5px;position: relative;bottom: -3px;"></i> Approved</a>
//                             <a class="dropdown-item update-stats" href="javascript:void(0);" data-id="${row.id}" data-status-type="3"><i class="sl-icon-close" style="margin-left: 2px;margin-right: 5px;position: relative;bottom: -3px;"></i> Decline</a>
//                         </div>
//                      </div>`;
//           param['htmlEleB'] = `<div class="btn-group d-flex justify-content-center">
//                     <a href="javascript:void(0);" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-cog" style="font-size:22px;"></i></a>
//                         <div class="dropdown-menu animated flipInX" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
//                             <a class="dropdown-item update-stats" href="javascript:void(0);" data-id="${row.id}" data-status-type="1"><i class="sl-icon-hourglass" style="margin-left: 2px;margin-right: 5px;position: relative;bottom: -3px;"></i> In Progress</a>
//                             <a class="dropdown-item update-stats" href="javascript:void(0);" data-id="${row.id}" data-status-type="4"><i class="sl-icon-check" style="margin-left: 2px;margin-right: 5px;position: relative;bottom: -3px;"></i> Completed</a>
//                         </div>
//                     </div>`;
//           return `${row.status == 0 ? param['htmlEleA'] : param['htmlEleB']}`;
//         }
//       },
//     ],
//     // Load data for the table's content from an Ajax source
//     "ajax": {
//       "url": `${param['BASE_URL']}/workschedules/agenciesreq`,
//       "type": "POST",
//     },
//   });
//   // End

//   //Start: Function
//   // updatedschedContractor();
//   // updateschedagencies();
//   updateStats(tbl_agencies, tbl_contractors)
// });

// // in progress - 1
// // approved - 2
// // decline - 3
// // done - 4
// // pending - 0 

// function updateStats(table, table2) {
//   $(document).on('click', '.update-stats', function () {
//     const id = $(this).attr('data-id')
//     const status = $(this).attr('data-status-type')
//     let formInfo = new FormData()
//     formInfo.append('id', id)
//     formInfo.append('status', status)
//     const url = `${param['BASE_URL']}workschedules/status`
//     if (status == 2) {
//       Swal.fire({
//         title: 'CONFIRMATION',
//         text: "Are you sure you want to approved this schedule? You won't be able to revert this.",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, approved the schedule'
//       }).then((result) => {
//         if (result.isConfirmed) {
//           const reponse = ajax(url, formInfo)
//           if (reponse.status) {
//             table.ajax.reload()
//             table2.ajax.reload()
//             Swal.fire({
//               position: 'top-end',
//               icon: 'success',
//               title: 'Successfully updated status',
//               showConfirmButton: false,
//               timer: 1500
//             })
//           }
//         }
//       })
//     } else {
//       const reponse = ajax(url, formInfo)
//       if (reponse.status) {
//         table.ajax.reload()
//         table2.ajax.reload()
//         Swal.fire({
//           position: 'top-end',
//           icon: 'success',
//           title: 'Successfully updated status',
//           showConfirmButton: false,
//           timer: 1500
//         })
//       }
//     }
//   })
// }

// function ajax(url, data) {
//   var res = null;
//   $.ajax({
//     type: 'POST',
//     url: url,
//     data: data,
//     async: false,
//     processData: false,
//     contentType: false,
//     success: function (data) {
//       res = JSON.parse(data);
//     },
//     error: function (xhr) {
//       ERROR();
//     },
//   });
//   return res;
// }
