<?php
ini_set('log_errors', 'On');
ini_set('display_errors', 'Off');
ini_set('error_reporting', E_ALL);
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

$lineNumber = $params['line'];

$json = file_get_contents("data/$lineNumber.json");
$jsonArray = json_decode($json, true);


function showAllArray($showArray)
{
    if ($showArray) {
        foreach ($showArray as $item => $value) {
            echo '<div class="containerForBusStop">';
            if (is_array($value)) {
                foreach ($value as $key => $dupa) {
                    echo '<div class="boxForItem">';
                    if (is_array($dupa)) {
                        foreach ($dupa as $singleItem) {
                            echo '<p class="lineTime">' . $singleItem . '</p>';
                        }
                    } else {
                        echo 'Przystanek: <br/>' . $dupa;
                    }
                    echo '</div>';
                }
            } else {
                echo $value;
            }
            echo '</div>';
        }
    } else {
        echo '<h2>Wystąpił błąd spróbuj jeszcze raz</h2>';
    }

}

?>

<div>
    <section class="containerForResults">
        <?php showAllArray($jsonArray); ?>
    </section>
    <section class="containerForLegend">
        <div class="legend">
            <div>N - Kursuje w niedziele i święta</div>
            <div>P - Obsługa osób niepełnosprawnych</div>
            <div>K - Klimatyzacja</div>
            <div>W - przystanek na żądanie</div>
        </div>
        <div>
            <a class="nav-link active btnReturn" data-name="schedules" href="/"> Wróć
            </a>
        </div>
    </section>
</div>