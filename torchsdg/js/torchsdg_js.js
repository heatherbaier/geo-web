document.addEventListener("DOMContentLoaded", function() {
    const goalSelect = document.getElementById("goal-select");
    const indicatorSelect = document.getElementById("indicator-select");

    // Load goals from text file
    fetch('torchsdg/goals.txt')
        .then(response => response.text())
        .then(data => {
            const goals = data.split('\n').filter(goal => goal.trim() !== "");
            goals.forEach(goal => {
                const option = document.createElement('option');
                option.value = goal;
                option.textContent = goal;
                goalSelect.appendChild(option);
            });

            // Automatically trigger change event for the first goal
            if (goals.length > 0) {
                goalSelect.dispatchEvent(new Event('change'));
            }
        });

    // Load indicators from JSON based on the selected goal
    goalSelect.addEventListener("change", function() {
        const selectedGoal = goalSelect.value;
        fetch('torchsdg/indicators.json')
            .then(response => response.json())
            .then(data => {
                // Clear current options in indicator select
                indicatorSelect.innerHTML = '';

                // Check if selected goal has indicators
                if (data[selectedGoal]) {
                    data[selectedGoal].forEach(indicator => {
                        const option = document.createElement('option');
                        option.value = indicator;
                        option.textContent = indicator;
                        indicatorSelect.appendChild(option);
                    });
                } else {
                    const option = document.createElement('option');
                    option.textContent = 'No indicators available';
                    indicatorSelect.appendChild(option);
                }
            });
    });

    // Initialize the Leaflet map
    const map = L.map('map').setView([0, 0], 2); // Set initial view to the world

    // Add a tile layer to the map (this example uses OpenStreetMap tiles)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Add the GeoServer WMS layer
    var geoServerLayer = L.tileLayer.wms('https://globaleducationobservatory.org/geoserver/geo/wms', {
        layers: 'geo:pry_parrate_f_5_2012_adm2',
        format: 'image/png',
        transparent: true,
        attribution: 'GeoServer'
    }).addTo(map);

    console.log(geoServerLayer)

    // Fetch the GeoJSON data from GeoServer and style it based on 'par_rate'
    fetch('https://globaleducationobservatory.org/geoserver/geo/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo:pry_parrate_f_5_2012_adm2&outputFormat=application/json')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Define the style for each feature based on 'par_rate'
            function style(feature) {
                return {
                    fillColor: getColor(feature.properties.par_rate),
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7
                };
            }

            // Function to determine the color based on 'par_rate'
            function getColor(d) {
                return d > 80 ? '#800026' :
                    d > 60 ? '#BD0026' :
                        d > 40 ? '#E31A1C' :
                            d > 20 ? '#FC4E2A' :
                                d > 10 ? '#FD8D3C' :
                                    '#FFEDA0';
            }

            // Add the GeoJSON layer to the map
            L.geoJson(data, {style: style}).addTo(map);
        });



});
