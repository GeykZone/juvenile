<div class="modal fade" id="update_juvenile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" >
<div class="modal-content">
<div class="modal-header border-0 shadow-sm" style="background-color:	#F0F0F0;">
  <h5 class="modal-title" id="exampleModalLabel">Update Juvenile</h5>
  <button type="button" id="close_add_barangay_admin" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body border-0 shadow-sm">

  
<form action="" id="update_barangay_resident_form" name="update_barangay_resident_form" method="post">
  <div class="mb-3" id="update_select_brg_list">
  <label for="update_select_barangay" class="form-label">Update Offense Location*</label>
  <select id="update_select_barangay"  name="update_select_barangay" class="form-control barangay-form shadow-sm">
      <option value="">Pick a barangay</option>
  <?php
  include('functions/select_barangays.php');
  ?>
  </select>
  <div class="invalid-feedback">
      Please select a barangay.
  </div>
  </div>

  <fieldset id="update_fieldset1" class="d-none">
  <div class="mb-3">
    <label for="update_full_name" class="form-label">Update Full Name*</label>
    <input type="text" name="update_full_name" maxlength="100" class=" form-control barangay-form" id="update_full_name" placeholder="Full name">
    <div class="invalid-feedback">
    Please don't leave this area empty.
    </div>

  </div>
  <div class="mb-3">
    <label for="update_address" class="form-label">Update Address*</label>
    <input type="text" name="update_address" maxlength="150" class=" form-control barangay-form" id="update_address" placeholder="Address">
    <div class="invalid-feedback">
    Please don't leave this area empty.
    </div>
  </div>

  <div class="mb-3">
  <label for="update_birthdate" class="form-label">Update Date of Birth*</label>
    <input type="date" maxlength="45" class="form-control barangay-form text-sm-start" id="update_birthdate" name="update_birthdate" placeholder="Date of Birth">
    <div class="invalid-feedback">
      Please don't leave this area empty.
    </div>
  </div>

  <div class="mb-3" id="update_select_gender_list">
    <label for="update_gender" class="form-label">Update Gender*</label>
    <select name="gender" id="update_gender" class="form-control gender barangay-form shadow-sm" >
    <option value="">Pick a gender.</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
    <div class="invalid-feedback">
      Please don't leave this area empty.
    </div>
  </div>
  
  <div class="mb-3" id="update_select_offense_list">
  <label for="update_select_offense" class="form-label">Update Offense Committed*</label>
  <select id="update_select_offense"  name="update_select_offense" class="form-control barangay-form shadow-sm">
      <option value="">Select an offense</option>
  <?php
  include('functions/select_offense.php');
  ?>
  </select>
  <div class="invalid-feedback">
      Please select an offense.
  </div>
  </div>

  <div class="mb-3">
  <label for="update_date_of_offense" class="form-label">Update Date of Offense*</label>
    <input type="date" maxlength="45" class="form-control barangay-form text-sm-start" id="update_date_of_offense" name="update_date_of_offense" placeholder="Date of Offense">
    <div class="invalid-feedback">
      Please don't leave this area empty.
    </div>
  </div>

  <div class="mb-3">
    <label for="update_contact" class="form-label">Update Contact No.*</label>
    <input type="number" name="update_contact" class="  form-control barangay-form" id="update_contact"
     onkeypress='return event.charCode>=48 && event.charCode<=57' ondrop="return false;" onpaste="return false;"
     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" placeholder="Contact No">
    <div class="invalid-feedback" id="update_phno_validator_label">
    Please don't leave this area empty.
    </div>
  </div>

  <div class="mb-3">
    <label for="update_guardian_name" class="form-label">Update Guardian Full Name*</label>
    <input type="update_guardian_name" maxlength="45" name="update_guardian_name" class=" form-control barangay-form" id="update_guardian_name" placeholder="Guardian Full Name">
    <div class="invalid-feedback">
    Please don't leave this area empty.
    </div>
  </div>

  </fieldset>
</form>

</div>
<div class="modal-footer border-0 shadow-sm">
  <button type="btn"  id="update_juvenile_btn" class="border-0 shadow-sm addbtn btn btn-dark add-brgy fw-bolder">Submit</button>
</div>
</div>
</div>
</div>


