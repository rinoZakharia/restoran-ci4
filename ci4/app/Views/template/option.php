<div class="form-group">
    <select name="idkategori" id="idkategori" class=" form-control" onchange="this.form.submit()">
        <option value="1">Cari...</option>
        <?php foreach ($kategori as $key => $value) { ?>
            <option value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
        <?php } ?>
    </select>
</div>