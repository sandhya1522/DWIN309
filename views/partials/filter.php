<!-- Start Filters -->
<div class="container mt-1">
  <form action="/travel-images.php" class="row" method="get">
  <div class="row mx-3">
      <div class="col">
        <select class="form-select" aria-label="Country" name="CountryCodeISO">
          <option value="">Select Country</option>
          <?php foreach($countries as $country) { ?>
            <?php if(isset($_GET) && isset($_GET['CountryCodeISO']) && $_GET['CountryCodeISO'] == $country['CountryCodeISO']) { ?>
               <option selected="selected" value="<?php echo $country['CountryCodeISO'] ?>"><?php echo $country['CountryName'] ?></option>
            <?php } else { ?>
              <option value="<?php echo $country['CountryCodeISO'] ?>"><?php echo $country['CountryName'] ?></option>           
          <?php }} ?>
        </select>
      </div>
      <div class="col">
        <select class="form-select" aria-label="City" name="CityCode">
          <option value="">Select City</option>
          <?php foreach($cities as $city) {?>
            <?php if(isset($_GET) && isset($_GET['CityCode']) && $_GET['CityCode'] == $city['GeoNameID']) { ?>
              <option selected="selected" value="<?php echo $city['GeoNameID'] ?>"><?php echo $city['AsciiName'] ?></option>
            <?php } else { ?>
              <option value="<?php echo $city['GeoNameID'] ?>"><?php echo $city['AsciiName'] ?></option>
          <?php }} ?>
        </select>
      </div>
      <div class="col">
        <input type="text" name="title" class="form-control" placeholder="Enter title">
      </div>
      <div class="col">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
  </div>
  </form>
</div>
<!-- End of Filters -->