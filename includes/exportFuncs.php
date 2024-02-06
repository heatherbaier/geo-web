<script>

    function exportData() {
        console.log("here manooooo!!!!")

        // Create an AJAX request to fetch updated data
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'exportData.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log("MADE IT BACK HERE TO JA BOOTY");
                // var response = JSON.parse(this.responseText)
                // console.log(response);
                // Update table data
                // document.getElementById('schools-table').innerHTML = ""
                // document.getElementById('schools-table').innerHTML = response['table'];
                // document.getElementById('pagination').innerHTML = response['pagination'];
            }
        };

        // xhr.send(JSON.stringify(data));
        // console.log("PAGE AQUI: " + page);
        var params = "indicator=" + encodeURIComponent('bhr') + "&year=" + encodeURIComponent('*') + "&iso=" + encodeURIComponent('phl');
        console.log(params);
        xhr.send(params);

    }


</script>