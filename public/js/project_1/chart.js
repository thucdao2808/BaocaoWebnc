

    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 8,
                barPercentage: 0.5,
                categoryPercentage: 0.6
            }]
        },
        options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        tooltip: {
            callbacks: {
                label: function(context) {
                    let value = context.raw.toLocaleString('vi-VN');
                    return `Doanh thu: ${value} đ`;
                }
            },
            titleFont: {
                size: 16
            },
            bodyFont: {
                size: 16
            }
        },
        legend: {
            display: false
        }
    },
    scales: {
        x: {
            ticks: {
                font: {
                    size: 16
                },
                color: '#000'
            },
            title: {
                display: true,
                text: 'Ngày',
                font: {
                    size: 18
                }
            }
        },
        y: {
            beginAtZero: true,
            ticks: {
                font: {
                    size: 16
                },
                callback: function(value) {
                    return value.toLocaleString('vi-VN') + ' đ';
                },
                color: '#000'
            },
            title: {
                display: true,
                text: 'Doanh thu (VNĐ)',
                font: {
                    size: 18
                }
            }
        }
    }
}

    });