<?php include_once('helpers/init.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('views/partials/head.php');?>
<body>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-3">
        <img class="img-fluid text-center rounded-circle mb-3" src="assets/images/common/logo.png" alt="">
        <h1 class="text-center">TRAVEL DIARY</h1>
      </div>
    </div>
    <form class="row g-3" method="post" action="/lib/auth/register.php">
      <div class="col-md-6">
        <label for="firstName" class="form-label">Firsname</label>
        <input type="text" class="form-control" id="firstName" name="FirstName" required="required">
      </div>
      <div class="col-md-6">
        <label for="lastName" class="form-label">Lastname</label>
        <input type="text" class="form-control" id="lastName" name="LastName" required="required">
      </div>
      <div class="col-md-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="Email" required="required">
      </div>
      <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4" name="Pass" required="required">
      </div>
      <div class="col-md-6">
        <label for="inputPhone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="inputPhone" placeholder="01 234 5679" name="Phone">
      </div>
      <div class="col-md-6">
        <label for="inputRegion" class="form-label">Region</label>
        <input type="text" class="form-control" id="inputRegion" name="Region">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="Address">
      </div>
      <div class="col-md-4">
        <label for="inputAddress2" class="form-label">City</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="City" name="City">
      </div>

      <div class="col-md-4">
        <label for="inputCountry" class="form-label">Country</label>
        <input type="text" class="form-control" id="inputCountry" name="Country">
      </div>

      <div class="col-md-4">
        <label for="inputPostal" class="form-label">Postal</label>
        <input type="text" class="form-control" id="inputPostal" name="Postal">
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="Privacy" required="required">
        <label class="form-check-label" for="exampleCheck1">Accept term & privacy settings</label>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
      <a href="/login.php" class="btn btn-light">Already have an account</button>
    </form>
  </div>


  <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>