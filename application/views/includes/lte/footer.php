<?php if($page_title != 'table'): ?>
<footer class="main-footer">
    <strong>Copyright &copy; 2022 <a target="_blank" href="https://facebook.com/tydus016">Eduardo Omega Jr</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.4.3
    </div>
  </footer>
</div>
<?php endif; ?>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery -->
<script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('assets/') ?>dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>

<script src="<?php echo base_url('assets/') ?>dist/js/pages/dashboard3.js"></script>

<?php //if($page_title == 'Users list' || $page_title == 'Trash Bin'): ?>
  <script src="<?php echo base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?php //endif; ?>
<script src="<?php echo base_url('assets/') ?>plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url('assets/loading-overlay') ?>/loading-overlay.jquery.js"></script>

<?php// if($page_title == 'Stock Photos'): ?>
  <script src="<?php echo base_url('assets/') ?>plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/filterizr/jquery.filterizr.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('node_modules/') ?>selectize/selectize/dist/js/standalone/selectize.js"></script>
  <script type="text/javascript" src="<?php echo base_url('node_modules/') ?>selectize/selectize/dist/js/standalone/selectize.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/codemirror/codemirror.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/codemirror/mode/css/css.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/codemirror/mode/xml/xml.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
  <script src="<?php echo base_url('assets/') ?>copy_on_click/copy_on_click.js"></script>
<?php// endif; ?>

    <?php
        __load_assets__($__assets__,'js');
    ?>
<script>
$(document).ready(function(){
    get_users()
    get_theme()
    


  $('#toggle_theme').click(function(){
    var url = '<?php echo base_url('users/update_theme') ?>'
    var data = { 'id': '' }
    var res = sendAjax(url, data);

    if(res){
      get_theme()
    }
  })

  $('.image-upload').mouseover(function(e){
    $('.centered').show()
    $('.centered').css('cursor', 'pointer')
  })
  $('.image-upload').mouseout(function(e){
    $('.centered').hide()
  })
  
  file_input.onchange = evt => {
  const [file] = file_input.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}

})

function get_theme(){
    var theme_body = 'hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'
    var theme_nav = 'main-header navbar navbar-expand navbar-dark'
    var default_body = 'hold-transition sidebar-mini layout-fixed sidebar-collapse'
    var default_nav = 'main-header navbar navbar-expand navbar-white navbar-light'
    var url = '<?php echo base_url('users/users_theme') ?>'
    var res = getAjax(url)
      if(res){
        console.log(res)
        if(res.theme === '1'){
          $('#theme_body').addClass(theme_body)
          $('#theme_nav').addClass(theme_nav)
          $('#toggle_icon').addClass('nav-icon fas fa-toggle-on')
          getts('#fff')
        }
        else{
          $('#theme_body').addClass(default_body)
          $('#theme_nav').addClass(default_nav)
          $('#toggle_icon').addClass('nav-icon fas fa-toggle-off')
          getts('#000')
        }
      }
}


function get_users(){
  $.ajax({
    type: 'get',
    url: '<?php echo base_url('users/get_users_table') ?>',
    dataType: 'json',
    async: false,
    cache: false,
    success: function(response){
      $('#table_body').html('')
      var status_icon = '', status_title = '', block_icon = '', block_title = '';
      $.each(response, function(get, response){
        if(response.account_status === 'active'){
          status_icon = 'toggle-on'
          status_title = 'Deactivate this User'
        }
        else{
          status_icon = 'toggle-off'
          status_title = 'Activate this User'
        }
        if(response.account_status == 'blocked'){
          block_icon = 'user-slash'
          block_title = 'Unblock this user'
        }
        else{
          block_icon = 'user-times'
          block_title = 'Block this user'
        }
        $('#table_body').append(`
                  <tr>
                    <td>${response.id}</td>
                    <td>${response.first_name}&nbsp;${response.last_name}</td>
                    <td>${response.email}</td>
                    <td>${response.position}</td>
                    <td>${response.account_status}</td>
                    <td class="d-flex justify-content-center"> 
                      <button name="view_user" id="${response.id}" class="btn bg-gradient-warning btn-sm text-white">
                        <i class="fas fa-user-edit"></i>
                      </button> 
                      &nbsp;&nbsp;
                      <button title="${status_title}" name="change_user_status" id="${response.id}" class="btn bg-gradient-success btn-sm text-white">
                        <i class="fas fa-${status_icon}"></i>
                      </button> 
                      &nbsp;&nbsp;
                      <button title="Delete this user" name="delete_user" id="${response.id}" class="btn bg-gradient-danger btn-sm text-white">
                        <i class="fas fa-trash"></i>
                      </button> 
                      &nbsp;&nbsp;
                      <button title="${block_title}" name="block_user" id="${response.id}" class="btn bg-gradient-dark btn-sm text-white">
                        <i class="fas fa-${block_icon}"></i>
                      </button> 
                    </td>
                  </tr>
        `)
      })
    }
  })
}

