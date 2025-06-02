<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama_kegiatan = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $waktu_kegiatan = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    // $nomerhp = mysqli_real_escape_string($koneksi, $_POST['nomerhp']);
    
    // Cek apakah NIM sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE id = '$id'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: index.php?status=gagal&pesan=NIM sudah terdaftar");
        exit();
    }
    
    // Query tambah data
    $query = "INSERT INTO tb_mahasiswa (id, nama_kegiatan, waktu_kegiatan) VALUES ('$id', '$nama_kegiatan', '$waktu_kegiatan')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=sukses");
    } else {
        header("Location: index.php?status=gagal");
    }
} else {
    header("Location: index.php");
}
?>