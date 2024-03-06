<table class="mt-2 table table-sm table-hover table-striped table-bordered" id="tbl-transaksi">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Metode Pembayaran</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp <!-- Inisialisasi variabel nomor baris -->
        @foreach ($transaksi as $t)
        <tr>
            <th scope="row">{{ $i++ }}</th> <!-- Penambahan nomor baris -->
            <td>{{ $t->tanggal }}</td>
            <td>{{ $t->total_harga }}</td>
            <td>{{ $t->metode_pembayaran }}</td>
            <td>{{ $t->keterangan }}</td>
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormTransaksi" data-mode="edit" data-id="{{ $t->id }}" data-tanggal="{{ $t->tanggal }}" data-total_harga="{{ $t->total_harga }}" data-metode_pembayaran="{{ $t->metode_pembayaran }}" data-keterangan="{{ $t->keterangan }}">
                    <i class="fas fa-edit"></i>
                </button>
                <form method="post" action="{{ route('transaksi.destroy', $t->id) }}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger delete-data" data-nama="{{ $t->nama }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Letakkan skrip JavaScript di bagian bawah -->
<script>

</script>
