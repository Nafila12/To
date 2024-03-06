<!-- Modal -->
<div class="modal fade" id="modalFormKaryawan" tabindex="-1" aria-labelledby="karyawanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="karyawanModalLabel">Tambah Karyawan</h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="karyawan" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <div class="mb-3">
                        <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                        <div class="input-form">
                            <input type="number" class="form-control" id="nip" name='nip'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                        <div class="input-form">
                            <input type="number" class="form-control" id="nik" name='nik'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="input-form">
                            <input type="text" class="form-control" id="nama" name='nama'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="col-sm-4 col-form-label">jenis Kelamin</label>
                        <div class="input-form">
                            <select class="form-control" id="jenis_kelamin" name='jenis_kelamin'>
                                <option value="P">Perempuan</option>
                                <option value="L">Laki-Laki</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                        <div class="input-form">
                            <input type="text" class="form-control" id="tempat_lahir" name='tempat_lahir'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="input-form">
                            <input type="date" class="form-control" id="tanggal_lahir" name='tanggal_lahir'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="telpon" class="col-sm-4 col-form-label">Telepon</label>
                        <div class="input-form">
                            <input type="number" class="form-control" id="telpon" name='telpon'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                        <div class="input-form">
                            <input type="text" class="form-control" id="agama" name='agama'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status_nikah" class="col-sm-4 col-form-label">Status Nikah</label>
                        <div class="input-form">
                            <input type="text" class="form-control" id="status_nikah" name='status_nikah'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="input-form">
                            <input type="text" class="form-control" id="alamat" name='alamat'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                        <div class="input-form">
                            <input type="text" class="form-control" id="foto" name='foto'>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>