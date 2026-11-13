$(document).ready(function () {

    initializeDataTable('file-data-table');
    initializeDataTable('file-data-table-2');
    initializeDataTable('file-data-table-3');
    initializeDataTable('file-data-table-4');
    initializeDataTable('file-data-table-5');
    initializeDataTable('file-data-table-6');
    initializeDataTable('file-data-table-7');
    initializeDataTable('file-data-table-8');

    // var datable = $('#file-data-table').DataTable({
    //     "columns": [
    //         { "data": "filename" },
    //         {
    //             "data": "type",
    //             "render": function (data, type, row, meta) {
    //                 return `<span class="label label-warning">${row.type}</span>`;
    //             }
    //         },
    //         { "data": "date_added" },
    //         {
    //             "data": "action",
    //             "render": function (data, type, row, meta) {
    //                 let action = `
    //                 <div class="action-area">
    //                     <a href="${param['BASE_URL']}upload/timesheets/${row.filename}" class="action-btn download-btn" download><i class="fas fa-download"></i></a>
    //                     <a href="javascript:;" data-id="${row.id}" class="action-btn remove-file"><i class="fas fa-trash"></i></a>
    //                 </div>
    //                 `;
    //                 return action;
    //             }
    //         },
    //     ],
    //     "order": [[1, "asc"]],
    //     "ajax": {
    //         url: `${param['BASE_URL']}timesheets/list`,
    //         type: 'POST',
    //         data: function (d) {
    //             let type = $('select[name="filter"]').val()
    //             d.filterType = type
    //         }
    //     },
    //     "autoWidth": false, "bPaginate": true
    // })
    
    var datable3 = $('#timesheets-data-table').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "destroy": true,
        "order": [
          [0, 'desc']
        ],
        "columns": [
            { "data": "filename" },
            {
                "data": "uploadedby",
                "render": function (data, type, row, meta) {
                    return `<span class="label label-primary"  ${row.uploadedby == 1 ? 'style="background: black;"' : ''}>${row.uploadedby == 1 ? 'Admin'  : 'You'}</span>`;
                }
            },
            { "data": "date_added" },
            {
                "data": "id",
                "render": function (data, type, row, meta) {
                    let action = `
                    <div class="action-area">
                        <a href="${param['BASE_URL']}upload/timesheets/${row.filename}" class="action-btn download-btn" download><i class="fas fa-download"></i></a>
                        <a href="javascript:;" data-id="${row.id}" class="action-btn remove-file"><i class="fas fa-trash"></i></a>
                    </div>
                    `;
                    return action;
                }
            },
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url":  `${param['BASE_URL']}timesheets/listofdata`,
          "type": "POST",
        },
      });


    // Funtions
    addFiles()
    remove_file()
    onFilter()
    triggerForm()
    addTimesheet()
    adddocsmodal()

    $('#exampleModalCenter').on('hidden.bs.modal', function(){
        $('#file_label').text('');
    })
      
});

param['process_setting'] = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    allowOutsideClick: false,
    allowEscapeKey: false
});

function addFiles(datable) {
    $(document).on('submit', '#add-file', function (e) {
        e.preventDefault()
        const form = new FormData(this)
        const file_type = $('[name="file_type"]').val()
        const file = $('[name="file"]').val()
        if (!file_type) {
            alert('error', 'Please select file type')
        } else if (!file) {
            alert('error', 'Please choose file')
        } else {
            const response = server(`${param['BASE_URL']}timesheets/upload`, form)
            if (response.status) {
                $('#exampleModalCenter').modal('hide');
                    $('#file-data-table-8').DataTable().ajax.reload()
                    $('#file-data-table-7').DataTable().ajax.reload()
                    $('#file-data-table-6').DataTable().ajax.reload()
                    $('#file-data-table-5').DataTable().ajax.reload()
                    $('#file-data-table-4').DataTable().ajax.reload()
                    $('#file-data-table-3').DataTable().ajax.reload()
                    $('#file-data-table-2').DataTable().ajax.reload()
                    $('#file-data-table').DataTable().ajax.reload()
                alert('success', 'File Successfully Added!')
            }
        }
    })
}

