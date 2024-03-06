<div class="modal fade" id="modalFormMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal fade" id="modalFormMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="menu" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <div class="mb-3 row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Jenis ID</label>
                        <div class="col-sm-8">
                            <select name="jenis_id" id="jenis_id" class="form-select">
                                <option value="" selected disabled>Pilih Jenis</option>
                                @foreach($jenis as $j)
                                <option value="{{ $j->id }}">{{$j->nama_jenis}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_menu" class="col-sm-4 col-form-label">Nama Menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_menu" name='nama_menu'>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="harga" name='harga'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fileInput" class="col-sm-4 col-form-label">Pilih Gambar</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="image" value="" name="image">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="deskripsi" name='deskripsi'></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

            <div class="modal-body">
                <form method="post" action="menu" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <div class="mb-3 row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Jenis ID</label>
                        <div class="col-sm-8">
                            <select name="jenis_id" id="jenis_id" class="form-select">
                                <option value="" selected disabled>Pilih Jenis</option>
                                @foreach($jenis as $j)
                                <option value="{{ $j->id }}">{{$j->nama_jenis}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_menu" class="col-sm-4 col-form-label">Nama Menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_menu" name='nama_menu'>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="harga" name='harga'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fileInput" class="col-sm-4 col-form-label">Pilih Gambar</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="image" value="" name="image">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="deskripsi" name='deskripsi'></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
