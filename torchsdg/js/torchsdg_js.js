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
});
