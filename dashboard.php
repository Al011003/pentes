<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
include 'db.php';

$username = $_SESSION['username'];
$role = $_SESSION['role'];

// Ambil total transaksi sebagai ringkasan
$total_query = "SELECT SUM(jumlah) as total FROM transaksi";
$total_result = mysqli_query($conn, $total_query);
$total_data = mysqli_fetch_assoc($total_result);
$total = $total_data['total'] ?? 0;

// Ambil data transaksi bulanan untuk grafik (misal 6 bulan terakhir)
$chart_query = "
    SELECT DATE_FORMAT(tanggal, '%Y-%m') AS bulan, SUM(jumlah) AS total
    FROM transaksi
    WHERE tanggal >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
    GROUP BY bulan
    ORDER BY bulan ASC
";
$chart_result = mysqli_query($conn, $chart_query);

$labels = [];
$data_points = [];
while ($row = mysqli_fetch_assoc($chart_result)) {
    $labels[] = $row['bulan'];
    $data_points[] = (float) $row['total'];
}
?>

<?php $page_title = 'Dashboard'; ?>
<?php include 'header.php'; ?>

<h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>

<div class="dashboard-summary">
    <div class="summary-card">
        <h3>Total Aktivitas Keuangan</h3>
        <p class="total-amount">Rp <?php echo number_format($total, 0, ',', '.'); ?></p>
    </div>
</div>

<div class="chart-container">
    <h3>Grafik Aktivitas Keuangan 6 Bulan Terakhir</h3>
    <canvas id="financeChart" width="600" height="300"></canvas>
</div>

<?php if (isset($_GET['msg'])): ?>
    <p class="system-msg">Pesan dari sistem: <?php echo htmlspecialchars($_GET['msg']); ?></p>
<?php endif; ?>

<p>
    <a href="pegawai.php" class="btn-link">Manajemen Pegawai</a> | 
    <a href="laporan.php" class="btn-link">Laporan Keuangan</a> | 
    <a href="logout.php" class="btn-link logout-btn">Logout</a>
</p>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('financeChart').getContext('2d');
    const financeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Total Transaksi (Rp)',
                data: <?php echo json_encode($data_points); ?>,
                backgroundColor: 'rgba(0, 64, 128, 0.2)',
                borderColor: 'rgba(0, 64, 128, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                pointRadius: 4,
                pointBackgroundColor: 'rgba(0, 64, 128, 1)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    labels: { color: '#004080' }
                }
            }
        }
    });
</script>

<?php include 'footer.php'; ?>
