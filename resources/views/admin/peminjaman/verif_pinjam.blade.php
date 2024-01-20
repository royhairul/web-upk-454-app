@extends('layouts.admin', ['page' => 'Peminjaman'])

@section('title', 'Peminjaman')

@section('main-content')
<h1 class="text-2xl font-semibold">Verikasi Peminjaman</h1>
<p class="text-base text-slate-500">
  Detail Peminjaman yang akan dilakukan
</p>

<!-- Table -->
<div class="mt-10 relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
  <div style="background-position: 10px 10px;"
    class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
  </div>
  <div class="relative rounded-xl overflow-auto">
    <div class="shadow-sm overflow-auto my-8">
      <table class="border-collapse table-auto w-full text-sm">
        <thead>
          <tr>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left" rowspan="2">
              Informasi</th>
          </tr>
        </thead>
        <tbody class="bg-white dark:bg-slate-800">
          @foreach ($peminjaman as $peminjaman)
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              Ruang</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              : {{ $peminjaman->peminjaman_ruangkelas }}</td>
          </tr>
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              Kelas</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              : {{ $peminjaman->pjmk_prodi }} - {{ $peminjaman->pjmk_kelas }}</td>
          </tr>
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              Tanggal Pinjam</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              : {{ $peminjaman->peminjaman_tanggal }}</td>
          </tr>
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              Waktu Pinjam</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              : {{ $peminjaman->peminjaman_waktu_mulai }} s/d {{ $peminjaman->peminjaman_waktu_selesai }}</td>
          </tr>
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              Mata Kuliah</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              : {{ $peminjaman->matakuliah_nama }}</td>
          </tr>
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              Fasilitas Pendukung</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              @php $fasilitas = $peminjaman->peminjaman_fasilitas @endphp
              <ul class="list-disc">
                @if($fasilitas[0] == 1) <li>Remote AC</li> @endif
                @if($fasilitas[1] == 1) <li>Proyektor</li> @endif
                @if($fasilitas[2] == 1) <li>Stopkontak</li> @endif
              </ul>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
</div>
@endsection