function triggerForm() {
    $(document).on('click', '#upload-time-btn', function () {
        $('#add-file').trigger('submit')
    })
}

function addTimesheet(){
    $(document).on('submit', '#add-timesheet', function (e) {
        e.preventDefault()
        const form = new FormData(this)
        const file = $('[name="file"]').val()
        if (!file) {
            alert('error', 'Please choose file')
        } else {
            const response = server(`${param['BASE_URL']}timesheets/uploadtimesheet`, form)
            if (response.status) {
                $('#exampleModalCenter').modal('hide');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'File Successfully added!',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#timesheets-data-table').DataTable().ajax.reload()
                $('#file_label').text('');
            }
            
        }
    })
}

function alert(error, message) {
    return param['process_setting'].fire({
        position: 'top-end',
        icon: `${error}`,
        title: `<span class="d-inline-block ml-2 text-uppercase">${message}</span>`,
        timer: 3000
    })
}

function remove_file(datable) {
    $(document).on('click', '.remove-file', function () {
        const id = $(this).attr('data-id')
        const form = new FormData()
        form.append('id', id)
        Swal.fire({
            title: "COFIRMATION",
            text: "Are you do you want to remove this file? You will not be able to recover this file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: `<i class="fas fa-trash"></i> Yes, remove the file`,
            closeOnConfirm: false
        }).then((result) => {
            if (result.isConfirmed) {
                const response = server(`${param['BASE_URL']}timesheets/remove`, form)
                if (response.status) {
                    $('#file-data-table-8').DataTable().ajax.reload()
                    $('#file-data-table-7').DataTable().ajax.reload()
                    $('#file-data-table-6').DataTable().ajax.reload()
                    $('#file-data-table-5').DataTable().ajax.reload()
                    $('#file-data-table-4').DataTable().ajax.reload()
                    $('#file-data-table-3').DataTable().ajax.reload()
                    $('#file-data-table-2').DataTable().ajax.reload()
                    $('#file-data-table').DataTable().ajax.reload()
                    alert('success', 'File Successfully Removed!')
                }
            }
        })
    })
}

function onFilter(datable) {
    $(document).on('change', 'select[name="filter"]', function () {
        $('#file-data-table-8').DataTable().ajax.reload()
                    $('#file-data-table-7').DataTable().ajax.reload()
                    $('#file-data-table-6').DataTable().ajax.reload()
                    $('#file-data-table-5').DataTable().ajax.reload()
                    $('#file-data-table-4').DataTable().ajax.reload()
                    $('#file-data-table-3').DataTable().ajax.reload()
                    $('#file-data-table-2').DataTable().ajax.reload()
                    $('#file-data-table').DataTable().ajax.reload()
    })
}


//////////////////////////////// NEW CODE :< /////////////////////////////////////////////

function adddocsmodal(){
    var optionValues = {
        "1": "Licenses",
        "2": "TB screening/test",
        "3": "Background check clearance result",
        "4":"Dementia training certificates",
        "5":"CPR card",
        "6":"OIG clearance report",
        "7":"Workers compensation insurance",
        "8":"Liability insurance"
      };
   
    $(document).on('click','button[name="button1"]', function(){
        var data = $(this).attr('data-id');
        $('option[value="' + (optionValues[data] || '') + '"]').prop('selected', true);
    })
    $(document).on('click','button[name="button2"]', function(){
        var data = $(this).attr('data-id');
        $('option[value="' + (optionValues[data] || '') + '"]').prop('selected', true);
    })
    
}

