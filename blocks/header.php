
  <div class="wrapper theme-1-active pimary-color-red">

  <!-- Top Menu Items -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="mobile-only-brand pull-left">
      <div class="nav-header pull-left">
        <div class="logo-wrap">
          <a href="dashboard.php">
            <img class="brand-img" src="https://ratatuiperm.ru/ratatuiadmin/img/logo.png" alt="brand"/>
            <span class="brand-text">Insta</span>
          </a>
        </div>
      </div>
      <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
      <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
      <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>

    </div>
    <div id="mobile_only_nav" class="mobile-only-nav pull-right">
      <ul class="nav navbar-right top-nav pull-right">
        <li>
          <a href="user.php"><?=$user1->firstName?> <?=$user1->lastName?></a>
        </li>

        <li class="dropdown auth-drp">
          <a href="inbox.html#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="https://hencework.com/theme/doodle-demo/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
          <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">


            <li>
              <a href="login.php" id="logout"><i class="zmdi zmdi-power"></i><span>Выход</span></a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /Top Menu Items -->