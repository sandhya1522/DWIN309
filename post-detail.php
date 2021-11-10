<?php include_once'helpers/init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('views/partials/head.php'); ?>
<body class="d-flex flex-column h-100">
  <header>
    <!-- Start Navbar -->
  <?php include_once('views/partials/navbar.php'); ?>
    <!-- End of Navbar -->

    <!-- Start Filters -->
  <?php include_once('views/partials/filter.php'); ?> 
    <!-- End of Filters -->
  </header>
  
  <?php include_once('lib/post-detail.php'); ?>
  <main class="flex-shrink-0">
    <!-- Post Detail -->
    <section class="p-5 mt-2">
      <div class="container">
        <h2><?php echo $post->Title; ?></h2>
        <div class="card text-center">
          <div class="card-body">
            <p class="card-text"><?php echo $post->Message; ?></p>
            <p class="card-text">Author: <?php echo $post->UID; ?>| <?php echo date('Y-m-d', strtotime($post->PostTime)); ?></p>
          </div>
        </div>
      </div>
    </section>
    <!-- Post Detail -->

    <!-- Post Images -->
      <section class="p-5">
        <div class="container">
          <h2 class="px-2 mb-4">Inside this</h2>
          <div class="row g-4">
            <?php foreach($images as $image) { ?>
            <div class="col-md-6 col-lg-4">
              <div class="card bg-light">
                <a href="/image-detail.php/?id=<?php echo $image->ImageID; ?>"><img src="/assets/images/small/<?php echo $image_urls[$image->ImageID];?>" class="card-img-top" alt="..."></a>
                <div class="card-body text-center">
                  <h5 class="card-title">
                    <?php echo $image->Title ?>
                  </h5>
                  <span><?php $image->Description; ?></span>
                  <hr>
                  <div class="row">
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
    <!-- End of Post Images -->
  </main>

  <!-- Footer -->
  <?php include_once('views/partials/footer.php');?>
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