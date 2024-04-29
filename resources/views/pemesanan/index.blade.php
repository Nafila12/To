@extends('tamplate.layout')

@push('style')

@endpush

@section('content')
<section class="content">
    <main id="main" class="main">
        <div class="c">
            <div class="pagetitle">
                <h1>Pemesanan</h1>

            </div><!-- End Page Title -->

            <div class="container">
                {{-- <div class="item header">Header</div> --}}
                <div class="item">
                    <ul class="menu-container">
                        @foreach ($jenis as $j)
                        <li>
                            <h3>{{ $j->nama_jenis }}</h3>
                            <ul class="menu-item" style="cursor: pointer; overflow:auto;">
                                @foreach ($j->menu as $menu)
                                <li @if($menu->stok->jumlah < 1) style="pointer-events: none; opacity: 0.8;" @endif 
                                data-harga="{{ $menu->harga }}" data-id="{{ $menu->id }}" data-image="{{ $menu->image }}">
                                        <img width="50px" src="{{ asset('images') }}/{{ $menu->image }}" alt="">
                                        Nama : {{ $menu->nama_menu }}
                                        <br>
                                        <!-- Deskripsi : {{ $menu->deskripsi }}
                                        <br> -->
                                        Rp.  {{ $menu->harga}}
                                        <br>    
                                        Stok : {{$menu->stok->jumlah}}
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="item content">
            <h3>Order</h3>
            <ul class="ordered-list">

            </ul>
            Total Bayar : <h2 id="total"> 0</h2>
            <div>
                <button id="btn-bayar">Bayar</button>
            </div>
        </div>
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </main><!-- End #main -->
</section>
@endsection

@push('scripts')
<script>
    $(function() {
        // Inisialisasi
        const orderedList = [];
        let total = 0;

        const sum = () => {
            return orderedList.reduce((accumulator, object) => {
                return accumulator + (object.harga * object.qty);
            }, 0);
        };

        const changeQty = (id, inc) => {
            // Ubah di array
            const index = orderedList.findIndex(list => list.menu_id == id);
            orderedList[index].qty += inc;

            // Ubah qty dan ubah subtotal
            const item = $(`.ordered-list li[data-id="${id}"]`);
            const txt_subtotal = item.find('.subtotal');
            const txt_qty = item.find('.qty-item');
            txt_qty.val(parseInt(txt_qty.val()) + inc);
            txt_subtotal.text(orderedList[index].harga * orderedList[index].qty);

            // Ubah jumlah total
            $('#total').html(sum());
        };

        // Events
        $('.ordered-list').on('click', '.btn-dec', function() {
            const id = $(this).closest('li').data('id');
            changeQty(id, -1);
        });

        $('.ordered-list').on('click', '.btn-inc', function() {
            const id = $(this).closest('li').data('id');
            changeQty(id, 1);
        });

        $('.ordered-list').on('click', '.remove-item', function() {
            const id = $(this).closest('li').data('id');
            const index = orderedList.findIndex(list => list.menu_id == id);
            orderedList.splice(index, 1);
            $(this).closest('li').remove();
            $('#total').html(sum());
        });

        $('#btn-bayar').on('click', function() {
            $.ajax({
                url: "{{ route('transaksi.store') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "orderedList": orderedList,
                    "total": sum()
                },
                success: function(data) {
                    console.log(data)
                    console.log('oke')
                    if (data.status) {
                        Swal.fire({
                            title: data.message,
                            showDenyButton: true,
                            confirmButtonText: "Cetak Nota",
                            denyButtonText: `OK`,
                            showCloseButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.open("{{ url('nota') }}/" + data.notrans);
                                location.reload();
                            } else if (result.isDenied) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire('Pemesanan Gagal!', '', 'error');
                    }
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire('Pemesanan tidak masuk!', '', 'error');
                }
            });
        });

        $(".menu-item li").click(function() {
            // Mengambil data
            const menu_clicked = $(this).text();
            const data = $(this)[0].dataset;
            const harga = parseFloat(data.harga);
            const id = parseInt(data.id);
            const menu = $(this);
            const stok = parseFloat(menu.data('stok'));
            if (stok < 1) {
                menu.addClass('out-of-stock');
            }

            if (orderedList.every(list => list.menu_id !== id)) {
                let dataN = {
                    'menu_id': id,
                    'menu': menu_clicked,
                    'harga': harga,
                    'qty': 1,
                };
                orderedList.push(dataN);
                let listOrder = `<li data-id="${id}"><h3>${menu_clicked}</h3>`;
                listOrder += `Sub Total : Rp. ${harga}`;
                listOrder += `<button class='remove-item'>hapus</button>
                   <button class="btn-dec"> - </button>`;
                listOrder += `<input class="qty-item"
                              type="number"
                              value="1"
                              style="width:40px"
                              readonly
                          />
                          <button class="btn-inc">+</button><h2>
                          <span class="subtotal">${harga * 1}</span>
                      </li>`;
                $('.ordered-list').append(listOrder);
            }
            $('#total').html(sum());
        });
    });
