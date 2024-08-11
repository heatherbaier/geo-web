<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDG Indicator Dashboard</title>
    <link rel="stylesheet" href="torchsdg/css/torchsdg_styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
<div class="container">
    <aside class="sidebar">
        <h2>Goal</h2>
        <select id="goal-select" class="goal-select">
            <!-- Goals will be loaded here dynamically -->
        </select>

        <h2>Indicator</h2>
        <select id="indicator-select" class="indicator-select">
            <!-- Indicators will be loaded here dynamically -->
        </select>

        <h2>Year</h2>
        <select class="year-select">
            <option value="latest">Latest available year</option>
            <!-- Add more options as needed -->
        </select>

        <h2>View by</h2>
        <div class="view-options">
            <button class="view-button">Country</button>
            <button class="view-button">Region</button>
            <button class="view-button">World</button>
        </div>
    </aside>

    <main class="main-content">
        <h1>SDG Indicator Dashboard</h1>
        <div id="map" class="map"></div>
    </main>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="torchsdg/js/torchsdg_js.js"></script>
</body>
</html>
