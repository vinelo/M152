<?php
include 'databaseConnection.php';
function addPost($commentaire,$tmpImage)
{
    $imageServer = uniqid();
    $database = connectDb();
    $query = $database->prepare("INSERT INTO `dbblog`.`post` ( commentaire, typeMedia, nomMedia, datePost ) VALUES ()");
    if ($query->execute(
                    array(
                        'nameMovie' => $nameMovie,
                        'descriptionMovie' => $descriptionMovie,
                        'releaseDate' => $releaseDate,
                        'image' => $image,
                        'imageServer' => $imageServer,
                        'trailer' => $trailer,
                        'trailerServer' => $trailerServer,
                        'director' => $director,
                        'idCategory' => $idCategory
                    )
            )) {
        if (move_uploaded_file($tmpNameImage, "images/" . $imageServer)) {
            if (move_uploaded_file($tmpNameTrailer, "trailers/" . $trailerServer)) {
            return true;
        } else {
            return false;
        }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

