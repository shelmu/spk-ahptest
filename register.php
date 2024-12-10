<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h2 class="text-3xl font-bold text-center text-white mb-6">Register</h2>
        <form action="register_process.php" method="post">
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
            <div class="mb-4">
                <div class="relative">
                    <input type="email" name="email" class="w-full p-3 pl-10 bg-transparent border border-white rounded-full text-white placeholder-white focus:outline-none" placeholder="Email" required>
                    <i class="fas fa-envelope absolute left-3 top-3 text-white"></i>
                </div>
            </div>
            <button type="submit" class="w-full py-3 bg-white text-green-900 rounded-full font-bold">Register</button>
        </form>
        <p class="text-center text-white mt-6">Sudah punya akun? <a href="login.php" class="font-bold">Login di sini</a></p>
    </div>
</body>
</html>

