<?php include_once('helpers/init.php'); ?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('views/partials/head.php'); ?>


<body class="d-flex flex-column h-100">
  <?php include_once('views/partials/navbar.php'); ?>
  <?php include_once('views/partials/filter.php'); ?>
  
  <?php include_once('lib/travel-images.php'); ?>
  <main class="flex-shrink-0">
    <!-- Gallery -->
    <section class="p-5">
      <div class="container">
        <h2 class="px-2 mb-4">Image List</h2>
        <div class="row g-4 mb-4">
          <?php foreach($all_images as $image_item) { ?>
            <div class="col-md-6 col-lg-4">
              <div class="card bg-light">
                <a href="/image-detail.php/?id=<?php echo $image_item->ImageID; ?>">
                  <img src="/assets/images/small/<?php echo $image_urls[$image_item->ImageID]; ?>" class="card-img-top"
                    alt="...">
                </a>
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo $image_item->Title; ?></h5>
                  <span><?php echo $image_item->Description; ?></span>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <a href="/country-detail.php/?CountryCodeISO=<?php echo $image_item->CountryCodeISO;?>">
                        <img src="https://www.countryflags.io/<?php echo $image_item->CountryCodeISO; ?>/flat/32.png">
                      </a>
                    </div>
                    <div class="col">
                      <a href="/city-detail.php/?CityCode=<?php echo $image_item->CityCode;?>"><?php echo $image_item->CityCode;?></a>
                    </div>
                    <div class="col">
                      <form method="post" action="/favorites.php">
                        <input type="hidden" value="<?php echo $image_item->ImageID; ?>" name="ImageID" />
                        <button class="btn" type="submit">
                          <?php if(in_array($image_item->ImageID, $current_favorites)) { ?>
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
    <!-- End of Gallery -->
  </main>

  <!-- Footer -->
  <footer class="footer py-3 mt-auto bg-dark text-primary text-center">
    <div class="container">
      <p class="lead">Copyright &copy; 2021 Travel Diary</p>
      <a href="#" class="position-absolute bottom-0 end-0 p-5 text-white">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>
  </footer>
  <!-- End of Footer -->

  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>

  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibGNzdXJlc2g3MjYiLCJhIjoiY2t0dWtpaTR6MWY0MTJvbDVjenZremswYyJ9.HOQ-vijp-0WLK2xVgeMu0Q';
    var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [-71, 42],
      zoom: 12
    });
  </script>
</body>

</html>