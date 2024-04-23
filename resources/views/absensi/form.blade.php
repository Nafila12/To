<!-- Modal -->
<div class="modal fade" id="modalFormAbsensi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="absensi">
                    <div id="method"></div>
                    @csrf
                    <label for="nama_karyawan" class="col-sm-8 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-8">
                        <input type="string" class="form-control" id="nama_karyawan" name='nama_karyawan'>
                    </div>

                    <label for="tanggal_masuk" class="col-sm-8 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="tanggal_masuk" name='tanggal_masuk'>
                    </div>

                    <label for="waktu_masuk " class="col-sm-8 col-form-label">Waktu masuk</label>
                    <div class="col-sm-8">
                        <input type="string" class="form-control" id="waktu_masuk" name='waktu_masuk'>
                    </div>
                    
                    <label for="status " class="col-sm-8 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <input type="string" class="form-control" id="status" name='status'>
                    </div>

                    <label for="waktu_keluar " class="col-sm-8 col-form-label">Waktu Keluar</label>
                    <div class="col-sm-8">
                        <input type="string" class="form-control" id="waktu_keluar" name='waktu_keluar'>
                    </div>
                    
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>