<?php if($page_title == 'Users list'): ?>
  $(function () {
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $("#asd").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(document).on('click', 'button[name="view_user"]', function(){
    var data = { 'id': $(this).attr('id') }
    var url = '<?php echo base_url('users/select_user') ?>'

      $.ajax({
      type: 'post',
      dataType: 'json',
      data: data,
      url: url,
      cache: false,
      success: function(response){
        $('#first_name').val(response.data.first_name)
        $('#last_name').val(response.data.last_name)
        $('#email').val(response.data.email)
        $('#password').val(response.data.password)
        $('#position').val(response.data.position)
        $('#account_status').val(response.data.account_status)
        $('#id').val(response.data.id)

        $('#view_user').modal('show')
      }
    })
  })
  
  $('#update_profile').submit( function(e){
    e.preventDefault()
    var data = $(this).serialize() 
    $.ajax({
      type: 'post',
      dataType: 'json',
      data: data,
      url: '<?php echo base_url('users/update_user') ?>',
      cache: false,
      beforeSend: function(){
        loading_overlay('#form_modal_body', true)
      },
      success: function(response){
        loading_overlay('#form_modal_body', false)
        sweet_alert('Employee Profile Updated Successfully!', 'success', '', 'top-end')
        get_users()
        $('#view_user').modal('hide')
      },
      error: function(err){
        console.log(err)
      }
    })
  })

    $('#new_profile').submit(function(e){
        e.preventDefault()
        var data = $(this).serialize()
        var url = "<?php echo base_url('users/addnewuser') ?>"

        var res = sendAjax(url, data)
        if(res){
          sweet_alert(res.message, 'success', '', 'top-end')
          get_users()
          $('#add_user').modal('hide')
        }
 
      }); 

  $('#add_new_btn').click(function(){
    $('#add_user').modal('show')
  })

  $(document).on('click', 'button[name="delete_user"]', function(e){
    var data = {'id': $(this).attr('id') }
    var url = '<?php echo base_url('users/deleteuser') ?>'
    var res = sendAjax(url, data)
      if(res){
          sweet_alert(res.message, 'success', '', 'top-end')
          get_users()
      }
  })

  $(document).on('click', 'button[name="change_user_status"]', function(e){
    var data = {'id': $(this).attr('id') }
    var url = '<?php echo base_url('users/user_Status') ?>'
    var res = sendAjax(url, data)
      if(res){
        if(res.status === '500'){
          sweet_alert(res.message, 'error', '', 'top-end')
        }
        else{
          sweet_alert(res.message, 'success', '', 'top-end')
        }
        get_users()
      }
  })
  $(document).on('click', 'button[name="block_user"]', function(e){
    var data = {'id': $(this).attr('id') }
    var url = '<?php echo base_url('users/block_user') ?>'
    var res = sendAjax(url, data)
      if(res){
          sweet_alert(res.message, 'success', '', 'top-end')
          get_users()
      }
  })


<?php endif; ?>

<?php if($page_title == 'Stock Photos'): ?>
  get_photos()
  get_categories()
  $("#cats").selectize({
  plugins: ["remove_button"],
  delimiter: ",",
  createOnBlur: true,
  persist: true,
  create: function get1(input = '') {
    var url = '<?php echo base_url('stock_photos/selectCats') ?>'
    var data = { 'category': input }
    var res = sendAjax(url, data)
    if(res.status === '500'){
      sweet_alert(res.message, 'error', '', 'top-end')
      return {
      value: null,
      text: null,
    };
    }
    else{
    return {
      value: input,
      text: input,
    };
    }

  },
});

$("#selectize").selectize({
  maxItems: 5,
  plugins: ["remove_button"],
  delimiter: " , ",
  persist: true,
  createOnBlur: true,
  create: function (select) {
    return {
      value: select,
      text: select,
    };
  },
});
$("#selectize").change(function(){
  $('#tags').val( $(this).val())
})
function get_photos(){
  var url = '<?php echo base_url('stock_photos/getphotos') ?>'
  var res = getAjax(url)
  $('#stock_images_').html('') 
  $.each(res, function(key, res){
    $('#stock_images_').append(`
      <div class="filtr-item col-sm-2" data-category="${res.tags}" data-sort="${res.image_name}">
                      <div class="text-center">
                        <label>${res.image_title}</label>
        <a href="<?php echo base_url('upload/stocks/') ?>${res.image_name}" data-toggle="lightbox" data-title="${res.image_title}" data-footer="<div class='left' style='margin-right: auto !important;'><p><span class='text-bold'>Original Size:</span> ${res.width} x ${res.height} </p></div>
                        <div class='right'><p><span class='text-bold'><i class='fa fa-tags'></i></span> ${res.tags} </p></div>">
          <img src="<?php echo base_url('upload/stocks/') ?>${res.image_name}" style="width:250px !important; height:300px !important;" class="img-fluid mb-2" alt="${res.tags}"/>
        </a>
        </div>

                      <span class="float-left col-sm-6">
                        <a id="plus_download" href="<?php echo base_url('stock_photos/file_download/') ?>${res.id}" target="_blank" class="text-secondary" title="Download"> <i class="fas fa-file-download"></i> </a>
                        &nbsp;
                        <a href="javascript:" name="embed_btn" id="${res.id}" class="text-secondary" title="Embed"> <i class="fas fa-link"></i> </a>
                      </span>
                      <span class="float-right col-sm-6 text-right">Downloads: ${res.downloads}</span>
      </div>
    `)
  })
}
function get_categories(){
  var url = '<?php echo base_url('stock_photos/getCategories') ?>'
  var res = getAjax(url)
  $('#stock_categories').html('')
  $('#selectize').html('')
  $.each(res, function(key, res){
    $('#stock_categories').append(`
    <a class="dropdown-item" href="javascript:void(0)" data-filter="${res.name}">${res.name} </a>
    `)
    $('#selectize').append(`
    <option value="${res.name}">${res.name}</option>
    `)
  })
}


$('#search_bar').keyup(function(){
  var data = { 'search_bar': $(this).val() }
  var url = '<?php echo base_url('stock_photos/search_photos') ?>'
  var res = sendAjax(url, data)
  if(res){
  $('#stock_images_').html('')
  $.each(res, function(key, res){
    $('#stock_images_').append(`
    <div class="filtr-item col-sm-2" data-category="${res.tags}" data-sort="${res.image_name}">
                      <div class="text-center">
                        <label>${res.image_title}</label>
                      </div>
        <a href="<?php echo base_url('upload/stocks/') ?>${res.image_name}" data-toggle="lightbox" data-title="${res.image_title}" data-footer="<div class='left' style='margin-right: auto !important;'><p><span class='text-bold'>Original Size:</span> ${res.width} x ${res.height} </p></div>
                        <div class='right'><p><span class='text-bold'><i class='fa fa-tags'></i></span> ${res.tags} </p></div>">
          <img src="<?php echo base_url('upload/stocks/') ?>${res.image_name}" style="width:250px !important; height:300px !important;" class="img-fluid mb-2" alt="${res.tags}"/>
        </a>
                      <span class="float-left">
                        <a href="<?php echo base_url('stock_photos/file_download/') ?>${res.id}" target="_blank" class="text-secondary" title="Download"> <i class="fas fa-file-download"></i> </a>
                        &nbsp;
                        <a href="javascript:" name="embed_btn" id="${res.id}" class="text-secondary" title="Embed"> <i class="fas fa-link"></i> </a>
                      </span>
      </div>
    `)
  })
  }
})

$('#show_add_stock_modal').click(function(){
  $('#upload_stocks_modal').modal('show')
})
$('#show_add_categ_modal').click(function(){
  $('#add_categories_modal').modal('show')
})
$('#add_cats').click(function(){
  var data  = { 'categories': $('#cats').val() }
  var url = '<?php echo base_url('stock_photos/addcats') ?>'
  var res = sendAjax(url, data)
  if(res){
    get_categories()
    sweet_alert(res.message, 'success', '', 'top-end')
    $('#add_categories_modal').modal('hide')
    $('#cats').val('')
  }
})

$('#upload_stocks_form').submit(function(e){
  e.preventDefault()
  var data = new FormData(this)
  $.ajax({
      type: 'post',
      url: '<?php echo base_url('stock_photos/upload') ?>',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function(response){
        get_photos()
        sweet_alert(response.message, 'success', '', 'top-end')
        $('#upload_stocks_modal').modal('hide')
      }
    })
})

$(document).on('click', 'a[name="embed_btn"]', function(){
  var url = '<?php echo base_url('stock_photos/getPhotoData') ?>'
  var data = { 'id': $(this).attr('id') }
  var res = sendAjax(url, data)
  console.log(res.id)
  $('#embed_area').val('<img src="<?php echo base_url('upload/stocks/') ?>'+res.image_name+'" alt="'+res.tags+'" class="[insert_class_name_here]" id="[insert_id_tag_here]">')
  $('#code_mirror_modal').modal('show')
})

$('#copy_embed_btn').copyOnClick({
  copyMode: "attr",
  attrTarget: "value",
});



<?php endif; ?>


<?php if($page_title == 'Dashboard'): ?>
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Content Creator',
          'Web Programmer',
          'Web Designer',
          'Maintenance',
          'Marketing',
          'Web Security',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],

        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions,
    })
    var body = $('#theme_body').attr('class')
    function getts(color){
      Chart.defaults.global.defaultFontColor = color;
    }
    

