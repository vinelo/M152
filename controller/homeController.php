<?php
require_once 'model/postModel.php';
$posts = getPost();
include './view/home.php';