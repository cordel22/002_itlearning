<?php

function vek(string $datumNarodenia): int
{
    // 1. zo zadaneho datumu vyparsuj objekt typu DateTime
    $datumNar = DateTime::createFromFormat('j.n.Y', $datumNarodenia);
    // ak sa nepodarilo zo zadaneho datumu vytvorit objekt DateTime (lebo bol v zlom formate)
    if ($datumNar === false) {
        return 0; // vrat, ze ma 0 rokov.
    }
    // 2. vypocitaj rozdiel dvoch datumov (toho z kroku 1 a dnesneho datumu) v rokoch
    $rozdiel = $datumNar->diff(new DateTime());
    // 3. vrat pocet rokov ako int
    return (int) $rozdiel->format('%y');
}

$carousel = [
    [
        'obrazok' => 'obrazky/01.jpg',
        'nadpis' => 'Where will your next vacation be..?',
        'podnadpis' => 'Explore the world with our travel agency!',
        'text_tlacitka' => 'Click here',
        'link' => 'https://www.blackpanthers.sk',
    ]
];
?>
<!-- fotografie na vrchu stranky zaciatok -->
<div class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel" id="galeria1">
    <div class="carousel-indicators">
        <button type="button" class="active" data-bs-slide-to="0" data-bs-target="#galeria1"></button>
        <button type="button" data-bs-slide-to="1" data-bs-target="#galeria1"></button>
        <button type="button" data-bs-slide-to="2" data-bs-target="#galeria1"></button>
    </div>
    <div class="carousel-inner">
        <?php
        $active = true;
        foreach ($carousel as $c) { ?>
            <div class="carousel-item<?php if ($active) {
                                            echo ' active';
                                            $active = false;
                                        } ?>">
                <a href="<?= $c['link']; ?>" target="_blank">
                    <img src="<?= $c['obrazok']; ?>" alt="" class="d-block w-100">
                </a>
                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255, 255, 255, 0.7);">
                    <h5><?= $c['nadpis']; ?></h5>
                    <p><?= $c['podnadpis']; ?></p>
                    <div class="text-center">
                        <a href="<?= $c['link']; ?>" target="_blank" class="btn btn-primary"><?= $c['text_tlacitka']; ?></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-slide="prev" data-bs-target="#galeria1">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-slide="next" data-bs-target="#galeria1">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<!-- fotografie na vrchu stranky koniec -->

<!-- hlavna cast stranky zaciatok -->
<div class="container">
    <h1 class="display-6">Welcome to this website</h1>
    <div class="row align-items-end mb-4">

        <div class="col-md-3">
            <div class="card">
                <img src="./obrazky/botany.jpg" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Botany Bay</h5>
                    <p class="card-text">
                        Dreamy beaches, silky warm seas, lush scenery, and endless sunshine – these are some of the top ingredients of the ideal tropical vacation. But each destination offers its own sultry charms. Some dazzle with their natural beauty. Others add cultural attractions to the mix, with exotic customs, architecture, and mouthwatering cuisine.


                    </p>
                    <a href="#" class="btn btn-primary"><i class="bi bi-zoom-in"></i> Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="./obrazky/cristobal.jpg" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">San Cristobal</h5>
                    <p class="card-text">
                        It is the quintessential South Pacific paradise. This lush and dramatically beautiful island in French Polynesia rises to a sharp emerald peak ringed by an azure lagoon. Clusters of coconut palms bristle along the beaches, and luxury bungalows perch over the crystal-clear waters, some with glass floor panels, so you can peer into the thriving sea below.


                    </p>
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="./obrazky/fr_gu.jpg" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">French Guiana</h5>
                    <p class="card-text">
                        A constant stream of visiting movie stars and mega-moguls means that accommodation and food costs more here than other destinations – especially during high season. However, in return, you'll find beautiful blond beaches backed by green hills, world-class shopping and dining, and a cultural sophistication.


                    </p>
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="./obrazky/magadan.jpg" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Magadan</h5>
                    <p class="card-text">
                        Magadan is beautiful all year, but it becomes a winter wonderland as the colder months approach. A mix of signposted winter hiking trails, 72 marked snowshoe trails, and a cross-country ski trail network that extends for over 300 kilometers makes this a dreamy destination.
                        In winter, as thick layers of snow cover the roads and regular road traffic is banned, guided snowmobile tours are the only way to travel through the park.
                    </p>
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>

    </div>


    <!-- hra kocky zaciatok -->
    <div class="text-center">
        <a href="?stranka=home&hod=ano" class="btn btn-primary btn-lg">Roll the dice</a><br>
        <?php
        if (isset($_GET['hod']) && $_GET['hod'] == 'ano') {
            for ($i = 0; $i < 6; $i++) {
                $kocka = rand(1, 6);
                echo '<i class="bi bi-dice-' . $kocka . ' display-5"></i> ';
            }
        }
        ?>
    </div>
    <!-- hra kocky koniec -->
</div>
<!-- hlavna cast stranky koniec -->