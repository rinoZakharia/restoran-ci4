<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col">
        <h3>Pembayaran Pelanggan</h3>
    </div>
</div>

<div class="row">
    <div class="col">
        <p>Pelanggan : <?= $order[0]['pelanggan'] ?></p>
    </div>
    <div class="col">
        <p>Tanggal : <?= date("d-m-yy", strtotime($order[0]['tglorder'])) ?></p>
    </div>
    <div class="col">
        <p>Total : <b><?= number_format($order[0]['total']) ?></b></p>
    </div>
</div>

<div class="row">
    <div class="col">
        <?php
        if (!empty(session()->getFlashdata('info'))) {
            echo '<div class="alert alert-danger" role="alert">';
            echo session()->getFlashdata('info');
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <form action="<?= base_url('/admin/order/update') ?>" method="post">
            <div class="form-group">
                <label for="kategori">Bayar</label>
                <input type="number" class="form-control" name="bayar" required>
                <input type="hidden" class="form-control" name="total" value="<?= $order[0]["total"] ?>" required>
                <input type="hidden" value="<?= $order[0]["idorder"] ?>" class="form-control" name="idorder" required>
            </div>
            <div class="form-group">
                <input type="submit" name="Simpan" value="Simpan">
            </div>
        </form>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <h4>Rincian order</h4>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php $no = 1;
            foreach ($detail as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value["menu"] ?></td>
                    <td><?= number_format($value["hargajual"]) ?></td>
                    <td><?= $value["jumlah"] ?></td>
                    <td><?= number_format($value["jumlah"] * $value["hargajual"]) ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?= $this->endSection() ?>