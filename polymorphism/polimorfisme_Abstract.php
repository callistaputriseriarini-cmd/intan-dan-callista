<?php
//kita buat abstract baru
//abstract itu adalah class yg tidak dipakai langsung jadi objek
abstract class NotifikasiWeb{
    protected string $penerima;
    protected string $pesan;

    public function __construct(string $penerima, string $pesan){
        $this->penerima = $penerima;
        $this->pesan = $pesan;
    }

//method biasa yg bisa diwariskan dan
//digunakan langsung oleh kelas turunananya
public function getinfoPengiriman(): string{
    return "Mengirim ke : {$this->penerima} ";
}

//abstract method : kontrak wajib yg harus di override
//oleh kelas turunannya
abstract public function kirimNotifikasi () : void;
}

//kelas turunan 1: notifikasi via email
class NotifEmail extends NotifikasiWeb{
    private string $subjek;

    public function __construct(string $penerima, string $pesan, string $subjek)
    {
        parent ::__construct($penerima, $pesan);
        $this->subjek = $subjek;
    }

    //wajib meng-overriding abstract method dari parent class

public function kirimNotifikasi(): void
{


     echo "<div style='border:2px solid #007bff;
          padding: 10px;
          margin-bottom: 10px;
          backround-color: #f8f9fa;
          '>";


          echo "<h4>[EMAIL] - Subjek: {$this->subjek}</h4>";
          echo "<p>{$this->getInfoPengiriman()}</p>";
          echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
          echo "</div>";
    }
}

//kelas turunan 2: notifikasi via whastapp
//class NotifWa;
class NotifWA extends NotifikasiWeb{
    //Wajib override abstract method dari parent
    #[Override]
    public function kirimNotifikasi(): void
    {
        echo "<div style='border:2px solid #28a745;
                        padding:10px;
                        margin-bottom:10px;
                        background-color:#e8f5e9;
                        '>";

    echo "<h4> [WhatsApp MASSAGE] </h4>";
    echo "<p>{$this->getInfoPengiriman()}</p>";
    echo "<p>Pesan: <i>{$this->pesan}</i></p>";
    echo "</div>";
    }
}

//Kelas turunan 3: Notifikasi Browser
class NotifBrowser extends NotifikasiWeb{
    private string $browserApp;

    public function __construct(string $penerima, string $pesan,
    string $browserApp)
    {
        parent::__construct($penerima, $pesan);
        $this->browserApp = $browserApp;
    }

//wajib override abstract method dari parent
public function kirimNotifikasi(): void
{
    echo "<div style='border:2px solid #effc17;
                     padding:10px; margin-bottom:10px;
                     background-color:#fff3cd;'>";

    echo "<h4>[PUSH NOTIF] - Browser: {$this->browserApp}</h4>";
    echo "<p>{$this->getInfoPengiriman()}</p>";
    echo "<p>Notif: <i>{$this->pesan}</i></p>";
    echo "</div>";
 }
}

//buat class manager untuk menerapkan polimorfisme
class NotifManager{
    //menerima tipe data berdasarkan abstract class
    //apapun objectnya, asalkan turunan notifikasiWeb, bisa masuk
    public static function proseskirim(Notifikasiweb $notif): void{
        $notif->kirimNotifikasi();
    }
}

class NotifGhithub extends NotifikasiWeb{
    //wajib override abstract method dari parent
    public function kirimNotifikasi(): void
    {
        echo "<div style='border : 2px solid #28a745;
        padding :10px;
        margin-bottom:10px;
        background-color: #e8f5e9;
        '>";

        echo"<h4>[Github]</h4>";
        echo"<p>{$this->getInfoPengiriman()}</p>";
        echo"<p?>Pesan: <i>{$this->pesan}</i></p>";
        echo"</div>";
    }
}
//penggunaan dan instansiasi object 
echo "<h2>Dashbroad Simulasi Pengiriman Notifikasi Web</h2>";

//membuat berbagai macam object notif
$notif1 = new notifEmail("intan@gmail.com", "akun anda berhasil didaftarkan.", "konfirmasi akun");
$notif2 = new notifWa("0098765336", "kode OTP anda adalah 9876 jangan berikan ke siapa pun!");
$notif3 = new NotifBrowser("Token_Device_Asus", "Ada diskon 40% untuk produk pilihan Anda!", "google chrome");
$notif4 = new NotifGhithub("Github", "kode telah diterima");

//mengirim dan menampilkan semua notif secara
//polimorfisme melalui manager
NotifManager::prosesKirim($notif1);
NotifManager::prosesKirim($notif2);
NotifManager::prosesKirim($notif3);
NotifManager::prosesKirim($notif4);


?>