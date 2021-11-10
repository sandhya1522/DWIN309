<?php include_once('helpers/init.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once('views/partials/head.php'); ?>
<body>
  <?php include_once('views/partials/navbar.php'); ?>
  <?php include_once('views/partials/filter.php'); ?>
  
  <?php include_once('lib/image-detail.php'); ?>
  <main class="flex-shrink-0">
    <!-- Image -->
    <section class="p-1 mt-2">
      <div class="container">
        <h2 class="px-2 mb-4">Image Detail</h2>
        <div class="row">
          <div class="col-6">
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title"><?php echo $single_image->Title; ?><img class="mx-2" src="https://www.countryflags.io/<?php echo $single_image->CountryCodeISO; ?>/flat/32.png"></h5>
                <p class="card-text"><?php echo $single_image->Description; ?></p>
              </div>
              <img src="/assets/images/large/<?php echo $image_urls[$single_image->ImageID]; ?>" class="card-img-top" alt="...">
            </div>
          </div>
          <div class="col-6">
            <h2 class="px-2 mb-4">Post a review</h2>
            <form class="row g-3" method="post" action="/lib/review.php">
              <input type="hidden" name="ImageID" value="<?php echo $_GET['id'] ?>">
              <div class="col-md-12">
                <label for="review" class="form-label">Review</label>
                <textarea name="Review" class="form-control" rows="10" placeholder="Type your review here..." required="required"></textarea>
              </div>

              <div class="col-md-12">
                <label for="rating" class="form-label">Rating</label>
                <input name="rating" value="" id="input-id" type="text" class="rating" data-step="1" data-show-clear="false" data-show-caption="false" data-size="sm" >
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End of Image -->
    <!-- Reviews -->
    <section class="p-5">
      <div class="container">
        <h2 class="px-2 mb-4">Reviews</h2>
        <ul class="list-group">
          <?php if(count($reviews) > 0) { ?>
            <?php foreach($reviews as $review) { ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span style="font-family: Indie Flower; font-size: 20px;"><?php echo $review->Review; ?></span>
                <span class="badge bg-primary rounded-pill"><?php echo $review->Rating; ?></span>
                <?php if (isset($is_admin) && $is_admin) { ?>
                  <form method="post" action="/admin/review-delete.php">
                    <input type="hidden" value="<?php echo $review->ImageID; ?>" name="ImageID" />
                    <input type="hidden" value="<?php echo $review->ReviewID; ?>" name="ReviewID" />
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Remove</button>
                  </form>
                  <?php } ?>
              </li>
            <?php } ?>
          <?php } else { ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">No reviews yet</li> 
          <?php } ?>
        </ul>
      </div>
    </section>
    <!-- End of Reviews -->
    <!-- Location -->
    <div class="section p-1 mt-2">
      <div class="container">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                Location
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
        <h2 class="px-2 mb-4">Images from same Country</h2>
        <div class="row g-4 mb-4">
          <?php foreach ($similar_images as $similar_image) { ?>
          <div class="col-md-6 col-lg-4">
            <div class="card bg-light">
              <a href="/image-detail.php/?id=<?php echo $similar_image->ImageID ?>">
                <img src="/assets/images/medium/<?php echo $image_urls[$similar_image->ImageID]; ?>" class="card-img-top" alt="...">
              </a>
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $similar_image->Title ?></h5>
                <span><?php echo $similar_image->Description ?></span>
                <hr>
                <div class="row">
                  <div class="col"><?php echo $similar_image->Latitude.", ".$similar_image->Longitude ?></div>
                  <div class="col"><a href="/city-detail.php/?CityCode=<?php echo $similar_image->CityCode; ?>"><?php echo $similar_image->CityCode; ?></a></div>
                  <div class="col">
                    <form method="post" action="/favorites.php">
                      <input type="hidden" value="<?php echo $similar_image->ImageID; ?>" name="ImageID" />
                      <button class="btn" type="submit">
                        <?php if(in_array($similar_image->ImageID, $current_favorites)) { ?>
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

    <!-- Related Posts -->
    <section class="p-5">
      <div class="container">
        <h2 class="px-2 mb-4">Related Images of Post</h2>
        <div class="row g-4 mb-4">
          <?php foreach ($other_image_in_same_post as $same_post_image) { ?>
            <div class="col-md-6 col-lg-4">
              <div class="card bg-light">
                <a href="/image-detail.php/?id=<?php echo $same_post_image->ImageID ?>">
                  <img src="/assets/images/medium/<?php echo $image_urls[$same_post_image->ImageID]; ?>" class="card-img-top" alt="...">
                </a>
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo $same_post_image->Title ?></h5>
                  <span><?php echo $same_post_image->Description ?></span>
                  <hr>
                  <div class="row">
                    <div class="col"><?php echo $same_post_image->Latitude.", ".$same_post_image->Longitude ?></div>
                    <div class="col"><a href="/city-detail.php/?CityCode=<?php echo $same_post_image->CityCode; ?>"><?php echo $same_post_image->CityCode; ?></a></div>
                    <div class="col">
                      <form method="post" action="/favorites.php">
                        <input type="hidden" value="<?php echo $same_post_image->ImageID; ?>" name="ImageID" />
                        <button class="btn" type="submit">
                          <?php if(in_array($same_post_image->ImageID, $current_favorites)) { ?>
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
    <!-- End of Related Posts -->
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
      center: [<?php echo $single_image->Latitude ?>, <?php echo $single_image->Longitude ?>],
      zoom: 3
    });

    const marker1 = new mapboxgl.Marker()
      .setLngLat([<?php echo $single_image->Latitude ?>, <?php echo $single_image->Longitude ?>])
      .addTo(map);
  </script>
</body>

</html>