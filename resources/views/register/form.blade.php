<!-- Modal -->
<div class="modal fade" id="modalFormRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            
            <div class="modal-body">
                <form method="post" action="Produk Titipan">
                    <div id="method"></div>
                    @csrf
                    
                    <label for="nama" class="col-sm-8 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name='nama'>
                    </div>

                    <label for="email" class="col-sm-8 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name='email'>
                    </div>

                    <label for="password" class="col-sm-8 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="password" name='password'>
                    </div>
                    
                    <label for="lavel" class="col-sm-8 col-form-label">lavel</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lavel" name='lavel'>
                    </div>
                    
                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function hitungHargaJual() {
        var hargaBeli = parseFloat(document.getElementById('harga_beli').value);
        var keuntungan = hargaBeli * 1.7;
        var hargaJual = Math.ceil(keuntungan / 500) * 500;
        document.getElementById('harga_jual').value = hargaJual.toFixed(2);
    }

</script>



{{-- modal untuk import --}}
<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data produk titipan</h5> <button type="button"
                    class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('import-produk_titipan') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="produk_titipan">File Excel</label>
                            <input type="file" name="import" id="import">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btn-submit">Uploads</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
