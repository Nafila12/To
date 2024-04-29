@extends('tamplate.layout')

@push('style')
@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Jenis</h3>
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormJenis">
                Pilih pesanan
            </button>
            <a href="{{ route('nama') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Export XSLX
            </a>

            <a href="{{ route('dino') }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#formImport">
                            <i class="fas fa-cloud-upload"></i>Import
                 </button>
            <div class="mt-3">
                @include('jenis.data')
            </div>
        </div>
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card -->
    </div>

    @include('jenis.form')
</section>
@endsection

@push('scripts')
<script>
    $('#tbl-jenis').DataTable()
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
    $('#modalFormJenis').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        // const kategory_id = btn.data('kategory_id')
        const nama_jenis = btn.data('nama_jenis')
        const id = btn.data('id')
        const modal = $(this)
        console.log($(this))
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data jenis')
            // modal.find('#kategory_id').val(kategory_id)
            modal.find('#nama_jenis').val(nama_jenis)
            modal.find('form').attr('action', '{{ url("jenis") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data jenis')
            // modal.find('#kategory_id').val('')
            modal.find('#nama_jenis').val('')
            modal.find('#method').html('')
            modal.find('form').attr('action', '{{ url("jenis") }}')
        }
    })
</script>
@endpush