<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    // Validasi sederhana (tambahkan validasi lebih lanjut sesuai kebutuhan)
    if (empty($username) || empty($password) || empty($email)) {
        echo "Semua bidang harus diisi.";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email tidak valid.";
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Enkripsi kata sandi
    $role = 'user'; // Set default role sebagai 'user'

    // Periksa apakah username sudah ada dalam database
    $check_query = "SELECT * FROM users WHERE username=?";
    if ($stmt = $conn->prepare($check_query)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Username sudah digunakan, coba yang lain.";
        } else {
            // Jika username belum ada, tambahkan pengguna baru ke database
            $insert_query = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
            if ($insert_stmt = $conn->prepare($insert_query)) {
                $insert_stmt->bind_param("ssss", $username, $passwordHash, $email, $role);
                if ($insert_stmt->execute()) {
                    // Pendaftaran berhasil, arahkan pengguna ke halaman login
                    header('Location: login.php');
                    exit(); // Pastikan tidak ada kode lain yang dijalankan setelah redirect
                } else {
                    echo "Terjadi kesalahan saat melakukan pendaftaran.";
                }
                $insert_stmt->close();
            } else {
                echo "Terjadi kesalahan pada persiapan query.";
            }
        }
        $stmt->close();
    } else {
        echo "Terjadi kesalahan pada persiapan query.";
    }
    $conn->close();
}
?>
