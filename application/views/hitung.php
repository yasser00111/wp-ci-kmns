<?php
$c = $this->db->query("SELECT * FROM tb_rel_alternatif WHERE nilai < 0 ")->row();
if (!$alternatif || !$kriteria) :
    echo "anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
elseif ($c) :
    echo "anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Alternatif</strong>.";
else :
?>
    <div class="panel panel-primary">
        <div class="panel-heading">Masukan Nilai Kepentingan</div>
        <div class="panel-body">
            <form class="form-inline" method="POST">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                <?php foreach ($kriteria as $kt) : ?>
                                    <th><?= $kt->nama_kriteria ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Kepentingan</th>
                                <?php foreach ($kriteria as $kt) : ?>
                                    <td><input type="text" name="<?= $kt->kode_kriteria ?>" class="form-control" value="<?= $kt->bobot ?>" /></td>
                                <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Hitung</button>
        </div>

        </form>

    </div>
    <?php if ($_POST) : ?>
        <div class="panel panel-primary">
            <div class="panel-heading">Bobot Kepentingan</div>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <?php foreach ($kriteria as $kt) : ?>
                                <th><?= $kt->nama_kriteria ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Kepentingan</th>
                            <?php foreach ($bobot_kepentingan['kepentingan'] as $kt => $value) : ?>
                                <td><?= round($value, 2) ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <th>Bobot</th>
                            <?php foreach ($bobot_kepentingan['bobot'] as $kt => $value) : ?>
                                <td><?= round($value, 2) ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <th>Pangkat</th>
                            <?php foreach ($bobot_kepentingan['pangkat'] as $kt => $value) : ?>
                                <td><?= round($value, 2) ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Hasil Analisa</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <thead>
                                <th></th>
                                <?php foreach ($kriteria as $key => $val) : ?>
                                    <th><?= $val->nama_kriteria ?></th>
                                <?php endforeach ?>
                            </thead>
                        </tr>
                        <?php foreach ($matriks as $key => $val) : ?>
                            <tr>
                                <th><?= $alternatif[$key]->nama_alternatif ?></th>
                                <?php foreach ($val as $k => $v) : ?>
                                    <td><?= $v ?></td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Hasil Vektor S dan V</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                <th>Vektor S</th>
                                <th>Vektor V</th>

                            </tr>
                        </thead>
                        <?php foreach ($vektor as $key => $val) : ?>
                            <tr>
                                <th><?= $key ?>-<?= $alternatif[$key]->nama_alternatif ?></th>
                                <td><?= $val['s'] ?></td>
                                <td><?= $val['v'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Perangkingan</div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th></th>
                        <th>Total</th>
                        <th>Rank</th>
                    </tr>
                    <?php foreach ($rank as $key => $val) : ?>
                        <tr>
                            <td><?= $key ?>-<?= $alternatif[$key]->nama_alternatif ?></td>
                            <td class="text-primary"><?= round($vektor[$key]['v'], 4) ?></td>
                            <td class='text-primary'><?= $val ?> </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>