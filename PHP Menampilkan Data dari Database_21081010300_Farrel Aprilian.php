<?php

// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "sampledatabase";

// Koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data dari tabel Customers dan Products
$sql = "SELECT * FROM customers, products";

// Eksekusi query
$result = mysqli_query($conn, $sql);

// Cek apakah query mengembalikan hasil
if (mysqli_num_rows($result) > 0) {
    // Menampilkan data dalam bentuk tabel
    echo "<table>";
    echo "<tr>";
    echo "<th>Customer ID</th>";
    echo "<th>Customer Name</th>";
    echo "<th>Product ID</th>";
    echo "<th>Product Name</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["CustomerID"] . "</td>";
        echo "<td>" . $row["CustomerName"] . "</td>";
        echo "<td>" . $row["ProductID"] . "</td>";
        echo "<td>" . $row["ProductName"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data yang ditemukan.";
}

// Menutup koneksi
mysqli_close($conn);

?>
