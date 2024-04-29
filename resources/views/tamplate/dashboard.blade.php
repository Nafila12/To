@extends('tamplate.layout')

@push('style')
@endpush

@section('content')

<div class="col-lg-6 col-md-12 col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                </div>
            </div>
            <div>

                <h3 class="card-title mt-3">{{$count_menu}}</h3>
                <a href="{{ url('menu') }}" class="text-decoration-none"><span>Data Menu</span></a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-12 col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                </div>
            </div>
            <div>

                <h3 class="card-title mt-3">{{$count_stok}}</h3>
                <a href="{{ url('stok') }}" class="text-decoration-none"><span>Data Stok</span></a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush