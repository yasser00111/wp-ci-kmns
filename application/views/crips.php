<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="search" value="<?=$this->input->get('search')?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary <?=($this->session->userdata('level')=='admin') ? '' : 'hidden'?>" href="<?=site_url('crips/tambah')?> "><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default <?=($this->session->userdata('level')=='admin') ? '' : 'hidden'?>" target="_blank" href="<?=site_url('crips/cetak?search=' . $this->input->get('search'))?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Nama Crips</th>
                <th>Nilai</th>
                <th class="<?=($this->session->userdata('level')=='admin') ? '' : 'hidden'?>">Aksi</th>
            </tr>
        </thead>
        <?php    
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no ?></td>
            <td><?=$row->nama_kriteria?></td>
            <td><?=$row->nama_crips?></td>
            <td><?=$row->nilai?></td>
            <td class="<?=($this->session->userdata('level')=='admin') ? '' : 'hidden'?>">
                <a class="btn btn-xs btn-warning" href="<?=site_url("crips/ubah/$row->kode_crips")?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger " href="<?=site_url("crips/hapus/$row->kode_crips")?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
</div>