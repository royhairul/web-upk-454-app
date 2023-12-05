<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Registrasi</title>
</head>

<body>
  <div class="container p-8 mx-auto">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="{{ asset('logo-UPK.svg') }}" alt="UPK Poliwangi Gedung 454">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Registrasi</h2>
      <p class="text-base text-center leading-9 tracking-tight text-gray-600">
        Isi formulir berikut untuk pendaftaran <span class="font-semibold text-indigo-600">Akun PJMK</span>
      </p>
    </div>

    <form>
      <div class="w-[80%] mt-5 mx-auto grid grid-cols-2 grid-rows-4 gap-x-5">
        <div class="row-span-1 order-1">
          <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Foto Profil (Opsional)</label>
          <div class="mt-2 flex items-center gap-x-3">
            <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd"
                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                clip-rule="evenodd" />
            </svg>
            <button type="button"
              class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
          </div>
        </div>

        <div class="row-span-1 order-3">
          <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
          <div class="mt-2">
            <input type="text" name="nama" id="nama" autocomplete="given-name"
              class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="row-span-1 order-2">
          <label for="nim" class="block text-sm font-medium leading-6 text-gray-900">NIM (Nomor Induk
            Mahasiswa)</label>
          <div class="mt-2">
            <input type="text" name="nim" id="nim" autocomplete="given-name"
              class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="row-span-1 order-4">
          <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Kelas</label>
          <div class="mt-2">
            <input type="phone" name="phone" id="phone" autocomplete="given-name"
              class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="row-span-1 order-5">
          <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor HP</label>
          <div class="mt-2">
            <input type="phone" name="phone" id="phone" autocomplete="given-name"
              class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="row-span-1 order-6">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Alamat Email</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email"
              class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="row-span-1 order-5">
          <label for="prodi" class="block text-sm font-medium leading-6 text-gray-900">Program Studi</label>
          <div class="mt-2">
            <select id="prodi" name="prodi" autocomplete="prodi"
              class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option selected default>Pilih Program Studi...</option>
              <option>TRPL - Teknologi Rekayasa Perangkat Lunak</option>
              <option>TRK - Teknologi Rekayasa Komputer</option>
              <option>BD - Bisnis Digital</option>
            </select>
          </div>
        </div>

        <div class="row-span-1 order-6">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="password"
              class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="col-span-2 order-last place-self-end flex gap-x-4">
          <button type="reset" class="text-sm font-semibold leading-6 text-gray-500">Kosongkan Formulir</button>
          <button type="submit"
            class="rounded-md bg-indigo-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
        </div>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Sudah Punya Akun?
      <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login</a>
      | Kembali ke
      <a href="" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Beranda</a>
    </p>
  </div>

</body>

</html>