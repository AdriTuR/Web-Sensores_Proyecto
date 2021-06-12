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

        <button onclick="changeChartData('s')">Salinidad</button>
        <button onclick="changeChartData('h')">Humedad</button>
        <button onclick="changeChartData('t')">Temperatura</button>

        <h1 id="dataTitle">Salinidad</h1>
        <p>Valor más alto: <span id="hValue">1</span></p>
        <p>Valor más bajo: <span id="lValue">1</span></p>

        <form>
            Fecha: <select id="selectDate"></select>
        </form>     

        <form>
            Comparar con... <select id="selectComparation">
            <option>El mes anterior</option>
            <option>Hace 2 semanas</option>
            <option>La semana pasada</option>
            </select>
        </form>  
    </center>

    <canvas id="grafico" width="200" height="200"></canvas>

    <script>
        let chart;
        let hData;
        let actualType;
        let probeID;
        
        function addDatesSelector(){
            var select = document.getElementById('selectDate');
            select.addEventListener('change', function(e) {

                fetch("./api/v1/chart.php?probeID=" + probeID + "&date=" + e.target.value, {
                }).then(function (result) {
                    if(result.ok) return result.json();
                }).then(function (data) {
                    if(data != null){
                        hData = data;
                        changeChartData(actualType);
                    }
                });  
            }, false);

            var dates = hData.allDates;

            for (let i = dates.length-1; i >=0 ; i--) {
                const element = dates[i];
                var opt = document.createElement('option');
                opt.value = element;
                opt.innerHTML = element;
                select.appendChild(opt);
            }

            select.value = hData.date;

        }

        window.addEventListener("load", function(){
            <?php
            if(!isset($_GET['id'])){
                exit();
            }
            ?>
            probeID = "<?php echo $_GET['id']; ?>";

            fetch("./api/v1/chart.php?probeID=" + probeID, {
            }).then(function (result) {
                if(result.ok){
                    return result.json();
                }
            }).then(function (data) {
                if(data != null){
                    hData = data;
                    createChart(JSON.parse(data.s), JSON.parse(data.h), JSON.parse(data.t))
                    title.innerHTML = data.date;
                    actualType = "s";
                    addDatesSelector();
                }
            });
        });

        function changeChartData(type){
            //if(actualType === type) return;

            if(type === "s"){
                chart.data.datasets[0].data = calcAverage(JSON.parse(hData.s));
                chart.data.datasets[0].label = "Media de Salinidad";
                chart.data.datasets[0].borderColor = "#bc9b75";
                actualType = "s";
                dataTitle.innerHTML = "Salinidad";

            }else if(type === "h"){
                chart.data.datasets[0].data = calcAverage(JSON.parse(hData.h));
                chart.data.datasets[0].label = "Media de Humedad";
                chart.data.datasets[0].borderColor = "#12b8f1";
                actualType = "h";
                dataTitle.innerHTML = "Humedad";

            }else if(type === "t"){
                chart.data.datasets[0].data = calcAverage(JSON.parse(hData.t));
                chart.data.datasets[0].label = "Media de Temperatura";
                chart.options.scales.y.suggestedMin = -10;
                chart.options.scales.y.suggestedMax = 50;
                chart.data.datasets[0].borderColor = "#fc3216";
                actualType = "t";
                dataTitle.innerHTML = "Temperatura";

            }

            if(type != "t"){
                chart.options.scales.y.suggestedMin = 0;
                chart.options.scales.y.suggestedMax = 100;
            }
            chart.update();
        }

        function createChart(sData, hData, tData){
            chart = new Chart(document.getElementById("grafico"), {
                type: 'line',
                data: {
                    labels: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"],
                    datasets: [
                        {
                            data: calcAverage(sData),
                            label: "Media de Salinidad",
                            borderColor: "#bc9b75",
                            fill: false,
                            tension: 0.1,
                            pointRadius: 5,
                            pointHoverRadius: 7
                        }
                    ]
                },
                options: {
                    layout: {
                        padding: {
                            left: 50,
                            right: 50,
                            top: 0,
                            bottom: 0
                        }
                    },
                    plugins: {
                        legend: false,
                    },
                    maintainAspectRatio: true,
                    responsive: true,
                    scales: {
                            y: {
                                stacked: true,
                                suggestedMin: 0,
                                suggestedMax: 100,
                            }
                        },
                }
            });

        }

        function calcAverage(data){
            var newData = []
            var averageNum = 0;
            
            for (let i = 0; i < data.length; i++) {
                const measure = data[i];
                
                averageNum += measure;
                if(((i+1) % 4) == 0){
                    newData.push(averageNum/4);
                    averageNum = 0;
                }  
                
            }

            var maxV = Math.max.apply(null, data);
            var minV = Math.min.apply(null, data);

            var maxVH = data.indexOf(maxV)/4;
            var minVH = data.indexOf(minV)/4;

            hValue.innerHTML = maxV + " (" + Math.trunc(maxVH) + ":" + calcMinute(maxVH) + ")";
            lValue.innerHTML = minV + " (" + Math.trunc(minVH) + ":" + calcMinute(minVH) + ")";

            return newData;
        }

        function calcMinute(min){
            min = (min + "").split(".");
            var dec = min[1];

            if(dec != null){
                switch(dec){
                    case '25':
                        return 15;
                    case '50':
                        return 30;
                    case '75':
                        return 45;
                }
            }

            return "00";
            
        }

    </script>
</body>
</html>