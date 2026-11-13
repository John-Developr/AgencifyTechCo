$(document).ready(function () {
  // Start
  var datable = $('#coordinator-table-data').DataTable({
    "columns": [
      {
        "data": "fullname",
      },
      {
        "data": "email",
      },
      {
        "data": "phone",
      },
      {
        "data": "action",
        "render": function (data, type, row, meta) {
          let action = `<div class="action-area">
                        <a href="javascript:;" data-id="${row.id}" class="action-btn remove-file"><i class="fas fa-trash"></i></a>
                        <a href="javascript:;" data-id="${row.id}" class="action-btn edit-file"><i class="fas fa-edit"></i></a>
                    </div>`;
          return action;
        }
      },
    ],
    // Load data for the table's content from an Ajax source
    "ajax": {
      url: `${param['BASE_URL']}staff/list`,
      type: "POST",
    },
    "autoWidth": false, "bPaginate": true
  });
  // End
  triggerForm()
  add(datable)
  remove(datable)
  edit()

  updateTrigger()
  udpdate(datable)
});

param['process_setting'] = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  allowOutsideClick: false,
  allowEscapeKey: false
});

function triggerForm() {
  $(document).on('click', '#btn-create', function () {
    $('#create-form').trigger('submit')
  })
}

function add(datable) {
  $(document).on('submit', '#create-form', function (event) {
    event.preventDefault()
    const form = new FormData(this)
    response = server(`${param['BASE_URL']}staff/add`, form)
    if (response.status) {
      $('#create-staff-coordinator').modal('hide')
      message('success', 'Successfully added staff')
      $('#coordinator-table-data').DataTable().ajax.reload()
    }
  })
}

function remove(datable) {
  $(document).on('click', '.remove-file', function () {
    const id = $(this).attr('data-id')
    const form = new FormData()
    form.append('id', id)
    Swal.fire({
      title: "COFIRMATION",
      text: "Do you want to remove this staff?",
      type: "warning",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: `<i class="fas fa-trash"></i> Yes, remove this staff`,
      closeOnConfirm: false
    }).then((result) => {
      if (result.isConfirmed) {
        response = server(`${param['BASE_URL']}staff/remove`, form)
        if (response.status) {
          $('#coordinator-table-data').DataTable().ajax.reload()
          message('success', 'Staff Successfully Removed!')
        }
      }
    })
  })
}

function edit() {
  $(document).on('click', '.edit-file', function () {
    const id = $(this).attr('data-id')
    const form = new FormData()
    form.append('id', id)
    response = server(`${param['BASE_URL']}staff/fetch`, form)
    $.each(response[0], function (index, val) {
      $(`#edit-form input[name="${index}"]`).val(val)
      $(`#edit-form select[name="${index}"]`).val(val)
    })
    $('#edit-form').attr('data-id', response[0].id)
    $('#edit-coordinator').modal('show')
  })
}

function udpdate(datable) {
  $(document).on('submit', '#edit-form', function (event) {
    event.preventDefault()
    const id = $(this).attr('data-id')
    const form = new FormData(this)
    form.append('id', id)
    response = server(`${param['BASE_URL']}staff/update`, form)
    if (response.status) {
      $('#edit-coordinator').modal('hide')
      $('#coordinator-table-data').DataTable().ajax.reload()
      $('.custom-file-label').html('');
      message('success', 'Staff Successfully updated!')
    }
  })
}

function updateTrigger() {
  $(document).on('click', '#btn-update', function () {
    $('#edit-form').trigger('submit')
  })
}

function message(error, message) {
  return param['process_setting'].fire({
    position: 'top-end',
    icon: `${error}`,
    title: `<span class="d-inline-block ml-2 text-uppercase">${message}</span>`,
    timer: 3000
  })
}