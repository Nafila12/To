<table class="mt-2 table table-sm table-hover table-striped table-bordered" id="tbl-transaksi">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Metode Pembayaran</th>
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
        </tr>
        @endforeach
    </tbody>
</table>

<style>
    /* Gaya untuk tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
        font-family: Arial, sans-serif;
        margin-top: 20px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 2px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* Gaya untuk baris ganjil */
    tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    /* Gaya untuk baris saat diklik/hover */
    tr:hover {
        background-color: #f1f1f1;
    }
</style>


<!-- Letakkan skrip JavaScript di bagian bawah -->
<script>

</script>