<img src="assets/images/semarang.jpg" width=350 height=150 align="center" class="img-responsive" /> 
<div class="page-header">
    <h1>Nilai Bobot Alternatif</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="rel_alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" name="q" value="<?=$_GET['q']?>" placeholder="Pencarian..." />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead><tr>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <?php
                $aa = $db->get_var("SELECT COUNT(*) FROM tb_kriteria");
                if($aa>0):
                for($a = 1; $a<=$aa; $a++){
                    echo "<th>C$a</th>";
                }
                endif;  
                ?>
                <th>Aksi</th>
        </tr></thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_alternatif 
                WHERE  kode_alternatif LIKE '%$q%' OR nama_alternatif LIKE '%$q%' 
                ORDER BY kode_alternatif");
        $data = get_data();
        foreach($rows as $row):?>
        <tr>
            <td><?=$row->kode_alternatif?></td>
            <td><?=$row->nama_alternatif?></td>
            <?php foreach($data[$row->kode_alternatif] as $k => $v):?>
            <td><?=$v?></td>
            <?php endforeach?>
            <td>
                <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=<?=$row->kode_alternatif?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>        
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>