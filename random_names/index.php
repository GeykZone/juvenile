<!DOCTYPE html>
<html lang="en">
<head>
<base href="./">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
<title>Random Names</title>
<link rel="apple-touch-icon" sizes="57x57" href="../resourcess/assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../resourcess/assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../resourcess/assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../resourcess/assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../resourcess/assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../resourcess/assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../resourcess/assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../resourcess/assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../resourcess/assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="../resourcess/assets/img/avatars/city.png">
<link rel="icon" type="image/png" sizes="32x32" href="../resourcess/assets/img/avatars/city.png">
<link rel="icon" type="image/png" sizes="96x96" href="../resourcess/assets/img/avatars/city.png">
<link rel="icon" type="image/png" sizes="16x16" href="../resourcess/assets/img/avatars/city.png">
<link rel="manifest" href="../resourcess/assets/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../resourcess/assets/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- Vendors styles-->
<link rel="stylesheet" href="../resourcess/vendors/simplebar/css/simplebar.css">
<link rel="stylesheet" href="../resourcess/css/vendors/simplebar.css">

<!--jquery-->
<script src="../resourcess/js/jquery.min.js"></script>

  <!-- Main styles for this application-->
<link href="../resourcess/css/style.css" rel="stylesheet">

<!--usingjquery to create cokkie-->
<script src="../resourcess/js-cookie/js.cookie.min.js"></script>


<!--jquery data tables-->
<link rel="stylesheet" type="text/css" href="../resourcess/DataTables/datatables.min.css"/>
<script type="text/javascript" src="../resourcess/DataTables/datatables.min.js"></script>


<!--icons-->
<script src="../resourcess/fontawesome-free/js/all.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../resourcess/fontawesome-free/css/all.css">


<!-- Select2 4.1.0 -->
<script src="../resourcess/selectized/selectize.min.js" ></script>
<link rel="stylesheet" href="../resourcess/selectized/selectize.bootstrap5.css"  />

      
<!--alert -->
<script src="../resourcess/sweetalert2/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='../resourcess/sweetalert2/sweetalert2.min.css'>


<!--datepicker-->
<link href = "../resourcess/jquery-ui-1.13.2.custom/jquery-ui.css" rel = "stylesheet">
<script src = "../resourcess/jquery-ui-1.13.2.custom/jquery-ui.js"></script>

<!--chart-->
<script src="../resourcess/chartjs/chart.min.js" ></script>

</head>
<body>

<div class=" container">

<form method="post" action="jv.php">
    <div class="mb-3 mt-5">
    <label for="formGroupExampleInput" class="form-label">Year</label>
    <select class="form-select" aria-label="Default select example" name="year" id="year" required>
    <option value="">Select Year</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2022">2023</option>
    </select>
    </div>

    <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Number of Juveniles</label>
    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Number of Juveniles" name="numbers" id="numbers" required>
    </div>

    <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Gender</label>
    <select class="form-select" aria-label="Default select example" name="gender" id="gender" required>
    <option value="">Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Random">Random</option>
    </select>
    </div>

    <button type="submit" class="btn btn-primary" name="random_names" id="random_names">SUBMIT</button>                                                               
</form>

<form action="crimes.php" method="post">
    <div class=" mt-5 mb-3">
    <label for="">If you want to add default 83 types of juvenile offenses just press the "Add All" button</label>
    </div>

    <div class="mb-3 h6">
    <p>"Arson",
    "Assault",
    "Burglary",
    "Counterfeiting",
    "Credit card fraud",
    "Cyberbullying",
    "Destruction of property",
    "Drug possession",
    "Drug trafficking",
    "Embezzlement",
    "Extortion",
    "Forgery",
    "Hacking",
    "Harassment",
    "Identity theft",
    "Impersonation",
    "Indecent exposure",
    "Insurance fraud",
    "Kidnapping",
    "Larceny",
    "Manslaughter",
    "Money laundering",
    "Murder",
    "Obstruction of justice",
    "Perjury",
    "Piracy",
    "Possession of stolen property",
    "Prostitution",
    "Public indecency",
    "Purchasing alcohol as a minor",
    "Robbery",
    "Sexual assault",
    "Shoplifting",
    "Solicitation",
    "Terrorism",
    "Trespassing",
    "Unauthorized use of a vehicle",
    "Vandalism",
    "Abuse of power",
    "Animal cruelty",
    "Bribery",
    "Computer fraud",
    "Conspiracy",
    "Criminal mischief",
    "Criminal trespass",
    "Disorderly conduct",
    "Disturbing the peace",
    "Drug manufacture",
    "Escape",
    "Evasion of arrest",
    "Falsification of records",
    "False advertising",
    "Fraud",
    "Gambling",
    "Grand theft",
    "Hit and run",
    "Identity fraud",
    "Intimidation",
    "Interference with a police officer",
    "Interference with custody",
    "Interference with the judicial process",
    "Interference with a witness",
    "Involuntary manslaughter",
    "Kidnapping and false imprisonment",
    "Loitering",
    "Manslaughter by negligence",
    "Misdemeanor",
    "Obstruction of a police officer",
    "Possession of a controlled substance",
    "Possession of a weapon on school property",
    "Possession of stolen goods",
    "Probation violation",
    "Promoting prostitution",
    "Rape",
    "Reckless driving",
    "Resisting arrest",
    "Soliciting for prostitution",
    "Theft",
    "Threatening behavior",
    "Unauthorized use of a computer",
    "Unauthorized use of a credit card",
    "Welfare fraud",
    "Wire fraud"</p>

    </div>


    <button type="submit" name="add_crimes" id="add_crimes" class="btn btn-primary">Add ALL</button>
</form>

</div>

    
</body>
</html>