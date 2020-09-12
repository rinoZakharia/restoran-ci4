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
    <h3>INSERT</h3>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/menu/insert') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Kategori</label>
            <select name="idkategori" id="idkategori" class=" form-control">
                <?php foreach ($kategori as $key => $value) { ?>
                    <option value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="menu">Menu</label>
            <input type="text" class="form-control" name="menu" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" name="harga" required>
        </div>
        <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" class="form-control-file" name="gambar" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="Simpan" value="Simpan">
        </div>
    </form>
</div>

<?= $this->endSection() ?>