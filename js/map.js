let map;
let userName;

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

    addMarkerPlotClick(addMarker(bounds.getCenter(), lblName, "field"), fieldShape, bounds, function(){
        var formData = new FormData();
        formData.append('data', "probe");
        formData.append('extra', plotData.plotID);
        fetchData(formData, function(res){
            for (let i = 0; i < res.length; i++) {
                addMarkerSensorClick(addMarker(JSON.parse(res[i].location), "Sensor " + (i+1), "probe", true));
            } 
        })
    })
}

function showUserFields(data){
    //START
    //START TO LOAD ALL USER FIELDS
    for (let i = 0; i < data.length; i++) {
        drawUserField(data[i], "Campo " + (i+1));
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

    return marker;
}

function addMarkerFieldClick(marker, bounds, cb){
    marker.addListener("click", () => {
        map.fitBounds(bounds);
        marker.addListener("click", () => {
            marker.setMap(null);
            cb();
        });
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

function addMarkerSensorClick(marker){
    //CLAUDIO
    marker.addListener("click", () => {
        //
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