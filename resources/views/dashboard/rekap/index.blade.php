@extends('dashboard_layout.main')
@section('title', 'Daftar REkap Produk')
@section('navRekap', 'active')
@section('contents')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted text-uppercase mb-1 small" style="font-weight: 600;">Penjualan Produk Hari Ini</p>
                            <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">Rp {{ number_format($todaySales, 0, ',', '.') }}</h4>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center rounded-3 shadow-sm" 
                                style="width: 50px; height: 50px; background: linear-gradient( #0055e3, #ab73ff); color: white;">
                            <i class="fas fa-briefcase" style="font-size: 1.2rem;" data-feather="shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted text-uppercase mb-1 small" style="font-weight: 600;">Total Penjualan Produk</p>
                            <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</h4>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center rounded-3 shadow-sm" 
                            style="width: 50px; height: 50px; background: linear-gradient( #00f7ff, #4b3eff); color: white;">
                            <i class="fas fa-briefcase" style="font-size: 1.2rem;" data-feather="dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted text-uppercase mb-1 small" style="font-weight: 600;">Produk Masuk</p>
                            <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">{{ number_format($produkMasuk) }}</h4>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center rounded-3 shadow-sm" 
                                style="width: 50px; height: 50px; background: linear-gradient(#fff563, #44f000); color: white;">
                            <i class="fas fa-briefcase" style="font-size: 1.2rem;" data-feather="box"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted text-uppercase mb-1 small" style="font-weight: 600;">Produk Terjual</p>
                            <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">{{ number_format($produkTerjual) }}</h4>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center rounded-3 shadow-sm" 
                                style="width: 50px; height: 50px; background: linear-gradient(#0ae997, #44f000); color: white;">
                            <i class="fas fa-briefcase" style="font-size: 1.2rem;" data-feather="box"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted text-uppercase mb-1 small" style="font-weight: 600;">Jumlah Order</p>
                            <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">{{ number_format($jumlahOrder) }}</h4>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center rounded-3 shadow-sm" 
                                style="width: 50px; height: 50px; background: linear-gradient(#f57b10, #ffdd00); color: white;">
                            <i class="fas fa-briefcase" style="font-size: 1.2rem;" data-feather="shopping-bag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted text-uppercase mb-1 small" style="font-weight: 600;">Jumlah Pengguna</p>
                            <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">{{ number_format($totalUsers) }}</h4>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center rounded-3 shadow-sm" 
                                style="width: 50px; height: 50px; background: linear-gradient(#ff2525, #ff00aa); color: white;">
                            <i class="fas fa-briefcase" style="font-size: 1.2rem;" data-feather="users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted text-uppercase mb-1 small" style="font-weight: 600;">Jumlah Pemboking</p>
                            <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">{{ number_format($totalBooking) }}</h4>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center rounded-3 shadow-sm" 
                                style="width: 50px; height: 50px; background: linear-gradient( #9012ff, #ff00d9); color: white;">
                            <i class="fas fa-briefcase" style="font-size: 1.2rem;" data-feather="user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted text-uppercase mb-1 small" style="font-weight: 600;">Total Pembokingan</p>
                            <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">Rp {{ number_format($pemancingan, 0, ',', '.') }}</h4>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center rounded-3 shadow-sm" 
                                style="width: 50px; height: 50px; background: linear-gradient( #01b7ff, #00ff5e); color: white;">
                            <i class="fas fa-briefcase" style="font-size: 1.2rem;" data-feather="dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Diagram Penjualan</h5>
                        <!-- Dropdown Rentang Waktu -->
                        <select id="timeRange" class="form-select form-select-sm" style="width: auto;">
                            <option value="daily">Harian</option>
                            <option value="weekly">Mingguan</option>
                            <option value="monthly" selected>Bulanan</option>
                            <option value="yearly">Tahunan</option>
                        </select>
                    </div>
                    <!-- Canvas untuk Grafik -->
                    <canvas id="salesChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="/export-orders" class="btn btn-success">Export Excel</a>


<script>
    // Initial chart setup
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line', // You can use 'bar', 'line', etc.
        data: {
            labels: [], // Dates or periods (daily, weekly, monthly, etc.)
            datasets: [{
                label: 'Total Penjualan',
                data: [],
                borderColor: '#4e73df',
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: { 
                    beginAtZero: true 
                }
            }
        }
    });

    // Fetch and update chart based on selected time range
    function fetchSalesData(timeRange) {
        fetch('/get-sales-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ timeRange: timeRange })
        })
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.date || item.week || item.month || item.year);
            const sales = data.map(item => item.total);

            // Update the chart
            salesChart.data.labels = labels;
            salesChart.data.datasets[0].data = sales;
            salesChart.update();
        });
    }

    // Initial chart load with 'monthly' data
    fetchSalesData('monthly');

    // Update chart when time range is changed
    document.getElementById('timeRange').addEventListener('change', function() {
        fetchSalesData(this.value);
    });
</script>


@endsection