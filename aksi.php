<?php
require_once'functions.php';

/**login */ 
if ($mod=='login'){
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
    if($row){
        $_SESSION['login'] = $row->user;

        redirect_js("index.php");
    } else{
        print_msg("Salah kombinasi username dan password.");
    }          
}
/** password */
else if ($mod=='password'){
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");        
    
    if($pass1=='' || $pass2=='' || $pass3=='')
        print_msg('Field bertanda * harus diisi.');
    elseif(!$row)
        print_msg('Password lama salah.');
    elseif( $pass2 != $pass3 )
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else{        
        $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");                    
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif($act=='logout'){
    unset($_SESSION['login']);
    header("location:login.php");
}

/** alternatif */    
else if($mod=='alternatif_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tahun = $_POST['tahun'];
    
    if($kode=='' || $nama=='' || $alamat=='' || $tahun=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        
   elseif($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, alamat_alternatif, Tahun) VALUES ('$kode', '$nama', '$alamat', '$tahun')");
        $db->query("INSERT INTO tb_relasi(kode_alternatif, kode_kriteria) SELECT '$kode', kode_kriteria FROM tb_kriteria");
        redirect_js("index.php?m=alternatif");
    }                    
} else if($mod=='alternatif_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tahun = $_POST['tahun'];
	
    
    if($kode=='' || $nama=='' || $alamat=='' || $tahun=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_alternatif SET nama_alternatif='$nama' SET alamat_alternatif='$alamat' SET Tahun='$tahun' WHERE kode_alternatif='$_GET[ID]'");
        redirect_js("index.php?m=alternatif");
    }    
} else if ($act=='alternatif_hapus'){
    $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
     $db->query("DELETE FROM tb_relasi WHERE kode_alternatif='$_GET[ID]'");
    header("location:index.php?m=alternatif");
} 
    
/** KRITERIA */    
else if($mod=='kriteria_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    
    if($kode=='' || $nama=='' ||$bobot=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        
   elseif($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode'"))
        print_msg("Kode sudah ada!");
    
    else{
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria,bobot) VALUES ('$kode', '$nama', '$bobot')"); 
        $db->query("INSERT INTO tb_relasi(kode_alternatif, kode_kriteria, nilai) SELECT kode_alternatif, '$kode', 0  FROM tb_alternatif");           
        redirect_js("index.php?m=kriteria");
    }                    
} else if($mod=='kriteria_ubah'){
    $nama = $_POST['nama'];    
    $bobot = $_POST['bobot'];
    
    if( $nama==''||$bobot=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
         $db->query("UPDATE tb_kriteria SET nama_kriteria='$nama', bobot='$bobot' WHERE kode_kriteria='$_GET[ID]'");
        redirect_js("index.php?m=kriteria");
    }    
} else if ($act=='kriteria_hapus'){
    $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_kriteria='$_GET[ID]'");
    header("location:index.php?m=kriteria");
} 
/** rel_alternatif_ubah */ 
else if ($mod=='rel_alternatif_ubah'){
    foreach($_POST as $key => $value){
        $ID = str_replace('ID-', '', $key);
        $db->query("UPDATE tb_relasi SET nilai='$value' WHERE ID='$ID'");
    }
    redirect_js("index.php?m=rel_alternatif");
}
?>
