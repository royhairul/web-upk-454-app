<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PJMK | Selamat Datang, {{ ucwords($user->pjmk_nama) }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="bg-gray-100">
  <div class="max-w-full h-screen relative top-0 left-0">
    @include('component.nav-pjmk', ['title' => 'Dashboard', 'user' => $user])
    <div class="px-5">
    <header>
      <div class="mt-5 mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg-cyan-500 rounded-xl backdrop-blur">
        <p class="text-base font-semibold tracking-tight text-gray-900">Selamat Datang, </p>
        <h1 class="text-3xl font-bold tracking-tight text-gray-100">{{ ucwords($user->pjmk_nama) }}</h1>
        <p class="mt-5 text-sm text-white">Kelas : {{ $user->pjmk_prodi }} - {{ $user->pjmk_kelas }}</p>
        <p class="text-sm  text-white">Nomor Induk Mahasiswa : {{ $user->pjmk_nim }}</p>
      </div>
    </header>
    <main class="mb-20">
      <div class="mt-10 mx-auto max-w-7xl p-6 bg-white shadow-sm rounded-xl">
        <h1 class="text-lg font-semibold text-gray-800">Jadwal Anda Hari Ini</h1>
        <p class="text-sm font-semibold text-cyan-500">
          @php
          setlocale(LC_ALL, 'Indonesian'); // Set locale ke bahasa Indonesia

          echo strftime('%A, %e %B %Y', time());
          @endphp
        </p>
        <!-- Box-wrapper -->
        <div class="w-full flex flex-wrap mt-5">
          <div class="flex flex-col rounded-lg bg-white w-max p-4 border-[1.5px] border-dashed shadow-sm">
            <h1 class="text-base font-bold text-gray-800">Metode dan Model Pengembangan Perangkat Lunak</h1>
            <p class="text-sm text-gray-800">Ruang : <span
                class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-bold text-yellow-800 ring-1 ring-inset ring-yellow-600/20">C2.1</span>
            </p>
            <p class="text-sm text-gray-800">Waktu : <span
                class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-bold text-yellow-800 ring-1 ring-inset ring-yellow-600/20">08:00</span>
            </p>
            <a href="#"
              class="self-end rounded-md bg-cyan-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Lihat Detail</a>
          </div>
        </div>
      </div>

      <div class="mt-10 mx-auto max-w-7xl p-6 bg-white shadow-sm rounded-xl">
        <div class="flex justify-between items-center">
          <h1 class="text-lg font-semibold text-gray-800">Daftar Peminjaman</h1>
          <a class="text-base flex align-center justify-center gap-x-2 py-2 px-3 font-semibold leading-6 text-cyan-500 rounded-md
                transition-colors duration-150
                hover:bg-gray-50 hover"
                 href="{{ route('pjmk.pinjam') }}">
                    <span class="block leading-5">Selengkapnya</span>
                    <span class="block material-symbols-outlined self-center">
                        arrow_right_alt
                    </span>
                </a>
        </div>
        <!-- Box-wrapper -->
        <div class="w-full flex flex-wrap mt-5">
          <ul role="list" class="w-full flex flex-col divide-y-2 divide-gray-200 gap-4 divide-dotted bg-white p-5 rounded-md">
            @foreach ($peminjaman as $p)
            <a href="{{ route('pjmk.pinjam.detail', $p->peminjaman_id) }}">
              <li
                class="flex justify-between gap-x-6 p-3 group hover:bg-gray-100 transition-colors duration-300 cursor-pointer">
                <div class="flex min-w-0 gap-x-4">
                  <div class="min-w-0 flex-auto">
                    <p class="text-lg font-extrabold leading-8 text-cyan-600">{{ $p->peminjaman_ruangkelas }}</p>
                    <div class="flex gap-x-4">
                      <p class="text-gray-500 flex items-center gap-x-2 bg-cyan-50 p-1 rounded-md">
                        <span class="text-lg material-symbols-outlined">event</span>
                        <span class="text-xs">{{ strftime('%A, %e %B %Y', strtotime($p->peminjaman_tanggal)) }}</span>
                      </p>
                      <p class="text-gray-500 flex items-center gap-x-2 bg-cyan-50 p-1 rounded-md">
                        <span class="text-lg material-symbols-outlined">schedule</span>
                        <span class="text-xs font-semibold">
                          {{ substr($p->peminjaman_waktu_mulai, 0, 5) }}
                          s/d
                          {{ substr($p->peminjaman_waktu_selesai, 0, 5) }}
                        </span>
                      </p>
                    </div>
                    <p class="mt-5 text-sm leading-5 text-gray-500 flex gap-x-2">
                      <span class="material-symbols-outlined">school</span>
                      {{ $p->matakuliah_nama }}
                    </p>
                  </div>
                </div>
                <div class="shrink-0">
                  <span class="flex align-center justify-center items-center gap-x-2 px-4 py-2 rounded-md
                          @if ($p->peminjaman_status == 'Waiting') ring-gray-500/10 bg-gray-50 text-gray-400
                          @elseif ($p->peminjaman_status == 'Disetujui') ring-green-600/10 bg-green-50 text-green-700
                          @elseif ($p->peminjaman_status == 'Ditolak') ring-rose-500/10 bg-rose-50 text-rose-600
                          @endif
                          ">
                    <span class="material-symbols-outlined block">
                      @if ($p->peminjaman_status == 'Waiting') pending
                      @elseif ($p->peminjaman_status == 'Disetujui') check_circle
                      @elseif ($p->peminjaman_status == 'Ditolak') cancel
                      @endif
                    </span>
                    <span class="block text-sm">{{ $p->peminjaman_status }}</span>
                  </span>
                </div>
              </li>
            </a>
            @endforeach
          </ul>
        </div>
      </div>
    </main>
    </div>
  </div>


</body>

</html>