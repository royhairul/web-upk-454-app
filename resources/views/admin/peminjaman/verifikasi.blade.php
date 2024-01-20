@extends('layouts.admin', ['page' => 'Pengajuan'])

@section('title', 'Verifikasi Peminjaman')

@section('main-content')
<div class="relative z-10" aria-labelledby="modal-title" role="dialog"
  aria-modal="true" id="detail-box">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all">
        <div class="bg-white px-6 pb-4 pt-5 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
              <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Detail Pengajuan Peminjaman</h3>
              <div class="mt-2">
                @php $data = $data[0] @endphp
                <h3 class="text-xl font-semibold leading-6 text-cyan-500" id="modal-title">{{
                  $data->peminjaman_ruangkelas }}</h3>
                <div class="flex gap-x-6">
                  <div class="flex-1.5">
                    <h3 class="mt-5 text-base font-semibold leading-6 text-gray-900" id="modal-title">PJMK</h3>
                    <p class="text-sm text-gray-500">Nama : {{ $data->pjmk_nama }}</p>
                    <p class="text-sm text-gray-500">Kelas : {{ $data->pjmk_kelas }}</p>
                    <p class="text-sm text-gray-500">Mata Kuliah : {{ $data->matakuliah_nama }}</p>
                  </div>
                  <div class="flex-auto">
                    <h3 class="mt-5 text-base font-semibold leading-6 text-gray-900" id="modal-title">Informasi</h3>
                    <p class="text-sm text-gray-500">Tanggal : {{$data->peminjaman_tanggal}}</p>
                    <p class="text-sm text-gray-500">Waktu : {{$data->peminjaman_waktu_mulai}} s/d
                      {{$data->peminjaman_waktu_selesai}}</p>
                    <p class="text-sm text-gray-500">Fasilitas : </p>
                    @php $fasilitas = $data->peminjaman_fasilitas @endphp
                    <ul class="list-disc text-sm text-gray-500 ml-5">
                      @if($fasilitas[0] == 1) <li>Remote AC</li> @endif
                      @if($fasilitas[1] == 1) <li>Proyektor</li> @endif
                      @if($fasilitas[2] == 1) <li>Stopkontak</li> @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <form action="{{ route('admin.pengajuan.verif.update', $data->peminjaman_id) }}" method="post">
            @csrf
            <a href="/admin/peminjaman" id="submitButton"
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
</div>

@endsection