<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-karyawan">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nip</th>
            <th scope="col">Nik</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Telpon</th>
            <th scope="col">Agama</th>
            <th scope="col">Status Nikah</th>
            <th scope="col">Alamat</th>
            <th scope="col">foto</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($karyawan as $p)
            <tr>
                <th scope="row">{{ $i = !isset($i) ? 1 : ++$i }}</th>
                <td>{{ $p->nip }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->tempat_lahir }}</td>
                <td>{{ $p->tanggal_lahir }}</td>
                <td>{{ $p->telpon }}</td>
                <td>{{ $p->agama }}</td>
                <td>{{ $p->status_nikah }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->foto }}</td>
                <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormKaryawan"
                        data-mode="edit" data-id="{{ $p->id }}" data-nip="{{ $p->nip }}"
                        data-nik="{{ $p->nik }}" data-nama="{{ $p->nama }}"
                        data-jenis_kelamin="{{ $p->jenis_kelamin }}" data-tempat_lahir="{{ $p->tempat_lahir }}"
                        data-tanggal_lahir="{{ $p->tanggal_lahir }}" data-telpon="{{ $p->telpon }}"
                        data-agama="{{ $p->agama }}" data-status_nikah="{{ $p->status_nikah }}"
                        data-alamat="{{ $p->alamat }}" data-foto="{{ $p->foto }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('karyawan.destroy', $p->id) }}" style="display: inline">
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