<div class="modal fade" id="add_juvenile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" >
<div class="modal-content">
<div class="modal-header border-0 shadow-sm" style="background-color:	#F0F0F0;">
  <h5 class="modal-title" id="exampleModalLabel">Add juvenile</h5>
  <button type="button" id="close_juvenile" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body border-0 shadow-sm">

  
<form action="" id="add_barangay_resident_form" name="add_barangay_resident_form" method="post">
  
  <fieldset id="fieldset1" class="">
  <div class="mb-3">
    <label for="full_name" class="form-label">Full Name*</label>
    <input type="text" name="full_name" maxlength="100" class=" form-control barangay-form" id="full_name" placeholder="Full name">
    <div class="invalid-feedback">
    Please don't leave this area empty.
    </div>

  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address*</label>
    <input type="text" name="address" maxlength="150" class=" form-control barangay-form" id="address" placeholder="Address">
    <div class="invalid-feedback">
    Please don't leave this area empty.
    </div>
  </div>

  <div class="mb-3">
  <label for="birthdate" class="form-label">Date of Birth*</label>
    <input type="date" maxlength="45" class="  birthdate form-control barangay-form text-sm-start" id="birthdate" name="birthdate" placeholder="Date of Birth">
    <div class="invalid-feedback">
      Please don't leave this area empty.
    </div>
  </div>

  <div class="mb-3" id="select_gender_list">
    <label for="gender" class="form-label">Gender*</label>
    <select name="gender" id="gender" class="form-control gender barangay-form shadow-sm" >
    <option value="">Pick a gender.</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
    <div class="invalid-feedback">
      Please don't leave this area empty.
    </div>
  </div>
  
  <div class="mb-3" id="select_offense_list">
  <label for="select_offense" class="form-label">Offense Committed*</label>
  <select id="select_offense"  name="select_offense" class="form-control barangay-form shadow-sm">
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
  <label for="date_of_offense" class="form-label">Date of Offense*</label>
    <input type="date" maxlength="45" class="form-control barangay-form text-sm-start" id="date_of_offense" name="date_of_offense" placeholder="Date of Offense">
    <div class="invalid-feedback">
      Please don't leave this area empty.
    </div>
  </div>

  <div class="mb-3">
    <label for="contact" class="form-label">Contact No.*</label>
    <input type="number" name="contact" class="  form-control barangay-form" id="contact"
     onkeypress='return event.charCode>=48 && event.charCode<=57' ondrop="return false;" onpaste="return false;"
     oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" placeholder="Contact No">
    <div class="invalid-feedback" id="phno_validator_label">
    Please don't leave this area empty.
    </div>
  </div>

  <div class="mb-3">
    <label for="guardian_name" class="form-label">Guardian Full Name*</label>
    <input type="guardian_name" maxlength="45" name="guardian_name" class=" form-control barangay-form" id="guardian_name" placeholder="Guardian Full Name">
    <div class="invalid-feedback">
    Please don't leave this area empty.
    </div>
  </div>

  </fieldset>
</form>

</div>
<div class="modal-footer border-0 shadow-sm">
  <button type="btn"  id="add_juvenile_btn" class="border-0 shadow-sm addbtn btn btn-dark add-brgy fw-bolder">Submit</button>
</div>
</div>
</div>
</div>


