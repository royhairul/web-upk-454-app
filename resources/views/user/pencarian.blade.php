<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PJMK | Pencarian Ruangan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div class="max-w-full h-screen relative top-0 left-0">
    @include('component.nav-pjmk', ['title' => 'Info Ruangan'])
    <main class="mb-20">
      <h1 class="text-2xl font-semibold">Informasi Ruang Kelas</h1>
      <p class="text-base text-slate-500">
        Informasi mengenai ruang kelas pada hari 
        @php 
        setlocale(LC_TIME, 'Indonesian');
        $hari_ini = strftime('%A', time());
        echo $hari_ini;
        @endphp
      </p>

      <!-- Table -->
      <div class="mt-10 relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
        <div style="background-position: 10px 10px;"
          class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
        </div>
        <div class="relative rounded-xl overflow-auto">
          <div class="shadow-sm overflow-hidden my-8">
            <table class="border-collapse table-auto w-full text-sm">
              <thead>
                <tr>
                  <th
                    class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                    Hari</th>
                  <th
                    class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                    Kode Ruangan</th>
                  <th
                    class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                    Kelas</th>
                  <th
                    class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                    Tanggal Pinjam</th>
                  <th
                    class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                    Mata Kuliah</th>
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-slate-800">
                @if (sizeOf($data) == 0)
                <tr>
                  <td
                    class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400"
                    colspan="5">
                    Tidak Ada Hasil</td>
                </tr>
                @else
                @foreach ($data as $peminjaman)
                <tr>
                  <td
                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                    {{ $peminjaman->ruangkelas_code }}</td>
                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ $peminjaman->pjmk_nama }}</td>
                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ $peminjaman->pjmk_kelas }}</td>
                  <td
                    class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                    {{ $peminjaman->peminjaman_tanggal }}
                  </td>
                  <td
                    class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                    {{ $peminjaman->matakuliah_nama }}
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
</body>
</html>