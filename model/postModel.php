<?php

include 'databaseConnection.php';

function getPost() {
    $database = connectDb();
    $query = $database->prepare("SELECT * FROM media, post
WHERE media.idPost = post.idPost");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

function addPost($commentaire, $image) {
    $imageServer = uniqid();
    $database = connectDb();
    $time = date("m.d.Y H:i:s", strtotime($time));

    $query = $database->prepare("INSERT INTO `dbblog`.`post` ( commentaire, datePost) VALUES (:commentaire, :datePost)");
    if ($query->execute(
                    array(
                        'commentaire' => $commentaire,
                        'typeMedia' => date()
                    )
            )) {
        $lastid = $database->lastInsertId();
        if ($lastid == !NULL) {
            foreach ($image as $imag) 
                {
                $query = $database->prepare("INSERT INTO `dbblog`.`media` (`idMedia`, `nomFichierMedia`, `typeMedia`, `idPost`)  (':idMedia', ':nomFichierMedia', ':typeMedia', ':idPost');");
                $query->execute(
                array(
                'idMedia' => $commentaire,
                'nomFichierMedia' => $imag['name'],
                'typeMedia' => $imag['type'],
                    'idPost' => $lastid
                )
                );
            }
        }
            

        if (move_uploaded_file($image['tmp_name'], "image/" . $imageServer)) {
            return true;
        }
    } else {
        return false;
    }
}
