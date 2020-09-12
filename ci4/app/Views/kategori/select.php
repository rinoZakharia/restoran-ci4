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
    <div class="col-4"><a class="btn btn-primary" href="<?= base_url('/admin/kategori/create') ?>" role="button">Tambah Data</a></div>
    <div class="col-8">
        <h3>Data Kategori</h3>
    </div>
</div>

<div class="row mt-2">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php $no;
        foreach ($kategori as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['kategori'] ?></td>
                <td>
                    <a href="<?= base_url() ?>/admin/kategori/delete/<?= $value['idkategori'] ?>"><img src="<?= base_url('/icon/trash.svg') ?>" alt=""></a>
                    <a href="<?= base_url() ?>/admin/kategori/find/<?= $value['idkategori'] ?>"><img src="<?= base_url('/icon/pencil.svg') ?>" alt=""></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?= $pager->links('group1', 'bootstrap') ?>
</div>
<?= $this->endSection() ?>