<img src="assets/images/semarang.jpg" width=350 height=150 align="center" class="img-responsive" /> 
<?php
    $row = $db->get_results("SELECT nilai FROM tb_relasi where nilai is null ");
    if (!$ALT || !$KRT):
        echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
    elseif ($row):
        echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Alternatif</strong>.";
    else:
?>
<div class="page-header">
    <h1>Perhitungan</h1>
</div>
<?php        
$data = get_data();
$bobot = array();
foreach($KRT as $key => $val){
    $bobot[$key] = $val['bobot'];
}
$electre = new Electre($data, $bobot);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c1" data-toggle="collapse">Data</a></a></h3>
    </div>
    <div class="table-responsive collapse" id="c1">
        <table class="table table-bordered table-striped table-hover"> 
            <thead><tr>
                <th></th>
                <?php foreach($electre->kriteria as $key => $val):?>
                <th><?=$KRT[$key]['nama_kriteria']?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($data as $key => $val):?>
            <tr>
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$v?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c2" data-toggle="collapse">Matriks R (Normalisasi)</a></h3>
    </div>
    <div class="table-responsive collapse" id="c2">
        <table class="table table-bordered table-striped table-hover"> 
            <thead><tr>
                <th></th>
                <?php foreach($electre->kriteria as $key => $val):?>
                <th><?=$KRT[$key]['nama_kriteria']?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->normal as $key => $val):?>
            <tr>
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=round($v, 4)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c3" data-toggle="collapse">Matriks V (Normalisasi Terbobot)</a></h3>
    </div>
    <div class="table-responsive collapse" id="c3">
        <table class="table table-bordered table-striped table-hover"> 
            <thead><tr>
                <th></th>
                <?php foreach($electre->kriteria as $key => $val):?>
                <th><?=$KRT[$key]['nama_kriteria']?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->terbobot as $key => $val):?>
            <tr>
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=round($v, 4)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c4" data-toggle="collapse">Concordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="c4">
        <table class="table table-bordered table-striped table-hover"> 
            <thead><tr>
                <th></th>
                <?php foreach($electre->concordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->concordance as $key => $val):?>
            <tr>
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : implode(', ', $v)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>    
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c5" data-toggle="collapse">Disordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="c5">
        <table class="table table-bordered table-striped table-hover"> 
            <thead><tr>
                <th></th>
                <?php foreach($electre->discordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->discordance as $key => $val):?>
            <tr>
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : implode(', ', $v)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>          
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c6" data-toggle="collapse">Matriks Concordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="c6">
        <table class="table table-bordered table-striped table-hover"> 
            <thead><tr>
                <th></th>
                <?php foreach($electre->m_concordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->m_concordance as $key => $val):?>
            <tr>
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : $v?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>     
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c7" data-toggle="collapse">Matriks Discordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="c7">
        <table class="table table-bordered table-striped table-hover"> 
            <thead><tr>
                <th></th>
                <?php foreach($electre->m_discordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->m_discordance as $key => $val):?>
            <tr>
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : round($v, 4)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>        
 
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c8" data-toggle="collapse">Matriks Dominan Concordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="c8">
        <table class="table table-bordered table-striped table-hover"> 
            <thead><tr>
                <th></th>
                <?php foreach($electre->md_concordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->md_concordance as $key => $val):?>
            <tr>
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : $v?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>     
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c9" data-toggle="collapse">Matriks Dominan Discordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="c9">
        <table class="table table-bordered table-striped table-hover"> 
            <thead><tr>
                <th></th>
                <?php foreach($electre->md_discordance as $key => $val):?>
                <th><?=$ALT[$key]?></th>
                <?php endforeach?> 
            </tr></thead>
            <?php foreach($electre->md_discordance as $key => $val):?>
            <tr>
                <td><?=$ALT[$key]?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=$key==$k ? '-' : round($v, 4)?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>         
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#c10" data-toggle="collapse">Agregate Dominance Matrix E</a></h3>
    </div>
    <div class="table-responsive collapse in" id="c10">
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
    </div>
    <div class="panel-footer">        
         <a class="btn btn-default" target="_blank" href="cetak.php?m=hitung"><span class="glyphicon glyphicon-print"></span> Cetak</a>
    </div>
</div>        
<?php endif; ?>