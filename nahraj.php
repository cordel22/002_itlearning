<?php

$nazov = $_POST['nazov'] ?? null;
// $nazov = isset($_POST['nazov']) ? $_POST['nazov'] : null;
$subor = $_FILES['subor'] ?? null;

if (empty($nazov)) {
    $chyba[] = 'Nebol vyplnený názov.';
}

if (empty($subor['tmp_name'])) {
    $chyba[] = 'Nebol poslaný žiadny súbor.';
}

if (isset($chyba)) {
    header('Location: index.php?stranka=fotogaleria');
    exit; // v tomto mieste skript skoncime a nic, co je za tymto riadkom, sa nevykona
}

// spracuj subor (skopiruj ho z tmp_name do nejakeho adresara, kde sa bude trvalo nachadzat)
// Fotka Aničky s babičkou.JPG   -> fotka-anicky-s-babickou.jpg

// odstranim diakritiku:
$nazovSuboru = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $subor['name']);
// nahrad vsetky znaky, kt. nie su pismena, cislice, _, ., - za pomlcku (-)
$nazovSuboru = preg_replace('/[^a-zA-Z0-9_.-]/', '-', $nazovSuboru);
// prevediem na male pismena
$nazovSuboru = strtolower($nazovSuboru);

// zistim priponu a zistim nazov suboru bez pripony:
$pripona = substr($nazovSuboru, -4);
if ($pripona === 'jpeg') {
    $pripona = '.jpeg';
}

// if ($pripona !== '.jpg' && $pripona !== '.png' && $pripona !== '.jpeg') {}
if (!in_array($pripona, ['.jpg', '.png', '.jpeg'])) {
    header('Location: index.php?stranka=fotogaleria');
    exit;
}

$nazovSuboruBezPripony = substr($nazovSuboru, 0, strlen($nazovSuboru) - strlen($pripona));
$pridavok = '';
do {
    $newFile = __DIR__ . '/galeria/' . $nazovSuboruBezPripony . $pridavok . $pripona;
    $existuje = file_exists($newFile);
    if ($existuje) {
        $pridavok = (int) $pridavok + 1;
    }
} while ($existuje);


if (!move_uploaded_file($subor['tmp_name'], $newFile)) {
    // subor sa nepodarilo uploadnut, skoncim s chybou.
    header('Location: index.php?stranka=fotogaleria');
    exit;
}

// zapis do "databazy" novu fotku
file_put_contents(__DIR__ . '/subory/galeria.txt', $nazov . ';' . basename($newFile) . "\n", FILE_APPEND);

// presmeruj pouzivatela naspat na fotogaleriu
header('Location: index.php?stranka=fotogaleria');