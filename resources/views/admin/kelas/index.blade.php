<!-- Index untuk Halaman Admin Ruang Kelas -->

@extends('layouts.admin', ['page' => 'Kelas'])

@section('title', 'Ruang Kelas')

@section('main-content')
<h1 class="text-2xl font-semibold">Ruang Kelas</h1>
<p class="text-base text-slate-500">
  Daftar Polting Ruang Kelas pada Gedung 454
</p>

<a href="{{ route('admin.kelas.create') }}"
  class="flex w-max mt-5 cursor-pointer text-base rounded-md bg-indigo-600 px-2.5 py-2.5 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
  Tambah Ruang Kelas
</a>

<!-- Input Search -->
<!-- <form action="{{ route('search') }}" method="post" class="mt-10 flex gap-4">
  @csrf
  <input type="text" name="search" id="search"
    class="rounded-md w-[50ch] border-0 py-2.5 pl-3 pr-10 text-base text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-0 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
    placeholder="Cari berdasarkan Kapasitas atau Prodi">
  <button type="submit"
    class="flex cursor-pointer rounded-md bg-indigo-600 px-2.5 py-2.5 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    <span class="material-symbols-rounded">
      search
    </span>
  </button>
</form> -->

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
              Nama Ruang</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Kapasitas</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Prodi</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Status</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Action</th>

          </tr>
        </thead>
        <tbody class="bg-white dark:bg-slate-800">
          @if (sizeOf($ruangkelas) == 0)
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-300 dark:text-slate-400 text-center"
              colspan="9">
              Tidak Ada Data Ruang Kelas</td>
          </tr>
          @else
          @foreach ($ruangkelas as $rk)
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              {{ $rk->ruangkelas_code }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $rk->ruangkelas_kapasitas }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $rk->ruangkelas_prodi }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $rk->ruangkelas_status }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
              <form action="{{ route('admin.kelas.destroy', $rk->ruangkelas_code) }}" method="post">
                @method('DELETE')
                @csrf
              <a href="{{ route('admin.kelas.edit', $rk->ruangkelas_code) }}" class="font-semibold text-indigo-600"
                id='showButton'>
                Edit
              </a>
              <span> | </span>
              <button type="submit" class="font-semibold text-rose-600"
                id='showButton'>
                Hapus
              </button>
              </form>
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