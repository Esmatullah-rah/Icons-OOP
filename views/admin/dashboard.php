<!doctype html>
<html class="no-js" lang="en">

<head>
  <?php require __DIR__ . '/../layouts/head_links.php'; ?>
</head>

<body>
  <?php include __DIR__ . '/../layouts/sidebar.php'; ?>
  <div id="right-panel" class="right-panel">
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <div class="content mt-3">
      <div class="col-sm-12">
        <div style="font-size: 25px" class="alert alert-success alert-dismissible fade show" role="alert">
          Welcome Admin: <span class="badge badge-pill badge-success"> <?php echo strtoupper($_SESSION['user_name']) . " JAN"; ?> </span>
        </div>
      </div>
      <div class="col-xl-6">
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