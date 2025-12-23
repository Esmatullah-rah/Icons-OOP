<!doctype html>
<html class="no-js" lang="en">

<head>
  <?php require __DIR__ . '/../layouts/head_links.php'; ?>
</head>

<body class="bg-dark">

  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-logo">
          <a href="./">
            <img class="align-content" src="assets/images/logo.png" alt="">
          </a>
        </div>
        <div class="login-form">
          <form action="login" method="POST">
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="userEmail" required class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="userPassword" required class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
            <div class="register-link m-t-15 text-center">
              <p>Don't have account ? <a href="register"> Sign Up Here</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/../layouts/footer_less.php'; ?>

</body>

</html>