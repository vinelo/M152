<?php
require_once 'model/postModel.php';

if (isset($_POST['addPost'])) {
    $commentaire = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

    if (isset($_FILES['image']) && is_array($_FILES['image'])) {
        $image = $_FILES['image'];
    }

    if (empty($commentaire)) {
        $errors['commentaire'] = "Le champ \"commentaire\" est obligatoire";
    }
    if (empty($image)) {
        $errors['image'] = "Le champ \"image\" est obligatoire";
    }
    
    if(empty($errors))
    {

        addPost($commentaire, $image);

        header('location:?action=home');
            exit;
    }
    else
    {
        include "view/post.php";
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

