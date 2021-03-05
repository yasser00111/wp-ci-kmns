<div class="row">
    <div class="col-sm-6">
        <?=print_error()?>
        <form method="post" action="<?=site_url('tpa/ubah/'.$row->id_tpa)?>">
            <div class="form-group">
                <label>ID TPA<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id_tpa" value="<?=$row->id_tpa?>" readonly/>
            </div>
            <div class="form-group">
                <label>Nama TPA <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_tpa" value="<?=$row->nama_tpa?>"/>
            </div>
            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="alamat" value="<?=$row->alamat?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="5" name="keterangan"><?=$row->keterangan?></textarea>
            </div>
            <div class="form-group">
                <label>Detail <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="5" name="detail"><?=$row->detail?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('tpa')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>        
        </form>
    </div>
</div>