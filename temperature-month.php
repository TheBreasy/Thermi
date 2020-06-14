<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Thermi - temperatuur maand</title>
</head>

<body class="bg-top">
    <div class="px-3 pt-24 text-center">
        <img class="w-24 mx-auto" src="images/thermi-logo.svg" alt="thermi-logo">
        <h1 class="text-l font-bold uppercase spacing pt-3">Temperatuur</h1>
    </div>

    <nav class="z-20 px-3 grid grid-cols-4 gap-2 w-screen text-xxs text-center text-white fixed bottom-0 h-20 bg-black uppercase font-bold tracking-widest smpx-20">
        <a class="pt-10 bg-db no-hover-white selected" href="dashboard-week.php">Overzicht</a>
        <a class="pt-10 bg-ct no-hover-white not-selected" href="caretakers.html">Mantelzorgers</a>
        <a class="pt-10 bg-c no-hover-white not-selected" href="contact.html">Contact</a>
        <a class="pt-10 bg-l no-hover-white not-selected" href="login.html">Afmelden</a>
    </nav>

    <div class="mx-3 mt-3 bg-white shadow-md border-radius-1 max-w-full max-h-full sm:mx-20">
        <div class="grid grid-cols-2 text-center">
            <a class="detail-week bg-white shadow-md z-10" href="temperature-week.php">Week</a>
            <a class="detail-month bg-gray shadow-md z-10" href="temperature-month.php">Maand</a>
        </div>
        <div id="curve_chart" style="width: 100%;"></div>
    </div>

    <div class="text-center mt-3 mb-24">
        <a class="btn-return no-hover-white" href="dashboard-week.php">Terug naar overzicht</a>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Temperatuur'],
                ['Jan', 2],
                ['Feb', 5],
                ['Mrt', 8],
                ['Apr', 10],
                ['Mei', 13],
                ['Jun', 15],
                ['Jul', 20],
                ['Aug', 25],
                ['Sept', 18],
                ['Okt', 12],
                ['Nov', 7],
                ['Dec', 4]
            ]);

            var options = {
                title: 'Temperatuur in °C per maand',
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