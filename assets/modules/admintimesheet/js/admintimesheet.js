$(document).ready(function () {
    initializeSelect2()
    initializeDataTable('file-data-table');
    initializeDataTable('file-data-table-2');
    initializeDataTable('file-data-table-3');
    initializeDataTable('file-data-table-4');
    initializeDataTable('file-data-table-5');
    initializeDataTable('file-data-table-6');
    initializeDataTable('file-data-table-7');
    initializeDataTable('file-data-table-8');
    
    // Staffing Agencies
    initializeAgenciesDataTable('file-data-table2');
    initializeAgenciesDataTable('file-data-table2-2');
    initializeAgenciesDataTable('file-data-table2-3');
    initializeAgenciesDataTable('file-data-table2-4');
    initializeAgenciesDataTable('file-data-table2-5');
    initializeAgenciesDataTable('file-data-table2-6');
    initializeAgenciesDataTable('file-data-table2-7');
    initializeAgenciesDataTable('file-data-table2-8');

    // var datable = $('#file-data-table').DataTable({
    //     "columns": [
    //         { "data": "filename" },
    //         {
    //             "data": "uploaded_by",
    //             "render": function (data, type, row, meta) {
    //                 return `<span class="label label-primary"  ${row.uploadedby == 1 ? 'style="background: black;"' : ''}>${row.uploadedby == 1 ? 'You uploaded to ' + row.uploaded_by : row.uploaded_by}</span>`;
    //             }
    //         },
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
    //         url: `${param['BASE_URL']}admintimesheet/contractor_list`,
    //         type: 'POST',
    //         data: function (d) {
    //             let type = $('select[name="filter"]').val()
    //             d.filterType = type
    //         }
    //     },
    //     "autoWidth": false, "bPaginate": true
    // })

    // var datable2 = $('#file-data-table2').DataTable({
    //     "columns": [
    //         { "data": "filename" },
    //         {
    //             "data": "uploaded_by",
    //             "render": function (data, type, row, meta) {
    //                 return `<span class="label label-primary">${row.uploaded_by}</span>`;
    //             }
    //         },
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
    //         url: `${param['BASE_URL']}admintimesheet/staffing_list`,
    //         type: 'POST',
    //         data: function (d) {
    //             let type = $('select[name="filter"]').val()
    //             d.filterType = type
    //         }
    //     },
    //     "autoWidth": false, "bPaginate": true
    // });


    var datable3 = $('#file-data-table3').DataTable({
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
                "data": "uploaded_by",
                "render": function (data, type, row, meta) {
                    return `<span class="label label-primary"  ${row.uploadedby == 1 ? 'style="background: black;"' : ''}>${row.uploadedby == 1 ? 'You uploaded to ' + row.uploaded_by : row.uploaded_by}</span>`;
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
          "url":  `${param['BASE_URL']}admintimesheet/contractor_timesheet`,
          "type": "POST",
        },
      });

      var datable4 = $('#file-data-table4').DataTable({
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
                "data": "uploaded_by",
                "render": function (data, type, row, meta) {
                    return `<span class="label label-primary">${row.uploaded_by}</span>`;
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
          "url":  `${param['BASE_URL']}admintimesheet/staffing_timesheet`,
          "type": "POST",
        },
      });


    
    remove_file()
    addFiles()
    triggerForm()
    // onFilter()
    add_timesheet()
    adddocsmodal();
});

function remove_file(datable, datable2) {
    $(document).on('click', '.remove-file', function () {
        const id = $(this).attr('data-id')
        const form = new FormData()
        form.append('id', id)
        Swal.fire({
            title: "COFIRMATION",
            text: "Are you do you want to remove this file? You will not be able to recover this file!",
            type: "warning",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: `<i class="fas fa-trash"></i> Yes, remove the file`,
            closeOnConfirm: false
        }).then((result) => {
            if (result.isConfirmed) {
                const response = server(`${param['BASE_URL']}admintimesheet/remove`, form)
                if (response.status) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'File Successfully Removed!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#file-data-table-8').DataTable().ajax.reload()
                    $('#file-data-table-7').DataTable().ajax.reload()
                    $('#file-data-table-6').DataTable().ajax.reload()
                    $('#file-data-table-5').DataTable().ajax.reload()
                    $('#file-data-table-4').DataTable().ajax.reload()
                    $('#file-data-table-3').DataTable().ajax.reload()
                    $('#file-data-table-2').DataTable().ajax.reload()
                    $('#file-data-table').DataTable().ajax.reload()

                    $('#file-data-table2-8').DataTable().ajax.reload()
                    $('#file-data-table2-7').DataTable().ajax.reload()
                    $('#file-data-table2-6').DataTable().ajax.reload()
                    $('#file-data-table2-5').DataTable().ajax.reload()
                    $('#file-data-table2-4').DataTable().ajax.reload()
                    $('#file-data-table2-3').DataTable().ajax.reload()
                    $('#file-data-table2-2').DataTable().ajax.reload()
                    $('#file-data-table2').DataTable().ajax.reload()
                }
            }
        })
    })
}

