<!DOCTYPE html>
<html lang="en">
  @php
  setlocale(LC_ALL, 'Indonesian'); // Set locale ke bahasa Indonesia
  @endphp

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
    @include('component.nav-pjmk', ['title' => 'Riwayat', 'user' => $user])

    <div class="p-8 w-full">
      <header class="flex gap-x-40 align-center">
        <div>
          <h2 class="text-2xl font-semibold leading-8">Riwayat</h2>
          <p class="text-sm text-gray-500">Riwayat peminjaman yang pernah dilakukan.</p>
        </div>
      </header>
      <main class="mt-5">
      <div class="mt-10 relative bg-gray-50 rounded-xl shadow-lg border-2">
        <div class="absolute inset-0 bg-grid-slate-100"></div>
        <div class="relative rounded-xl overflow-auto">
            <div class="shadow-sm my-8">
                <table class="border-collapse table-fixed w-full text-sm">
                    <thead>
                    <tr>
                        <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">
                            Ruang Kelas
                        </th>
                        <th class="border-b font-medium p-4 pt-0 pb-3 text-slate-400 text-left">
                            Tanggal Peminjaman
                        </th>
                        <th class="border-b font-medium p-4 pt-0 pb-3 text-slate-400 text-left">
                            Waktu Peminjaman
                        </th>
                        <th class="border-b font-medium p-4 pt-0 pb-3 text-slate-400 text-left">
                            Mata Kuliah
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if (sizeOf($data) == 0)
                        <tr>
                            <td class="border-b border-slate-100 p-4 pr-8 text-slate-300 text-center" colspan="5">
                            Anda Tidak Memiliki Riwayat Peminjaman</td>
                        </tr>
                        @else
                        @foreach ($data as $peminjaman)
                        <tr>
                            <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                                <b>{{ $peminjaman->peminjaman_ruangkelas }}</b>
                            </td>
                            <td class="border-b border-slate-100 p-4 text-slate-500">
                                {{ strftime('%A, %e %B %Y', strtotime($peminjaman->peminjaman_tanggal)) }}
                            </td>
                            <td class="border-b border-slate-100 p-4 pr-8 text-slate-500">
                                {{ substr($peminjaman->peminjaman_waktu_mulai, 0, 5) }}
                                s/d
                                {{ substr($peminjaman->peminjaman_waktu_selesai, 0, 5) }}
                            </td>
                            <td class="border-b border-slate-100 p-4 pr-8 text-slate-500">
                                {{ $peminjaman->peminjaman_matakuliah }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
        </div>
    </main>
    </div>
  </div>

  <script async>
    const UserMenuHandler = document.getElementById("user-menu-button");
    UserMenuHandler.addEventListener('click', () => {
      const classMenu = document.getElementById('list-menu').classList;
      classMenu.toggle('hidden');
      classMenu.toggle('block');
    })
  </script>

</body>

</html>