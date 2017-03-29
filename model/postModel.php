<?php

include 'databaseConnection.php';

function getPost() {
    $database = connectDb();
    $query = $database->prepare("SELECT * FROM post order by datePost Desc");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}
function getImages($idPost){
    $database = connectDb();
    $query = $database->prepare("SELECT * FROM media
                                WHERE media.idPost = :idPost");
    $query->execute(array(
        'idPost' => $idPost
    ));
    $result = $query->fetchAll();
    return $result;
}

function addPost($commentaire, $images) {

    $database = connectDb();
    $time = date("Y-m-d H:i:s");

    $query = $database->prepare("INSERT INTO `dbblog`.`post` ( commentaire, datePost) VALUES (:commentaire, :datePost)");
    if ($query->execute(array(
                        'commentaire' => $commentaire,
                        'datePost' => $time
                    ))) {
        $lastid = $database->lastInsertId();
        if ($lastid == !NULL) {
            var_dump($images);
            $count = count($images['name']);
            for($i = 0; $i < $count; $i++)
            {
                addImage($images['name'][$i],$images['type'][$i],$images['tmp_name'][$i], $lastid);
            }
        }
    }
}

function addImage($imageName, $imageType, $imageTmp, $lastid) {
    $imageServer = uniqid();
    $database = connectDb();
    $query = $database->prepare("INSERT INTO `dbblog`.`media` (`idMedia`, `nomFichierMedia`, `typeMedia`, `idPost`) VALUES (:idMedia, :nomFichierMedia, :typeMedia, :idPost)");
    if($query->execute(
            array(
                'idMedia' => $imageServer,
                'nomFichierMedia' => $imageName,
                'typeMedia' => $imageType,
                'idPost' => $lastid
    )))
    {
        if (move_uploaded_file($imageTmp, "image/" . $imageServer)) {
        return $database->lastInsertId();
    } else {
        return false;
    }

    }
    
}
