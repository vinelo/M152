<?php
if (isset($_GET["action"])) {
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);

    try {
        switch ($action) {
            case "post":
                include 'controller/postController.php';
                break;
            case "home":
                include 'controller/homeController.php';
                break;
        }
    } catch (Exception $ex) {
        include 'views/500.php';
    }
} else {
    include 'controller/homeController.php';
}
