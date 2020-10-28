<h1>Perhitungan</h1>
<?php    
$data = get_data();
$bobot = array();
foreach($KRT as $key => $val){
    $bobot[$key] = $val['bobot'];
}
$electre = new Electre($data, $bobot);
?>
<table class="table table-bordered table-striped table-hover"> 
    <thead><tr>
        <th></th>
        <?php foreach($electre->agregate as $key => $val):?>
        <th><?=$ALT[$key]?></th>
        <?php endforeach?> 
        <th>Total</th>
        <th>Rank</th>
    </tr></thead>
    <?php 
    $rank = get_rank($electre->agregate);
    foreach($rank as $key => $val):?>
    <tr>
        <td><?=$ALT[$key]?></td>
        <?php foreach($electre->agregate[$key] as $k => $v):?>
        <td><?=$key==$k ? '-' : round($v, 4)?></td>
        <?php endforeach?>
        <td><?=$electre->total[$key]?></td>
        <td><?=$rank[$key]?></td>
    </tr>
    <?php endforeach;?>
</table>