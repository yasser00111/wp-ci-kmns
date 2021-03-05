<div class="row">
    <div class="col-sm-6">
        <?=print_error()?>
        <form method="post" action="<?=site_url("crips/ubah/$row->kode_crips")?>">
            <div class="form-group">
                <label>Kriteria <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_kriteria">
                    <option></option>
                    <?=get_kriteria_option(set_value('kode_kriteria', $row->kode_kriteria))?>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Crips <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_crips" value="<?=set_value('nama_crips', $row->nama_crips)?>"/>
            </div>
            <div class="form-group">
                <label>Nilai <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nilai" value="<?=set_value('nilai', $row->nilai)?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('crips')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>            
        </form>
    </div>
</div>