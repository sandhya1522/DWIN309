 <!-- Start Top Navbar -->
<nav class="navbar navbar-expand-sm bg-secondary navbar-light py-0">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topnav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="topnav">
      <ul class="navbar-nav">
        <?php foreach($continents as $c) { ?>
          <li class="nav-item">
            <a href="/travel-images.php/?ContinentCode=<?php echo $c->ContinentCode; ?>" class="nav-link"><?php echo $c->ContinentName; ?></a>
          </li>
        <?php } ?>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php if($is_logged_in) { ?>
        <li class="nav-item">
          <a href="/profile.php" class="nav-link"><i class="fas fa-user"></i> Profile</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a href="/favorites.php" class="nav-link"><i class="fas fa-heart"></i> Favorites</a>
        </li>
        <li class="nav-item d-flex align-items-center">
          <?php if($is_logged_in) { ?>
            <span>Hi, <?php echo $current_user_name; ?></span>
          <?php } ?>
        </li>
        <li class="nav-item">
          <?php if($is_logged_in) { ?>
            <a href="/lib/auth/logout.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Logout</a>
          <?php } else { ?>
            <a href="/login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Login</a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End of Top Navbar -->

<!-- Start Navbar -->
<nav class="navbar sticky-top navbar-expand-lg bg-primary navbar-dark py-0 p-5">
  <div class="container">
    <a class="navbar-brand" href="/index.php">
      <img src="/assets/images/common/logo.png" width="30" height="30" alt="">
    </a>
    <a href="/index.php" class="navbar-brand">TRAVEL DIARY</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navmenu"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav my-3 me-auto">
        <li class="nav-item">
          <a href="/index.php" class="nav-link">HOME</a>
        </li>
        <li class="nav-item">
          <a href="/about-us.php" class="nav-link">ABOUT US</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="nav-browse-item" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            BROWSE
          </a>
          <ul class="dropdown-menu" aria-labelledby="nav-browse-item">
            <li><a class="dropdown-item" href="/posts.php">Posts</a></li>
            <li><a class="dropdown-item" href="/travel-images.php">Images</a></li>
            <?php if (isset($is_admin) && $is_admin) { ?>
              <li><a class="dropdown-item" href="/admin/users.php">Users</a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
      <form class="d-flex" method="get" action="/travel-images.php">
        <input name="title" class="form-control me-2" type="text" placeholder="Search" aria-label="Search" required="required">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> 
<!-- End of Navbar -->