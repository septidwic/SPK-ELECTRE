<h1>Laporan Alternatif</h1>
<table>
    <thead><tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Alternatif</th>
		<th>Alamat</th>
		<th>Tahun</th>
		
    </tr></thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_alternatif 
        WHERE 
            kode_alternatif LIKE '%$q%'
            AND nama_alternatif LIKE '%$q%' AND alamat_alternatif LIKE '%$q%' AND tahun LIKE '%$q%'
        ORDER BY kode_alternatif");
    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=++$no ?></td>
        <td><?=$row->kode_alternatif?></td>
        <td><?=$row->nama_alternatif?></td>
		<td><?=$row->alamat_alternatif?></td>
		<td><?=$row->tahun?></td>
    </tr>
    <?php endforeach;?>
</table>