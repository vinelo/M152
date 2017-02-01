<?php
/*
 * Projet : MyMovie
 * Script : modele dbconnection.php
 * Description : contient la fonctions et les données de connexion à la base de données
 * Auteur : Vincent Naef
 * Date : 22.12.2016
 */

/**
 * effectue la connexion a  la base de données 
 * @return PDO objet de connexion a  la base de données
 */
function connectDb()
{
    $server = '127.0.0.1';
    $pseudo = 'dbblogUser';
    $pwd = '';
    $dbname = 'dbblog';
    
    static $db = null;
    
    if ($db === null)
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $db = new PDO("mysql:host=$server;dbname=$dbname", $pseudo, $pwd, $pdo_options);
        $db->exec('SET CHARACTER SET utf8');
    }
    return $db;
    
}

