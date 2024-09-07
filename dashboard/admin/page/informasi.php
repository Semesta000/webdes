
<?php
if (isset($_GET['page']) && $_GET['page'] == 'edit_informasi') {
    include 'page/tambah_informasi.php';
} else {
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header class="bg-gray-900 w-[100%] sticky left-0 top-0">
        <nav class="h-16 w-[100%] flex mx-auto " >
            <div class="place-self-center p-5">
                <h1 class="text-white font-bold">Informasi</h1>
            </div>
        </nav>
    </header>
    <div class="keuangan">
        <h1>Ini Bagian Keuangan</h1>
    </div>
    <div class="info">
        <h1>Ini Bagian Informasi</h1>
    </div>
    <div class="agenda">
        <h1>Ini Bagian Agenda</h1>
    </div>
</body>
</html>
<?php
}
?>