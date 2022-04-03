<div class="container">
    <h1>Fotogaléria</h1>

    <form method="post" enctype="multipart/form-data" action="nahraj.php">
        <div class="mb-3 row">
            <label for="nazov" class="col-sm-2 col-form-label">Názov:</label>
            <div class="col-sm-10">
                <input type="text" name="nazov" class="form-control" id="nazov">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="subor" class="col-sm-2 col-form-label">Súbor:</label>
            <div class="col-sm-10">
                <input type="file" name="subor" class="form-control" id="subor">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-success btn-lg">Nahrať</button>
            </div>
        </div>
    </form>

</div>
<div class="container">
    <div class="row">
<?php
// budem citat subor __DIR__ . '/../subory/galeria.txt' riadok po riadku   (home.php)
// pre kazdy riadok urobim:
// 1. rozbijem riadok podla ;
// vypisem: 

// otvorim subor na citanie
$subor = fopen(__DIR__ . '/../subory/galeria.txt', 'r');
// citam, kym dosiahnem koniec suboru (kym sa dari nacitavat riadky)
while ($riadok = fgets($subor)) {
    // rozbijem riadok podla bodkociarky
    $o = explode(';', $riadok);
    // vypisem na obrazovku vystup. $o[0] je text, $o[1] je nazov suboru
    // echo '<h3>' . $o[0] . '</h3><img src="galeria/' . $o[1] . '">';
    ?>
<div class="col-md-3">
    <div class="card">
        <img src="galeria/<?= $o[1]; ?>" alt="" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?= $o[0]; ?></h5>
        </div>
    </div>
</div>
    <?php
}
// nezabudnem zavriet subor :-)
fclose($subor);
?>
    </div>
</div>