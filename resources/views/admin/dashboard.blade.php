@extends('layouts.admin', ['page' => 'Dashboard'])


@section('title', 'Dashboard')

@section('head-optional')
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<!-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
@endsection

@section('main-content')
<p class="font-semibold">Selamat Datang,</p>
<h1 class="text-2xl font-semibold tracki">{{ Auth::user()->username }}</h1>

<div class="flex items-start my-4">
  <p class="text-sm font-semibold text-gray-800">Rekapan per
    <span class="text-cyan-500">
      @php
      setlocale(LC_ALL, 'Indonesian'); // Set locale ke bahasa Indonesia

      echo strftime('%A, %e %B %Y', time());
      @endphp
    </span>
  </p>
</div>

<div class="flex gap-x-2">
  <article class="flex flex-col rounded-lg border-2 border-gray-100 bg-white py-6 px-10 shadow-sm">
    <strong class="block font-medium text-gray-500"> Ruangan </strong>
    <div class="flex gap-x-20 mt-2">
      <div>
        <p class="text-2xl font-medium text-gray-900"> {{ $stat_ruangan['digunakan'] }} </p>
        <p class="text-sm text-gray-500"> Digunakan </p>
      </div>
      <div class="flex flex-col justify-end items-end">
        <!-- <p class="text-2xl font-medium text-gray-900"> 20 </p> -->
        <p class="text-sm text-gray-500"> {{ $stat_ruangan['kosong'] }} Kosong </p>
        <p class="text-sm text-gray-500"> {{ $stat_ruangan['total'] }} Total Ruangan</p>
      </div>
    </div>
  </article>

  <article class="flex flex-col rounded-lg border-2 border-gray-100 bg-white py-6 px-10 shadow-sm">
    <strong class="block font-medium text-gray-500"> Peminjaman </strong>
    <div class="flex gap-x-20 mt-2">
      <div>
        <p class="text-2xl font-medium text-gray-900"> {{ $stat_peminjaman['berlangsung'] }} </p>
        <p class="text-sm text-gray-500"> Berlangsung </p>
      </div>
      <div class="flex flex-col justify-end items-end">
        <!-- <p class="text-2xl font-medium text-gray-900"> 20 </p> -->
        <p class="text-sm text-gray-500"></p>
        <p class="text-sm text-gray-500">{{ $stat_peminjaman['total'] }} Total Peminjaman</p>
      </div>
    </div>
  </article>
</div>

<div class="mt-10 mx-auto max-w-7xl bg-white shadow-sm border rounded-xl p-4 pb-8">
  <div class="flex flex-col justify-between items-start">
    <h1 class="text-lg font-semibold text-gray-800">Daftar Ruangan</h1>
  </div>
  <div class="w-full flex flex-wrap mt-5 gap-2">
    @foreach($ruangan as $r)
    @if ($r->ruangkelas_status == 'Kosong')
    <div class="py-1 px-4 border border-gray-400 bg-gray-50 text-gray-500 rounded-md text-sm flex gap-x-2">
      <span class="font-semibold">{{ $r->ruangkelas_code }}</span>
      <span class="font-semibold">|</span>
      <span class="font-semibold">Kosong</span>
    </div>
    @elseif ($r->ruangkelas_status == 'Digunakan')
    <div class="py-1 px-4 border border-cyan-400 bg-cyan-50 text-cyan-400 rounded-md text-sm flex gap-x-2">
      <span class="font-semibold">{{ $r->ruangkelas_code }}</span>
      <span class="font-semibold">|</span>
      <span class="font-semibold">Digunakan</span>
    </div>
    @endif
    @endforeach
  </div>
</div>

