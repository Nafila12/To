<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-jenis">
    <thead>
        <tr>
            <th scope="col">No</th>
            <!-- <th scope="col">Kategory</th> -->
            <th scope="col">Jenis</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jeni as $p)
        <tr>
            <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
            <td>{{ $p->nama_jenis }}</td>
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormJenis" data-mode="edit" data-id="{{ $p->id }}" data-nama_jenis="{{ $p->nama_jenis }}">
                    <i class="fas fa-edit"></i>
                </button>
                <form method="post" action="{{ route('jenis.destroy', $p->id) }}" style="display: inline">
                    @csrf
                    <div id="method"></div>
                    @method(' DELETE') <button type="button" class="btn btn-danger delete-data" data-nama_jenis="{{ $p->nama_jenis }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script></script>