<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="search" value="<?= $this->input->get('search') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="<?= site_url('tpa/tambah') ?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama TPA</th>
                    <th>Alamat</th>
                    <th>Keterangan</th>
                    <!-- <th>Detail</th> -->
                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
            <?php
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->id_tpa ?></td>
                    <td><?= $row->nama_tpa ?></td>
                    <td><?= $row->alamat ?></td>
                    <td><?= $row->keterangan ?></td>
                    <!-- <td><?= $row->detail ?></td> -->
                    <td>
                        <a class="btn btn-xs btn-success" href="<?= site_url("tpa/detail/$row->id_tpa") ?>"><span class="glyphicon glyphicon-search"></span></a>
                        <a class="btn btn-xs btn-warning" href="<?= site_url("tpa/ubah/$row->id_tpa") ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="<?= site_url("tpa/hapus/$row->id_tpa") ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>