<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>

<body>
    <center>
        <h2 id="title"> </h2>
    </center>

    <canvas id="grafico" width="200" height="200"></canvas>

    <script>
        window.addEventListener("load", function(){
            <?php
            if(!isset($_GET['id'])){
                exit();
            }
            ?>
            var id = "<?php echo $_GET['id']; ?>";

            var formData = new FormData();
            formData.append('probeID', id);

            fetch("./api/v1/chart.php", {
                method: "POST",
                body: formData
            }).then(function (result) {
                if(result.ok){
                    return result.json();
                }
            }).then(function (data) {
                if(data != null){

                    createChart(data.s, data.h, data.l, data.t)
                    title.innerHTML = data.date;
                }
            });
        });

        function createChart(sData, hData, lData, tData){
            var label = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96]
            new Chart(document.getElementById("grafico"), {
                type: 'line',
                data: {
                    labels: label,
                    datasets: [{
                        data: sData,
                        label: "Salinidad",
                        borderColor: "#8e5ea2",
                        fill: false,
                        tension: 0.1
                    }, {
                        data: hData,
                        label: "Humedad",
                        borderColor: "#3e95cd",
                        fill: false,
                        tension: 0.1
                    }, {
                        data: tData,
                        label: "Temperatura",
                        borderColor: "#253016",
                        fill: false,
                        tension: 0.1
                    }
                    ]
                },
                options: {
                responsive: true,
                scales: {
                        y: {
                            stacked: true,
                            suggestedMin: 0,
                            suggestedMax: 1,
                        }},
            }
            });
        }

    </script>
</body>
</html>