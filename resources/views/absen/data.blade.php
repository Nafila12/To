<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-absen">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Karyawan</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Waktu Masuk</th>
            <th scope="col">status</th>
            <th scope="col">waktu keluar</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absen as $p)
            <tr>
                <th scope="row">{{ $i = !isset($i) ? 1 : ++$i }}</th>
                <td>{{ $p->nama_karyawan }}</td>
                <td>{{ $p->tanggal_masuk }}</td>
                <td>{{ $p->waktu_masuk }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->waktu_keluar }}</td>
                <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormAbsen"
                        data-mode="edit" data-id="{{ $p->id }}"  data-nama_karyawan="{{ $p->nama_karyawan }}"
                        data-tanggal_masuk="{{ $p->tanggal_masuk }}" data-waktu_masuk="{{ $p->waktu_masuk }}"
                        data-status="{{ $p->status }}" data-waktu_keluar="{{ $p->waktu_keluar }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('absen.destroy', $p->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data" data-nama_karyawan="{{ $p->nama_karyawan}}">
                        <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script></script>