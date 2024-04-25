<!-- Modal
<div class="modal fade" id="modalFormTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="transaksi" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <label for="total_harga" class="col-sm-4 col-form-label">Total Harga</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="total_harga" name='total_harga'>
                    </div>

                    <label for="metode_pembayaran" class="col-sm-4 col-form-label">metode Pembayaran</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="metode_pembayaran" name='metode_pembayaran'>
                    </div>

                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="keterangan" name='keterangan'>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div> -->