<table class="mt-2 table table-sm table-hover table-striped table-bordered" id="tbl-produk_titipan">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Nama Supplier</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Stok</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp <!-- Inisialisasi variabel penomoran -->
        @foreach ($produk_titipan as $p)

        <tr>
            <td scope="row">{{ $i++ }}</td> <!-- Penomoran baris -->
            <td>{{ $p->nama_produk }}</td>
            <td>{{ $p->nama_supplier }}</td>
            <td>{{ $p->harga_beli }}</td>
            <td>{{ $p->harga_jual }}</td>
            <td>{{ $p->stok }}</td>
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormProdukTitipan" data-mode="edit" data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}" data-nama_supplier="{{ $p->nama_supplier }}" data-harga_beli="{{ $p->harga_beli }}" data-harga_jual="{{ $p->harga_jual }}" data-stok="{{ $p->stok }}">
                    <i class="fas fa-edit"></i>
                </button>
                <form method="post" action="{{ route('produk_titipan.destroy', $p->id) }}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger delete-data" data-nama_produk="{{ $p->nama_produk }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
</script>