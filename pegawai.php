<?php
session_start();
$page_title = "Manajemen Pegawai - AL Bank";
include 'header.php';
include 'db.php'; // koneksi db

$role = $_SESSION['role'] ?? 'guest';

// Handle tambah data (hanya admin)
if (isset($_POST['tambah'])) {
    $nama = mysqli_real_escape_string($conn, trim($_POST['nama']));
    $jabatan = mysqli_real_escape_string($conn, trim($_POST['jabatan']));
    $gaji = (int)$_POST['gaji'];

    if ($nama === '' || $jabatan === '' || $gaji <= 0) {
        $msg = "Data tidak valid. Pastikan semua field terisi dengan benar.";
    } else {
        $query = "INSERT INTO pegawai (nama, jabatan, gaji) VALUES ('$nama', '$jabatan', $gaji)";
        if (!mysqli_query($conn, $query)) {
            $msg = "Error saat menambah data: " . mysqli_error($conn);
        } else {
            header("Location: pegawai.php");
            exit;
        }
    }
}

// Handle hapus data (semua user bisa)
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    if ($id > 0) {
        $query = "DELETE FROM pegawai WHERE id = $id";
        if (!mysqli_query($conn, $query)) {
            $msg = "Error saat menghapus data: " . mysqli_error($conn);
        } else {
            header("Location: pegawai.php");
            exit;
        }
    }
}


// Handle search (semua user bisa search)
$search = $_GET['search'] ?? '';
$search_sql = mysqli_real_escape_string($conn, $search); // cegah SQL error

$query = "SELECT * FROM pegawai";
if ($search !== '') {
    $query .= " WHERE nama LIKE '%$search_sql%' OR jabatan LIKE '%$search_sql%'";
}
$query .= " ORDER BY id ASC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<title><?= htmlspecialchars($page_title) ?></title>
<style>
/* ... CSS sama seperti sebelumnya ... */
.back-link {
    display: inline-block;
    margin-bottom: 20px;
    color: #004080;
    text-decoration: none;
    font-weight: 600;
}
.back-link:hover {
    text-decoration: underline;
}
form.form-inline {
    margin-bottom: 20px;
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    align-items: center;
}
form.form-inline label {
    display: flex;
    flex-direction: column;
    font-weight: 600;
    font-size: 14px;
}
form.form-inline input {
    padding: 5px 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 180px;
}
form.form-inline button {
    background-color: #004080;
    color: white;
    border: none;
    padding: 10px 25px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
form.form-inline button:hover {
    background-color: #002950;
}
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
    border-radius: 8px;
    overflow: hidden;
}
thead {
    background-color: #004080;
    color: white;
}
th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
tbody tr:hover {
    background-color: #f1f5fb;
}
.logout-btn {
    color: red;
    text-decoration: none;
    font-weight: 700;
}
.logout-btn:hover {
    text-decoration: underline;
}
</style>
</head>
<body>

<h2>Manajemen Data Pegawai</h2>
<p><a href="dashboard.php" class="back-link">⬅️ Kembali ke Dashboard</a></p>

<!-- FORM SEARCH -->
<form method="GET" class="form-inline" autocomplete="off">
    <label>
        Cari Pegawai:
        <!-- DISENGAJA TIDAK PAKAI htmlspecialchars() SUPAYA RENTAN XSS -->
        <input type="text" name="search" value="<?= $search ?>" placeholder="Masukkan nama atau jabatan">
    </label>
    <button type="submit">Cari</button>
</form>

<?php if (!empty($msg)) echo "<p style='color:red;'>$msg</p>"; ?>

<!-- TAMBAHKAN BAGIAN INI: LANGSUNG TAMPILKAN PARAMETER SEARCH TANPA ESCAPE -->
<?php if ($search !== ''): ?>
    <p>Hasil pencarian untuk: <?= $search ?></p>
<?php endif; ?>

<h3>Daftar Pegawai</h3>

<?php
if (!$result) {
    echo "<p>Error query: " . mysqli_error($conn) . "</p>";
} elseif (mysqli_num_rows($result) === 0) {
    echo "<p>Tidak ada data pegawai.</p>";
} else {
    echo '<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Gaji</th>';
    if ($role === 'admin') {
        echo '<th>Aksi</th>';
    }
    echo '</tr>
        </thead>
        <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        // Masih sengaja tidak pakai htmlspecialchars untuk demo XSS
        echo "<tr>
            <td>" . (int)$row['id'] . "</td>
            <td>" . $row['nama'] . "</td>
            <td>" . $row['jabatan'] . "</td>
            <td>Rp " . number_format($row['gaji'], 0, ',', '.') . "</td>";
        if ($role === 'admin') {
            echo "<td><a href='pegawai.php?hapus=" . (int)$row['id'] . "' onclick=\"return confirm('Yakin hapus?')\" class=\"logout-btn\">Hapus</a></td>";
        }
        echo "</tr>";
    }

    echo '</tbody></table>';
}
?>

<?php include 'footer.php'; ?>
</body>
</html>
