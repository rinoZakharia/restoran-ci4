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
    <div class="col-4"><a class="btn btn-primary" href="<?= base_url('/admin/menu/create') ?>" role="button">Tambah Data</a></div>
    <div class="col-8">
        <h3>Data Menu</h3>
    </div>
</div>

<div class="row">
    <div class="col-6 mt-2">
        <form action="<?= base_url('/admin/menu/read') ?>" method="get">
            <?= view_cell('\App\Controllers\Admin\Menu::option') ?>
        </form>
    </div>
</div>

<div class="row mt-2">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Gambar</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php $no;
        foreach ($menu as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['menu'] ?></td>
                <td><img style="width: 70px;" src="<?= base_url('/upload/' . $value['gambar'] . '') ?>" alt=""></td>
                <td><?= number_format($value['harga']) ?></td>
                <td>
                    <a href="<?= base_url() ?>/admin/menu/delete/<?= $value['idmenu'] ?>"><img src="<?= base_url('/icon/trash.svg') ?>" alt=""></a>
                    <a href="<?= base_url() ?>/admin/menu/find/<?= $value['idmenu'] ?>"><img src="<?= base_url('/icon/pencil.svg') ?>" alt=""></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?= $pager->links('group1', 'bootstrap') ?>
</div>
<?= $this->endSection() ?>