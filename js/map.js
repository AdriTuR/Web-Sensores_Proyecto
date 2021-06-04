let map;
let userName;
let fieldData;
let infowindow;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 39.0085631, lng: -4.0779268 },
        zoom: 5,
        mapTypeId: 'hybrid',
        styles: [
            {
                featureType: 'poi',
                stylers: [{ visibility: 'off' }]
            },
            {
                featureType: 'transit',
                stylers: [{ visibility: 'off' }]
            }
        ],
        mapTypeControl: false,
        streetViewControl: false,
        rotateControl: false,
        zoomControl: false,
    });

    infowindow = new google.maps.InfoWindow();
}

function drawUserField(fieldData, lblName){
    var shape = createCoordShape(parseJSONLocationFormat(JSON.parse(fieldData.location)));
    var bounds = createBounds(shape);
    
    addMarkerFieldClick(addMarker(bounds.getCenter(), lblName, "field"), bounds, function(){
        var formData = new FormData();
        formData.append('data', "plot");
        formData.append('extra', fieldData.fieldID);
        fetchData(formData, function(res){
            for (let i = 0; i < res.length; i++) {
                drawUserPlot(res[i], shape, "Parcela " + (i+1));
            }
        })
    });
}

function drawUserPlot(plotData, fieldShape, lblName){
    var shape = createCoordShape(parseJSONLocationFormat(JSON.parse(plotData.location)));
    var bounds = createBounds(shape);
    
    addMarkerPlotClick(addMarker(bounds.getCenter(), lblName, "plot"), fieldShape, bounds, function(){
        var formData = new FormData();
        formData.append('data', "probe");
        formData.append('extra', plotData.plotID);
        fetchData(formData, function(res){
            for (let i = 0; i < res.length; i++) {
                addMarkerSensorClick(addMarker(JSON.parse(res[i].location), " ", "probe", true), res[i]);
            }
        })
    })
}

function showUserFields(){
    //START
    //START TO LOAD ALL USER FIELDS
    for (let i = 0; i < fieldData.length; i++) {
        drawUserField(fieldData[i], "Campo " + (i+1));
    }
}

function addMarker(center, lblName, imgName, extra) {
    if(extra){
        var data = parseJSONLocationFormat(center);
        center = { lat: data[0].lat, lng: data[0].lng }
    }
    
    var marker = new google.maps.Marker({
        position: center,
        icon: {
            url: "./images/map_icons/" + imgName + ".png",
            labelOrigin: new google.maps.Point(15, 50)
        },
        label: {text: String(lblName), color: "yellow"},
        animation: google.maps.Animation.DROP,
        map: map
    });
    
    $('#resetMap').on('click', function() {
        marker.setMap(null);
    });

    return marker;
}

//FUNCION CUANDO HACES CLICK EN EL ICONO CAMPO
function addMarkerFieldClick(marker, bounds, cb){
    marker.addListener("click", () => {
        marker.setMap(null);
        map.fitBounds(bounds);
        cb();
    });
}

function addMarkerPlotClick(marker, field, bounds, cb){
    marker.addListener("click", () => {
        map.fitBounds(bounds);
        marker.setMap(null);
        field.setOptions({fillOpacity: 0});
        cb();
    });
}

function addMarkerSensorClick(marker, sensorData){
    var content =
    "<div id=\"infow\">" + sensorData.id + 
    "<ul><li class=\"infobox\">" +
    "<img src=\"./images/map_icons/parameters/t.png\"><p class='medidas_numero'> " + sensorData.temperature + " Cº" +
    "</p>" +
    "</li>" +
    "<li class=\"infobox\">" +
    "<img src=\"./images/map_icons/parameters/h.png\"><p class='medidas_numero'>" + sensorData.humidity + " %" +
    "</p></li>" +
    "<li class=\"infobox\">" +
    "<img src=\"./images/map_icons/parameters/s.png\"><p class='medidas_numero'> " + sensorData.salinity + " %" +
    "</p></li>" +
    "<li class=\"infobox\">" +
    "<img src=\"./images/map_icons/parameters/l.png\"><p class='medidas_numero'>" + sensorData.luminity +
    "</p></li><li><a class=\"boton\" onclick='abrirIframe(" + sensorData.id + ")'><i class=\"fas fa-chart-line\"></i></a></li></ul></div>"
    
    marker.addListener("click", () => {
        infowindow.setContent(content);

        infowindow.open(map, marker);
    });
}

function createCoordShape(data){
    let polygon = new google.maps.Polygon({
        paths: data,
        strokeColor: "#ff8000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#ff8000",
        fillOpacity: 0.35,
        map: map
    });
    
    $('#resetMap').on('click', function() {
        polygon.setMap(null);
    });
    return polygon;
}

function createBounds(polygon){
    let bounds = new google.maps.LatLngBounds();
    polygon.getPath().getArray().forEach(function (v) {
        bounds.extend(v);
    })
    
    return bounds;
}

function parseJSONLocationFormat(data){
    for (let index = 0; index < data.length; index++) {
        const e = data[index];
        e.lat = parseFloat(e.lat)
        e.lng = parseFloat(e.lng)
    }
    
    return data;
}

function resetMap(){   
    setTimeout(() => {
        showUserFields();
    }, 1000);
    map.setCenter(new google.maps.LatLng(39.0085631, -4.0779268));
    map.setZoom(5);
    map.setMapTypeId(google.maps.MapTypeId.HYBRID);

}


function fetchData(formData, cb){
    formData.append('user', userName);
    
    fetch("./api/v1/probes.php", {
        method: "POST",
        body: formData
    }).then(function (result) {
        if(result.status == 200){
            return result.json();
        }
    }).then(async function (data) {
        if(data != null){
            cb(data);
        }
    });
}