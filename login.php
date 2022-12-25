<?php
include ('connection/connect.php');

$error = 0;

//page-redirector
if(isset($_COOKIE['active']) || isset($_SESSION['admin_log'])){

  $role = encrypt_decrypt('decrypt', $_COOKIE["role"]);
  if($role == 1)
  {
    header("Location: city-admin/index.php");
    exit(); 

  }
  else if($role == 2)
  {
    header("Location: barangay-admin/index.php");
    exit();

  }
}
////page-redirector

if (isset($_POST['username']))
{
$username = $_POST['username'];
$password = $_POST['password'];

//login
$sql= "SELECT * FROM `users` WHERE `username` = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
  while($row = $result->fetch_assoc())
  {
    $hash = $row['password'];

    $verify = encrypt_decrypt('decrypt', $hash);

      if ($verify == $password)
      {
        $_SESSION['adminlogged_in'] = "set";

        $id = encrypt_decrypt('encrypt', $row['users_id']);
        setcookie("id", $id, time() + (86400 * 30), "/"); //set id cookie 30 days

        $role = encrypt_decrypt('encrypt', $row['role']);
        setcookie("role", $role, time() + (86400 * 30), "/"); //set role cookie 30 days

        //check for checkbox
        if (($_POST['checkbox_is_checked'] == "true"))
        {
            $cookie_user_tittle = "tokken";
            $encrypt_username = encrypt_decrypt('encrypt', $username);
            $cookie_user_value = $encrypt_username;
            setcookie($cookie_user_tittle, $cookie_user_value, time() + (86400 * 30), "/"); // 30 days
        }
        //check for checkbox end

        $role = $row['role'];
        $validate = $row['status'];

        if ($role == 1)
        {
            echo $role;
          
        }
        else
        {
            if ($validate == 1) 
            {
              echo $role;
            }
            else
            {
              unset($_COOKIE['id']);
              setcookie('id', null, -1, '/');
        
              unset($_COOKIE['role']);
              setcookie('role', null, -1, '/');

              unset($_COOKIE['tokken']);
              setcookie('tokken', null, -1, '/');
        
              return true;

              echo $validate;
            }  
        }
      }
      else
      {
        $error = 3;
        echo $error;
      }
  }

}
else
{
    $error = 4;
    echo $error;
}
//login end

}
?>

