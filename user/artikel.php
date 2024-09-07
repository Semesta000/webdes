<?php
$queryArtikel = mysqli_query($conn, "SELECT * FROM artikel WHERE status = 'publish'");
?>

<body chrome-hide-address-bar class="min-h-[100%]">
    <section class="bg-white pt-5 w-[100%] sm:w-[90%] md:w-[95%] lg:w-[80%] mx-auto ">
        <div class="container grid mx-auto text-center ">
            <h1 class="text-2xl text-black font-bold ">ARTIKEL</h1>
        </div>
        <div class="container grid text-gray-900 mx-auto px-4 py-16 w-[90%] sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-12 gap-5 md:gap-2 lg:gap-5">
            <?php
            while ($row_artikel = mysqli_fetch_assoc($queryArtikel)) {
                $path_relatif = $row_artikel['gambar'];
                $path_baru = str_replace('../../', '', $path_relatif);
            ?>
                <a href="?page=detail_artikel&id_artikel=<?= $row_artikel['id_artikel'] ?>" class="items-center bg-white border border-gray-200 rounded-lg col-span-6 md:col-span-4 lg:col-span-6 hover:scale-105 duration-500 drop-shadow-2xl">
                    <div class="flex p-1 lg:p-2 grid grid-cols-8 md:grid-cols-10 lg:grid-cols-12 gap-2">
                        <img class="object-fill my-auto col-span-3 md:col-span-4 lg:col-span-5 flex flex-wrap w-full h-24 " src="<?= $path_baru ?>" alt="">
                        <div class="flex col-span-5 md:col-span-6 lg:col-span-7 flex-col justify-between leading-normal">
                            <h5 class="mb-1 flex-wrap md:text-base lg:text-base font-bold tracking-tight text-gray-900 line-clamp-2"><?= $row_artikel['judul'] ?></h5>
                            <p class=" flex-wrap text-base text-sm font-normal text-gray-700 dark:text-gray-400 line-clamp-3"><?= $row_artikel['content'] ?></p>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>

        </div>
    </section>
</body>

</html>