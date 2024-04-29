@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Menu</h3>
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

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormMenu">
                Tambah menu
            </button>
            <a href="{{ route('tidak') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Export XSLX
            </a>
            <a href="{{ route('aku') }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalImport">
                <i class="fas fa-file-excel"></i> Import
            </button>

            <!-- Button trigger modal -->
            <!-- Button trigger modal -->
            <div class="mt-3">
                @include('menu.data')
            </div>
        </div>
    </div>
    <!-- /.card -->

    @include('menu.form')
</section>
@endsection

@push('scripts')
<script>
    $('#tbl-menu').DataTable()
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
    $('#modalFormMenu').on('show.bs.modal', function(e) {
                    const btn = $(e.relatedTarget)
                    console.log(btn.data('mode'))
                    const mode = btn.data('mode')
                    const nama_menu = btn.data('nama_menu')
                    const jenis_id = btn.data('jenis_id')
                    const harga = btn.data('harga')
                    const image = btn.data('image')
                    const deskripsi = btn.data('deskripsi')
                    const id = btn.data('id')
                    const modal = $(this)
                    if (mode === 'edit') {
                        modal.find('.modal-title').text('Edit Data Menu')
                        modal.find('#nama_menu').val(nama_menu)
                        modal.find('#jenis_id').val(jenis_id)
                        modal.find('#harga').val(harga)
                        // modal.find('#image').val(image)
                        modal.find('#deskripsi').val(deskripsi)
                        modal.find('.modal-body form').attr('action', '{{ url("menu") }}/' + id)
                        modal.find('#method').html('@method("PATCH")')
                        console.log(nama_menu)

                    } else {
                        modal.find('.modal-title').text('Input Data Menu')
                        modal.find('#nama_menu').val('')
                        modal.find('#jenis_id').val('')
                        modal.find('#harga').val('')
                        // modal.find('#image').val('')
                        modal.find('#deskripsi').val('')
                        modal.find('#method').html('')
                        modal.find('.modal-body form').attr('action', '{{ url("menu") }}')
                    }
                })
</script>
@endpush