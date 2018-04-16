<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once 'database.php';
include_once 'mahasiswa.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$mahasiswa = new Mahasiswa($db);
 
// query mahasiswa
$stmt = $mahasiswa->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $mhs_arr=array();
    $mhs_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
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