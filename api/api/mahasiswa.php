<?php
class Mahasiswa{
 
    // database connection and table name
    private $conn;
    private $table_name = "mahasiswa";
 
    // object properties
    public $nim;
    public $nama;
    public $jurusan;
    public $angkatan;
     
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

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

    // create data mahasiswa
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


}