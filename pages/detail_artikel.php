<?php

$id_artikel = $_GET['id_artikel'];
$artikel = "SELECT * FROM artikel WHERE id_artikel='$id_artikel'";
$result = mysqli_query($conn, $artikel);

if ($result && mysqli_num_rows($result) > 0) {
    $row_artikel = mysqli_fetch_assoc($result);
    $link = $row_artikel['gambar'];
    $baru_link = str_replace('../../', '', $link);
?>

    <body>
        <section id="visi-misi" class="w-[100%] md:w-[100%] lg:w-[80%] mx-auto">
            <div class="container grid mx-auto text-center">
            </div>
            <div class="w-[100%] flex mx-auto grid lg:grid-cols-12 gap-8 pt-10 pb-8 py-3">
                <div class="visi p-5 lg:col-span-9 bg-white lg:border border-gray-500 rounded-lg ">
                    <h1 class="text-3xl text-center py-3"><b><?= $row_artikel['judul'] ?></b></h1>
                    <img src="<?= $baru_link ?>" alt="Gambar Artikel" class="w-full">
                    <p class="py-3"><?= $row_artikel['content'] ?></p>
                </div>
                <div class="visi p-5 lg:col-span-3 bg-white lg:border border-gray-500 rounded-lg h-auto self-start">
                    <p class="lg:hidden">Rekomendasi Artikel Untuk Anda</p>
                    <?php
                    $queryArtikel = mysqli_query($conn, "SELECT * FROM artikel WHERE status = 'publish' AND id_artikel != '$id_artikel' ORDER BY id_artikel DESC LIMIT 5");
                    while ($row_artikel = mysqli_fetch_assoc($queryArtikel)) {
                    ?>
                        <a class="line-clamp-2 p-1 hover:text-blue-500" href="?page=detail_artikel&id_artikel=<?= $row_artikel['id_artikel'] ?>">
                            <?= $row_artikel['judul'] ?>
                        </a>
                        <hr>

                    <?php
                    }
                    ?>
                </div>

            </div>
        </section>
    </body>
<?php
}
?>