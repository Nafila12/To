<!-- Modal -->
<div class="modal fade" id="modalFormAbsen" tabindex="-1" aria-labelledby="absenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="karyawanModalLabel">Absen</h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="absen" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="nama_karyawan" class="col-sm-4 col-form-label">Nama karyawan</label>
                            <div class="input-form">
                                <input type="text" class="form-control" id="nama_karyawan" name='nama_karyawan'>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_masuk" class="col-sm-4 col-form-label">tanggal Masuk</label>
                            <div class="input-form">
                                <input type="date" class="form-control" id="tanggal_masuk" name='tanggal_masuk'>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="waktu_masuk" class="col-sm-4 col-form-label">waktu masuk</label>
                            <div class="input-form">
                                <input type="time" class="form-control" id="waktu_masuk" name='waktu_masuk'>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="input-form">
                                <input type="text" class="form-control" id="status" name='status'>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="waktu_keluar" class="col-sm-4 col-form-label">Waktu keluar</label>
                            <div class="input-form">
                                <input type="time" class="form-control" id="waktu_keluar" name='waktu_keluar'>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </div>
        </div>