<?php
/*
        if (!isset($_GET['stranka'])) {
            $stranka = 'home';
        } else {
            $stranka = $_GET['stranka'];
        }

        if (isset($_GET['stranka'])) {
            $stranka = $_GET['stranka'];
        } else {
            $stranka = 'home';
        }

        $stranka = isset($_GET['stranka']) ? $_GET['stranka'] : 'home';

        // ?? je coalesce operator (Coalesce je "funkcia", ktora vrati prvy non-null parameter)
*/
$stranka = $_GET['stranka'] ?? 'home';

//         0         1           2         3          4         5          6
$dni = ['nedeľa', 'pondelok', 'utorok', 'streda', 'štvrtok', 'piatok', 'sobota'];
// pole sa da vytvorit bud:
// $premenna = [1, 2, 3, 4, 5];
// alebo:
// $premenna = array(1, 2, 3, 4, 5);
// echo $dni[3]; // -> streda

$menu = [
    [
        'link' => 'home',
        'text' => 'Home',
    ],
    [
        'link' => 'fotogaleria',
        'text' => 'Photogalery',
    ],
    /* [
            'link' => 'polia',
            'text' => 'Polia',
        ],
        [
            'link' => 'cykly',
            'text' => 'Cykly',
        ],
        [
            'link' => 'anketa',
            'text' => 'Anketa',
        ], */
];

$title = 'Stranka';
foreach ($menu as $m) {
    if ($m['link'] === $stranka) {
        $title = $m['text'];
    }
}

$pocitadloSubor = __DIR__ . '/subory/pocitadlo.txt';
/*
    if (file_exists($pocitadloSubor)) {
        $pocitadlo = file_get_contents($pocitadloSubor);
    } else {
        $pocitadlo = 0;
    }
    */
$pocitadlo = file_exists($pocitadloSubor) ? file_get_contents($pocitadloSubor) : 0;

file_put_contents($pocitadloSubor, ++$pocitadlo);

?>
<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- CSS styly pre framework bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- ikonky -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body style="padding-top: 56px;">

    <!-- horne menu zaciatok -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">
                <i class="bi bi-cloud-sun"></i> Menu (<?= $pocitadlo; ?>)
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#hlavne-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="hlavne-menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach ($menu as $m) { ?>
                        <li class="nav-item">
                            <a href="?stranka=<?= $m['link']; ?>" class="nav-link<?php if ($stranka === $m['link']) echo ' active'; ?>">
                                <?= $m['text']; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- horne menu koniec -->

    <!-- zaciatok obsahu stranky -->
    <div id="obsah">
        <?php
        include __DIR__ . '/stranky/' . $stranka . '.php'; // __DIR__ = dva podciarkovniky, DIR, dva podciarkovniky
        ?>
    </div>
    <!-- koniec obsahu stranky -->

    <!-- JavaScript pre fungovanie frameworku Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>