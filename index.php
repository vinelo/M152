<?php

if (isset($_GET["action"])) {
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);

        switch ($action) {
            case "post":
                include 'controller/postController.php';
                break;
            case "addPost":
                include 'controller/addPostController.php';
                break;
            case "home":
                include 'controller/homeController.php';
                break;
        }
    } 
else {
    include 'controller/homeController.php';
}
