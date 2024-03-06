<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-pelanggan">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">Alamat</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $p)
            <tr>
            <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
              <td>{{ $p->nama }}</td>
              <td>{{ $p->email }}</td>
              <td>{{ $p->nomor_telepon }}</td>
              <td>{{ $p->alamat }}</td>
            <td> 
    
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormPelanggan"
                        data-mode="edit" data-id="{{ $p->id }}" data-nama="{{ $p->nama }}"
                        data-email="{{ $p->email }}" data-nomor_telepon="{{ $p->nomor_telepon }}"
                        data-alamat="{{ $p->alamat }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('pelanggan.destroy', $p->id) }}" style="display: inline">
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