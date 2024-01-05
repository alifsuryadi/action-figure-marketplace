@extends('layouts.admin') 

@section('title') 
    Dashboard Admin
@endsection

@section('content')
<section class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Administrator</h2>
            <p class="dashboard-subtitle">
                Ini adalah Panel Administrator
            </p>
        </div>
        <!-- Dashboard content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Total Pengguna</div>
                            <div class="dashboard-card-subtitle">
                                {{ $costumer }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Total Transaksi</div>
                            <div class="dashboard-card-subtitle">
                                Rp {{ number_format($revenue) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaksi Dilakukan</div>
                            <div class="dashboard-card-subtitle">
                                {{ $transaction }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-header">Grafik Transaksi Harian </div>
                        <div class="card-body">
                            <div id="grafik"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('addon-script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var pendapatan = <?php echo json_encode($total_price) ?>;
        var tanggal = <?php echo json_encode($tanggal) ?>;

        Highcharts.chart('grafik', {
            title : {
                text : 'Grafik Transaksi Harian'
            },
            xAxis : {
                categories : tanggal
            },
            yAxis : {
                title : {
                    text : 'Nominal Transaksi Harian'
                }
            },
            plotOptions : {
                series : {
                    allowPointSelect : true
                }
            },
            series : [
                {
                    name : 'Nominal Transaksi',
                    data : pendapatan

                }
            ]
        });
    </script>
@endpush