function initializeDataTable(tableId) {

    // Display tables
    var optionValues = {
        "1": "Licenses",
        "2": "TB screening/test",
        "3": "Background check clearance result",
        "4":"Dementia training certificates",
        "5":"CPR card",
        "6":"OIG clearance report",
        "7":"Workers compensation insurance",
        "8":"Liability insurance"
      };

    $(document).on('click','.nav-link',function(){
        var datatab = $(this).attr('data-id');
        $('option[value="' + (optionValues[datatab] || '') + '"]').prop('selected', true);
        $('.filter').trigger('change');
        $('#' + tableId).DataTable().ajax.reload()
    })

    
    var datable = $('#' + tableId).DataTable({
        "columns": [
            { "data": "filename" },
            {
                "data": "type",
                "render": function (data, type, row, meta) {
                    return `<span class="label label-warning">${row.type}</span>`;
                }
            },
            { "data": "date_added" },
            {
                "data": "action",
                "render": function (data, type, row, meta) {
                    let action = `
                    <div class="action-area">
                        <a href="${param['BASE_URL']}upload/timesheets/${row.filename}" class="action-btn download-btn" download><i class="fas fa-download"></i></a>
                        <a href="javascript:;" data-id="${row.id}" class="action-btn remove-file"><i class="fas fa-trash"></i></a>
                    </div>
                    `;
                    return action;
                }
            },
        ],
        "order": [[1, "asc"]],
        "ajax": {
            url: `${param['BASE_URL']}timesheets/list`,
            type: 'POST',
            data: function (d) {
                let type = $('select[name="filter"]').val()
                d.filterType = type
            }
        },
        "autoWidth": false, "bPaginate": true
    })
    

    
}



// const drop = () => {
//     $('.dropzone-area').on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
//         e.preventDefault();
//         e.stopPropagation();
//     }).on('dragover dragenter', function () {
//         $(this).addClass('onDrop');
//     }).on('dragleave dragend drop', function () {
//         $(this).removeClass('onDrop');
//     }).on('drop', function (e) {
//         param['process_setting'].fire({
//             position: 'bottom-start',
//             icon: 'warning',
//             title: '<span class="d-inline-block ml-2 text-uppercase">uploading file, please wait..</span>'
//         });
//         droppedFiles = e.originalEvent.dataTransfer.files;
//         param['DATA'] = new FormData();
//         param['ERROR'] = 0;
//         param['allowed_file'] = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf']
//         $.each(droppedFiles, function (index, filedata) {
//             param['DATA'].append('file[]', filedata);
//             if (!param['allowed_file'].includes(filedata.type)) {
//                 param['ERROR']++;
//             }
//         });
//         if (param['ERROR'] == 0) {
//             param['server_request'] = server(`${param['BASE_URL']}timesheets/drop`, param['DATA']);
//             if (param['server_request'].status) {
//                 param['overall_data'] = file_data(param['server_request'].file_data);
//                 setTimeout(function () {
//                     param['process_setting'].fire({
//                         position: 'bottom-start',
//                         icon: 'success',
//                         title: '<span class="d-inline-block ml-2 text-uppercase">file successfully uploaded</span>',
//                         timer: 3000
//                     }).then((result) => {
//                         $('.dropzone-area').html(param['overall_data'])
//                     });
//                 }, 2000);
//             } else {
//                 ERROR();
//             }
//         } else {
//             setTimeout(function () {
//                 param['process_setting'].fire({
//                     position: 'bottom-start',
//                     icon: 'info',
//                     title: '<span class="d-inline-block ml-2 text-uppercase">Invalid file extension</span>',
//                     timer: 3000
//                 });
//             }, 2000);
//         }
//     });
//     $(document).on('click','.dropzone-area',function(event){
//         $('#hidden-file').trigger('click');
//     });
//     $(document).on('click','.file-container',function(event){
//         event.stopPropagation();
//         $.each($('.dropdown-menu'), function(index, attr){
//             if($(attr).hasClass('show')){
//                 $(attr).removeClass('show');
//                 return false;
//             }
//         });
//     });
// }

