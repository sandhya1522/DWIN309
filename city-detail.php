<?php include_once('helpers/init.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('views/partials/head.php');?>
<body class="d-flex flex-column h-100">
<!-- Start Navbar -->
<?php include_once('views/partials/navbar.php');?>
<!-- End of Navbar -->
    <!-- Start Filters -->
    <?php include_once('views/partials/filter.php');?>
    <!-- End of Filters -->
    <?php include_once('lib/city-detail.php');?>
  </header>
  <main class="flex-shrink-0">
    <!-- Image -->
    <section class="p-1 mt-2">
      <div class="container">
        <h2 class="px-2 mb-4"><?php echo $city->AsciiName?></h2>
        <div class="country-detail">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>City Name</td>
                <td><?php echo $city->AsciiName?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td><?php echo $city->CountryCodeISO?> <img src="https://www.countryflags.io/<?php echo $city->CountryCodeISO?>/flat/32.png"></td>
              </tr>
              <tr>
                <td>Population</td>
                <td><?php echo $city->Population?></td>
              </tr>
              <tr>
                <td>Elevation</td>
                <td><?php echo $city->Elevation?></td>
              </tr>
              <tr>
                <td>TimeZone</td>
                <td><?php echo $city->TimeZone?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- End of Image -->

        <!-- Location -->
        <div class="section p-1 mt-2">
          <div class="container">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    City Location
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div id="map" style="height: 500px;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End of location -->

    <!-- Gallery -->
    <section class="p-5">
      <div class="container">
        <h2 class="px-2 mb-4">Travel Images of <?php echo $city->AsciiName; ?></h2>
        <div class="row g-4 mb-4">
          <?php foreach ($similar_images as $image) { ?>
          <div class="col-md-6 col-lg-4">
            <div class="card bg-light">
              <a href="/image-detail.php/?id=<?php echo $image->ImageID ?>">
                <img src="/assets/images/small/<?php echo $image_urls[$image->ImageID] ?>" class="card-img-top" alt="...">
                </a>
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $image->Title?></h5>
                <span><?php echo $image->Description?></span>
                <hr>
                <div class="row">
                  <div class="col"><?php echo $image->Latitude.", ".$image->Longitude ?></div>
                  <div class="col"><a href="/city-detail.php/?CityCode=<?php echo $image->CityCode; ?>"><?php echo $image->CityCode; ?></a></div>
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
    <!-- End of Gallery -->
  </main>

  <!-- Footer -->
<?php include_once('views/partials/footer.php') ?>
  <!-- End of Footer -->

  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  
  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibGNzdXJlc2g3MjYiLCJhIjoiY2t0dWtpaTR6MWY0MTJvbDVjenZremswYyJ9.HOQ-vijp-0WLK2xVgeMu0Q';
    var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [<?php echo $city->Latitude?>, <?php echo $city->Longitude?>],
      zoom: 8
    });
    const marker1 = new mapboxgl.Marker()
      .setLngLat([<?php echo $city->Latitude ?>, <?php echo $city->Longitude ?>])
      .addTo(map);
  </script>
</body>

</html>