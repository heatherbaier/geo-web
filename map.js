// function loadMap(country) {

    var dropdown = document.getElementById("country-select");
    var displayElement = document.getElementById("country-label");

    console.log(dropdown.options);

// if (dropdown.options.length > 0) {

    // console.log(dropdown);

    // var firstItem = dropdown.options[0].text; // or .value, depending on what you want to display


    console.log("here1!")

    var country = "Bolivia";

    var map = L.map('map').setView([51.505, -0.09], 2);

    console.log("here2!")

    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    }).addTo(map);

    console.log("here3!")

    // console.log(isos)

    // var country = document.getElementById("country-select")
    // console.log(country.value);
    var iso = isos[country]
    var bounds = centroids[country]
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
        var URL = wms_server + '&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetFeatureInfo&LAYERS=geo:bol&QUERY_LAYERS=geo:bol&BBOX=' + BBOX + '&FEATURE_COUNT=1&HEIGHT=' + HEIGHT + '&WIDTH=' + WIDTH + '&INFO_FORMAT=application/json&SRS=EPSG%3A4326&X=' + X + '&Y=' + Y + '&buffer=10';
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


// }

// https://globaleducationobservatory.org/geoserver/geo/wms?
// &SERVICE=WMS&VERSION=1.1.1
// &REQUEST=GetFeatureInfo
// &LAYERS=geo:bol
// &QUERY_LAYERS=geo:bol
// &BBOX=-86.00097656250001,-28.84467368077178,-42.890625,-3.7765593098768635
// &FEATURE_COUNT=1
// &HEIGHT=600
// &WIDTH=981
// &INFO_FORMAT=text%2Fhtml
// &SRS=EPSG%3A4326
// &X=491
// &Y=348
// &buffer=10