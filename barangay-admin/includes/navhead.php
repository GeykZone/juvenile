<header class="header header-sticky mb-4 p-0 border-0 shadow-sm" style="background-color:#D0D0D0; color:#C8C8C8;" >
        <div class="container-fluid mb-0 p-2 border-0 shadow-sm" style="background-color: #303030;">
        <button style=" color: 	#D0D0D0;" class="header-toggler px-md-2 me-md-2" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
          <span class="fa-solid"></span>
          </button>
          
          <ul class="header-nav">
            <li class="nav-title" id="nav_head_font"><a style="font-weight: bold;">BARANGAY <?php echo $admin_location; ?></a></li>
          </ul>

          <ul class="header-nav ms-auto">
          </ul>
          
          <ul class="header-nav ms-3">
            <li class="nav-item dropdown "><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="../resourcess/assets/img/avatars/city.png" alt="user@email.com"></div>
              </a>
              <div class="dropdown-menu pt-0 border-0 rounded-2 shadow">
                <div class="dropdown-header py-2 border-0 shadow-sm" style="background-color: #585858; color:#C8C8C8;">
                  <div class="fw-semibold ">Account</div>
                </div>

                <a class="dropdown-item" href="../logout.php">
                  <span class="fa-solid px-md-1 me-md-1"></span>Logout
                </a>

                <div class="dropdown-header py-2 border-0 shadow-sm" style="background-color:	#585858; color:#C8C8C8;">
                  <div class="fw-semibold">Settings</div>
                </div>

                <a class="dropdown-item" href="#">
                <span class="fa-solid px-md-1 me-md-1"></span> Update Password
                </a>
              </div>
            </li>
          </ul>
        </div>

        
