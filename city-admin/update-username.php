<div class="modal fade" id="update_username" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
    <div class="modal-content">
      <div  class="modal-header shadow-sm border-0"  style="background-color:	#F0F0F0;">
        <h5 class="modal-title" id="exampleModalLabel" >New Username</h5>
        <button id="close_update_username" type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 shadow-sm">

      <style>

      </style>
        
      <form action="" id="update_username" name="update_username" method="post" autocomplete="off">

      <div class="mb-2">
          <label for="update_username_old_pass" class="form-label">Password*</label>
          <input autocomplete="off" type="password" maxlength="20"  name="update_username_old_pass" class="shadow-sm form-control barangay-form" id="update_username_old_pass" placeholder="Password">
          <div class="user_old invalid-feedback">
          </div>
          <label id="update_username_old_pass_lbl" class="form-label mt-2 opacity-50"><input id="update_username_old_pass_checkbox" type="checkbox" onclick="showPassword('update_username_old_pass','update_username_old_pass_lbl','update_username_old_pass_span')" class="me-1"><span id="update_username_old_pass_span">Show Password</span></label>
        </div>

        <div class="mb-3">
          <label for="new_user" class="form-label">New Username*</label>
          <input autocomplete="off" type="text" maxlength="45" name="new_user" class="shadow-sm form-control barangay-form" id="new_user" placeholder="New Username">
          <div class="user invalid-feedback">
          </div>
        </div>

      </form>

      </div>
      <div class="modal-footer border-0 shadow-sm">
        <button id="update_user_btn" class="addbtn add-brgy btn btn-dark border-0 shadow-sm">Update</button>
      </div>
    </div>
  </div>
</div>