<div class="mt-10 mx-auto max-w-7xl bg-white shadow-md border rounded-xl p-4 pb-8">
  <div class="flex flex-col justify-between items-start">
    <h1 class="text-lg font-semibold text-gray-800">Daftar Peminjaman</h1>
    <p class="text-sm font-semibold text-cyan-500">
      Yang Sedang Berlangsung
    </p>
  </div>
  <div class="w-full flex flex-wrap mt-5">
    @if (sizeOf($peminjaman) == 0)
    <p class="text-gray-400 w-full text-center border-[1.5px] border-dashed py-10">
      Tidak Ada Peminjaman
    </p>

    @else
    <ul role="list" class="w-full flex flex-col divide-y-2 divide-gray-200 gap-4 divide-dotted bg-white p-5 rounded-md">
      @foreach ($peminjaman as $p)
      <a href="#">
        <li
          class="flex justify-between border rounded-md gap-x-6 p-3 group hover:bg-gray-100 transition-colors duration-300 cursor-pointer">
          <div class="flex min-w-0 gap-x-4">
            <div class="min-w-0 flex-auto">
              <p class="text-lg font-extrabold leading-8 text-cyan-600">{{ $p->peminjaman_ruangkelas }}</p>
              <div class="flex gap-x-4">
                <p class="text-gray-500 flex items-center gap-x-2 bg-cyan-50 p-1 rounded-md">
                  <span class="text-lg material-symbols-outlined">event</span>
                  <span class="text-xs">{{ strftime('%A, %e %B %Y', strtotime($p->peminjaman_tanggal)) }}</span>
                </p>
                <p class="text-gray-500 flex items-center gap-x-2 bg-cyan-50 p-1 rounded-md">
                  <span class="text-lg material-symbols-outlined">schedule</span>
                  <span class="text-xs font-semibold">
                    {{ substr($p->peminjaman_waktu_mulai, 0, 5) }}
                    ~
                    {{ substr($p->peminjaman_waktu_selesai, 0, 5) }}
                  </span>
                </p>
              </div>
              <div class="flex gap-x-4">
                <p class="text-gray-500 flex items-center gap-x-2 bg-gray-100 p-1 rounded-md mt-2">
                  <span class="text-lg material-symbols-outlined">tag</span>
                  <span class="text-xs font-semibold">
                    {{ $p->pjmk_prodi }} - {{ $p->pjmk_kelas }}
                  </span>
                </p>
                <p class="text-gray-500 flex items-center gap-x-2 bg-gray-100 p-1 rounded-md mt-2">
                  <span class="text-lg material-symbols-outlined">face</span>
                  <span class="text-xs font-semibold">
                    {{ $p->pjmk_nama }}
                  </span>
                </p>

              </div>
              <p class="mt-5 text-sm leading-5 text-gray-500 flex gap-x-2">
                <span class="material-symbols-outlined">school</span>
                {{ $p->peminjaman_matakuliah }}
              </p>
            </div>
          </div>
          <div class="shrink-0">
            <span class="flex align-center justify-center items-center gap-x-2 px-4 py-2 rounded-md
                @if ($p->peminjaman_status == 'Waiting') ring-gray-500/10 bg-gray-50 text-gray-400
                @elseif ($p->peminjaman_status == 'Disetujui') ring-green-600/10 bg-green-50 text-green-700
                @elseif ($p->peminjaman_status == 'Berlangsung') ring-yellow-600/10 bg-yellow-50 text-yellow-700
                @elseif ($p->peminjaman_status == 'Ditolak') ring-rose-500/10 bg-rose-50 text-rose-600
                @endif
                ">
              <span class="material-symbols-outlined block">
                @if ($p->peminjaman_status == 'Waiting') pending
                @elseif ($p->peminjaman_status == 'Disetujui') check_circle
                @elseif ($p->peminjaman_status == 'Berlangsung') stream
                @elseif ($p->peminjaman_status == 'Ditolak') cancel
                @endif
              </span>
              <span class="block text-sm">{{ $p->peminjaman_status }}</span>
            </span>
          </div>
        </li>
      </a>
      @endforeach
    </ul>
    @endif
  </div>
</div>
<div class="pb-10"></div>
@endsection