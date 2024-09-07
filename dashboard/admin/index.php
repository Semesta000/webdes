<?php
include '../../config.php';

$userInfo = @$_SESSION['id_user_admin'];
$q_data_user = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$userInfo'");
$data_user_login = mysqli_fetch_array($q_data_user);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="../assets/js/script.js" defer></script>
    <title>SekNdes</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="asset/pemerintah/gambar3.jpeg">
</head>

<body>
    <div id="konten-admin" class="block w-full">
        <div id="navbar" class="fixed flex flex-col left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
            <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
                <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
                <span class="text-lg font-bold text-white ml-3">Sekndes Admin</span>
            </a>
            <ul class="mt-4">
                <li class="mb-1 group active">
                    <a href="?page=dashboard" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md gap-3">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <span class="text-base">Dashboard</span>
                    </a>
                </li>
                <li class="mb-1 group ">
                    <a href="?page=user" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md gap-3">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                        <span class="text-base">User</span>
                    </a>
                </li>
                <li class="mb-1 group ">
                    <a href="?page=artikel" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md gap-3">
                        <span class="material-symbols-outlined">
                            article
                        </span>
                        <span class="text-base">Artikel</span>
                    </a>
                </li>
                <li class="mb-1 group ">
                    <a href="?page=galeri" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md gap-3">
                        <span class="material-symbols-outlined">
                            image
                        </span>
                        <span class="text-base">Galeri</span>
                    </a>
                </li>
                <li class="mb-1 group ">
                    <a href="?page=lapor" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md gap-3">
                        <span class="material-symbols-outlined">
                            flag
                        </span>
                        <span class="text-base">Laporan</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="?page=informasi" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md gap-3">
                        <span class="material-symbols-outlined">
                            info
                        </span>
                        <span class="text-base">Informasi</span>
                    </a>
                </li>
            </ul>
            <span id="jam" class="text-white text-2xl mt-28 text-center bottom-0 bg-blue-500 rounded-lg"> </span>
            <div class="text-center text-white font-bold text-xl pt-5"><?php echo $data_user_login['name']; ?></div>
            <div class="flex items-center justify-center p-2">
                <button id="logoutBtn" class="p-2 bg-red-700 rounded-lg font-bold text-white">
                    Logout
                </button>
            </div>
        </div>
        <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
            <div class=" bg-gray-200 items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

                switch ($page) {
                        // ===================> Include page artikel <===================
                    case 'artikel':
                        include 'page/artikel.php';
                        break;
                    case 'tambah_artikel':
                        include 'ekstra/tambah_artikel.php';
                        break;
                    case 'edit_artikel':
                        include 'ekstra/edit_artikel.php';
                        break;
                    case 'detail_artikel':
                        include 'ekstra/detail_artikel.php';
                        break;
                        // ===================> Include page user <===================
                    case 'user':
                        include 'page/user.php';
                        break;
                    case 'tambah_user':
                        include 'ekstra/tambah_user.php';
                        break;
                    case 'edit_user':
                        include 'ekstra/edit_user.php';
                        break;
                    case 'search_user':
                        include 'ekstra/search_user.php';
                        break;
                        // ===================> Include page profil <===================
                    case 'profil':
                        include 'profil.php';
                        break;
                    case 'edit_profil':
                        include 'ekstra/edit_profil.php';
                        break;
                    case 'tambah_profil':
                        include 'ekstra/tambah_profil.php';
                        break;
                        // ===================> Include page pemerintahan <===================
                    case 'pemerintahan':
                        include 'page/pemerintahan.php';
                        break;
                    case 'edit_pemerintahan':
                        include 'ekstra/edit_pemerintahan.php';
                        break;
                        // ===================> Include page informasi <===================
                    case 'informasi':
                        include 'page/informasi.php';
                        break;
                    case 'edit_informasi':
                        include 'ekstra/edit_informasi.php';
                        break;
                    case 'tambah_informasi':
                        include 'ekstra/tambah_informasi.php';
                        break;
                        // ===================> Include page galeri <===================
                    case 'galeri':
                        include 'page/galeri.php';
                        break;
                    case 'edit_galeri':
                        include 'ekstra/edit_galeri.php';
                        break;
                    case 'tambah_galeri':
                        include 'ekstra/tambah_galeri.php';
                        break;
                        // ===================> Include page lapor <===================
                    case 'lapor':
                        include 'page/lapor.php';
                        break;
                    case 'edit_lapor':
                        include 'ekstra/edit_lapor.php';
                        break;
                    case 'detail_laporan':
                        include 'ekstra/detail_laporan.php';
                        break;
                    case 'error':
                        include 'ekstra/error.html';
                        break;
                        // ===================> Include page dashboard as default <===================
                    default:
                        include 'page/dashboard.php';
                        break;
                }
                ?>
            </div>
        </main>
    </div>

    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                window.location.href = '../../logout.php';
            } else {
                window.location.href = '?page=dashboard';
            }
        });

        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                window.location.href = '../../logout.php';
            }
        }

        function tampilkanJam() {
            var now = new Date();
            var jam = now.getHours();
            var menit = now.getMinutes();
            var detik = now.getSeconds();
            jam = jam.toString().padStart(2, '0');
            menit = menit.toString().padStart(2, '0');
            detik = detik.toString().padStart(2, '0');

            var waktu = jam + ":" + menit + ":" + detik;
            document.getElementById('jam').innerHTML = waktu;
        }
        setInterval(tampilkanJam, 5);

        const kontenPage = document.getElementById("konten");

        function checkScreenSize() {
            var width = window.innerWidth;
            if (width <= 924) {
                kontenPage.classList.add("hidden");
                kontenPage.classList.remove("block");
            } else {
                kontenPage.classList.add("block");
                kontenPage.classList.remove("hidden");
            }
        }

        window.onload = checkScreenSize;
    </script>
</body>
<?php  ?>