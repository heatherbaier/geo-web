function redirectToSchool(geoId, countryISO) {
  console.log("MADE IT HERE MI AMIGA!!");

  // Assuming 'address' is a defined global variable or use a hardcoded base URL
  // var address = window.location.hostname; // You can change this if needed
  var url = window.location.protocol + "//" + address + "/school.php?country=" + encodeURIComponent(countryISO) + "&id=" + encodeURIComponent(geoId);

  console.log("Geo ID: ", geoId);
  console.log("Redirect URL: ", url);
  console.log("address: ", address);

  // Uncomment this line to actually perform the redirection
  window.location.href = url;
}
