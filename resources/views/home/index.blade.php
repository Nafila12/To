@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card bg-light">
        <div class="card-body">
            <div class="jumbotron">
                <p class="lead">Web Cashier Sapi</p>
                <hr class="my-4">
                <p>Klik Untuk lihat pesanan</p>
                <a class="btn btn-primary btn-lg" href="/menu" role="button">menu</a>
            </div>
        </div>
    </div>


</section>
@endsection

@push('scripts')
@endpush

<style>
    .animated-text {
        opacity: 0;
        animation: fadeInText 1s ease infinite;
    }

    @keyframes fadeInText {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .animated-text:nth-child(1) {
        animation-delay: 0s;
    }

    .animated-text:nth-child(2) {
        animation-delay: 0.1s;
    }

    .animated-text:nth-child(3) {
        animation-delay: 0.2s;
    }

    /* Add delay to other letters accordingly */
</style>