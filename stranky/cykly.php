<h1>Cykly (loops)</h1>
<h1>Cyklus for</h1>
<?php
// vypisat cisla od 1 do 10
    for ($cislo = 1; $cislo <= 10; $cislo++) {
        echo 'Cislo je ' . $cislo . '<br>';
    }

    echo 'Cyklus skoncil, cislo je teraz ' . $cislo . '<br>';
?>
<h1>Cyklus while</h1>
<?php
// cyklus bezi, kym plati podmienka, kt. je zadana v hlavicke cyklu:
    while ($cislo <= 20) {
        echo 'While: Cislo je ' . $cislo . '<br>';
        $cislo++;
    }
?>
<h1>Cyklus do..while</h1>
<?php
// to iste, co while, ale s tym rozdielom, ze podmienka sa overuje az po
// vykonani bloku prikazov:
    do {
        echo 'DoWhile: Cislo je ' . $cislo . '<br>';
        $cislo++;
    } while ($cislo <= 10);
?>