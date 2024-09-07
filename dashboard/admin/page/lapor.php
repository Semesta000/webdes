
<?php
$aduan = "SELECT * FROM aduan ORDER BY 
CASE 
    WHEN status = 'dalam_antrian' THEN 1 
    WHEN status = 'diproses' THEN 2 
    WHEN status = 'selesai' THEN 3 
    ELSE 4 
END, id_aduan DESC";
$queryAduan = mysqli_query($conn, $aduan);

if (isset($_GET['page']) && $_GET['page'] == 'edit_lapor') {
    include 'page/edit_lapor.php';
} else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header class="bg-gray-900 w-[100%] sticky left-0 top-0">
        <nav class="h-16 w-[100%] flex mx-auto " >
            <div class="place-self-center p-5">
                <h1 class="text-white font-bold">Laporan</h1>
            </div>
        </nav>
    </header>
    <div class="p-4 flex">
        <h1 class="text-xl">
            Daftar Laporan
        </h1>
    </div>
    <div class=" px-3 py-4 flex justify-between">
        <div>
            <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="?page=edit">Edit</a>
            </button>
        </div>
        <div class="mb-3">
            <div class="flex mb-4 flex w-full flex-wrap ">
                <input type="search" class="mx-auto m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6]  outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-blackfocus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-gray-600 dark:focus:border-primary" placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />
                <button
                class=" flex items-center rounded-r bg-blue-500 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg" type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
                </button>
            </div>
        </div>
    </div>
<div class="container flex flex-nowrap w-[90%] gap-5 columns-3 mx-auto grid px-4 py-10 lg:grid-cols-12">
    <?php
    while ($row_aduan = mysqli_fetch_assoc($queryAduan)) {
        $path_baru = $row_aduan['foto'];
        $status = $row_aduan['status'];
        $card_class = '';

        if ($status === 'dalam_antrian') {
            $card_class = 'bg-red-500'; 
        } elseif ($status === 'diproses') {
            $card_class = 'bg-yellow-500'; 
        } elseif ($status === 'selesai') {
            $card_class = 'bg-green-500'; 
        }
    ?>
        <a href="?page=detail_laporan&id_aduan=<?= $row_aduan['id_aduan'] ?>" class="card-galeri justify-center p-2 text-gray-900 md:col-span-6 lg:col-span-6 rounded-lg <?= $card_class ?>">
            <div class="grid grid-cols-12 ">
                <div class="col-span-4 "> 
                    <img src="../../<?=$path_baru ?>" alt="foto_aduan" class="max-h-32 mx-auto ">
                </div>    
                <div class="col-span-8 pl-3">
                    <h1 class="text-center text-lg"><b><?= $row_aduan['judul_keluhan'] ?></b></h1>
                    <p class="text-justify text-base line-clamp-3"><?= $row_aduan['keluhan'] ?></p>
                    <p class="text-justify text-xs"><?= $row_aduan['tanggal_masukkan']?></p>
                </div>
            </div>
        </a>
    <?php
    }
    ?>
</div>

    <script>
        function editUser() {
            window.location.href = "?page=edit_user&id_aduan=<?= $row['id_aduan'] ?>";
        }
    </script>
</body>
</html>
<?php
}
?>