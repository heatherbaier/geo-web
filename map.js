console.log("here1!")

var map = L.map('map').setView([51.505, -0.09], 2);

console.log("here2!")

L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
	subdomains: 'abcd',
	maxZoom: 20
}).addTo(map);

console.log("here3!")

console.log(isos)

var country = document.getElementById("country-select")
console.log(country.value);
var iso = isos[country.value]
var bounds = centroids[country.value]
console.log(iso)
layer = "geo:".concat(iso);
console.log(layer)


var host = "https://globaleducationobservatory.org/geoserver/geo/wms?";
var wms_server = host;


//load wms form geoserver
const mywms = L.tileLayer.wms("https://globaleducationobservatory.org/geoserver/geo/wms", {
    layers: layer,
    format: 'image/png',
    transparent: true,
    version: '1.1.0',
    attribution: "country layer"
});
mywms.addTo(map);
console.log(mywms); 
map.setView(bounds, 5);
map.addEventListener('click', Identify);


function Identify(e) {
    var BBOX = map.getBounds().toBBoxString();
    var WIDTH = map.getSize().x;
    var HEIGHT = map.getSize().y;
    var X = Math.floor(map.layerPointToContainerPoint(e.layerPoint).x);
    var Y = Math.floor(map.layerPointToContainerPoint(e.layerPoint).y);
    var URL = wms_server + '&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetFeatureInfo&LAYERS=geo:bol&QUERY_LAYERS=geo:bol&BBOX=' + BBOX + '&FEATURE_COUNT=1&HEIGHT=' + HEIGHT + '&WIDTH=' + WIDTH + '&INFO_FORMAT=text%2Fhtml&SRS=EPSG%3A4326&X=' + X + '&Y=' + Y + '&buffer=10';
    console.log(URL);
    $.ajax({
        url: URL,
        datatype: "html",
        type: "GET",
        success: function(data) {
            var popup = new L.popup({
                maxWith: 300
            });
            popup.setContent(data);
            popup.setLatLng(e.latlng);
            map.openPopup(popup);
        }
    });
}




// https://globaleducationobservatory.org/geoserver/geo/wms?
// service=WMS&version=1.1.0
// &request=GetFeatureInfo
// &layers=geo%3Abol
// &bbox=-69.56538391113281%2C-22.851396560668945%2C-57.71261978149414%2C-10.015067100524902
// &query_layers=geo%3Abol
// &info_format=text%2Fhtml
// &height=600
// &width=981
// &x=521
// &y=288
// &srs=EPSG%3A4326
// &buffer=10
// &format=application/openlayers

// var wms_url = "http://localhost:8080/geoserver/geo/wms?service=wms&version=1.1.1&request=GetCapabilities";

// axios.get(wms_url).then((res) => console.log(res.data));