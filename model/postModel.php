<?php

include 'databaseConnection.php';

function getPost() {
    $database = connectDb();
    $query = $database->prepare("SELECT * FROM post");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}
function getImages($idPost){
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
    $time = date("m.d.Y H:i:s", strtotime("now"));

    $query = $database->prepare("INSERT INTO `dbblog`.`post` ( commentaire, datePost) VALUES (:commentaire, :datePost)");
    if ($query->execute(array(
                        'commentaire' => $commentaire,
                        'datePost' => $time
                    ))) {
        $lastid = $database->lastInsertId();
        if ($lastid == !NULL) {
            var_dump($images);
            //foreach ($images as $image)
            //{
                addImage($images, $lastid);
            //}
        }
    }
}

function addImage($image, $lastid) {
    $imageServer = uniqid();
    $database = connectDb();
    var_dump($image);
    $query = $database->prepare("INSERT INTO `dbblog`.`media` (`idMedia`, `nomFichierMedia`, `typeMedia`, `idPost`) VALUES (:idMedia, :nomFichierMedia, :typeMedia, :idPost)");
    if($query->execute(
            array(
                'idMedia' => $imageServer,
                'nomFichierMedia' => $image['name'],
                'typeMedia' => $image['type'],
                'idPost' => $lastid
    )))
    {
        if (move_uploaded_file($image['tmp_name'], "image/" . $imageServer)) {
        return $database->lastInsertId();
    } else {
        return false;
    }

    }
    
}
