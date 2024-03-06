<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-pemesanan">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Meja id</th>
            <th scope="col">Tanggal Pemesanan</th>
            <th scope="col">Jam Mulai</th>
            <th scope="col">jam Selesai</th>
            <th scope="col">Nama Pemesanan</th>
            <th scope="col">Jumlah pelanggan</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemesanan as $p)
            <tr>
                <th scope="row">{{ $i = !isset($i) ? 1 : ++$i }}</th>
                <td>{{ $p->meja_id }}</td>
                <td>{{ $p->tanggal_pemesanan }}</td>
                <td>{{ $p->jam_mulai }}</td>
                <td>{{ $p->jam_selesai }}</td>
                <td>{{ $p->nama_pemesanan}}</td>
                <td>{{ $p->jumlah_pelanggan }}</td>
                <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormPemesanan"
                        data-mode="edit" data-id="{{ $p->id }}" data-meja_id="{{ $p->meja_id }}"
                        data-tanggal_pemesanan="{{ $p->tanggal_pemesanan }}" data-jam_mulai="{{ $p->jam_mulai }}"
                        data-jam_selesai="{{ $p->jam_selesai }}" data-nama_pemesanan="{{ $p->nama_pemesanan }}"
                        data-jumlah_pelanggan="{{ $p->jumlah_pelanggan }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('pemesanan.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data" data-nama="{{ $p->nama }}">
                        <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script></script>