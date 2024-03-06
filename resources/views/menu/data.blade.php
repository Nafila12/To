<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-menu">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Jenis Id</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Image</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($menu as $p)
        <tr>
            <th scope="row">{{ $i = !isset($i) ? 1 : ++$i }}</th>
            <td>{{ $p->jenis_id}}</td>
            <td>{{ $p->nama_menu }}</td>
            <td>{{ $p->harga }}</td>
            <td><img width="70px" src="{{ asset('images') }}/{{ $p->image }}" alt="" srcset=""></td>
            <td>{{ $p->deskripsi}}</td>
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormMenu" data-mode="edit" data-id="{{ $p->id }}" data-jenis_id="{{ $p->jenis_id}}" data-nama_menu="{{ $p->nama_menu }}" data-harga="{{ $p->harga }}" data-image="{{ $p->image }}" data-deskripsi="{{ $p->deskripsi }}">
                    <i class="fas fa-edit"></i>
                </button>
                <form method="post" action="{{ route('menu.destroy', $p->id) }}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger delete-data" data-nama_menu="{{ $p->nama_menu}}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script></script>