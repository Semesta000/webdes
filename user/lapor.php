<?php

// mendapatkan user info
$userInfo = @$_SESSION['id_user'];
$q_data_user_login=mysqli_query($conn, "SELECT * FROM user WHERE id_user='$userInfo'");
$data_user_login=mysqli_fetch_array($q_data_user_login);

$aduan = "SELECT * FROM aduan where id_user='$userInfo'";
$queryAduan = mysqli_query($conn, $aduan);

// memeriksa apakah variabel session telah didefinisikan sebelum mengaksesnya
$judul = $_SESSION['judul'] ?? '';
$keluhan = $_SESSION['keluhan'] ?? '';



if (isset($_POST["submit"])) {
    $judul = $_POST["judul"];
    $keluhan = $_POST["keluhan"];
    $wilayah = $_POST["wilayah"];
    $target_dir = "uploads/laporan/"; 
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    $sql = "INSERT INTO aduan (judul_keluhan, keluhan, wilayah, foto, id_user, tanggal_masukkan, status) VALUES ('$judul', '$keluhan', '$wilayah', '$target_file', $userInfo, CURRENT_TIMESTAMP, 'dalam_antrian')";

    if ($conn->query($sql) === TRUE) {
        unset($_SESSION['judul']); //Membersihkan sesi judul
        unset($_SESSION['keluhan']);
        echo '<script>window.location.href = "?page=lapor"</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
    }
} 

if(!empty($userInfo)){ ?>
    <body class=" w-[80%] h-screen">
        <div class="flex text-center text-sm md:text-base w-[80%] mx-auto text-gray-900 h-40 text-base ">
            <div class="place-self-center mx-auto">
                <p>Hallo <span class="text-blue-500"><?php echo $data_user_login['name']; ?></span>, punya keluhan apa?</p>
                <p>Jangan ragu ragu untuk menyampaikan ke kita ya</p>
            </div>
        </div>
        <form class="w-[80%] space-y-6 mx-auto text-white pb-32" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="mx-auto w-[100%] md:w-[75%] lg:w-[55%]">
                <label for="judul" class="block text-sm text-gray-900 font-medium leading-6 ">Judul</label>
                <div class="mt-2">
                    <input id="judul" name="judul" type="text" autocomplete="off" placeholder="Judul" value="<?php echo $judul ?>" required class="block w-[100%]  rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="mx-auto w-[100%] md:w-[75%] lg:w-[55%]">
                <label for="keluhan" class="block text-sm text-gray-900 font-medium leading-6 ">Keluhan</label>
                <div class="mt-2">
                    <textarea id="keluhan" name="keluhan" rows="4" cols="50" type="text" placeholder="Detail keluhan" autocomplete="off" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php echo $keluhan ?></textarea>
                    
                </div>
            </div>
            <div class="mx-auto w-[100%] md:w-[75%] lg:w-[55%]">
                <label for="wilayah" class="block text-sm text-gray-900 font-medium leading-6 ">Wilayah</label>
                <div class="mt-2">
                    <input id="wilayah" name="wilayah" type="text" autocomplete="off" placeholder="Wilayah" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="mx-auto w-[100%] md:w-[75%] lg:w-[55%]">
                <label for="foto" class="block text-sm text-gray-900 font-medium leading-6 ">Media</label>
                <div class="mt-2">
                    <input id="foto" name="foto" type="file" autocomplete="" multiple onchange="readURL(this)" required accept="image/*" class=" block w-[100%] p-5 file:mr-4 file:py-1  file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-violet-100 file:cursor-pointer rounded-md border-0 py-1.5 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-white focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="flex mx-auto w-[100%] place-items-center md:w-[75%] lg:w-[55%] mx-auto">
                <img src="" alt="Belum Ada Gambar Dipilih" id="img" class="align-items-center">
            </div>
            <div class="mx-auto w-[100%] md:w-[75%] lg:w-[55%]">
                <button type="submit" name="submit" class="flex w-[100%] justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
            </div>
        </form>
        <h2 class="text-center font-bold">Laporan Anda Terdahulu</h2>
        <div class="container flex flex-col  w-[100%] md:w-[75%] lg:w-[55%] gap-5 columns-3 mx-auto grid px-4 py-10 lg:grid-cols-12">
            <?php
            while ($row_aduan = mysqli_fetch_assoc($queryAduan)) {
                if ($row_aduan['status'] == 'dalam_antrian') {
                    $status = 'Dalam Antrian';
                } elseif ($row_aduan['status'] == 'diproses') {
                    $status = 'Diproses';
                } else {
                    $status = 'Selesai';
                }
            ?>
                <div class="card-galeri justify-center p-2 text-gray-900 md:col-span-6 lg:col-span-6 rounded-lg border border-gray-900">
                    <div class="grid grid-cols-12 ">
                        <div class="col-span-4 "> 
                            <img src="<?= $row_aduan['foto'] ?>" alt="foto_aduan" class="max-h-32 mx-auto ">
                        </div>    
                        <div class="col-span-8 pl-3 justify-between">
                            <p class="text-lg line-clamp-1"><b><?= $row_aduan['judul_keluhan'] ?></b></p>
                            <p class="text-justify text-base line-clamp-2"><?= $row_aduan['keluhan'] ?></p>
                            <p class="text-justify text-xs"><?= $row_aduan['tanggal_masukkan']?></p>
                            <p class="text-sm"><?= $status ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
</div>
        <script>
            function readURL(input) {
            var img = document.querySelector("#img");
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) { 
                    img.setAttribute("src", e.target.result);
                    img.style.height = '150px';
                };
                reader.readAsDataURL(input.files[0]); 
            } else {
                img.removeAttribute("src");
                img.style.height = 'auto'; 
            }
        }
        </script>

    </body>
<?php }
else { 
    ?>
    <script>
        window.location.href = "login.php";
    </script>
    <?php
} ?>


