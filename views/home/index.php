<!doctype html>
<html class="no-js" lang="en">

<head>
  <?php require __DIR__ . '/../layouts/head_links.php'; ?>
</head>

<body>

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
          <h3 class="menu-title">Entry</h3>
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-glass"></i>Pages
            </a>
            <ul class="sub-menu children dropdown-menu">
              <li><i class="menu-icon fa fa-sign-in"></i><a href="login">Login</a></li>
              <li><i class="menu-icon fa fa-sign-in"></i><a href="register">Register</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </aside>
  <div id="right-panel" class="right-panel">

    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Index</h1>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li class="active">Home</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content mt-3">
      <div class="col-lg-10 d-flex flex-column text-center text-info justify-content-center pt-5 pl-5 ">
        <h2 class="pb-5">Welcome to an unforgettable website<br><br>
          <span class="text-danger">Please login or Register</span>
        </h2>

        <div class="card">
          <div class="card-header">
            <h4>World</h4>
          </div>
          <div class="Vector-map-js">
            <div id="vmap" class="vmap" style="height: 265px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/../layouts/footer_less.php'; ?>
  <?php include __DIR__ . '/../layouts/footer_more.php'; ?>

</body>

</html>