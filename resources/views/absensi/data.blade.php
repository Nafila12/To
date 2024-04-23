<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-absensi">
      <thead>
          <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Karyawan</th>
              <th scope="col">Tanggal Masuk</th>
              <th scope="col">Waktu Masuk</th>
              <th scope="col">Status</th>
              <th scope="col">waktu selesai kerja</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($absensi as $m)
          <tr>
              <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
              <td>{{ $m->nama_karyawan }}</td>
              <td>{{ $m->tanggal_masuk }}</td>
              <td>{{ $m->waktu masuk }}</td>
              <td>{{ $m->status }}</td>
              <td>{{ $m->waktu_keluar }}</td>
              <td>
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormAbsensi"
                        data-mode="edit" data-id="{{ $m->id }}" data-nama_karyawan="{{ $m->nama_karyawan }}"
                        data-tanggal_masuk="{{ $m->tanggal_masuk }}"  data-waktu_masuk="{{ $m->waktu_masuk }}" data-status="{{ $m->status }}" data-waktu_keluar="{{ $m->waktu_keluar }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="{{ route('absensu.destroy', $m->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data" data-nama_karyawan="{{ $m->nama_karyawan }}">
                        <i class="fas fa-trash"></i>
                        </button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  <script></script>