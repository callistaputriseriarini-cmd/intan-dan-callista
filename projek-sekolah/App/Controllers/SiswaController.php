<?php
//buat namespace untuk controllers
namespace App\Controllers;

//kita panggil namespace model siswa -> menggunakan use
use App\Models\Siswa;

//kita buat kelas baru
class SiswaController{
    //method prosesData
    public function prosesData(): void{
        //simulasi ambil data dari model (yang nantinya dari database)
        $siswa1 = new Siswa("257010", "Callista", "XI", "Rekayasa Perangkat Lunak");

        //controller untuk memproses dan merender tampilan HTML
        echo "<div style='border: 2px solid #007bff;
        padding: 15px; border-radius: 8px; font-family: sans-serif;
        background: #f8f9fa;'>";

        echo "<h3 style='color #007bff; margin-top: 0;'>
        Data Profil Siswa (Via Controler)</h3>";

        echo "<b>NIS:</b> {$siswa1->getNIS()} <br>";
        echo "<b>Nama:</b> {$siswa1->getNama()} <br>";
        echo "<b>Kelas:</b> {$siswa1->getKelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa1->getJurusan()} <br>";
        echo "</div>";

        echo "<br>";

        $siswa2 = new Siswa("257016", "Intan", "XI", "Rekayasa Perangkat Lunak");

        //controller untuk memproses dan merender tampilan HTML
        echo "<div style='border: 2px solid #007bff;
        padding: 15px; border-radius: 8px; font-family: sans-serif;
        background: #f8f9fa;'>";

        echo "<h3 style='color #007bff; margin-top: 0;'>
        Data Profil Siswa (Via Controler)</h3>";

        echo "<b>NIS:</b> {$siswa2->getNIS()} <br>";
        echo "<b>Nama:</b> {$siswa2->getNama()} <br>";
        echo "<b>Kelas:</b> {$siswa2->getKelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa2->getJurusan()} <br>";
        echo "</div>";

        echo "<br>";

        $siswa3 = new Siswa("257044", "Kiki", "XI", "Teknik Elektronika Industri");

        //controller untuk memproses dan merender tampilan HTML
        echo "<div style='border: 2px solid #007bff;
        padding: 15px; border-radius: 8px; font-family: sans-serif;
        background: #f8f9fa;'>";

        echo "<h3 style='color #007bff; margin-top: 0;'>
        Data Profil Siswa (Via Controler)</h3>";

        echo "<b>NIS:</b> {$siswa3->getNIS()} <br>";
        echo "<b>Nama:</b> {$siswa3->getNama()} <br>";
        echo "<b>Kelas:</b> {$siswa3->getKelas()} <br>";
        echo "<b>Jurusan:</b> {$siswa3->getJurusan()} <br>";
        echo "</div>";

        echo "<br>";
    
    }
}

?>