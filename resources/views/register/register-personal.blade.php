@extends('layouts.register')

@section('title', 'Register Personal')

@section('main-content')
<form action="{{ route('register.personal.store') }}" method="post">
	@csrf
	<h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900 ">Personal Info</h2>
	<p class="text-base leading-9 tracking-tight text-gray-400">
		Masukkan Identitas Diri Anda.
	</p>
	<div class="w-full mt-5 grid grid-cols-2 gap-5">
		<div class="col-span-2">
			<label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Foto Profil
				(Opsional)</label>
			<div class="mt-2 flex items-center gap-x-3">
				<svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
					<path fill-rule="evenodd"
						d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
						clip-rule="evenodd" />
				</svg>
				<input type="file" name="" id="" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900
					file:py-1 file:px-4
					file:rounded-md file:border-0
					file:text-sm file:ring-1 file:ring-inset file:ring-gray-300 file:hover:bg-gray-50
					file:bg-white cursor-pointer">
				<!-- <button type="button"
					class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Upload</button> -->
			</div>
		</div>

		<div class="row-span-1">
			<label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
			<div class="mt-2">
				<input type="text" name="nama" id="nama" autocomplete="given-name" value="{{ old('nama') }}"
					class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
					@error('nama') ring-rose-500  @enderror">
          @error('nama')
          <p class=" absolute text-sm text-rose-500">{{ $message }}</p>
				@enderror
			</div>
		</div>

		<div class="row-span-1">
			<label for="nim" class="block text-sm font-medium leading-6 text-gray-900">NIM (Nomor Induk
				Mahasiswa)</label>
			<div class="mt-2">
				<input type="text" name="nim" id="nim" autocomplete="given-name" value="{{ old('nim') }}"
					class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
					@error('nim') ring-rose-500  @enderror">
          @error('nim')
          <p class=" absolute text-sm text-rose-500">{{ $message }}</p>
					@enderror
			</div>
		</div>

		<div class="row-span-1">
			<label for="kelas" class="block text-sm font-medium leading-6 text-gray-900">Kelas</label>
			<div class="mt-2">
				<input type="text" maxlength="2" name="kelas" id="kelas" autocomplete="given-name" value="{{ old('kelas') }}"
					class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
					@error('kelas') ring-rose-500  @enderror">
          @error('kelas')
          <p class=" absolute text-sm text-rose-500">{{ $message }}</p>
					@enderror
			</div>
		</div>

		<div class="row-span-1">
			<label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor HP</label>
			<div class="mt-2">
				<input type="phone" name="phone" id="phone" maxlength="13" value="{{ old('phone') }}" class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
          @error('phone') ring-rose-500  @enderror">
          @error('phone')
          <p class=" absolute text-sm text-rose-500">{{ $message }}</p>
					@enderror
			</div>
		</div>

		<div class="row-span-1">
			<label for="email" class="block text-sm font-medium leading-6 text-gray-900">Alamat Email</label>
			<div class="mt-2">
				<input id="email" name="email" type="text" value="{{ old('email') }}" class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6
          @error('email') ring-rose-500  @enderror">
					@error('email')
					<p class="absolute text-sm text-rose-500">{{ $message }}</p>
					@enderror
			</div>
		</div>

		<div class="row-span-1">
			<label for="prodi" class="block text-sm font-medium leading-6 text-gray-900">Program Studi</label>
			<div class="mt-2">
				<select id="prodi" name="prodi" autocomplete="prodi"
					class="block bg-gray-100 w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:max-w-xs sm:text-sm sm:leading-6
					@error('prodi') ring-rose-500  @enderror">
					<option value="" selected default>Pilih Program Studi...</option>
					@foreach($prodi as $pd)
					<option value="{{$pd->prodi_code}}" >
						{{$pd->prodi_code}} - {{ $pd->prodi_nama }}
					</option>
					@endforeach
				</select>
				@error('prodi')
				<p class="absolute text-sm text-rose-500">{{ $message }}</p>
				@enderror
			</div>
		</div>

		<div class="col-span-2 place-self-end flex gap-x-4">
			<button type="reset" class="text-sm font-semibold leading-6 text-gray-500">Kosongkan Formulir</button>
			<button type="submit"
				class="rounded-md bg-cyan-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600"
				id="next-btn">Selanjutnya</button>
		</div>
	</div>
</form>
@endsection