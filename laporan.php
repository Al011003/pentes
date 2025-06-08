<?php
$page_title = "Laporan Keuangan - AL Bank";
include 'header.php';
include 'db.php';

// Cek session dan role admin
if (!isset($_SESSION['username']) || ($_SESSION['role'] ?? '') !== 'admin') {
    echo "<p>Anda tidak punya akses ke halaman ini.</p>";
    include 'footer.php';
    exit;
}

// Ambil semua transaksi
$result = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY tanggal DESC");
?>

<h2>Laporan Keuangan</h2>
<p><a href="dashboard.php" class="back-link">⬅️ Kembali ke Dashboard</a></p>

<form action="export_pdf.php" method="POST">
    <button type="submit">Download PDF</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Deskripsi</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td data-label="ID"><?php echo (int)$row['id']; ?></td>
            <td data-label="Deskripsi"><?php echo htmlspecialchars($row['deskripsi']); ?></td>
            <td data-label="Jumlah">Rp <?php echo number_format($row['jumlah'], 0, ',', '.'); ?></td>
            <td data-label="Tanggal"><?php echo htmlspecialchars($row['tanggal']); ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<style>
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
form {
    text-align: center;
    margin-bottom: 20px;
}
button {
    background-color: #004080;
    color: white;
    border: none;
    padding: 10px 25px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button:hover {
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
@media screen and (max-width: 600px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }
    thead tr {
        display: none;
    }
    tbody tr {
        margin-bottom: 15px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        padding: 10px;
    }
    tbody td {
        padding-left: 50%;
        position: relative;
        text-align: right;
    }
    tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        width: 45%;
        padding-left: 15px;
        font-weight: 600;
        text-align: left;
    }
}
</style>

<?php include 'footer.php'; ?>
