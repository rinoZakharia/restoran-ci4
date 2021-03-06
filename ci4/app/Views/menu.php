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

    .cont_modal {
        position: relative;
        width: 300px;
        height: 400px;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        transition-delay: 0.7s;
        -webkit-transition-delay: 0.7s;
        -o-transition-delay: 0.7s;
        transition-delay: 0.7s;
    }

    .cont_photo {
        position: relative;
        width: 300px;
        height: 440px;
        overflow: hidden;
        background-color: #eee;
        border-radius: 5px;
        top: -20px;
        float: left;
        z-index: 2;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        transition: all 0.5s;
        box-shadow: 1px 1px 20px -5px rgba(0, 0, 0, 0.5);
    }

    .cont_img_back {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 5px;
    }

    .cont_img_back>img {
        width: 100%;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        transition: all 1s;
    }

    .cont_img_back:hover>img {
        transform: scale(1.5);
    }

    .cont_text_ingredients {
        position: absolute;
        width: 0px;
        top: 0px;
        left: 290px;
        margin-left: 10px;
        height: 400px;
        float: left;
        border-radius: 5px;
        z-index: 3;
        box-shadow: 1px 1px 20px -5px rgba(0, 0, 0, 0.2);

        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fbf9f9+28,e8eaed+100 */
        background: rgb(251, 249, 249);
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, rgba(251, 249, 249, 1) 28%, rgba(232, 234, 237, 1) 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, rgba(251, 249, 249, 1) 28%, rgba(232, 234, 237, 1) 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, rgba(251, 249, 249, 1) 28%, rgba(232, 234, 237, 1) 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fbf9f9', endColorstr='#e8eaed', GradientType=1);
        /* IE6-9 fallback on horizontal gradient */
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        transition-delay: 0.7s;
        -webkit-transition-delay: 0.7s;
        -o-transition-delay: 0.7s;
        transition-delay: 0.7s;
    }

    .cont_mins {
        position: relative;
        float: left;
        width: 100%;
    }

    .sub_mins {
        position: relative;
        float: left;
        width: 60px;
        height: 60px;
        background-color: rgba(255, 253, 112, 0.8);
        border-radius: 50%;
        margin: 16px;
        margin-bottom: 0px;
        opacity: 0;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        transition: all 0.5s;
        transition-delay: 1s;
        -webkit-transition-delay: 1s;
        -o-transition-delay: 1s;
        transition-delay: 1s;

    }

    .sub_mins>h3 {
        font-size: 24px;
        margin-top: 7px;
        margin-bottom: -15px;
    }

    .sub_mins>span {
        font-size: 9px;
        font-weight: 700;
    }

    .cont_servings {
        position: relative;
        float: left;
        width: 60px;
        height: 60px;
        background-color: rgba(255, 253, 112, 0.8);
        border-radius: 50%;
        margin: 16px;
        opacity: 0;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        transition-delay: 0.7s;
        -webkit-transition-delay: 0.7s;
        -o-transition-delay: 0.7s;
        transition-delay: 0.7s;
    }

    .cont_servings>h3 {
        font-size: 24px;
        margin-top: 5px;
        margin-bottom: -15px;
    }

    .cont_servings>span {
        font-size: 9px;
        font-weight: 700;
    }

    .cont_icon_right {
        position: relative;
        float: right;
        margin-top: 16px;
    }

    .cont_icon_right>a {
        margin: 16px;
        margin-top: 16px;
        color: #fff;
    }

    .cont_detalles {
        position: absolute;
        bottom: -185px;
        height: 130px;
        border-radius: 5px;
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+100,000000+101&0+0,0.65+68 */
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.65) 68%, rgba(0, 0, 0, 0.65) 100%, rgba(0, 0, 0, 0.65) 101%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.65) 68%, rgba(0, 0, 0, 0.65) 100%, rgba(0, 0, 0, 0.65) 101%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.65) 68%, rgba(0, 0, 0, 0.65) 100%, rgba(0, 0, 0, 0.65) 101%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#a6000000', GradientType=0);
        /* IE6-9 */

        width: 100%;
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        transition-delay: 1.2s;
        -webkit-transition-delay: 0.7s;
        -o-transition-delay: 0.7s;
        transition-delay: 0.7s;
    }


    .cont_detalles>h3 {
        margin-top: 50px;
        color: #fff;
        font-size: 24px;
    }

    /* ---------------- Css Tabs -------- */

    .cont_tabs {
        position: relative;
        float: left;
        width: 410px;
        height: 60px;
        border-bottom: 3px solid #EDEDEC;
    }

    .cont_tabs>ul {
        width: 100%;
        background-color: #eee;
    }

    .cont_tabs>ul>li {
        position: relative;
        float: left;
        width: 50%;
        list-style: none;
    }

    .cont_tabs>ul>li>a {
        border-top: 7px solid #ED346C;
        position: relative;
        display: block;
        float: left;
        padding-top: 15px;
        color: #241C3E;
        text-decoration: none;
        margin-left: 15px;
        font-size: 14px;
    }

    .cont_tabs>ul>li:first-child>a {
        cursor: pointer;
        border-top: 0px;
        margin-top: 8px;
        padding-top: 15px;
        color: #241C3E;
        margin-top: 0px;
        transition: 0.3s;
    }

    .cont_tabs>ul>li:first-child>a:hover {
        border-top: 7px solid #ED346C;
        padding-top: 5px;
    }

    .cont_btn_open_dets {
        position: absolute;
        right: -15px;
        top: 50%;
        /* cursor: pointer; */
    }

    .cont_btn_open_dets>a {
        display: block;
        /* cursor: pointer; */
        text-align: center;
        font-size: 19px;
        width: 30px;
        height: 30px;
        background-color: #ED2460;
        border-radius: 50%;
        color: #fff;
        box-shadow: 0px 0px 20px -2px rgba(237, 36, 96, 1);
        -webkit-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        transition: all 0.5s;
        transform: rotate(180deg);
    }

    .cont_title_preparation {
        position: relative;
        float: left;
        margin: 10px 0px;
        width: 410px;
    }

    .cont_title_preparation>p {
        font-weight: 700;
        font-size: 14px;
        margin-left: 40px;
        text-align: left;
        color: #36354E;
    }

    .cont_info_preparation {
        position: relative;
        float: left;
    }

    .cont_info_preparation>p {
        margin: 5px 0px;
        margin-left: 50px;
        border-left: 2px solid #E3E3E3;
        font-size: 14px;
        padding: 20px 0px;
        padding-left: 20px;
        text-align: left;
        padding-right: 15px;
        color: #565656;
    }

    .cont_btn_mas_dets {
        position: absolute;
        bottom: 0px;
        left: 50%;
    }

    .cont_btn_mas_dets>a {
        color: #36354E;
    }

    .cont_over_hidden {
        position: relative;
        float: left;
        width: 100%;
        height: 400px;
        overflow: hidden;
    }

    .cont_text_det_preparation {
        position: relative;
        width: 410px;
    }

    .cont_modal_active>.cont_text_ingredients>.cont_btn_open_dets>a {
        transform: rotate(0deg);
    }

    .cont_modal_active>.cont_text_ingredients {
        width: 410px;
        left: 285px;
        z-index: 1;
        box-shadow: 15px 20px 70px -5px rgba(0, 0, 0, 0.2);
    }

    .cont_modal_active {
        width: 700px;
    }

    .cont_modal_active>.cont_photo {
        box-shadow: 25px 10px 70px -5px rgba(0, 0, 0, 0.3);
    }

    .cont_modal_active>.cont_photo>.cont_mins>.sub_mins {
        opacity: 1;
    }

    .cont_modal_active>.cont_photo>.cont_servings {
        opacity: 1;
    }

    .cont_modal_active>.cont_photo>.cont_detalles {
        bottom: 0px;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
        padding-top: 15%;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: black;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
    }


    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

        .prev,
        .next,
        .text {
            font-size: 11px
        }
    }

    .top {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 20%;
        flex-direction: column;
        font-family: 'Quicksand', sans-serif;
        background-image: url(<?= base_url('/icon/Homepage.jpg') ?>);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .top .title {
        padding: 2%;
        font-family: 'Pacifico', cursive;
        font-size: 50px;
    }

    .top .nav {
        background-color: black;
        padding: 10px;
        position: relative;
        z-index: 3;
    }

    .top .nav a {
        margin-right: 15px;
        text-decoration: none;
        color: white;
        transition: .3s;
    }

    .top .nav a:hover {
        color: gray;
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('home') ?>
<div class="container">
    <div class="top">
        <div class="title text-center text-white"><img style="max-width: 3%;" src="<?= base_url('/icon/pizza.png') ?>" alt="">Restoran</div>
        <div class="nav d-flex flex-row justify-content-center">
            <?php foreach ($kategori as $key => $value) { ?>
                <a href="<?= base_url("menu/" . $value["idkategori"]) ?>" class=""><?= $value['kategori'] ?></a>
            <?php } ?>
        </div>
    </div>
    <div class="slideshow-container">
        <?php if (!empty($menu)) { ?>
            <?php foreach ($menu as $key => $value) { ?>
                <div class="mySlides">
                    <div class="cont_principal d-flex justify-content-center">
                        <div class="cont_central">
                            <div id="id<?= $key ?>" class="cont_modal cont_modal_active">
                                <div class="cont_photo">
                                    <div class="cont_img_back">
                                        <img src="<?= base_url('/upload/' . $value['gambar'] . '') ?>" alt="" />
                                    </div>
                                    <div class="cont_detalles text-center">
                                        <h3><?= $value['menu'] ?></h3>
                                    </div>
                                </div>
                                <div class="cont_text_ingredients">
                                    <div class="cont_over_hidden">
                                        <div class="cont_tabs">
                                            <ul>
                                                <li><a data-gambar="<?= base_url('/upload/' . $value['gambar'] . '') ?>" data-menu="<?= $value["menu"] ?>" data-harga="<?= $value["harga"] ?>" data-id="<?= $value["idmenu"] ?>">
                                                        <h4>Add To Cart</h4>
                                                    </a></li>
                                            </ul>
                                        </div>

                                        <div class="cont_text_det_preparation">
                                            <div class="cont_title_preparation">
                                                <p>HARGA</p>
                                            </div>
                                            <div class="cont_info_preparation">
                                                <p>Rp. <?= number_format($value['harga']) ?></p>
                                            </div>
                                            <div class="cont_text_det_preparation">

                                                <div class="cont_title_preparation">
                                                    <p>INFO</p>
                                                </div>
                                                <div class="cont_info_preparation">
                                                    <p>Makanan kami terbuat dari bahan yang sudah dikelola dengan baik.Sehingga anda tidak perlu khawatir akan terjadinya keracunan makanan</p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="cont_btn_open_dets">
                                        <a onclick="open_close(<?= $key ?>)">&#10095;</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="prev" onclick="plusSlides(-1)">&#10094;</div>
            <div class="next" onclick="plusSlides(1)">&#10095;</div>
        <?php } else { ?>
            <div class="error d-flex flex-column align-items-center">
                <img width="50%" src="<?= base_url('/icon/404.png') ?>" alt="">
                <h1 class="display-2 text-center">Menu tidak ditemukan</h1>
                <h3 class="text-center">Silahkan hubungi staff kami</h3>
            </div>
        <?php } ?>
    </div>
    <br>
    <div style="text-align:center; padding-bottom: 5%;">
        <?php for ($i = 1; $i <= count($menu); $i++) { ?>
            <span class="dot" onclick="currentSlide(<?= $i ?>)"></span>
        <?php } ?>
    </div>
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
    // window.onload = function() {
    //     for (let index = 0; index < count; index++) {
    //         document.querySelector(`#id${index}`).className = "cont_modal";
    //     }
    // }
    // var c = 0;

    // function open_close(id) {
    //     if (c % 2 == 0) {
    //         document.querySelector(`#id${id}`).className = "cont_modal cont_modal_active";
    //         c++;
    //     } else {
    //         document.querySelector(`#id${id}`).className = "cont_modal";
    //         c++;
    //     }
    // }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>
<?= $this->endSection() ?>