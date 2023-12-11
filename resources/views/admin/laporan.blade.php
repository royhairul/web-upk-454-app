<!-- component -->
<!DOCTYPE html>
<html>

<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>Laporan</title>
</head>

<body class="bg-white">
  <div class="relative container flex h-screen w-full">
    <aside
      class="relative group/sidebar flex flex-col shrink-0 lg:w-[300px] w-[250px] transition-all duration-300 ease-in-out m-0 fixed z-40 inset-y-0 left-0 bg-white border-r border-r-dashed border-r-neutral-200 sidenav fixed-start"
      id="sidenav-main">
      <div class="flex shrink-0 px-8 items-center justify-between h-[96px]">
        <a class="transition-colors duration-200 ease-in-out" href="#">
          <img alt="Logo"
            src="{{ asset('logo-UPK.svg') }}"
            class="inline">
        </a>
      </div>

      <div class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"></div>

      <div class="flex items-center justify-between px-8 py-5">
        <div class="flex items-center mr-5">
          <div class="mr-5">
            <div class="inline-block relative shrink-0 cursor-pointer rounded-[.95rem]">
              <img class="w-[40px] h-[40px] shrink-0 inline-block rounded-[.95rem]"
                src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/riva-dashboard-tailwind/img/avatars/avatar1.jpg"
                alt="avatar image">
            </div>
          </div>
          <div class="mr-2 ">
            <a href="javascript:void(0)"
              class="dark:hover:text-primary hover:text-primary transition-colors duration-200 ease-in-out text-[1.075rem] font-semibold dark:text-neutral-400/90 text-secondary-inverse">
              Admin 1</a>
            <span class="text-secondary-dark dark:text-stone-500 font-medium block text-sm">Administrator</span>
          </div>
        </div>
        <a class="inline-flex relative items-center group justify-end text-base font-medium leading-normal text-center align-middle cursor-pointer rounded-[.95rem] transition-colors duration-150 ease-in-out text-dark bg-transparent shadow-none border-0"
          href="javascript:void(0)">
          <span
            class="leading-none transition-colors duration-200 ease-in-out peer shrink-0 group-hover:text-primary text-secondary-dark">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z">
              </path>
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
          </span>
        </a>
      </div>

      <div class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"></div>

      <div class="relative pl-3 my-5 overflow-y-scroll">
        <div class="flex flex-col w-full font-medium">

          <!-- menu item -->
          <div>
            <span class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]">
              <a href="javascript:;"
                class="flex items-center flex-grow text-base dark:text-neutral-400/75 text-stone-500 hover:text-dark">Dashboard</a>
            </span>
          </div>

          <!-- menu item -->
          <div>
            <span class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]">
              <a href="javascript:;"
                class="flex items-center flex-grow text-base dark:text-neutral-400/75 font-semibold text-dark-500 hover:text-dark">Laporan</a>
            </span>
          </div>

          <!-- menu item -->
          <div>
            <span class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]">
              <a href="javascript:;"
                class="flex items-center flex-grow text-base dark:text-neutral-400/75 text-stone-500 hover:text-dark">Peminjaman</a>
            </span>
          </div>


          <!-- menu item -->
          <div>
            <span class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]">
              <a href="javascript:;"
                class="flex items-center flex-grow text-base dark:text-neutral-400/75 text-stone-500 hover:text-dark">Pengembalian</a>
            </span>
          </div>

          <!-- menu item -->
          <div>
            <span class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]">
              <a href="javascript:;"
                class="flex items-center flex-grow text-base dark:text-neutral-400/75 text-stone-500 hover:text-dark">Jadwal</a>
            </span>
          </div>

          <!-- menu item -->
          <div>
            <span class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]">
              <a href="javascript:;"
                class="flex items-center flex-grow text-base dark:text-neutral-400/75 text-stone-500 hover:text-dark">Inventaris</a>
            </span>
          </div>

        </div>
      </div>
    </aside>
    <div class="flex flex-wrap ml-9 my-5 bg-white">
      <div class="w-full max-w-full">
        <h1 class="text-2xl font-semibold">Laporan</h1>
        <p class="text-base text-slate-500">
          Laporan mengenai Peminjaman yang telah dilakukan
        </p>

        <!-- Input Search -->
        <form action="{{ route('search') }}" method="post" class="mt-10 flex gap-4">
          @csrf
          <input type="text" name="search" id="search"
            class="rounded-md w-[50ch] border-0 py-2.5 pl-3 pr-10 text-base text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-0 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            placeholder="Masukkan Kata Kunci">
          <button type="submit"
            class="flex rounded-md bg-indigo-600 px-2.5 py-2.5 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <span class="material-symbols-rounded">
              search
            </span>
          </button>
        </form>

        <!-- Table -->
        <div class="mt-10 relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
          <div style="background-position: 10px 10px;"
            class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
          </div>
          <div class="relative rounded-xl overflow-auto">
            <div class="shadow-sm overflow-hidden my-8">
              <table class="border-collapse table-auto w-full text-sm">
                <thead>
                  <tr>
                    <th
                      class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                      Kode Ruangan</th>
                    <th
                      class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                      Nama PJMK</th>
                    <th
                      class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                      Kelas</th>
                    <th
                      class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                      Waktu Pinjam</th>
                    <th
                      class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                      Mata Kuliah</th>
                  </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                  @foreach ($data as $peminjaman)
                  <tr>
                    <td
                      class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                      {{ $peminjaman->ruangkelas_code }}</td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                      {{ $peminjaman->pjmk_nama }}</td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                      {{ $peminjaman->pjmk_kelas }}</td>
                    <td
                      class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                      {{ $peminjaman->peminjaman_waktu }}
                    </td>
                    <td
                      class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                      {{ $peminjaman->matakuliah_nama }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
        </div>

      </div>
    </div>
  </div>
</body>
<html>