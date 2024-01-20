@extends('layouts.admin', ['page' => 'Laporan'])

@section('title', 'Laporan')

@section('main-content')
<h1 class="text-2xl font-semibold">Laporan</h1>
<p class="text-base text-slate-500">
  Laporan mengenai Peminjaman yang telah dilakukan
</p>

<!-- Input Search -->
<form action="{{ route('search') }}" method="post" class="mt-10 flex gap-4">
  @csrf
  <input type="text" name="search" id="search"
    class="rounded-md w-[50ch] border-0 py-2.5 pl-3 pr-10 text-base text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-0 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
    placeholder="Cari berdasarkan Nama atau Kelas PJMK">
  <button type="submit"
    class="flex cursor-pointer rounded-md bg-indigo-600 px-2.5 py-2.5 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    <span class="material-symbols-rounded">
      search
    </span>
  </button>

  <!-- <button type="button" id="filterButton"
    class="flex gap-x-2 justify-center align-center cursor-pointer rounded-md bg-indigo-600 px-3 py-2.5 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    <span class="material-symbols-rounded">
      filter_list
    </span>
    <span class="text-base">Filter</span>
  </button> -->
</form>

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
              Kode Ruangan</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Nama PJMK</th>
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
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400" colspan="5">
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
@endsection