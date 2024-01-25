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

    map.removeEventListener('click') 

    map.eachLayer(function (layer) {
        map.removeLayer(layer);
    });

    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    }).addTo(map);

    var iso = isos[country]
    var bounds = centroids[country]
    // console.log(isos)
    console.log(iso)
    console.log(bounds)
    layer = "geo:".concat(iso);

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
        var URL = wms_server + '&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetFeatureInfo&LAYERS=geo:' + iso + '&QUERY_LAYERS=geo:' + iso + '&BBOX=' + BBOX + '&FEATURE_COUNT=1&HEIGHT=' + HEIGHT + '&WIDTH=' + WIDTH + '&INFO_FORMAT=application/json&SRS=EPSG%3A4326&X=' + X + '&Y=' + Y + '&buffer=10';
        // var URL = wms_server + '&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetFeatureInfo&LAYERS=geo:bol&QUERY_LAYERS=geo:bol&BBOX=' + BBOX + '&FEATURE_COUNT=1&HEIGHT=' + HEIGHT + '&WIDTH=' + WIDTH + '&INFO_FORMAT=text%2Fhtml&SRS=EPSG%3A4326&X=' + X + '&Y=' + Y + '&buffer=10';
        console.log(URL);
        $.ajax({
            url: URL,
            datatype: "html",
            type: "GET",
            success: function(data) {
                var popup = new L.popup({
                    maxWith: 300
                });
                // console.log(data["features"][0]["properties"]["geo_id"]);
                // console.log(data["features"][0]["properties"]);
                console.log(e.latlng)
                popup_text = data["features"][0]["properties"]["geo_id"] + "<br>" + "<a href=''>Go to school page</a>"
                popup.setContent(popup_text);
                // popup.setContent(data);
                popup.setLatLng(e.latlng);
                map.openPopup(popup);
            }
        });
    }

}


function getNumSchools(country)
    {
        $.ajax({
            type: "GET",
            url: "get_num_schools.php",
            data: "country=" + isos[country],
            success: function(result) {
                console.log("WE MADE IT HERE!!")
                console.log(result);
                var numSchoolsDiv = document.getElementById("num-schools");
                numSchoolsDiv.innerHTML = Math.floor(result).toLocaleString('en-US').concat(" SCHOOLS MAPPED");
            }
        });
    };




function updateCountry(country) {

    // Update the big country name
    updateCText(country)

    // Update the schools on the map
    updateMapCountry(country)

    // Update the number of schools under the country name
    getNumSchools(country)
}