<?php

// Récupération du fichier
$file_content = file_get_contents("assets/songs.json");

// Transformation du contenu en json lisable par le php (array)
$file_json = json_decode($file_content, true);

// Affichage de tous les éléments dans la partie "songs" du json
echo json_encode($file_json["songs"], JSON_PRETTY_PRINT);