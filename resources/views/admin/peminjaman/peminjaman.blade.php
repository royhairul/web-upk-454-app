@extends('layouts.admin', ['page' => 'Peminjaman'])

@section('title', 'Peminjaman')

@section('main-content')
<h1 class="text-2xl font-semibold">Peminjaman</h1>
<p class="text-base text-slate-500">
  Daftar Peminjaman yang akan dilakukan
</p>

<form action="/admin/peminjaman" method="get" class="mt-10 flex gap-4">
  @csrf
  <input type="text" name="search" id="search"
    class="rounded-md w-[50ch] border-0 py-2.5 pl-3 pr-10 text-base text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-0 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
    placeholder="Cari berdasarkan Ruang Kelas">
  <button type="submit"
    class="flex cursor-pointer rounded-md bg-indigo-600 px-2.5 py-2.5 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    <span class="material-symbols-rounded">
      search
    </span>
  </button>
</form>

<!-- Table -->
<!-- Table -->
<div class="mt-10 relative bg-slate-50 rounded-xl overflow-hidden">
  <div style="background-position: 10px 10px;"
    class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
  </div>
  <div class="relative rounded-xl overflow-auto">
    <div class="shadow-sm overflow-auto my-8">
      <table class="border-collapse table-auto w-full text-sm">
        <thead>
          <tr>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Ruangan</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Kelas</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Tanggal Peminjaman</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Waktu Peminjaman</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Mata Kuliah</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Action</th>
            
          </tr>
        </thead>
        <tbody class="bg-white dark:bg-slate-800">
          @if (sizeOf($peminjaman) == 0)
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-300 dark:text-slate-400 text-center" colspan="9">
              Tidak Ada Peminjaman yang Belum Disetujui</td>
          </tr>
          @else
          @foreach ($peminjaman as $peminjaman)
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              {{ $peminjaman->peminjaman_ruangkelas }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 font-semibold">
              {{ $peminjaman->pjmk_prodi }}-{{ $peminjaman->pjmk_kelas }}
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $peminjaman->peminjaman_tanggal }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ substr($peminjaman->peminjaman_waktu_mulai, 0, 5) }}
              s/d
              {{ substr($peminjaman->peminjaman_waktu_selesai, 0, 5) }}
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
              {{ $peminjaman->peminjaman_matakuliah }}
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                <a href="{{ route('admin.peminjaman.verif', $id = $peminjaman->peminjaman_id) }}"
                  class="font-semibold text-green-600 leading-2 flex bg-green-50 px-2 py-1 justify-center items-center gap-x-2 rounded-md
                         hover:bg-green-100 hover:text-green-700 transition-colors duration-150" id='showButton'>
                  <span>Detail</span>
                  <span class="material-symbols-outlined">navigate_next</span>
                </a> 
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
@endsection