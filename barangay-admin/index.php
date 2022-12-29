<?php 

include('includes/header.php');
include('includes/sidebar.php');
?>
<!--side bar-->

<!--side bar end-->

<div class="wrapper d-flex flex-column min-vh-100" style="background-color: #F8F8F8;">

<!--header-->
<?php   include('includes/navhead.php'); ?>
<div class="container-fluid m-1" style=" color: #707070;">
<nav aria-label="breadcrumb">
<ol class="breadcrumb my-0 ms-2">
<li class="breadcrumb-item">
<!-- if breadcrumb is single--><span>Barangay Admin</span>
</li>
<li class="breadcrumb-item active"><span>Dashboard</span></li>
</ol>
</nav>
</div>
</header>
<!--header end-->

<!-- more details dashboard -->
<?php // include "display/detail-dashboard.php" ?>
<!-- more details dashboard  end -->

<div class="body flex-grow-1 px-5 pt-3  pb-3"> 
<div class="container-fluid">

<!--first-->
 <div class="row px-2">

  <div class="col-lg-4 card bg-transparent py-0 pe-lg-2 border-0 card-group col-sm-12">
    
        <div class="col-lg-12 card-group mb-4 shortCut_btn" >
          <div class="card  border-0 rounded-4 shadow-sm text-white bg-warning" >
          <div class="card-body adjust_font_size row">
            <h4 >Newly Added Juveniles</h4>
            <p class="adjust_font_size fw-lighter opacity-75" ><span id="current_day"></span></p>
            <h1><i class="fa-solid float-start"></i><span id="new_jv" style="margin-right: 10px;" class="float-end" >0</span></h1>
            <p  class="adjust_font_size"><span id="newCasesPercent"></span></p>
            </div>
          </div>
        </div>

        <div class="col-lg-12 card-group mb-4 shortCut_btn">
          <div class="card border-0 rounded-4 shadow-sm text-light  bg-danger" >
          <div class="card-body adjust_font_size row">
            <h4 >Total Juveniles</h4>
            <p class="adjust_font_size fw-lighter opacity-75" >For the month of <span class="this_month">current month</span></p>
            <h1><i class="fa-solid float-start"></i><span style="margin-right: 10px;" class="float-end total_jv" >0</span></h1>
            <p  class="adjust_font_size"><span id="newDeathsPercent"></span></p>
            </div>
          </div>
        </div>

    </div>

    <div class="col-lg-8 card card-group bg-transparent p-0 ps-lg-3  border-0 col-sm-12">
        <div class="col-lg-12 card p-0 border-0  shadow-sm col-sm-12 mb-4">
          <div class="card card border-0 rounded-3 ">
            <div class="card-header rounded-top py-3 border-0  shadow-sm text-light " style="background-color: #303030;">
            </div>

            <div id="myChart_container" class=" card-body adjust_font_size shortCut_btn">

            <div class="col-lg-12 mx-3 col-sm-12 mt-lg-0 mt-sm-0 text-md-start align-content-center dropdown-center">
            <a >
            <span id="sort_chart" type="button" style="color: #294168bf;" class="align-content-center me-sm-2"><span class=" fa-solid "></span></span> Generated statistic for the month of <span class="this_month">current month</span>
            </a>
            </div>

              <div>
              <div  class="mb-3 mt-3" id="jv_chart_row" style=" min-width:100%;">
                <canvas class=""  id="jvChart" style="width:100%;  max-height:350px ;"></canvas> 
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>

</div>
<!--first-->

<!--Second-->
<div class="row ">

    <div class="row col-lg-12 mx-1">
    <div class="col-lg-12">
        <div class="row card border-0 shadow-sm">
        <div class="card-header rounded-top-3 py-3 border-0 rounded-top-3 shadow-sm text-light " style="background-color: #303030;"></div>
        <div class=" card-body">

        <div class=" container-fluid mb-2">
          <div class=" dataTables_wrapper dt-bootstrap5 row" >

          <div class="col-lg-6 col-sm-12 mt-lg-0 mt-sm-1 text-md-start align-content-center dropdown-center">
          <a id="toggle_chart1" >
          <span style="color: #294168bf;" class=" fa-solid align-content-center me-sm-2"></span>Juvenile List for the month of <span class="this_month">current month</span>
          </a>
          </div>

          <div class="col-lg-6 col-sm-12 mt-lg-0 mt-sm-2 text-md-start align-content-center dropdown-center ">
          <span id="toggle_chart1" class="float-lg-end" >
          <span style="color: #294168bf;" class=" fa-solid align-content-center me-sm-2"></span> Total Juveniles: <span class="total_jv">0</span>
          </span>
          </div>

          </div>
        </div>

        <div class="table-responsive container-fluid" >
          <table class="table table-striped table-borderless table-condensed  mb-0 w-100" id="juvenile_table" cellspacing="0" width="100%"> 
            <thead class="fw-semibold border-0 shadow-sm" style="background-color:#202020; color: #F5F5F5;">
              <tr class="align-middle">
              <th style = "min-width: 200px;" >Full Name</th>
              <th style = "min-width: 47px;" >Age</th>
              <th style = "min-width: 70px;" >Gender</th>
              <th style = "min-width: 230px;" >Personal Address</th>
              <th style = "min-width: 160px;" >Offense Committed</th>
              <th style = "min-width: 130px;" >Date of Offense</th>
              </tr>
            </thead>
            <tbody class=" align-middle shadow-sm" id="show_offense_list_table"> 
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
    
</div>
<!--Second -->

</div>
</div>


<!-- footer-->
<?php   include('includes/footer.php'); ?>
<!--Footer end-->

<!--scripts  -->
<script>
  var my_barangay_name = <?php echo json_encode(ucwords(strtolower($admin_location))); ?>;
  var my_barangay_id = <?php echo json_encode($admin_location_id); ?> 
</script>

<script  src="effects/dashboard.js" ></script>
<!--scripts end-->

<!--scripts-->
<?php include('includes/scripts.php'); ?>
<!--scripts end-->

