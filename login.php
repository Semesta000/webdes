<?php
require 'config.php'; //koneksi ke database
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                if ($password == $row['password']) {
                    if ($row['role'] == 'admin') {
                        $_SESSION['id_user_admin'] = $row['id_user'];
                        $_SESSION['login_admin'] = 'login';
                        header('Location: dashboard/admin/index.php');
                        exit();
                    } else {
                        $_SESSION['id_user'] = $row['id_user'];
                        $_SESSION['login'] = 'login';
                        header('Location: dashboard/admin/index.php');
                        exit();
                    }
                } else {
                    echo "document.getElementById('errorPassword').classList.remove('hidden');";
                }
            } else {
                echo "document.getElementById('errorEmail').classList.remove('hidden');";
            }
        }
        ?>
    });
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <title>SekNdes</title>
</head>

<body class="bg-white">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="asset/img/logo.png" alt="Logo">
            <a class="mx-auto h-10 w-auto" href="https://www.flaticon.com/free-icons/user" title="user icons"></a>
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 ">Masuk Ke Akun Anda</h2>
        </div>
        <div class="mt-10 sm:mx-auto  sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="" method="post">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 ">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" placeholder="Email" autocomplete="off" required class="block w-full rounded-md border-0 py-1.5 text-gray-900  p-3 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <p id="errorEmail" class="hidden font-medium text-sm text-red-500 py-3">Alamat Email belum terdaftar</p>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 ">Password</label>
                        <div class="text-sm">
                            <a href="error/error_login.html" class="font-semibold text-indigo-600 hover:text-indigo-500">Lupa Kata Sandi</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" placeholder="Kata Sandi" autocomplete="off" required class="block w-full rounded-md border-0 py-1.5 text-gray-900  p-3 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <p id="errorPassword" class="hidden font-medium text-sm text-red-500 py-3">Kata Sandi tidak sesuai</p>
                </div>
                <div>
                    <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6  shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-white">Sign in</button>
                </div>
            </form>
            <p class="mt-10 text-center text-sm ">
                Belum punya akun?
                <a href="daftar.php" class="font-semibold leading-6 text-blue-600 hover:text-indigo-500">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</body>