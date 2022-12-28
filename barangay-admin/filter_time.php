<div class="modal fade" id="filter_time" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
    <div  class="modal-header shadow-sm border-0"  style="background-color:	#F0F0F0;">
        <h5 class="modal-title" id="filter_id" >Filter</h5>
        <button id="close_filter" type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 shadow-sm">

        
      <form action="" id="time_statistic_form" name="time_statistic_form" method="post">

      <fieldset>

      <div class="mb-3">
        <label for="age_min" class="form-label">Min Age:</label>
        <input  type="number" id="age_min" class="form-control   barangay-form text-sm-start shadow-sm"  placeholder="Min Age">
        <div class="invalid-feedback">
        Invalid min age.
        </div>
        </div>

        <div class="mb-3">
        <label for="age_max" class="form-label">Max Age:</label>
        <input  type="number" id="age_max" class="form-control   barangay-form text-sm-start shadow-sm"  placeholder="Max Age">
        <div class="invalid-feedback">
        Invalid max age.
        </div>
        </div>

      <div class="mb-3">
        <label for="range_from" class="form-label">Min Date:</label>
        <input  type="date" id="range_from" class="form-control   barangay-form text-sm-start shadow-sm"  placeholder="From">
        <div class="invalid-feedback">
        Invalid min date.
        </div>
        </div>

        <div class="mb-3">
        <label for="range_to" class="form-label">Max Date:</label>
        <input  type="date" id="range_to" class="form-control   barangay-form text-sm-start shadow-sm"  placeholder="To">
        <div class="invalid-feedback">
        Invalid max date.
        </div>
        </div>

        <div class="mb-3" >
        <label for="gender_select" class="form-label">Gender:</label>
        <select id="gender_select"  name="gender_select" class="form-control gender barangay-form shadow-sm select_list"> 
        <option value="">All Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select>
        <div class="invalid-feedback">
        Invalid selection.
        </div>
        </div>

        <div class="mb-3">
          <label for="offense_type_select" class="form-label">Select Offense:</label>
          <select id="offense_type_select"  name="offense_type_select" class="form-control gender barangay-form shadow-sm select_list">
            <option value="">All offenses</option>
            <?php
            include('functions/select_offense.php');
            ?>
        </select>
          <div class="invalid-feedback" id="PhilHealth_validator_label">
        Invalid selection.
          </div>
        </div>

      </fieldset>
      </form>

      </div>
      <div class="modal-footer border-0 shadow-sm">
      <button id="submit_filter_time" class="addbtn add-brgy btn btn-dark border-0 shadow-sm">Filter</button>
      </div>
    </div>
  </div>
</div>