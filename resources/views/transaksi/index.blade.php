@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Transaksi</h3>
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormTransaksi">
                Tambah Transaksi
            </button>
            <!-- Button trigger modal -->
            <div class="mt-3 p-4">
                @include('transaksi.data')
            </div>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>
    <!-- /.card -->
    @include('transaksi.form')
</section>
@endsection

@push('scripts')
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
        const data = $(this).closest('tr').find('td:eq(2)').text()
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
    $('#modalFormTransaksi').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const tanggal = btn.data('tanggal')
        const total_harga = btn.data('total_harga')
        const metode_pembayaran = btn.data('metode_pembayaran')
        const keterangan = btn.data('keterangan')

        const id = btn.data('id')
        const modal = $(this)
        console.log($(this))
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Transaksi')
            modal.find('#tanggal').val(tanggal)
            modal.find('#total_harga').val(total_harga)
            modal.find('#metode_pembayaran').val(metode_pembayaran)
            modal.find('#keterangan').val(keterangan)
            modal.find('form').attr('action', '{{ url("transaksi") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data Transaksi')
            modal.find('#tanggal').val('')
            modal.find('#total_harga').val('')
            modal.find('#metode_pembayaran').val('')
            modal.find('#keterangan').val('')
            modal.find('#method').html('')
            modal.find('form').attr('action', '{{ url("transaksi") }}')
        }
    })
</script>
@endpush
