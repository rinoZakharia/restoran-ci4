<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <title>HomePage</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <?= $this->renderSection('style') ?>
</head>

<body>
    <div id="mySidepanel" class="sidepanel">
        <div class="title">
            <img style="max-width: 20%;" src="<?= base_url('/icon/pizza.png') ?>" alt="">
            <div class="teks">Restoran</div>
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="<?= base_url() ?>">Dashboard</a>
        <a href="<?= base_url("menu") ?>">Menu</a>
        <a href="<?= base_url("keranjang") ?>">Keranjang <span class="badge">0</span></a>
        <a href="<?= base_url("histori") ?>">Histori</a>
        <?php if (session()->get('loggedInP')) { ?>
            <a onclick="logout()" href="<?= base_url("loginhome/logout") ?>">Logout</a>
            <div class="profil">
                <img style="max-width: 40%;" src="<?= base_url('/icon/profile.png') ?>" alt="">
                <div class="email font-weight-bold pt-4"><?= session()->get('emailP') ?></div>
                <div class="nama font-weight-lighter pt-2"><?= session()->get('pelanggan') ?></div>
            </div>
        <?php } else { ?>
            <a href="<?= base_url("loginhome") ?>">Login</a>
        <?php } ?>
    </div>

    <div class="nav">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div class="main">
        <?= $this->renderSection('home') ?>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidepanel").style.width = "300px";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }

        // Cart
        if (localStorage['cart'] == null) {
            let cart = [];
        } else {
            cart = JSON.parse(localStorage['cart']);
        }

        // btn insert
        let btnBeli = document.querySelectorAll(".cont_tabs>ul>li>a");
        for (let index = 0; index < btnBeli.length; index++) {
            btnBeli[index].onclick = () => {
                insert(index);
            }
        }

        // btn plus minus
        let btnPlus = document.querySelectorAll(".cart > .quantity > .plus");
        for (let index = 0; index < btnPlus.length; index++) {
            btnPlus[index].onclick = () => {
                tambah(index);
            }
        }
        let btnMin = document.querySelectorAll(".cart > .quantity > .minus");
        for (let index = 0; index < btnMin.length; index++) {
            btnMin[index].onclick = () => {
                kurang(index);
            }
        }
        // btn hapus
        let btnHapus = document.querySelectorAll(".cart > .remove");
        for (let index = 0; index < btnHapus.length; index++) {
            btnHapus[index].onclick = () => {
                hapus(index);
            }
        }


        document.querySelector(".sidepanel .badge").innerHTML = cart.length;

        function insert(index) {
            if (cart.find(cek => cek.id == btnBeli[index].dataset["id"]) === undefined) {
                cart.push({
                    id: btnBeli[index].dataset["id"],
                    menu: btnBeli[index].dataset["menu"],
                    harga: btnBeli[index].dataset["harga"],
                    quantity: 1,
                    total: btnBeli[index].dataset["harga"],
                    gambar: btnBeli[index].dataset["gambar"]
                });
                console.log(cart);
                localStorage.setItem('cart', JSON.stringify(cart));
                document.querySelector(".sidepanel .badge").innerHTML = cart.length;
                alert(`Data berhasil ditambah!! Silahkan cek keranjang anda`);
            } else {
                alert(`Data sudah ada!! Silahkan cek keranjang anda`);
            }
        }

        function tambah(index) {
            objId = cart.findIndex((obj => obj.id == btnPlus[index].dataset["id"]));
            cart[objId].quantity = cart[objId].quantity + 1;
            cart[objId].total = cart[objId].quantity * cart[objId].harga;
            localStorage.setItem('cart', JSON.stringify(cart));
            document.querySelector(".cart > .quantity > .angka").innerHTML = cart[objId].quantity;
            document.location.reload();
        }

        function kurang(index) {
            objId = cart.findIndex((obj => obj.id == btnPlus[index].dataset["id"]));
            if (cart[objId].quantity - 1 == 0) {
                hapus(index);
            } else {
                cart[objId].quantity = cart[objId].quantity - 1;
                cart[objId].total = cart[objId].quantity * cart[objId].harga;
                localStorage.setItem('cart', JSON.stringify(cart));
                document.querySelector(".cart > .quantity > .angka").innerHTML = cart[objId].quantity;
                document.location.reload();
            }
        }

        function hapus(index) {
            let removeIndex = cart.map((item) => {
                return item.id;
            }).indexOf(btnPlus[index].dataset["id"]);
            cart.splice(removeIndex, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            document.querySelector(".sidepanel .badge").innerHTML = cart.length;
            document.location.reload();
        }

        function logout() {
            while (cart.length > 0) {
                cart.pop();
            }
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function sendData() {
            let xhr = new XMLHttpRequest();
            let url = "<?= base_url("MenuHome/insert") ?>";

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onload = function() {
                console.log(this.responseText);
                alert("Terima Kasih sudah berbelanja");
                logout();
                document.location.reload();
            };

            xhr.send(JSON.stringify(cart));
            return false;
        }
    </script>
</body>

</html>