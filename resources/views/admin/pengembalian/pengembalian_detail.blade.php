@extends('layouts.admin', ['page' => 'Pengembalian'])

@section('title', 'Verifikasi Pengembalian')

@section('main-content')

<div class="mt-5">
  <div class="flex items-end justify-center p-4 text-center sm:items-center sm:p-0">
    <div class="relative border-2 border-rose-600 border-opacity-40 overflow-auto rounded-lg bg-white text-left shadow-xl transition-all mb-10">
      <div class="bg-white px-6 pb-4 pt-5">
        <div>
          <div class="mt-3 ml-3">
            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Detail Pengembalian</h3>
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
            </div>
            <p class="font-semibold mt-4 mb-2">Foto Sebelum</p>
            <img src="{{ asset('/storage/' . $data->pengembalian_foto_sebelum) }}" alt="" srcset="">
            <hr>

            <p class="font-semibold mt-4 mb-2">Foto Sesudah</p>
            <img src="{{ asset('/storage/' . $data->pengembalian_foto_sesudah) }}" alt="" srcset="">
            <hr>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
        <form action="{{ route('admin.pengembalian.verif.update', $data->pengembalian_id) }}" method="post">
          @csrf
          <a href="/admin/pengembalian" id="submitButton"
          class="inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</a>
          <button type="submit" value="Ditolak" name="status"
          class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Tolak</button>
          <button type="submit" value="Disetujui" name="status"
            class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Setuju</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection