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
    <form action="<?= base_url('/admin/user/ubah') ?>" method="post">
        <div class="form-group">
            <label for="kategori">Email</label>
            <input type="email" value="<?= $user['email'] ?>" class="form-control" name="email" required>
            <input type="hidden" value="<?= $user['iduser'] ?>" class="form-control" name="iduser" required>
        </div>
        <div class="form-group">
            <label for="">Level</label>
            <select name="level" id="level" class=" form-control">
                <?php foreach ($level as $key) { ?>
                    <option <?php if ($user['level'] == $key) {
                                echo 'selected';
                            } ?> value="<?= $key ?>"><?= $key ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="Simpan" value="Submit">
        </div>
    </form>
</div>

<?= $this->endSection() ?>