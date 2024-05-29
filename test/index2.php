<?php
include "MySong.php";

// fonction voir tout le fichier
function showSong()
{
    $content = [];
    // On récupère le contenu du fichier en format chaine de caractère (string)
    $fileContent = file_get_contents("../assets/songs.json");
    // On transforme le contenu du fichier en json pour pouvoir le manipuler
    // facilement, en selectionnant la cle songs
    $json = json_decode($fileContent, true); //['songs']
    foreach ($json['songs'] as $value) {
        $content[] = new Song2($value);
    }
    return $content;
}

$x = "";

// fonction selecte en fonction du select
function selectSong($select)
{
    // On récupère le contenu du fichier en format chaine de caractère (string)
    $fileContent = file_get_contents("../assets/songs.json");
    // On transforme le contenu du fichier en json pour pouvoir le manipuler
    // facilement, en selectionnant la cle songs
    $json = json_decode($fileContent, true)['songs'];

    // On crééer un tableau vide
    $tableau = [];
    foreach ($json as $value) {
        $tableau[] = $value;
    }

    // on assigne x à select
    global $x;
    $x = $select;

    usort($tableau, "cmp");

    return $tableau;
}

// fonction comparaison pour le usort();
function cmp($a, $b)
{
    global $x;
    if ($a[$x] < $b[$x]) {
        return -1;
    } else if ($a[$x] > $b[$x]) {
        return 1;
    } else {
        return 0;
    }
}

// // On récupère le contenu du fichier en format chaine de caractère (string)
// $fileContent = file_get_contents("../assets/songs.json");
// // On transforme le contenu du fichier en json pour pouvoir le manipuler
// // facilement, en selectionnant la cle songs
// $json = json_decode($fileContent, true)['songs'];
// $tableau = [];
// foreach ($json as $value) {
//     $tableau[] = $value['year'];
// }
// var_dump($tableau);
// die();

?>

<!-- affichage -->
<a href="index2.php">
    <h1>MUSIQUE</h1>
</a>
<div>
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
    </form>
    <?php
    if (isset($_POST['select'])) {
        echo
            "<form action='' method='post'>
            <label for='search'>Rechercher</label>
            <select name='search_id' id=''>
                <option value='0'>decroissant</option>
                <option value='1'>croissant</option>
            </select>
            <input type='hidden' name='selected' value='" . $_POST['select'] . "'>
            <button type='submit' name='submit_search'>Rechercher</button>
        </form>";
        $select = $_POST['select'];
        foreach (selectSong($select) as $value) {
            echo "<p>" . new Song2($value) . "</p>";
        }
    }
    if (isset($_POST['submit_search'])) {
        // var_dump($_POST['selected']);
        // echo $_POST['search_id'];
        $select = $_POST['selected'];
        $search = $_POST['search_id'];
        $tableauTrie = selectSong($select);
        echo
            "<form action='' method='post'>
            <label for='search'>Rechercher</label>
            <select name='search_id' id=''>
                <option value='0'>decroissant</option>
                <option value='1'>croissant</option>
            </select>
            <input type='hidden' name='selected' value='" . $_POST['selected'] . "'>
            <button type='submit' name='submit_search'>Rechercher</button>
        </form>";

        if ($_POST['search_id'] == 0) {
            $tableauTrie = array_reverse($tableauTrie);
        }
        foreach ($tableauTrie as $value) {
            echo "<p>" . new Song2($value) . "</p>";
        }
    }
    ?>
</div>