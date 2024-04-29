@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pelanggan</h3>
        
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormPelanggan">
                Tambah pelanggan
            </button>
            <a href="{{ route('dd') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>
            <a href="{{ route('ss') }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
            <!-- Button trigger modal -->
            <!-- Button trigger modal -->
            <div class="mt-3">
                @include('pelanggan.data')
            </div>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>
    <!-- /.card -->

    @include('pelanggan.form')
</section>
@endsection

@push('scripts')
<script>
    $('#tbl-pelanggan').DataTable()
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
    $('#modalFormPelanggan').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const nama = btn.data('nama')
        const email = btn.data('email')
        const nomor_telepon = btn.data('nomor_telepon')
        const alamat = btn.data('alamat')

        const id = btn.data('id')
        const modal = $(this)
        console.log($(this))
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Pelanggan')
            modal.find('#nama').val(nama)
            modal.find('#email').val(email)
            modal.find('#nomor_telepon').val(nomor_telepon)
            modal.find('#alamat').val(alamat)
            modal.find('form').attr('action', '{{ url("pelanggan") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data Pelanggan')
            modal.find('#nama').val('')
            modal.find('#email').val('')
            modal.find('#nomor_telepon').val('')
            modal.find('#alamat').val('')
            modal.find('#method').html('')
            modal.find('form').attr('action', '{{ url("pelanggan") }}')
        }
    })
</script>
@endpush