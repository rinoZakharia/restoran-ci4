<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>


<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . ' => ' . $value . '<br>';
        }
        echo '</div>';
    }
    ?>
    <h3>UPDATE</h3>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/menu/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Kategori</label>
            <select name="idkategori" id="idkategori" class=" form-control">
                <?php foreach ($kategori as $key => $value) { ?>
                    <option <?php if ($value['idkategori'] == $menu['idkategori']) echo "selected" ?> value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="menu">Menu</label>
            <input type="text" class="form-control" value="<?= $menu['menu'] ?>" name="menu" required>
            <input type="hidden" class="form-control" value="<?= $menu['idmenu'] ?>" name="idmenu">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" value="<?= $menu['harga'] ?>" name="harga" required>
        </div>
        <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" class="form-control-file" name="gambar">
            <input type="hidden" class="form-control" value="<?= $menu['gambar'] ?>" name="gambar">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="Simpan" value="Simpan">
        </div>
    </form>
</div>

<?= $this->endSection() ?>