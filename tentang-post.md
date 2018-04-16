# RESTful API#
## Tentang method Post/Create Restful Api ##

Setelah kita membuat file koneksi dengan nama database.php dan class
mahasiswa.php yang telah terdapat fungsi untuk create mahasiswa atau dengan
kata lain menyimpan data ke database.

```
<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
```

Skrip diatas merupakan kebutuhan-kebutuhan untuk header.

``` 
// get database connection
include_once 'database.php';
```

Skrip diatas digunakan untuk memanggil file databse.php yang berfungsi untuk mengkoneksikan ke database

```
// instantiate mahasiswa object
include_once 'mahasiswa.php';
```

Skrip diatas digunakan untuk memanggil file mahasiswa.php yang didalamnya terdapat fungsi untuk menyimpan data ke database

```
$database = new Database();
$db = $database->getConnection();
 
$mahasiswa = new Mahasiswa($db);
 ```

Skrip diatas digunakan untuk membuat objek baru untuk koneksi database dan class mahasiswa.

```
// get posted data
$data = json_decode(file_get_contents("php://input"));
```

Skrip diatas untuk memposting atau mengirimkan data seperti nim, nama, jurusan, dan angkatan ke database.

```
// set mahasiswa property values
$mahasiswa->nim = 155410009;
$mahasiswa->nama = 'arif riyadi';
$mahasiswa->jurusan = 'ti';
$mahasiswa->angkatan = '2015';
```

Skrip diatas merupakan Data value yang akan disimpan kedatabase. dapat diubah-ubah sesuai kebutuhan.

```
// create the data
if($mahasiswa->create()){
    echo '{';
        echo '"message": "Input Data Berhasil."';
    echo '}';
}
 
// if unable to create 
else{
    echo '{';
        echo '"message": "Input Data Tidak Berhasil."';
    echo '}';
}
?>
```

Skrip diatas untuk mengirimkan data ke database dan akan menampilkan peringatan jika input data berhasil atau Input data tidak berhasil.
