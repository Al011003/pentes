<?php
session_start();
include 'db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil input tanpa sanitasi agar rentan SQL Injection
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Jangan pakai prepared statement atau mysqli_real_escape_string, ini memang celahnya
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Login gagal! Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - AL Bank</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
        body {
            background-color: #f4f7f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            background-color: white;
            padding: 2rem 3rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }
        h2 {
            margin-bottom: 1.5rem;
            color: #004080;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.6rem 0.8rem;
            margin: 0.5rem 0 1rem 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #004080;
            outline: none;
        }
        button {
            width: 100%;
            background-color: #004080;
            color: white;
            border: none;
            padding: 0.7rem;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #003366;
        }
        .error-msg {
            color: #e74c3c;
            margin-top: 1rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login AL Bank</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required autofocus />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Masuk</button>
        </form>
        <?php if ($error): ?>
            <p class="error-msg"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
