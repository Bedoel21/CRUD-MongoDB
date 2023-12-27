<?php
    require 'vendor/autoload.php';

    $client = new MongoDB\Client;

    $database = $client->CRUDmongo; // Ganti dengan nama basis data yang sesuai
    $collection = $database->createCollection('mahasiswa'); // Ganti dengan nama koleksi yang sesuai

    var_dump($collection);
?>
