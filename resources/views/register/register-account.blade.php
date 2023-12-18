@extends('layouts.register')

@section('title', 'Register Account')

@section('main-content')
<form action="{{ route('register.account.store') }}" method="post">
  @csrf
  <div id="account-form">
    <h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900">Account Info</h2>
    <p class="text-base text-center leading-9 tracking-tight text-gray-400">
      Buat Username dan Password untuk <span class="font-semibold text-cyan-600">Akun PJMK</span>
    </p>

    <div class="w-full mt-5 mx-auto grid grid-cols-1 gap-y-5">
      <div class="row-span-1 order-6">
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        <div class="mt-2">
          <input id="username" name="username" type="username" required
            class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div class="row-span-1 order-6">
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        <div class="mt-2">
          <input id="password" name="password" type="password" required
            class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6 @error('password') ring-rose-500  @enderror">
            @error('password')
            <p class="absolute text-sm text-rose-500">{{ $message }}</p>
            @enderror
        </div>
      </div>
      <div class="row-span-1 order-6">
        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi
          Password</label>
        <div class="mt-2">
          <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="password" required
            class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div class="col-span-1 order-last flex justify-between">
            <button type="submit"
              class="rounded-md bg-cyan-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Submit</button>
      </div>
    </div>
  </div>
</form>
@endsection