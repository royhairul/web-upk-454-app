@extends('layouts.admin', ['page' => 'Peminjaman'])

@section('title', 'Peminjaman')

@section('main-content')
<h1 class="text-2xl font-semibold">Peminjaman</h1>
<p class="text-base text-slate-500">
  Daftar Peminjaman yang akan dilakukan
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
              class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Ruang Kelas</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Kelas</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Tanggal Peminjaman</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Waktu Mulai</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Waktu Selesai</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Mata Kuliah</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Fasilitas</th>
            <th
              class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
              Status</th>
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
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $peminjaman->pjmk_prodi }} - {{ $peminjaman->pjmk_kelas }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $peminjaman->peminjaman_tanggal }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
              {{ $peminjaman->peminjaman_waktu_mulai }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
              {{ $peminjaman->peminjaman_waktu_selesai }}
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
              {{ $peminjaman->matakuliah_nama }}
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
              @php $fasilitas = $peminjaman->peminjaman_fasilitas @endphp
              <ul class="list-disc">
                @if($fasilitas[0] == 1) <li>Remote AC</li> @endif
                @if($fasilitas[1] == 1) <li>Proyektor</li> @endif
                @if($fasilitas[2] == 1) <li>Stopkontak</li> @endif
              </ul>
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
              <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset
              @if ($peminjaman->peminjaman_status == 'Waiting') ring-gray-500/10 bg-gray-50 text-gray-600
              @elseif ($peminjaman->peminjaman_status == 'Disetujui') ring-green-600/10 bg-green-50 text-green-700
              @elseif ($peminjaman->peminjaman_status == 'Waiting') ring-gray-500/10 bg-gray-50 text-gray-600
              @endif
              ">
                {{ $peminjaman->peminjaman_status }}
              </span>
            </td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                <a href="{{ route('admin.peminjaman.verif', $id = $peminjaman->peminjaman_id) }}" class="font-semibold text-indigo-600" id='showButton'>
                  Detail
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