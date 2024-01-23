console.log("here1!")

var map = L.map('map').setView([51.505, -0.09], 13);

console.log("here2!")

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

console.log("here3!")
