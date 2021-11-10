<?php
function subview($file){
	$file = __DIR__.'/../views/partials/'.$file;
	include $file;
}