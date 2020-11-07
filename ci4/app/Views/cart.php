<?= $this->extend('homepage') ?>

<?= $this->section('style') ?>
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: white;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .sidepanel {
        width: 0;
        position: fixed;
        z-index: 4;
        height: 100%;
        top: 0;
        left: 0;
        background-color: #343a40;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidepanel a {
        font-family: 'Quicksand', sans-serif;
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        display: block;
        transition: 0.3s;
    }

    .sidepanel .title {
        display: flex;
        flex-direction: row;
        font-family: 'Pacifico', cursive;
        margin-bottom: 10%;
        padding: 8px 8px 8px 32px;
        font-size: 40px;
        color: white;
        transition: 0.3s;
    }

    .sidepanel .badge {
        background-color: white;
        color: #343a40;
    }

    .sidepanel a:hover {
        color: gray;
    }

    .sidepanel .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
    }

    .sidepanel .profil {
        text-align: center;
        font-family: 'Quicksand', sans-serif;
        font-size: 20px;
        color: white;
        transition: 0.3s;
        margin: 28px;
        padding: 20px;
        box-shadow: 3px 3px 6px 5px #515a63;
        border-radius: 10px;
    }

    .openbtn {
        font-family: 'Pacifico', cursive;
        font-size: 30px;
        z-index: 1;
        cursor: pointer;
        background-color: transparent;
        color: white;
        padding: 10px 15px;
        border: none;
        transition: 0.3s;
    }

    .openbtn:hover {
        background-color: white;
        color: black;
    }

    .top {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 20%;
        flex-direction: column;
        font-family: 'Quicksand', sans-serif;
        background-image: url(<?= base_url('/icon/burger.jpg') ?>);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .top .title {
        padding: 2%;
        font-family: 'Pacifico', cursive;
        font-size: 50px;
    }

    .content {
        padding-top: 10%;
        display: flex;
        flex-direction: row;
    }

    .menu {
        display: flex;
        flex-direction: column;
        flex: 3;
    }

    .cart {
        padding-top: 3%;
        display: flex;
        flex-direction: row;
        justify-content: stretch;
        border-bottom: solid;
        padding-bottom: 3%;
        border-color: #EAEAEA;
        padding-left: 3%;
        padding-right: 3%;
        margin-right: 3%;
    }

    .cart img {
        width: 130px;
        height: 210px;
        border-radius: 20px;
        flex: 1;
    }

    .cart .nama {
        font-family: 'Quicksand', sans-serif;
        font-size: 25px;
        align-self: center;
        text-align: center;
        flex: 2;
    }

    .cart .quantity {
        display: flex;
        flex-direction: row;
        font-family: 'Quicksand', sans-serif;
        font-size: 25px;
        align-self: center;
        justify-content: space-between;
        flex: 1;
    }

    .cart .quantity .angka {
        margin-left: 10px;
        margin-right: 10px;
    }

    .cart .quantity .btn {
        border: 1px solid;
        border-color: #fe003e;
    }

    .cart .quantity .btn:hover {
        background-color: #fe003e;
        color: white;
        border: 1px solid;
        border-color: #fe003e;
    }

    .cart .subtotal {
        font-family: 'Quicksand', sans-serif;
        font-size: 25px;
        align-self: center;
        flex: 2;
        text-align: center;
    }

    .cart .remove {
        font-family: 'Quicksand', sans-serif;
        align-self: center;
        border: 1px solid;
        border-color: #fe003e;
    }

    .cart .remove:hover {
        background-color: #fe003e;
        color: white;
    }

    .cart-total {
        margin-top: 3%;
        background-color: #EAEAEA;
        padding: 20px;
        height: 100%;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .cart-total .title {
        font-family: 'Quicksand', sans-serif;
        font-size: 30px;
        font-weight: 700;
    }

    .cart-total .total {
        padding-top: 5%;
        font-family: 'Quicksand', sans-serif;
        font-size: 15px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        color: gray;
    }

    .cart-total .harga-item {
        padding-top: 5%;
        font-family: 'Quicksand', sans-serif;
        font-size: 15px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        color: gray;
    }

    .cart-total .btn {
        font-family: 'Quicksand', sans-serif;
        background-color: turquoise;
        background-color: #fe003e;
        color: white;
        font-weight: bolder;
        align-self: flex-end;
        margin-top: 5%;
    }

    .cart-total .contHarga {
        padding-bottom: 4%;
        border-bottom: 1px solid;
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('home') ?>
<div class="container">
    <div class="top">
        <div class="title text-center text-white"><img style="max-width: 3%;" src="<?= base_url('/icon/pizza.png') ?>" alt="">Restoran</div>
    </div>
    <form onsubmit="return sendData()" method="post">
        <div class="content mb-5">
            <div class="menu"></div>
            <div class="cart-total">
                <div class="title">Summary</div>
                <div class="contHarga"></div>
                <div class="total">
                    <div class="teks1">Total</div>
                    <div class="teks2">Rp. 20.000</div>
                </div>
                <input type="submit" class="btn" value="CHECKOUT" />
            </div>
        </div>
    </form>
</div>
<!-- Footer -->
<footer class="page-footer font-small" style="background-color: black; color: white;">
    <!-- Call to action -->
    <ul class="list-unstyled list-inline text-center p-5">
        <li class="list-inline-item">
            <h3>Selamat menikmati masakan kami</h3>
            <p class="text-white-50">Kami selalu melakukan yang terbaik</p>
        </li>
    </ul>
    <!-- Call to action -->
    <!-- Copyright -->
    <div class="footer-copyright text-center p-2 text-white-50" style="background-color: #171717;">© 2020 Copyright:
        <a class="text-decoration-none text-white-50" href="<?= base_url() ?>"> Restoran</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
<script>
    if (localStorage['cart'] == null) {
        let cart = [];
    } else {
        cart = JSON.parse(localStorage['cart']);
        if (cart.length == 0) {
            document.querySelector(".content").innerHTML = `<div class="error d-flex flex-column align-items-center">
                <img width="50%" src="<?= base_url('/icon/empty_cart.png') ?>" alt="">
                <h1 class="display-2 text-center">Keranjang kosong</h1>
                <h3 class="text-center">Silahkan pesan menu terlebih dahulu</h3>
            </div>`;
        } else {
            let tampilCart = cart.map((kolom) => {
                return `<div class="cart">
                <img src="${kolom.gambar}" alt="" />
                <div class="nama">${kolom.menu}</div>
                <div class="quantity">
                    <span data-id="${kolom.id}" class="minus btn">&#8722;</span>
                    <div class="angka">${kolom.quantity}</div>
                    <span data-id="${kolom.id}" data-quantity="${kolom.quantity}" class="plus btn">&#43;</span>
                </div>
                <div class="subtotal">Rp. ${kolom.harga}</div>
                <div class="remove btn">x</div>
            </div>`;
            });
            let tampilHargaItem = cart.map((kolom) => {
                return `<div class="harga-item">
                    <div class="teks1">${kolom.menu}</div>
                    <div class="teks2">Rp. ${kolom.total}</div>
                </div>`;
            });
            document.querySelector(".menu").innerHTML = tampilCart.join('\n');
            document.querySelector(".contHarga").innerHTML = tampilHargaItem.join('\n');
            document.querySelector(".total > .teks2").innerHTML = `Rp. ${cart.reduce((val, kolom) => {
            return val + parseInt(kolom.total);
        }, 0)}`;
        }
    }
</script>
<?= $this->endSection() ?>