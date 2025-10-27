@extends('template.temp')

@section('content')
    <style>
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            color: white;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
    </style>

    <section class="hero-section-2 d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center">STATISTIK SARANA PRASARANA PENDIDIKAN</h1>
                    <p class="text-white text-center">Data Persebaran dan Ketersediaan Fasilitas Pendidikan di Kecamatan Ciomas</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <!-- Summary Statistics Cards -->
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">{{ $paud_stats['total_paud'] }}</div>
                        <div class="stat-label">Total Satuan PAUD</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="stat-number">{{ $dasar_stats['total_dasar'] }}</div>
                        <div class="stat-label">Total Satuan Dasar</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="stat-number">{{ $paud_stats['total_paud'] + $dasar_stats['total_dasar'] }}</div>
                        <div class="stat-label">Total Semua Satuan</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <div class="stat-number">{{ array_sum($completion_stats) / count($completion_stats) }}%</div>
                        <div class="stat-label">Rata-rata Kelengkapan</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- PAUD Distribution Pie Chart -->
                <div class="col-lg-6 mb-5">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Distribusi Satuan PAUD</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="paudDistributionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pendidikan Dasar Distribution Pie Chart -->
                <div class="col-lg-6 mb-5">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Distribusi Pendidikan Dasar</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="dasarDistributionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completion Rate Bar Chart -->
                <div class="col-lg-12 mb-5">
                    <div class="card shadow">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Tingkat Pemenuhan SPM per Jenjang</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="completionRateChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Facility Availability Horizontal Bar Chart -->
                <div class="col-lg-12 mb-5">
                    <div class="card shadow">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0">Ketersediaan Fasilitas Utama</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="facilityAvailabilityChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
    // Register the plugin globally
    Chart.register(ChartDataLabels);

    document.addEventListener('DOMContentLoaded', function() {
        // PAUD Distribution Pie Chart with numbers
        const paudCtx = document.getElementById('paudDistributionChart').getContext('2d');
        new Chart(paudCtx, {
            type: 'pie',
            data: {
                labels: ['TK ({{ $paud_stats['tk_count'] }})', 'KB ({{ $paud_stats['kb_count'] }})', 'SPS ({{ $paud_stats['sps_count'] }})'],
                datasets: [{
                    data: [
                        {{ $paud_stats['tk_count'] }},
                        {{ $paud_stats['kb_count'] }},
                        {{ $paud_stats['sps_count'] }}
                    ],
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} satuan (${percentage}%)`;
                            }
                        }
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: (value, context) => {
                            return value;
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Dasar Distribution Pie Chart with numbers
        const dasarCtx = document.getElementById('dasarDistributionChart').getContext('2d');
        new Chart(dasarCtx, {
            type: 'doughnut',
            data: {
                labels: ['SD ({{ $dasar_stats['sd_count'] }})', 'SMP ({{ $dasar_stats['smp_count'] }})'],
                datasets: [{
                    data: [
                        {{ $dasar_stats['sd_count'] }},
                        {{ $dasar_stats['smp_count'] }}
                    ],
                    backgroundColor: [
                        '#4BC0C0',
                        '#9966FF'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: (value, context) => {
                            return value;
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Completion Rate Bar Chart with numbers on bars
        const completionCtx = document.getElementById('completionRateChart').getContext('2d');
        new Chart(completionCtx, {
            type: 'bar',
            data: {
                labels: ['TK', 'KB', 'SPS', 'SD', 'SMP'],
                datasets: [{
                    label: 'Persentase Kelengkapan (%)',
                    data: [
                        {{ $completion_stats['tk_completion'] }},
                        {{ $completion_stats['kb_completion'] }},
                        {{ $completion_stats['sps_completion'] }},
                        {{ $completion_stats['sd_completion'] }},
                        {{ $completion_stats['smp_completion'] }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Persentase Kelengkapan (%)'
                        }
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        color: '#333',
                        font: {
                            weight: 'bold'
                        },
                        formatter: (value) => {
                            return value + '%';
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Facility Availability Chart with numbers
        const facilityCtx = document.getElementById('facilityAvailabilityChart').getContext('2d');
        new Chart(facilityCtx, {
            type: 'bar',
            data: {
                labels: ['Perpustakaan', 'Laboratorium', 'Fasilitas Olahraga', 'Akses Disabilitas', 'Ruang Kesehatan'],
                datasets: [{
                    label: 'Ketersediaan Fasilitas (%)',
                    data: [
                        {{ $facility_stats['library_available'] }},
                        {{ $facility_stats['lab_available'] }},
                        {{ $facility_stats['sports_facility'] }},
                        {{ $facility_stats['disabled_access'] }},
                        {{ $facility_stats['health_room'] }}
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.8)',
                    borderColor: 'rgb(54, 162, 235)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Persentase Ketersediaan (%)'
                        }
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'right',
                        color: '#333',
                        font: {
                            weight: 'bold'
                        },
                        formatter: (value) => {
                            return value + '%';
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    });
</script>
@endpush