<!DOCTYPE html>
<html lang="es">
<!-------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------HEADER DE LA PÁGINA---------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!------------------------GRÁFICAS---------------------------->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!------------------------FUENTES---------------------------->
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <!-------------------------CSS------------------------------->
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/userPanel-style.css">

    <title>Document</title>
</head>

<!-------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------- BODY DE LA PÁGINA ---------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<body>
<!-------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------GRÁFICA---------------------------------------------------------->
<div class="contenido_grafica">
    <center>
        <!----------------------------------------------------------------------->
        <!--------------------------BOTON CERRAR GRÁFICA------------------------->
        <button class="boton_cerrar_grafica" onclick="parent.cerrarIframe()">
            <img src="./images/landing_page/close_icon3png.png" class="boton_cerrar_grafica">
        </button>
        <!----------------------------------------------------------------------->
        <!-------------------BOTONES DE FILTRAR PARÁMETROS----------------------->
        <div class="header_grafica">

            <div class="botones_filtrar_parametros">
                <button class="boton_filtrar_salinidad" onclick="changeChartData('s')">Salinidad</button>
                <button class="boton_filtrar_humedad" onclick="changeChartData('h')">Humedad</button>
                <button class="boton_filtrar_temperatura" onclick="changeChartData('t')">Temperatura</button>
            </div>
            <!----------------------------------------------------------------------->
            <!--------------------------TITULO - GRÁFICA----------------------------->

            <h1 id="dataTitle">Salinidad</h1>
            <h2 id="title"></h2>

            <!----------------------------------------------------------------------->
            <!------------------------INDICADORES MAX-MIN---------------------------->
            <div class="indicadores_min-max">
                <div class="indicador_max">
                    <p id="max_value">MAX</p>
                    <p id="hValue">1</p>
                    <p id="hHourValue"></p>
                </div>
                <div class="indicador_min">
                    <p id="min_value">MIN</p>
                    <p id="lValue">1</p>
                    <p id="lHourValue"></p>
                </div>
            </div>
            <!----------------------------------------------------------------------->
            <!--------------------BOTONES DE FILTRAR FECHA--------------------------->
            <div class="botones_filtrar_fecha">
                <form class="filtrar_por_fecha">
                    Fecha: <select id="selectDate"></select>
                </form>

                <form class="comparar_por_fechas">
                    Comparar: <select id="selectComparation">
                        <option>El mes anterior</option>
                        <option>Hace 2 semanas</option>
                        <option>La semana pasada</option>
                    </select>
                </form>
            </div>

        </div>
    </center>
    <!----------------------------------------------------------------------->
    <!------------------------------GRÁFIC0---------------------------------->

    <div class="grafico_box">
        <canvas id="grafico" width="200" height="95"></canvas>
    </div>

</div>
<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->

<!-------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------- SCRIPTS ------------------------------------------------------>
<!-------------------------------------------------------------------------------------------------------------------->

<script>
    let chart;
    let hData;
    let actualType;
    let probeID;

    function addDatesSelector(){
        var select = document.getElementById('selectDate');
        select.addEventListener('change', function(e) {
            fetch("./api/v1/probesData/" + probeID + "/" + e.target.value, {
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

        fetch("./api/v1/probesData/" + probeID, {
        }).then(function (result) {
            if(result.ok) return result.json();
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

        hValue.innerHTML = maxV;
        hHourValue.innerHTML = " (" + Math.trunc(maxVH) + ":" + calcMinute(maxVH) + "h" + ")" ;
        lValue.innerHTML = minV;
        lHourValue.innerHTML = " (" + Math.trunc(minVH) + ":" + calcMinute(minVH) + "h" + ")";

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

<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------->