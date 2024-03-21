@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Meja</h3>

        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            //pengkondisian
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormMeja">
                Tambah Pesanan Meja
            </button>
            <a href="{{ route('pd-meja') }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
            <a href="{{ route('xl-meja') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>
            <div class="mt-3">
                @include('meja.data')
            </div>
        </div>
        <!-- /.card -->
    </div>

    @include('meja.form')
    //buat 
</section>
@endsection

@push('scripts')
//stack memandakan script atau style//
<script>
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    })
    $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-danger').slideUp(500)
    })
    console.log($('.btn-danger'))
    $('.delete-data').on('click', function(e) {
        console.log(e)
        e.preventDefault()
        const data = $(this).closest('tr').find('td:eq(1)').text()
        Swal.fire({
            title: `Apakah data <span style="color:red">${data}</span> akan dihapus?`,
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data ini!'
        }).then((result) => {
            if (result.isConfirmed)
                $(e.target).closest('form').submit()
            else swal.close()
        })
    })
    $('#modalFormMeja').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const nomor_meja = btn.data('nomor_meja')
        const kapasitas = btn.data('kapasitas')
        const status = btn.data('status')
        const id = btn.data('id')
        const modal = $(this)
        console.log($(this))
        if (mode === 'edit') { 
            //jika mode edit maka menjalankan 
            modal.find('.modal-title').text('Edit Data Meja')
            modal.find('#nomor_meja').val(nomor_meja)
            modal.find('#kapasitas').val(kapasitas)
            //semua ini
            modal.find('#status').val(status)
            modal.find('form').attr('action', '{{ url("meja") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data Meja')
            modal.find('#nomor_meja').val('')
            modal.find('#kapasitas').val('')
            modal.find('#status').val('')
            modal.find('#method').html('')
            modal.find('form').attr('action', '{{ url("meja") }}')
        }
    })
</script>
@endpush