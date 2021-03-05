<div class="panel panel-primary">
    <div class="panel-heading">3 Terbaik</div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead><tr>
                <th>#</th>
                <th>Total</th>
                <th>Rank</th>
            </tr> </thead> 
            <?php 
            $no = 1;
            foreach($rank as $key => $val):?>
            <tr>
                <td><?=$key?></td>
                <td><?=round($total[$key], 4)?></td>
                <td><?=$rank[$key]?></td>
            </tr>
            <?php 
            if (++$no > 3)
                break;
            endforeach?>  
        </table>
    </div>
</div>