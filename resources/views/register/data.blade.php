<table class="mt-2 table table-sm table-hover table-striped table-bordered" id="tbl-register">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp <!-- Inisialisasi variabel penomoran -->
        @foreach ($register as $p)
        <tr>
            <td scope="row">{{ $i++ }}</td> <!-- Penomoran baris -->
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->password }}</td>
           
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormRegister" data-mode="edit" data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}" data-nama_supplier="{{ $p->nama_supplier }}" data-harga_beli="{{ $p->harga_beli }}" data-harga_jual="{{ $p->harga_jual }}" data-stok="{{ $p->stok }}">
                    <i class="fas fa-edit"></i>
                </button>
                <form method="post" action="{{ route('produk_titipan.destroy', $p->id) }}" style="display: inline">
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
<script>
   