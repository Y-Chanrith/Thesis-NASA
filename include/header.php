<?php
// require('../admin/session.php');
// confirm_logged_in();
?>

<!-------page-content start----------->

<div id="content">

  <!------top-navbar-start----------->
    <div class="top-navbar" style="background-color: aliceblue; box-shadow: 1px 1px 10px;">
      <div class="xd-topbar position-sticky top-0">
        <div class="row">
          <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
            <div class="xp-menubar">
              <span class="material-icons text-white">signal_cellular_alt</span>
            </div>
          </div>

          <div class="col-md-5 col-lg-3 order-3 order-md-2">
            <!-- <div class="xp-searchbar">
          <form>
            <div class="input-group">
              <input type="search" class="form-control" placeholder="Search">
              <div class="input-group-append">
                <button class="btn" type="submit" id="button-addon2">Go
                </button>
              </div>
            </div>
          </form>
        </div> -->

          </div>

          <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
            <div class="xp-profilebar text-right">
              <nav class="navbar p-0" style="background-color: aliceblue;">
                <ul class="nav navbar-nav flex-row ml-auto">
                  <!-- <li class="dropdown nav-item active">
                <a class="nav-link" href="#" data-toggle="dropdown">
                  <span class="material-icons">notifications</span>
                  <span class="notification">4</span>
                </a>
                 <ul class="dropdown-menu">
                  <li><a href="#">You Have 4 New Messages</a></li>
                  <li><a href="#">You Have 4 New Messages</a></li>
                  <li><a href="#">You Have 4 New Messages</a></li>
                  <li><a href="#">You Have 4 New Messages</a></li>
                </ul> 
              </li> -->

                  <li class="nav-item">
                    <a class="nav-link" href="../admin/pos.php">
                      <span class="btn btn-outline-secondary mr-5"><button>POINT OF SALE</button></span>
                    </a>
                  </li>

                  <li class="dropdown nav-item">

                    <a class="nav-link" href="#" data-toggle="dropdown">
                      <span class="pr-2 text text-secondary"><?php echo $_SESSION['username']; ?> | </span>
                      <img src="../image/Nsc.jpg" style="width:40px; border-radius:50%; border: 1px solid #BABABA ;" />
                      <span class="xp-user-live"></span>
                    </a>
                    <ul class="dropdown-menu small-menu">
                      <!-- <li><a href="#">
                          <span class="material-icons">person_outline</span>
                          Profile
                        </a></li>
                      <li><a href="../admin/setting.php?action=edit&id='<?php echo $user; ?>'">
                          <span class="material-icons">settings</span>
                          Settings
                        </a></li> -->
                      <li><a href="../logout.php">
                          <span class="material-icons">logout</span>
                          Logout
                        </a></li>

                    </ul>
                  </li>


                </ul>
              </nav>
            </div>
          </div>

        </div>
      </div>
    </div>
  <!------top-navbar-end----------->