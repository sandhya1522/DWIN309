<?php include_once(__DIR__.'/../helpers/init.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <?php include_once(__DIR__.'/../views/partials/head.php'); ?>
<body>
  <?php include_once(__DIR__.'/../views/partials/navbar.php'); ?>
  <?php include_once(__DIR__.'/../views/partials/filter.php'); ?>
  
  <?php include_once(__DIR__.'/../lib/edit-user.php'); ?>
  <main>
     <section class="p-1 mt-2">
      <div class="container">
        <h2 class="my-2">Edit User</h2>
        <form class="row g-3" method="post" action="/lib/update-user.php">
          <input type="hidden" name="UID" value="<?php echo $_GET['id'] ?>">
          <div class="col-md-6">
            <label for="firstName" class="form-label">Firsname</label>
            <input type="text" class="form-control" id="firstName" name="FirstName" required="required" value="<?php echo $user->FirstName; ?>">
          </div>
          <div class="col-md-6">
            <label for="lastName" class="form-label">Lastname</label>
            <input type="text" class="form-control" id="lastName" name="LastName" required="required" value="<?php echo $user->LastName; ?>">
          </div>
          <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="Email" required="required" value="<?php echo $user->Email; ?>">
          </div>
          <div class="col-md-6">
            <label for="inputPhone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="inputPhone" placeholder="01 234 5679" name="Phone" value="<?php echo $user->Phone; ?>">
          </div>
          <div class="col-md-6">
            <label for="inputRegion" class="form-label">Region</label>
            <input type="text" class="form-control" id="inputRegion" name="Region" value="<?php echo $user->Region; ?>">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="Address" value="<?php echo $user->Address; ?>">
          </div>
          <div class="col-md-4">
            <label for="inputAddress2" class="form-label">City</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="City" name="City" value="<?php echo $user->City; ?>">
          </div>

          <div class="col-md-4">
            <label for="inputCountry" class="form-label">Country</label>
            <input type="text" class="form-control" id="inputCountry" name="Country" value="<?php echo $user->Country; ?>">
          </div>

          <div class="col-md-4">
            <label for="inputPostal" class="form-label">Postal</label>
            <input type="text" class="form-control" id="inputPostal" name="Postal" value="<?php echo $user->Postal; ?>">
          </div>

          <button type="submit" class="btn btn-primary">Update User Detail</button>
        </form>
      </div>
    </section>
  </main>
  <?php include_once(__DIR__.'/../views/partials/footer.php'); ?>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>