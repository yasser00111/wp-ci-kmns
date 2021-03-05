<div class="row">
    <div class="col-md-6">
        <?php echo validation_errors(); ?>
        <?php echo form_open("kriteria/ubah/$row->kode_kriteria"); ?>
        <div class="form-group">
            <label>Kode</label>
            <input class="form-control" name="kode" value="<?= set_value('kode', $row->kode_kriteria) ?>" readonly="" />
        </div>
        <div class="form-group">
            <label>Nama <span class="text-danger">*</span></label>
            <input class="form-control" name="nama" value="<?= set_value('nama', $row->nama_kriteria) ?>" />
        </div>
        <div class="form-group">
            <label>Atribut</label>
            <select class="form-control" name="atribut">
                <option></option>
                <?= get_atribut_option(set_value('atribut', $row->atribut)) ?>
            </select>
        </div>
        <div class="form-group">
            <label>Bobot <span class="text-danger">*</span></label>
            <input class="form-control" name="bobot" value="<?= set_value('bobot', $row->bobot) ?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            <a class="btn btn-danger" href="<?= site_url('kriteria') ?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </div>
        </form>
    </div>
</div>