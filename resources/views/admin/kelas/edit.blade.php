@php $ruangkelas = $ruangkelas[0]; @endphp

@extends('layouts.admin', ['page' => 'Kelas'])

@section('title', 'Buat Ruang Kelas Baru')

@section('main-content')
<form action="{{ route('admin.kelas.update', $ruangkelas->ruangkelas_code) }}" method="post">
  @method('PUT')
  @csrf
  <h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900 ">Edit Data Ruang Kelas</h2>
  <p class="text-base leading-9 tracking-tight text-gray-400">
    Membuat Data pada Ruang Kelas
    <span class="text-cyan-500 font-semibold">{{ $ruangkelas->ruangkelas_code }}</span>
  </p>
  <div class="w-full mt-5 grid grid-cols-2 gap-5">

    <div class="row-span-1">
      <label for="code" class="block text-sm font-medium leading-6 text-gray-900">Kode Ruangan</label>
      <div class="mt-2">
        <input id="code" name="code" type="text" required value="{{ $ruangkelas->ruangkelas_code }}" class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
                  @error('code') ring-rose-500  @enderror">
        @error('code')
        <p class="absolute text-sm text-rose-500">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="row-span-1">
      <label for="prodi" class="block text-sm font-medium leading-6 text-gray-900">Program Studi</label>
      <div class="mt-2">
        <select id="prodi" name="prodi" autocomplete="prodi" required
          class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:max-w-xs sm:text-sm sm:leading-6">
          <option selected default>Pilih Program Studi...</option>)
          @foreach($prodi as $pd)
          <option value="{{$pd->prodi_code}}" @selected($ruangkelas->ruangkelas_prodi == $pd->prodi_code)>
            {{$pd->prodi_code}} - {{ $pd->prodi_nama }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="row-span-1">
      <label for="kapasitas" class="block text-sm font-medium leading-6 text-gray-900">Kapasitas</label>
      <div class="mt-2">
        <input id="kapasitas" name="kapasitas" type="text" required value="{{ $ruangkelas->ruangkelas_kapasitas }}" class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
              @error('kapasitas') ring-rose-500  @enderror">
        @error('kapasitas')
        <p class="absolute text-sm text-rose-500">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="row-span-1">
      <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
      <div class="mt-2">
        <select id="status" name="status" autocomplete="status" required
          class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:max-w-xs sm:text-sm sm:leading-6">
          <option value="Kosong" @selected($ruangkelas->ruangkelas_status == 'Kosong')>Kosong</option>
          <option value="Digunakan"@selected($ruangkelas->ruangkelas_status == 'Digunakan')>Digunakan</option>
          <option value="Diperbaiki"@selected($ruangkelas->ruangkelas_status == 'Diperbaiki')>Diperbaiki</option>
        </select>
      </div>
    </div>

    <div class="col-span-2 place-self-end flex gap-x-4">
      <button type="submit"
        class="rounded-md bg-cyan-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600"
        id="next-btn">Ubah Data</button>
    </div>
  </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script>
  const timeStart = document.querySelector("#timepicker-first");
  const timepickerStart = new te.Timepicker(timeStart, {
    increment: true,
    format24: true,
    minTime: "07:30",
    maxTime: "16:00",
  });

  const input = timeStart.querySelector('input#peminjaman_timestart');

  let getTimeStart = "";
  input.addEventListener('input', () => {
    getTimeStart = input.value.toString();
    const timeFinish = document.querySelector("#timepicker-last");
    const timepickerFinish = new te.Timepicker(timeFinish, {
      increment: true,
      format24: true,
      minTime: getTimeStart,
      maxTime: "16:00",
    });
  });

</script>
@endsection