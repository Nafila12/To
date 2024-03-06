@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Karyawan</h3>
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormKaryawan">
                    Tambah Karyawan
                </button>
                <!-- Button trigger modal -->
                <!-- Button trigger modal -->
                <div class="mt-4">
                    @include('karyawan.data')
                </div>
            </div>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>
    <!-- /.card -->

    @include('karyawan.form')
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
    $('#modalFormKaryawan').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const nip = btn.data('nip')
        const nik = btn.data('nik')
        const nama = btn.data('nama')
        const jenis_kelamin = btn.data('jenis_kelamin')
        const tempat_lahir = btn.data('tempat_lahir')
        const tanggal_lahir = btn.data('tanggal_lahir')
        const telpon = btn.data('telpon')
        const agama = btn.data('agama')
        const status_nikah = btn.data('status_nikah')
        const alamat = btn.data('alamat')
        const foto = btn.data('foto')
        const id = btn.data('id')
        const modal = $(this)
        console.log($(this))
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Karyawan')
            modal.find('#nip').val(nip)
            modal.find('#nik').val(nik)
            modal.find('#nama').val(nama)
            modal.find('#jenis_kelamin').val(jenis_kelamin)
            modal.find('#tempat_lahir').val(tempat_lahir)
            modal.find('#tanggal_lahir').val(tanggal_lahir)
            modal.find('#telpon').val(telpon)
            modal.find('#agama').val(agama)
            modal.find('#status_nikah').val(status_nikah)
            modal.find('#alamat').val(alamat)
            modal.find('#foto').val(foto)
            modal.find('form').attr('action', '{{ url("karyawan") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data Karyawan')
            modal.find('#nip').val('')
            modal.find('#nik').val('')
            modal.find('#nama').val('')
            modal.find('#jenis_kelamin').val('')
            modal.find('#tempat_lahir').val('')
            modal.find('#tanggal_lahir').val('')
            modal.find('#telpon').val('')
            modal.find('#agama').val('')
            modal.find('#status_nikah').val('')
            modal.find('#alamat').val('')
            modal.find('#foto').val('')
            modal.find('#method').html('')
            modal.find('form').attr('action', '{{ url("karyawan") }}')
        }
    })
</script>
@endpush