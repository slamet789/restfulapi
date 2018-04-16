<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once 'database.php';
 
// instantiate mahasiswa object
include_once 'mahasiswa.php';
 
$database = new Database();
$db = $database->getConnection();
 
$mahasiswa = new Mahasiswa($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set mahasiswa property values

$mahasiswa->nim = 155410009;
$mahasiswa->nama = 'arif riyadi';
$mahasiswa->jurusan = 'ti';
$mahasiswa->angkatan = '2015';

 
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