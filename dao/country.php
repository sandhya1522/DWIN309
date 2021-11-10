<?php
require_once("entity.php");

class Country extends Entity
{
  private static $table_name = 'geocountries';
  private static $primary_key = 'ISO';
  public $ISO, $fipsCountryCode, $ISO3, $ISONumeric, $CountryName, $Capital, $GeoNameID, $Area, $Population, $Continent, $TopLevelDomain, $CurrencyCode, $CurrencyName, $PhoneCountryCode, $Languages, $PostalCodeFormat, $PostalCodeRegex, $Neighbours, $CountryDescription;
}