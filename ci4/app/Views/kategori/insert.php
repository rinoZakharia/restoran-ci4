<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>


<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('info');
        echo '</div>';
    }
    ?>
    <h3>INSERT</h3>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/kategori/insert') ?>" method="post">
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" class="form-control" name="kategori" required>
        </div>
        <div class="form-group">
            <input type="submit" name="Simpan" value="Submit">
        </div>
    </form>
</div>

<?= $this->endSection() ?>