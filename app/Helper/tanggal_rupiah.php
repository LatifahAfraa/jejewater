<?php
// File untuk function yg akan dipakai secara general.
function DateTime($tgl)
{
    $nama_bulan = array(
        1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
        "September", "Oktober", "November", "Desember"
    );

    $tahun = substr($tgl, 0, 4);
    $bulan = $nama_bulan[(int)substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $time = substr($tgl, 10, 6);
    $text = "";
    $text .= $tanggal . " " . $bulan . " " . $tahun . " " . $time;
    return $text;
}

function TanggalHari($tgl, $tampil_hari = true)
{
    $nama_hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
    $nama_bulan = array(
        1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Juni", "Juli", "Agus",
        "Sept", "Okt", "Nov", "Des"
    );
    $tahun = substr($tgl, 0, 4);
    $bulan = $nama_bulan[(int)substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text = "";
    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari = $nama_hari[$urutan_hari];
        $text .= $hari . ", ";
    }
    $text .= $tanggal . " " . $bulan . " " . $tahun;
    return $text;
}

function TanggalIndo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return ($result);
}

function tanggal_indonesia($tgl, $tampil_hari = true)
{
    $nama_hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
    $nama_bulan = array(
        1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
        "September", "Oktober", "November", "Desember"
    );

    $tahun = substr($tgl, 0, 4);
    $bulan = $nama_bulan[(int)substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $time = substr($tgl, 10, 6);
    $text = "";
    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari = $nama_hari[$urutan_hari];
        $text .= $hari . ", ";
    }
    $text .= $tanggal . " " . $bulan . " " . $tahun . " " . $time;
    // $text .= $tanggal . " " . $bulan . " " . $tahun;
    return $text;
}

function TanggalEng($date)
{
    $BulanIndo = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = ltrim($tgl, 0) . " " . $BulanIndo[(int) $bulan - 1] . ", " . $tahun;
    return ($result);
}

function formatRupiah($angka)
{

    if (is_numeric($angka)) {
        $format_rupiah = 'Rp ' . number_format($angka, '2', ',', '.');
        return $format_rupiah;
    } else {
        echo "$angka" . " bukan angka yang valid!" . "\n";
    }
}

function Ribuan($angka)
{

    if (is_numeric($angka)) {
        $format_rupiah = number_format($angka, '0', ',', '.');
        return $format_rupiah;
    } else {
        echo "$angka" . " bukan angka yang valid!" . "\n";
    }
}

function bulanIndo($angka_bulan)
{
    $hasil = array(
        "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "Mei",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember",
        "1" => "Januari",
        "2" => "Februari",
        "3" => "Maret",
        "4" => "April",
        "5" => "Mei",
        "6" => "Juni",
        "7" => "Juli",
        "8" => "Agustus",
        "9" => "September"
    );
    return $hasil[$angka_bulan];
}

function bulanIndonesia($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);

    $result = $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return ($result);
}
