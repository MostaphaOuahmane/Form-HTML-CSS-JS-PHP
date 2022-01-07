<?php
$hostname = "localhost";
$database_name = "inscription";
$bd_user = "dbinscription";
$bd_motPasse = "";
$date_base = "mysql:host=$hostname;dbname=$database_name";

$chercher_faute = array(
    // pour affichier les ERROR dans la fichier php 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);
