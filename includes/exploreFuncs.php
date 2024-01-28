<script>


window.onload = function() {
    console.log("IN HERE YO DAWG!");
    updateDropdowns('adm2')
    setFiltersAndRefreshTable()
};

function redirectToSchool(geoId, countryISO) {
    var url = window.location.protocol + "//" + address + "school.php?country=" + encodeURIComponent(countryISO) + "&id=" + encodeURIComponent(geoId);
    window.location.href = url;
}


// Global variables to store current filter values
var currentAdm1 = '';
var currentAdm2 = '';
var currentAdm3 = '';

// Function to update filter variables and refresh table data
function setFiltersAndRefreshTable() {

    console.log("BEFORE: ".concat(currentAdm1));

    currentAdm1 = document.getElementById('adm1-select').value;
    currentAdm2 = document.getElementById('adm2-select').value;
    currentAdm3 = document.getElementById('adm3-select').value;

    console.log("AFTER: ".concat(currentAdm1));

    updateTableData(1); // Reset to page 1 whenever filters change
}



function populateDropdown(dropdownId, data, valueKey, textKey) {
    var select = document.getElementById(dropdownId);
    select.innerHTML = ''; // Clear existing options

    var option = document.createElement('option');
    option.value = "*"
    option.text = "All"
    select.appendChild(option);

    data.forEach(function(adm) {
        var option = document.createElement('option');
        option.value = adm[valueKey];
        option.text = adm[textKey];
        select.appendChild(option);
    });
}






function updateAll(selectedAdm) {
    updateDropdowns(selectedAdm)
    setFiltersAndRefreshTable(selectedAdm)

}

function updateTableData(page = 1) {

    console.log("WE IN HERE YO!!")

    var adm1selectedValue = document.getElementById('adm1-select').value;
    var adm2selectedValue = document.getElementById('adm2-select').value;
    var adm3selectedValue = document.getElementById('adm3-select').value;

    // Create an AJAX request to fetch updated data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'fetch_filtered_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(this.responseText)
            // Update table data
            // document.getElementById('schools-table').innerHTML = ""
            document.getElementById('schools-table').innerHTML = response['table'];
            document.getElementById('pagination').innerHTML = response['pagination'];
        }
    };

    // xhr.send(JSON.stringify(data));
    var params = "page=" + page + "&adm1=" + encodeURIComponent(adm1selectedValue) + "&adm2=" + encodeURIComponent(adm2selectedValue) + "&adm3=" + encodeURIComponent(adm3selectedValue);
    xhr.send(params);

}




function updateDropdowns(selectedAdm) {

    var adm1selectedValue = document.getElementById("adm1-select").value;
    var adm2selectedValue = document.getElementById("adm2-select").value;
    var adm3selectedValue = document.getElementById("adm3-select").value;

    var firstCheck = adm1selectedValue + adm2selectedValue + adm3selectedValue;
    console.log("FIRST CHECK BEAN: ".concat(firstCheck));

    // Case where nothing is selected, so all filters are "all" / "***"
    if (firstCheck == "***") {
        var data = {
            admType: "***",
            adm1Selected: adm1selectedValue,
            adm2Selected: adm2selectedValue,
            adm3Selected: adm3selectedValue,
            iso: '<?= $countryISO ?>'
        };
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'fetch_adm_data.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var response = JSON.parse(this.responseText);
                populateDropdown('adm1-select', response['array1'], "adm1", "adm1")
                populateDropdown('adm2-select', response['array2'], "adm2", "adm2")
                populateDropdown('adm3-select', response['array3'], "adm2", "adm3")
            }
        };
        xhr.send(JSON.stringify(data));
    } else {

        console.log("IN THE ELSE BLOCK HERE!!")

        var data = {
            admType: selectedAdm,
            adm1Selected: adm1selectedValue,
            adm2Selected: adm2selectedValue,
            adm3Selected: adm3selectedValue,
            iso: '<?= $countryISO ?>'
        };
        console.log("DATA: ")
        console.log(data);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'fetch_adm_data.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {

                var response = JSON.parse(this.responseText);
                console.log("SUCCCESFUL RESPOINSE!!", response);

                if (selectedAdm == "adm1") {
                    console.log("PINTO BEANS", response)
                    populateDropdown('adm2-select', response['array1'], "adm2", "adm2")
                    populateDropdown('adm3-select', response['array2'], "adm3", "adm3")
                } else {
                    console.log("WHITE BEANS", response)
                    populateDropdown('adm3-select', response, "adm3", "adm3")
                }

            }
        }
        xhr.send(JSON.stringify(data));
    }
}
</script>