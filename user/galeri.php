<!DOCTYPE html>
<html lang="en">

<body>
    <section class="bg-white pt-5 w-[100%] md:w-[85%] lg:w-[80%] mx-auto">
        <div class="container grid mx-auto text-center">
            <h1 class="text-2xl text-black font-bold">GALERI</h1>
        </div>

        <div class="container grid text-white mx-auto px-4 py-16 w-[90%] md:grid-cols-8 lg:grid-cols-12 gap-8">
            <?php
            $galeri = "SELECT * FROM galeri ORDER BY id_doc DESC";
            $querygaleri = mysqli_query($conn, $galeri);

            while ($row_galeri = mysqli_fetch_assoc($querygaleri)) {

                $path_relatif = $row_galeri['documentasi'];
                $path_baru = str_replace('../../', '', $path_relatif);
            ?>

                <button id="detailgbr<?= $row_galeri['id_doc'] ?>" class="card-galeri p-2 bg-[#0088CC] w-[100%] text-white md:col-span-4 lg:col-span-4 rounded-lg lg:hover:bg-blue-600 ease-in duration-500">
                    <h1 class="text-center pt-3 text-lg"><b><?= $row_galeri['judul'] ?></b></h1>
                    <img src="<?= $path_baru ?> " alt="" class="h-48 pt-4 w-[100%]">
                    <p class="text-center text-sm pt-3 line-clamp-3"><?= $row_galeri['deskripsi'] ?></p>
                </button>

            <?php
            }
            ?>

            <?php
            $querygaleri = mysqli_query($conn, $galeri);
            while ($row_galeri = mysqli_fetch_assoc($querygaleri)) {
                $path_baru = str_replace('../../', '', $row_galeri['documentasi']);
            ?>
                <div id="detailgmbr<?= $row_galeri['id_doc'] ?>" class="fixed z-50 hidden top-0 left-0 w-full h-screen overflow-y-auto bg-black bg-opacity-50">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="border w-auto border-gray-500 w-[90%] md:w-[55%] shadow shadow-lg bg-white opacity-100 rounded-lg shadow-lg p-2">
                            <div class="flex justify-center rounded-lg bg-gray-400">
                                <img src="<?= $path_baru ?> " alt="" class="max-h-96 p-1 rounded-lg" style="flex justify-center;">
                            </div>
                            <div class="flex justify-center ">
                                <button id="closeBtn<?= $row_galeri['id_doc'] ?>" class="flex bg-red-500 justify-center p-2 rounded-lg mt-5">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </section>

    <script>
        <?php
        $querygaleri = mysqli_query($conn, $galeri);
        while ($row_galeri = mysqli_fetch_assoc($querygaleri)) {
        ?>
            const detailgambar<?= $row_galeri['id_doc'] ?> = document.getElementById("detailgbr<?= $row_galeri['id_doc'] ?>");
            const closeButton<?= $row_galeri['id_doc'] ?> = document.getElementById("closeBtn<?= $row_galeri['id_doc'] ?>");
            const detailgmbr<?= $row_galeri['id_doc'] ?> = document.getElementById("detailgmbr<?= $row_galeri['id_doc'] ?>");

            detailgambar<?= $row_galeri['id_doc'] ?>.addEventListener("click", function() {
                detailgmbr<?= $row_galeri['id_doc'] ?>.classList.remove("hidden");
            });

            closeButton<?= $row_galeri['id_doc'] ?>.addEventListener("click", function() {
                detailgmbr<?= $row_galeri['id_doc'] ?>.classList.add("hidden");
            });
        <?php
        }
        ?>
    </script>
</body>

</html>