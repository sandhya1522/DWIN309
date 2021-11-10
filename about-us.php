<?php include_once 'helpers/init.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <?php include('views/partials/head.php');
  ?>  
<body>
  <!-- Start Top Navbar -->
  <?php include('views/partials/navbar.php');
  ?>
  <!-- End of Navbar -->
  <!-- Start Filters -->
  <?php include('views/partials/filter.php'); ?>

  <!-- End of Filters -->

  <!-- Banner Ad -->
  <section class="bg-dark text-light mt-1 p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <h1><span class="text-warning">Disclaimer</span></h1>
          <p class="lead my-4">This site is hypothetical. <br>Created as DWIN309 Group Project at <em>"Kent Institute Australia"</em></p>
          <h4>Resources Used</h4>
          <ul>
            <li><a href="https://getbootstrap.com/" target="_blank">Bootstrap 5</a></li>
            <li><a href="https://color.adobe.com/create/color-wheel" target="_blank">Adobe Color</a></li>
            <li><a href="https://www.mapbox.com/" target="_blank">Mapbox</a></li>
            <li><a href="https://www.mysql.com/" target="_blank">MySQL</a></li>
            <li><a href="https://fonts.google.com/" target="_blank">Google Font</a></li>
            <li><a href="https://github.com/kartik-v/bootstrap-star-rating" target="_blank">Bootstrap-star-rating</a></li>
            <li><a href="https://jquery.com/" target="_blank">Jquery</a></li>
          </ul>
         
        </div>
        <img class="img-fluid w-50 d-none d-sm-block" src="/assets/images/common/banner.jpg" alt="Banner Img" />
      </div>
    </div>
  </section>
  <!-- End of Banner Ad -->

  <!-- Newsletter -->
  <section class="bg-primary text-light p-5">
    <div class="container">
      <div class="d-md-flex justify-content-between align-items-center">
        <h3 class="mb-3 mb-md-0">Signup for Newsletter</h3>
        <div class="input-group mb-3 news-input">
          <input type="text" class="form-control" placeholder="Enter Email" aria-label="Enter Email"
            aria-describedby="Enter Email" />
          <button class="btn btn-dark btn-lg" type="button" id="button-addon2">
            Subscribe Now
          </button>
        </div>
      </div>
    </div>
  </section>
  <!-- End of Newsletter -->

  <!-- Contact Us  -->
  <section class="p-5">
    <div class="container">
      <div class="row g-4" style="height: 500px;">
        <div class="col-md">
          <h2 class="px-2 mb-4">Contact Info</h2>
          <ul class="list-group list-group-flush lead">
            <li class="list-group-item">
              <span class="fw-bold">Address:</span> Level 11, 10 Barrack Street; Sydney NSW 2000, Australia</span>
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Phone:</span> +61 2 9093 5151</span>
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Email:</span> info@kent.edu.au</span>
            </li>
          </ul>
        </div>
        <div class="col-md">
          <div id="map"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- End of Contact Us  -->

  <!-- About Us -->

  <section class="p-5 bg-primary">
    <div class="container">
      <h2 class="text-center text-white">Team Members</h2>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img class="img-fluid" src="assets/images/common/sandhya.jpeg" width="120px" height="auto" alt="" />
              <h3 class="card-title mb-3">Sandhya kharal</h3>
              <span>Group Leader / K190640</span>
              <p>Bootstrap custamization, Session, User & Admin (Server-Side)</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img class="img-fluid" src="assets/images/common/Kuber.jpg" width="164px"  height="auto" alt="" />
              <h3 class="card-title mb-3">Kuber Shrestha</h3>
              <span>Member / K200534</span>
              <p>HTML Pages, Navigations, Map, Banner Ad, Clinet Side</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card bg-light">
            <div class="card-body text-center">
              <img class="img-fluid" src="assets/images/common/Rupesh.jpg" width="163px" height="auto" alt="" />
              <h3 class="card-title mb-3">Rupesh Devkota</h3>
              <span>Member / K200936</span>
              <p>SQL query, PDO, Review, Testing (Database & Testing)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End of About us -->
  <!-- Footer -->
  <?php include_once('views/partials/footer.php');
  ?>
  <!-- End of Footer -->

  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>

  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibGNzdXJlc2g3MjYiLCJhIjoiY2t0dWtpaTR6MWY0MTJvbDVjenZremswYyJ9.HOQ-vijp-0WLK2xVgeMu0Q';
    var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [151.2062354688899, -33.867156168585225],
      zoom: 14
    });

    const marker1 = new mapboxgl.Marker()
      .setLngLat([151.2062354688899, -33.867156168585225])
      .addTo(map);
  </script>
</body>
