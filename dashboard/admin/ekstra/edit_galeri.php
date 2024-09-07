<?php
$id_galeri = $_GET['id_doc'];
$result = mysqli_query($conn, "SELECT * FROM galeri WHERE id_doc = '$id_galeri'");
$row = mysqli_fetch_assoc($result);


if (isset($_POST["submit"])) {
    $new_judul = $_POST['judul'];
    $new_isi = $_POST['deskripsi'];
    $new_gambar = $row['documentasi'];
    if ($_FILES['foto']['size'] > 0) {
        $uploadDir = "../../uploads/galeri/";
        $new_gambar = $uploadDir . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $new_gambar);
    } else {
        $new_gambar = $row['documentasi'];
    }
    $update_galeri = $conn->prepare("UPDATE galeri SET judul=?, documentasi=?, deskripsi=? WHERE id_doc=?");
    $update_galeri->bind_param("sssi", $new_judul, $new_gambar, $new_isi, $id_galeri);
    if ($update_galeri->execute()) {
        echo "<script>window.location.href='?page=galeri'</script>";
    } else {
        echo "Error updating galeri: " . $conn->error;
    }
}
?>

<body class=" h-screen">
    <header class="bg-gray-900 w-[100%] sticky left-0 top-0">
        <nav class="h-16 w-[100%] flex mx-auto ">
            <div class="place-self-center flex gap-1 p-5">
                <h1 class="text-white font-bold"><a href="?page=user">Galeri</a> / </h1>
                <h2 class="text-white"> Tambah Galeri</h2>
            </div>
        </nav>
    </header>
    <div class="text-gray-900 bg-gray-200">
        <div class=" px-3 py-4 justify-between">
            <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="?page=galeri">Kembali</a>
            </button>
        </div>
        <div class="sm:mx-auto sm:w-full">
            <form class="w-[90%] mx-auto pb-32" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="grid grid-cols-12 flex gap-5 p-5">
                    <div class="col-span-6">
                        <div class="mx-auto w-[100%]">
                            <label for="judul" class="block text-sm   font-medium leading-6 ">Judul</label>
                            <div class="mt-2">
                                <input id="judul" name="judul" type="text" autocomplete="off" placeholder="Judul" required class="block w-[100%]  rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $row['judul'] ?>">
                            </div>
                        </div>
                        <div class="mx-auto w-[100%]">
                            <label for="deskripsi" class="block text-sm font-medium leading-6 ">Deskripsi</label>
                            <div class="mt-2">
                                <textarea id="deskripsi" name="deskripsi" rows="2" cols="50" type="text" value="" placeholder="Deskripsi Gambar" autocomplete="off" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value=""><?= $row['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class=" mx-auto w-[100%]">
                            <label for="foto" class="block text-sm font-medium leading-6 ">Gambar</label>
                            <div class="mt-2">
                                <input id="foto" name="foto" type="file" autocomplete="" multiple onchange="readURL(this)" accept="image/*" class=" block w-[100%] p-5 file:mr-4 file:py-1 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-violet-100 file:cursor-pointer rounded-md border-0 py-1.5 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="flex col-span-6 mx-auto w-[100%] rounded-md bg-gray-300 justify-center items-center mx-auto">
                        <img src="<?= $row['documentasi'] ?>" alt="Belum Ada Gambar" id="img" class="">
                    </div>
                </div>
                <div class="mx-auto w-[100%] p-5">
                    <button type="submit" name="submit" class="flex w-[35%] justify-center rounded-md mx-auto bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function readURL(input) {
        var img = document.querySelector("#img");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                img.setAttribute("src", e.target.result);
                img.style.height = '150px'; // Set tinggi default
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            img.removeAttribute("src"); // Hapus atribut src jika tidak ada file dipilih
            img.style.height = 'auto'; // Set tinggi ke auto untuk menyesuaikan tinggi teks
        }
    }
</script>