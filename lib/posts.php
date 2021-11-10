<?php
require_once(__DIR__."/../dao/post.php");

$posts = Post::findAll([], $orderBy = 'PostTime');