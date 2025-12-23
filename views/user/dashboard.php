<!doctype html>
<html class="no-js" lang="en">

<head>
  <?php require __DIR__ . '/../layouts/head_links.php'; ?>
</head>

<body>

  <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

  <div id="right-panel" class="right-panel">

    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li class="active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content mt-3">
      <div class="col-sm-12">
        <div style="font-size: 20px;" class="alert text-center alert-success alert-dismissible fade show" role="alert">
          You Logged in <?php echo strtoupper($_SESSION['user_name'] ?? 'User'); ?>
          <span class="badge badge-pill badge-success">Great!</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>

      <div class="col-lg-10 d-flex flex-column text-center text-info justify-content-center pt-5 pl-5 ">
        <h2>Welcome Dear <u><?php echo strtoupper($_SESSION['user_name'] ?? 'User') . " Khan"; ?></u> you can choose each icon you want</h2>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/../layouts/footer_less.php'; ?>
  <?php include __DIR__ . '/../layouts/footer_more.php'; ?>

</body>

</html>