<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $name = $_POST["name"]; //menyimpan value dari form "name" ke variabel name
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $nik = $_POST["nik"];
    $pedukuhan = $_POST["pedukuhan"];
    $password = md5($_POST["password"]); //md5 berfungsi untuk enkripsi password(simple encryption)
    $confirmpassword = $_POST["repassword"];
    $role = "user";

    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE nik = '$nik' OR email = '$email'"); //Memastikan data masukan apakah ada di database
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> showPopup('Email Sudah Digunakan'); </script>";
    } else {
        if ($password == md5($confirmpassword)) {
            // Memasukan semua nilai variabel kedalam tabel database
            $query = "INSERT INTO user (name, email, password, phone, nik, pedukuhan, role) VALUES ('$name','$email', '$password','$phone', '$nik','$pedukuhan', '$role')";
            mysqli_query($conn, $query);
            echo
            "<script> showPopup('Pendaftaran Sukses'); </script>";
        } else {
            echo
            "<script> showPopup('Pendaftaran Gagal'); </script>";
        }
    }
}
?>

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

<div>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="asset/img/logo.png" alt="Logo">
            <a class="mx-auto h-10 w-auto" href="https://www.flaticon.com/free-icons/user" title="user icons"></a>
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 ">Masuk Ke Akun Anda</h2>
        </div>
        <div class="mt-10 sm:mx-auto  sm:w-full sm:max-w-sm">
            <form class="space-y-6 " action="#" method="POST">
                <div class=" ">
                    <label for="name" class="block text-sm font-medium leading-6  ">Nama</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class=" ">
                    <label for="email" class="block text-sm font-medium leading-6  ">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium leading-6  ">Nomor Telepon</label>
                    <div class="mt-2">
                        <input id="phone" name="phone" type="phone" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="nik" class="block text-sm font-medium leading-6  ">NIK</label>
                    <div class="mt-2">
                        <input id="nik" name="nik" type="text" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="pedukuhan" class="block text-sm font-medium leading-6  ">Pedukuhan</label>
                    <div class="mt-2">
                        <input id="pedukuhan" name="pedukuhan" type="text" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6  ">Kata Sandi</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="text" autocomplete="off" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="repassword" class="block text-sm font-medium leading-6">Ulangi Kata Sandi</label>
                    <div class="mt-2">
                        <input id="repassword" name="repassword" type="text" autocomplete="off" required class="block w-full rounded-md p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="">
                    <button type="submit" action="#" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6  shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-white">Daftar</button>
                </div>
            </form>
        </div>
    </div>
    <div class=" px-3 py-4 justify-between">
        <div class="sm:mx-auto sm:w-full">
            <p class="mt-10 text-center text-sm text-gray-500">
                Sudah punya akun?
                <a href="login.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Masuk Sekarang</a>
            </p>
        </div>
    </div>
</div>