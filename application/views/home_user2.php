<div class="container-fluid">
    <div class="panel panel-default mt-4">
        <div class="panel-heading">
            <form class="form-inline">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Pencarian. . ." name="search" value="<?= $this->input->get('search') ?>" />
                </div>
                <div class="form-group">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
                </div>
            </form>


            <div class="row">
                <div class="row text-center mt-4">
                    <?php foreach ($rows as $row) : ?>
                        <div class="card ml-3" style="width: 18rem;">
                            <img src="<?php echo base_url() . './upload/' . $row->gambar ?>" class="rouded float-right" width="300px">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?php echo $row->nama_tpa ?></h5>
                                <small mb-3><?php echo $row->keterangan ?></small><br>
                                <span class="badge badge-pill badge-primary mb-3">Rp.<?php echo number_format($row->biaya_daftar, 0, ',', '.') ?></span><br>
                                <?php echo anchor('home_user/detail_user/' . $row->id_tpa, '<div class="btn btn-sm btn-success">Detail</div>') ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>