const initializeSelect2 = () => {
    $(".select2").select2({
        dropdownParent: $('#exampleModalCenter')
    });
   
}

function addFiles(datable, datable2) {
    $(document).on('submit', '#add-file', function (e) {
        e.preventDefault()
        const form = new FormData(this)
        console.log(form);
        const file_type = $('[name="file_type"]').val()
        const file = $('[name="file"]').val()
        if (!file_type) {
            alet('error', 'Please select file type')
        } else if (!file) {
            alet('error', 'Please choose file')
        } else {
            const response = server(`${param['BASE_URL']}admintimesheet/upload`, form)
            if (response.status) {
                $('#exampleModalCenter').modal('hide');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'File Successfully added!',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#file-data-table-8').DataTable().ajax.reload()
                $('#file-data-table-7').DataTable().ajax.reload()
                $('#file-data-table-6').DataTable().ajax.reload()
                $('#file-data-table-5').DataTable().ajax.reload()
                $('#file-data-table-4').DataTable().ajax.reload()
                $('#file-data-table-3').DataTable().ajax.reload()
                $('#file-data-table-2').DataTable().ajax.reload()
                $('#file-data-table').DataTable().ajax.reload()
                $('#file-data-table2-8').DataTable().ajax.reload()
                $('#file-data-table2-7').DataTable().ajax.reload()
                $('#file-data-table2-6').DataTable().ajax.reload()
                $('#file-data-table2-5').DataTable().ajax.reload()
                $('#file-data-table2-4').DataTable().ajax.reload()
                $('#file-data-table2-3').DataTable().ajax.reload()
                $('#file-data-table2-2').DataTable().ajax.reload()
                $('#file-data-table2').DataTable().ajax.reload()
            }
        }
    })
}

function add_timesheet() {
    $(document).on('submit', '#add-timesheet', function (e) {
        e.preventDefault()
        const form = new FormData(this)
        const file = $('[name="file"]').val()
        if (!file) {
            alet('error', 'Please choose file')
        } else {
            const response = server(`${param['BASE_URL']}admintimesheet/uploadtimesheet`, form)
            if (response.status) {
                $('#upload_timesheet').modal('hide');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'File Successfully added!',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#file-data-table3').DataTable().ajax.reload()
                $('#file-data-table4').DataTable().ajax.reload()
            }
        }
    })
}

function alet(type, message) {
    Swal.fire({
        title: 'ERROR',
        text: message,
        icon: type,
        showCancelButton: false,
        confirmButtonText: 'OKAY'
    })
}

function triggerForm() {
    $(document).on('click', '#upload-time-btn', function () {
        $('#add-file').trigger('submit')
    })
}

// function onFilter(datable, datable2) {
//     $(document).on('change', 'select[name="filter"]', function () {
//         datable.ajax.reload()
//         datable2.ajax.reload()
//     })
// }


// ==============================================================
// This is the Default server request AJAX
// ==============================================================
const server = (url, data) => {
    var res = null;
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function () {
        },
        success: function (data) {
            res = JSON.parse(data);
        },
        error: function (xhr) {
            ERROR();
        },
    });
    return res;
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
                "data": "uploaded_by",
                "render": function (data, type, row, meta) {
                    return `<span class="label label-primary"  ${row.uploadedby == 1 ? 'style="background: black;"' : ''}>${row.uploadedby == 1 ? 'You uploaded to ' + row.uploaded_by : row.uploaded_by}</span>`;
                }
            },
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
            url: `${param['BASE_URL']}admintimesheet/contractor_list`,
            type: 'POST',
            data: function (d) {
                let type = $('select[name="filter"]').val()
                d.filterType = type
            }
        },
        "autoWidth": false, "bPaginate": true
    });

    
}

function initializeAgenciesDataTable(tableId2){
    var datable2 = $('#' + tableId2).DataTable({
        "columns": [
            { "data": "filename" },
            {
                "data": "uploaded_by",
                "render": function (data, type, row, meta) {
                    return `<span class="label label-primary">${row.uploaded_by}</span>`;
                }
            },
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
            url: `${param['BASE_URL']}admintimesheet/staffing_list`,
            type: 'POST',
            data: function (d) {
                let type = $('select[name="filter"]').val()
                d.filterType = type
            }
        },
        "autoWidth": false, "bPaginate": true
    });
}