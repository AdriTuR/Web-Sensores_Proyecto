
//--------------------------------------------------------
//--------------------------------------------------------
//
//GRAFICAS

new Chart(document.getElementById("humedad"), {
  type: 'line',
  data: {
    labels: ["2020-03-29","2020-03-30","2020-03-31"],
    datasets: [{
        data: [43,32,10],
        label: "humedad",
        borderColor: "#8e5ea2",
        fill: false
       }]
      },
      options: {
        legend: {
          display: false
        },
        title: {
          display: false,
        },
      },
  })



new Chart(document.getElementById("salinidad"), {

  type: 'line',
  data: {
    labels: ["2020-03-29","2020-03-30","2020-03-31"],
    datasets: [{
      data: [34,12,56],
      label: "salinidad",
      borderColor: "#3e95cd",
      fill: false
     }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: false,
      },
    },
  })


new Chart(document.getElementById("temperatura"), {

  type: 'line',
  data: {
    labels: ["2020-03-29","2020-03-30","2020-03-31"],
      datasets: [{
      data: [50,55,60],
      label: "temperatura",
      borderColor: "#FF9300",
      fill: false
    }]
  },
    options: {
      legend: {
        display: false
      },
      title: {
        display: false,
      }
    }
  })
