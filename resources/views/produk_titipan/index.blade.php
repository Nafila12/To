@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Produk Titipan</h3>

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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormProdukTitipan">
                Tambah Produk
            </button>
            <a href="{{ route('xl-pt') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Export XSLX
            </a>
            <a href="{{ route('xl-pdf') }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formImport">
                <i class="fas fa-cloud-upload"></i>Import
            </button>

            <div class="mt-3">
                @include('produk_titipan.data')
            </div>
        </div>
        <!-- /.card -->
    </div>

    @include('produk_titipan.form')
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
    $(document).ready(function() {
        // Fungsi untuk menghitung harga jual otomatis saat input harga beli diubah
        $('#harga_beli').on('input', function() {
            var hargaBeli = $(this).val();
            var keuntungan = hargaBeli * 1.7;
            var hargaJual = Math.ceil(keuntungan / 500) * 500;
            $('#harga_jual').val(hargaJual);
        });
        $('#modalFormProdukTitipan').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_produk = btn.data('nama_produk')
            const nama_supplier = btn.data('nama_supplier')
            const harga_beli = btn.data('harga_beli')
            const harga_jual = btn.data('harga_jual')
            const stok = btn.data('stok')

            const id = btn.data('id')
            const modal = $(this)
            console.log($(this))
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data produk titipan')
                modal.find('#nama_produk').val(nama_produk)
                modal.find('#nama_supplier').val(nama_supplier)
                modal.find('#harga_beli').val(harga_beli)
                modal.find('#harga_jual').val(harga_jual)
                modal.find('#stok').val(stok)
                modal.find('form').attr('action', '{{ url("produk_titipan") }}/' + id)
                modal.find('#method').html('@method("PATCH")')
            } else {
                modal.find('.modal-title').text('Input Data produk titipan')
                modal.find('#nama_produk').val('')
                modal.find('#nama_supplier').val('')
                modal.find('#harga_beli').val('')
                modal.find('#harga_jual').val('')
                modal.find('#stok').val('')
                modal.find('#method').html('')
                modal.find('form').attr('action', '{{ url("produk_titipan") }}')
            }
        })
    });
</script>
@endpush