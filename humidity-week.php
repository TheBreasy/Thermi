<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Thermi - luchtvochtigheid week</title>
</head>

<body class="bg-top">
    <div class="px-3 pt-24 text-center">
        <img class="w-24 mx-auto" src="images/thermi-logo.svg" alt="thermi-logo">
        <h1 class="text-l font-bold uppercase spacing pt-3">Luchtvochtigheid</h1>
    </div>

    <nav class="z-20 px-3 grid grid-cols-4 gap-2 w-screen text-xxs text-center text-white fixed bottom-0 h-20 bg-black uppercase font-bold tracking-widest smpx-20">
        <a class="pt-10 bg-db no-hover-white selected" href="dashboard-week.php">Overzicht</a>
        <a class="pt-10 bg-ct no-hover-white not-selected" href="caretakers.html">Mantelzorgers</a>
        <a class="pt-10 bg-c no-hover-white not-selected" href="contact.html">Contact</a>
        <a class="pt-10 bg-l no-hover-white not-selected" href="login.html">Afmelden</a>
    </nav>

    <div class="mx-3 mt-3 bg-white shadow-md border-radius-1 max-w-full max-h-full sm:mx-20">
        <div class="grid grid-cols-2 text-center">
            <a class="detail-week bg-gray shadow-md z-10" href="humidity-week.php">Week</a>
            <a class="detail-month bg-white shadow-md z-10" href="humidity-month.php">Maand</a>
        </div>
        <div id="columnchart_values"></div>
    </div>

    <div class="text-center mt-3 mb-24">
        <a class="btn-return no-hover-white" href="dashboard-week.php">Terug naar overzicht</a>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Luchtvochtigheid", {
                    role: "style"
                }],
                ["Ma", 44, "#00F53F"],
                ["Di", 50, "#00F53F"],
                ["Woe", 53, "#00F53F"],
                ["Do", 48, "#00F53F"],
                ["Vr", 45, "#00F53F"],
                ["Za", 52, "#00F53F"],
                ["Zo", 53, "color: #00F53F"]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "Luchtvochtigheid in % per dag",
                bar: {
                    groupWidth: "70%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>
</body>

</html>