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
    <h3>Data pelanggan</h3>
</div>

<div class="row mt-2">
    <table class="table">
        <tr>
            <th>No</th>
            <th>pelanggan</th>
            <th>alamat</th>
            <th>telp</th>
            <th>email</th>
            <th>delete</th>
            <th>status</th>
        </tr>
        <?php $no;
        foreach ($pelanggan as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['pelanggan'] ?></td>
                <td><?= $value['alamat'] ?></td>
                <td><?= $value['telp'] ?></td>
                <td><?= $value['email'] ?></td>
                <td>
                    <a href="<?= base_url() ?>/admin/pelanggan/delete/<?= $value['idpelanggan'] ?>"><img src="<?= base_url('/icon/trash.svg') ?>" alt=""></a>
                </td>
                <td>
                    <?php if ($value['aktif'] == 0) {
                        $aktif = "AKTIF";
                    } else {
                        $aktif = "NON AKTIF";
                    } ?>
                    <a href="<?= base_url() ?>/admin/pelanggan/update/<?= $value['idpelanggan'] ?>/<?= $value['aktif'] ?>"><?= $aktif ?></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?= $pager->links('group1', 'bootstrap') ?>
</div>
<?= $this->endSection() ?>