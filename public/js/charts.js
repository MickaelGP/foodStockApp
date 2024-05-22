const url = 'http://127.0.0.1:8000/dashboard/stat';

fetch(url)
    .then(response => response.json())
    .then(data => {

        const labels = data.map(item => item.product_name_fr);
        const quantities = data.map(item => parseInt(item.quantite));

        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Quantity',
                    data: quantities,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(124,85,37)'
                    ],
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
