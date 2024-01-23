console.log("here1!")

var map = L.map('map').setView([51.505, -0.09], 2);

console.log("here2!")

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
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

//load wms form geoserver
const mywms = L.tileLayer.wms("http://localhost:8080/geoserver/geo/wms", {
    layers: layer,
    format: 'image/png',
    transparent: true,
    version: '1.1.0',
    attribution: "country layer"
});
mywms.addTo(map);
console.log(mywms); 
map.setView(bounds, 5);


// var wms_url = "http://localhost:8080/geoserver/geo/wms?service=wms&version=1.1.1&request=GetCapabilities";

// axios.get(wms_url).then((res) => console.log(res.data));