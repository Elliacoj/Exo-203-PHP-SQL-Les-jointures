<?php
require_once "./Classes/DB.php";

$db = DB::getInstance();

$search = $db->prepare("
                        SELECT el.nom, el.prenom, eli.rue, eli.cp, eli.ville, eli.pays 
                        FROM eleve AS el 
                            INNER JOIN eleve_information AS eli ON el.information_id = eli.id
                            ");

$state = $search->execute();

if($state) {
    foreach ($search->fetchAll() as $item) {
        echo "<pre>";
        print_r($item);
        echo "</pre>";
    }
}