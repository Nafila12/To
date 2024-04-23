@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Absen</h3>
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
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormAbsen">
                   Absensi karyawan
                </button>
                <!-- Button trigger modal -->
                <!-- Button trigger modal -->

                <a href="{{ route('pd-absen') }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>

            <a href="{{ route('xl-absen') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>
                <div class="mt-4">
                    @include('absen.data')
                </div>
            </div>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>
    <!-- /.card -->

    @include('absen.form')
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
        const data = $(this).closest('tr').find('td:eq(0)').text()
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
    $('#modalFormAbsen').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const nama_karyawan = btn.data('nama_karyawan')
        const tanggal_masuk = btn.data('tanggal_masuk')
        const waktu_masuk = btn.data('waktu_masuk')
        const status = btn.data('status')
        const waktu_keluar = btn.data('waktu_keluar')
        const id = btn.data('id')
        const modal = $(this)
        console.log($(this))
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Karyawan')
            modal.find('#nama_karyawan').val(nama_karyawan)
            modal.find('#tanggal_masuk').val(tanggal_masuk)
            modal.find('#waktu_masuk').val(waktu_masuk)
            modal.find('#status').val(status)
            modal.find('#waktu_keluar').val(waktu_keluar)
            modal.find('form').attr('action', '{{ url("absen") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data Absen')
            modal.find('#nama_karyawan').val('')
            modal.find('#tanggal_masuk').val('')
            modal.find('#waktu_masuk').val('')
            modal.find('#status').val('')
            modal.find('#waktu_keluar').val('')
            modal.find('#method').html('')
            modal.find('form').attr('action', '{{ url("absen") }}')
        }
    })
</script>
@endpush