<?php endif; ?>


<?php if($page_title == 'File Manager'): ?>
  getFolders()
function getFolders(){
  $.ajax({
    type: 'get',
    dataType: 'json',
    url: '<?php echo base_url('file_manager/get_folders') ?>',
    cache: false,
    success: function(response){
      $('#folders').html('')
      $.each(response, function(key, response){
        $('#folders').append(`
                    <div class="folder-div text-center">
                        <div class="folder_details text-bold">
                            <a href="<?php echo base_url('file_manager/folder/') ?>${response.id}">
                            <i class="fa fa-folder"></i> ${response.folder_name}
                            </a>
                        </div>
                    </div>
        `)
      })
    }
  })
}
<?php elseif($page_title == 'User Folder'): ?>
  getFoldersContents()
function getFoldersContents(){
  var get_ = getAjax('<?php echo base_url('file_manager/get_folder_contents/').$folder_id ?>');
  var get_1 = getAjax('<?php echo base_url('file_manager/get_sub_folder_contents/').$folder_id ?>');
  $('#files').html('')
  $('#sub_folders').html('')
  $.each(get_, function(key, get_){
    var filename = get_.file_name
    var shortText = jQuery.trim(filename).substring(0, 20)
    .trim(this) + "...";
    $('#files').append(`
      <div class="files-div text-center" title="${get_.file_name}">
       <div class="text-right">
                <div class="card-tools">
                  <a href="javascript:" id="${get_.id}" name="file_open" class="btn btn-tool">
                    <i class="fas fa-file-medical"></i>
                  </a>
                  <a href="javascript:" id="${get_.id}" name="file_delete" class="btn btn-tool">
                    <i class="fas fa-trash"></i>
                  </a>
                </div>
       </div>
        <div class="files_details text-bold">
          <div class="file_icon">
            <i id="files_details" class="fa fa-file-code"></i>
          </div>
          <div class="file_detail_content">
            <a target="_blank" href="<?php echo base_url('file_manager/file_download/') ?>${get_.id}">
               <i id="files_details" class="fa fa-download"></i> <small>${shortText}</small>
            </a>
          </div>
        </div>
      </div>
    `)
  })
  $.each(get_1, function(key, get_1){
    $('#sub_folders').append(`
      <div class="folder-div text-center" id="sub_folders">
        <div class="folder_details text-bold">
          <a href="<?php echo base_url('file_manager/sub_folder/') ?>${get_1.id}">
            <i class="fa fa-folder"></i> ${get_1.sub_folder_name}
          </a>
        </div>
      </div>
    `)
  })
}

