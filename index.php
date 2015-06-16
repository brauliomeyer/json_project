<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Temperature in Amsterdam</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        
        <!-- cdn MAXcdn JQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        <!-- Give size to body and add space around it -->
        <style>
            body {
                background-color: blanchedalmond;
                width: 80%;
                height: 80%;
                padding: 50px;
                margin: 50px auto 50px auto;
            }
            p {
                padding: 10px;
            }
            li {
                list-style: none;
            }
        </style>
    </head>
    <body>
        <?php
// haal het huidige weer in Amsterdam op in graden Celcius in het Nederlands
        $json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Amsterdam.NL&units=metric&lang=nl');

// parse de JSON
        $data = json_decode($json);

// laat de stad zien (en het land)
echo '<div class="list-group">';
        echo '<h1 class="list-group-item-heading">' . $data->name . ' (' . $data->sys->country . ')</h1>';

// de algemene informatie over het weer
        echo '<h2 class="list-group-item active">Temperatuur</h2>';
        echo '<p class="list-group-item"><strong>Huidig:</strong> ' . $data->main->temp . '&deg; C</p>';
        echo '<p class="list-group-item"><strong>Minimum:</strong> ' . $data->main->temp_min . '&deg; C</p>';
        echo '<p class="list-group-item"><strong>Maximum:</strong> ' . $data->main->temp_max . '&deg; C</p>';

// iets over de lucht
        echo '<h2 class="list-group-item active">Lucht</h2>';
        echo '<p class="list-group-item"><strong>Vochtigheid:</strong> ' . $data->main->humidity . '%</p>';
        echo '<p class="list-group-item"><strong>Druk:</strong> ' . $data->main->pressure . ' hPa</p>';

// en wat informatie over de wind
        echo '<h2 class="list-group-item active">Wind</h2>';
        echo '<p class="list-group-item"><strong>Snelheid:</strong> ' . $data->wind->speed . ' m/s</p>';
        echo '<p class="list-group-item"><strong>Richting:</strong> ' . $data->wind->deg . '&deg;</p>';

// en wat het weer is volgens de API (een array)
        echo '<h2 class="list-group-item active">Het weer</h2>';
        echo '<ul class="list-group-item">';
        foreach ($data->weather as $weather) {
            echo '<li>' . $weather->description . '</li>';
        }
        echo '<ul>';
echo '</div>';
        ?>
    </body>
</html>