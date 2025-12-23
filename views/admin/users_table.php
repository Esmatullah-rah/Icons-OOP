<!doctype html>
<html class="no-js" lang="en">

<head>
  <?php require __DIR__ . '/../layouts/head_links.php'; ?>
</head>

<body>
  <?php include __DIR__ . '/../layouts/sidebar.php'; ?>

  <div id="right-panel" class="right-panel">
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <div class="content mt-3 text-center ">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header"><strong class="card-title">Users Table</strong></div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($users as $row): ?>
                      <tr>
                        <td><?= $row['ID'] ?></td>
                        <td><?= htmlspecialchars($row['Name']) ?></td>
                        <td><?= htmlspecialchars($row['Email']) ?></td>
                        <td><?= $row['role'] ?></td>
                        <td>
                          <a class="btn btn-info" href="admin/users/edit?id=<?= $row['ID'] ?>">Edit</a>

                          <a class="btn btn-danger" href="admin/users?delete_id=<?= $row['ID'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

                <div align="right">
                  <?php if ($page > 1): ?>
                    <a class="btn btn-secondary" href="admin/users?page=<?= $page - 1 ?>">Previous</a>
                  <?php endif; ?>

                  <?php if ($page < $total_pages): ?>
                    <a class="btn btn-secondary" href="admin/users?page=<?= $page + 1 ?>">Next</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <h2 class="text-center mt-5">Paid People</h2>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <strong class="card-title">Payments Table</strong>

                <a href="admin/payments/export" class="btn btn-success btn-sm">
                  <i class="fa fa-download"></i> Download All CSV
                </a>
              </div>

              <div class="card-body text-center">
                <table class="table table-dark">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Card ID</th>
                      <th>Amount</th>
                      <th>Start</th>
                      <th>Exp</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($payments as $pay): ?>
                      <tr>
                        <td><?= $pay['ID'] ?></td>
                        <td><?= htmlspecialchars($pay['Name']) ?></td>
                        <td><?= $pay['Card_id'] ?></td>
                        <td><?= $pay['Amount'] ?></td>
                        <td><?= $pay['Start_date'] ?></td>
                        <td><?= $pay['Exp_date'] ?></td>
                        <td>
                          <a href="admin/payments/export?id=<?= $pay['ID'] ?>" class="btn btn-outline-light btn-sm">
                            <i class="fa fa-file-text-o"></i> CSV
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php include __DIR__ . '/../layouts/footer_less.php'; ?>
</body>

</html>