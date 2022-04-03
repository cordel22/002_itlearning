<!-- http://localhost/michal/?stranka=polia -->

<h1>Práca s poľami</h1>

Dnes je: <?= $dni[date('w')]; ?><br>
Počet prvkov v poli: <?= count($dni); ?><br>
Existuje index 4? <?php var_dump(array_key_exists(4, $dni)); ?>
Existuje index 44? <?php var_dump(array_key_exists(44, $dni)); ?>

<?php
    echo 'Sucet klucov je: ' . array_sum(array_keys($dni)) . '<br>';

    // Zober pole $dni. Kazdy prvok z tohto pola vloz do $den a urob blok kodu {....}.
    // Do premennej $kluc vloz index (kluc) prvu, ktory prave prechadzas
    foreach ($dni as $kluc => $den) {
        echo 'Den v tyzdni: ' . $den . ' (' . $kluc . ')<br>';        
    }

    /**
     * Den v tyzdni: nedela
     * Den v tyzdni: pondelok
     * Den v tyzdni: utorok 
     */
?>