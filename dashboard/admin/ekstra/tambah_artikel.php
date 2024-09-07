
<?php

if (isset($_POST["submit"])) {
    $judul = $_POST["judul"];
    $isi = $_POST["isi"];
    $target_dir = "../../uploads/artikel/"; 
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    $sql = "INSERT INTO artikel (judul, gambar, content, date) VALUES ('$judul', '$target_file', '$isi', CURRENT_TIMESTAMP)";

    if ($conn->query($sql) === TRUE) {
        echo "<script> window.location.href = '?page=artikel';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
    }
} 
?>
<head>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
    <header class="bg-gray-900 w-[100%] sticky left-0 top-0">
        <nav class="h-16 w-[100%] flex mx-auto " >
            <div class="place-self-center flex gap-1 p-5">
                <h1 class="text-white font-bold"><a href="?page=user">Artikel</a> / </h1>
                <h2 class="text-white"> Tambah Artikel</h2>
            </div>
        </nav>
    </header>
    <div class="p-4 flex">
        <h1 class="text-xl">
            Tambah Artikel
        </h1>
    </div>
    <div class=" px-3 py-4 flex flex-col justify-between">
        <div>
            <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="?page=artikel">Kembali</a>
            </button>
        </div>
        <form class="w-[90%] flex flex-col mx-auto pt-10 pb-32" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="grid grid-cols-12">
                <div class="col-span-5 p-3 space-y-6 ">
                    <div class="mx-auto w-[100%]">
                        <label for="judul" class="block text-sm   font-medium leading-6 ">Judul</label>
                        <div class="mt-2">
                            <input id="judul" name="judul" type="text" autocomplete="off" placeholder="Judul" required class="block w-[100%]  rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mx-auto w-[100%]">
                        <label for="foto" class="block text-sm font-medium leading-6 ">Gambar</label>
                        <div class="mt-2">
                            <input id="foto" name="foto" type="file" autocomplete="" multiple onchange="readURL(this)" required accept="image/*" class=" block w-[100%] p-5 file:mr-4 file:py-1 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-violet-100 file:cursor-pointer rounded-md border-0 py-1.5 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="flex mx-auto w-[100%] place-items-center   mx-auto">
                        <img src="" id="img" class="align-items-center">
                    </div>
                    <div class="mx-auto w-[100%] ">
                        <button type="submit" name="submit" class="flex w-[100%] justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white  shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
                    </div>
                </div>
                <div class="col-span-7 p-3 space-y-6 ">
                    <div class="mx-auto w-[100%]  ">
                        <label for="isi" class="block text-sm font-medium leading-6 ">Isi</label>
                        <div class="mt-2">
                            <textarea id="isi" name="isi" rows="16" cols="50" type="text" placeholder="Isi Artikel" autocomplete="off" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            // CKEDITOR.replace('isi');
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
