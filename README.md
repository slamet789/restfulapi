# Restful Api 
REST (REpresentational State Transfer) merupakan standar arsitektur komunikasi berbasis web yang sering diterapkan dalam pengembangan layanan berbasis web. Umumnya menggunakan HTTP (Hypertext Transfer Protocol) sebagai protocol untuk komunikasi data. Berikut metode HTTP yang umum digunakan dalam arsitektur berbasis REST.
* GET, menyediakan hanya akses baca pada resource
* PUT, digunakan untuk menciptakan resource baru
* DELETE, digunakan untuk menghapus resource
* POST, digunakan untuk memperbarui resource yang ada atau membuat resource baru
* OPTIONS, digunakan untuk mendapatkan operasi yang disupport pada resource.

Pada percobaan pembuatan Restful Api ini menggunakan database MySql, tabel yang dibuat bernama mahasiswa dengan 4 buah field/kolom yaitu: field nim, nama, angkatan dan jurusan. Untuk langkah pertama, dibuatlah file database.php untuk melakukan koneksi ke database MySql. Berikut script database.php :

```
<?php
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "api_db";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>

```






