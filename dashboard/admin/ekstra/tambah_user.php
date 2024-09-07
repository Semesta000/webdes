<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"]; //menyimpan value dari form "name" ke variabel name
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $nik = $_POST["nik"];
    $pedukuhan = $_POST["pedukuhan"];
    $password = md5($_POST["password"]); //md5 berfungsi untuk enkripsi password(simple encryption)
    $confirmpassword = $_POST["confirmpassword"];
    $role = $_POST["role"];
    
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE nik = '$nik' OR email = '$email'"); //Memastikan data masukan apakah ada di database
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> showPopup('Email Sudah Digunakan'); </script>";
    }
    else{
        if($password == md5($confirmpassword)){
            // Memasukan semua nilai variabel kedalam tabel database
            $query = "INSERT INTO user (name, email, password, phone, nik, pedukuhan, role) VALUES ('$name','$email', '$password','$phone', '$nik','$pedukuhan', '$role')";
            mysqli_query($conn, $query);
            echo
            "<script> showPopup('Pendaftaran Sukses'); </script>";
        }
        else{
            echo
            "<script> showPopup('Pendaftaran Gagal'); </script>";
        }
    }
    }
?>
    <header class="bg-gray-900 w-[100%] sticky left-0 top-0">
        <nav class="h-16 w-[100%] flex mx-auto " >
            <div class="place-self-center flex gap-1 p-5">
                <h1 class="text-white font-bold"><a href="?page=user">User</a> /</h1>
                <h2 class="text-white"> Tambah User</h2>
            </div>
        </nav>
    </header>
    <div class="text-gray-900 bg-gray-200">
        <div class="p-4 flex">
            <h1 class="text-xl">
                Tambah User
            </h1>
        </div>
        <div class=" px-3 py-4 justify-between">
            <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="?page=user">Kembali</a>
            </button>
            <div class="sm:mx-auto sm:w-full">
                <form class="space-y-6 " action="#" method="POST">
                    <div class=" grid grid-cols-8 ">
                        <div class="space-y-6 col-span-4 p-5">
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
                        </div>
                        <div class="space-y-6 col-span-4 p-5">
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
                                <label for="confirmpassword" class="block text-sm font-medium leading-6  ">Ulangi Kata Sandi</label>
                                <div class="mt-2">
                                    <input id="confirmpassword" name="confirmpassword" type="text" autocomplete="off" required class="block w-full rounded-md p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div>
                                <label for="role" class="block text-sm font-medium leading-6 ">Tipe User</label>
                                <div class="mt-2">
                                    <input id="role" name="role" type="text" autocomplete="off" required class="block w-full rounded-md p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center pb-16 mx-auto">
                        <button type="submit" action="#" name="submit" class="flex text-white justify-center rounded-md w-[50%] bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
        
    