<?php
if (isset($_POST["hapus"])) {
    $id_user = $_POST['id_user'];

    $delete_aduan = mysqli_query($conn, "DELETE FROM aduan WHERE id_user='$id_user'");

    if ($delete_aduan) {
        $delete_user = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id_user'");
        if ($delete_user) {
            echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
        } else {
            $alert = "<div class='alert alert-danger'>Error deleting user</div>";
        }
    } else {
        $alert = "<div class='alert alert-danger'>Error deleting related records in aduan table</div>";
    }
}

?>
<?php
if (isset($_GET['page']) && $_GET['page'] == 'tambah_user') {
    include 'ekstra/tambah_user.php';
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <header class="bg-gray-900 w-[100%] sticky left-0 top-0">
            <nav class="h-16 w-[100%] flex mx-auto ">
                <div class="place-self-center p-5">
                    <h1 class="text-white font-bold">User</h1>
                </div>
            </nav>
        </header>
        <!-- component -->
        <div class="text-gray-900 bg-gray-200">
            <div class="p-4 flex">
                <h1 class="text-xl">
                    Daftar User
                </h1>
            </div>
            <div class=" px-3 py-4 flex justify-between">
                <div>
                    <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                        <a href="?page=tambah_user">Tambah</a>
                    </button>
                </div>
                <div class="mb-3">
                    <form action="" method="POST">
                        <div class="flex mb-4 flex w-full flex-wrap ">
                            <input name="search" type="search" class="mx-auto m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6]  outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-blackfocus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-gray-600 dark:focus:border-primary" placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />

                            <!--Search button-->
                            <button class=" flex items-center rounded-r bg-blue-500 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg" type="submit" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <table class="w-full text-md table-auto bg-white shadow-md rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-center p-3 px-5">Id</th>
                            <th class="text-center p-3 px-5">Nama</th>
                            <th class="text-center p-3 px-5">Email</th>
                            <th class="text-center p-3 px-5">Telp</th>
                            <th class="text-center p-3 px-5">NIK</th>
                            <th class="text-center p-3 px-5">Pedukuhan</th>
                            <th class="text-center p-3 px-5">Aksi</th>
                            <th></th>
                        </tr>
                        <?php
                        if (isset($_POST['search'])) {
                            $searchKeyword = $_POST['search'];
                            if (empty($searchKeyword)) {
                                $query = mysqli_query($conn, "SELECT * FROM user");
                            } else {
                                $query = mysqli_query($conn, "SELECT * FROM user WHERE name LIKE '%$searchKeyword%' OR email LIKE '%$searchKeyword%' OR phone LIKE '%$searchKeyword%' OR nik LIKE '%$searchKeyword%' OR pedukuhan LIKE '%$searchKeyword%'");
                            }
                        } else {
                            $query = mysqli_query($conn, "SELECT * FROM user");
                        }

                        while ($row = mysqli_fetch_assoc($query)) {
                            $nik = $row['nik'];
                            $email = $row['email'];
                            if (strlen($email) > 12) {
                                $email = substr($email, 0, 12) . '**';
                            }
                        ?>
                            <tr class="px-3 border-b bg-gray-100">
                                <td class="p-3 text-center px-5"><?= $row['id_user'] ?></td>
                                <td class="p-3 text-center px-5"><?= $row['name'] ?></td>
                                <td class="p-3 text-center px-5"><?= $row['email'] ?></td>
                                <td class="p-3 text-center px-5"><?= $row['phone'] ?></td>
                                <td class="p-3 text-center px-5 w-[8rem] truncate"><?= $row['nik'] ?></td>
                                <td class="p-3 text-center px-5"><?= $row['pedukuhan'] ?></td>
                                <td class="p-3 text-center px-5">
                                    <div class="flex gap-2">
                                        <form action="" method="get">
                                            <input type="hidden" name="page" value="edit_user">
                                            <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                                            <button type="submit" class=" text-sm bg-blue-500 hover:bg-blue-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">
                                                <span class="material-symbols-outlined">
                                                    edit_document
                                                </span>
                                            </button>
                                        </form>
                                        <form action="" method="post" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                                            <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                                            <button type="submit" name="hapus" class=" text-sm bg-red-500 hover:bg-red-700 text-white p-1 rounded focus:outline-none focus:shadow-outline">
                                                <span class="material-symbols-outlined">
                                                    delete
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php
} ?>