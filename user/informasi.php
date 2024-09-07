<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<div class="w-[95%] lg:w-[85%] mx-auto py-8 ">
    <div class="lg:grid lg:grid-cols-12 lg:gap-5">
        <div class="flex lg:col-span-2 lg:flex lg:flex-col my-5">
            <div class="bg-white rounded shadow-md grid grid-cols-8 lg:flex lg:flex-col gap-1">
                <button id="in_berita" class="text-center bg-blue-500 hover:bg-gray-700 text-white font-bold p-1 w-full rounded my-2 col-span-2">Berita</button>
                <button id="in_agenda" class="text-center bg-green-500 hover:bg-gray-700 text-white font-bold p-1 w-full rounded my-2 col-span-2">Agenda</button>
                <button id="in_pengumuman" class="text-center bg-yellow-500 hover:bg-gray-700 text-white font-bold p-1 w-full rounded my-2 col-span-2">Pengumuman</button>
                <button id="in_pelayanan" class="text-center bg-red-500 hover:bg-gray-700 text-white font-bold p-1 w-full rounded my-2 col-span-2">Pelayanan</button>
            </div>
        </div>

        <div class="lg:col-span-7 h-min-full border border-solid border-gray-400 p-4 rounded-lg shadow-md" id="if_berita">
            <iframe id="berita" src="user/informasi_ext/info_berita.php" frameborder="0" class="w-[100%] h-screen"></iframe>
        </div>

        <div class="lg:col-span-7 h-min-full border border-solid border-gray-400 p-4 rounded-lg shadow-md " id="if_agenda">
            <iframe src="user/informasi_ext/info_agenda.php" frameborder="0" class="w-[100%] h-screen"></iframe>
        </div>

        <div class="lg:col-span-7 h-min-full border border-solid border-gray-400 p-4 rounded-lg shadow-md" id="if_pengumuman">
            <iframe src="user/informasi_ext/info_pengumuman.php" frameborder="0" class="w-[100%] h-screen"></iframe>
        </div>

        <div class="lg:col-span-7 h-min-full border border-solid border-gray-400 p-4 rounded-lg shadow-md" id="if_pelayanan">
            <iframe id="framepelayanan" src="user/informasi_ext/info_pelayanan.php" frameborder="0" class="w-[100%] h-screen"></iframe>
        </div>

        <div class="col-span-3 rounded-r-lg flex justify-center">
            <div id="if_rec_berita" class="w-[100%] h-screen">
                <header class="bg-blue-500 text-white text-center py-4 mb-4">
                    <h1 class="text-3L font-bold">Rekomendasi Berita Hangat</h1>
                </header>
                <section class="max-w-4xl mx-auto grid gap-8 grid-cols-1">
                    <!-- Item pertama -->
                    <div class="bg-white rounded-md overflow-hidden shadow-md">
                        <button id="jalanjebol">
                            <div class="p-4">
                                <h2 class="text-xl font-semibold mb-2">JALAN UTAMA JEBOL!!!</h2>
                                <p class="text-gray-600">Sebuah peristiwa luar biasa terjadi hari ini ketika jalan utama di</p>
                                <a href="" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                            </div>
                        </button>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden shadow-md">
                        <button id="jalanjebol">
                            <div class="p-4">
                                <h2 class="text-xl font-semibold mb-2">TERTANGKAP TERNYATA MONYET</h2>
                                <p class="text-gray-600">Sebuah peristiwa luar biasa terjadi hari ini ketika jalan utama di</p>
                                <a href="" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                            </div>
                        </button>
                    </div>
                </section>
            </div>

            <div id="if_rec_agenda" class="w-[100%] h-screen"></div>
            <div id="if_rec_pengumuman" src="user/informasi_ext/info_rec_pengumuman.php" frameborder="0" class="w-[100%] h-screen"></div>
            <div id="if_rec_pelayanan" class="block col-span-12 h-min-full border border-solid border-gray-400 p-4 rounded-lg shadow-md">
                <header class="bg-red-500 text-white text-center py-4">
                    <h1 class="text-2xl font-bold">PELAYANAN DESA</h1>
                </header>
                <section class="max-w-2xl mx-auto mt-8">
                    <ul>
                        <!-- Item pertama -->
                        <li class="mb-4 bg-white rounded-md overflow-hidden shadow-md"><button class="w-full" id="kelahiran">
                                <div class="p-2">
                                    <h2 class="text-l font-semibold mb-2">KELAHIRAN</h2>
                                </div>
                            </button>
                        </li>
                        <li class="mb-4 bg-white rounded-md overflow-hidden shadow-md"><button class="w-full" id="kematian">
                                <div class="p-2">
                                    <h2 class="text-l font-semibold mb-2">KEMATIAN</h2>
                                </div>
                            </button>
                        </li>
                        <li class="mb-4 bg-white rounded-md overflow-hidden shadow-md"><button class="w-full" id="nikah">
                                <div class="p-2">
                                    <h2 class="text-l font-semibold mb-2">PENGANTAR NIKAH</h2>
                                </div>
                            </button>
                        </li>
                        <li class="mb-4 bg-white rounded-md overflow-hidden shadow-md"><button class="w-full" id="kematian">
                                <div class="p-2">
                                    <h2 class="text-l font-semibold mb-2">PELAYANAN PINDAH DATANG PENDUDUK</h2>
                                </div>
                            </button>
                        </li>
                        <li class="mb-4 bg-white rounded-md overflow-hidden shadow-md"><button class="w-full" id="nikah">
                                <div class="p-2">
                                    <h2 class="text-l font-semibold mb-2">PENGANTAR SKCK</h2>
                                </div>
                            </button>
                        </li>
                        <li class="mb-4 bg-white rounded-md overflow-hidden shadow-md"><button class="w-full" id="kelahiran">
                                <div class="p-2">
                                    <h2 class="text-l font-semibold mb-2">PENERBIT KTP</h2>
                                </div>
                            </button>
                        </li>
                        <li class="mb-4 bg-white rounded-md overflow-hidden shadow-md"><button class="w-full" id="nikah">
                                <div class="p-2">
                                    <h2 class="text-l font-semibold mb-2">KARTU IDENTITAS ANAK</h2>
                                </div>
                            </button>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
