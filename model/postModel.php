<?php

include 'databaseConnection.php';

function getPost()
{
        $database = connectDb();
        $query = $database->prepare("SELECT * FROM `post`");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
}
function addPost($commentaire, $image) {
    $imageServer = uniqid();
    $database = connectDb();
    $time = date("m.d.Y H:i:s",strtotime($time));

    $query = $database->prepare("INSERT INTO `dbblog`.`post` ( commentaire, typeMedia, nomMedia, datePost, nomUniqueMedia ) VALUES (:commentaire, :typeMedia, :nomMedia, :datePost, :nomUniqueMedia)");
    if ($query->execute(
                    array(
                        'commentaire' => $commentaire,
                        'typeMedia' => $image['type'],
                        'nomMedia' => $image['name'],
                        'datePost' => $time,
                        'nomUniqueMedia' => $imageServer
                    )
            )) {
        if (move_uploaded_file($image['tmp_name'], "image/" . $imageServer)) {
            return true;
        }
    } else {
        return false;
    }
}
