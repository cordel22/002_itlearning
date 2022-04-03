<form action="hlasuj.php" method="post">
    <!-- <input type="hidden" name="stranka" value="anketa"> -->
    Vyberte odpoveď:<br>
    <label><input type="radio" name="odpoved" value="1" checked> áno</label><br>
    <label><input type="radio" name="odpoved" value="2"> nie</label><br>
    <label><input type="radio" name="odpoved" value="3"> neviem</label><br>
    <button type="submit" class="btn btn-primary">
        Odoslať
    </button>
    <?php
        if (isset($_GET['vysledok'])) {
            switch ($_GET['vysledok']) {
                case 'ok':
                    $text = 'Ďakujeme za Váš hlas.';
                    $style = 'success';
                    break;
                case 'chyba':
                    $text = 'Neplatný hlas.';
                    $style = 'danger';
                    break;
            }
            if (isset($text)) {
                echo '<div class="alert alert-' . $style . '">' . $text . '</div>';
            }
        }
    ?>
</form>
<?php
// ak mam policko s name="odpoved", vznikne mi premenna
// $_GET['odpoved']
// pozor, ak formular este nebol odoslany, premenna $_GET['odpoved'] neexistuje
// premenna $_GET['xxxxx'] VZDY pride ako string

$anketa = file_get_contents(__DIR__ . '/../subory/anketa.txt');
$anketaData = explode(';', $anketa);

$odpovede = ['áno', 'nie', 'neviem'];

for ($i = 0; $i < count($anketaData); $i++) {
    echo $odpovede[$i] . ': ' . $anketaData[$i] . '<br>';
}



/*
//////// prva moznost zapisu - dlhe, neprehladne, skarede.
if ($odpoved === 1) {
    // zaznamenam 1
} else {
    if ($odpoved === 2) {
        // zaznamenam 2
    } else {
        if ($odpoved === 3) {
            // zaznamenam 3
        } else {
            // nie je to ani jedna z odpovedi, vypisem chybu
        }
    }
}

/////// druha moznost: krajsie, ale dlhe, zbytocne vela podmienok s rovnostou
if ($odpoved === 1) { // ak je 1
    // zaznamenam 1
} elseif ($odpoved === 2) { // ak nie je 1, ale je 2
        // zaznamenam 2
} elseif ($odpoved === 3) { // ak nie je 1, ani 2, ale je 3
        // zaznamenam 3
} else { // ak nie je ani 1, ani 2, ani 3
    // nie je to ani jedna z odpovedi, vypisem chybu
}
*/
/*
// tretia moznost: kratke, ziadna podmienka, prehladnejsie
// pozor, porovnavanie hodnot je cez ==, nie cez ===!!!!
// (napr. 0 == false, null == 0, null == false, ...)
// https://www.php.net/manual/en/types.comparisons.php#types.comparisions-loose
switch ($hodnota) {
    case 1: // ak $odpoved == 1
        # code...
        break;
    case 2: // ak $odpoved == 2
        break;
    case 3: // ak $odpoved == 3
        break;
    case 4:
        // kod, kt. sa vykona ak je to 4
    case 5:
        // kod, kt. sa vykona ak je to 4 alebo 5
    case 6: 
        // kod, kt. sa vykona ak je to 4, 5, alebo 6
        break;
    default: // ak ani jedno
        # code...
        break;
}
*/