<?php include_once('helpers/init.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <?php include_once('views/partials/head.php'); ?>
<body>
  <?php include_once('views/partials/navbar.php'); ?>
  <?php include_once('views/partials/filter.php'); ?>
  
  <!-- Sliders -->
  <section>
      <div id="carouselExampleIndicators" class="carousel slide mt-2" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/assets/images/common/banner1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/assets/images/common/banner2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/assets/images/common/banner3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </section>
  <!-- Carousal -->
  
  <?php include_once('lib/index.php'); ?>

  <!-- Latest n reviews -->
  <section class="p-5">
      <div class="container">
        <h2 class="px-2 mb-4">Latest Reviews</h2>
        <ul class="list-group">
          <?php if(count($latest_reviews) > 0) { ?>
            <?php foreach($latest_reviews as $review) { ?>
              <a href="/image-detail.php/?id=<?php echo $review->ImageID; ?>">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span style="font-family: Indie Flower; font-size: 20px;"><?php echo $review->Review; ?></span>
                  <span class="badge bg-primary rounded-pill"><?php echo $review->Rating; ?></span>
                </li>
              </a>
            <?php } ?>
          <?php } else { ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">No reviews yet</li> 
          <?php } ?>
        </ul>
      </div>
    </section>
  <!-- End of Latest n reviews -->

  <!-- Top Images -->
  <section class="p-5">
    <div class="container">
      <h2 class="px-2 mb-4">Top Images</h2>
      <div class="row g-4">
        <?php foreach($top_images as $image) { ?>
          <div class="col-md-4 col-lg-3">
            <div class="card bg-light">
              <a href="/image-detail.php/?id=<?php echo $image['ImageID'] ?>">
                <img src="/assets/images/small/<?php echo $image['Path'] ?>" class="card-img-top" alt="...">
              </a>
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $image['Title'] ?></h5>
                <span><?php echo $image['Description'] ?></span>
                <hr>
                <div class="row align-items-center icon-size">
                  <div class="col"><i class="fa fa-star rating-color"></i><?php echo number_format($image['total_rating'], 2); ?></div>
                  <div class="col"><i class="fa fa-users"></i> <?php echo $image['rating_count'] ?></div>
                  <div class="col">
                    <form method="post" action="/favorites.php">
                      <input type="hidden" value="<?php echo $image['ImageID']; ?>" name="ImageID" />
                      <button class="btn" type="submit">
                        <?php if(in_array($image['ImageID'], $current_favorites)) { ?>
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

  <?php include_once('lib/index.php'); ?>
  <!-- New Additions -->
  <section class="p-5">
    <div class="container">
      <h2 class="px-2 mb-4">New Additions</h2>
      <div class="row g-4">
        <?php foreach ($new_additions as $new_image) { ?>
        <div class="col-md-6 col-lg-4">
          <div class="card bg-light">
            <a href="/image-detail.php/?id=<?php echo $new_image['ImageID'] ?>">
              <img src="/assets/images/small/<?php echo $new_image['Path'] ?>" class="card-img-top" alt="...">
            </a>
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo $new_image['Title'] ?></h5>
              <span>
                <?php echo $image['Description'] ?>
                <a href="/country-detail.php/?CountryCodeISO=<?php echo $new_image['CountryCodeISO'] ?>"><img src="https://www.countryflags.io/<?php echo $new_image['CountryCodeISO'] ?>/flat/32.png"></a>
              </span>
              <hr>
              <div class="row d-flex align-items-center icon-size">
                <div class="col"><i class="fa fa-star rating-color"></i><?php echo number_format($new_image['total_rating'], 2); ?></div>
                <div class="col align-items-center justify-content-center">
                  <form action="/lib/rated-images.php" method="post">
                    <input type="hidden" name="ImageID" value="<?php echo $new_image['ImageID'] ?>">
                    <input type="hidden" name="UID" value="<?php echo $current_user_id ?? ''; ?>">
                    <input name="rating" value="" id="input-id" type="text" class="rating" data-step="1" data-show-clear="false" data-show-caption="false" data-size="sm" >
                    <button type="submit"><i class="fa fa-check"></i></button>
                  </form>
                </div>
                <div class="col">
                  <form method="post" action="favorites.php">
                    <input type="hidden" value="<?php echo $new_image['ImageID']; ?>" name="ImageID" />
                    <button class="btn" type="submit">
                      <?php if(in_array($new_image['ImageID'], $current_favorites)) { ?>
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
  <!-- End of New Additions -->

  <?php include_once('views/partials/footer.php'); ?>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>