$('#create_sub_folder_btn').click(function(){
  $('#create_folder_modal').modal('show')
})
$('#create_folder_btn').click(function(e){
  e.preventDefault()
  var data = {
    'sub_folder_name': $('#folder_name').val(),
    'folder_id': '<?php echo $folder_id ?>'
  }
  var res = sendAjax('<?php echo base_url('file_manager/create_sub_folder') ?>', data)
        if(res){
          sweet_alert(res.message, 'success', '', 'top-end')
          getFoldersContents()
          $('#create_folder_modal').modal('hide')
          $('#folder_name').val('')
        }
  })
  $('#upload_file_btn').click(function(){
    $('#set_folder_id').val( '<?php echo $folder_id ?>' )
    $('#upload_files_modal').modal('show')
  })
  $('#upload_files_form').submit(function(e){
    e.preventDefault()
    var data = new FormData(this)

    $.ajax({
      type: 'post',
      url: '<?php echo base_url('file_manager/upload_files') ?>',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function(response){
        console.log(response.message)
        getFoldersContents()
        sweet_alert('Files Uploaded Successfully!', 'success', '', 'top-end')
        $('#upload_files_modal').modal('hide')

      }
    })
  })
  $(document).on('click', 'a[name="file_delete"]', function(e){
    var data = { 'id': $(this).attr('id') }
    var url = '<?php echo base_url('file_manager/delete_file') ?>'
    var res = sendAjax(url, data)
    if(res){
          sweet_alert(res.message, 'success', '', 'top-end')
          getFoldersContents()
      }
  })
