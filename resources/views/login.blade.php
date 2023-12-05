<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="container p-10 mx-auto">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="{{ asset('logo-UPK.svg') }}"
        alt="UPK Poliwangi Gedung 454">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log in</h2>
        <p class="text-base text-center leading-9 tracking-tight text-gray-900">
          Masuk dengan <span class="font-semibold text-indigo-600">Akun</span> Kamu
        </p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="" method="POST">
        @csrf
        <div>
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="username" name="username" type="text" autofocus required class="block w-full rounded-md border-1 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
              placeholder:text-gray-400 focus:ring-1 focus:ring-outset focus:ring-indigo-600 sm:text-sm sm:leading-6
              @error('username') ring-rose-500  @enderror">
            @error('username')
            <p class="text-sm text-rose-500">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            <div class="text-sm">
              <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required
              class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-outset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div>
          <button type="submit"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log
            In</button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">
        Belum punya Akun?
        <a href="{{ route('register') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register</a>
        terlebih dahulu
      </p>
    </div>
  </div>
</body>

</html>