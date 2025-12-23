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
          <form action="register" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>User Name</label>
              <input type="text" required class="form-control" name="UserFullname" placeholder="User Name">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" required class="form-control" name="userEmail" placeholder="Email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" required class="form-control" name="userPassword" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Image (JPG)</label><br>
              <input type="file" name="userImg" accept="image/*" required>
            </div>
            <button type="submit" name="sub" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
            <div class="register-link m-t-15 text-center">
              <p>Already have account ? <a href="login"> Sign in</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . '/../layouts/footer_less.php'; ?>

</body>

</html>