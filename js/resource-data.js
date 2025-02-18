console.log("getting resource data!")


function populate_resource_data() {

    var schoolID = window.location.href.slice(-10);
    var iso = window.location.href.substr(-10, 3); // 'M'
    var year = document.getElementById("year-select").options[0].innerHTML

    console.log(year);

    console.log(schoolID)
    console.log(iso)


    // Create an AJAX request to fetch updated data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_resource_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            console.log("MADE IT BACK HERE TO JA BOOTY RESOURCES:");
            var response = JSON.parse(this.responseText)


            console.log(response);

            console.log(response["query"][3]);

            // Helper function to format the value
            function formatYesNo(val) {
                // Attempt to convert to a number
                var num = Number(val);
                if (num === 1) {
                    return "Yes";
                } else if (num === 0) {
                    return "No";
                } else {
                    return "Unknown";
                }
            }

            // Populate resource data card using the helper function
            var resourceData = "<b>Water Available:</b> " + formatYesNo(response["query"][3]) +
                "<br><b>Internet Available:</b> " + formatYesNo(response["query"][4]) +
                "<br><b>Electricity Available:</b> " + formatYesNo(response["query"][5]) +
                "<br><b>Computer Available:</b> " + formatYesNo(response["query"][6]) +
                "<br><b>Presence of Disability Infrastructure:</b> " + formatYesNo(response["query"][7]) +
                "<br><b>Presence of Sanitation Facilities:</b> " + formatYesNo(response["query"][8]) +
                "<br><b>ss_sanitation_facilities:</b> " + formatYesNo(response["query"][9]) +
                "<br><b>Presence of Handwashing Facilities:</b> " + formatYesNo(response["query"][10]);

            var resourceInfo = document.getElementById("resourceInfo")
            resourceInfo.innerHTML = resourceData;

        }
    };

    // xhr.send(JSON.stringify(data));
    var params = "id=" + encodeURIComponent(schoolID) + "&iso=" + encodeURIComponent(iso.toLowerCase()) + "&year=" + encodeURIComponent(year);
    console.log(params);
    xhr.send(params);

}



function update_resource_data(year) {

    var schoolID = window.location.href.slice(-10);
    var iso = window.location.href.substr(-10, 3); // 'M'
    var year = year;

    console.log(year);

    console.log(schoolID)
    console.log(iso)


    // Create an AJAX request to fetch updated data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_resource_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log("MADE IT BACK HERE TO JA BOOTY RESOURCES IN UPDATE");
            var response = JSON.parse(this.responseText)

            console.log(response);

            // Helper function to format the value
            function formatYesNo(val) {
                // Attempt to convert to a number
                var num = Number(val);
                if (num === 1) {
                    return "Yes";
                } else if (num === 0) {
                    return "No";
                } else {
                    return "Unknown";
                }
            }

            // Populate resource data card using the helper function
            var resourceData = "<b>Water Available:</b> " + formatYesNo(response["query"][3]) +
                "<br><b>Internet Available:</b> " + formatYesNo(response["query"][4]) +
                "<br><b>Electricity Available:</b> " + formatYesNo(response["query"][5]) +
                "<br><b>Computer Available:</b> " + formatYesNo(response["query"][6]) +
                "<br><b>Presence of Disability Infrastructure:</b> " + formatYesNo(response["query"][7]) +
                "<br><b>Presence of Sanitation Facilities:</b> " + formatYesNo(response["query"][8]) +
                "<br><b>ss_sanitation_facilities:</b> " + formatYesNo(response["query"][9]) +
                "<br><b>Presence of Handwashing Facilities:</b> " + formatYesNo(response["query"][10]);

            var resourceInfo = document.getElementById("resourceInfo")
            resourceInfo.innerHTML = resourceData;


        }
    };

    // xhr.send(JSON.stringify(data));
    var params = "id=" + encodeURIComponent(schoolID) + "&iso=" + encodeURIComponent(iso.toLowerCase()) + "&year=" + encodeURIComponent(year);
    console.log(params);
    xhr.send(params);

}