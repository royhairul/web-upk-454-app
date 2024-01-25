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
      <header>
        <a href="{{ route('pjmk.pinjam') }}" class="flex gap-x-1 items-center text-cyan-500 hover:text-cyan-600">
          <span class="material-symbols-outlined text-lg">arrow_back</span>
          <span class="font-semibold">Kembali</span>
        </a>
        <div class="mt-5">
          <h3 class="text-xl font-semibold leading-7">Detail Peminjaman</h3>
          <p class="mt-1 text-sm leading-6 text-gray-500">Rincian mengenai pengajuan peminjaman</p>
        </div>
      </header>
      <main class="mt-5">
        <div>
          <div class="flex items-center gap-x-2 text-gray-300">
            <span class="material-symbols-outlined">tag</span>
            <span class="font-semibold">{{ $peminjaman->peminjaman_id }}</span>
          </div>
          <div class="mt-6 p-4 bg-white">
            <dl class="divide-y divide-gray-300">
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Ruang Kelas</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  {{ $peminjaman->peminjaman_ruangkelas }}
                </dd>
              </div>
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal Peminjaman</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  {{ strftime('%A, %e %B %Y', strtotime($peminjaman->peminjaman_tanggal)) }}
                </dd>
              </div>
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Waktu Peminjaman</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  <b>{{ $peminjaman->peminjaman_waktu_mulai }}</b>
                  s/d
                  <b>{{ $peminjaman->peminjaman_waktu_selesai }}</b>
                </dd>
              </div>
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Mata Kuliah</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  {{ $peminjaman->peminjaman_matakuliah }}
                </dd>
              </div>
              <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Status</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  <span class="block flex items-center gap-x-2 px-4 py-2 rounded-md border-[1.5px]
                                    @if ($peminjaman->peminjaman_status == 'Waiting') border-gray-300 bg-gray-50 text-gray-600
                                    @elseif ($peminjaman->peminjaman_status == 'Disetujui') bg-green-50 text-green-700
                                    @elseif ($peminjaman->peminjaman_status == 'Berlangsung') bg-yellow-50 text-yellow-700
                                    @elseif ($peminjaman->peminjaman_status == 'Ditolak') ring-rose-500/10 bg-rose-50 text-rose-600
                                    @endif
                                    ">
                    <span class="material-symbols-outlined block">
                      @if ($peminjaman->peminjaman_status == 'Waiting') pending
                      @elseif ($peminjaman->peminjaman_status == 'Disetujui') check_circle
                      @elseif ($peminjaman->peminjaman_status == 'Berlangsung') stream
                      @elseif ($peminjaman->peminjaman_status == 'Ditolak') cancel
                      @endif
                    </span>
                    <span class="block text-sm">{{ $peminjaman->peminjaman_status }}</span>
                  </span>

                  @if ($peminjaman->peminjaman_status == 'Disetujui' || $peminjaman->peminjaman_status == 'Berlangsung' )
                  <p class="mt-2">
                    Disetujui oleh
                    <b>{{ $peminjaman->peminjaman_admin }}</b>
                  </p>
                  @endif

                </dd>
              </div>
              
              @if($peminjaman->peminjaman_status == 'Berlangsung')
              <a href="{{ route('pjmk.kembali.create', $peminjaman->peminjaman_id) }}"
                class="rounded-md bg-cyan-500 mt-10 h-max px-5 py-3 font-semibold text-white shadow-lg shadow-cyan-100 hover:bg-cyan-600
                        flex gap-x-4 justify-center align-center">
                <span class="material-symbols-outlined">assignment_return</span>
                <span>Pengembalian</span>
              </a>
              @endif
            </dl>
          </div>
        </div>
        
      </main>
    </div>
  </div>
</body>

</html>