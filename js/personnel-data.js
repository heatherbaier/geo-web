console.log("getting personnel data!")


function populate_personel_data() {

    var schoolID = window.location.href.slice(-10);
    var iso = window.location.href.substr(-10, 3); // 'M'
    var year = document.getElementById("year-select").options[0].innerHTML

    console.log(year);

    console.log(schoolID)
    console.log(iso)


    // Create an AJAX request to fetch updated data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_personel_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log("MADE IT BACK HERE TO JA BOOTY");
            var response = JSON.parse(this.responseText)
            console.log(response);

            // Populate personnel data card
            var personnelData = "<b>Total teachers:</b> " + response["query"][5] + "<br><b>Total Male Teachers:</b> " + response["query"][3] + "<br><b>Total Female Teachers:</b> " + response["query"][4]
                                        + "<br><b>Total students:</b> " + response["query"][8] + "<br><b>Total Male students:</b> " + response["query"][6] + "<br><b>Total Female students:</b> " + response["query"][7]
            var personnelInfo = document.getElementById("personnelInfo")
            personnelInfo.innerHTML = personnelData;

        }
    };

    // xhr.send(JSON.stringify(data));
    var params = "id=" + encodeURIComponent(schoolID) + "&iso=" + encodeURIComponent(iso.toLowerCase()) + "&year=" + encodeURIComponent(year);
    console.log(params);
    xhr.send(params);

}



function update_personnel_data(year) {

    var schoolID = window.location.href.slice(-10);
    var iso = window.location.href.substr(-10, 3); // 'M'
    var year = year;

    console.log(year);

    console.log(schoolID)
    console.log(iso)


    // Create an AJAX request to fetch updated data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_personel_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log("MADE IT BACK HERE TO JA BOOTY");
            var response = JSON.parse(this.responseText)
            console.log(response);

            // Populate personnel data card
            var personnelData = "<b>Total teachers:</b> " + response["query"][5] + "<br><b>Total Male Teachers:</b> " + response["query"][3] + "<br><b>Total Female Teachers:</b> " + response["query"][4]
                + "<br><b>Total students:</b> " + response["query"][8] + "<br><b>Total Male students:</b> " + response["query"][6] + "<br><b>Total Female students:</b> " + response["query"][7]
            var personnelInfo = document.getElementById("personnelInfo")
            personnelInfo.innerHTML = personnelData;

        }
    };

    // xhr.send(JSON.stringify(data));
    var params = "id=" + encodeURIComponent(schoolID) + "&iso=" + encodeURIComponent(iso.toLowerCase()) + "&year=" + encodeURIComponent(year);
    console.log(params);
    xhr.send(params);

}