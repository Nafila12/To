<!-- Modal -->
<div class="modal fade" id="modalFormPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="pelanggan" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type= "text" class="form-control" id="nama" name='nama'>
                    </div>

                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type= "text" class="form-control" id="email" name='email'>
                    </div>

                    <label for="nomor_telepon" class="col-sm-4 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-8">
                        <input type= "text" class="form-control" id="nomor_telepon" name='nomor_telepon'>
                    </div>

                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type= "text" class="form-control" id="alamat" name='alamat'>
                    </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </div>
        </div>
