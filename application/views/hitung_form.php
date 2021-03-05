<div class="panel panel-primary">
    <div class="panel-heading"><strong>Masukkan Nilai Kepentingan</strong></div>
    <div class="panel-body">
        <?=validation_errors()?>
        <?=form_open('hitung?id_beasiswa='. $beasiswa->id_beasiswa)?>
            <table class="table table-bordered">
                <thead><tr>
                    <th>Kriteria</th>
                    <?php foreach( $rows['kriteria'] as $row ): ?>
                    <th><?=$row['nama_kriteria']?></th>
                    <?php endforeach ?>
                </tr></thead>
                <tr>
                    <th>Kepentingan</th>
                    <?php foreach( $rows['kriteria'] as $row ): ?>
                    <td>
                        <input class="form-control" name="bobot[<?=$row['kode_kriteria']?>]" value="<?=$row['bobot']?>" />
                    </td>
                    <?php endforeach ?>
                </tr>
            </table>
            <div class="form-group">
                <label>Minimal Hasil</label>
                <input class="form-control" name="nilai_min" value="<?=set_value('nilai_min', $beasiswa->nilai_min)?>" style="display: inline-block; width: auto;" />
                <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Hitung</button>
            </div>
        </form>
    </div>
</div>