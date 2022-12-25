<div class="modal fade" id="add-offense" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header  border-0 shadow-sm" style="background-color:	#F0F0F0;">
        <h5 class="modal-title" id="exampleModalLabel">Add Offense</h5>
        <button id="close_add_offense" type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 shadow-sm">

        
      <form action="" id="add_offense_form" name="add_offense_form" method="post">
        <div class="mb-3">
          <label for="offense" class="form-label">Offense*</label>
          <input type="text" name="offense" class="form-control barangay-form" id="offense" placeholder="Offense Name">
          <div class="invalid-feedback">
            Please don't leave this area empty.
          </div>
        </div>
      </form>

      </div>
      <div class="modal-footer border-0 shadow-sm">
        <button type="btn" id="add_offense_btn" class="addbtn add-brgy btn btn-dark fw-bolder border-0 shadow-sm">Submit</button>
      </div>
    </div>
  </div>
</div>