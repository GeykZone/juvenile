<?php
include('includes/header.php');
include('includes/sidebar.php');
?>

<!--side bar-->
<!--side bar end-->

<div class="wrapper d-flex flex-column min-vh-100" style="background-color: #F8F8F8;">

<!--header-->
<?php   include('includes/navhead.php'); ?>
<div class="container-fluid m-1" style=" color: 	#707070;">
<nav aria-label="breadcrumb">
<ol class="breadcrumb my-0 ms-2">
<li class="breadcrumb-item">
  <!-- if breadcrumb is single--><span>City Admin</span>
</li>
<li class="breadcrumb-item active"><span>Manage Admins</span></li>
</ol>
</nav>
</div>
</header>
<!--header end-->

<!--add barangay admin modal-->
<?php include('add-barangay-admin.php'); ?> 
<!--add barangay admin modal end-->

<!--reset barangay admin modal-->
<?php include('reset-barangay-admin.php'); ?>
<!--reset barangay admin modal end-->

<!--delete barangay admin modal-->
<?php include('delete-barangay-admin.php'); ?>
<!--delete barangay admin modal end-->

<!--activate barangay admin modal-->
<?php include('activate-barangay-admin.php'); ?>
<!--activate barangay admin modal end-->

<!--delete barangay admin modal-->
<?php include('deactivate-barangay-admin.php'); ?>
<!--delete barangay admin modal end-->

<div class="body flex-grow-1 px-4 pt-3"> 
<div class="container-fluid">


<!--Admins-->
<div class="row">
<div class="col-md-12">
<div class="card border-0 mb-4 shadow-sm remove_rounded">

    <div class="hide_first_load card-header p-3 border-0 w-100 shadow-sm  remove_rounded" style="background-color: #303030;">
    </div>

  <div class="card-body border-0 shadow-sm remove_rounded"  id="wrapper" >


  <div class=" container-fluid">
    <div class=" dataTables_wrapper dt-bootstrap5 row" id="buttons">

    <div class="col-lg-6 mt-1 mt-lg-1 mt-md-1 mt-sm-1 col-md-12 col-sm-12 col-12 text-sm-start hide_first_load ">
      <a id="toggle_chart1" >
      <span style="color: #294168bf;" class=" fa-solid align-content-buttom px-md-1 me-md-2"></span> Barangay Admin Accounts
      </a>
      </div>

      <div class="col-lg-6 mt-3 mt-lg-1 mt-md-3 mt-sm-3  col-md-12 col-sm-12 col-12 text-lg-end text-md-start text-sm-start text-start">
      <a class="btn mb-3 border-0 shadow-sm btn-dark pt-1 pb-1 px-3 fw-bolder" data-coreui-toggle="modal" href="#add-barangay-admin" id="add_admin" role="button">NEW <span class="fa-solid fa-circle-plus"></span></a>
      </div>

    </div>
    </div>

      <div class="table-responsive container-fluid">
      <table class="table table-striped table-borderless table-condensed  mb-0 w-100" id="admin_table"> 
        <thead class="fw-semibold border-0 shadow-sm" style="background-color:#202020; color: #F5F5F5;">
          <tr class="align-middle">
          <th>Barangay</th>
            <th>Username</th>
            <th>Status</th>
          <th  class="text-end" style="padding-right:50px;">Settings</th>
          </tr>
        </thead>

        <tbody class=" align-middle shadow-sm" id="barangay_admin_table"> 
        </tbody>
      </table>
      </div>


      <div class="table-responsive container-fluid mt-2" >
        <div class="dataTables_wrapper dt-bootstrap5 row" id="table_page">
        </div>
    </div>>
    
  </div>
</div>
</div>
</div>
<!--Admins end-->

</div>
</div>


<!-- footer-->
<?php   include('includes/footer.php'); ?>
<!--Footer end-->

<!--scripts-->
<script id="manage_user" src="effects/manage-admins.js" ></script>
<!--scripts end-->


<!--scripts-->
<?php include('includes/scripts.php'); ?>
<!--scripts end-->