// end of user folder function
<?php elseif($page_title == 'Sub Folder'): ?>

  getSubData()
function getSubData(){
  var get_ = getAjax('<?php echo base_url('file_manager/get_sub_folder_data/').$sub_folder_id ?>');
  var get_1 = getAjax('<?php echo base_url('file_manager/get_sub_folder_contents/').$sub_folder_id ?>');

  $('#sub_files').html('')
  $('#sub_folders').html('')
  $.each(get_, function(key, get_){
    var filename = get_.file_name
    var shortText = jQuery.trim(filename).substring(0, 20)
    .trim(this) + "...";
    $('#sub_files').append(`
      <div class="files-div text-center">
       <div class="text-right">
                <div class="card-tools">
                  <a href="javascript:" id="${get_.id}" name="sub_file_open" class="btn btn-tool">
                    <i class="fas fa-file-medical"></i>
                  </a>
                  <a href="javascript:" id="${get_.id}" name="sub_file_delete" class="btn btn-tool">
                    <i class="fas fa-trash"></i>
                  </a>
                </div>
       </div>
        <div class="files_details text-bold">
          <div class="file_icon">
            <i id="files_details" class="fa fa-file-code"></i>
          </div>
          <div class="file_detail_content">
            <a target="_blank" href="<?php echo base_url('file_manager/sub_file_download/') ?>${get_.id}">
               <i id="files_details" class="fa fa-download"></i> <small>${shortText}</small>
            </a>
          </div>
        </div>
      </div>
    `)
  })
  $.each(get_1, function(key, get_1){
    $('#sub_folders').append(`
      <div class="folder-div text-center" id="sub_folders">
        <div class="folder_details text-bold">
          <a href="<?php echo base_url('file_manager/sub_folder/') ?>${get_1.id}">
            <i class="fa fa-folder"></i> ${get_1.sub_folder_name}
          </a>
        </div>
      </div>
    `)
  })
}
$(document).on('click', 'a[name="sub_file_delete"]', function(e){
    var data = { 'id': $(this).attr('id') }
    var url = '<?php echo base_url('file_manager/sub_delete_file') ?>'
    var res = sendAjax(url, data)
    if(res){
          sweet_alert(res.message, 'success', '', 'top-end')
          getSubData()
      }
  })

$('#upload_sub_file_btn').click(function(){
  $('#upload_sub_files_modal').modal('show')
  $('#set_sub_folder_id').val( '<?php echo $sub_folder_id ?>' )
})
$('#upload_sub_files_form').submit(function(e){
  e.preventDefault()
  var data = new FormData(this)
  $.ajax({
      type: 'post',
      url: '<?php echo base_url('file_manager/upload_sub_files') ?>',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function(response){
        console.log(response)
        getSubData()
        sweet_alert('Files Uploaded Successfully!', 'success', '', 'top-end')
        $('#upload_files_modal').modal('hide')

      }
    })
})

