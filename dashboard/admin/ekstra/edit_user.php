<?php

$id_user = $_GET['id_user'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
$row = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    $new_name = $_POST['new_name'];
    $new_email = $_POST['new_email'];
    $new_phone = $_POST['new_phone'];
    $new_nik = $_POST['new_nik'];
    $new_pedukuhan = $_POST['new_pedukuhan'];
    $new_role = $_POST['new_role'];

    if (!empty($_POST['new_password'])) {
        $new_password = md5($_POST['new_password']);
    } else {
        $new_password = $row['password'];
    }

    $update_user = $conn->prepare("UPDATE user SET name=?, email=?, password=?, pedukuhan=?, role=? WHERE id_user=?");
    $update_user->bind_param("ssssss", $new_name, $new_email, $new_password, $new_pedukuhan, $new_role, $id_user);

    if ($update_user->execute()) {
        echo "<script> window.location.href = '?page=edit_user&id_user=$id_user';</script>";
        
    } else {
        echo "Error updating user: " . $conn->error;
    }

    $update_user->close();
}
?>

<header class="bg-gray-900 w-[100%] sticky left-0 top-0">
    <nav class="h-16 w-[100%] flex mx-auto " >
        <div class="place-self-center flex gap-1 p-5">
            <h1 class="text-white font-bold"><a href="?page=user">User</a> / </h1>
            <h2 class="text-white"> Edit User</h2>
        </div>
    </nav>
</header>

<div class="text-gray-900 bg-gray-200">
    <div class="p-4 flex">
        <h1 class="text-xl">
            Edit User
        </h1>
    </div>
    <div class=" px-3 py-4 justify-between">
        <div>
            <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="?page=user">Kembali</a>
            </button>
        </div>
        <div class=" sm:mx-auto sm:w-full ">
            <div class="flex flex-col justify-center px-6 py-6 min-h-full lg:px-8">
                <div class="sm:mx-auto sm:w-full ">
                    <form class="space-y-6 " action="#" method="POST">
                        <div class=" grid grid-cols-8 ">
                        <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                            <div class="space-y-6 col-span-4 p-5">
                                <div class=" ">
                                    <label for="name" class="block text-sm font-medium leading-6  ">Nama</label>
                                    <div class="mt-2">
                                        <input id="name" name="new_name" type="text" autocomplete="off" value="<?= $row['name'] ?>" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class=" ">
                                    <label for="email" class="block text-sm font-medium leading-6  ">Email</label>
                                    <div class="mt-2">
                                        <input id="email" name="new_email" type="email" autocomplete="off" value="<?= $row['email'] ?>" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium leading-6  ">Nomor Telepon</label>
                                    <div class="mt-2">
                                        <input id="phone" name="new_phone" type="phone" autocomplete="off" value="<?= $row['phone'] ?>" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div>
                                    <label for="nik" class="block text-sm font-medium leading-6  ">NIK</label>
                                    <div class="mt-2">
                                        <input id="nik" name="new_nik" type="text" autocomplete="off" value="<?= $row['nik'] ?>" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-6 col-span-4 p-5">
                                <div>
                                    <label for="pedukuhan" class="block text-sm font-medium leading-6  ">Pedukuhan</label>
                                    <div class="mt-2">
                                        <input id="pedukuhan" name="new_pedukuhan" type="text" autocomplete="off" value="<?= $row['pedukuhan'] ?>" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div>
                                    <label for="new_password" class="block text-sm font-medium leading-6  ">Kata Sandi</label>
                                    <div class="mt-2">
                                        <input id="password" name="new_password" type="text" placeholder="Masukkan Password Baru?" autocomplete="off" class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div>
                                    <label for="role" class="block text-sm font-medium leading-6 ">Tipe User</label>
                                    <div class="mt-2">
                                        <input id="role" name="new_role" type="text" autocomplete="off" value="<?= $row['role'] ?>" required class="block w-full rounded-md p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center pb-16 mx-auto">
                            <button type="submit" action="#" name="submit" class="flex text-white justify-center rounded-md w-[50%] bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
