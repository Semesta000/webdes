<?php 
function countTableRows($conn, $table) {
    $query = "SELECT COUNT(*) AS total_rows FROM $table";
    $result = mysqli_query($conn, $query);
    $totalRows = 0;

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalRows = $row['total_rows'];
    } 
    return $totalRows;
}

$totalUsers = countTableRows($conn, "user");
$totalArticle = countTableRows($conn, "artikel");
$totalAduan = countTableRows($conn, "aduan");
$totalGaleri = countTableRows($conn, "galeri");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="flex">
    <header class="bg-gray-900 w-[100%] sticky left-0 top-0">
        <nav class="h-16 w-[100%] flex mx-auto " >
            <div class="place-self-center p-5">
                <h1 class="text-white font-bold">Dashboard</h1>
            </div>
        </nav>
    </header>
    <!-- Main Info Summary -->
    <div class=" grid grid-cols-12 gap-5 py-8 w-[90%] flex mx-auto">
        <div class="bg-blue-500 col-span-3 rounded-lg">
            <a href="?page=artikel">
                <div class="w-[100%] p-4 text-white">
                    <p class="text-2xl text-center p-1">Jumlah Artikel</p>
                    <span class="text-5xl font-bold "><p class="text-center p-1"><?php echo $totalArticle;?></p></span>
                </div>
            </a>
        </div>
        <div class="bg-green-500 col-span-3 rounded-lg">
            <a href="?page=user">
                <div class="w-[100%] p-4 text-white">
                    <p class="text-2xl text-center p-1">Jumlah User</p>
                    <span class="text-5xl font-bold "><p class="text-center p-1"><?php echo $totalUsers;?></p></span>
                </div>
            </a>
        </div>
        <div class="bg-red-500 col-span-3 rounded-lg">
            <a href="?page=lapor">
                <div class="w-[100%] p-4 text-white">
                    <p class="text-2xl text-center p-1">Jumlah Aduan</p>
                    <span class="text-5xl font-bold "><p class="text-center p-1"><?php echo $totalAduan;?></p></span>
                </div>
            </a>
        </div>
        <div class="bg-orange-500 col-span-3 rounded-lg">
            <a href="?page=galeri">
                <div class="w-[100%] p-4 text-white">
                    <p class="text-2xl text-center p-1">Jumlah Galeri</p>
                    <span class="text-5xl font-bold "><p class="text-center p-1"><?php echo $totalGaleri;?></p></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Riwayat Kunjungan -->
    <div>

    </div>
    <!-- Summary user -->
    <div>

    </div>
    <!-- Summary Aduan -->
    <div>

    </div>
    
</body>
</html>