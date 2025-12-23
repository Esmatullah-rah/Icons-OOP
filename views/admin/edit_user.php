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
      <div class="col-lg-12 d-flex text-center justify-content-center">
        <div class="card col-md-8">
          <div class="card-header">Edit Form</div>
          <div class="card-body card-block">
            <form method="post">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
                  <input type="text" value="<?= htmlspecialchars($user['Name']); ?>" name="up_username" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                  <input type="email" value="<?= htmlspecialchars($user['Email']); ?>" name="up_email" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-bolt"></i></div>
                  <input type="text" value="<?= htmlspecialchars($user['role']); ?>" name="up_role" class="form-control">
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-lg">Change</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/../layouts/footer_less.php'; ?>
</body>

</html>