<?php

/* Descrizione:
- Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
- Stampare tutti i nostri hotel con tutti i dati disponibili.

Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio. */

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// var_dump($hotels);

function filterFunction($item)
{
    return $item['parking'] == true;
};

if ($_GET['parking']) {
    echo 'yes';
    $hotels = array_filter($hotels, 'filterFunction');
};
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php-hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container pt-4">
        <form action="" method="get">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="parking" />
                <label class="form-check-label" for="">Parking</label>
                <button type="submit">Filter</button>
            </div>
        </form>

        <h1>Hotels</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Hotel</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) {
                    echo "<tr><td>{$hotel['name']}</td>";
                    echo "<td>{$hotel['description']}</td>";
                    if ($hotel['parking'] === true) {
                        echo "<td>Yes</td>";
                    } else {
                        echo "<td></td>";
                    };
                    echo "<td>{$hotel['vote']} / 5</td>";
                    echo "<td>{$hotel['distance_to_center']} Km</td>
                </tr>";
                };
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>