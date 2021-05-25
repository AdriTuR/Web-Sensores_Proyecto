fetch('datos/ventas_un_vendedor.json').then(function (r) {
    return r.json();
}).then(function (j) {
    procesarDatos(j);
});
//-----------------------PROCESAR DATOS-----------------------------//
function procesarDatos(ventas) {
    ventas = ventas.sort(function (a, b) {
        if (a.fecha < b.fecha) return -1;
        if (a.fecha > b.fecha) return 1;
        return 0;
    })

    // recorrer las ventas
    let fechas = [];
    let totales = [];

    ventas.forEach(function (venta) {
        let i = fechas.indexOf(venta.fecha);
        if (i < 0) {
            fechas.push(venta.fecha);
            totales.push(parseFloat(venta.importe));
        } else {
            totales[i] += parseFloat(venta.importe);
        }
    })
    datos.labels = fechas;
    datos.datasets[0].data = totales;

    CrearGrafica();
}
//------------------------------------------------------------------//
let datos = {
    labels: [],
    datasets: [
        {
            label: 'ventas',
            data: [],
            fill: true,
            backgroundColor: 'rgba(255,110,86,0.5)',
            borderColor: 'rgb(255,69,34)',
            borderDash: [2, 3],
            pointStyle: 'rectRot',
            pointRadius: 10,
        }
    ]
};
let opciones = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        x: {
            type: 'time',
            time: {
                // formato de fecha con Luxon
                tooltipFormat: 'DD T',
                unit: 'day'
            },
        },
        y: {
            stacked: true
        }
    },
    plugins: {
        legend: {
            position: 'left',
            align: 'end'
        },
        title: {
            display: true,
            text: 'Ventas de la semana'
        },
        tooltips: {
            backgroundColor: '#fff',
            titleColor: '#000',
            titleAlign: 'center',
            bodyColor: '#333',
            borderColor: '#666',
            borderWidth: 1,
        }
    }
};
//------------------------------------------------------------------//
function CrearGrafica() {
    let ctx = document.getElementById('chart');
    let miGrafica = new Chart(ctx, {
        type: 'line',
        data: datos,
        options: opciones
    });
}
//------------------------------------------------------------------//