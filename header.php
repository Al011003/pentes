<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AL Bank - <?php echo isset($page_title) ? $page_title : 'Dashboard'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<header class="main-header">
    <div class="container">
        <h1 class="logo">AL Bank</h1>
        <nav>
            <ul class="nav-links">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="pegawai.php">Pegawai</a></li>
                <li><a href="laporan.php">Laporan</a></li>
                <li><a href="logout.php" class="logout-btn">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>
<main class="container">
