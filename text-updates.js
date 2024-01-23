// Set the inital value of the country name with the default selected (currently Bolivia)
const myElement = document.getElementById("country-label");
var country = document.getElementById("country-select")//.value;
console.log(country.value);
myElement.innerHTML = country.value;


function updateCText(country) {
    var element = document.getElementById("country-label");
    element.innerHTML = country;
}


function updateMapCountry(country) {
    // map = L.map('map').setView([51.505, -0.09], 13);
    // console.log("here2!")
    // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     maxZoom: 19,
    //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    // }).addTo(map);
    // console.log("here3!")

    map.eachLayer(function (layer) {
        map.removeLayer(layer);
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var iso = isos[country]
    var bounds = centroids[country]
    // console.log(isos)
    console.log(iso)
    console.log(bounds)
    layer = "geo:".concat(iso);

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


}




function updateCountry(country) {
    updateCText(country)
    updateMapCountry(country)
}