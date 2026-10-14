<?php
//kita buat parent class
class pegawai{
    protected $nama_pegawai;
    protected $gaji_pegawai;

    //method construct
    public function __construct($nama_pegawai, $gaji_pegawai){
        $this->nama_pegawai = $nama_pegawai;
        $this->gaji_pegawai = $gaji_pegawai;
    }

    //fungsi getter untuk ambil nama
    public function getNama(){
        return $this->nama_pegawai;
    }

    //method dasar di parent class
    public function hitungGaji(){
        return $this->gaji_pegawai;
    }
}

//polimorfisme dengan inheritance, menggunakan overriding
class freelancer extends pegawai{
    private $projectRate;
    private $jumlahProject;

    public function __construct($nama_pegawai, $projectRate, $jumlahproject){
        //gaji dibuat 0, karena freelancer hanya dibayar per project
        parent :: __construct($nama_pegawai,0);
        $this->projectRate = $projectRate;
        $this->jumlahProject = $jumlahproject;
    }
        //Overriding untuk menghitung ulang gaji
        //menimpa atau menulis kembali karakteristik method hitunggaji
        public function hitungGaji()
        {
            return $this->projectRate * $this->jumlahProject;
        }
}

        //child class kedua
        class KaryawanTetap extends pegawai{
            private $tunjangan;

            public function __construct($nama_pegawai, $gaji_pegawai, $tunjangan)
            {
                parent::__construct($nama_pegawai, $gaji_pegawai);
                $this->tunjangan = $tunjangan;
            }

            //polimorifsme dengan overriding/menipulasi karakteristik 
            public function hitungGaji()
            {
                //ambi; gaji pokok dari parent lalu ditambahkan tunjangan
                return parent::hitungGaji() + $this->tunjangan;
            }
        }
    //buat fungsi untuk menerapkan polimorfisme
     function cetakGaji(pegawai $pegawai){
        echo "Gaji ". $pegawai->getNama(). ":Rp." .
        number_format($pegawai->hitungGaji(), 0,',','.') . "<br>";
     }

     //penggunaan class dan fungsi

    $pegawaiBiasa = new pegawai("intan", 3000000);
    $pegawaiFreelancer = new freelancer("calis", 2000000, 4);
    $pegawaiTetap = new KaryawanTetap("dian", 5000000, 2000000);

    //menggunakan satu fungsi yang sama untuk berbagai objek
    cetakGaji($pegawaiBiasa);
    cetakGaji($pegawaiFreelancer);
    cetakGaji($pegawaiTetap);
?>