$('#create_sub_folder_btn').click(function(){
  $('#create_folder_modal').modal('show')
})
$('#create_folder_btn').click(function(e){
  e.preventDefault()
  var data = {
    'sub_folder_name': $('#folder_name').val(),
    'folder_id': '<?php echo $sub_folder_id ?>'
  }
  var res = sendAjax('<?php echo base_url('file_manager/create_sub_folder') ?>', data)
        if(res){
          sweet_alert(res.message, 'success', '', 'top-end')
          getSubData()
          $('#create_folder_modal').modal('hide')
          $('#folder_name').val('')
        }
  })

<?php elseif($page_title == 'Trash Bin'): ?>
  get_trash_data()
function get_trash_data(){
  var url = '<?php echo base_url('trash/gettrash') ?>'
  var res = getAjax(url)
  $('#trash_body').html('')
  if(res.length < 1 ){
      $('.trash_body').html('')
      $('.trash_body').append(`
                <div class="text-center">
                  <p><i class="fas fa-exclamation-circle"></i> Your bin is empty!</p>
                </div>
      `)
    }
  else{
  $.each(res, function(key, res){
      $('#trash_body').append(`
      <tr>
        <td>${res.file_id}</td>
        <td>${res.folder_id}</td>
        <td>${res.file_name}</td>
        <td>${res.uploaded_at}</td>
        <td>${res.deleted_at}</td>
        <td class="d-flex justify-content-center"> 
          <button title="retore file" name="restore_trash" id="${res.id}" class="btn bg-gradient-warning btn-sm text-white">
            <i class="fas fa-trash-restore"></i>
          </button> 
              &nbsp;&nbsp;
          <button title="delete forever" name="delete_trash" id="${res.id}" class="btn bg-gradient-danger btn-sm text-white">
            <i class="fas fa-trash"></i>
          </button> 
        </td>
      </tr>
    `)
  })
}
}


$(document).on('click', 'button[name="restore_trash"]', function(){
  var data = { 'id': $(this).attr('id') }
  var url = '<?php echo base_url('trash/restore_file') ?>'
  var res = sendAjax(url, data)
  if(res){
    sweet_alert(res.message, 'success', '', 'top-end')
    get_trash_data()
  }
})
$(document).on('click', 'button[name="delete_trash"]', function(){
  var data = { 'id': $(this).attr('id') }
  var url = '<?php echo base_url('trash/delete_file') ?>'
  var res = sendAjax(url, data)
  if(res){
    sweet_alert(res.message, 'success', '', 'top-end')
    get_trash_data()
  }
})
$('#empty_bin').click(function(){
  var data = {'table': 'trash_bin'}
  var url = '<?php echo base_url('trash/delete_all') ?>'
  var res = sendAjax(url, data)
  if(res){
    sweet_alert(res.message, 'success', '', 'top-end')
    get_trash_data()
  }
})
$('#restore_bin').click(function(){
  var data = {'table': 'trash_bin'}
  var url = '<?php echo base_url('trash/restore_all') ?>'
  console.log(data)
  var res = sendAjax(url, data)
  if(res){
    sweet_alert(res.message, 'success', '', 'top-end')
    get_trash_data()
  }
})

<?php endif; ?>

function sendAjax(url, data = {}){
  var res = null;
  $.ajax({
    type: 'post',
    dataType: 'json',
    data: data,
    url: url,
    cache: false,
    async: false,
    success: function(response){
      res = response
    }
  })
  return res
}
function getAjax(url){
  var res = null;
  $.ajax({
    type: 'get',
    dataType: 'json',
    url: url,
    cache: false,
    async: false,
    success: function(response){
      res = response
    }
  })
  return res
}
function loading_overlay(target, boolean) {
    $(target).loadingOverlay(boolean, {
        backgroundColor:'rgba(255,255,255,0.85)',
    });
}
function sweet_alert(title, icon, text = null, position =  'bottom-start'){
  Swal.fire({
  position: position,
  title: title,
  text: text,
  icon: icon,
  toast: true,
  timer: '3000',
  showConfirmButton: false,
  })
}

</script>
</body>
</html>
