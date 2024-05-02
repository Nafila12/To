@extends('tamplate.layout')

@section('content')
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Hari Ini</h5>
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="card mb-3">
                        <div class="card-body">
                            <a href="{{ url('menu') }}" class="text-decoration-none"><span>Data Menu</span></a>
                            <h3 class="card-title mb-2">{{$count_menu}}</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <a href="{{ url('stok') }}" class="text-decoration-none"><span>Data Stok</span></a>
                            <h3 class="card-title mb-2">{{$count_stok}}</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <a href="#" class="text-decoration-none"><span>Pendapatan</span></a>
                            <h4 class="card-title mb-2">{{$pendapatan}}</h4>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <a href="" class="text-decoration-none"><span>Data Transaksi</span></a>
                            <h3 class="card-title mb-2">{{$count_transaksi}}</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h4>Top 5 Penjualan</h4>
            </div>
            <div class="card-content pb-3">
                <div class="count">
                    @foreach ($most_ordered_menu as $menu => $count)
                    @php
                    $menuObject = \App\Models\Menu::where('nama_menu', $menu)->first();
                    @endphp
                    @if ($menuObject)
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/' . $menuObject->image) }}" alt="{{ $menuObject->nama_menu }}" class="mr-3" style="width: 50px; height: 50px;">
                        <div>
                            <p class="mb-1">{{ $menuObject->nama_menu }}</p>
                            <p class="mb-0"><strong>{{ $count }}</strong> terjual</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h4>Stok Terendah</h4>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($stokTerendah as $stok)
                <li class="list-group-item">
                    Nama Menu: {{ $stok->menu->nama_menu }} <br> Jumlah: {{ $stok->jumlah }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Pendapatan per Tanggal</h4>
            </div>
            <div class="card-body">
                <canvas id="pendapatanPerTanggalChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Mendapatkan data pendapatan per tanggal dari PHP
    var pendapatanPerTanggalData = {!! json_encode($pendapatan_per_tanggal) !!};

    // Memformat data untuk Chart.js
    var labels = [];
    var data = [];
    pendapatanPerTanggalData.forEach(function(item) {
        labels.push(item.tanggal);
        data.push(item.total_pendapatan);
    });

    // Menggambar grafik pendapatan per tanggal
    var ctx = document.getElementById('pendapatanPerTanggalChart').getContext('2d');
    var pendapatanPerTanggalChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan per Tanggal',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endpush
