<div class="row">
    <div class="col-sm-6">
        <?= print_error() ?>
        <form method="post" action="<?= site_url('tpa/tambah') ?>">
            <div class="form-group">
                <label>ID TPA<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id_tpa" value="<?= set_value('id_tpa') ?>" />
            </div>
            <div class="form-group">
                <label>Nama TPA <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_tpa" value="<?= set_value('nama_tpa') ?>" />
            </div>
            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat') ?>" />
            </div>
            <div class="form-group">
                <label>Keterangan <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="5" name="keterangan"><?= set_value('keterangan') ?></textarea>
            </div>
            <div class="form-group">
                <label>biaya pendaftaran <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="5" name="biaya_daftar"><?= set_value('biaya_daftar') ?></textarea>
            </div>
            <div class="form-group">
                <label>Spp perbulan <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="5" name="spp"><?= set_value('spp') ?></textarea>
            </div>
            <div class="form-group">
                <label>kondisi Tpa <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="5" name="kondisi"><?= set_value('kondisi') ?></textarea>
            </div>
            <div class="form-group">
                <label>fasilitas TPA<span class="text-danger">*</span></label>
                <textarea class="form-control" rows="5" name="fasilitas"><?= set_value('fasilitas') ?></textarea>
            </div>
            <div class="form-group">
                <label>Rasio pengasuh <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="5" name="rasio"><?= set_value('rasio') ?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?= site_url('tpa') ?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>