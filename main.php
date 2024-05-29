<?php

include "Song.php";

// Récupération du fichier
$file_content = file_get_contents("assets/songs.json");

// Transformation du contenu en json lisable par le php (array)
$file_json = json_decode($file_content, true);

$keyForSorting = "";
$content = [];

/**
 * @param $songs
 * @return void
 */
function showSong($songs)
{
    global $content;

    foreach ($content as $element) {
        echo new Song($element) . "<br>";
    }

    $song = new Song($songs);
    $song->getRank();
}

function cmp($a, $b)
{
    global $keyForSorting;
    if ($a[$keyForSorting] < $b[$keyForSorting]) {
        return -1;
    } else if ($a[$keyForSorting] > $b[$keyForSorting]) {
        return 1;
    } else {
        return 0;
    }
}

function triage($key)
{
    $fileContent = file_get_contents("assets/songs.json");
    $json = json_decode($fileContent, true);
    global $content;
    $content = $json['songs'];
    global $keyForSorting;
    $keyForSorting = $key;
    usort($content, "cmp");

    showSong($content);
}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <form action="" method="post">
        <label for="select">Rechercher</label>
        <select name="select" id="select">
            <option value="title">Titre</option>
            <option value="artist">Artiste</option>
            <option value="album">Album</option>
            <option value="year">Années</option>
            <option value="rank">Rang</option>
        </select>
        <button type="submit">Rechercher</button>
        <?php
        echo "<br><br><br>";
        showSong(null);
        ?>
    </form>
    </body>
    </html>


<?php

if (isset($_POST['select'])) {
    triage($_POST['select']);
}
