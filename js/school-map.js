console.log("HEYOOOO");








var schoolID = window.location.href.slice(-10);
var iso = window.location.href.substr(-10, 3); // 'M'

console.log(schoolID)
console.log(iso)


// Create an AJAX request to fetch updated data
var xhr = new XMLHttpRequest();
xhr.open('POST', 'get_school_coords.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        console.log("MADE IT BACK HERE TO JA BOOTY");
        var response = JSON.parse(this.responseText)
        console.log(response);

        console.log(response["query"][8], response["query"][9])

        // Create school Map
        var map = L.map('schoolMap').setView([response["query"][9], response["query"][8]], 16);

        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        }).addTo(map);

        var marker = L.marker([response["query"][9], response["query"][8]]).addTo(map);

        // Populate basic data card
        var schoolAddress = response["query"][3] ??= 'Not available.'
        var basicData = "<b>ADM1:</b> " + response["query"][5] + "<br><b>ADM2:</b> " + response["query"][6] + "<br><b>ADM3:</b> " + response["query"][7]
                                + "<br><b>Address:</b> " + schoolAddress;
        var basicInfo = document.getElementById("basicInfo")
        basicInfo.innerHTML = basicData;

    }
};

// xhr.send(JSON.stringify(data));
var params = "id=" + encodeURIComponent(schoolID) + "&iso=" + encodeURIComponent(iso.toLowerCase());
console.log(params);
xhr.send(params);




