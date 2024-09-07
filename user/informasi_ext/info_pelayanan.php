<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading</title>
  <!-- Tambahkan link CSS Tailwind -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class=" p-8 flex items-center justify-center h-screen">

  <div class="bg-white p-8 rounded shadow-md text-center">
    <h1 class="text-2xl font-bold mb-4">Loading...</h1>

    <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-blue-500 border-r-2 border-b-2 border-l-4 border-gray-300"></div>

    <!-- Atau gunakan kelas built-in tailwind untuk animasi spin -->
    <!-- <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-blue-500 border-b-2 border-l-4 border-gray-300"></div> -->
  </div>

</body>