@extends('layouts.register')

@section('title', 'Confirmation')

@section('main-content')
<div>
  @if($isCreated)
  <h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900">Akun Berhasil Dibuat</h2>
  <p class="text-base leading-9 tracking-tight text-gray-400">
    Pembuatan <span class="font-semibold text-cyan-600">Akun PJMK</span> anda telah berhasil dibuat.
  </p>
  <p class="mt-5 text-base leading-9 tracking-tight text-gray-400">
    Silahkan untuk melakukan <a href="{{ route('login') }}" class="font-semibold text-cyan-600">Login</a>
  </p>

  @else
  <h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900">Akun Anda Sudah Ada</h2>
  <p class="text-base leading-9 tracking-tight text-gray-400">
    Data untuk pembuatan <span class="font-semibold">Akun PJMK</span> sudah ada pada database kami.
  </p>
  <p class="mt-5 text-base leading-9 tracking-tight text-gray-400">
    Silahkan untuk melakukan <a href="{{ route('login') }}" class="font-semibold text-cyan-600">Login</a>
  </p>
  @endif
</div>
@endsection