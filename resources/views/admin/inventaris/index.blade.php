@extends('layouts.admin', ['page' => 'Inventaris'])

@section('title', 'Inventaris')

@section('main-content')
<h1 class="text-2xl font-semibold">Inventaris</h1>
<p class="text-base text-slate-500">
  Inventaris mengenai Penunjang Pembelajaran yang disediakan
</p>

<a href="{{ route('admin.inventaris.create') }}"
  class="flex w-max mt-5 cursor-pointer text-base rounded-md bg-indigo-600 px-2.5 py-2.5 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
  Tambah Barang
</a>

<!-- Input Search -->
<<<<<<< HEAD
<!-- <form action="{{ route('search') }}" method="post" class="mt-10 flex gap-4">
  @csrf
  <input type="text" name="search" id="search"
    class="rounded-md w-[50ch] border-0 py-2.5 pl-3 pr-10 text-base text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-0 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
    placeholder="Cari berdasarkan kode inventaris">
=======
<form action="/admin/inventaris" method="get" class="mt-10 flex gap-4">
  @csrf
  <input type="text" name="search" id="search"
    class="rounded-md w-[50ch] border-0 py-2.5 pl-3 pr-10 text-base text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-0 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
    placeholder="Cari berdasarkan Kode Inventaris, Merk Barang dan Type Barang ">
>>>>>>> 39c3a8276b5addcd59b1894d013b7f991c6c9629
  <button type="submit"
    class="flex cursor-pointer rounded-md bg-indigo-600 px-2.5 py-2.5 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    <span class="material-symbols-rounded">
      search
    </span>
  </button>

<<<<<<< HEAD
</form> -->
=======
</form>
>>>>>>> 39c3a8276b5addcd59b1894d013b7f991c6c9629

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
              Kode Inventaris</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Merk Barang</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Type Barang</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
<<<<<<< HEAD
=======
              Status</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
>>>>>>> 39c3a8276b5addcd59b1894d013b7f991c6c9629
              Action</th>
            
          </tr>
        </thead>
        <tbody class="bg-white dark:bg-slate-800">
          @if (sizeOf($fasilitas) == 0)
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-300 dark:text-slate-400 text-center"
              colspan="9">
              Tidak Ada Data Inventaris</td>
          </tr>
          @else
          @foreach ($fasilitas as $rk)
          <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
              {{ $rk->fasilitas_code }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $rk->fasilitas_name }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $rk->fasilitas_type }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $rk->fasilitas_status }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
              <form action="{{ route('admin.inventaris.destroy', $rk->fasilitas_code) }}" method="post">
                @method('DELETE')
                @csrf
                <a href="{{ route('admin.inventaris.edit', $rk->fasilitas_code) }}" class="font-semibold text-indigo-600"
                  id='showButton'>
                  Edit
                </a>
                <span> | </span>
                <button type="submit" class="font-semibold text-rose-600" id='showButton'>
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