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
  <?php include_once('lib/posts.php'); ?>
  <main class="flex-shrink-0">
      <!-- Gallery -->
      <section class="p-5 mt-1">
        <div class="container">
          <div class="row p-4 mb-2 justify-content-center">
            <?php foreach($posts as $post) { ?>
            <div class="col col-sm-6 col-md-4 col-lg-3 mb-3">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title"><strong><?php echo $post->Title; ?></strong></h5>
                  <p class="card-text"><?php echo substr($post->Message, 0, 150)."..."; ?></p>
                  <p class="card-text">Author: <?php echo $post->UID; ?>| <?php echo date('Y-m-d', strtotime($post->PostTime)); ?></p>
                  <a href="post-detail.php/?id=<?php echo $post->PostID ?>" class="btn btn-primary">View Detail</a>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>
      <!-- Gallery -->
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