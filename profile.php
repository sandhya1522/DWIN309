<?php
  require_once(__DIR__."/helpers/init.php");
?>

<!DOCTYPE html>
<html lang="en">
  <?php include_once('views/partials/head.php'); ?>
<body>
  <?php include_once('views/partials/navbar.php'); ?>
  <?php include_once('views/partials/filter.php'); ?>

  <?php include_once('lib/profile.php'); ?>
  <!-- Top Images -->
  <section class="p-5">
    <div class="container">
      <h2 class="px-2 mb-4">Profile Detail</h2>
      <div class="col-12">
        <div class="card bg-light">
          <div class="card-body text-center">
            <h3 class="card-title"><?php echo $current_user->getFullname(); ?></h3>
            <hr>
            <div class="row align-items-center">
              <div class="col-6">Email</div>
              <div class="col-6"><?php echo $current_user->Email; ?></div>
              <hr/>
              <div class="col-6">Phone</div>
              <div class="col-6"><?php echo $current_user->Phone; ?></div>
              <hr>
              <div class="col-6">Address</div>
              <div class="col-6"><?php echo $current_user->Address; ?></div>
              <hr>
              <div class="col-6">City, Country, Postal</div>
              <div class="col-6"><?php echo $current_user->City.", ".$current_user->Country.", ".$current_user->Postal; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End of Top Images -->

  <?php include_once('views/partials/footer.php'); ?>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>