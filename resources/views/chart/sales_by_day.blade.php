@include('layout.header')
<div class="mt-8"> 
    <span class="font-bold text-2xl">Doanh thu</span>
</div>
<div class="bg-white">
    <canvas id="salesChart" height="100px"></canvas>
</div>

<script>
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($sales->pluck('day')) !!},
            datasets: [
                {
                    label: 'Tổng doanh thu',
                    data: {!! json_encode($sales->pluck('total_sales')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Doanh thu hoàn thành',
                    data: {!! json_encode($sales->pluck('completed_sales')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Số lượng đơn hàng',
                    data: {!! json_encode($sales->pluck('order_count')) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>