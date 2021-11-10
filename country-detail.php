<?php include_once('helpers/init.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('views/partials/head.php')?>
<body class="d-flex flex-column h-100">
  <header>
   <?php include_once('views/partials/navbar.php') ?>
    <!-- Start Filters -->
    <?php include_once('views/partials/filter.php');?>

    <!-- End of Filters -->
  </header>
  <?php include_once('lib/country-detail.php');?>
  <main class="flex-shrink-0">
    <!-- Image -->
    <section class="p-1 mt-2">
      <div class="container">
        <h2 class="px-2 mb-4"><?php echo $country->CountryName?> <img src="https://www.countryflags.io/<?php echo $country->ISO?>/flat/64.png"></h2>
        <div class="country-detail">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>Name</td>
                <td><?php echo $country->CountryName?></td>
              </tr>
              <tr>
                <td>Population</td>
                <td><?php echo $country->Population?></td>
              </tr>
              <tr>
                <td>Area</td>
                <td><?php echo $country->Area?></td>
              </tr>
              <tr>
                <td>Capital</td>
                <td><?php echo $country->Capital?></td>
              </tr>
              <tr>
                <td>Continent</td>
                <td><?php echo $country->Continent?></td>
              </tr>
              <tr>
                <td>TopLevelDomain</td>
                <td><?php echo $country->TopLevelDomain?></td>
              </tr>
              <tr>
                <td>Neighbours</td>
                <td><?php echo $country->Neighbours?></td>       
              </tr>
              <tr>
                <td>Languages</td>
                <td><?php echo $country->Languages?></td>       
              </tr>
              <tr>
                <td>CurrencyName</td>
                <td><?php echo $country->CurrencyName?></td>       
              </tr>
              <tr>
                <td>PhoneCountryCode</td>
                <td><?php echo $country->PhoneCountryCode?></td>       
              </tr>
              <tr>
                <td>GeoNameID</td>
                <td><?php echo $country->GeoNameID?></td>       
              </tr>
              <tr>
                <td>ISONumeric</td>
                <td><?php echo $country->ISONumeric?></td>       
              </tr>
              <tr>
                <td>CurrencyName</td>
                <td><?php echo $country->CurrencyName?></td>       
              </tr>
              <tr>
                <td>ISONumeric</td>
                <td><?php echo $country->ISONumeric?></td>       
              </tr>
              <tr>
                <td>PostalCodeFormat</td>
                <td><?php echo $country->PostalCodeFormat?></td>       
              </tr>
              <tr>
                <td>PostalCodeRegex</td>
                <td><?php echo $country->PostalCodeRegex?></td>       
              </tr>
              <tr>
                <td>Languages</td>
                <td><?php echo $country->Languages?></td>       
              </tr> 
               <tr>
                <td>CountryDescription</td>
                <td><?php echo $country->CountryDescription?></td>       
              </tr>
            </tbody>
          </table>
        </div> 
      </div>
    </section>
    <!-- End of Image -->

    <!-- Gallery -->
    <section class="p-5">
      <div class="container">
        <h2 class="px-2 mb-4">Travel Images of <?php echo $country->CountryName; ?></h2>
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
<?php include_once('views/partials/footer.php')
?>
  <!-- End of Footer -->

  <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>