<?php
require_once(__DIR__."/../dao/image.php");
require_once(__DIR__."/../dao/image-detail.php");
require_once(__DIR__."/../dao/country.php");

if(isset($_GET) && sizeof($_GET) > 0 && isset($_GET['title'])) {
  $where_clauses = [];
  foreach($_GET as $key=>$val) {
    if(empty($val)) {
      continue;
    }
    if ($key == 'title') {
      $item = [
        'key' => 'Title',
        'operand' => 'LIKE',
        'value' => '%'.$val.'%'
      ];
    } else {
      $item = [
        'key' => $key,
        'operand' => '=',
        'value' => $val
      ];
    }
    array_push($where_clauses, $item);
  }
  $options = [
      'where' => $where_clauses
    ];
} else if(isset($_GET) && sizeof($_GET) > 0 && isset($_GET['ContinentCode'])) {
    // fetch countries in the continent
    $options = [
      'where' => [
        [
          'key' => 'Continent',
          'operand' => '=',
          'value' => $_GET['ContinentCode']
        ],
      ]
    ];

    $countries = Country::findAll($options);
    $countries_codes = [];
    foreach($countries as $country) {
      $countries_codes[] = $country->ISO;
    }
    $options = [
      'where' => [
        [
          'key' => 'CountryCodeISO',
          'operand' => 'IN',
          'value' => $countries_codes
        ],
      ]
    ];
} else {
  $options = [
      'where' => [
        [
          'key' => '1',
          'operand' => '=',
          'value' => 1
        ],
      ]
    ];
}

// echo "<pre>";print_r($options);exit;

$all_images = ImageDetail::findAll($options);

$image_ids = [];
foreach ($all_images as $val) {
  $image_ids[] = $val->ImageID;
}
$image_urls = [];
$options = [
  'where' => [
    [
      'key' => 'ImageID',
      'operand' => 'IN',
      'value' => $image_ids
    ],
  ]
];

$all_image_url_list = Image::findAll($options);
foreach ($all_image_url_list as $val) {
  $image_urls[$val->ImageID] = $val->Path;
}