</script>
@endpush
<style>
    .menu-item li.out-of-stock {
        pointer-events: none;
        opacity: .8;
    }

    .ordered-item-container {
        display: flex;
        align-items: center;


    }

    .ordered-item-details {
        margin-left: 10px;
    }

    .ordered-item-image {
        width: 50px;
        height: 50px;
    }

    .ordered-item-name {
        font-weight: bold;
    }

    .ordered-item-actions {
        margin-top: 10px;
    }

    .ordered-item-actions button {
        margin-right: 5px;
    }

    /* Stylizing Swal.fire dialog */
    .swal2-popup {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .swal2-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .swal2-content {
        font-size: 18px;
        color: #555;
    }

    .swal2-confirm,
    .swal2-deny {
        font-size: 16px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .swal2-confirm {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .swal2-confirm:hover {
        background-color: #0056b3;
    }

    .swal2-deny {
        background-color: #dc3545;
        color: #fff;
        border: none;
    }

    .swal2-deny:hover {
        background-color: #c82333;
    }

    .ordered-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

    }

    .ordered-item-container {
        display: flex;
        align-items: center;
    }

    .ordered-item-image {
        width: 50px;
        margin-right: 10px;
    }

    .ordered-item-details {
        flex: 1;
    }

    .ordered-item-name {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
    }

    .ordered-item-price {
        margin: 5px 0;
        font-size: 14px;
        color: #666;
    }

    .ordered-item-actions {
        display: flex;
        align-items: center;
    }

    .qty-item {
        width: 40px;
        text-align: center;
        margin: 0 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .subtotal {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
        color: #007bff;
    }

    .remove-item,
    .btn-dec,
    .btn-inc {
        background-color: #dc3545;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        padding: 5px 10px;

        margin-left: 5px;
    }

    .remove-item:hover,
    .btn-dec:hover,
    .btn-inc:hover {
        background-color: #c82333;
    }

    .pagetitle {
        text-align: center;
        /* Pusatkan teks */
        margin-bottom: 20px;
        /* Berikan ruang bawah */
    }

    .pagetitle h1 {
        font-size: 36px;
        /* Ukuran font yang lebih besar */
        color: #333;
        /* Warna teks */
        text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
        /* Bayangan teks */
    }

    /* Style untuk item menu */
    .menu-item li {
        cursor: pointer;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    li {
        text-align: center;
        justify-content: center;
    }

    .menu-item li:hover {
        background-color: #f0f0f0;
    }

    /* Style untuk tombol hapus dan tombol kuantitas */
    .btn-dec,
    .btn-inc {
        background-color: #bebe4f;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        padding: 5px 10px;
        margin-left: 5px;
        transition: all 0.3s ease;
    }

    .remove-item {
        background-color: #7b00ff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        padding: 5px 10px;
        margin-left: 5px;
        transition: all 0.3s ease;
    }

    .btn-dec:hover,
    .btn-inc:hover {
        background-color: #c82333;
    }

    /* Style untuk subtotal */
    .subtotal {
        font-size: 16px;
        font-weight: bold;
        color: #007bff;
        margin-left: 10px;
    }

    /* Style untuk input kuantitas */
    .qty-item {
        width: 50px;
        text-align: center;
        margin: 0 5px;
    }



    .main {
        display: flex;
        gap: 2rem;
    }



    .c {
        width: 700px;
        display: flex;
        flex-direction: column;
    }

    .container {
        border: 2px solid rgb(9, 3, 4);
        border-radius: 10px;
        /* Menambahkan sedikit efek rounded pada border */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Menambahkan bayangan */
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        padding: 20px;
        transition: box-shadow 0.3s;
        /* Efek transisi untuk bayangan */
    }

    .container:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        /* Meningkatkan bayangan saat hover */
    }



    .item-content {
        width: 400px;
    }

    .menu-container {
        padding: 0px;
        list-style-type: none;
    }

    .menu-container li h3 {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 20px;
        /* Menyesuaikan ukuran font */
        background-color: aliceblue;
        padding: 10px 20px;
        /* Menyesuaikan padding */
        margin: 5px 0;
        /* Menambahkan margin atas dan bawah */
        border-radius: 5px;
        /* Memberikan sedikit efek rounded */
        transition: background-color 0.3s;
        /* Efek transisi ketika hover */
    }

    .menu-container li h3:hover {
        background-color: lightblue;
        /* Mengubah warna latar belakang saat hover */
    }

    .card-title {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 25px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
        text-transform: uppercase;
        border-bottom: 2px solid #d0c258;
        padding-bottom: 10px;
    }



    .menu-item {
        list-style-type: none;
        display: flex;
        gap: 1em;
    }

    .menu-item li {
        display: flex;
        flex-direction: column;
        padding: 10px 20px;

    }

    .item.content {
        text-align: center;
        /* Pusatkan konten */
        margin-top: 72px;
    }

    .card {
        width: 400px;
        margin: auto;
        background-color: #f9f9f9;
        /* Warna latar belakang */
        border-radius: 10px;
        /* Efek rounded pada card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Bayangan */
        transition: box-shadow 0.3s;
        /* Efek transisi saat hover */
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        /* Meningkatkan bayangan saat hover */
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 24px;
        /* Ukuran font yang lebih besar */
        color: #333;
        /* Warna teks */
        margin-bottom: 15px;
        /* Ruang bawah */
    }

    .ordered-list {
        list-style: none;
        /* Menghapus bullet points */
        padding: 0;
    }

    .card-text {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 15px;
        margin-bottom: 10px;
        /* Tambahkan margin bawah */
    }

    .total-container {
        display: flex;
        justify-content: space-between;
        /* Ratakan ke kanan */
        align-items: center;
        /* Pusatkan vertikal */
        border-top: 1px solid #ccc;
        /* Garis atas */
        padding-top: 10px;
        /* Padding atas */
    }

    #total {
        font-weight: bold;
        /* Teks tebal */
        font-size: 18px;
        /* Ukuran teks */
        color: #333;
        /* Warna teks */
    }

    #btn-bayar {
        background-color: #b6c557;
        /* Warna latar belakang */
        color: #fff;
        /* Warna teks */
        border: none;
        /* Tanpa border */
        padding: 10px 20px;
        /* Padding */
        border-radius: 5px;
        /* Sudut bulat */
        cursor: pointer;
        /* Kursor tangan saat dihover */
        transition: background-color 0.3s;
        /* Efek transisi */
    }

    #btn-bayar:hover {
        background-color: #0056b3;
        /* Warna latar belakang saat dihover */
    }
</style>