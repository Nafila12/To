<!-- Modal -->
<div class="modal fade" id="modalFormPemesanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="pemesanan" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <label for="meja_id" class="col-sm-4 col-form-label">Meja Id</label>
                    <div class="col-sm-8">
                        <input type= "text" class="form-control" id="meja_id" name='meja_id'>
                    </div>

                    <label for="tanggal_pemesanan" class="col-sm-4 col-form-label">Tanggal Pemesanan</label>
                    <div class="col-sm-8">
                        <input type= "text" class="form-control" id="tanggal_pemesanan" name='tanggal_pemesanan'>
                    </div>

                    <label for="jam_mulai" class="col-sm-4 col-form-label"> Jam Mulai</label>
                    <div class="col-sm-8">
                        <input type= "time" class="form-control" id="jam_mulai" name='jam_mulai'>
                    </div>

                    <label for="jam_selesai" class="col-sm-4 col-form-label">jam selesai</label>
                    <div class="col-sm-8">
                        <input type= "time" class="form-control" id="jam_selesai" name='jam_selesai'>
                    </div>

                    <label for="nama_pemesanan" class="col-sm-4 col-form-label">Nama Pemesanan</label>
                    <div class="col-sm-8">
                        <input type= "text" class="form-control" id="nama_pemesanan" name='nama_pemesanan'>
                    </div>

                    <label for="jumlah_pelanggan" class="col-sm-4 col-form-label">Jumlah Pelanggan</label>
                    <div class="col-sm-8">
                        <input type= "text" class="form-control" id="jumlah_pelanggan" name='jumlah_pelanggan'>
                    </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </div>
        </div>
