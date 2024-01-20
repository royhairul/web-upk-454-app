<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peminjaman</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="bg-gray-100">
  <div class="container max-w-full min-h-full">
    @include('component.nav-pjmk', ['title' => 'Jadwal'])

    <div class="p-8 w-full relative">
      <header class="flex gap-x-20 align-center">
        <div>
          <h2 class="text-2xl font-bold">Jadwal</h2>
          <p class="text-base text-gray-600">Jadwal penggunaan ruang kelas</p>
        </div>

        <a href="{{ route('pjmk.jadwal.create') }}"
          class="rounded-md bg-cyan-500 h-max px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-cyan-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Buat
          Jadwal</a>
      </header>
      <main class="mt-5">
        
      </main>
    </div>
  </div>
</body>

</html>