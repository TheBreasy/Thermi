<?php
include_once 'dbh.inc.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Thermi - dashboard week</title>
</head>

<body class="bg-top">
    <div class="px-3 pt-24 text-center">
        <img class="w-24 mx-auto" src="images/thermi-logo.svg" alt="thermi-logo">
        <h1 class="text-l font-bold uppercase spacing pt-3">Overzicht</h1>
    </div>

    <nav class="z-20 px-3 grid grid-cols-4 gap-2 w-screen text-xxs text-center text-white fixed bottom-0 h-20 bg-black uppercase font-bold tracking-widest smpx-20">
        <a class="pt-10 bg-db no-hover-white selected" href="dashboard-week.php">Overzicht</a>
        <a class="pt-10 bg-ct no-hover-white not-selected" href="caretakers.html">Mantelzorgers</a>
        <a class="pt-10 bg-c no-hover-white not-selected" href="contact.html">Contact</a>
        <a class="pt-10 bg-l no-hover-white not-selected" href="login.html">Afmelden</a>
    </nav>

    <div class="p-3 grid grid-cols-2 gap-4 text-center uppercase font-bold smpx-20 sm:gap-8 sm:pb-8">
        <a class="h-40 p-2 shadow-md border-radius-1 bg-white no-hover-black" href="temperature-week.php">
            <div class="space-y-3">
                <img class="w-10 mx-auto" src="images/temperature.svg" alt="temperature">
                <h2 class="text-xs spacing">Temperatuur</h2>
                <p class="text-2xl">

                    <?php

                    $sql = "SELECT * FROM dht11 ORDER BY ID DESC LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<p>";
                            echo $row['temperature'];
                            echo "<sup>°C</sup></p>";
                        }
                    } else {
                        echo "there are no data";
                    }

                    ?>





                </p>
                <p class="details">Details</p>
            </div>
        </a>

        <a class="h-40 p-2 shadow-md border-radius-1 bg-white no-hover-black" href="humidity-week.php">
            <div class="space-y-3">
                <img class="w-10 mx-auto" src="images/humidity.svg" alt="humidity">
                <h2 class="text-xs spacing">Vochtigheid</h2>
                <p class="text-2xl">
                    <?php

                    $sql = "SELECT * FROM dht11 ORDER BY ID DESC LIMIT 1";

                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<p>";
                            echo $row['humidity'];
                            echo " <sup>%</sup></p>";
                        }
                    } else {
                        echo "there are no data";
                    }

                    ?>



                </p>
                <p class="details">Details</p>
            </div>
        </a>
    </div>

    <div class="pb-3 px-3 grid grid-cols-2 gap-4 text-center uppercase font-bold smpx-20 sm:gap-8 sm:pb-8">
        <div class="h-40 p-2 shadow-md border-radius-1 bg-white no-hover-black">
            <div class="space-y-3">
                <img class="w-10 mx-auto" src="images/consumption.svg" alt="consumption">
                <h2 class="text-xs spacing">Verbruikt vandaag</h2>
                <p class="text-2xl">23<sup class="normal-case">kWh</sup></p>
            </div>
        </div>

        <div class="h-40 p-2 shadow-md border-radius-1 bg-white no-hover-black">
            <div class="space-y-3">
                <img class="w-10 mx-auto" src="images/saving.svg" alt="saving">
                <h2 class="text-xs spacing">Bespaart t.o.v. vorige maand</h2>
                <p class="text-2xl">12<sup class="normal-case">kWh</sup></p>
            </div>
        </div>
    </div>

    <div class="mx-3 mb-24 bg-white shadow-md border-radius-1 max-w-full max-h-full sm:mx-20 sm:mb-32">
        <div class="grid grid-cols-4 text-center">
            <div></div>
            <div></div>
            <a class="dashboard-week bg-gray shadow-md z-10" href="dashboard-week.php">Week</a>
            <a class="dashboard-month bg-white shadow-md z-10" href="dashboard-month.php">Maand</a>
        </div>
        <div id="curve_chart" style="width: 97%;"></div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'kWh'],
                ['Ma', 20],
                ['Di', 30],
                ['Wo', 28],
                ['Do', 33],
                ['Vr', 22],
                ['Za', 31],
                ['Zo', 37]
            ]);

            var options = {
                title: 'Verbruik per dag (in kWh)',
                curveType: 'function',
                legend: {
                    position: 'top',
                },
                colors: ['#00F53F']
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
</body>

</html>