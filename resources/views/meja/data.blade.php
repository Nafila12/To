<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-meja">
      <thead>
          <tr>
              <th scope="col">No</th>
              <th scope="col">Nomor Meja</th>
              <th scope="col">Kapasitas</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($meja as $m)
          <tr>
              <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
              <td>{{ $m->nomor_meja }}</td>
              <td>{{ $m->kapasitas }}</td>
              <td>{{ $m->status }}</td>
              <td>
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormMeja"
                        data-mode="edit" data-id="{{ $m->id }}" data-nomor_meja="{{ $m->nomor_meja }}"
                        data-kapasitas="{{ $m->kapasitas }}" data-status="{{ $m->status }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('meja.destroy', $m->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data" data-nomor_meja="{{ $m->nomor_meja }}">
                        <i class="fas fa-trash"></i>
                        </button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  <script></script>