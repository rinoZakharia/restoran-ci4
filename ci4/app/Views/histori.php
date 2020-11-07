<?= $this->extend('homepage') ?>

<?= $this->section('style') ?>
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: transparent;
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
        background-image: url(<?= base_url('/icon/pattern-floral.jpg') ?>);
    }

    .top .title {
        padding: 2%;
        font-family: 'Pacifico', cursive;
        font-size: 50px;
    }

    .content {
        padding-top: 10%;
        display: flex;
        flex-direction: column;
        font-family: 'Quicksand', sans-serif;
    }

    .content .title {
        font-size: 40px;
    }

    .content .sub {
        font-size: 20px;
        margin-bottom: 4%;
    }

    .accordion dt>a {
        text-align: center;
        font-weight: 700;
        padding: 2em;
        display: block;
        text-decoration: none;
        color: #fff;
        -webkit-transition: background-color 0.5s ease-in-out;
    }

    .accordion dd {
        background-color: #f7b64a;
        color: #fafafa;
        font-size: 1em;
        line-height: 1.5em;
        overflow: auto;
    }

    .accordion dd>.detail {
        padding: 20px;
    }

    .accordion {
        position: relative;
        background-color: #F9A826;
        margin-bottom: 3%;
    }

    .accordionTitle {
        background-color: #22313F;
        border-bottom: 1px solid #2c3e50;
    }

    .accordionTitle:before {
        content: "+";
        font-size: 1.5em;
        line-height: 0.5em;
        float: left;
        -moz-transition: -moz-transform 0.3s ease-in-out;
        -o-transition: -o-transform 0.3s ease-in-out;
        -webkit-transition: -webkit-transform 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out;
    }

    .accordionTitle:hover {
        background-color: #2c3e50;
    }

    .accordionTitleActive {
        background-color: #34495e;
    }

    .accordionTitleActive:before {
        -webkit-transform: rotate(-225deg);
        -moz-transform: rotate(-225deg);
        transform: rotate(-225deg);
    }

    .accordionItem {
        height: auto;
        overflow: hidden;
    }

    @media all {
        .accordionItem {
            max-height: 50em;
            -moz-transition: max-height 1s;
            -o-transition: max-height 1s;
            -webkit-transition: max-height 1s;
            transition: max-height 1s;
        }
    }

    @media screen and (min-width: 48em) {
        .accordionItem {
            max-height: 15em;
            -moz-transition: max-height 0.5s;
            -o-transition: max-height 0.5s;
            -webkit-transition: max-height 0.5s;
            transition: max-height 0.5s;
        }
    }

    .accordionItemCollapsed {
        max-height: 0;
    }

    .animateIn {
        -webkit-animation-name: accordionIn;
        -webkit-animation-duration: 0.65s;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-direction: normal;
        -webkit-animation-timing-function: ease-in-out;
        -webkit-animation-fill-mode: both;
        -webkit-animation-delay: 0s;
        -moz-animation-name: normal;
        -moz-animation-duration: 0.65s;
        -moz-animation-iteration-count: 1;
        -moz-animation-direction: alternate;
        -moz-animation-timing-function: ease-in-out;
        -moz-animation-fill-mode: both;
        -moz-animation-delay: 0s;
        animation-name: accordionIn;
        animation-duration: 0.65s;
        animation-iteration-count: 1;
        animation-direction: normal;
        animation-timing-function: ease-in-out;
        animation-fill-mode: both;
        animation-delay: 0s;
    }

    .animateOut {
        -webkit-animation-name: accordionOut;
        -webkit-animation-duration: 0.75s;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-direction: alternate;
        -webkit-animation-timing-function: ease-in-out;
        -webkit-animation-fill-mode: both;
        -webkit-animation-delay: 0s;
        -moz-animation-name: accordionOut;
        -moz-animation-duration: 0.75s;
        -moz-animation-iteration-count: 1;
        -moz-animation-direction: alternate;
        -moz-animation-timing-function: ease-in-out;
        -moz-animation-fill-mode: both;
        -moz-animation-delay: 0s;
        animation-name: accordionOut;
        animation-duration: 0.75s;
        animation-iteration-count: 1;
        animation-direction: alternate;
        animation-timing-function: ease-in-out;
        animation-fill-mode: both;
        animation-delay: 0s;
    }

    @-webkit-keyframes accordionIn {
        0% {
            opacity: 0;
            -webkit-transform: scale(0.8);
        }

        100% {
            opacity: 1;
            -webkit-transform: scale(1);
        }
    }

    @-moz-keyframes accordionIn {
        0% {
            opacity: 0;
            -moz-transform: scale(0.8);
        }

        100% {
            opacity: 1;
            -moz-transform: scale(1);
        }
    }

    @keyframes accordionIn {
        0% {
            opacity: 0;
            transform: scale(0.8);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @-webkit-keyframes accordionOut {
        0% {
            opacity: 1;
            -webkit-transform: scale(1);
        }

        100% {
            opacity: 0;
            -webkit-transform: scale(0.8);
        }
    }

    @-moz-keyframes accordionOut {
        0% {
            opacity: 1;
            -moz-transform: scale(1);
        }

        100% {
            opacity: 0;
            -moz-transform: scale(0.8);
        }
    }

    @keyframes accordionOut {
        0% {
            opacity: 1;
            transform: scale(1);
        }

        100% {
            opacity: 0;
            transform: scale(0.8);
        }
    }

    /* pagination */
    .pagenumbers {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        margin-bottom: 5%;
    }

    .pagenumbers button {
        width: 50px;
        height: 50px;

        appearance: none;
        border: none;
        outline: none;
        cursor: pointer;

        background-color: #343a40;

        margin: 5px;
        transition: 0.4s;

        color: #FFF;
        font-size: 18px;
        text-shadow: 0px 0px 4px rgba(0, 0, 0, 0.2);
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.2);
    }

    .pagenumbers button:hover {
        background-color: #f7b64a;
    }

    .pagenumbers button.active {
        background-color: #f7b64a;
        box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.2);
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('home') ?>
<div class="container">
    <div class="top">
        <div class="title text-center text-white"><img style="max-width: 3%;" src="<?= base_url('/icon/pizza.png') ?>" alt="">Restoran</div>
    </div>
    <div class="content">
        <div class="title text-center">Histori Belanja <?= session()->get('pelanggan') ?></div>
        <div class="sub text-center">Berikut adalah rincian belanja anda dari tanggal ke tanggal</div>
        <div class="accordion" id="accordion"></div>
        <div class="pagenumbers" id="pagination"></div>
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
    /*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

    /*jshint browser: true, strict: true, undef: true */
    /*global define: false */
    (function(window) {
        'use strict';

        function classReg(className) {
            return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
        }
        var hasClass, addClass, removeClass;

        if ('classList' in document.documentElement) {
            hasClass = function(elem, c) {
                return elem.classList.contains(c);
            };
            addClass = function(elem, c) {
                elem.classList.add(c);
            };
            removeClass = function(elem, c) {
                elem.classList.remove(c);
            };
        } else {
            hasClass = function(elem, c) {
                return classReg(c).test(elem.className);
            };
            addClass = function(elem, c) {
                if (!hasClass(elem, c)) {
                    elem.className = elem.className + ' ' + c;
                }
            };
            removeClass = function(elem, c) {
                elem.className = elem.className.replace(classReg(c), ' ');
            };
        }

        function toggleClass(elem, c) {
            var fn = hasClass(elem, c) ? removeClass : addClass;
            fn(elem, c);
        }
        var classie = {
            hasClass: hasClass,
            addClass: addClass,
            removeClass: removeClass,
            toggleClass: toggleClass,
            has: hasClass,
            add: addClass,
            remove: removeClass,
            toggle: toggleClass
        };
        if (typeof define === 'function' && define.amd) {
            define(classie);
        } else {
            window.classie = classie;
        }
    })(window);
    var $ = function(selector) {
        return document.querySelector(selector);
    }
    var accordion = $('.accordion');
    accordion.addEventListener("click", function(e) {
        e.stopPropagation();
        e.preventDefault();
        if (e.target && e.target.nodeName == "A") {
            var classes = e.target.className.split(" ");
            if (classes) {
                for (var x = 0; x < classes.length; x++) {
                    if (classes[x] == "accordionTitle") {
                        var title = e.target;
                        var content = e.target.parentNode.nextElementSibling;
                        classie.toggle(title, 'accordionTitleActive');
                        if (classie.has(content, 'accordionItemCollapsed')) {
                            if (classie.has(content, 'animateOut')) {
                                classie.remove(content, 'animateOut');
                            }
                            classie.add(content, 'animateIn');
                        } else {
                            classie.remove(content, 'animateIn');
                            classie.add(content, 'animateOut');
                        }
                        classie.toggle(content, 'accordionItemCollapsed');
                    }
                }
            }
        }
    });


    // Pagination
    let arr = [
        <?php foreach ($order as $key => $value) { ?> `
            <dl id="dl">
                <dt><a class="accordionTitle bg-dark font-weight-lighter" href="#">Tanggal Belanja : <?= $value["tglorder"] ?> (Rp. <?= number_format($value["total"]) ?>)</a></dt>
                <dd class="accordionItem accordionItemCollapsed">
                    <div class="detail">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($detail as $keyD => $valueD) { ?>
                                    <?php if ($value["idorder"] == $valueD["idorder"]) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $valueD["menu"] ?></td>
                                            <td><?= $valueD["jumlah"] ?></td>
                                            <td>Rp. <?= number_format($valueD["hargajual"]) ?></td>
                                            <td>Rp. <?= number_format($valueD["jumlah"] * $valueD["hargajual"]) ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </dd>
            </dl>`,
        <?php } ?>
    ];
    if (arr.length == 0) {
        arr = [
            `<div class="error d-flex flex-column align-items-center bg-white">
                <img width="50%" src="<?= base_url('/icon/empty_cart.png') ?>" alt="">
                <h1 class="display-2 text-center">Histori kosong</h1>
                <h3 class="text-center">Silahkan pesan menu terlebih dahulu</h3>
            </div>`
        ];
    }
    console.log(arr);
    const list_element = document.getElementById('accordion');
    const pagination_element = document.getElementById('pagination');
    let current_page = 1;
    let rows = 3;

    function DisplayList(items, wrapper, rows_per_page, page) {
        wrapper.innerHTML = "";
        page--;

        let start = rows_per_page * page;
        let end = start + rows_per_page;
        let paginatedItems = items.slice(start, end);

        for (let i = 0; i < paginatedItems.length; i++) {
            let item = paginatedItems[i];
            wrapper.innerHTML += item;
        }
    }

    function SetupPagination(items, wrapper, rows_per_page) {
        wrapper.innerHTML = "";

        let page_count = Math.ceil(items.length / rows_per_page);
        for (let i = 1; i < page_count + 1; i++) {
            let btn = PaginationButton(i, items);
            wrapper.appendChild(btn);
        }
    }

    function PaginationButton(page, items) {
        let button = document.createElement('button');
        button.innerText = page;

        if (current_page == page) button.classList.add('active');

        button.addEventListener('click', function() {
            current_page = page;
            DisplayList(items, list_element, rows, current_page);

            let current_btn = document.querySelector('.pagenumbers button.active');
            current_btn.classList.remove('active');

            button.classList.add('active');
        });

        return button;
    }
    DisplayList(arr, list_element, rows, current_page);
    SetupPagination(arr, pagination_element, rows);
</script>
<?= $this->endSection() ?>