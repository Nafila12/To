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
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Menu</label>
                        <div class="col-sm-8">
                            <select class="form-select" name="menu_id" id="menu_id">
                                <option value="" disabled>- Pilih -</option>
                                @foreach ($menu as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_menu }}</option>
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