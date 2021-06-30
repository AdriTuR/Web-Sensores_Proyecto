//TODO: CAMBIAR ZOOM SEGÚN NUMERO CAMPOS USUARIO

let map;
let userName;
let fieldData;
let infowindow;
let centerLocation;
let drawingManager;
let actualFieldID;
let actualPlotID;
let plotPolygon = false;

let mapPolygons = []
let drawedPolygons = {
    coordinates: []
};

let drawedPlotPolygons = []


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
        fullscreenControl: false,
    });
    
    infowindow = new google.maps.InfoWindow();

    drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.NONE,
        drawingControl: false,
        drawingControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER,
            drawingModes: [
                google.maps.drawing.OverlayType.MARKER,
                google.maps.drawing.OverlayType.POLYGON
            ],
            polygonOptions: {
                editable: true
            },
        },
        markerOptions: {
            icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
        }
    });

    drawingManager.setMap(map);

    google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
        var newShape = event.overlay;
        newShape.type = event.type;

        mapPolygons.push(newShape)

        if (newShape.type == google.maps.drawing.OverlayType.POLYGON) {
            var allObjs = []
            for (let point of newShape.getPath().getArray()) {
                    var obj = {
                        lat: point.lat(),
                        lng: point.lng()
                    };

                if(!plotPolygon) drawedPolygons.coordinates.push(obj)
                else{ allObjs.push(obj)}
            }
            if(plotPolygon) {
                drawedPlotPolygons.push(allObjs);
            }
        }else if(newShape.type == google.maps.drawing.OverlayType.MARKER){
                var obj = {
                    lat: newShape.position.lat(),
                    lng: newShape.position.lng()
                };

                drawedPlotPolygons.push(obj)
        }
    });
}

function drawUserField(fieldData, lblName){
    var shape = createCoordShape(parseJSONLocationFormat(JSON.parse(fieldData.location)));
    var bounds = createBounds(shape);
    numSensores.innerHTML = 0;
    m2Terreno.innerHTML = fieldData.m2;

    addMarkerFieldClick(addMarker(bounds.getCenter(), lblName, "field"), bounds, function(){
        var formData = new FormData();
        actualFieldID = fieldData.fieldID;
        formData.append('fieldID', fieldData.fieldID);
        centerLocation = bounds;
        fetchData(formData, "plot", function(res){
            for (let i = 0; i < res.length; i++) {
                drawUserPlot(res[i], shape, "Parcela " + (i+1));
            }
            //SE MUESTRA BOTON PARA AÑADIR PARCELA AL ACCEDER AL CAMPO
            aparecerBotonesParcelaAndSensor();
        })
    });
}

function drawUserPlot(plotData, fieldShape, lblName){
    var shape = createCoordShape(parseJSONLocationFormat(JSON.parse(plotData.location)));
    var bounds = createBounds(shape);

    addMarkerPlotClick(addMarker(bounds.getCenter(), lblName, "plot"), fieldShape, bounds, function(){
        var formData = new FormData();
        formData.append('plotID', plotData.id);
        actualPlotID = plotData.id;
        fetchData(formData, "probe", function(res){
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
    "<div id=\"infow\">" + "<p id=\"sensor_id\">SENSOR " + sensorData.id + "</p>" +
    "<ul><li class=\"infobox\">" +
    "<img src=\"./images/map_icons/parameters/t.png\"><p class='medidas_numero'> " + sensorData.temperature + "Cº" +
    "</p>" +
    "</li>" +
    "<li class=\"infobox\">" +
    "<img src=\"./images/map_icons/parameters/h.png\"><p class='medidas_numero'>" + sensorData.humidity + "%" +
    "</p></li>" +
    "<li class=\"infobox\">" +
    "<img src=\"./images/map_icons/parameters/s.png\"><p class='medidas_numero'> " + sensorData.salinity + "%" +
    "</p></li>" +
    "<li class=\"infobox\">" +
    "<img src=\"./images/map_icons/parameters/l.png\"><p class='medidas_numero'>" + sensorData.luminity +
    "</p></li><li><a class=\"boton_grafica\" onclick='abrirIframe(" + sensorData.id + ")'> <img id=\"icono_grafica\" src=\"./images/icons/grafica_icon.png\" alt=\"boton grafica\"></a></li></ul></div>"
    
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

function recenterMap(){
    if(centerLocation != null) 
    var data = parseJSONLocationFormat(centerLocation);
    console.log(data)
    //map.setCenter(new google.maps.LatLng(data[0].lat, data[0].lng));
}

function resetMap(){
    setTimeout(() => {
        showUserFields();
    }, 1000);
    map.setCenter(new google.maps.LatLng(39.0085631, -4.0779268));
    map.setZoom(5);
    map.setMapTypeId(google.maps.MapTypeId.HYBRID);
    centerLocation = null;
}

function fetchData(formData, type, cb){
    var url;

    switch (type){
        case "field":
            url = userName;
            break;
        case "plot":
            url = formData.get("fieldID");;
            break;
        case "probe":
            url = formData.get("plotID");
            break;
    }

    fetch("./api/v1/" + type + "/" + url, {
    }).then(function (result) {
        if(result.ok) return result.json();
    }).then(async function (data) {
        if(data != null){
            cb(data);
        }
    });
}

function saveFieldPolygon(){
    if (drawedPolygons.coordinates.length > 0) {
        var fd = new FormData();
        fd.append("owner", userName);
        fd.append("location", JSON.stringify(drawedPolygons.coordinates));
        postData(fd, "field");
    }
}

function savePlotPolygon(){
    if (drawedPlotPolygons.length > 0) {
        for(var i = 0; i < drawedPlotPolygons.length; i++){
            const e = drawedPlotPolygons[i];
            var fd = new FormData();
            fd.append("fieldID", actualFieldID);
            fd.append("location", JSON.stringify(e));
            postData(fd, "plot");
        }
    }
}

function saveProbesMarker(){
    if (drawedPlotPolygons.length > 0) {
        for(var i = 0; i < drawedPlotPolygons.length; i++){
            const e = drawedPlotPolygons[i];
            var fd = new FormData();
            fd.append("plotID", actualPlotID);
            fd.append("location", JSON.stringify(e));
            postData(fd, "probe");
        }
    }
}

function clearDrawings() {
    if (mapPolygons.length > 0) {
        mapPolygons.forEach(function (e) {
            e.setMap(null);
        });
    }
}

function activateDrawBar(marker){
    if(!marker){
        drawingManager.setOptions({
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
            drawingControl: false
        });
    }else{
        drawingManager.setOptions({
            drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: false
        });
    }

}

function disableDrawBar(){
    drawingManager.setOptions({
        drawingMode: google.maps.drawing.OverlayType.NONE,
        drawingControl: false
    });
}
function postData(data, type){
    fetch("./api/v1/" + type, {
        method : "POST",
        body: data
    })
}


