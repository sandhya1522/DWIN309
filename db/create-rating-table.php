<?php 
require_once(__DIR__."/../dao/continent.php");

$sql = "CREATE TABLE IF NOT EXISTS travelimagereviews (
    ReviewID INT AUTO_INCREMENT PRIMARY KEY,
    Review TEXT,
    PostedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UID INT NOT NULL,
    ImageID INT NOT NULL,
    Rating TINYINT NOT NULL
)  ENGINE=INNODB;";

Continent::rawQuery($sql);