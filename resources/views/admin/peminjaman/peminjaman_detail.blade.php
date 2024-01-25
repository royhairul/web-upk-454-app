@extends('layouts.admin', ['page' => 'Peminjaman'])

@section('title', 'Verifikasi Peminjaman')

@section('main-content')

<div class="mt-32">
  <div class="flex items-end justify-center p-4 text-center sm:items-center sm:p-0">
    <div
      class="relative border-2 border-cyan-600 border-opacity-40 overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all">
      <div class="bg-white px-6 pb-4 pt-5">
        <div>
          <div class="mt-3 ml-3">
            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Detail Peminjaman</h3>
            <form action="{{ route('admin.peminjaman.verif.update', $data->peminjaman_id) }}" method="post"
              class="flex justify-between">
              @csrf
              <div class="mt-2">
                <h3 class="text-xl font-semibold leading-6 text-cyan-500" id="modal-title">
                  {{ $data->peminjaman_ruangkelas }}
                </h3>
                <div class="flex gap-x-10">
                  <div>
                    <h3 class="mt-5 text-base font-semibold leading-6 text-gray-900" id="modal-title">PJMK</h3>

                    <p class="text-gray-500 flex items-center gap-x-2 bg-gray-50 p-1 rounded-md mb-2">
                      <span class="text-lg material-symbols-outlined">face</span>
                      <span class="text-sm">{{ $data->pjmk_nama }}</span>
                    </p>
                    <p class="text-gray-500 flex items-center gap-x-2 bg-gray-50 p-1 rounded-md mb-2">
                      <span class="text-lg material-symbols-outlined">badge</span>
                      <span class="text-sm">{{ $data->pjmk_nim }}</span>
                    </p>
                    <p class="text-gray-500 flex items-center gap-x-2 bg-gray-50 p-1 rounded-md mb-2">
                      <span class="text-lg material-symbols-outlined">tag</span>
                      <span class="text-sm">{{ $data->pjmk_prodi }} - {{ $data->pjmk_kelas }}</span>
                    </p>
                    <p class="text-gray-500 flex items-center gap-x-2 bg-gray-50 p-1 rounded-md mb-2">
                      <span class="text-lg material-symbols-outlined">school</span>
                      <span class="text-sm">{{ $data->peminjaman_matakuliah }}</span>
                    </p>
                  </div>
                  <div class="flex-auto">
                    <h3 class="mt-5 text-base font-semibold leading-6 text-gray-900" id="modal-title">Informasi</h3>
                    <p class="text-gray-500 flex items-center gap-x-2 bg-gray-50 p-1 rounded-md mb-2">
                      <span class="text-lg material-symbols-outlined">event</span>
                      <span class="text-sm">{{ strftime('%A, %e %B %Y', strtotime($data->peminjaman_tanggal)) }}</span>
                    </p>
                    <p class="text-gray-500 flex items-center gap-x-2 bg-gray-50 p-1 rounded-md">
                      <span class="text-lg material-symbols-outlined">schedule</span>
                      <span class="text-sm">
                        {{$data->peminjaman_waktu_mulai}} s/d
                        {{$data->peminjaman_waktu_selesai}}
                      </span>
                    </p>
                  </div>
                </div>
                <hr>
                <div class="mt-2">
                  <label for="fasilitas" class="block text-sm font-medium leading-6 text-gray-900">Fasilitas
                    (Proyektor)</label>
                  <div class="mt-2">
                    <select id="fasilitas" name="fasilitas" autocomplete="fasilitas" class="block bg-gray-100 w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:max-w-xs sm:text-sm sm:leading-6
                    @error('prodi') ring-rose-500  @enderror">
                      <option value="" selected default>Tidak Ada</option>
                      @foreach($fasilitas as $f)
                      <option value="{{ $f->fasilitas_code }}">
                        {{ $f->fasilitas_name }}
                      </option>
                      @endforeach
                    </select>
                    @error('fasilitas')
                    <p class="absolute text-sm text-rose-500">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 flex justify-between">
        <a href="/admin/peminjaman" id="submitButton"
          class="inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</a>

        <button type="submit" value="Disetujui" name="status"
          class="inline-flex w-full justify-center rounded-md bg-cyan-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 sm:ml-3 sm:w-auto">Submit
        </button>
      </div>
    </div>
    </form>
  </div>
</div>

@endsection