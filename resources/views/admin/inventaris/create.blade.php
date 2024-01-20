@extends('layouts.admin', ['page' => 'Inventaris'])

@section('title', 'Tambah Barang')

@section('main-content')
<form action="{{ route('admin.inventaris.store') }}" method="post">
  @csrf
  <h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900 ">Tambah Barang Baru</h2>
  <p class="text-base leading-9 tracking-tight text-gray-400">
    Membuat Data Baru untuk Barang.
  </p>
  <div class="w-[500px] mt-5 flex flex-col gap-5">

    <div class="">
      <label for="code" class="block text-sm font-medium leading-6 text-gray-900">Kode Barang</label>
      <div class="mt-2">
        <input id="code" name="code" type="text" required value="{{ old('code') }}" class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
                  @error('code') ring-rose-500  @enderror">
        @error('code')
        <p class="absolute text-sm text-rose-500">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="row-span-1">
      <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Barang</label>
      <div class="mt-2">
        <input id="nama" name="nama" type="text" required value="{{ old('nama') }}" class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
              @error('nama') ring-rose-500  @enderror">
        @error('nama')
        <p class="absolute text-sm text-rose-500">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="row-span-1">
      <label for="tipe" class="block text-sm font-medium leading-6 text-gray-900">Tipe Barang</label>
      <div class="mt-2">
        <input id="tipe" name="tipe" type="text" required value="{{ old('tipe') }}" class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
              @error('tipe') ring-rose-500  @enderror">
        @error('tipe')
        <p class="absolute text-sm text-rose-500">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="row-span-1">
      <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status Barang</label>
      <div class="mt-2">
        <select id="status" name="status" autocomplete="status" required
          class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:max-w-xs sm:text-sm sm:leading-6">
          <option value="Tersedia" selected>Tersedia</option>
          <option value="Digunakan">Digunakan</option>
          <option value="Diperbaiki">Diperbaiki</option>
        </select>
      </div>
    </div>

    <div class="col-span-2 place-self-end flex gap-x-4">
      <button type="reset" class="text-sm font-semibold leading-6 text-gray-500">Kosongkan Formulir</button>
      <button type="submit"
        class="rounded-md bg-cyan-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600"
        id="next-btn">Tambah</button>
    </div>
  </div>
</form>
@endsection