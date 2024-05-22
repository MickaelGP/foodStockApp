const urlDate = 'http://127.0.0.1:8000/dashboard/stat';

fetch(urlDate)
    .then(response => response.json())
    .then(data => {

        const aggregatedData = {};
        data.forEach(item => {
            const dlc = item.dlc;
            const quantity = parseInt(item.quantite);

            if (aggregatedData[dlc]) {
                aggregatedData[dlc] += quantity;
            } else {
                aggregatedData[dlc] = quantity;
            }
        });

        const labels = Object.keys(aggregatedData);
        const quantities = Object.values(aggregatedData);

        const ctx = document.getElementById('myChartDate').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of products',
                    data: quantities,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => console.error('Error in fetch', error));
