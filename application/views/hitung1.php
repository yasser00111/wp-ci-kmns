<div class="panel panel-primary">
    <div class="panel-heading">Hasil Analisa</div>
    <div class="table-responsive">        
        <table class="table table-bordered">
            <thead><tr>
                <th></th>
                <?php foreach( $kriteria as $row ): ?>
                <th><?=$row->nama_kriteria?></th>
                <?php endforeach ?>
            </tr></thead>
            <?php foreach( $analisa as $key => $val ): ?>
            <tr>
                <td><?=$alternatif[$key]->nama_alternatif?></td>
                <?php foreach( $val as $k => $v ): ?>
                <td><?=$v?></td>
                <?php endforeach ?> 
            </tr>
            <?php endforeach ?>                
        </table>                    
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Normalisasi</div>
    <div class="table-responsive">        
        <table class="table table-bordered">
            <thead><tr>
                <th></th>
                <?php foreach( $kriteria as $key => $val ): ?>
                <th><?=$key?></th>
                <?php endforeach ?>
            </tr></thead>
            <?php foreach($normal as $key => $val ): ?>
            <tr>
                <td><?=$alternatif[$key]->nama_alternatif?></td>
                <?php foreach( $val as $k => $v ): ?>
                <td><?=round($v, 5)?></td>
                <?php endforeach ?> 
            </tr>
            <?php endforeach ?>                
        </table>                    
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Normal Terbobot</div>
    <div class="table-responsive">        
        <table class="table table-bordered">
            <thead><tr>
                <th></th>
                <?php foreach( $kriteria as $key => $val ): ?>
                <th><?=$key?></th>
                <?php endforeach ?>
            </tr></thead>
            <tr>
                <td>Bobot</td>
                <?php foreach( $kriteria as $k => $v ): ?>
                <td><?=$v->bobot?></td>
                <?php endforeach ?> 
            </tr>
            <?php foreach($terbobot as $key => $val ): ?>
            <tr>
                <td><?=$alternatif[$key]->nama_alternatif?></td>
                <?php foreach( $val as $k => $v ): ?>
                <td><?=round($v, 5)?></td>
                <?php endforeach ?> 
            </tr>
            <?php endforeach ?>                
        </table>                    
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Matrik Solusi Ideal</div>
    <div class="table-responsive">        
        <table class="table table-bordered">
            <thead><tr>
                <th></th>
                <?php foreach( $kriteria as $key => $val ): ?>
                <th><?=$key?></th>
                <?php endforeach ?>
            </tr></thead>
            <?php foreach($solusi as $key => $val):?>
            <tr>
                <td><?=$key?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=round($v, 5)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach?>              
        </table>                    
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Jarak Solusi &amp; Nilai Preferensi</div>
    <div class="table-responsive">        
        <table class="table table-bordered">
            <thead><tr>
                <th></th>
                <th>Positif</th>
                <th>Negatif</th>
                <th>Preferensi</th>
            </tr></thead>
            <?php foreach($normal as $key => $val):?>
            <tr>
                <td><?=$key?></td>
                <td><?=round($jarak[$key]['positif'], 5)?></td>
                <td><?=round($jarak[$key]['negatif'], 5)?></td>
                <td><?=round($pref[$key], 5)?></td>
            </tr>
            <?php endforeach?>              
        </table>                    
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
        <?php  foreach($rank as $key => $val): ?>
            <tr>                
                <td><?=$key?> - <?=$rows['alternatif'][$key]->nama_alternatif?></td>                
                <td class="text-primary"><?=round($pref[$key], 4)?></td>
                <td class='text-primary'><?=$val?> </td>
            </tr>                
        <?php endforeach?>
        </table>                           
    </div>
    <div class="panel-body">
        <a class="btn btn-default" href="<?=site_url('hitung/cetak')?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
    </div>
</div>