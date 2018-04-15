# RESTful API#
## Tentang Method Read/Get RESTful API ##
Setelah membuat class objek mahasiswa.php yang mendeklarasikan atribut objek mahasiswa yaitu nim, nama, jurusan, dan angkatan. Selanjutnya agar dapat mengakses atau membaca data Mahasiswa maka perlu dibuat fungsi untuk membaca data.
* Membuat file read.php untuk memanggil fungsi read() pada file mahasiswa.php, script file read.php seperti berikut:
```
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'database.php';
include_once 'mahasiswa.php';
```
Menginclude file database.php berisi script untuk menghubungkan ke database, pada proyek ini menggunakan mysql dan file mahasiswa.php yang mendeklarasikan atribut objek serta nanti digunakan untuk memanggil fungsi pembacaan data.
```
$database = new Database();
$db = $database->getConnection();
```
Melakukan instansiasi database dan memanggil fungsi getConnection() untuk menghubungkan ke database.
```
$mahasiswa = new Mahasiswa($db);
```
Melakukan inisialisasi  objek Mahasiswa.
```
$stmt = $mahasiswa->read();
$num = $stmt->rowCount();

if($num>0){
    $mhs_arr=array();
    $mhs_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $mhs_item=array(
            "nim" => $nim,
            "nama" => $nama,
            "jurusan" => $jurusan,
            "angkatan" => $angkatan
        );
 
        array_push($mhs_arr["records"], $mhs_item);
    }
 
    echo json_encode($mhs_arr);
}
 
else{
    echo json_encode(
        array("message" => "Data tidak ditemukan.")
    );
}
?>
```
Membuat query untuk menampilkan data yang diminta yang disimpan pada objek array mhs_item[]. Objek mahasiswa memanggil fungsi read() pada class mahasiswa. Selanjutnya menambahkan fungsi read() pada file mahasiswa.php.
* Menambahkan fungsi read() pada file mahasiswa.php seperti berikut :
```
    function read(){
		$query = "SELECT * FROM " . $this->table_name . " "; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute(); 
		return $stmt;
    }
```
Pada fungsi read() tersebut berisi perintah untuk membuat perintah query sql untuk menampilkan seluruh data pada tabel mahasiswa, ```$this->table_name;``` berisi nama table yang digunakan yaitu tabel yang telah dideklarasikan ```private $table_name = "mahasiswa";```. Query mengembalikan nilai dari eksekusi perintah.
* Hasil eksekusi untuk membaca data mahasiswa dari tools Postman sebagai berikut :
