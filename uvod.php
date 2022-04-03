<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // www.php.net/<NAZOV FUNKCIE>
    // Apostrof na SK klavesnici: AltGr + P ', lavy Alt + 39
    // toto je poznamka
    /*
     Viacriadkova 
     poznamka
     */
    //TODO: toto musim este na tomto mieste urobit
    echo 'Hello world<br>'; /* skratene: <?= 'Hello world<br>'; ?> */
    echo "Dnes je pondelok.";
    ?>
    <?= 'Hello world.'; ?>
    <br>
    Dnes je <?php echo date('d.m.Y'); ?>.<br>
    Dnes je <?= date('d.m.Y'); ?>.
    <br>
    <h2>Rozdiel medzi uvodzovkami a apostrofmi</h2>
<?php
    // $ na SK klavesnici: AltGr+ô alebo lavy Alt + 36
    $meno = "Michal";
    echo "Volam sa $meno.<br>"; // uvodzovky: obsah sa vyhodnocuje (Volam sa Michal.)
    echo 'Volam sa $meno.<br>'; // apostrofy: obsah sa iba vypise bez vyhodnotenia (Volam sa $meno.)
    $meno = "Jozef";
    echo 'Volam sa ' . $meno . '.<br>'; // Vypise: Volam sa Jozef.

    echo "Dnes je date('d.m.Y')<br>"; // Vypise: Dnes je date('d.m.Y')
    echo "Dnes je " . date('d.m.Y') . "<br>"; // Vypise: Dnes je 11.10.2021
    echo 'Dnes je ' . date('d.m.Y') . '<br>'; // Vypise: Dnes je 11.10.2021

    var_dump($meno);
    $cislo = 5;
    var_dump($cislo);
    $cislo = 4.7;
    var_dump($cislo);
    $vysledok = false;
    var_dump($vysledok);
    $hodnota = null;
    var_dump($hodnota);
    $hodnota = 0;
    var_dump($hodnota);
    $hodnota = "";
    var_dump($hodnota);
    $zelenina = ['zemiak', 'mrkva', 'cibula', 85, false, 25.86, null];
    var_dump($zelenina);
    var_dump(10 / 3);
    $datum = new DateTime();
    var_dump($datum);
    var_dump($datum->date);
    var_dump($datum->format('d.m.Y'));

    echo date('d.m.Y') . '<br>';
    echo date(45) . '<br>';
    echo date(true) . '<br>';

    $cislo = "12.56";
    var_dump($cislo);
    var_dump((int) $cislo);
    var_dump((float) $cislo);
    var_dump((bool) $cislo);
    var_dump((array) $cislo);

    $a = 10;
    $b = 3;

    echo "$a + $b = " . ($a + $b) . "<br>";
    echo "$a - $b = " . ($a - $b) . "<br>";
    echo "$a * $b = " . ($a * $b) . "<br>";
    echo "$a / $b = " . ($a / $b) . "<br>";
    echo "$a % $b = " . ($a % $b) . "<br>";

    echo "A je teraz $a<br>";
    $a = $a + 1;
    echo "A je $a<br>";
    $a += 1; // Do premennej $a nastavim hodnotu, kt. je o 1 vyssia ako je jej sucasna hodnota.
    echo "A je $a<br>"; // A je 12
    echo 'A je  ' . ++$a . '<br>'; // zvys hodnotu $a o 1 a az potom premennu pouzi
    echo 'A je  ' . $a++ . '<br>'; // najprv pouzi hodnotu, potom zvys hodnotu $a o 1
    echo 'A je teraz ' . $a . '<br>';
    // $a++: $a = $a + 1
    // $a--: $a = $a - 1
    // $a = $a**2; ====> $a = $a * $a; (druha mocnina)
    echo 1 + 2 * 3;
?>
<h2>Podmienky</h2>
<?php

if (4 < 5) {
    echo '4 je mensie ako 5<br>';
}

$a = 7;
$b = 7;
if ($a < $b) {
    echo $a . ' je mensie ako ' . $b . '<br>';
} else {
    echo $a . ' je vacsie ako alebo rovne ' . $b . '<br>';
}

// <    : mensi ako
// >    : vacsi ako
// <=   : mensi alebo rovny
// >=   : vacsi alebo rovny
// ==   : rovny
// ===  : zhodny
// !=   : nerovny
// !==  : nezhodny

$a = 5;
$b = "5";

// {} na slovenskej klavesnici: AltGr + B, AltGr + N
// [] na slovenskej klavesnici: AltGr + F, AltGr + G

if ($a == $b) {
    echo "A sa rovna B.";
    echo "Urobim nieco druhe, ak sa hodnoty rovnaju";
}

if ($a === $b) {
    echo "A je zhodne s B.";
}

?>
</body>
</html>