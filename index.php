<?php include('login.php') ?>

<link rel="apple-touch-icon" sizes="57x57" href="resourcess/assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="resourcess/assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="resourcess/assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="resourcess/assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="resourcess/assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="resourcess/assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="resourcess/assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="resourcess/assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="resourcess/assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="resourcess/assets/img/avatars/city.png">
<link rel="icon" type="image/png" sizes="32x32" href="resourcess/assets/img/avatars/city.png">
<link rel="icon" type="image/png" sizes="96x96" href="resourcess/assets/img/avatars/city.png">
<link rel="icon" type="image/png" sizes="16x16" href="resourcess/assets/img/avatars/city.png">
<link rel="manifest" href="resourcess/assets/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="resourcess/assets/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!--main css-->
<link href="resourcess/css/login.css" rel="stylesheet" id="bootstrap-css">
<script src="resourcess/js/login.js"></script>

<!--jquery-->
<script src="resourcess/js/jquery.min.js"></script>

<!--usingjquery to create cokkie-->
<script src="resourcess/js-cookie/js.cookie.min.js"></script>


<!--jquery data tables-->
<link rel="stylesheet" type="text/css" href="resourcess/DataTables/datatables.min.css"/>
<script type="text/javascript" src="resourcess/DataTables/datatables.min.js"></script>


<!--icons-->
<script src="resourcess/fontawesome-free/js/all.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="resourcess/fontawesome-free/css/all.css">


<!--alert -->
<script src="resourcess/sweetalert2/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='resourcess/sweetalert2/sweetalert2.min.css'>


<!--datepicker-->
<link href = "resourcess/jquery-ui-1.13.2.custom/jquery-ui.css" rel = "stylesheet">
<script src = "resourcess/jquery-ui-1.13.2.custom/jquery-ui.js"></script>

<!-- Select2 4.1.0 -->
<script src="resourcess/selectized/selectize.min.js" ></script>
<link rel="stylesheet" href="resourcess/selectized/selectize.bootstrap5.css"  />

<style>
    body{
    padding-top:4.2rem;
    padding-bottom:4.2rem;
    background:rgba(0, 0, 0, 0.76);
    }
    a{
    text-decoration:none !important;
    }

    .myform{
    position: relative;
    display: -ms-flexbox;
    display: flex;
    padding: 1rem;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 1.1rem;
    outline: 0;
    max-width: 500px;
    }
    .tx-tfm{
    text-transform:uppercase;
    }
    .mybtn{
    border-radius:50px;
    }

    .login-or {
    position: relative;
    color: #aaa;
    margin-top: 10px;
    margin-bottom: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
    }
    .span-or {
    display: block;
    position: absolute;
    left: 50%;
    top: -2px;
    margin-left: -25px;
    background-color: #fff;
    width: 50px;
    text-align: center;
    }
    .hr-or {
    height: 1px;
    margin-top: 0px !important;
    margin-bottom: 0px !important;
    }
    .google {
    color:#666;
    width:100%;
    height:40px;
    text-align:center;
    outline:none;
    border: 1px solid lightgrey;
    }
    form .error {
    color: #ff0000;
    }
    #second{display:none;}
</style>

<body>
<div class="container">
<div class="row">
<div class="col-md-5 mx-auto">
<div id="first">
<div class="myform form ">
  
    <div class="logo mb-3 mt-3">
      <div class="col-md-12 text-center">
      <img src="resourcess/images/lopezjaena-logo.png" style = "width: 100px; height: 100px;" class="rounded" alt="...">
      </div>
    </div>

    <form action="" method="post" name="login">
          <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" name="username"  class="form-control" id="username" aria-describedby="usernameHelp" placeholder="User Name">
            <div class="invalid-feedback" id="invalid_username">
              Please don't leave this area empty.
            </div>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password"  class="form-control" aria-describedby="usernameHelp" placeholder="Enter Password">
            <div class="invalid-feedback" id="invalid_username">
            </div>
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" id = "checkbox"> Remember me
            </label>
          </div>
          <div class="col-md-12 text-center ">
            <button type="button" id="login_btn" class=" btn btn-block mybtn btn-dark tx-tfm">Login</button>
          </div>
    </form>
</div>
</div>

</div>
</div>
          
<script src="effects/login.js"></script>
</body>