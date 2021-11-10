<?php
require_once(__DIR__."/../dao/image.php");
require_once(__DIR__."/../dao/image-detail.php");
require_once(__DIR__."/../dao/review.php");

$latest_reviews = Review::findAll([], 'PostedAt', 'DESC', 2);

$raw_sql = "SELECT avg(rating) as total_rating, count(*)  as rating_count, tir.ImageID, tid.Title, tid.Description, ti.Path 
  from `travelimagerating` as tir  
  inner join `travelimagedetails` as tid on tid.ImageId=tir.ImageID
  inner join `travelimage` as ti on ti.ImageId=tir.ImageID
  group by ImageID order by total_rating desc limit 4; ";


$top_images = Image::rawQuery($raw_sql);

$raw_sql = "SELECT tri.ImageID, avg(tri.Rating) as total_rating, count(tri.Rating) as rating_count, tid.Title, tid.Description, tid.CountryCodeISO, tp.PostTime, ti.Path from `travelpostimages` as tpi
	inner join `travelpost` as tp on tp.PostID=tpi.PostID 
	inner join `travelimagedetails` as tid on tid.ImageID=tpi.ImageID
	inner join `travelimage` as ti on ti.ImageID=tpi.ImageID
	inner join `travelimagerating` as tri on tri.ImageID=tpi.ImageID
	group by tri.ImageID, tp.PostTime
order by tp.PostTime desc, tri.ImageID limit 6 ;";

$new_additions = Image::rawQuery($raw_sql);


 