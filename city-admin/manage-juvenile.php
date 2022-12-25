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
<li class="breadcrumb-item active"><span>juvenile List</span></li>
</ol>
</nav>
</div>
</header>
<!--header end-->

<!--add juvenile modal-->
<?php include('add-juvenile.php') ?>
<!--add juvenile modal end-->

<!--update juvenile modal-->
<?php include('update-juvenile.php') ?>
<!--update juvenile modal end-->  

<!--delete juvenile modal-->
<?php include('delete-juvenile.php') ?>
<!--delete juvenile modal end-->  

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
      <span style="color: #294168bf;" class=" fa-solid align-content-center me-md-2"></span> juvenile List
      </a>
    </div>

    <div class="col-lg-6 mt-3 mt-lg-1 mt-md-3 mt-sm-3  col-md-12 col-sm-12 col-12 text-lg-end text-md-start text-sm-start text-start">
      <a class="btn mb-3 border-0 shadow-sm btn-dark pt-1 pb-1 px-3 fw-bolder" data-coreui-toggle="modal" href="#add_juvenile" id="add_juvenile_btn" role="button">NEW <span class="fa-solid fa-circle-plus"></span></a>
    </div>

    </div>
    </div>


      <div class="table-responsive  container-fluid" >
      <table class="table table-striped table-borderless table-condensed  mb-0 w-100" id="juvenile_table"> 
        <thead class="fw-semibold border-0 shadow-sm" style="background-color:#202020; color: #F5F5F5;">
          <tr class="align-middle">
          <th style = "min-width: 200px;">Full Name</th>
          <th style = "min-width: 130px;">Date of Birth</th>
          <th style = "min-width: 45px;">Age</th>
          <th style = "min-width: 70px;">Gender</th>
          <th style = "min-width: 230px;">Personal Address</th>
          <th style = "min-width: 200px;">Email</th>
          <th  style = "min-width: 110px;">Phone</th>
          <th style = "min-width: 160px;">Offense Committed</th>
          <th style = "min-width: 130px;">Offense Location</th>
          <th  style = "min-width: 130px;">Date of Offense</th>
          <th  class="text-end" style="padding-right: 30px;">Settings</th>
          </tr>
        </thead>
        <tbody class="shadow-sm align-middle" id="show_juvenile_list_table"> 
        </tbody>
        
      </table>
      </div>

      <div class="table-responsive container-fluid mt-2" >
        <div class="dataTables_wrapper dt-bootstrap5 row" id="table_page">
        </div>
    </div>

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
<script src="effects/manage-juvenile.js"></script>
<!--scripts end-->

<!--scripts-->
<?php include('includes/scripts.php'); ?>
<!--scripts end-->
