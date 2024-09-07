<?php
function updateStatus($conn, $id_aduan, $status) {
    $query = "UPDATE aduan SET status='$status' WHERE id_aduan='$id_aduan'";
    $update_status = mysqli_query($conn, $query);
    if ($update_status) {
        
    } else {
        $alert = "<div class='alert alert-danger'>Error updating status</div>";
    }
}

function showUser($conn, $id_user){
    $query = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
    $row = mysqli_fetch_assoc($query);
    echo $row['name'];
}

function deleteaduan($conn, $id_aduan) {
    $query = "DELETE FROM aduan WHERE id_aduan='$id_aduan'";
    $delete_aduan = mysqli_query($conn, $query);
    if ($delete_aduan) {
        echo "<script>window.location.href='?page=lapor'</script>";
    } else {
        $alert = "<div class='alert alert-danger'>Error deleting aduan</div>";
    }
}
if (isset($_GET['page']) && $_GET['page'] === 'detail_aduan') {
}
if (isset($_POST["hapus"])) {
    $id_aduan = $_GET['id_aduan'];
    deleteaduan($conn, $id_aduan);
} 
if (isset($_POST["dalam_antrian"])) {
    $id_aduan = $_POST['id_aduan'];
    updateStatus($conn, $id_aduan, 'dalam_antrian');
}
if (isset($_POST["diproses"])) {
    $id_aduan = $_POST['id_aduan'];
    updateStatus($conn, $id_aduan, 'diproses');
}
if (isset($_POST["selesai"])) {
    $id_aduan = $_POST['id_aduan'];
    updateStatus($conn, $id_aduan, 'selesai');
}
if (isset($_POST["batal"])) {
    $id_aduan = $_POST['id_aduan'];
    updateStatus($conn, $id_aduan, 'diproses');
}



$id_aduan = $_GET['id_aduan'];
$result = mysqli_query($conn, "SELECT * FROM aduan WHERE id_aduan='$id_aduan'");
$row_aduan = mysqli_fetch_assoc($result);
$status = $row_aduan['status'];
$id_user = $row_aduan['id_user'];

?>
    <header class="bg-gray-900 w-[100%] sticky left-0 top-0">
        <nav class="h-16 w-[100%] flex mx-auto " >
            <div class="place-self-center p-5">
                <h1 class="text-white font-bold">Aduan</h1>
            </div>
        </nav>
    </header>
    <div class="px-3 py-4 ">
        <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            <a href="?page=aduan">Kembali</a>
        </button>
    </div>
    <section class="w-[90%] flex mx-auto grid grid-cols-12 gap-8 pb-8">
        <div class="col-span-10 p-2 bg-white rounded-lg">
            <h1 class="text-center pt-3 text-3xl"><b><?= $row_aduan['judul_keluhan'] ?></b></h1>
            <img src="../../<?= $row_aduan['foto'] ?>" alt="gambar" class="h-60 pt-5 mx-auto object-cover">
            <p class="text-justify text-base pt-5 "><?= $row_aduan['keluhan'] ?></p>
            <p class="text-justify text-base pt-5 "><?= $row_aduan['wilayah'] ?></p>
            <div class="pt-5">
                <p class="text-sm">Aduan masuk pada <?= $row_aduan['tanggal_masukkan'] ?></p>
                <p class="text-sm">Oleh <?= showuser($conn, $row_aduan['id_user']) ?> </p>
            </div>
        </div>
        <div class="col-span-2 h-48 flex flex-col justify-between gap-2 px-2 py-10 bg-white rounded-lg">
            <h2 class="text-center font-bold">Tindakan</h2>
            <?php 
                if ($status === 'dalam_antrian') {
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_aduan" value="<?= $row_aduan['id_aduan'] ?>">
                        <button type="submit" name="diproses" class="mr-3 w-[100%] text-sm bg-orange-500 hover:bg-orange-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Proses</button>
                    </form>
                    <?php
                } elseif ($status === 'diproses') {
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_aduan" value="<?= $row_aduan['id_aduan'] ?>">
                        <button type="submit" name="selesai" class="mr-3 w-[100%] text-sm bg-orange-500 hover:bg-orange-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Selesai</button>
                    </form>
                    <?php
                } elseif ($status === 'selesai') { ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_aduan" value="<?= $row_aduan['id_aduan'] ?>">
                        <button type="submit" name="batal" class="mr-3 w-[100%] text-sm bg-orange-500 hover:bg-orange-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Batalkan</button>
                    </form>
                    <?php }
            ?>
            <form action="" method="post" onsubmit="return confirm('Apakah kamu yakin ingin menghapus aduan ini?');">
                <input type="hidden" name="id_aduan" value="<?= $row_aduan['id_aduan'] ?>">
                <button type="submit" name="hapus" class="mr-3 w-[100%] text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Hapus</button>
            </form>
        </div>
    </section>
    <div class="my-8">
        <h2 class="text-center font-bold">Laporan lain yang perlu diproses</h2>
    </div>
    <div class="container flex flex-nowrap w-[90%] gap-5 columns-3 mx-auto grid px-4 py-10 lg:grid-cols-12">
    <?php
    $status = 'dalam_antrian';
    $aduan = "SELECT * FROM aduan WHERE status = '$status' ORDER BY id_aduan DESC"; // Perbaiki query
    $queryAduan = mysqli_query($conn, $aduan);
    while ($row_aduan = mysqli_fetch_assoc($queryAduan)) {
        $path_baru = $row_aduan['foto'];
        $status = $row_aduan['status'];
        $card_class = '';
    ?>
        <a href="?page=detail_laporan&id_aduan=<?= $row_aduan['id_aduan'] ?>" class="card-galeri justify-center p-2 text-gray-900 md:col-span-6 lg:col-span-6 rounded-lg bg-white">
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
        
    </script>