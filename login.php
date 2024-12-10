<?php
session_start();
include('config.php'); // File yang menghubungkan ke database

$message = ''; // Variable untuk menyimpan pesan kesalahan

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Tambahkan log untuk mencatat nilai dari variabel $username dan $password
    error_log("Username: " . $username);
    error_log("Password: " . $password);

    // Pastikan untuk memverifikasi bahwa username tidak kosong atau mengandung karakter berbahaya
    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare('SELECT id, password, role FROM users WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Regenerate session ID to prevent session fixation attacks
            session_regenerate_id(true);

            if ($role == 'admin') {
                header('Location: index.php'); // Redirect ke halaman admin
            } else {
                header('Location: homeuser.php'); // Redirect ke halaman guest
            }
            exit();
        } else {
            $message = "Username atau password salah!";
            echo '<script>window.onload = function() { alert("Username atau password salah!"); }</script>';

            // Tambahkan log untuk mencatat pesan kesalahan
            error_log("Login gagal: Username atau password salah!");
        }
        $stmt->close();
    } else {
        $message = "Harap isi semua field!";
        error_log("Login gagal: Field kosong.");
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: url('maimun.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }
        .overlay {
            background-color: rgba(34, 139, 34, 0.7); /* Shadow green overlay */
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-green-900 bg-opacity-50">
    <div class="bg-white bg-opacity-10 p-8 rounded-lg shadow-lg backdrop-blur-md w-96 overlay">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Login</h2>
        <form method="post" action="">
            <div class="mb-4">
                <div class="relative">
                    <input type="text" name="username" class="w-full p-3 pl-10 bg-transparent border border-white rounded-full text-white placeholder-white focus:outline-none" placeholder="Username" required>
                    <i class="fas fa-user absolute left-3 top-3 text-white"></i>
                </div>
            </div>
            <div class="mb-4">
                <div class="relative">
                    <input type="password" name="password" class="w-full p-3 pl-10 bg-transparent border border-white rounded-full text-white placeholder-white focus:outline-none" placeholder="Password" required>
                    <i class="fas fa-lock absolute left-3 top-3 text-white"></i>
                </div>
            </div>
            <button type="submit" class="w-full py-3 bg-white text-green-900 rounded-full font-bold">Login</button>
            <?php if ($message != ''): ?>
                <p class="text-red-500 text-center mt-4"><?php echo $message; ?></p>
            <?php endif; ?>
        </form>
        <p class="text-center text-white mt-6">Don't have an account? <a href="register.php" class="font-bold">Register</a></p>
    </div>
</body>
</html>
