<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Kasir</title>
</head>
<body>

<h2>Aplikasi Kasir</h2>

<form method="post">
    <label for="no_transaksi">Nomor Transaksi:</label><br>
    <input type="number" id="no_transaksi" name="no_transaksi" required><br>

    <label for="nama_pembeli">Nama Pembeli:</label><br>
    <input type="text" id="nama_pembeli" name="nama_pembeli" required><br>

    <label for="judul_buku">Judul Buku:</label><br>
    <input type="text" id="judul_buku" name="judul_buku" required><br>

    <label for="jumlah_buku">Jumlah Buku:</label><br>
    <input type="number" id="jumlah_buku" name="jumlah_buku" required><br>

    <label for="harga_buku">Harga Buku:</label><br>
    <input type="number" id="harga_buku" name="harga_buku" required><br>

    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_transaksi = (int) $_POST['no_transaksi'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $judul_buku = $_POST['judul_buku'];
    $jumlah_buku = (int) $_POST['jumlah_buku'];
    $harga_buku = (int) $_POST['harga_buku'];

    $total_belanja = $jumlah_buku * $harga_buku;
    $diskon_belanja = 0;
    $diskon_transaksi = 0;

    // Shopping discount based on total purchase amount
    if ($total_belanja > 150000) {
        $diskon_belanja += $total_belanja * 0.1;
    }

    // Transaction discount based on transaction number
    if ($no_transaksi <= 50) {
        $diskon_transaksi += $total_belanja * 0.05;
    }

    // Calculate total discount
    $total_diskon = $diskon_belanja + $diskon_transaksi;

    echo "<p>Halo, $nama_pembeli. Berikut adalah detail transaksi Anda:</p>";
    echo "<p>Nomor Transaksi: $no_transaksi</p>";
    echo "<p>Nama Pembeli: $nama_pembeli</p>";
    echo "<p>Judul Buku: $judul_buku</p>";
    echo "<p>Jumlah Buku: $jumlah_buku</p>";
    echo "<p>Harga Buku: $harga_buku</p>";
    echo "<p>Total Belanja: $total_belanja</p>";
    echo "<p>Diskon Belanja: $diskon_belanja rupiah</p>";
    echo "<p>Diskon Transaksi: $diskon_transaksi rupiah</p>";
    echo "<p>Total Diskon: $total_diskon rupiah</p>";
}
?>

</body>
</html>