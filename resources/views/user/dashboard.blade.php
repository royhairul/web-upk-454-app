<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selamat Datang, </title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div class="max-w-full min-h-full">
    @include('partials.nav-pjmk', ['title' => 'Dashboard'])
    <header>
      <div class="mt-5 mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg-cyan-500 rounded-2xl">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Selamat Datang, {{ "Roy" }}</h1>
        <p class="text-sm font-bold text-white">Terakhir login : Senin, 29 Mei 2023</p>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1 class="text-lg font-semibold text-gray-800">Jadwal Anda Hari Ini</h1>
        <p class="text-sm font-semibold text-cyan-500">Selasa, 28 Mei 2023</p>
        <!-- Box-wrapper -->
        <div class="w-full flex flex-wrap mt-5">
          <div class="flex flex-col rounded-lg bg-white w-max p-4 shadow-md">
            <h1 class="text-base font-bold text-gray-800">Metode dan Model Pengembangan Perangkat Lunak</h1>
            <p class="text-sm text-gray-800">Ruang : <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-bold text-yellow-800 ring-1 ring-inset ring-yellow-600/20">C2.1</span></p>
            <p class="text-sm text-gray-800">Waktu : <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-bold text-yellow-800 ring-1 ring-inset ring-yellow-600/20">08:00</span></p>
            <a href="#"
              class="self-end rounded-md bg-cyan-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Lihat Detail</a>
          </div>
        </div>
      </div>

      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1 class="text-lg font-semibold text-gray-800">Daftar Peminjaman</h1>
        <!-- Box-wrapper -->
        <div class="w-full flex flex-wrap mt-5">
          <div class="flex flex-col rounded-lg bg-white w-max p-4 shadow-md">
            <h1 class="text-base font-bold text-gray-800">Metode dan Model Pengembangan Perangkat Lunak</h1>
            <p class="text-sm text-gray-800">Ruang : <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-bold text-yellow-800 ring-1 ring-inset ring-yellow-600/20">C2.1</span></p>
            <p class="text-sm text-gray-800">Waktu : <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-bold text-yellow-800 ring-1 ring-inset ring-yellow-600/20">08:00</span></p>
            <a href="#"
              class="self-end rounded-md bg-cyan-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Lihat Detail</a>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script async >
    const UserMenuHandler = document.getElementById("user-menu-button");
    UserMenuHandler.addEventListener('click', () => {
      const classMenu = document.getElementById('list-menu').classList;
      classMenu.toggle('hidden');
      classMenu.toggle('block');
    })
  </script>

</body>

</html>