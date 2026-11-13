$(document).ready(function(){
    $("select.select123").change(function(){
        var selectedData = $(this).children("option:selected").val();
        console.log(selectedData);

        if(selectedData == 1){
            $('#other_fields').css('display','block');
            $('#other_fields2').css('display','none');
        }else{
            $('#other_fields2').css('display','block');
            $('#other_fields').css('display','none');
        }
        
    });

    var datable = $('#independentdocs-data-table').DataTable({
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
                    </div>
                    `;
                    return action;
                }
            },
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url":  `${param['BASE_URL']}staffingcoordinators/contrator_documents`,
          "type": "POST",
        },
      });

      var datable2 = $('#independentsheets-data-table').DataTable({
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
            {
                "data": "type",
                "render": function (data, type, row, meta) {
                    return `<span class="label label-warning">${row.type}</span>`;
                }
            },
            { "data": "date_added" },
            {
                "data": "id",
                "render": function (data, type, row, meta) {
                    let action = `
                    <div class="action-area">
                        <a href="${param['BASE_URL']}upload/timesheets/${row.filename}" class="action-btn download-btn" download><i class="fas fa-download"></i></a>
                    </div>
                    `;
                    return action;
                }
            },
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url":  `${param['BASE_URL']}staffingcoordinators/contractor_timesheet`,
          "type": "POST",
        },
      });


//staffing shhh

var datable = $('#agencydocs-data-table').DataTable({
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
                </div>
                `;
                return action;
            }
        },
    ],
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url":  `${param['BASE_URL']}staffingcoordinators/agency_timesheet`,
      "type": "POST",
    },
  });

  var datable2 = $('#agencysheets-data-table').DataTable({
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
        {
            "data": "type",
            "render": function (data, type, row, meta) {
                return `<span class="label label-warning">${row.type}</span>`;
            }
        },
        { "data": "date_added" },
        {
            "data": "id",
            "render": function (data, type, row, meta) {
                let action = `
                <div class="action-area">
                    <a href="${param['BASE_URL']}upload/timesheets/${row.filename}" class="action-btn download-btn" download><i class="fas fa-download"></i></a>
                </div>
                `;
                return action;
            }
        },
    ],
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url":  `${param['BASE_URL']}staffingcoordinators/agency_documents`,
      "type": "POST",
    },
  });
});
