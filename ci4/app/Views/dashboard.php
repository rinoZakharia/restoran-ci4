<?= $this->extend('homepage') ?>

<?= $this->section('style') ?>
<style>
    body {
        background-image: url(<?= base_url('/icon/tasty-cheesy-pizza-blue-with-fresh-vegetables.jpg') ?>);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .container {
        margin-top: 15%;
    }

    .container .title {
        font-family: 'Pacifico', cursive;
        color: white;
    }

    .container .sub {
        font-family: 'Quicksand', sans-serif;
        color: white;
        margin-left: 5%;
    }

    .sidepanel {
        width: 0;
        position: fixed;
        z-index: 1;
        height: 100%;
        top: 0;
        left: 0;
        background-color: white;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidepanel a {
        font-family: 'Quicksand', sans-serif;
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 20px;
        color: black;
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
        color: black;
        transition: 0.3s;
    }

    .sidepanel .badge {
        background-color: #343a40;
        color: white;
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
        color: black;
        transition: 0.3s;
        margin: 28px;
        padding: 20px;
        box-shadow: 3px 3px 6px 5px #ccc;
        border-radius: 10px;
    }

    .openbtn {
        font-family: 'Pacifico', cursive;
        font-size: 30px;
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
</style>
<?= $this->endSection() ?>
<?= $this->section('home') ?>
<div class="container">
    <div class="title display-1"><img style="max-width: 10%;" src="<?= base_url('/icon/pizza.png') ?>" alt="">Restoran</div>
    <div class="sub h4">Makanan berkualitas dijamin enak</div>
</div>
<?= $this->endSection() ?>