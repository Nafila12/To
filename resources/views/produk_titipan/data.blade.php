<table class="mt-2 table table-sm table-hover table-striped table-bordered" id="tbl-produk_titipan">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Nama Supplier</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Stok</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp <!-- Inisialisasi variabel penomoran -->
        @foreach ($produk_titipan as $p)
        <tr>
            <td scope="row">{{ $i++ }}</td> <!-- Penomoran baris -->
            <td>{{ $p->nama_produk }}</td>
            <td>{{ $p->nama_supplier }}</td>
            <td>{{ $p->harga_beli }}</td>
            <td>{{ $p->harga_jual }}</td>
            <td>{{ $p->stok }}</td>
            <!-- <td class="editable" data-id="{{ $p->id }}" contenteditable="true">{{ $p->stok }}</td> -->
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormProdukTitipan" data-mode="edit" data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}" data-nama_supplier="{{ $p->nama_supplier }}" data-harga_beli="{{ $p->harga_beli }}" data-harga_jual="{{ $p->harga_jual }}" data-stok="{{ $p->stok }}">
                    <i class="fas fa-edit"></i>
                </button>
                <form method="post" action="{{ route('produk_titipan.destroy', $p->id) }}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger delete-data" data-nama_produk="{{ $p->nama_produk }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     // Mendapatkan semua elemen dengan kelas "editable"
    //     var editableCells = document.querySelectorAll('.editable');

    //     // Menambahkan event listener untuk setiap sel yang dapat diedit
    //     editableCells.forEach(function(cell) {
    //         cell.addEventListener('click', function(e) {
    //             // Hanya lanjutkan jika sel belum dalam mode pengeditan
    //             if (!cell.classList.contains('editing')) {
    //                 // Simpan nilai awal
    //                 var oldValue = this.textContent.trim();

    //                 // Buat elemen input baru
    //                 var inputElement = document.createElement('input');
    //                 inputElement.type = 'number';
    //                 inputElement.value = oldValue;

    //                 // Ganti sel dengan input
    //                 this.innerHTML = ''; // Kosongkan konten sel
    //                 this.appendChild(inputElement); // Tambahkan elemen input ke dalam sel
    //                 inputElement
    //                     .focus(); // Fokuskan input agar langsung dapat dimasuki nilai baru

    //                 // Tambahkan class editing ke sel untuk menunjukkan bahwa sedang dalam mode pengeditan
    //                 cell.classList.add('editing');

    //                 // Event listener untuk menangani penekanan tombol Enter
    //                 inputElement.addEventListener('keypress', function(e) {
    //                     if (e.key === 'Enter') {
    //                         e.preventDefault(); // Mencegah perilaku default
    //                         endEdit(this, oldValue); // Selesai mengedit
    //                     }
    //                 });

    //                 // Event listener untuk menangani kehilangan fokus dari input
    //                 inputElement.addEventListener('blur', function() {
    //                     endEdit(this, oldValue); // Selesai mengedit
    //                 });
    //             }
    //         });
    //     });

    //     function endEdit(inputElement, oldValue) {
    //         var newValue = inputElement.value.trim();
    //         var cell = inputElement.parentElement; // Sel tempat input berada

    //         // Hapus mode editing
    //         cell.classList.remove('editing');

    //         // Jika nilai baru tidak valid atau sama dengan nilai lama, kembalikan nilai lama
    //         if (isNaN(newValue) || newValue === '' || newValue === oldValue) {
    //             cell.textContent = oldValue; // Gunakan nilai lama
    //         } else {
    //             // Perbarui nilai dan panggil fungsi untuk menyimpan perubahan
    //             cell.textContent = newValue;
    //             var productId = cell.getAttribute('data-id');
    //             updateStok(productId, newValue);
    //         }
    //     }

    //     async function updateStok(productId, newStok) {
    //         // Periksa apakah nilai stok baru tidak kosong dan productId adalah angka
    //         if (newStok !== '' && !isNaN(productId)) {
    //             try {
    //                 const response = await fetch(`/produk_titipan/${productId}/update-stok`, {
    //                     method: 'POST',
    //                     headers: {
    //                         'Content-Type': 'application/x-www-form-urlencoded',
    //                         'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //                     },
    //                     body: `stok=${newStok}`
    //                 });

    //                 if (!response.ok) {
    //                     const errorMessage = await response.text();
    //                     throw new Error(`Gagal memperbarui stok: ${errorMessage}`);
    //                 }

    //                 window.location.reload();
    //             } catch (error) {
    //                 console.error(error.message || 'Terjadi kesalahan saat melakukan permintaan');
    //             }
    //         } else {
    //             console.error('Nilai stok baru tidak valid atau ID produk tidak valid');
    //         }
    //     }
    // });
</script>