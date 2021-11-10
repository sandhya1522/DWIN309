<?php
  require_once(__DIR__."/helpers/init.php");
?>

<!DOCTYPE html>
<html lang="en">
  <?php include_once('views/partials/head.php'); ?>
<body>
  <?php include_once('views/partials/navbar.php'); ?>
  <?php include_once('views/partials/filter.php'); ?>

  <?php include_once('lib/favorites.php'); ?>
  <!-- Top Images -->
  <section class="p-5">
    <div class="container">
      <h2 class="px-2 mb-4">Favorite Images</h2>
      <div class="row g-4">
        <?php if(count($current_favorites_images) <= 0) { ?>
          <h2 class="p-5">No any favorites images yet</h2>
        <?php } ?>
        <?php foreach($current_favorites_images as $image) { ?>
          <div class="col-md-4 col-lg-3">
            <div class="card bg-light">
              <img src="/assets/images/small/<?php echo $image_urls[$image->ImageID] ?>" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $image->Title ?></h5>
                <span><?php echo $image->Description ?></span>
                <hr>
                <div class="row align-items-center">
                    <div class="col">
                      <a href="/country-detail.php/?CountryCodeISO=<?php echo $image->CountryCodeISO;?>">
                        <img src="https://www.countryflags.io/<?php echo $image->CountryCodeISO; ?>/flat/32.png">
                      </a>
                    </div>
                    <div class="col">
                      <a href="/city-detail.php/?CityCode=<?php echo $image->CityCode;?>"><?php echo $image->CityCode;?></a>
                    </div>
                    <div class="col">
                      <form method="post" action="/favorites.php">
                        <input type="hidden" value="<?php echo $image->ImageID; ?>" name="ImageID" />
                        <button class="btn" type="submit">
                          <?php if(in_array($image->ImageID, $current_favorites)) { ?>
                            <i class="fas fa-heart fav-icon icon-size"></i>
                          <?php } else { ?>
                            <i class="far fa-heart fav-icon icon-size"></i>
                          <?php } ?>
                        </button>
                      </form>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End of Top Images -->

  <?php include_once('views/partials/footer.php'); ?>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>