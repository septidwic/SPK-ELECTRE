<img src="assets/images/semarang.jpg" width=350 height=150 align="center" class="img-responsive" /> 
<div class="page-header">
    <h1>Alternatif</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=alternatif_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" target="_blank" href="cetak.php?m=alternatif&q=<?=$_GET['q']?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
			<!--<div class="form-group">
			<form method="POST" class="form-inline" action="">
			<select name="Tahun" class="form-control" required="required">
				<option value="">Select Years</option>
				<option value="1">2017</option>
				<option value="2">2018</option>
				<option value="3">2019</option>
				<option value="4">2020</option>
				<option value="5">2021</option>
				</select>
			<button class="btn btn-primary" name="filter"><span class="glyphicon glyphicon-search"></span> Search</button>
		</form>
			</div>-->
			
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead><tr>
                <th>Kode</th>
                <th>Nama Alternatif</th>
				<th>Alamat Alternatif</th>
				<th>Tahun</th>
            </tr></thead>
            <?php
            $q = esc_field($_GET['q']);
           
            $rows = $db->get_results("SELECT * FROM tb_alternatif 
            WHERE  kode_alternatif LIKE '%$q%' AND nama_alternatif LIKE '%$q%' AND alamat_alternatif LIKE '%$q%' AND tahun LIKE '%$q%'
            ORDER BY kode_alternatif");
            foreach($rows as $row):?>
            <tr>
                <td><?=$row->kode_alternatif ?></td>
                <td><?=$row->nama_alternatif?></td>
				<td><?=$row->alamat_alternatif?></td>
				<td><?=$row->tahun?></td>
                <td class="nw">
                    <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&amp;ID=<?=$row->kode_alternatif?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&amp;ID=<?=$row->kode_alternatif?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>