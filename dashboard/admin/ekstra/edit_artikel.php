<?php
    $id_artikel = $_GET['id_artikel'];
    $result = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel='$id_artikel'");
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])) {
        $new_judul = $_POST['new_judul'];
        $new_isi = $_POST['new_isi'];
        $new_gambar = $row['gambar']; // Default to the existing value
        if ($_FILES['foto']['size'] > 0) {
            $uploadDir = "../../uploads/artikel/"; 
            $new_gambar = $uploadDir . basename($_FILES['foto']['name']);
            move_uploaded_file($_FILES['foto']['tmp_name'], $new_gambar);
        } else {
            $new_gambar = $row['gambar'];
        }
        $update_artikel = $conn->prepare("UPDATE artikel SET judul=?, gambar=?, content=? WHERE id_artikel=?");
        $update_artikel->bind_param("sssi", $new_judul, $new_gambar, $new_isi, $id_artikel); 
        if ($update_artikel->execute()) {
            echo "<script>window.location.href='?page=artikel'</script>";
        } else {
            echo "Error updating artikel: " . $conn->error;
        }
    }
    ?>

    <head>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    </head>
    <body class="flex">
        <header class="bg-gray-900 w-[100%] sticky left-0 top-0">
            <nav class="h-16 w-[100%] flex mx-auto " >
                <div class="place-self-center flex gap-1 p-5">
                    <h1 class="text-white font-bold"><a href="?page=user">Artikel</a></h1>
                    <h2 class="text-white">Tambah Artikel</h2>
                </div>
            </nav>
        </header>
        <div>
            
        </div>
        <div class="flex text-sm md:text-base h-24 w-[90%] mx-auto text-lg ">
            <div class="place-self-center">
                <p>Tambah Artikel</p>
            </div>
        </div>
        <form class="w-[90%] flex flex-col mx-auto pb-32" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="id_user" value="<?= $row['id_artikel'] ?>">
            <div class="grid grid-cols-12">
                <div class="col-span-5 p-3 space-y-6 ">
                    <div class="mx-auto w-[100%]">
                        <label for="judul" class="block text-sm   font-medium leading-6 ">Judul</label>
                        <div class="mt-2">
                            <input id="judul" name="new_judul" type="text" value="<?= $row['judul'] ?>" autocomplete="off" placeholder="Judul" required class="block w-[100%]  rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mx-auto w-[100%]">
                        <label for="foto" class="block text-sm font-medium leading-6 ">Gambar</label>
                        <div class="mt-2">
                            <input id="foto" name="foto" type="file" value="" autocomplete="" multiple onchange="readURL(this)" accept="image/*" class=" block w-[100%] p-5 file:mr-4 file:py-1 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-violet-100 file:cursor-pointer rounded-md border-0 py-1.5 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="flex mx-auto w-[100%] place-items-center mx-auto">
                        <img src="<?= $row['gambar'] ?>" id="img" class="align-items-center h-32">
                    </div>
                    <div class="mx-auto w-[100%] ">
                        <button type="submit" name="submit" class="flex w-[100%] justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white  shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
                    </div>
                </div>
                <div class="col-span-7 p-3 space-y-6 ">
                    <div class="mx-auto w-[100%]  ">
                        <label for="isi" class="block text-sm font-medium leading-6 ">Isi</label>
                        <div class="mt-2">
                            <textarea id="isi" name="new_isi" rows="16" cols="50" type="text" placeholder="Isi Artikel" autocomplete="off" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $row['content'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            function readURL(input) {
                var img = document.querySelector("#img");
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) { 
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
    </body>
