<!-- Modal -->
<div class="modal fade" id="modalFormMeja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan Meja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="meja">
                    <div id="method"></div>
                    @csrf
                    <label for="nomor_meja" class="col-sm-8 col-form-label">Nomor Meja</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="nomor_meja" name='nomor_meja'>
                    </div>

                    <label for="kapasitas" class="col-sm-8 col-form-label">Kapasitas</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="kapasitas" name='kapasitas'>
                    </div>

                    <label for="status" class="col-sm-8 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="status" name='status'>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>
</div>