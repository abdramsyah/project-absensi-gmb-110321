<?php

$doc = "../source/member.json"; //Variabel berisi nama doc di mana data dibaca dan ditulis.
$dataSiswa = array(); //Variabel array kosong untuk menampung data siswa dari doc.

//Mengambil data dari doc dan mengkonversi data tersebut menjadi array PHP.
//Variabel $dataJson berisi data dari doc dalam bentuk array Json.
//Variabel $dataSiswa berisi data pada $dataJson yang sudah dikonversi menjadi array PHP.
$dataJson = file_get_contents($doc);
$dataSiswa = json_decode($dataJson, true);
echo $dataJson;
echo '<br>';
echo '<br>';
// $keys = array_keys($dataJson);
// print_r('ini ==> ' . $keys['nama']);

if (isset($_POST['kirim'])) {
    $siswa = array(); //Variabel array kosong untuk menampung data nilai yang dimasukkan dari form.

    // example ===========
    // Nama : Rini Puspita Julianti
    // Judul : Terusir
    // Halaman : 86-93
    // Kutipan : -

    // Hamka
    // end example =======

    //Memasukkan data siswa dari form ke dalam array $databaru.
    $gmb = $_POST['gmb'];
    $temp = explode(PHP_EOL, $gmb);
    // echo $gmb;
    echo '<br>';
    // print_r(explode(PHP_EOL, $gmb));
    $hit = count($dataSiswa);
    echo $hit;
    $numb;


    if ($hit == 0) {
        $numb = 1;
    } else {
        $numb = $hit;
    }

    $dataBaru = array(
        'no' => $numb,
        'name' => explode(': ', $temp[0])[1],
        'title' => explode(': ', $temp[1])[1],
        'page' => explode(': ', $temp[2])[1],
        'quote' => explode(': ', $temp[3])[1],
    );

    // $_POST['id'] = array_slice($dataSiswa, -1)[0]['id'] + 1;

    array_push($dataSiswa, $dataBaru); //Menambahkan data baru ke dalam data yang sudah ada dalam doc. 

    //Mengkonversi kembali data gaji dari array PHP menjadi array Json dan menyimpannya ke dalam doc.
    $dataJson = json_encode($dataSiswa, JSON_PRETTY_PRINT);
    file_put_contents($doc, $dataJson);
    // print_r('ini ' . $dataJson);
}
