<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-pemesanan">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Menu Id</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stok as $s)
        <tr>
            <th scope="row">{{ $i = !isset($i) ? 1 : ++$i }}</th>
            <td>{{ $s->menu->nama_menu}}</td>
            <td>{{ $s->jumlah }}</td>
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormStok" data-mode="edit" data-id="{{ $s->id }}" data-menu_id="{{ $s->menu_id }}" data-jumlah="{{ $s->jumlah }}">
                    <i class="fas fa-edit"></i>
                </button>
                <form method="post" action="{{ route('stok.destroy', $s->id) }}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger delete-data" data-nama="{{ $s->nama }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script></script>