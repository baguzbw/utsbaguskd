<?php
function registrasi($data){
    include 'koneksi.php';
    $namalengkap = $data["namalengkap"];
    $username = $data["username"];
    $password = $data["password"];
    //enkripsi
    $password_salt = $password . $username;
    $password_enc = EncryptPassword($password_salt);
    mysqli_query($conn, "INSERT INTO user VALUES('','$namalengkap','$username','$password_enc')");
    return mysqli_affected_rows($conn);
}

function encryptPassword($pass) {
    include 'assets/lib.php';

    $plain = str_replace(' ', '', $pass);
    $kunci = 'skdbagus';
    $panjang_plain = strlen($plain);
    $panjang_kunci = strlen($kunci);

    $index_x = 0;
    $index_y = 0;
    $hasil_cipher = array();
    $hasil_akhir = '';

    while ($index_x < $panjang_plain) {
        $x = substr($plain, $index_x, 1);
        $y = substr($kunci, $index_y, 1);

        $hasil_cipher[$index_x] = $tabel_vigenere[huruf_ke_angka($x)][huruf_ke_angka($y)];

        $index_x++;
        $index_y++;

        if ($index_y == $panjang_kunci) {
            $index_y = 0;
        }
    }

    $i = 0;
    while ($i < $index_x) {
        $hasil_akhir .= $hasil_cipher[$i];
        $i++;
    }

    return $hasil_akhir;
}
?>
