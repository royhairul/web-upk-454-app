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
    @include('partials.nav-pjmk', ['title' => 'Peminjaman'])

    <div class="p-8 w-full">
      <header class="flex gap-x-20 align-center">
        <div>
          <h2 class="text-2xl font-bold">Peminjaman</h2>
          <p class="text-base text-gray-600">Peminjaman yang anda ajukan</p>
        </div>

        <a href="{{ route('pjmk.pinjam.create') }}"
          class="rounded-md bg-cyan-500 h-max px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-cyan-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Buat
          Pengajuan</a>
      </header>
      <main class="mt-5">
        <ul role="list" class="flex flex-col divide-y-2 divide-gray-200 divide-dotted">
          <li class="flex justify-between gap-x-6 p-3 group hover:bg-gray-200 transition-colors duration-400 cursor-pointer">
            <div class="flex min-w-0 gap-x-4">
              <div class="min-w-0 flex-auto">
                <p class="text-sm font-bold leading-6 text-gray-900">C2.01</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Model dan Metode Pengembangan Perangkat Lunak
                </p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">9:00 s/d 10:00</p>
              </div>
            </div>
            <div class="shrink-0 flex items-center justify-center align-center gap-x-2">
                <span class="material-symbols-outlined text-gray-500">
                  pending
                </span>
                <p class="text-xs leading-5 text-gray-500">Waiting...</p>
            </div>
          </li>
          <li class="flex justify-between gap-x-6 p-3 group hover:bg-gray-200 transition-colors duration-400 cursor-pointer">
            <div class="flex min-w-0 gap-x-4">
              <div class="min-w-0 flex-auto">
                <p class="text-sm font-bold leading-6 text-gray-900">C2.01</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Model dan Metode Pengembangan Perangkat Lunak
                </p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">9:00 s/d 10:00</p>
              </div>
            </div>
            <div class="shrink-0 flex items-center justify-center align-center gap-x-2">
                <span class="material-symbols-outlined text-gray-500">
                  pending
                </span>
                <p class="text-xs leading-5 text-gray-500">Waiting...</p>
            </div>
          </li>
        </ul>
      </main>
    </div>
  </div>
</body>

</html>