</div>
</div>

</body>
<script>
    const btnBerita = document.getElementById('in_berita');
    const btnAgenda = document.getElementById('in_agenda');
    const btnPengumuman = document.getElementById('in_pengumuman');
    const btnPelayanan = document.getElementById('in_pelayanan');

    const ifBerita = document.getElementById('if_berita');
    const ifAgenda = document.getElementById('if_agenda');
    const ifPengumuman = document.getElementById('if_pengumuman');
    const ifPelayanan = document.getElementById('if_pelayanan');

    const ifRecBerita = document.getElementById('if_rec_berita');
    const ifRecAgenda = document.getElementById('if_rec_agenda');
    const ifRecPengumuman = document.getElementById('if_rec_pengumuman');
    const ifRecPelayanan = document.getElementById('if_rec_pelayanan');

    function tampilBerita() {
        ifAgenda.style.display = 'none';
        ifPengumuman.style.display = 'none';
        ifPelayanan.style.display = 'none';
        ifRecAgenda.style.display = 'none';
        ifRecPengumuman.style.display = 'none';
        ifRecPelayanan.style.display = 'none';
    }
    tampilBerita();
    document.getElementById('jalanjebol').addEventListener('click', function() {
        document.getElementById('berita').src = 'user/informasi_ext/info_detail_berita.php';
    });


    btnBerita.addEventListener('click', function() {
        tampilBerita();
        ifBerita.style.display = 'block';
        ifRecBerita.style.display = 'block';
    });

    btnAgenda.addEventListener('click', function() {
        ifAgenda.style.display = 'block';
        ifRecAgenda.style.display = 'block';
        ifBerita.style.display = 'none';
        ifPengumuman.style.display = 'none';
        ifPelayanan.style.display = 'none';
        ifRecBerita.style.display = 'none';
        ifRecPengumuman.style.display = 'none';
        ifRecPelayanan.style.display = 'none';
    });

    btnPengumuman.addEventListener('click', function() {
        ifPengumuman.style.display = 'block';
        ifRecPengumuman.style.display = 'block';
        ifBerita.style.display = 'none';
        ifAgenda.style.display = 'none';
        ifPelayanan.style.display = 'none';
        ifRecBerita.style.display = 'none';
        ifRecAgenda.style.display = 'none';
        ifRecPelayanan.style.display = 'none';
    });

    btnPelayanan.addEventListener('click', function() {
        ifPelayanan.style.display = 'none';
        ifRecPelayanan.style.display = 'block';
        ifPengumuman.style.display = 'none';
        ifBerita.style.display = 'none';
        ifAgenda.style.display = 'none';
        ifRecPengumuman.style.display = 'none';
        ifRecBerita.style.display = 'none';
        ifRecAgenda.style.display = 'none';
    });
    document.getElementById('kelahiran').addEventListener('click', function() {
        ifPelayanan.style.display = 'block';
        ifRecPelayanan.style.display = 'block';
        ifPengumuman.style.display = 'none';
        ifBerita.style.display = 'none';
        ifAgenda.style.display = 'none';
        ifRecPengumuman.style.display = 'none';
        ifRecBerita.style.display = 'none';
        ifRecAgenda.style.display = 'none';
        document.getElementById('framepelayanan').src = 'user/informasi_ext/detail_kelahiran.php';
    });
    document.getElementById('nikah').addEventListener('click', function() {
        ifPelayanan.style.display = 'block';
        ifRecPelayanan.style.display = 'block';
        ifPengumuman.style.display = 'none';
        ifBerita.style.display = 'none';
        ifAgenda.style.display = 'none';
        ifRecPengumuman.style.display = 'none';
        ifRecBerita.style.display = 'none';
        ifRecAgenda.style.display = 'none';
        document.getElementById('framepelayanan').src = 'user/informasi_ext/nikah.php';
    });
    document.getElementById('kematian').addEventListener('click', function() {
        ifPelayanan.style.display = 'block';
        ifRecPelayanan.style.display = 'block';
        ifPengumuman.style.display = 'none';
        ifBerita.style.display = 'none';
        ifAgenda.style.display = 'none';
        ifRecPengumuman.style.display = 'none';
        ifRecBerita.style.display = 'none';
        ifRecAgenda.style.display = 'none';
        document.getElementById('framepelayanan').src = 'user/informasi_ext/kematian.php';
    });
</script>


</html>