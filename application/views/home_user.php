<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="search" value="<?= $this->input->get('search') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>gambar</th>
                    <th>Nama TPA</th>
                    <th>Alamat</th>
                    <!-- <th>Keterangan</th> -->
                    <th>aksi</th>
                </tr>
            </thead>
            <?php
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><img src="<?php echo base_url() . './upload/' . $row->gambar ?>" class="rounded" width="200px"></td>
                    <td><?= $row->nama_tpa ?></td>
                    <td><?= $row->alamat ?></td>
                    <!-- <td><?= $row->keterangan ?></td> -->
                    <td>
                        <!-- <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Edit</a> -->
                        <a class="btn btn-xs btn-success" href="<?= site_url("User_tampil/detail/$row->id_tpa") ?>"><span class="glyphicon glyphicon-search"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>