<?php
//panggil namespace
use App\Models\siswa;
//bisa digunakan alias jika nama kelasnya sama persis
use App\Controllers\SiswaController;

//memuat file kelas
require_once 'App/Models/siswa.php';
require_once 'App/controllers/SiswaController.php';

echo "<h2>Sistem Informasi Sekolah - SMK TEXMACO SEMARANG</h2>";
echo "<hr>";

//instansiasi controller dan jalankan method
$controller = new SiswaController();
$controller->prosesData();

echo "<br> <hr>";

//instansiasi object
$siswa1 = new siswa("25703", "intan", "RPL", "XI");
echo "NIS: " .$siswa1->getNis(). "<br>";
echo "NAMA: " .$siswa1->getNama(). "<br>";
echo "JURUSAN: " .$siswa1->getJurusan(). "<br>";
echo "KELAS: " .$siswa1->getKelas();


?>
