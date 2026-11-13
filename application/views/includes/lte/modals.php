      <style>
.image-upload>input {
  display: none;
}
.centered {
  position: absolute;
  top:11%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none;
}
</style>

      <div class="modal fade" id="view_user">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" id="form_modal_body">
            <div class="modal-header">
              <h4 class="modal-title">User Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="d-flex justify-content-center">
                  <img class="profile-user-img img-fluid img-circle border-0"
                       src="<?php echo base_url('assets/') ?>dist/img/user4-128x128.jpg"
                       alt="User profile picture">
            </div>
            <form method="post" id="update_profile" enctype="multipart/form-data">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control form-control-sm" name="first_name" id="first_name" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control form-control-sm" name="last_name" id="last_name" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control form-control-sm" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="position">Company Position</label>
                <input type="text" class="form-control form-control-sm" 
                    name="position" id="position" aria-describedby="emailHelp" placeholder="Enter email">
                <input type="text" class="form-control form-control-sm" 
                    name="id" id="id" aria-describedby="emailHelp" value="" hidden>
            </div>
            <div class="form-group">
                <label for="account_status">Account Status</label>
                <input type="text" class="form-control form-control-sm" 
                    name="account_status" id="account_status" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            </div>
            <div class="modal-footer justify-content-between border-0">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update Details</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- add new user -->

            <form method="post" id="new_profile" autocomplete="off">
      <div class="modal fade" id="add_user">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" id="form_modal_body">
            <div class="modal-header">
              <h4 class="modal-title">Add new</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="d-flex justify-content-center">
                  <!-- <img class="profile-user-img img-fluid img-circle border-0"
                       src="<?php //echo base_url('assets/') ?>dist/img/user4-128x128.jpg"
                       alt="User profile picture"> -->

              <div class="image-upload text-white">
                <label for="file_input">
                  <img id="blah"   class="profile-user-img img-fluid img-circle border-0" style="width: 128; height: 128"
                  src="<?php echo base_url('assets/') ?>dist/img/user4-128x128.jpg"/>
                  <div class="centered"><i class="fa fa-camera text-success"></i></div>
                </label>
                <input id="file_input" name="files[]" type="file" multiple/>
              </div>

            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control form-control-sm" name="new_first_name" id="new_first_name" aria-describedby="emailHelp" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control form-control-sm" name="new_last_name" id="new_last_name" aria-describedby="emailHelp" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control form-control-sm" name="new_email" id="new_email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control form-control-sm" name="new_password" id="new_password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="position">Company Position</label>
                <input type="text" class="form-control form-control-sm" 
                    name="new_position" id="new_position" aria-describedby="emailHelp" placeholder="Enter position">
            </div>
            </div>
            <div class="modal-footer justify-content-between border-0">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Employee</button>
            </div>
          </div>
        </div>
      </div>
      </form>

      <?php if($page_title == 'File Manager' || $page_title == 'User Folder' || $page_title == 'Sub Folder'): ?>
      <!-- create sub folder -->
      <div class="modal fade" id="create_folder_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create new Folder</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" id="create_folder" enctype="multipart/form-data">
            <div class="form-group">
                <label for="first_name">Folder Name</label>
                <input type="text" class="form-control form-control-sm" name="folder_name" id="folder_name" placeholder="Enter folder name">
            </div>
            </div>
            <div class="modal-footer justify-content-between border-0">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="create_folder_btn" class="btn btn-primary">Create Folder</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- upload files -->
      <div class="modal fade" id="upload_files_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">File Upload</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" id="upload_files_form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="files[]">File</label>
                <input type="file" class="form-control form-control-sm" name="files[]" id="files[]" multiple/>
                <input type="text" class="form-control form-control-sm" name="set_folder_id" id="set_folder_id" hidden/>
            </div>
            </div>
            <div class="modal-footer justify-content-between border-0">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" id="upload_files_btn" class="btn btn-primary">Upload Files</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- upload sub folder files -->
      <div class="modal fade" id="upload_sub_files_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">File Upload</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" id="upload_sub_files_form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="files[]">File</label>
                <input type="file" class="form-control form-control-sm" name="files[]" id="filess[]" multiple/>
                <input type="text" class="form-control form-control-sm" name="set_sub_folder_id" id="set_sub_folder_id" hidden/>
            </div>
            </div>
            <div class="modal-footer justify-content-between border-0">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" id="upload_sub_files_btn" class="btn btn-primary">Upload Files</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php if($page_title == 'Stock Photos'): ?>
      <!-- upload stock images -->
      <div class="modal fade" id="upload_stocks_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Image Upload</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" id="upload_stocks_form" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="files[]">Image/s</label>
                  <input type="file" class="form-control form-control-sm" name="files[]" id="files[]" multiple/>
              </div>
              <div class="form-group">
                  <label for="image_title">Image Title</label>
                  <input type="text" class="form-control form-control-sm" name="image_title" id="image_title"/>
                  <input type="text" class="form-control form-control-sm" name="tags" id="tags" hidden/>

              </div>
              <div class="form-group" id="_tags">
                <label for="selectize">Tags / Category</label>
                <select id="selectize" class="form-control form-control-sm" aria-label="Default select example">
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between border-0">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" id="upload_stocks_btn" class="btn btn-primary">Upload Images</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- code mirror -->
      <div class="modal fade" id="code_mirror_modal">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Image Embed</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="code_body">
              <input class="form-control form-control-sm" id="embed_area" value="" class="p-1" readonly></input>
            </div>
            <div class="modal-footer justify-content-end border-0">
              <button type="button" id="copy_embed_btn" data-copy-on-click="#embed_area" class="btn btn-primary btn-sm" title="Copy embed code"><i class="fas fa-clone"></i></button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="add_categories_modal">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add new categories</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="cats">Enter Category Name</label>
                  <input class="form-control form-control-sm" id="cats" name="cats"  placeholder="Enter categories"/>
                </div>
              </div>
              <div class="modal-footer justify-content-end border-0">
                <button type="button" id="add_cats" class="btn btn-primary btn-sm" >Add Categories</button>
              </div>
              </form>
            </div>
          </div>
        </div>



      <?php endif; ?>

      <?php if($page_title == 'Login'): ?>
        <div class="modal fade" id="verification_modal">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">2FA Verification</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input class="form-control form-control-sm" id="verify_code" name="verify_code" class="p-1" placeholder="Enter code"/>
              </div>
              <div class="modal-footer justify-content-end border-0">
                <button type="button" id="verify_btn" class="btn btn-primary btn-sm" >Submit <i class="fas fa-sign-in-alt"></i></button>
              </div>
              </form>
            </div>
          </div>
        </div>
      <?php endif; ?>
