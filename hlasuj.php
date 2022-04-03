<?php
// ak mam policko s name="odpoved", vznikne mi premenna
// $_GET['odpoved'] alebo $_POST['odpoved'] - podla hodnoty <form method="get"> <form method="post">
// pozor, ak formular este nebol odoslany, premenna $_GET['odpoved'] neexistuje
// premenna $_GET['xxxxx'] VZDY pride ako string
$anketa = file_get_contents(__DIR__ . '/subory/anketa.txt');
$anketaData = explode(';', $anketa);

$vysledok = 'chyba';
// ak tato podmienka plati, formular bol odoslany, resp. existuje premenna odpoved
if (isset($_POST['odpoved'])) {
    $odpoved = (int) $_POST['odpoved'];
    switch ($odpoved) {
        case 1:
        case 2:
        case 3:
            $anketaData[$odpoved - 1]++; // zvysim hodnotu vybranej odpovede o 1
            // zapisem do suboru:
            $zapis = implode(';', $anketaData); // spojim pole dokopy pomocou ;
            file_put_contents(__DIR__ . '/subory/anketa.txt', $zapis); // vlozim do suboru
            $vysledok = 'ok';
            break;
    }
}

header('Location: index.php?stranka=anketa&vysledok=' . $vysledok);