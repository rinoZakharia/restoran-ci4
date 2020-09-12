<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php
if (isset($_GET['page_group1'])) {
    $page = $_GET['page_group1'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
} else {
    $no = 1;
}
?>

<div class="row">
    <div class="col-12">
        <form action="<?= base_url('/admin/ordetail/cari') ?>" method="post">
            <div class="form-group col-6 float-left">
                <label for="kategori">Awal</label>
                <input type="date" class="form-control" name="awal" required>
            </div>
            <div class="form-group col-6 float-left">
                <label for="kategori">Sampai</label>
                <input type="date" class="form-control" name="sampai" required>
            </div>
            <div class="form-group ml-3">
                <input type="submit" name="Cari" value="Cari">
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col">
        <h3>Data Rincian Order</h3>
    </div>
</div>

<div class="row mt-2">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php $no;
        foreach ($detail as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['tglorder'] ?></td>
                <td><?= $value['menu'] ?></td>
                <td><?= $value['harga'] ?></td>
                <td><?= $value['jumlah'] ?></td>
                <td><?= $value['jumlah'] * $value['harga'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <?= $pager->links('group1', 'bootstrap') ?>
</div>
<?= $this->endSection() ?>