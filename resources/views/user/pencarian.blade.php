<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PJMK | Pencarian Ruangan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body class="bg-gray-100">
  <div class="max-w-full h-screen relative top-0 left-0">
    @include('component.nav-pjmk', ['title' => 'Pencarian'])
    <main class="mb-20 p-8">
      <h1 class="text-2xl font-bold">Informasi Ruang Kelas</h1>
      <p class="text-sm text-gray-500 leading-8">
        Informasi Penggunaan Ruang Kelas Per
        <b> 
        @php 
          setlocale(LC_TIME, 'Indonesian');
          $hari_ini = strftime('%A, %e %B %Y', time());
          echo $hari_ini;
        @endphp
        </b>
      </p>

      <!-- Table -->
      <div class="mt-10 relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
        <div style="background-position: 10px 10px;"
          class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
        </div>
        <div class="relative rounded-xl overflow-auto">
          <div class="shadow-sm overflow-hidden my-8">
            <table class="border-collapse table-fixed w-full text-sm">
              <thead>
                <tr>
                  @foreach($ruangkelas as $rk)
                  <th
                    class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                    {{$rk->ruangkelas_code}}
                  </th>
                  @endforeach
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-slate-800">
                <tr>
                  @foreach($peminjamanPerRuang as $pj)
                  <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                    <div class="flex gap-x-4 border p-2 bg-gray-100 shadow-sm rounded-sm">
                        <p class="text-gray-500 flex items-center gap-x-2 p-1 rounded-md">
                          <span class="text-lg material-symbols-outlined">tag</span>
                          <span class="text-sm">{{ $pj->pjmk_prodi }} - {{ $pj->pjmk_kelas }}</span>
                        </p>
                        <p class="text-gray-500 flex items-center gap-x-2 p-1 rounded-md">
                          <span class="text-lg material-symbols-outlined">schedule</span>
                          <span class="text-sm font-semibold">
                            {{ substr($pj->peminjaman_waktu_mulai, 0, 5) }}
                            s/d
                            {{ substr($pj->peminjaman_waktu_selesai, 0, 5) }}
                          </span>
                        </p>
                      </div>
                  </td>
                  @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
      </div>
    </main>
  </div>
</body>
</html>