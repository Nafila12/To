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
    $(document).ready(function() {
        $('#tbl-pelanggan').DataTable();
        
        // Fade out success and error alerts after 2 seconds
        $('.alert-success').delay(2000).fadeOut(500);
        $('.alert-danger').delay(2000).fadeOut(500);

        // Delete data confirmation using SweetAlert
        $('.delete-data').on('click', function(e) {
            e.preventDefault();
            const nama = $(this).data('nama');
            const form = $(this).closest('form');
            Swal.fire({
                title: `Apakah Anda yakin ingin menghapus ${nama}?`,
                text: "Data tidak bisa dikembalikan setelah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // Populate form data in modal for editing
        $('#modalFormPelanggan').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget);
            const mode = btn.data('mode');
            const modal = $(this);
            const id = btn.data('id');
            const nama = btn.data('nama');
            const email = btn.data('email');
            const nomor_telepon = btn.data('nomor_telepon');
            const alamat = btn.data('alamat');

            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Pelanggan');
                modal.find('#nama').val(nama);
                modal.find('#email').val(email);
                modal.find('#nomor_telepon').val(nomor_telepon);
                modal.find('#alamat').val(alamat);
                modal.find('form').attr('action', `{{ url("pelanggan") }}/${id}`);
                modal.find('#method').html('@method("PATCH")');
            } else {
                modal.find('.modal-title').text('Input Data Pelanggan');
                modal.find('#nama').val('');
                modal.find('#email').val('');
                modal.find('#nomor_telepon').val('');
                modal.find('#alamat').val('');
                modal.find('#method').html('');
                modal.find('form').attr('action', `{{ url("pelanggan") }}`);
            }
        });
    });
</script>

@endpush