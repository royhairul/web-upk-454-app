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
    @include('component.nav-pjmk', ['title' => 'Peminjaman', 'user' => $user])

    <div class="p-8 w-full">
      <header class="flex gap-x-40 align-center">
        <div>
          <h2 class="text-2xl font-semibold leading-8">Peminjaman</h2>
          <p class="text-sm text-gray-500">Peminjaman yang anda ajukan</p>
        </div>

        <a href="{{ route('pjmk.pinjam.create') }}"
          class="rounded-md bg-cyan-500 h-max px-5 py-3 font-semibold text-white shadow-lg shadow-cyan-100 hover:bg-cyan-600
                  flex gap-x-4 justify-center align-center">
          <span class="material-symbols-outlined">assignment_add</span>
          <span>Buat Pengajuan</span>
        </a>
      </header>
      <main class="mt-5">

        @if (sizeOf($peminjaman) == 0)
          <p class="text-gray-400 w-full text-center border-[1.5px] border-dashed py-10">
            Tidak Ada Peminjaman.
            <a href="{{ route('pjmk.pinjam.create') }}" class="text-cyan-500">Buat</a>
          </p>

        @else
        <ul role="list" class="flex flex-col divide-y-2 divide-gray-200 gap-4 divide-dotted bg-white p-5 rounded-md">
          @foreach ($peminjaman as $p)
          <a href="{{ route('pjmk.pinjam.detail', $p->peminjaman_id) }}">
          <li class="flex justify-between gap-x-6 p-3 group hover:bg-gray-100 transition-colors duration-300 cursor-pointer">
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
                    {{ $p->peminjaman_matakuliah }}
                  </p>
                </div>
              </div>
              <div class="shrink-0">
                  <span class="flex align-center justify-center items-center gap-x-2 px-4 py-2 rounded-md
                  @if ($p->peminjaman_status == 'Waiting') ring-gray-500/10 bg-gray-50 text-gray-400
                  @elseif ($p->peminjaman_status == 'Disetujui') ring-green-600/10 bg-green-50 text-green-700
                  @elseif ($p->peminjaman_status == 'Berlangsung') ring-yellow-600/10 bg-yellow-50 text-yellow-700
                  @elseif ($p->peminjaman_status == 'Ditolak') ring-rose-500/10 bg-rose-50 text-rose-600
                  @endif
                  ">
                    <span class="material-symbols-outlined block">
                      @if ($p->peminjaman_status == 'Waiting') pending
                      @elseif ($p->peminjaman_status == 'Disetujui') check_circle
                      @elseif ($p->peminjaman_status == 'Berlangsung') stream
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
        @endif
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