
## Tentang Method Delete RESTful API ##
* Membuat file delete.php untuk memanggil fungsi delete() pada file mahasiswa.php, script file delete.php seperti berikut:
```
<<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
// include database and object file
include_once 'database.php';
include_once 'mahasiswa.php';

```
Skrip di atas merupakan kebutuhan untuk header dan include. Menginclude file database.php berisi script untuk menghubungkan ke database, pada proyek ini menggunakan mysql dan file mahasiswa.php yang mendeklarasikan atribut objek serta nanti digunakan untuk memanggil fungsi pembacaan data.
```
$database = new Database();
$db = $database->getConnection();
```
Melakukan instansiasi database dan memanggil fungsi getConnection() untuk menghubungkan ke database.
```
$mahasiswa = new Mahasiswa($db);
```
Mengambil data dengan menggunakan json
```
$data = json_decode(file_get_contents("php://input"));
```
Mengeset nim mahasiswa yang datanya akan dihapus.
```
$mahasiswa->nim = 155410047;
```
* Menambahkan fungsi delete() untuk seleksi dengan if else pada file mahasiswa.php seperti berikut :
```
    if($mahasiswa->delete()){
    echo '{';
        echo '"message": "Data berhasil dihapus."';
    echo '}';
}
 
// if unable to delete 
else{
    echo '{';
        echo '"message": "Tidak berhasil menghapus data."';
    echo '}';
}
?>
```
Pada fungsi delete() tersebut berisi perintah untuk membuat perintah query sql untuk menghapus seluruh data pada tabel mahasiswa sesuai dengan nim yang sudah ditentukan, yaitu 155410047.

* Hasil eksekusi untuk membaca data mahasiswa dari tools Postman sebagai berikut :
![Hasil Read()](https://github.com/slamet789/restfulapi/blob/tentang-read/hasil-read.png "Hasil membaca data mahasiswa")