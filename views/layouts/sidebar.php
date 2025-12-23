<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
        aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="./">Best Icons</a>
      <a class="navbar-brand hidden" href="./">BI</a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">

        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
          <h3 class="menu-title">Admin Controls</h3>
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-table"></i>Tables
            </a>
            <ul class="sub-menu children dropdown-menu">
              <li><i class="fa fa-table"></i><a href="admin/users">User Management</a></li>
            </ul>
          </li>

        <?php else: ?>
          <h3 class="menu-title">User Menu</h3>
          <li class="active">
            <a href="dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
          </li>
        <?php endif; ?>

        <h3 class="menu-title">Icons</h3>
        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-tasks"></i>Icons
          </a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="icons/fontawesome">Font Awesome</a></li>
            <li><i class="menu-icon ti-themify-logo"></i><a href="icons/themify">Themefy Icons</a></li>
          </ul>
        </li>

        <?php if (!isset($_SESSION['user_id'])): ?>
          <h3 class="menu-title">Extras</h3>
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-glass"></i>Pages
            </a>
            <ul class="sub-menu children dropdown-menu">
              <li><i class="menu-icon fa fa-sign-in"></i><a href="login">Login</a></li>
              <li><i class="menu-icon fa fa-sign-in"></i><a href="register">Register</a></li>
            </ul>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </nav>
</aside>