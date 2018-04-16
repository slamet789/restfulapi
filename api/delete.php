<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
// include database and object file
include_once 'database.php';
include_once 'mahasiswa.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare mahasiswa object
$mahasiswa = new Mahasiswa($db);
 
// get nim mahasiswa
$data = json_decode(file_get_contents("php://input"));
 
// set nim mahasiswa yang akan dihapus
$mahasiswa->nim = 155410047;
 
// delete 
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