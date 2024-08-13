console.log("GOSH FRIGGIN");



function loadGlobalMap() {
    console.log("HERE@@")
    console.log("HEY YO");
    // var test = ["phl", "bol"];

    var data = {"null": ''}

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'fetch_table_names.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

            var response = JSON.parse(this.responseText);

            console.log("HERE MAN!");
            console.log(response);

            response = response.filter(item => item.length === 3);

            console.log(response);



            var numSchools = document.getElementById("num-countries");
            console.log(response.length);
            console.log(numSchools)
            numSchools.innerHTML = response.length + " COUNTRIES MAPPED";


            console.log(response);

            for (i in response) {

                console.log(response[i]);

                // load the adm0 boundary with '_adm0'
                var layer = "geo:".concat(response[i]).concat('_adm0');

                console.log(layer);

                // load wms form geoserver
                const mywms = L.tileLayer.wms("http://18.212.233.65:8080/geoserver/geo/wms", {
                    layers: layer,
                    format: 'image/png',
                    transparent: true,
                    version: '1.1.0',
                    attribution: "country layer"
                });
                mywms.addTo(map);
                console.log(mywms);
                map.setView([25, 0], 2);
                // map.addEventListener('click', Identify);



            }




        }
    }
    xhr.send(JSON.stringify(data));






        //





}

loadGlobalMap()