// const file_data = (data) => {
//     var htmlEleme = null;
//     if(data.length !== 0){
//         htmlEleme = '<div class="files-content-here">';
//         $.each(data, function(index, file_info){
//             htmlEleme += `<div class="file-container">
//                 <div class="text-right">
//                     <button class="button-action-file " id="action-file" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="sl-icon-options-vertical"></i></button>
//                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="action-file">
//                         <a class="dropdown-item text-uppercase custom-drop-item font-weight-bold" href="${param['BASE_URL']}upload/timesheets/${file_info.filename}" target="_blank" download>download</a>
//                         <a class="dropdown-item text-uppercase custom-drop-item text-danger font-weight-bold" id="remove-file" data-id ="${file_info.id}">remove</a>
//                     </div>
//                 </div>
//                 <div class="image-timesheets">
//                     <img src="${param['BASE_URL']}assets/img/timesheets.png" alt="Timesheets" class="file-icon">
//                 </div>
//                 <span class="text-left d-block name-area"><i class="fas fa-folder mr-2"></i> ${file_info.filename}</span>
//             </div>`;
//         });
//         htmlEleme += '</div>';
//     }else{
//         htmlEleme = `<h6 class="text-uppercase font-weight-bold">Select files</h6>
//         <span class="text-uppercase d-block" style="font-size:11px;">or Drop dpf/docx Files Here</span>`;
//     }
//     return htmlEleme;
// }

// const remove_file = () => {
//     let flag = false;
//     $(document).on('click','#remove-file',function(event){
//         flag = true;
//         param['file_id'] = $(this).attr('data-id');
//         param['DATA'] = new FormData();
//         param['DATA'].append('id', param['file_id']);
//         param['process_setting'].fire({
//             position: 'bottom-start',
//             icon: 'info',
//             title: '<span class="d-inline-block ml-2 text-uppercase">Deleting the file.. <a href="javascript:;" class="font-weight-bold" id="undo">UNDO</span>',
//             timer: 5000
//         }).then((result) => {
//             if(flag){
//                 param['server_request'] = server(`${param['BASE_URL']}timesheets/remove`, param['DATA']);
//                 if (param['server_request'].status) {
//                     param['overall_data'] = file_data(param['server_request'].file_data);
//                     param['process_setting'].fire({
//                         position: 'bottom-start',
//                         icon: 'success',
//                         title: '<span class="d-inline-block ml-2 text-uppercase">file successfully deleted</span>',
//                         timer: 3000
//                     }).then((result) => {
//                         $('.dropzone-area').html(param['overall_data'])
//                     });
//                 } else {
//                     ERROR();
//                 }
//             }
//         });
//     });
//     $(document).on('click','#undo',function(event){
//         flag = false;
//         param['process_setting'].fire({
//             position: 'bottom-start',
//             icon: 'success',
//             title: '<span class="d-inline-block ml-2 text-uppercase">file successfully undo</span>',
//             timer: 2000
//         });
//     });
// }


// const select_file = () => {
//     $(document).on('change','#hidden-file',function(event){
//         param['process_setting'].fire({
//             position: 'bottom-start',
//             icon: 'warning',
//             title: '<span class="d-inline-block ml-2 text-uppercase">uploading file, please wait..</span>'
//         });
//         param['this'] = $(this)[0].files;
//         param['DATA'] = new FormData();
//         param['ERROR'] = 0;
//         param['allowed_file'] = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf'];
//         $.each(param['this'], function (index, filedata) {
//             param['DATA'].append('file[]', filedata);
//             if (!param['allowed_file'].includes(filedata.type)) {
//                 param['ERROR']++;
//             }
//         });
//         if (param['ERROR'] == 0) {
//             param['server_request'] = server(`${param['BASE_URL']}timesheets/drop`, param['DATA']);
//             if (param['server_request'].status) {
//                 param['overall_data'] = file_data(param['server_request'].file_data);
//                 setTimeout(function () {
//                     param['process_setting'].fire({
//                         position: 'bottom-start',
//                         icon: 'success',
//                         title: '<span class="d-inline-block ml-2 text-uppercase">file successfully uploaded</span>',
//                         timer: 3000
//                     }).then((result) => {
//                         $('.dropzone-area').html(param['overall_data'])
//                     });
//                 }, 2000);
//             } else {
//                 ERROR();
//             }
//         } else {
//             setTimeout(function () {
//                 param['process_setting'].fire({
//                     position: 'bottom-start',
//                     icon: 'info',
//                     title: '<span class="d-inline-block ml-2 text-uppercase">Invalid file extension</span>',
//                     timer: 3000
//                 });
//             }, 2000);
//         }
//     });
// }