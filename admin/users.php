<?php include_once(__DIR__.'/../helpers/init.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <?php include_once(__DIR__.'/../views/partials/head.php'); ?>
<body>
  <?php include_once(__DIR__.'/../views/partials/navbar.php'); ?>
  <?php include_once(__DIR__.'/../views/partials/filter.php'); ?>
  
  <?php include_once(__DIR__.'/../lib/users.php'); ?>
  <main>
     <section class="p-1 mt-2">
      <div class="container">
        <h2 class="px-2 mb-4">List of Users</h2>
        <div class="country-detail">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>City, Country, Postal</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($users as $key => $user) { ?>
                <tr>
                  <td><?php echo $user->FirstName." ".$user->LastName; ?></td>
                  <td><?php echo $user->Email; ?></td>
                  <td><?php echo $user->Address; ?></td>
                  <td><?php echo $user->Phone; ?></td>
                  <td><?php echo $user->City.", ".$user->Country.", ".$user->Postal; ?></td>
                  <td><a href="/admin/edit-user.php/?id=<?php echo $user->UID;?>"><i class="fa fa-edit"></i> Edit</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
  <?php include_once(__DIR__.'/../views/partials/footer.php'); ?>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>