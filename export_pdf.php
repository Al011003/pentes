<?php
session_start();
include 'db.php';
require('fpdf/fpdf.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil semua transaksi
$result = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY tanggal DESC");

// Inisialisasi FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Laporan Aktivitas Keuangan', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(80, 10, 'Deskripsi', 1);
$pdf->Cell(40, 10, 'Jumlah', 1);
$pdf->Cell(40, 10, 'Tanggal', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 11);

while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(10, 10, $row['id'], 1);
    $pdf->Cell(80, 10, $row['deskripsi'], 1);
    $pdf->Cell(40, 10, 'Rp ' . number_format($row['jumlah'], 0, ',', '.'), 1);
    $pdf->Cell(40, 10, $row['tanggal'], 1);
    $pdf->Ln();
}

// Output PDF
$pdf->Output('D', 'laporan_keuangan.pdf');
exit;
