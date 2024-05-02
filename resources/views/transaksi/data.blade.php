<table class="table table-compact table-striped" id="tbl-laporan">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Transaksi</th>
            <th>Detail Transaksi</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->id }}</td>
            <td>
                @foreach($item->detailTransaksi as $detail)
                @if ($detail->menu)
                <p>Nama: {{ $detail->menu->nama_menu }}</p>
                <p>Qty: {{ $detail->jumlah }}</p>
                <p>Subtotal: {{ $detail->subtotal }}</p>
                <hr>
                @else
               
                @endif
                @endforeach

            </td>
            <td>{{ $item->total_harga }}</td>
        </tr>
        @endforeach
    </tbody>
</table>