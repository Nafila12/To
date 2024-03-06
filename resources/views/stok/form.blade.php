<!-- Modal -->
<div class="modal fade" id="modalFormStok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="stok" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <div class="mb-3 row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Nama Menu</label>
                        <div class="col-sm-8">
                            <select name="menu_id" id="menu_id" class="form-select">
                                <option value="" selected disabled>Pilih Menu</option>
                                @foreach ($menu as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_menu }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <label for="jumlah" class="col-sm-4 col-form-label">jumlah</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jumlah" name='jumlah'>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>
