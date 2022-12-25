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
<!-- if breadcrumb is single--><span>City Admin</span>
</li>
<li class="breadcrumb-item active"><span>Generate Statistics</span></li>
<li class="breadcrumb-item active"><span>Time Span Statistic</span></li>
</ol>
</nav>
</div>
</header>
<!--header end-->


<!-- filter offense hp -->
<?php include "filter_time.php" ?>
<!-- filter offense end -->

<div class="body flex-grow-1 px-5 pt-3  pb-3"> 
<div class="container-fluid">


<!--chart-->
<div class="row chart_container mb-3" style="display: block;">
<div class="col-md-12">
<div class="card border-0 mb-4 shadow-sm remove_rounded">

<div class="hide_first_load card-header p-3 border-0 w-100 shadow-sm  remove_rounded" style="background-color: #303030;">
</div>

<div class="card-body border-0 shadow-sm remove_rounded"  id="wrapper" >

<!--buttons-->
<div class="container-fluid mb-1 ">
  <div class="row">

  <div class="col-lg-6 col-sm-12 mt-lg-2 mt-sm-2 text-md-start align-content-center dropdown-center">
  <a id="toggle_chart1" >
  <span style="color: #294168bf;" class=" fa-solid align-content-center me-sm-2"></span>Offenses Statistic
  </a>
  </div>

  <div class="col-lg-6 col-sm-12 mt-lg-2 mt-sm-3 text-lg-end text-md-start align-content-center dropdown-center">

  <a class="btn me-lg-2 mb-3 border-0 shadow-sm btn-dark pt-1 pb-1 px-3 fw-bolder" id="sort_jv" role="button" >Sort <span class="fa-solid ms-1 fa-sort"></span></a>

  <a class="btn mb-3  border-0 shadow-sm btn-dark pt-1 pb-1 px-3 fw-bolder" id="filter_btn" data-coreui-toggle="modal" href="#filter_time" role="button" >Filter <span class="fa-solid ms-1 fa-filter"></span></a>

  <a class="btn mb-3 ms-lg-2 border-0 shadow-sm btn-dark pt-1 pb-1 px-3 fw-bolder dropdown-trigger"  id="hp_option" type="button" data-coreui-toggle="dropdown" aria-expanded="false" >Switch <span class="fa-solid ms-1"></span></a>
  <ul class="dropdown-menu align-content-center shadow border-0" id="hp_dropdown_options">
    <li><a class="dropdown-item" href="generate-statistics-offenses.php"><span class="fa-solid" style="margin-right: 10px; color: #294168bf;"></span>Offenses Statistic</a></li>
    <li><a class="dropdown-item" href="generate-statistics-time.php"><span class="fa-solid" style="margin-right: 14px; margin-left:3px; color: #294168bf;"></span>Time Span</a></li>
  </ul> 

  </div>


  </div>
</div>
<!--buttons-->

<!--ggraph container-->
<div  class="container-fluid table-responsive">
  <div class="row">

  <div  class="mb-3" id="jv_chart_row" style="min-height: 300px;  min-width:1200px;">
  <canvas class=" text-white"  id="jvChart"   style="width:100%;  max-height:580px ;"></canvas> 
  </div>

  </div>
</div>
<!--ggraph container-->

<!--filter info-->
<div class=" container-fluid mt-3">
  <div class="row ">
    <div class="col-12 d-lg-flex d-md-flex d-sm-block text-dark align-items-center" style=" opacity: 0.65;">
    <span class="fa-regular me-2"></span><span class="me-2 h6 mt-2">Statistic Information: </span><span id="information_here">Loading information</span>
    </div>
  </div>
</div>
<!--filter info-->
    
</div>
  
</div>
</div>
</div>
<!--chart end-->

</div>
</div>


<!-- footer-->
<?php   include('includes/footer.php'); ?>
<!--Footer end-->

<!--scripts -->
<script src="effects/generate-statistics-time.js" ></script> 
<!--scripts end-->

<!--scripts-->
<?php include('includes/scripts.php'); ?>
<!--scripts end-->
