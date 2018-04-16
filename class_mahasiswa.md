# Class Mahasiswa

Class mahasiswa adalah class main dimana memiliki beberapa block syntax yaitu :

- Blok syntax set database :

```
    // database connection and table name
    private $conn;
    private $table_name = "mahasiswa";
```

 Syntax di atas digunakan untuk inisialiasai vairabel conn dan inisialisasi nama tabel yang dilambagkan dengan variabel table_name yaitu tabel bernama mahasiswa.
 
 - Blok syntax inisialisasi variabel :
 
 ```
 // object properties
    public $nim;
    public $nama;
    public $jurusan;
    public $angkatan;
```

Sytax di atas digunakan untuk inisialisasai beberapa variabel yaitu nim, nama, jurusan dan angkatan yang semuanya bertipe public.


 - Blok syntax koneksi database :
 
```
// constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
```

Syntax di atas digunakan untuk menginisialisasi koneksi database yang akan dipakai.

 - Blok syntax untuk Read / Tampil :
 
```
 // read mahasiswa
    function read(){
 
    // select all query
    $query = "SELECT * FROM " . $this->table_name . " ";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
    }
```
    
Syntax diatas  merupakan syntax untuk membaca data dari tabel mahasiswa dimana disini akan memanggil function read yang selanjutnya akan memberikan nilai variabel query yaitu "SELECT * FROM " . $this->table_name . ", sehingga disini akan menampilkan semua data yang ada di tabel mahasiswa
Selanjutnya diinisialisasikan varaibel query ini menjadi stmt dan selanjunta query ini dijalankan dengan syntax 

```
    $stmt->execute();
```


 - Blok syntax untuk Create / Input :
 
```
/ create data mahasiswa
    function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                nim=:nim, nama=:nama, jurusan=:jurusan, angkatan=:angkatan";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->nim=htmlspecialchars(strip_tags($this->nim));
    $this->nama=htmlspecialchars(strip_tags($this->nama));
    $this->jurusan=htmlspecialchars(strip_tags($this->jurusan));
    $this->angkatan=htmlspecialchars(strip_tags($this->angkatan));
    
 
    // bind values
    $stmt->bindParam(":nim", $this->nim);
    $stmt->bindParam(":nama", $this->nama);
    $stmt->bindParam(":jurusan", $this->jurusan);
    $stmt->bindParam(":angkatan", $this->angkatan);
    
 
    // execute query
    if($stmt->execute()){
        return true;
        }
 
        return false;
     
    }
```

Syntax diatas digunakan merupakan syntax untuk memasukkan data ke tabel mahasiswa dimana disini akan memanggil function create yang selanjutnya akan memberikan nilai variabel query yaitu "INSERT INTO" . $this->table_name . "SET nim=:nim, nama=:nama, jurusan=:jurusan, angkatan=:angkatan", dalam syntax ini  akan memasukkan data ke kolom nim dengan nilai variabel nim, nama dengan nilai varaibel nama , jurusan dengan nilai vairiabel jurusan dan angkatan dengan nilai bariabel angkatan

 - Blok syntax untuk Delete / Hapus :

```
    // delete the product
    function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE nim = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->nim=htmlspecialchars(strip_tags($this->nim));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->nim);
 
    // execute query
    if($stmt->execute()){
        return true;
        }
 
        return false;
     
    }
 ```
 
Syntax diatas digunakan merupakan syntax untuk menghapus data dari tabel mahasiswa dimana disini akan memanggil function delete yang selanjutnya akan memberikan nilai variabel query yaitu "DELETE FROM " . $this->table_name . " WHERE nim = ?", dalam syntax ini  akan menghapus data dengan filter nim tertentu.